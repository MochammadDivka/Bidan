<?php include_once('connect.php'); ?>

<body>


    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">


                    <div class="navbar-logo">
                        <a href="index.php">
                            <div class="text-center">
                                <image class="profile-img" src="uploadImage/Logo/logo for hospital system.png" style="width: 40%"></image>
                            </div>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <!-- <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i
                                                class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i
                                                class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul> -->
                        <!-- <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius"
                                                    src="files/assets/images/avatar-4.jpg"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Nikhil Bhalerao +919423979339</h5>
                                                    <p class="notification-msg">CI, Laravel PHP Developer</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </li> -->





                        <!-- <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown"> -->

                        <?php

                        /*$sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $query=$conn->query($sql);
        while($row=mysqli_fetch_array($query))
        {
            //print_r($row);
            extract($row);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['loginid'];
            $contact = $row['mobileno'];
            //$dob1 = $row['dob'];
            $gender = $row['gender'];
            $image = $row['image'];
        }*/
                        if ($_SESSION['user'] == 'admin') {
                        ?>

                            <img src="uploadImage/Profile/<?php echo $_SESSION['image']; ?>" class="img-radius" alt="User-Profile-Image" /><?php } ?>
                        <!-- <span><?php echo $_SESSION['fname']; ?></span>
                        <i class="feather icon-chevron-down"></i> -->
                    </div>
                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                        <li>
                            <a href="profile.php">
                                <i class="feather icon-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="changepassword.php">
                                <i class="feather icon-edit"></i> Change Password
                            </a>
                        </li>

                        <li>
                            <a href="logout.php">
                                <i class="feather icon-log-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
                </ul>
        </div>
    </div>
    </nav>