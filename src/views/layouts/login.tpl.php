@extends('arxmin::html')

@section('head')
    @parent
@stop

@section('js')
    @parent
@stop

@section('body')
    <div class="container">
        <div class="row login-container column-seperation">
            <div class="col-md-5 col-md-offset-1">
                <h2>Sign in to Cherrylabs soldier</h2>
                <p>
                    Use Facebook, Twitter or your email to sign in.<br />
                    <a href="#">Sign up Now!</a> for a webarch account,It's free and always will be..
                </p>

                <button class="btn btn-block btn-info col-md-8" type="button">
                    <div class="pull-left"><i class="icon-facebook"></i></div>
                    <span class="bold">Login with Facebook</span>
                </button>

                <button class="btn btn-block btn-success col-md-8" type="button">
                    <div class="pull-left"><i class="icon-twitter"></i></div>
                    <span class="bold">Login with Twitter</span>
                </button>
            </div>

            <div class="col-md-5">
                <form id="login-form" class="login-form" action="index.html" method="post">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Username</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input type="text" name="txtusername" id="txtusername" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Password</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input type="password" name="txtpassword" id="txtpassword" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-md-10">
                            <div class="checkbox checkbox check-success">
                                <a href="#">Trouble login in?</a>&nbsp;&nbsp;
                                <input type="checkbox" id="checkbox1" value="1">
                                <label for="checkbox1">Keep me reminded </label>
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
