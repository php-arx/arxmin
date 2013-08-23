<?php namespace Arx\Arxmin\controllers;

use Arx\Arxmin\models\User, Arx\Arxmin\models\Arxmin;
use Illuminate\Support\Facades\URL;
use Config, Session, Redirect, View, Input;

include __DIR__.'/../settings.php';

class RouteController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $formLogin = Array(
            'attributes' => array(
                'class' => 'form-signin',
                'method' => 'GET',
                'action' => URL::to('/arxmin/user/login')
            )
        );

        if(Session::get('arxminLogged')){
            return Redirect::to('/arxmin/home');
        }

		return View::make('arxmin::login', get_defined_vars());
	}

    public function anyHome(){

        $menu = Arxmin::getMenu();

        $currentIframe = Input::get('url') ?: URL::to('/arxmin/dashboard');
        $this->layout = View::make('arxmin::dashboard', get_defined_vars());
    }

    public function getDashboard(){
        return View::make('arxmin::panels.dashboard');
    }


    public function login(){

        $response = User::login(Input::get('email'), Input::get('password'));

        if($response){
            Session::put('arxminLogged', true);
            return Redirect::to('/arxmin/home');
        } else {
            return Redirect::to('/arxmin');
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($page)
	{
        if(method_exists($this, $page)){
            $this->{$page}();
        } else {
            $this->layout = View::make('arxmin::dashboard');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
