<a href="<?php echo $view['router']->path('home_page') ?>#!/dashboard" class="navbar-brand dashboard" ng-click="active='dashboard'">Angular CRUD</a>
<a ng-repeat="m  in menus" class="navbar-brand {{ m.title }}" href="<?php echo $view['router']->path('home_page') ?>#!/{{ m.href }}" >{{ m.title }}</a>