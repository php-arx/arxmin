@extends('arxmin::html')

@section('body')
<div class="container arx-container" ng-controller="installController">
        <div class="col-sm-2 hidden-print arx-sidebar">
            <div data-spy="affix" data-offset-bottom="50" data-offset-top="50">
                <ul class="nav nav-clean">
                    <?php
                    echo \Arx\helpers\Bootstrap::nav(__('arxmin::install.menu', $user));
                    ?>
                </ul>
            </div>
        </div>
        <!--/ .arx-sidebar -->
        <div class="col-sm-10 arx-content">
            <h2>Welcome in Arx Installation</h2>

            <div id="step1" class="col-12 column">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-list-alt"></i> <?php echo __('arxmin::install.step.check.title') ?></h3>

                        <div class="btn-group">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i
                                    class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                        </div>
                    </div>
                    <div class="panel-body collapse in" id="collapse1">
                        <?php
                            echo \Arx\helpers\Bootstrap::table(array($requirements));
                        ?>
                        <a class="btn btn-success pull-right" href="#"><?php echo Lang::get('arxmin::install.action.refresh') ?></a>
                    </div>
                </div>

            </div>
            <!--/ #step1 -->

            <div id="step2" class="col-12 column">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-list-alt"></i> <?php echo __('arxmin::install.step.db.title') ?></h3>

                        <div class="btn-group">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i
                                    class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                        </div>
                    </div>
                    <div class="panel-body collapse in" id="collapse1">

                        <form action="<?php echo url('install') ?>" ng-controller="formDatabase">
                            <?php

                            Form::macro('boot', function(){
                                $aParams = func_get_args();
                                $label = $aParams[0];
                                $type = $aParams[1];
                                $name = $aParams[2];
                                unset($aParams[0], $aParams[1]);

                                $html = '<div class="form-group" id="form-'.$name.'">';

                                $html .= Form::label($name, $label);

                                $html .= call_user_func_array(array('Form', $type), $aParams);

                                $html .= '</div>';

                                return $html;
                            });

                            echo Form::boot('DB Type : ','select', 'dbtype', Config::get('database.connections'));

                            echo Form::boot('DB Type : ','select', 'dbtype', Config::get('database.connections'));

                            echo Form::boot('DB Type : ','select', 'dbtype', Config::get('database.connections'));

                            echo Form::boot('DB Type : ','select', 'dbtype', Config::get('database.connections'));

                            ?>
                        </form>
                    </div>
                </div>

            </div>
            <!--/ #step2 -->
        </div>
</div>
<!--/ .container -->

@stop

@section('js')
<script type="text/javascript" data-main="{{ asset('packages/arx/require/arxmin-form.js') }}"
        src="{{ asset('packages/requirejs/require.js') }}"></script>

<script type="text/javascript" src="{{ asset('packages/arxmin/assets/js/installController.js') }}"></script>
@include('arxmin::installController')
@stop