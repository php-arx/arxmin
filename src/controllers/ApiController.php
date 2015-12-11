<?php namespace Arxmin;

use Response, Auth, Input, Exception, Request;

/**
 * Class ApiController
 *
 * @package Arxmin
 */
class ApiController extends BaseController {

    public function __construct(){

        parent::__construct();

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
     * Auth authentifier
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
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
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
} 