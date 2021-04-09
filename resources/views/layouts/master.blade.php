<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>VBC-NET</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="AGChain.vn">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{URL::asset('resources/assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/morris/morris.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/pnotify/pnotify.custom.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('resources/assets/vendor/modernizr/modernizr.js')}}"></script>

    <style>
        a:hover{
            text-decoration: none;
        }
    </style>

</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="../" class="logo">
                    <img src="{{asset('resources/assets/images/logo.png')}}" height="35" alt="VBC-NET" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <form action="pages-search-results.html" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <span class="separator"></span>

                <ul class="notifications">
                    <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge">3</span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default">3</span> Alerts
                            </div>

                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-thumbs-down bg-danger"></i>
                                            </div>
                                            <span class="title">Server is Down!</span>
                                            <span class="message">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-lock bg-warning"></i>
                                            </div>
                                            <span class="title">User Locked</span>
                                            <span class="message">15 minutes ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-signal bg-success"></i>
                                            </div>
                                            <span class="title">Connection Restaured</span>
                                            <span class="message">10/10/2014</span>
                                        </a>
                                    </li>
                                </ul>
                             
                            </div>
                        </div>
                    </li>
                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="{{asset('resources/assets/images/!happy-face.png')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{asset('resources/assets/images/!happy-face.png')}}" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                            <span class="name"> {{Cookie::get('user_name') ?? ''}} </span>
                            <span class="role"> {{Cookie::get('user_role') ?? ''}} </span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        @yield('contents')
    </section>

    <!-- Vendor -->
    <script src="{{asset('resources/assets/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{asset('resources/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/raphael/raphael.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/morris/morris.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/gauge/gauge.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/snap-svg/snap.svg.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

    <script src="{{asset('resources/assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/pnotify/pnotify.custom.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('resources/assets/javascripts/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('resources/assets/javascripts/theme.custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('resources/assets/javascripts/theme.init.js')}}"></script>


    <!-- Examples -->
    <script src="{{asset('resources/assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/ui-elements/examples.modals.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/forms/examples.wizard.js')}}"></script>

    @yield('javascripts')
</body>

</html>