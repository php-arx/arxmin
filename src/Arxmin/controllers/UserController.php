<?php namespace Arxmin;

use Illuminate\Support\Facades\Redirect;
use Input;

class UserController extends BaseController {

    /**
     * test
     */
    public function anyLogin(){

        \Session::put('ArxminLogged', true);

        return Redirect::to('/arxmin/home');

    }

}