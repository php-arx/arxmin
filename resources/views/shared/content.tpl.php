@extends('layouts.admin')
<?php
/**
 * Simple content page without header and sidebar example
 */
$noheader = true;
$nosidebar = true;
?>
@section('content')
<div class="container">
    <?php echo $this->content; ?>
</div>
@stop