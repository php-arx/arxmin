<?php namespace Arxmin;

use Input, View, User, Config, Redirect, Lang, Auth, Confide;

class UserController extends BaseController {

    public $layout = "arxmin::layouts.bootstrap";

    public function __construct(){
        $this->auth = Config::get('arxmin::config.auth');
    }

    /**
     * Displays the form for account creation
     *
     */
    public function create()
    {
        $auth = $this->auth;
        return View::make($this->auth['signup_form'], get_defined_vars());
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {
        $user = new User(Input::all());

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id )
        {
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::action('UserController@login')
                ->with( 'notice', Lang::get('confide::confide.alerts.account_created') );
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');

            return Redirect::action('UserController@create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        return View::make('arxmin::user.login');
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $data = Input::all();

        if (Auth::attempt(Input::only('username', 'password'), Input::get('remember'))) {

            $user = Auth::getUser();

            return Redirect::action('Arxmin\\ArxminController@anyIndex');
        }

        return Redirect::action(get_called_class() . '@login')->withErrors(array('wrong_password'));
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function confirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UserController@login')
                ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UserController@login')
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function do_forgot_password()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UserController@login')
                ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UserController@forgot_password')
                ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function reset_password( $token )
    {
        return View::make(Config::get('confide::reset_password_form'))
            ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     */
    public function do_reset_password()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UserController@login')
                ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UserController@reset_password', array('token'=>$input['token']))
                ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

}