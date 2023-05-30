<?php
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
                        <h1 class="title">Our Projects</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                        </span>
                        <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        <span><span>Our Projects</span></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->
<!--element-row-->
<section class="element-row element-style clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <!-- section title -->
                <div class="section-title clearfix">
                    <div class="title-header">
                        <h2 class="title">Project Categories</h2>
                    </div>
                </div><!-- section title end -->
                <div class="res-991-pb-50">
                    <div class="cmt-tabs cmt-tab-style-horizontal" data-effect="fadeIn">
                        <ul class="tabs mb-15 clearfix">
                            <?php
                            $sql = "SELECT * FROM sub_project_title";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                                    <li class="tab "><a href="projects.php?id=' . $row['id'] . '"><i class="flaticon flaticon-legal"></i>' . $row['name'] . '</a></li>
                                                    ';
                                }
                            }
                            ?>
                            <!-- <li class="tab active"><a href="#"><i class="flaticon flaticon-legal"></i>Industrial</a></li>
                                    <li class="tab"><a href="#"><i class="flaticon flaticon-legal"></i>Building</a></li> -->
                        </ul>
                        <div class="content-tab">
                            <!-- content-inner -->
                            <div class="content-inner active">
                                <div class="row">
                                    <ul class="tabs mb-15 clearfix">

                                        <?php
                                        $sql = "SELECT * FROM sub_project_title";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '
                                                    <li class="tab "><a href="projects.php?id=' . $row['id'] . '"><i class="flaticon flaticon-legal"></i>' . $row['name'] . '</a></li>
                                                    ';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div><!-- content-inner end-->
                            <!-- content-inner -->
                            <div class="content-inner">
                                <div class="row">
                                    <ul class="tabs mb-15 clearfix">
                                        <?php
                                        $sql = "SELECT * FROM sub_project_title";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '
                                                    <li class="tab "><a href="projects.php?id=' . $row['id'] . '"><i class="flaticon flaticon-legal"></i>' . $row['name'] . '</a></li>
                                                    ';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div><!-- content-inner end-->
                            <!-- content-inner -->
                            <div class="content-inner">
                                <!-- <div class="row">
                                            <div class="col-lg-4">
                                                <img class="img-fluid" src="images/portfolio/16.jpg" alt="image">
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="mb-0 res-991-pt-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip adipiscing elit.</p>
                                            </div>
                                        </div> -->
                            </div><!-- content-inner end-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- row end -->
    </div>
</section>

<!--site-main start-->
<div class="site-main">

    <!--broken-section-->
    <section class="cmt-row portfolio-top-section clearfix">
        <div class="container">
            <div class="row">

                <?php
                $sql = "SELECT * FROM projects WHERE sub_project_title_id ='" . $_GET['id'] . "'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                <div class="col-lg-4 col-md-6">
                                <!-- featured-imagebox -->
                                <div class="featured-imagebox featured-imagebox-portfolio style1 mb-30">
                                    <!-- featured-thumbnail -->
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="images/portfolio/' . $row['image'] . '" alt="image">
                                    </div><!-- featured-thumbnail end -->
                                    <!-- cmt-box-view-overlay -->
                                    <div class="cmt-box-view-overlay">
                                        <div class="portfolio-icon-box">
                                            <a href="project-details.php?id=' . $row['id'] . '"><i class="ti ti-plus"></i></a>
                                        </div>
                                    </div><!-- cmt-box-view-overlay end-->
                                    <div class="featured-content">
                                        <div class="category">
                                            <p>' . $row['title'] . '</p>
                                        </div>
                                        <div class="featured-title">
                                            <h5><a href="project-details.php?id=' . $row['id'] . '">' . $row['description'] . '</a></h5>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox -->
                            </div>
                                ';
                    }
                }
                ?>


            </div><!-- row end -->
        </div>
    </section>
    <!--broken-section end-->

</div><!--site-main end-->

<?php
include('partials/footer.php');
include('partials/theme.php');
include('partials/libraries.php');
?>