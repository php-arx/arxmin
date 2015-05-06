@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="col-xs-12">
            <h1><% $title %></h1>

            <% $table->render() %>
        </div>
    </div>
@stop

@section('js')
    @parent
    <% $table->script() %>
    <script>
        $(function(){
            $('.lb').fancybox();

            $(document).on('click', '.js-confirm', function (e) {
                e.preventDefault();

                if (confirm('Are you sure you want to do this?')) {
                    window.document.location.href = $(this).attr('href');
                }
            });

            /*$(document).on('.ajax', 'click', function (e) {
                e.preventDefault();

                var $el = $(e.target);
                var url = $el.attr('href');
                var data = $el.data('params') || {};

                if (!$el.hasClass('busy')) {
                    $el.addClass('busy');

                    $.post(url, data, function () {
                        if ($el.data('remove-parent')) {
                            $el.closest($el.data('remove-parent')).remove();
                        }

                        $el.removeClass('busy');
                    });
                }
            });*/
        })
    </script>
@stop
