@extends('arxmin::layouts.admin')

@section('content')
<div class="container-fluid">
    <ul class="breadcrumb">
        <li>
            <p><i class="fa fa-home"></i></p>
        </li>
        <li><a href="#" class="active">Dashboard</a></li>
    </ul>
    <div class="page-title">
        <h3><i class="fa fa-angle-right"></i> Dashboard</h3 >
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 sortable">
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>Grid <span class="semi-bold">One</span></h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                        </div>
                        <div class="grid-body no-border">
                            <div class="row-fluid">
                                <div class="scroller scrollbar-dynamic" data-height="245px">
                                    <h3>Drag <span class="semi-bold">Me</span></h3>
                                    <h4><span class="semi-bold">Open Me</span>, Light , <span class="semi-bold">Bold</span> , <i>Everything</i></h4>
                                    <p>The overflow is clipped, and the rest of the content will be invisible, Play it ». scroll, The overflow is clipped, but a scroll-bar is added to see the rest of the </p>
                                    <p> default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                                    <p>The scroll event is sent to an element when the user scrolls to a different place in the element. It applies to window objects, but also to scrollable frames and elements with the overflow CSS property set to scroll (or auto when the element's explicit height or width is less than the height or width of its contents).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sortable">
                    <div class="grid simple vertical green">
                        <div class="grid-title no-border">
                            <h4>Grid <span class="semi-bold">One</span></h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                        </div>
                        <div class="grid-body no-border">
                            <div class="scroller scrollbar-hidden" data-height="245px" >
                                <div class="row-fluid">
                                    <div>
                                        <h3>Colored<span class="semi-bold"> Band</span></h3 >
                                        <div class="color-bands green"></div>
                                        <div class="color-bands purple"></div>
                                        <div class="color-bands red"></div>
                                        <div class="color-bands blue"></div>
                                        <br>
                                        <p>The overflow is clipped, and the rest of the content will be invisible, Play it ». scroll, The overflow is clipped, but a scroll-bar is added to see the rest of the </p>
                                        <p> default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                                        <p>The scroll event is sent to an element when the user scrolls to a different place in the element. It applies to window objects, but also to scrollable frames and elements with the overflow CSS property set to scroll (or auto when the element's explicit height or width is less than the height or width of its contents).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 sortable">
                    <div class="grid simple">
                        <div class="grid-title">
                            <h4>Grid Two</h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                        </div>
                        <div class="grid-body">
                            <div class="scroller scrollbar-hidden" data-height="220px">
                                <h3>Scroll is <span class="semi-bold">hidden</span></h3>
                                <h4><span class="semi-bold">Open Me</span>, Light , <span class="semi-bold">Bold</span> , <i>Everything</i></h4>
                                <p>The overflow is clipped, and the rest of the content will be invisible, Play it ». scroll, The overflow is clipped, but a scroll-bar is added to see the rest of the </p>
                                <p> default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                                <p>The scroll event is sent to an element when the user scrolls to a different place in the element. It applies to window objects, but also to scrollable frames and elements with the overflow CSS property set to scroll (or auto when the element's explicit height or width is less than the height or width of its contents).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sortable">
                    <div class="grid simple vertical green">
                        <div class="grid-title no-border">
                            <h4>Grid <span class="semi-bold">One</span></h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                        </div>
                        <div class="grid-body no-border">
                            <div class="row-fluid">
                                <div class="scroller scrollbar-hidden" data-height="245px" >
                                    <h3>Colored<span class="semi-bold"> Band</span></h3 >
                                    <div class="color-bands green"></div>
                                    <div class="color-bands purple"></div>
                                    <div class="color-bands red"></div>
                                    <div class="color-bands blue"></div>
                                    <br>
                                    <p>The overflow is clipped, and the rest of the content will be invisible, Play it ». scroll, The overflow is clipped, but a scroll-bar is added to see the rest of the </p>
                                    <p> default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                                    <p>The scroll event is sent to an element when the user scrolls to a different place in the element. It applies to window objects, but also to scrollable frames and elements with the overflow CSS property set to scroll (or auto when the element's explicit height or width is less than the height or width of its contents).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop