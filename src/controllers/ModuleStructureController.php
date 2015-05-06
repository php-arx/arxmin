<?php namespace Arxmin;

use Config;
use Hook;
use Redirect;
use Input;

class ModuleStructureController extends ModuleController {

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    public function __construct(){

        parent::__construct();
    }

    /**
     * Create Agency
     */
    public function anyIndex()
    {
        $title = __("Structure manager");

        return $this->viewMake('arxmin::modules.data-manager', get_defined_vars());
    }

    /**
     * Handle catégories structure
     */
    public function anyCategories()
    {
        $title = __("Categories manager");
        return $this->viewMake('arxmin::components.tree', get_defined_vars());
    }

    /**
     * Get Forms
     */
    public function anyForms()
    {

        $title = 'Content Type forms manager';

        Hook::put('__app.ajax.create.url', Arxmin::api('form'));
        Hook::put('__app.ajax.read.url', Arxmin::api('forms?format=datatable'));
        Hook::put('__app.ajax.update.url', Arxmin::api('form'));
        Hook::put('__app.ajax.delete.url', Arxmin::api('form'));
        Hook::put('__app.langs', Config::get('app.locales'));
        Hook::put('__app.forms', Form::all()->toArray());

        $table = 'data';

        $structure = [
            'id',
            'title',
            'type',
            'created_at',
            'updated_at',
        ];

        Hook::put('__app.scope.structure', $structure);
        Hook::put('__app.scope.type', Input::get('type', 'form'));

        Hook::put('__app.fields', json_decode('[
            {"label" : "id", "name" : "id"},
            {"label" : "title", "name" : "title"},
            {"label" : "type", "name" : "type"},
            {"label" : "created_at", "name" : "created_at"},
            {"label" : "updated_at", "name" : "updated_at"}
        ]', true));



        Hook::put('__app.columns', [
            ["data" => "id"],
            ["data" => "title"],
            ["data" => "type"],
            ["data" => "created_at"],
            ["data" => "updated_at"]
        ]);

        Hook::put('__app.scope.buttons', [
                ["sExtends"=> "editor_create", "editor"=> "editor" ],
                ["sExtends"=> "editor_remove", "editor"=> "editor" ]
        ]);

        //dd(Hook::get('__app'));

        return $this->viewMake('arxmin::modules.form-manager', get_defined_vars());
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

} 