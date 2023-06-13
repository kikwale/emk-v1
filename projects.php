<?php
$title = "Pro-Mek-Engineering | Projects";
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
                        <h1 class="title">
                            <?php 
                            $sql = "SELECT * FROM sub_project_title WHERE id ='" . $_GET['id'] . "'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['name']." Projects";
                                }
                            }
                            ?>
                        </h1>
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
                else {
                    echo "No Project added for this Sub Category";
                }
                ?>


            </div><!-- row end -->
        </div>
    </section>
    <!--broken-section end-->

<!-- </div>site-main end -->

<?php
include('partials/footer.php');
include('partials/theme.php');
include('partials/libraries.php');
?>