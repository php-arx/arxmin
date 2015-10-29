<?php namespace Arxmin;

use Arxmin\helpers\DatacrudHelper;
use Arxmin\helpers\DatagridHelper;
use Input;

class ConfigController extends ModuleController {

    /**
     * Config Handler
     *
     * @param null $path
     * @return \Illuminate\View\View
     */
    public function anyIndex($path = null){

        $title = 'Configuration';

        $grid = DatagridHelper::source(Option::orderBy('id'));

        $grid->title = 'Options manager';

        $grid->add('name', __("name"));
        $grid->add('value', __("value"));
        $grid->add('type', __("type"));
        $grid->add('created_at', __("created_at"));
        $grid->add('updated_at', __("updated_at"));
        $grid->addActions('config/option', __("Actions"));

        $grid->link("arxmin/config/option?create=true", __("Add a new option"), "TR");

        return $this->viewMake('arxmin::shared.datagrid', get_defined_vars());
    }

    public function anyOption(){


        $title = 'Configuration';

        if (Input::has('show')) {
            $source = Option::find(Input::get('show'));
        } elseif (Input::has('edit')) {
            $source = Option::find(Input::get('edit'));
        } elseif (Input::has('delete')) {

            $source = Option::find(Input::get('delete'));
            $source->delete();

            return redirect('arxmin/config')->with('flash', __('Option deleted'));

        } else {
            $source = new Option();
        }

        $form = DatacrudHelper::source($source);

        $form->title = 'Option';

        $form->link("arxmin/config", __("config"), "TR")->back();
        $form->add('name', __("Name"), 'text')->rule('required');
        $form->add('value', __("Value"), 'textarea')->rule('required');
        $form->add('type', __("Type"), 'text')->rule('required');

        return $this->viewMake('arxmin::shared.datacrud', get_defined_vars());
    }

}