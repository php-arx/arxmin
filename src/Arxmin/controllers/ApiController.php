<?php namespace Arxmin;

use Response, Auth, Input, Exception, Request;

class ApiController extends BaseController {


    public function __construct(){

        \Debugbar::disable();

        $this->beforeFilter('arxmin::auth', array('except' => array(
            'anyAuth'
        )));
    }

#_
    /**
     * Api Model Autocaller will try to Access to the Api Model if the method URI is correct
     *
     *
     * @see Api for callableMethods from ApiController
     * @param string $method
     * @param array $param
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function __call($method, $param)
    {

        $data = Input::all();

        $param = array_merge($param, $data);

        //Auto call to Api Model access
        if (in_array($method, Api::$callableMethods)) {

            $param = \Request::segments();

            unset($param[0], $param[1], $param[2]);

            if (count($param)) {
                $response = call_user_func_array(array("Api", $method), $param);
            } else {
                $response = call_user_func_array(array("Api", $method), []);
            }

            if(!isset($response['msg'], $response['status'])){
                $response = Api::response($response);
            }

            return Response::json($response, $response['status']);
        }
    }

    /**
     * Call when no methods is defined => by default allow to access to some ApiModel
     *
     * @param array $parameters
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function missingMethod($parameters = array())
    {
        return Response::json(array('msg' => 'Method not found', 'results' => array()), 404);
    } // missingMethod

    /**
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyAuth(){
        $data = Input::all();

        try {

            $user = \Auth::attempt(Input::only(array('email', 'password')), Input::get('remember'), true);

            return Response::json($user);
        } catch (Exception $e) {
            return Response::json($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Call Module action
     *
     * @param $name
     * @param $action
     */
    public function anyModule($name, $action){
        global $app;

        $name = strtolower($name);

        if(isset($app['arxmin.modules.'.$name])){
            $model = $app['arxmin.modules.'.$name];
        } else {
            $model = "\\Arxmin\\".ucfirst($name);
        }

        # force format action
        $method = studly_case($action);

        if ((class_exists($model, false) || is_object($model)) && method_exists($model, $method)) {

            $params = Request::segments();

            for($i=0;$i <= array_search($action, $params);$i++){
                unset($params[$i]);
            }

            if (count(Input::all())) {
                $params[] = Input::all();
            }

            $response = call_user_func_array(array($model, $method), $params);

            if(is_object($response) && method_exists($response, 'toArray')){
                $response = $response->toArray();
            }

            return Api::responseJson($response);
        }

        return Response::json(Api::response([], 400, "method not found"), 400);
    }

    /**
     * Get User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(){
        return Response::json(Auth::getUser());
    }

    /**
     * Get Config
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConfig()
    {
        return Response::json(Arxmin::getConfig());
    }



    /**
     * Get Options
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOptions()
    {
        return Response::json(Option::all());
    }

    /**
     * Get Menu Structure
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu(){
        return Response::json(Arxmin::getMenu());
    }

    /**
     * Return all available labels
     */
    public function getLabels()
    {

        $param = Input::all();

        $data = Label::all()->toArray();

        if ($param['format'] = 'datatable') {

            $i = 0;

            $data = array_map(function($item) use(&$i) {
                $i++;
                $item['DT_RowId'] = $item['id'];

                return $item;

            }, $data);
        }

        return Api::responseJson($data, 200);
    }

    public function anyLabel($id = null){

        $action = Input::get('action');

        if (!$action) {
            switch (\Request::method()) {
                case 'POST':
                    $action = 'create';
                    break;
                case 'PUT':
                    $action = 'edit';
                    break;
                case 'DELETE':
                    $action = 'remove';
                    break;
            }
        }

        if (!$id && Input::has('data')) {

            $label = new Label();

            $data = Input::get('data');

            $label->ref = $data['ref'];

            foreach (Label::getLocales() as $lang) {
                $label->$lang = $data[$lang];
            }

            $label->save();

            return Response::json([
                'row' => $label->toArray()
            ], 200);
        } else {

            $label = Label::findOrFail($id);

            if ($action == 'edit') {
                $data = Input::get('data');
                foreach (Label::getLocales() as $lang) {
                    $label->$lang = $data[$lang];
                }

                if(isset($data['meta']))
                    $label->meta = $data['meta'];

                $label->save();
            } elseif ($action == 'remove') {
                Response::json(['delete' => $label->delete(), Input::all()], 200);
            }

            return Response::json([
                'row' => $label->toArray()
            ], 200);

        }

    }

    public function handleModel($class, $id = null, $method = null){

        if (is_string($id)) {
            $oClass = new Data();
            $method = $id;
        } elseif (is_integer($id)) {
            $oClass = Data::findOrFail($id);
        } else {
            $oClass = new $class();
        }

        $method = studly_case($method);

        $param = Request::segments();

        # @todo make more dynamic autodetection
        unset($param[0],$param[1],$param[2],$param[3], $param[4]);

        if (Input::all()) {
            $param[] = Input::all();
        }

        if (method_exists($oClass, $method)) {
            $response = call_user_func_array([$oClass, $method], $param);
        } else {
            $response = $oClass->toArray();
        }

        return Api::responseJson($response);
    }

    /**
     * Data Injection Api
     */
    public function anyData($id = null, $method = null)
    {
        if (!$id && !$method) {

            $data = Data::search(Input::all())->toArray();

            if ($param['format'] = 'datatable') {

                $i = 0;

                $data = array_map(function($item) use(&$i) {
                    $i++;
                    $item['DT_RowId'] = $item['id'];

                    return $item;

                }, $data);
            }

            return Api::responseJson($data, 200);
        }

        return $this->handleModel('Data', $id, $method);
    }

} 