<?php namespace Arxmin;
use Arx\classes\Utils;

/**
 * Class Api
 *
 * Api Current Version
 *
 */
class Api extends \Arx\classes\Singleton
{
    /**
     * Api Current Version
     *
     * @var string
     */
    public static $version = "1.0.0";

    /**
     * Google search link
     * @var string
     */
    protected static $googleTextSearchUrl = "https://maps.googleapis.com/maps/api/place/search/json?";

    /**
     * @var string
     */
    protected static $googleMapGeocodeUrl = "http://maps.googleapis.com/maps/api/geocode/json?";

#F
    /**
     * Fire a task in background using Beanstalkd
     *
     * @param $job Illuminate\Queue\Jobs\BeanstalkdJob
     * @param $data array
     *
     * @return void
     */
    public static function fire($job, $data)
    {

        \Log::info('Queue job called #' . $job->getJobId(), Arr::toArray($data));

        $method = $data['@method'];

        unset($data['@method']);

        $t = self::getInstance();

        call_user_func_array(array($t, $method), $data);

        $job->delete();
    }

    /**
     * Push a task to the queue list
     *
     * @throws \Exception if Api methods is not callable
     */
    public static function push()
    {

        $param = func_get_args();

        $method = $param[0];

        if (!method_exists(get_class(), $method)) {
            Throw new \Exception('Api method ' . $method . ' is not callable');
        }

        unset($param[0]);

        \Queue::push('Api@fire', array('@method' => $method) + $param);
    }

# G
    /**
     * Reverse geocoding helper
     *
     * @see https://developers.google.com/maps/documentation/javascript/geocoding?hl=FR
     * @param $value can be a lat,lng format or an address
     * @param string $type latLng if lat,lng value | address if address value
     * @param string $precision
     * @return stdClass
     */
    public static function geocode($value, $type = 'latlng', $precision = 'locality')
    {
        $result = new \stdClass();

        $data = array(
            'sensor' => 'false',
            $type => $value,
            'language' => \Config::get('app.locale')
        );

        $url = self::$googleMapGeocodeUrl . http_build_query($data);

        $response = Utils::getJSON($url);

        if ($response->results) {
            $results = $response->results;

            if (is_object($results)) {
                $results[] = $results;
            }

            foreach ($results as $key => $value) {
                if ($type == 'address') {
                    foreach ($value as $k2 => $v2) {
                        $result->{$k2} = $v2;
                    }

                    $result->lat = $value->geometry->location->lat;
                    $result->lng = $value->geometry->location->lng;
                    $result->latLng = $value->geometry->location->lat . ',' . $value->geometry->location->lng;

                    break;
                } elseif (in_array($precision, $value->types)) {
                    $result->name = $value->formatted_address;

                    foreach ($value->address_components as $keyC => $valueC) {
                        try {
                            $result->{$valueC->types[0]} = $valueC->long_name;
                        } catch (\Exception $e) {
                        }
                    }

                    $result->location = $value->geometry->location->lat . ',' . $value->geometry->location->lng;
                }
            }
        }

        $result->url = $url;

        return $result;
    } // geocode


    /**
     * Get Ip infos from User
     *
     * @param null $ip
     * @return mixed
     */
    public static function getIp($ip = null)
    {
        return Utils::getIpInfos();
    } // getIp

    /**
     * Return current Languages
     */
    public static function getLanguages()
    {
        if (self::$languages) {
            return self::$languages;
        }

        self::$languages = \Lang::get('languages');

        return self::$languages;
    }

#H
    /**
     * Handle Error => if Stagging BETA or PROD => Log error only
     * => if not throw error
     *
     * @param $e
     * @throws
     */
    public static function handleError($e)
    {
        if (!defined('LEVEL_ENV')) {
            define('LEVEL_ENV', 3);
        }

        if (is_array($e)) {
            $e = new \Exception('Error with : ' . json_encode($e));
        }

        if (LEVEL_ENV < 2) {
            Throw $e;
        }

        \Log::error($e);
    }

#I
    /**
     * Check if request is Ajax
     *
     * @return bool
     */
    public static function isAjax()
    {
        return \Request::isJson() || Input::has('ajax');
    } //
#P

#R

    /**
     * Response Wrapper Helper
     *
     * It return 400 code status if no data
     *
     * @param array $mdata
     * @param bool $status
     * @param string $msg
     *
     * @return array
     */
    public static function response($mdata = array(), $status = null, $msg = '')
    {
        if (is_array($mdata) && isset($mdata['msg']) && isset($mdata['data']) && isset($mdata['status']) && !$status) {
            $status = $mdata['status'];
            $msg = $mdata['msg'];
            $mdata = $mdata['data'];
        }


        if (!$status && count($mdata)) {
            $status = 200;
        } elseif (!$status) {
            $status = 400;
        }


        $response = array(
            'status' => $status,
            'msg' => $msg,
            'data' => $mdata
        );

        return $response;
    } // response

    /**
     * Return a formatted ResponseJson
     *
     * @param array $mdata
     * @param null $status
     * @param string $msg
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseJson($mdata = array(), $status = null, $msg = '', array $headers = array(), $options = 0)
    {
        $response = self::response($mdata, $status, $msg);
        return \Response::json($response, $response['status'], $headers, $options);
    } // response

    /**
     * Get Relative path to the public folder
     *
     * @param $path
     * @return mixed
     */
    public static function relativePath($path)
    {
        return str_replace(public_path(), '', $path);
    }

    /**
     * Get Countries available
     */
    public static function getCountries()
    {
        // Put frequently country at the top
        $countries = array();
        $frequently = array();

        foreach (\Arx\classes\Convert::$aCountries as $k => $country) {
            //echo strtolower($k) . '<br />';
            if (in_array(strtolower($k), \Config::get('app.locales'))) {
                $frequently[strtolower($k)] = $country;
            } else {
                $countries[strtolower($k)] = $country;
            }
        }

        return array_merge($frequently, $countries);
    }
}