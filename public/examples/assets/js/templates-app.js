angular.module('templates-app', ['assets/templates/wide.tpl.html', 'assets/templates/with-sidebar.tpl.html']);

angular.module("assets/templates/wide.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("assets/templates/wide.tpl.html",
    "\n" +
    "<div class=\"layout-container layout-wide\">\n" +
    "    <div class=\"layout-content content\">\n" +
    "        <iframe ng-src=\"login.html\" frameborder=\"0\" class=\"content-iframe\"></iframe>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
}]);

angular.module("assets/templates/with-sidebar.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("assets/templates/with-sidebar.tpl.html",
    "\n" +
    "<div class=\"layout-container\">\n" +
    "    <div class=\"layout-sidebar sidebar-left\">\n" +
    "        <div class=\"sidebar-heading\">\n" +
    "            <a class=\"logo animated flipInX\" href=\"/\"><span><img src=\"assets/img/logo-180x50.png\" alt=\"\" /></span></a>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"sidebar-content\">\n" +
    "            <ul class=\"nav nav-pills nav-stacked\">\n" +
    "                <li ui-route=\"/dashboard\" ng-class=\"{active:$uiRoute}\">\n" +
    "                    <a href=\"/dashboard.html\"><i class=\"fa fa-home fa-lg fa-fw\"></i> <span>Dashboard</span></a>\n" +
    "                </li>\n" +
    "                <li ui-route=\"/iframe\" ng-class=\"{active:$uiRoute}\">\n" +
    "                    <a href=\"#/iframe\"><i class=\"fa fa-home fa-lg fa-fw\"></i> <span>Iframe</span></a>\n" +
    "                </li>\n" +
    "                <li ui-route=\"/logout\" ng-class=\"{active:$uiRoute}\">\n" +
    "                    <a href=\"#/logout\"><i class=\"fa fa-home fa-lg fa-fw\"></i> <span>Logout</span></a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"sidebar-footer\"></div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"layout-content content\">\n" +
    "        <iframe src=\"{{ url }}\" frameborder=\"0\" class=\"content-iframe\"></iframe>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
}]);
