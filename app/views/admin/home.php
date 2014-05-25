<?php

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css({.tmp,app}) styles/main.css -->
    <!-- endbuild -->
    <link rel="stylesheet" href="/app/bower_components/bootswatch/slate/bootstrap.css"/>
</head>
<body ng-app="mainApp">

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--[if lt IE 9]>
<script src="/app/bower_components/es5-shim/es5-shim.js"></script>
<script src="/app/bower_components/json3/lib/json3.min.js"></script>
<![endif]-->

<!-- ng-include="'/app/views/main.html'" ng-controller="MainCtrl" -->

<!-- Add your site or application content here -->
<div class="container">

    <div ng-view=""></div>

</div>

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="/app/bower_components/jquery/jquery.js"></script>
<script src="/app/bower_components/angular/angular.js"></script>
<script src="/app/bower_components/angular-cookies/angular-cookies.js"></script>
<script src="/app/bower_components/angular-resource/angular-resource.js"></script>
<script src="/app/bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="/app/bower_components/angular-route/angular-route.js"></script>
<script src="/app/bower_components/sass-bootstrap/dist/js/bootstrap.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp,app}) scripts/scripts.js -->
<script src="/app/scripts/app.js"></script>
<script src="/app/scripts/services/UserService.js"></script>
<script src="/app/scripts/controllers/main.js"></script>
<script src="/app/scripts/controllers/users.js"></script>
<!-- endbuild -->
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>
</body>
</html>
