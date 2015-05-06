@extends('layouts.admin')
<?php
$noheader = true;
$nosidebar = true;
?>
@section('content')
<div class="container"><br/><br/><br/><br/><br/>
    <?php echo $this->content; ?>
</div>
@stop