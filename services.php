<?php
include("partials/arrays.php");
include('partials/header.php');
include('partials/navigation.php');
include('db_connection.php');
?>
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <div class="page-title-heading">
                        <h1 class="title">Services</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                        </span>
                        <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        <span><span>Services</span></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->


<!--site-main start-->
<div class="site-main">

    <!--broken-section-->
    <section class="cmt-row services-top-section clearfix">
        <div class="container">
            <div class="row">
             
                   <?php 
                                $sql = "SELECT * FROM service";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                       echo '
                                       <div class="col-lg-4 col-md-6">
                                        <!--featured-imagebox-->
                                        <div class="featured-imagebox-services mb-30">
                                            <div class="featured-thumbnail box-shadow">
                                                <img class="img-fluid" src="images/services/'.$row['image'].'" alt="No Image">
                                                <div class="cmt-box-view-overlay"><!-- cmt-box-view-overlay -->
                                                </div>
                                            </div>
                                            <div class="featured-content featured-content-services box-shadow">
                                                <!-- <div class="featured-icon-box">
                                                    <div class="featured-icon">
                                                        <div class="cmt-icon cmt-icon_element-color-skincolor cmt-icon_element-size-md"> 
                                                            <i class="flaticon flaticon-house"></i>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="bottom-content-services">
                                                    <div class="featured-title">
                                                        <h5><a href="service-details.php?service_id='.$row['id'].'">'.$row['name'].'</a></h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>'.$row['description'].'</p>
                                                    </div>
                                                </div>
                                                <div class="services-icon-box">
                                                    <a href="service-details.php?service_id='.$row['id'].'"><i class="ti ti-plus"></i></a>
                                                </div>
                                            </div>
                                        </div><!-- featured-imagebox end-->
                                    </div>
                                       ';
                                      }
                                }
                                ?>
                 
               
            </div><!-- row end -->
        </div>
    </section>
    <!--broken-section end-->
    <?php
    include('partials/footer.php');
    include('partials/theme.php');
    include('partials/libraries.php');
    ?>