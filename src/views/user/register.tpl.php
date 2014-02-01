@extends('arx::layouts.bootstrap')

@section('css')
    @parent
@stop

@section('js')
    @parent

<script type="text/javascript">
    $(function () {
        $('.button-checkbox').each(function () {

            // Settings
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

            // Event Handlers
            $button.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });

            // Actions
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $button.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                    $button
                        .removeClass('btn-default')
                        .addClass('btn-' + color + ' active');
                }
                else {
                    $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-default');
                }
            }

            // Initialization
            function init() {

                updateDisplay();

                // Inject the icon if applicable
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                }
            }
            init();
        });
    });
</script>
@stop
@section('content')
<div class="container" style="margin-top: 50px">
    @if($this->success)
        <br/>
        <div class="alert alert-success">
            Thanks for register to the early access bee program. Spread the word and get money starting now !


        </div>
    @else
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form">
                <h2>Become a bee <small>It's free and always will be(e) !</small></h2>
                <hr class="colorgraph">
                @if(isset($sLoginFacebook))
                <div class="row">
                    <div class="col-xs-12 col-md-12"><a href="<% $sLoginFacebook %>" class="btn btn-primary btn-block btn-lg"><i class="fa fa-facebook-square"></i> Register using Facebook</a></div>
                </div><br />
                @else
                <input type="hidden" name="facebook_id" value="<% $this->user['id'] %>"/>
                <input type="hidden" name="facebook_token" value="<% $this->token %>"/>
                @endif
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required="required" value="<% $this->user['first_name'] %>">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required="required"  value="<% $this->user['last_name'] %>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required="required"   value="<% $this->user['email'] %>">
                </div>
                <div class="form-group">
                    <input type="email" name="paypal_email" id="email" class="form-control input-lg" placeholder="Paypal Email Address (leave it blank if no Paypal account)" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" required="required"  name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" required="required"  name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        By clicking <strong class="label label-success">Register</strong>, you agree to the <a href="<% url('docs/terms.pdf')  %>" target="_blank">Terms and Conditions</a> set out by this site, including our Cookie Use.
                    </div>
                </div>

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-12"><input type="submit" value="Register for the beta test program and make money now !" class="btn btn-success btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>
        </div>
    </div>
    @endif
@stop