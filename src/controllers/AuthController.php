<?php namespace Arxmin;

use Illuminate\Contracts\Auth\Guard;
use View, Auth;
use Request;

class AuthController extends BaseController {


    public $layout = "arxmin::layouts.html";

    public function __construct(Guard $auth)
    {
        parent::__construct();
        $this->auth = Auth::driver('arxmin');
    }

    /**
     * Login process
     *
     * @return View
     */
    public function getLogin(){
        return view('arxmin::auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request|Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        global $auth;

        # Check if user is in the DB
        $auth = $this->auth->attempt(Request::only(['email','password']), Request::get('remember'));

        # Redirect to the first element of the dynamic menu
        $menu = Arxmin::getMenu();

        return redirect($menu[0]['link']);
    }

    /**
     * Logout
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/arxmin/login');
    }
}