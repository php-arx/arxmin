<?php namespace Arxmin;

use Hook;
use Redirect;
use DebugBar\DebugBar;
use Input;

class ModuleDataManagerController extends ModuleController {

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    public function __construct(){

        parent::__construct();

        \Debugbar::disable();
    }

    /**
     * Create Agency
     */
    public function anyIndex()
    {
        $title = 'Data manager';

        return $this->viewMake('arxmin::modules.data-manager', get_defined_vars());
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function anyBuild($id = null){


        if (Input::has('type')) {

        }

        $title = 'Data manager builder';

        /**
         * var $item Data
         */
        if ($id) {
            $item = Form::findOrFail($id);
        } else {
            $item = new Form();
        }

        $aForm = [];

        Hook::put('__app.scope.fields', $item['meta']);

        return $this->viewMake('arxmin::modules.data-builder', get_defined_vars());
    }


    public function anyEdit($id){

        $item = Post::findOrFail($id);

        # Special redirect for Form
        if ($item->type == 'form') {
            return Redirect::to(action('\\Arxmin\\ModuleDataManagerController@anyBuild') . '/' . $id);
        }

        Hook::put('__app.scope.fields', $item->form()['meta']);

        return $this->viewMake('arxmin::modules.data-editor', get_defined_vars());
    }

} 