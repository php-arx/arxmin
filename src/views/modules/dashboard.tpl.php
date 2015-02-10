@extends('arxmin::layouts.admin')

@section('content')
<!-- #WidgetsZone -->
<div class="page-title">
</div>
<!-- BEGIN DASHBOARD TILES -->
<div class="row">
    <div class="col-md-4 col-vlg-3 col-sm-6">
        <div class="tiles green added-margin  m-b-20">
            <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">OVERALL SALES </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Overall Visits</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats ">
                    <div class="wrapper last">
                        <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="64.8%" ></div>
                </div>
                <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
            </div>
        </div>


    </div>
    <div class="col-md-4 col-vlg-3 col-sm-6">
        <div class="tiles blue added-margin  m-b-20">
            <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">OVERALL VISITS </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Overall Visits</span> <span class="item-count animate-number semi-bold" data-value="15489" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="551" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats ">
                    <div class="wrapper last">
                        <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="54%" ></div>
                </div>
                <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-vlg-3 col-sm-6">
        <div class="tiles purple added-margin  m-b-20">
            <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">SERVER LOAD </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Overall Load</span> <span class="item-count animate-number semi-bold" data-value="5695" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="568" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats ">
                    <div class="wrapper last">
                        <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="12459" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="90%" ></div>
                </div>
                <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-vlg-3 visible-xlg visible-sm col-sm-6">
        <div class="tiles red added-margin  m-b-20">
            <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">OVERALL SALES </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Overall Sales</span> <span class="item-count animate-number semi-bold" data-value="5669" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats">
                    <div class="wrapper transparent">
                        <span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="widget-stats ">
                    <div class="wrapper last">
                        <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">0</span>
                    </div>
                </div>
                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="64.8%" ></div>
                </div>
                <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
            </div>
        </div>
    </div>
</div>
<!-- END DASHBOARD TILES -->


<div class="row">
<div class="col-md-6 col-vlg-4">
<!-- BEGIN WEATHER DETAIL VIEW WIDGET -->
<div class="row tiles-container tiles white m-b-20">
    <div class="col-md-7  col-sm-7 b-grey b-r ">
        <h4 class="semi-bold text-center b-grey b-b no-margin p-t-20 p-b-10">California USA</h4>
        <div class="b-grey b-b">
            <h4 class="semi-bold text-center text-error">Sunday</h4>
            <h1 class="semi-bold text-center text-error">
                32&deg;
            </h1>
            <h5 class="text-center text-error">partly cloudy</h5>
            <div class="row auto m-t-10 m-b-10" >
                <div class="col-md-3 col-sm-3 col-xs-3  no-padding col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <canvas id="widget-2-cloudy-big" width="48"  height="48" class="h-align-middle "></canvas>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5 no-padding">
                    <div class="m-t-10">
                        <div class="pull-left m-l-5">
                            <canvas id="white_widget_13" width="16"  height="16" class="inline"></canvas>
                            <div class="inline">
                                <h5 class="semi-bold no-margin ">54</h5>
                                <p class="bold text-extra-small ">MPH</p>
                            </div>
                        </div>
                        <div class="pull-right m-r-10">
                            <canvas id="white_widget_14" width="16"  height="16" class="inline"></canvas>
                            <div class="inline">
                                <h5 class="semi-bold no-margin ">53</h5>
                                <p class="bold text-extra-small ">MM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row auto m-t-15">
            <div class="col-md-2 col-sm-2 col-xs-2 no-padding col-md-offset-1 col-xs-offset-1 b-grey b-r">
                <p class="text-center no-margin">11:30</p>
                <p class="text-center no-margin">PM</p>
                <canvas id="white_widget_01" width="20" height="20" class="h-align-middle m-t-10"></canvas>
                <h5 class="semi-bold text-center text-error">32&deg;</h5>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 no-padding b-grey b-r">
                <div class="text-center">11:30</div>
                <div class="text-center">PM</div>
                <canvas id="white_widget_02" width="20"  height="20" class="h-align-middle m-t-10"></canvas>
                <h5 class="semi-bold text-center text-error">32&deg;</h5>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 no-padding b-grey b-r">
                <div class="text-center">11:30</div>
                <div class="text-center">PM</div>
                <canvas id="white_widget_03" width="20"  height="20" class="h-align-middle m-t-10"></canvas>
                <h5 class="semi-bold text-center text-error">32&deg;</h5>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 no-padding b-grey b-r">
                <div class="text-center">11:30</div>
                <div class="text-center">PM</div>
                <canvas id="white_widget_04" width="20"  height="20" class="h-align-middle m-t-10"></canvas>
                <h5 class="semi-bold text-center text-error">32&deg;</h5>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 no-padding b-grey">
                <div class="text-center">11:30</div>
                <div class="text-center">PM</div>
                <canvas id="white_widget_05" width="20"  height="20" class="h-align-middle m-t-10"></canvas>
                <h5 class="semi-bold text-center text-error">32&deg;</h5>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-5 tiles grey">
        <div class=" p-t-25 p-r-10 p-l-10 p-b-15">
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold text-black m-r-15 text-right">Sun</span>
                    <canvas id="white_widget_06" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold  text-black m-r-15">Mon</span>
                    <canvas id="white_widget_07" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold  text-black m-r-15">Tue</span>
                    <canvas id="white_widget_08" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold  text-black m-r-5">Wed</span>
                    <canvas id="white_widget_09" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold  text-black m-r-5">Thur</span>
                    <canvas id="white_widget_10" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey b-b">
                <div class="pull-left"> <span class="bold  text-black m-r-15">Fri</span>
                    <canvas id="white_widget_11" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-b-10 m-b-10 b-grey">
                <div class="pull-left"> <span class="bold  text-black m-r-10">Sat</span>
                    <canvas id="white_widget_12" width="20"  height="20" class="inline m-l-10"></canvas>
                </div>
                <div class="pull-right"> <span class="semi-bold text-grey">32 - 28</span> <span class="bold text-error">C&deg; </span> </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WEATHER DETAIL VIEW WIDGET -->
<div class="row">
    <div class="col-md-7 m-b-20 col-lg-6 col-sm-6">
        <!-- BEGIN MINI WEATHER WIDGET -->
        <div class="row  tiles-container">
            <div class="col-md-5  col-xs-5 no-padding">
                <div class="tiles red p-t-20">
                    <canvas id="widget-partly-cloudy-day" width="64" height="64" class=" h-align-middle"></canvas>
                    <h6 class="bold text-white text-center p-b-15">WEDNESDAY</h6>
                </div>
            </div>
            <div class="col-md-7 col-xs-7 no-padding">
                <div class="tiles white text-center">
                    <h2 class="semi-bold text-error weather-widget-big-text no-margin p-t-20 p-b-10">34&deg;</h2>
                    <div class="tiles-title blend m-b-5">CURRENTLY</div>
                    <div class="pull-left m-l-15 ">
                        <canvas id="widget-wind" width="16" height="16" class="inline"></canvas>
                        <div class="inline">
                            <h5 class="semi-bold no-margin ">54</h5>
                            <p class="bold text-extra-small ">MPH</p>
                        </div>
                    </div>
                    <div class="pull-right m-r-25">
                        <canvas id="widget-sleet" width="16" height="16" class="inline"></canvas>
                        <div class="inline">
                            <h5 class="semi-bold no-margin ">53</h5>
                            <p class="bold text-extra-small ">MM</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- END WEATHER DETAIL VIEW WIDGET -->
    </div>
    <div class="col-md-5 col-lg-6 col-sm-6">
        <!-- BEGIN MINI WEATHER WIDGET -->
        <div class="row  tiles-container">
            <div class="col-md-7 col-xs-7 no-padding">
                <div class="tiles white text-center">
                    <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10">16&deg;</h2>
                    <div class="tiles-title blend p-b-25">CURRENTLY</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-5 col-xs-5 no-padding">
                <div class="tiles blue p-t-20">
                    <canvas id="widget-partly-rainy-day" width="64" height="64" class=" h-align-middle"></canvas>
                    <h6 class="bold text-white text-center p-b-15">MONDAY</h6>
                </div>
            </div>
        </div>
        <!-- END WEATHER DETAIL VIEW WIDGET -->
    </div>
</div>
<div class="row">
    <div class="col-md-12 m-b-20">
        <!-- BEGIN SALES WIDGET WITH FLOT CHART -->
        <div class="tiles white add-margin">
            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                <div class="row b-grey b-b xs-p-b-20">
                    <div class="col-md-4 col-sm-4">

                        <h4 class="text-black semi-bold">Total Income</h4>
                        <h3 class="text-success semi-bold">$15,354</h3>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="m-t-20">
                            <h5 class="text-black semi-bold">Total due</h5>
                            <h4 class="text-success semi-bold">$4,653</h4>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="m-t-20">
                            <input type="text" class="dark form-control" id="txtinput3" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="row b-grey">
                    <div class="col-md-3 col-sm-3">
                        <div class="m-t-10">
                            <p class="text-success">Open</p>
                            <p class="text-black">16:203.26</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="m-t-10">
                            <p class="text-success">Day Range</p>
                            <p class="text-black">01.12.13 - 01.01.14</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="m-t-10">

                            <div class="pull-left">
                                Cash
                            </div>
                            <div class="pull-right">
                                <span class="text-success">$10,525</span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pull-left">
                                Visa Classic
                            </div>
                            <div class="pull-right">
                                <span class="text-success">$5,989</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tiles grey" id="chart_1" style="height: 260px;width:100%">
            </div>
        </div>
        <!-- END SALES WIDGET WITH FLOT CHART -->
    </div>
</div>
</div>
<div class="col-md-6 col-vlg-8">
<div class="row tiles-container tiles white hidden-xlg m-b-20"  >
    <div class="col-md-7 b-grey b-r no-padding col-sm-7" style="height:520px">
        <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
            <h5 class="text-success bold inline">MARKET</h5>
            <h5 class="text-black bold inline m-l-10">DOW</h5>
            <div class=""> <i class="fa fa-sort-asc fa-2x text-error inline p-b-10" style="vertical-align: super;"></i>
                <h1 class="text-error bold inline no-margin"> 15,580.11</h1>
            </div>
        </div>
        <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
            <div class="pull-left">
                <p class="text-success">Open</p>
                <p class="text-black">16:203.26</p>
            </div>
            <div class="pull-right">
                <p class="text-success">Day Range</p>
                <p class="text-black">15,568.11 - 16,203.25</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="overlayer bottom-left fullwidth">
            <div class="overlayer-wrapper">
                <div class="" id="shares-chart-02" style="width:100%;height:220px;"> </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 no-padding col-sm-5">
        <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
            <h4 class="text-black ">Watchlist</h4>
            <input type="text" class="dark form-control" id="textinput4" placeholder="Search" >
        </div>
        <div class="scroller" data-height="410px" data-always-visible="1">
            <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
                <div class="pull-left">
                    <p class="small-text">GMY</p>
                </div>
                <div class="pull-right">
                    <p class="small-text">GMY & SKR 100</p>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">
                    <h4 class="semi-bold">18,500.11</h4>
                </div>
                <div class="pull-right" style="line-height: 27px;"> <span class="label label-important" style="vertical-align: bottom;">-318.2</span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
                <div class="pull-left">
                    <p class="small-text">KPM</p>
                </div>
                <div class="pull-right">
                    <p class="small-text">KPMG 350</p>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">
                    <h4 class="semi-bold">15,425.25</h4>
                </div>
                <div class="pull-right" style="line-height: 27px;"> <span class="label label-success" style="vertical-align: bottom;">+318.2</span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
                <div class="pull-left">
                    <p class="small-text">PTR</p>
                </div>
                <div class="pull-right">
                    <p class="small-text">PRT & SPR 245</p>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">
                    <h4 class="semi-bold">11,540.11</h4>
                </div>
                <div class="pull-right" style="line-height: 27px;"> <span class="label label-important" style="vertical-align: bottom;">-345.2</span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
                <div class="pull-left">
                    <p class="small-text">HGM</p>
                </div>
                <div class="pull-right">
                    <p class="small-text">HGM & POR 450</p>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">
                    <h4 class="semi-bold">9,500</h4>
                </div>
                <div class="pull-right" style="line-height: 27px;"> <span class="label label-success" style="vertical-align: bottom;">+100.2</span> </div>
                <div class="clearfix"></div>
            </div>
            <div class="p-l-15 p-r-15 p-b-10 p-t-10 b-b b-grey">
                <div class="pull-left">
                    <p class="small-text">MKR</p>
                </div>
                <div class="pull-right">
                    <p class="small-text">MKR & SPR 547</p>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">
                    <h4 class="semi-bold">15,855.11</h4>
                </div>
                <div class="pull-right" style="line-height: 27px;"> <span class="label label-important" style="vertical-align: bottom;">-318.2</span> </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="row hidden-xlg">
    <div class="col-md-12 m-b-20">
        <!-- BEGIN SALES WIDGET WITH FLOT CHART 2-->
        <div class="tiles white add-margin">
            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                <div class="row b-grey b-b xs-p-b-20">
                    <div class="col-md-4 col-sm-4">

                        <h4 class="text-black semi-bold">Total Visits</h4>
                        <h3 class="text-error semi-bold">25,850</h3>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="m-t-20">
                            <h5 class="text-black semi-bold">Today</h5>
                            <h4 class="text-error semi-bold">1,900</h4>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="m-t-20">
                            <input type="text" class="dark form-control" id="txtinput4" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="row b-grey">
                    <div class="col-md-3 col-sm-3">
                        <div class="m-t-10">
                            <p class="text-error">Open</p>
                            <p class="text-black">15:25:56</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="m-t-10">
                            <p class="text-error">Day Range</p>
                            <p class="text-black">01.02.2014 - 01.1.2015</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="m-t-10">

                            <div class="pull-left">
                                Cash
                            </div>
                            <div class="pull-right">
                                <span class="text-error">$10,525</span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pull-left">
                                Visa Classic
                            </div>
                            <div class="pull-right">
                                <span class="text-error">$5,989</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tiles grey" id="sales_chart_alt" style="height: 260px;position: relative;width:100%">	</div>
        </div>
        <!-- END SALES WIDGET WITH FLOT CHART -->
    </div>
</div>

<div class="row visible-xlg">
<div class="col-md-4 col-sm-6">
    <div class="row ">
        <!-- BEGIN BLOG POST SIMPLE-->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green " style="max-height:345px">
                    <div class="tiles-body">
                        <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
							highly customizable UI
							elements</span> </h3>
                        <div class="overlayer bottom-right fullwidth">
                            <div class="overlayer-wrapper">
                                <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                                    <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-comment-wrapper pull-left">
                                <div class="profile-wrapper"> <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                                <div class="comment">
                                    <div class="user-name text-black bold"> David <span class="semi-bold">Cooper</span> </div>
                                    <div class="preview-wrapper">@ revox </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                            <div class="clearfix"></div>
                            <div class="p-l-15 p-t-10 p-r-20">
                                <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                <div class="post p-t-10 p-b-10">
                                    <ul class="action-bar no-margin p-b-20 ">
                                        <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                                        <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST SIMPLE-->
    </div>
</div>

<div class="col-md-4 col-sm-6 hidden-sm">
    <div class="row">
        <!-- BEGIN BLOG POST WITH IMAGE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                        <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-profile-pic text-left">
                                <img width="69" height="69" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar2x.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" alt="">
                                <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
                            </div>
                            <div class="col-md-5 no-padding">
                                <div class="user-comment-wrapper">
                                    <div class="comment">
                                        <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                                        <div class="preview-wrapper">@ revox </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-7 no-padding">

                                <div class="clearfix"></div>
                                <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                                    <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                    <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST WITH IMAGE -->
    </div>
    <div class="row">
        <!-- BEGIN BLOG POST SIMPLE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles purple " style="max-height:345px">
                    <div class="tiles-body">

                        <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
                        highly customizable UI
                        elements</span> </h3>
                        <div class="overlayer bottom-right fullwidth">
                            <div class="overlayer-wrapper">
                                <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                                    <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-comment-wrapper pull-left">
                                <div class="profile-wrapper">
                                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d2x.jpg" width="35" height="35">
                                </div>
                                <div class="comment">
                                    <div class="user-name text-black bold"> Jane <span class="semi-bold">Smith</span> </div>
                                    <div class="preview-wrapper">@ webarch </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                            <div class="clearfix"></div>
                            <div class="p-l-15 p-t-10 p-r-20">
                                <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                <div class="post p-t-10 p-b-10">
                                    <ul class="action-bar no-margin p-b-20 ">
                                        <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                                        <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST SIMPLE -->
    </div>
</div>

<div class="col-md-4 col-sm-6">
    <div class="row">
        <!-- BEGIN BLOG POST WITH MAP -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles white p-t-15  m-b-20">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile-img-wrapper pull-left m-l-10">
                                <div class=" p-r-10">
                                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h2x.jpg" width="35" height="35">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="user-name text-black bold large-text"> David <span class="semi-bold">Jester</span> </div>
                            <div class="preview-wrapper">was with <span class="bold">Jane Smith</span> and 4 others at <span class="bold">The Shore By O</span>.</div>
                        </div>
                    </div>
                    <div id="location-map-2" class="m-t-15 " style="height: 200px"> </div>
                    <div class="post p-b-15 p-t-15 p-l-15 b-b b-grey">
                        <ul class="action-bar no-margin ">
                            <li><a href="#" class="muted"><i class="fa fa-comment m-r-5"></i> 24</a> </li>
                            <li><a href="#" class="text-error bold"> <i class="fa fa-heart-o  m-r-5"></i> 5</a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <p class="p-t-10 p-b-10 p-l-15 p-r-15"><span class="bold">Jane Smith, John Smith, David Jester, pepper</span> post and 214 others like this.</p>
                    <div class="clearfix"></div>
                    <div class="p-b-10 p-l-10 p-r-10">
                        <div class="profile-img-wrapper pull-left">
                            <img width="35" height="35" alt="" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e2x.jpg"> </div>
                        <div class="inline pull-right" style="width:86%">
                            <div class="input-group transparent ">
                                <input type="text" class="form-control" placeholder="Write a comment">
                                <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST WITH MAP -->
    </div>
    <div class="row">
        <!-- BEGIN BLOG POST WITH IMAGE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                        <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-profile-pic text-left">
                                <img width="69" height="69" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar2x.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" alt="">
                                <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
                            </div>
                            <div class="col-md-5 no-padding">
                                <div class="user-comment-wrapper">
                                    <div class="comment">
                                        <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                                        <div class="preview-wrapper">@ revox </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-7 no-padding">

                                <div class="clearfix"></div>
                                <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                                    <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                    <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN BLOG POST WITH IMAGE -->
    </div>
</div>

</div>

</div>
</div>
<div class="row hidden-xlg">
<div class="col-md-4 col-sm-6">
    <div class="row ">
        <!-- BEGIN BLOG POST SIMPLE-->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green " style="max-height:345px">
                    <div class="tiles-body">
                        <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
							highly customizable UI
							elements</span> </h3>
                        <div class="overlayer bottom-right fullwidth">
                            <div class="overlayer-wrapper">
                                <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                                    <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-comment-wrapper pull-left">
                                <div class="profile-wrapper"> <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                                <div class="comment">
                                    <div class="user-name text-black bold"> David <span class="semi-bold">Cooper</span> </div>
                                    <div class="preview-wrapper">@ revox </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                            <div class="clearfix"></div>
                            <div class="p-l-15 p-t-10 p-r-20">
                                <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                <div class="post p-t-10 p-b-10">
                                    <ul class="action-bar no-margin p-b-20 ">
                                        <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                                        <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST SIMPLE-->
    </div>
    <div class="row">
        <!-- BEGIN BLOG POST WITH CAROUSEL IMAGE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles white p-t-15">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile-img-wrapper pull-left m-l-10">
                                <div class=" p-r-10">
                                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/c.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/c.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/c2x.jpg" width="35" height="35"> </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="user-name text-black bold large-text"> John <span class="semi-bold">Smith</span> </div>
                            <div class="preview-wrapper">shared a picture with <span class="bold">Jane Smith</span>.</div>
                        </div>
                    </div>
                    <div id="image-demo-carl" class="m-t-15 owl-carousel owl-theme">
                        <div class="item"><img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/1.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/2.jpg" alt=""></div>
                    </div>
                    <div class="post p-b-15 p-t-15 p-l-15 b-b b-grey">
                        <ul class="action-bar no-margin ">
                            <li><a href="#" class="muted"><i class="fa fa-comment m-r-5"></i> 24</a> </li>
                            <li><a href="#" class="text-error bold"> <i class="fa fa-heart-o  m-r-5"></i> 5</a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <p class="p-t-10 p-b-10 p-l-15 p-r-15"><span class="bold">Jane Smith, John Smith, David Jester, pepper</span> post and 214 others like this.</p>
                    <div class="clearfix"></div>
                    <div class="p-b-10 p-l-10 p-r-10">
                        <div class="profile-img-wrapper pull-left"> <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                        <div class="inline pull-right" style="width:86%">
                            <div class="input-group transparent ">
                                <input type="text" class="form-control" placeholder="Write a comment">
                                <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST WITH CAROUSEL IMAGE -->
    </div>
</div>

<div class="col-md-4 col-sm-6 hidden-sm">
    <div class="row">
        <!-- BEGIN BLOG POST WITH IMAGE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                        <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-profile-pic text-left">
                                <img width="69" height="69" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar2x.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" alt="">
                                <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
                            </div>
                            <div class="col-md-5 no-padding">
                                <div class="user-comment-wrapper">
                                    <div class="comment">
                                        <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                                        <div class="preview-wrapper">@ revox </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-7 no-padding">

                                <div class="clearfix"></div>
                                <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                                    <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                    <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST WITH IMAGE -->
    </div>
    <div class="row">
        <!-- BEGIN BLOG POST SIMPLE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles purple " style="max-height:345px">
                    <div class="tiles-body">

                        <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
                        highly customizable UI
                        elements</span> </h3>
                        <div class="overlayer bottom-right fullwidth">
                            <div class="overlayer-wrapper">
                                <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                                    <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-comment-wrapper pull-left">
                                <div class="profile-wrapper">
                                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/d2x.jpg" width="35" height="35">
                                </div>
                                <div class="comment">
                                    <div class="user-name text-black bold"> Jane <span class="semi-bold">Smith</span> </div>
                                    <div class="preview-wrapper">@ webarch </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                            <div class="clearfix"></div>
                            <div class="p-l-15 p-t-10 p-r-20">
                                <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                <div class="post p-t-10 p-b-10">
                                    <ul class="action-bar no-margin p-b-20 ">
                                        <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                                        <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST SIMPLE -->
    </div>
</div>

<div class="col-md-4 col-sm-6">
    <div class="row">
        <!-- BEGIN BLOG POST WITH MAP -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles white p-t-15  m-b-20">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile-img-wrapper pull-left m-l-10">
                                <div class=" p-r-10">
                                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h.jpg" alt="" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/h2x.jpg" width="35" height="35">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="user-name text-black bold large-text"> David <span class="semi-bold">Jester</span> </div>
                            <div class="preview-wrapper">was with <span class="bold">Jane Smith</span> and 4 others at <span class="bold">The Shore By O</span>.</div>
                        </div>
                    </div>
                    <div id="location-map" class="m-t-15 " style="height: 200px"> </div>
                    <div class="post p-b-15 p-t-15 p-l-15 b-b b-grey">
                        <ul class="action-bar no-margin ">
                            <li><a href="#" class="muted"><i class="fa fa-comment m-r-5"></i> 24</a> </li>
                            <li><a href="#" class="text-error bold"> <i class="fa fa-heart-o  m-r-5"></i> 5</a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <p class="p-t-10 p-b-10 p-l-15 p-r-15"><span class="bold">Jane Smith, John Smith, David Jester, pepper</span> post and 214 others like this.</p>
                    <div class="clearfix"></div>
                    <div class="p-b-10 p-l-10 p-r-10">
                        <div class="profile-img-wrapper pull-left">
                            <img width="35" height="35" alt="" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e.jpg" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/e2x.jpg"> </div>
                        <div class="inline pull-right" style="width:86%">
                            <div class="input-group transparent ">
                                <input type="text" class="form-control" placeholder="Write a comment">
                                <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BLOG POST WITH MAP -->
    </div>
    <div class="row">
        <!-- BEGIN BLOG POST WITH IMAGE -->
        <div class="col-md-12 m-b-20">
            <div class="widget-item narrow-margin">
                <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                        <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                <div class="tiles white ">
                    <div class="tiles-body">
                        <div class="row">
                            <div class="user-profile-pic text-left">
                                <img width="69" height="69" data-src-retina="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar2x.jpg" data-src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" src="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/img/profiles/avatar.jpg" alt="">
                                <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
                            </div>
                            <div class="col-md-5 no-padding">
                                <div class="user-comment-wrapper">
                                    <div class="comment">
                                        <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                                        <div class="preview-wrapper">@ revox </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-7 no-padding">

                                <div class="clearfix"></div>
                                <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                                    <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                                    <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN BLOG POST WITH IMAGE -->
    </div>
</div>
<!--/#widgetsZone -->
@stop