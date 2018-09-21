<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="app" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="app" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="app" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="app" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Angular CRUD</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/html5-boilerplate/dist/css/normalize.css">
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/html5-boilerplate/dist/css/main.css">
  <link rel="stylesheet" href="../natacha-ui/app/app.css">
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/bootstrap/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/angular-bootstrap/ui-bootstrap-csp.css" >
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/angular-bootstrap-utils/ui-bootstrap-csp.css" >
  <link rel="stylesheet" href="../natacha-ui/app/bower_components/datatables/media/css/jquery.dataTables.css" >
</head>
<body>
    <span us-spinner="{radius:30, width:8, length: 16}"></span>
  <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <nav class="navbar navbar-default navbar-fixed-top {{active}}">
    <div class="container">
      <div class="navbar-header">
          <menu></menu>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <div ng-view></div>
      </div>
    </div>

  </div><!-- /.container -->
 <script type="text/javascript">
 var BASE_URL = "<?php echo  $view['router']->path('home_page')  ?>";
 </script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../natacha-ui/app/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/html5-boilerplate/dist/js/vendor/modernizr-2.8.3.min.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular/angular.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular-route/angular-route.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/spin.js/spin.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular-spinner/angular-spinner.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular-loading-spinner/angular-loading-spinner.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/app.js"></script> 
  <script type="text/javascript" src="../natacha-ui/app/dashboard/index.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/dashboard/Api.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/dashboard/get/layoutController.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/post/index.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/post/Api.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/post/list/listController.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/post/create/createController.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/post/update/updateController.js"></script>
  <script type="text/javascript" src="../natacha-ui/app/component/component.js"></script>
</body>
</html>
