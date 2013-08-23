@extends('arxmin::layouts.html')

@section('body')
<div class="container arx-container">
<div class="row">
<div class="col-sm-12 arx-content">

    <h2>{{ lg('arxmin::dashboard.title') }}</h2>
    <ul class="breadcrumb">
        <li><a href="#">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="#">Home</a></li>
    </ul>

    <div class="row">
        <div class="column col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-chevron-sign-down"></i> Collapsible panel</h3>

                    <div class="btn-group">
                        <a class="btn btn-link" href="#"><i class="icon-unlock"></i></a>
                        <a class="btn btn-link" href="#"><i class="icon-paper-clip"></i></a>
                        <a class="btn btn-link" href="#"><i class="icon-save"></i></a>
                        <a class="btn btn-link" href="#"><i class="icon-wrench"></i></a>
                        <a class="btn btn-link" href="#"><i class="icon-cogs"></i></a>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                    </div>
                </div>
                <div class="panel-body collapse in" id="collapse1">
                    <h4>Lorem ipsum dolor sit amet</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, reiciendis amet porro veniam ad molestias eos mollitia rerum voluptatem error atque deleniti velit ab aperiam ipsum aliquid adipisci perferendis minus.
                    </p>
                </div>
            </div><!--/ .panel -->

            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-cny"></i> Panel inverse</h3>

                    <div class="btn-group">
                        <a class="btn btn-link" href="#"><i class="icon-search"></i></a>
                        <a class="btn btn-link" href="#"><i class="icon-star"></i></a>

                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2"><i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                    </div>
                </div>
                <ul class="media-list collapse in" id="collapse2">
                    <li class="media">
                        <a href="#" class="pull-left"><img src="http://dummyimage.com/60x60/999999/fff.png" alt="" class="media-object"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Katharina Dupont</h4>
                            <h5>Title of the message</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        </div>
                    </li>
                    <li class="media">
                        <a href="#" class="pull-left"><img src="http://dummyimage.com/60x60/999999/fff.png" alt="" class="media-object"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Katharina Dupont</h4>
                            <h5>Title of the message</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        </div>
                    </li>
                    <li class="media">
                        <a href="#" class="pull-left"><img src="http://dummyimage.com/60x60/999999/fff.png" alt="" class="media-object"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Katharina Dupont</h4>
                            <h5>Title of the message</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        </div>
                    </li>
                </ul>
            </div><!--/ .panel -->
        </div>
        <div class="column col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-collapse-alt"></i> Static panel</h3>
                </div>
                <div class="panel-body">
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Collapsible Group Item #1</a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Collapsible Group Item #2</a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Collapsible Group Item #3</a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/ .panel -->

            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td rowspan="2">1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><span class="label label-info">@mdo</span></td>
                    </tr>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><span class="label label-info">@TwBootstrap</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td><span class="label label-info">@fat</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td colspan="2">Larry the Bird</td>
                        <td><span class="label label-info">@twitter</span></td>
                    </tr>
                    </tbody>
                </table>
            </div><!--/ .panel -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel">
                <ul class="panel-heading nav nav-tabs">
                    <li><a href="#home" data-toggle="tab">Home</a></li>
                    <li><a href="#profile" data-toggle="tab">Profile</a></li>
                    <li><a href="#messages" data-toggle="tab">Messages</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="home">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="profile">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="messages">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="settings">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                </div>
            </div><!--/ .panel -->
        </div>
        <div class="col-sm-6">
            <div class="panel panel-inverse">
                <ul class="panel-heading nav nav-tabs">
                    <li><a href="#home2" data-toggle="tab">Home</a></li>
                    <li><a href="#profile2" data-toggle="tab">Profile</a></li>
                    <li><a href="#messages2" data-toggle="tab">Messages</a></li>
                    <li><a href="#settings2" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="home2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="profile2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="messages2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                    <div class="tab-pane" id="settings2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, eligendi, dolorum, modi impedit assumenda omnis ratione officia aliquid corporis eius magnam nisi ut sapiente iste alias nam repudiandae quidem ab?</p>
                    </div>
                </div>
            </div><!--/ .panel -->
        </div>
    </div>
</div>
</div>
</div>
@stop