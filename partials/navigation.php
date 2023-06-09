     <?php 
        include('db_connection.php');
        include('partials/particulars.php');
    ?>
        
        
        <!--header start-->
        <header id="masthead" class="header cmt-header-style-01">
            <!-- cmt-header-wrap -->
            <div class="cmt-header-wrap">
                <!-- cmt-stickable-header-w -->
                <div id="cmt-stickable-header-w" class="cmt-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner cmt-stickable-header visible-title">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <!-- cmt-topbar-wrapper -->
                                        <div class="cmt-topbar-wrapper cmt-bgcolor-darkgrey cmt-textcolor-white clearfix">
                                            <div class="cmt-topbar-content">
                                                <div class="topbar-right text-right">
                                                    <ul class="top-contact">
                                                        <li><span class="tel-no"> Your Trusted 24 Hours Service Provider!</span></li>
                                                        <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                                                        <li><i class="fa fa-phone"></i><?php echo $mobile; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- cmt-topbar-wrapper end -->
                                        <!-- site-branding -->
                                        <div class="site-branding">
                                            <a class="home-link" href="index.php" title="Raxena" rel="home">
                                                <img id="logo-img" class="img-center" src="images/logo-img.png" alt="logo-img">
                                            </a>
                                        </div><!-- site-branding end -->
                                        <!--site-navigation -->
                                        <div id="site-navigation" class="site-navigation cmt-textcolor-white">
                                            <!-- social-links-wrapper -->
                                            <div class="cmt-social-links-wrapper list-inline">
                                                <ul class="social-icons square">
                                                    <li><a href="<?php echo $facebook; ?>"><i class="ti ti-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $instagram; ?>"><i class="ti ti-instagram" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $linkedin; ?>"><i class="ti ti-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $twitter; ?>"><i class="ti ti-twitter" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div><!-- social-links-wrapper -->
                                            <!-- header-icons -->
                                            <div class="cmt-header-icons ">
                                                <div class="cmt-header-icon cmt-header-search-link">
                                                    <a href="#"><i class="fa fa-search"></i></a>
                                                    <div class="cmt-search-overlay">
                                                        <form method="get" class="cmt-site-searchform" action="#">
                                                            <div class="w-search-form-h">
                                                                <div class="w-search-form-row">
                                                                    <div class="w-search-input">
                                                                        <input type="search" class="field searchform-s" name="s" placeholder="Type Word Then Enter...">
                                                                        <button type="submit">
                                                                            <i class="ti ti-search"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- header-icons end -->
                                            <div class="cmt-menu-toggle">
                                                <input type="checkbox" id="menu-toggle-form" />
                                                <label for="menu-toggle-form" class="cmt-menu-toggle-block">
                                                    <span class="toggle-block toggle-blocks-1"></span>
                                                    <span class="toggle-block toggle-blocks-2"></span>
                                                    <span class="toggle-block toggle-blocks-3"></span>
                                                </label>
                                            </div>
                                            <!-- nav -->
                                            <nav id="menu" class="menu">
                                                <ul class="dropdown">
                                                   <li><a href="index.php">Home</a></li>
                                                    <li><a href="aboutus.php">About Us</a></li>
                                                    <li><a href="services.php">Services</a></li>
                                                    <!-- <li><a href="projects.php">Projects</a></li> -->
                                                    <li><a href="#">Projects</a>
                                                        <ul>
                                                        <?php 
                                                            $sql = "SELECT * FROM main_project_title";
                                                            $result = mysqli_query($conn, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while($row = mysqli_fetch_assoc($result)) {
                                                                echo '
                                                                <li><a href="#">'.$row['name'].'</a>
                                                                <ul>
                                                                ';
                                                            $sql1 = "SELECT * FROM sub_project_title WHERE main_project_title_id='".$row['id']."'";
                                                            $result1 = mysqli_query($conn, $sql1);
                                                            if(mysqli_num_rows($result1) > 0){
                                                                while($row1 = mysqli_fetch_assoc($result1)) {
                                                                  echo '<li><a href="projects.php?id='.$row1['id'].'">'.$row1['name'].'</a></li>';
                                                                }
                                                            }

                                                            echo '
                                                            </ul>
                                                            </li>';
                                                                }
                                                            }
                                                            ?>
                                                       <li><a href="projects-all.php">All Projects</a></li>
                                                    </ul>
                                                    </li>
                                                    <li><a href="team.php">Our Team</a></li>
                                                    <!-- <li><a href="blog.php">Blog</a></li> -->
                                                    <!-- <li><a href="contact-us.php">Contact Us</a></li> -->
                                                </ul>
                                            </nav><!-- nav end-->
                                        </div><!-- site-navigation end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- cmt-stickable-header-w end-->
            </div><!--cmt-header-wrap end -->
        </header><!--header end-->