<?php namespace Arxmin;

use App\Services\Registrar;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Input, View, User, Config, Redirect, Lang, Auth, Confide;
use Illuminate\Support\Facades\Request;

class AuthController extends BaseController {

    use ValidatesRequests;

    public $layout = "arxmin::layouts.html";

    public function __construct(Guard $auth, Registrar $registrar)
    {
        parent::__construct();
        $this->auth = $auth;
        $this->registrar = $registrar;
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin(){
        /**
         * @todo login process
         */
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
        global $user;

        /**
         * @todo login process
         */
        Auth::loginUsingId(1);

        # Redirect to the first element of the dynamic menu
        $menu = \Arxmin::getMenu();

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