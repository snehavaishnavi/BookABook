<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>RMS</title>
        <meta name="description" content="RMS">
        <meta name="author" content="RMS">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="icon" type="image/png" href="assets/img/amblogo.png">
        <!-- bootstrap 3.0.2 -->
        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="assets/css/plugins.css">
        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="assets/css/themes.css">
        <!-- END Stylesheets -->
        <script src="assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <!--img src="assets/img/home-carousel22.jpg" alt="Login Full Background" class="full-bg"-->
        <img src="assets/img/library.jpg" alt="Login Full Background" class="full-bg">
        <!-- END Login Full Background -->
        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center"  style="border-radius: 10px 10px 0px 0px;">
                <img src="assets/img/images.png" width="100px" style="padding:20px 0px" alt="Login Full Background" class="">  
                <!--h1><strong></strong> </h1-->
            </div>
            <!-- END Login Title -->
            <!-- Login Block -->
            <div class="block remove-margin" style="border-radius: 0px 0px 10px 10px;">
                <!-- Login Form -->
                <form action="index.php?op=updatePassword" method="post" id="form-login" class="form-horizontal">

                    <div class="form-group">
					<div class="col-xs-12 text-danger">
					<?php echo $error; ?>
					</div>
				</div>
				<div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="text" id="login-id" name="login-id" class="form-control input-lg" placeholder="StudentId">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="NewPassword">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <input type="hidden" name="form-submitted" value="1" />	
                            <!--label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                    <input type="hidden" name="form-submitted" value="1" />	
                                    <span></span>
                            </label-->
                        </div>
                        <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->
        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- Load and execute javascript code used only in this page -->
        <script src="assets/js/pages/login.js"></script>
        <script>$(function () {
                Login.init();
            });</script>
    </body>
</html>