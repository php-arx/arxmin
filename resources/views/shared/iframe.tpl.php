@extends('arxmin::layouts.admin')

@section('content')
<iframe class="arx-iframe" src="/packages/arx/core/dist/img/arx-logo.png" frameborder="0" width="100%" height="1000"><br /><br /><br />
    <a href="<?php echo $url ?>" target="_blank">Click here if you don't see the frame</a>
</iframe>
<!--/.content -->
@stop

@section('js')
    @parent
    <script type="text/javascript">
        $(function(){
            var url = "<?php echo $url; ?>";
            var loading_url = "/packages/arx/core/dist/img/arx-logo.png";
            $('.arx-iframe').attr('src',loading_url);
            $.ajax({
                url: url,
                type: 'GET',
                complete: function(e, xhr, settings){

                    if(e.status === 200){
                        $('.arx-iframe').attr('src', url);
                    } else {

                        var w = 1024;
                        var h = 768;

                        var left = ($(window).width()/2)-(w/2);
                        var top = ($(window).height()/2)-(h/2);

                        var iframeListener = window.open(url, '4','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width='+w+', height='+h+', top='+top+', left='+400);

                        window.focus();

                        $('a').on('click', function(){
                            iframeListener.close();
                        })
                    }
                }
            });
        })
</script>
@stop