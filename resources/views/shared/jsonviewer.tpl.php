<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/plugins/jsoneditor/jsoneditor.min.css">
    <script src="<?php echo $theme_url; ?>/js/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>/plugins/jsoneditor/jsoneditor.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation" style="height: 50px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#" class="save">Save</a></li>
                <li><a href="#" class="preview">Preview</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div id="jsoneditor" style="width: 100%; height: 100%;position: absolute;top:50px;bottom: 0;right: 0;"></div>

<script type="text/javascript">
    // create the editor
    var container = document.getElementById('jsoneditor');

    var options = {
        mode: 'tree',
        modes: ['code', 'form', 'text', 'tree', 'view'], // allowed modes
        error: function (err) {
            alert(err.toString());
        }
    };

    var editor = new JSONEditor(container, options);


    // set json
    var json = <?php echo isset($data) ? $data : Input::get('data', '{}') ?>;
    editor.set(json);

    $(function () {
        $('.save').on('click', function () {
            $.ajax({
                url: "?action=save",
                data: {data : editor.get()}
            }).done(function () {

            });
        });

        $('.preview').on('click', function () {
            $.ajax({
                url: "?action=preview",
                data : {data : editor.get()},
                type: "POST",
                success: function (data) {
                    var win = window.open();
                    win.document.write(data);
                }
            });
        });
    })
</script>
</body>
</html>