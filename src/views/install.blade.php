@extends('arxmin::html')
@section('body')
<div class="container arx-container">
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
                        <form action="<?php echo url('install') ?>" ng-controller="formDatabase">
                            <?php echo Form::select('dbtype', Config::get('database.connections')) ?>
                            <?php echo Form::input('dbtype', Config::get('database.connections')) ?>
                            <?php echo Form::select('dbtype', Config::get('database.connections')) ?>
                            <?php echo Form::select('dbtype', Config::get('database.connections')) ?>
                        </form>
                    </div>
                </div>

            </div>
            <!--/ #step1 -->
        </div>
</div>
<!--/ .container -->

@stop

@section('js')
<script type="text/javascript" data-main="{{ asset('packages/arx/require/arxmin-form.js') }}"
        src="{{ asset('packages/requirejs/require.js') }}"></script>
@stop