@extends('arxmin::layouts.admin')

<?php
/**
 * Loader Config
 */
Hook::put('__app.scope.defaultValues', Hook::getJson('scope.defaultValue', (object)[]));
?>

@section('header')
@parent
<script>
    window.__app = <?= Hook::getJson('__app'); ?>;
</script>
@stop

@section('content')

<div class="container-fluid" ng-controller="formbuilderController">
    <div class="row">
        
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $this->title ?: 'Form Builder' ?></h1>
            </div>
            <div class="col-md-6">
                <a class="btn pull-right" ng-click="save()" href="#save">Save Data</a>
            </div>
        </div>

        <hr/>

        <div class="col-md-6" style="overflow: scroll;height: 700px;">
            <div fb-components></div>
        </div>

        <div class="col-md-6" style="overflow: scroll;height: 700px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Builder</h3>
                </div>
                <div fb-builder="default"></div>
                <div class="panel-footer">
                    <div class="checkbox">
                        <label><input type="checkbox" ng-model="isShowScope"/>
                            Show scope
                        </label>
                    </div>
                    <pre ng-if="isShowScope">{{form}}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@parent
<?php

echo Asset::css([
    Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder.css'
]);
?>
@stop

@section('js')
<script data-main="<?php echo $theme_url; ?>/js/components/formbuilder" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@stop