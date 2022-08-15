<?php 


// $linkimg = "images/users/".$_SESSION['imagen'].".jpg";

//$linkimg = "vista/images/users/avatar-3.jpg";

$linkimg = "vista/images/users/".$_SESSION['imagenAlex'].".jpg";

 ?>

<!-- header header  -->

        <div class="header">

            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <!-- Logo -->

                <div class="navbar-header">

                    <a class="navbar-brand" href="inicio">

                        <!-- Logo icon -->

                        <b>Admin</b>

                        <!--End Logo icon -->

                        <!-- Logo text -->

                        <span>Servicios</span>

                    </a>

                </div>

                <!-- End Logo -->

                <div class="navbar-collapse">

                    <!-- toggle and nav items -->

                    <ul class="navbar-nav mr-auto mt-md-0">

                        <!-- This is  -->

                        <!-- This is  -->

                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>

                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                        

                    

                        <!-- End Messages -->

                    </ul>

                    <!-- User profile and search -->

                    <ul class="navbar-nav my-lg-0">



                        

                        <!-- Comment -->

                        <li class="nav-item dropdown">

                         

                        </li>

                        <!-- End Comment -->

                        <!-- Messages -->

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 

                                <span><?php echo $_SESSION['usuarioAlex']; ?></span>

							</a>

                            

                        </li>

                        <!-- End Messages -->

                        <!-- Profile -->

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $linkimg; ?>" alt="user" class="profile-pic" /></a>

                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">

                                <ul class="dropdown-user">

                                    

                                    <li><a href="salir"><i class="fa fa-power-off"></i> Logout</a></li>

                                </ul>

                            </div>

                        </li>

                    </ul>

                </div>

            </nav>

        </div>