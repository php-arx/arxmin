<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/packages/jsoneditor/jsoneditor-min.css">
    <script type="text/javascript" src="/packages/jsoneditor/jsoneditor-min.js"></script>
</head>
<body>
<div id="jsoneditor" style="width: 400px; height: 400px;"></div>

<script type="text/javascript" >
    // create the editor
    var container = document.getElementById("jsoneditor");
    var editor = new jsoneditor.JSONEditor(container);

    // set json
    var json = <?php echo Input::get('data') ?>;
    editor.set(json);

    // get json
    var json = editor.get();
</script>
</body>
</html>