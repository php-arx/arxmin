<?php namespace Arxmin;

use App\Services\Registrar;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View, User, Auth;
use Request;

class AuthController extends BaseController {

    use ValidatesRequests;

    public $layout = "arxmin::layouts.html";

    public function __construct(Guard $auth, Registrar $registrar)
    {
        parent::__construct();
        $this->auth = Auth::driver('arxmin');
        $this->registrar = $registrar;
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
        global $user, $auth;

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