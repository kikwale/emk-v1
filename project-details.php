
<?php
include("partials/arrays.php");
include('partials/header.php');
include('partials/navigation.php');
?>
 <!-- page-title -->
        <div class="cmt-page-title-row">
            <div class="container">
                <div class="row">

                <?php 
                $sql = "SELECT * FROM projects where id='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-12"> 
                        <div class="title-box">
                            <div class="page-title-heading">
                               
                                <h1 class="title">'.$row["title"].'</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                                </span>
                                <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                <span><span>'.$row["title"].'</span></span>
                            </div>
                        </div>
                    </div><!-- /.col-md-12 --> 
                        ';
                        }
                }
                ?>
                    

                </div><!-- /.row -->  
            </div><!-- /.container -->
        </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">
        <div class="sidebar cmt-sidebar-left cmt-bgcolor-grey clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">

                <?php 
                $sql = "SELECT * FROM projects where id='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-lg-8 content-area order-1 order-lg-2">
                        <!-- cmt-service-single-content-are -->
                        <div class="cmt-service-single-content-area">
                            <div class="post-featured-wrapper mb-40">
                                <div class="post-featured">
                                    <img class="img-fluid" src="images/portfolio/'.$row['image'].'" alt="">
                                </div>
                            </div>
                            <div class="cmt-service-description">
                                <h4 class="mb-10">'. $row["title"].'</h4>
                                <div class="mb-30">
                                    <p>'. $row["details"].'</p>
                                </div>
                            </div>
                        </div><!-- cmt-service-single-content-are end -->
                    </div>
                        ';
                        }
                }
                ?>

                  
                    <div class="col-lg-4 widget-area sidebar-left order-2 order-lg-1">
                        <aside class="widget widget-search">
                            <h3 class="widget-title">Search</h3>
                            <form role="search" method="get" class="search-form" action="#">
                                <label>
                                <span class="screen-reader-text">Search for:</span>
                                <i class="fa fa-search"></i>
                                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
                                </label>
                            </form>
                        </aside>
                        <aside class="widget widget-nav-menu">
                            <h3 class="widget-title">Other Services</h3>
                            <ul class="widget-menu">

                            <?php 
                $sql = "SELECT * FROM projects where id!='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <li>
                        <h5>
                            <a href="project-details.php?id='.$row['id'].'">'.$row['title'].'</a>
                        </h5>
                        <p>'. $row['description'].'</p>
                       </li>
                        ';
                        }
                }
                ?>

                                
                             
                               
                            </ul>
                        </aside>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
<?php
include('partials/footer.php');
include('partials/theme.php');
include('partials/libraries.php');
?>