<?php namespace Arxmin;

use Log;
use Response, Auth, Input, Exception, Request;

/**
 * Class ApiController
 *
 * @package Arxmin
 */
class ArxminController extends BaseController
{
    /**
     * Return to the first link of the dynamic menu
     */
    public function anyIndex()
    {
        global $arxminUser,$arxminAuth;

        try {
            $arxminAuth = Auth::provider('arxmin')->check();

            if ($arxminAuth) {
                $menu = \Arxmin::getMenu();
                return redirect($menu[0]['link']);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return redirect('arxmin/login');
    }
}