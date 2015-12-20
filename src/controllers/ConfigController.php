<?php namespace Arxmin;

use Arxmin\helpers\DatacrudHelper;
use Arxmin\helpers\DatagridHelper;
use Input;

class ConfigController extends BaseController {

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

        $grid->add('name', trans("name"));
        $grid->add('value', trans("value"));
        $grid->add('type', trans("type"));
        $grid->add('created_at', trans("created_at"));
        $grid->add('updated_at', trans("updated_at"));
        $grid->addActions('config/option', trans("Actions"));

        $grid->link("arxmin/config/option?create=true", trans("Add a new option"), "TR");

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

            return redirect('arxmin/config')->with('flash', trans('Option deleted'));

        } else {
            $source = new Option();
        }

        $form = DatacrudHelper::source($source);

        $form->title = 'Option';

        $form->link("arxmin/config", trans("config"), "TR")->back();
        $form->add('name', trans("Name"), 'text')->rule('required');
        $form->add('value', trans("Value"), 'textarea')->rule('required');
        $form->add('type', trans("Type"), 'text')->rule('required');

        return $this->viewMake('arxmin::shared.datacrud', get_defined_vars());
    }

}