@extends('layouts.admin')

@section('css')
@parent
<style type="text/css">
    /* app css stylesheet */

    .menu {
        list-style: none;
        border-bottom: 0.1em solid black;
        margin-bottom: 2em;
        padding: 0 0 0.5em;
    }

    .menu:before {
        content: "[";
    }

    .menu:after {
        content: "]";
    }

    .menu > li {
        display: inline;
    }

    .menu > li:before {
        content: "|";
        padding-right: 0.3em;
    }

    .menu > li:nth-child(1):before {
        content: "";
        padding: 0;
    }

    .smart-table-data-row.selected {
        background: darkgray;
    }

    .header-content:before {
        content: ' ';
        position: relative;
        left: -5px;
    }

    .sort-ascent:before {
        content: "\25B4";
    }

    .sort-descent:before {
        content: "\25BE";
    }

    .pagination {
        text-align: center;
        cursor: pointer;
    }

    .smart-table th {
        width: 120px;
        padding: 0 20px;
    }

    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }
</style>
@stop

@section('menu')
@parent
@stop

@section('content')
<div class="content" ng-app="labelApp" ng-controller="labelCtrl">
    <div class="page-title">
        <h3>
            <% $this->pageTitle ?: implode('/', Request::segments()) %>
        </h3>
    </div>

    <div class="row">
        <div class="col-sm-6">

            <a class="btn" href="?labelRefresh=true">Force Refresh</a>
            <a class="btn" href="?writeMode=true">Enter WriteMode</a>
            <a class="btn" href="?readMode=true">Enter ReadMode</a>

        </div>
        <div class="col-sm-6">

            <form action="<% url('admin/label-manager') %>" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" />
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="table-responsive">
                <smart-table class="table table-striped" table-title="Smart Table example" columns="columnCollection" rows="rowCollection" config="globalConfig"></smart-table>
            </div>

        </div>
    </div>
</div>
<!--/.content -->
@stop

@section('js')
    @parent
    <script>
        'use strict';

        // Declare app level module which depends on filters, and services
        var app = angular.module('labelApp', ['smartTable.table']);

        app.directive('columnFilter', function () {
            return {
                restrict: 'C',
                require: '^smartTable',
                link: function (scope, element, attrs, ctrl) {
                    scope.searchValue = '';
                    scope.$watch('searchValue', function (value) {
                        ctrl.search(value, scope.column);
                    });
                }
            };
        });

        app.controller('labelCtrl', ['$scope', '$http', function (scope, http) {

            scope.columnCollection = [
                {label: 'id', map: 'id'},
                {label: 'uniqueid', map: 'uniqueid', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'},
                {label: 'en', map: 'en', isEditable: true, type: 'text', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'},
                {label: 'fr', map: 'fr', isEditable: true, type: 'text', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'},
                {label: 'nl', map: 'nl', isEditable: true, type: 'text', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'},
                {label: 'updated_at', map:'updated_at'},
                {label: 'key', map:'key', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'},
                {label: 'group', map:'group', headerTemplateUrl: '<% Request::url().'?filterHtml=true' %>'}
            ];

            scope.rowCollection = <% json_encode(Label::all()->toArray()) %>;

            scope.globalConfig = {
                isPaginationEnabled: true,
                isGlobalSearchActivated: true,
                itemsByPage: 100,
                syncColumns: false
            };

            scope.$on('updateDataRow', function (event, arg) {
                http({
                    method: "POST",
                    data: arg.item,
                    url: "<% Request::url() %>"
                }).success(function(data){
                    console.log(data);
                });
            });


        }]);
    </script>

@stop