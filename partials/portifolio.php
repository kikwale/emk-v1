        <!--portfolio-text-section-->
        <section class="cmt-row portfolio-text-section cmt-bgcolor-darkgrey clearfix">
            <div class="container">
                <div class="row"><!-- row -->
                    <div class="col-sm-12">
                        <!-- section title -->
                        <div class="section-title style2 clearfix">
                            <div class="title-header">
                                <h5>We Make Connections</h5>
                                <h2 class="title">Explore recent projects</h2>
                            </div>
                            <div class="title-desc">We deliver self performed turn key project for all industries types as well as building sector with unmatched record or zero missed deadline.</div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end-->
            </div>
        </section>
        <!--portfolio-text-section-->
        <!--portfolio-section-->
        <section class="cmt-row portfolio-section cmt-bgcolor-grey clearfix">
            <div class="container-fluid">
                <!-- row -->
                <div class="row portfolio-slide owl-carousel cmt-boxes-spacing-10px owl-theme owl-loaded" data-item="5" data-nav="false" data-dots="false" data-auto="false">
                    <?php
                $sql = "SELECT * FROM projects ORDER BY id DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg cmt-box-col-wrapper">
                            <div class="featured-imagebox featured-imagebox-portfolio style1">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/portfolio/' . $row['image'] . '" alt="image">
                                </div>
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
                                        <h5><a href="project-details.php' . $row['id'] . '">' . $row['description'] . '</a></h5>
                                    </div>
                                </div>
                            </div>
                            </div>
                        ';
                    }
                }
                else {
                    echo "No Project added for this Sub Category";
                }
                ?>


                </div><!-- row -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-30 mb-40 res-991-mt-30 text-center">
                            <p class="mb-0">Don’t hesitate, contact us for better help and services.&nbsp;<a href="projects-all.php"><strong><u>View more Project</u></strong></a></p>
                        </div>
                    </div>
                </div><!-- row end-->
            </div>
        </section>
        <!--portfolio-section-->