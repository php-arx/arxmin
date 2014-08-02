<?php namespace Arxmin;

use Controller, View;

class BaseController extends \Arx\classes\Controller {

    protected $menu;

    public $layout;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    /**
     * Assign variable data
     *
     * @param      $mKey
     * @param null $value
     *
     * @return void
     */
    protected function assign($mKey, $value = null){
        if(is_array($mKey)){
            foreach($mKey as $key=>$value){
                $this->layout->{$key} = $value;
            }
        } else {
            $this->layout->{$mKey} = $value;
        }
    }

}
