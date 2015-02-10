<?php namespace Arxmin;

use Redirect;
use DebugBar\DebugBar;

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

    public function anyBuild($id = null){

        $title = 'Data manager builder';

        /**
         * var $item Data
         */
        if ($id) {
            $item = Data::findOrFail($id);
        } else {
            $item = new Data();
        }

        $aForm = $item->meta['custom_fields'];

        return $this->viewMake('arxmin::modules.data-manager-builder', get_defined_vars());
    }


    public function anyEdit($id){

        $item = Data::findOrFail($id);

        if ($item->type == 'form') {
            return Redirect::to(action('Arxmin\\ModuleDataManagerController@anyBuild') . '/' . $id);
        }

        return $this->viewMake('arxmin::modules.data-manager-edit', get_defined_vars());
    }

} 