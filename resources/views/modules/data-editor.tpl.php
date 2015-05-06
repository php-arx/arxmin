@extends('arxmin::layouts.admin')

<?php
/**
 * Variables declarations
 */

?>

@section('content')

    <div class="container-fluid" ng-controller="editorController">
        <?= Former::open()
                ->id('MyForm')
                ->secure()
                ->rules(['name' => 'required'])
                ->action('#')
                ->class('form')
                ->method('post'); ?>
        <div class="row" style="height: 1000px;">
            <div class="col-sm-9 scrollable">
                <?php
                echo FormHelper::text('title', $item['title']);
                echo FormHelper::group(__('slug'), FormHelper::text('slug', $item['slug']));

                echo FormHelper::group(__('body'), Form::textarea('body', $item['body'], ['class' => 'ckeditor', 'rows' => 10, 'columns' => 30]));
                ?>

                <div class="row">
                    <h2>Meta Fields
                        <a class="btn btn-default" href="<?php echo url('arxmin/module/data-manager/build/'.$item->form()->id); ?>" target="_blank">Edit fields</a>
                    </h2>
                    <hr/>
                    <form class="form-horizontal">
                        <div ng-model="input" fb-form="default" fb-default="defaultValue"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" ng-click="submit()" class="btn btn-default"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 scrollable">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Publish</h3>
                    </div>
                    <div class="panel-body">
                        <button type="submit" class="btn btn-primary" ng-click="submit()"><?php echo __("Validate") ?></button>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Language</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            echo FormHelper::group(FormHelper::select('lang', Arxmin::getLangs(), $item['lang']));
                        ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Catégories</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
        <?= Former::close(); ?>
    </div><!-- .container-fluid-->
@stop

@section('css')
    @parent
    <?php

    echo Asset::css([
            Arxmin::getThemeUrl('/plugins') . '/angular-form-builder/dist/angular-form-builder.css'
    ]);
    ?>
@stop


@section('js')
<script data-main="<?php echo $theme_url; ?>/js/components/editor" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@stop