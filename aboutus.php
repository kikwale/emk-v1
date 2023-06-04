<?php
$title = "EMK | About us";
include('partials/header.php');
include('partials/navigation.php');
?>
        <!-- page-title -->
        <div class="cmt-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box">
                            <div class="page-title-heading">
                                <h1 class="title">About Us</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                                </span>
                                <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                <span><span>About Us</span></span>
                            </div>
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->
        </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">
        <!--about-section-->
        <?php 
        include('partials/about.php');
        include('partials/bestcompany.php');
        ?>
        <section class="cmt-row team-section style2 clearfix">
            <div class="container">
                <div class="row"><!-- row -->
                    <div class="col-1 col-md-2 col-lg-3"></div>
                    <div class="col-10 col-md-8 col-lg-6">
                        <!-- section title -->
                        <div class="section-title with-desc text-center clearfix">
                            <div class="title-header">
                                <h5>WORKING WITH EXCELLENT</h5>
                                <h2 class="title">Our great team</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                    <div class="col-1 col-md-2 col-lg-3"></div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row">
                <?php
                $sql = "SELECT * FROM team";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-team style1 mb-30">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/team-member/' . $row['image'] . '" alt="image">
                                    <div class="cmt-box-view-overlay"><!-- cmt-box-view-overlay -->
                                        
                                    </div><!-- featured-thumbnail end-->
                                </div>
                                <div class="featured-content text-center">
                                    <div class="featured-title">
                                        <h5><a href="team-details.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h5>
                                    </div>
                                    <div class="category">
                                        <p>' . $row['description'] . '</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox -->
                        </div>
                            ';
                    }
                }
                ?>
                </div>
            </div>
        </section>
        <!--team-section end-->
    <!-- </div>site-main end -->
<?php
include('partials/footer.php');
include('partials/theme.php');
include('partials/libraries.php');
?>