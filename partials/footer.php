</div><!--site-main end-->


<!--footer start-->
<footer class="footer widget-footer clearfix">
    <div class="first-footer cmt-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="footer-logo">
                        <img id="footer-logo-img" class="img-center" src="images/footer-logo.png" alt="">
                    </div>
                </div>
                <!-- <div class="col-lg-9">
                    <div class="cmt-footer-cta-wrapper cmt-bgcolor-skincolor box-shadow2">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 widget-area">
                                <div class="featured-icon-box iconalign-before-heading cmt-icon_element-size-lg">
                                    <div class="featured-content">
                                        <div class="featured-icon">
                                            <div class="cmt-icon cmt-icon_element-color-white cmt-icon_element-size-lg">
                                                <i class="flaticon flaticon-email"></i>
                                            </div>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Subscribe To Our Newsletter</h5>
                                            <p>Stay in touch with us to get latest news and discount coupons</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 widget-area">
                                <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                                    <div class="mailchimp-inputbox clearfix" id="subscribe-content"> 
                                        <p><input type="email" name="email" placeholder="Email Address.." required="">
                                            
                                        </p>
                                        <p><button class="btn" type="submit" value=""><i class="fa fa-envelope"></i></button></p>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="second-footer cmt-textcolor-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_contact clearfix">
                        <h3 class="widget-title">Get In Touch</h3>
                        <ul class="">
                            <li><i class="fa fa-map-marker"></i><?php echo $address; ?></li>
                            <li><i class="fa fa-envelope-o"></i>Email : <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                            <li><i class="fa fa-phone"></i>Phone : <a href="tel:+255768061488"><?php echo $mobile; ?></a><br>Whatsapp me: <a href="https://wa.me/+966572381809"><?php echo $whatsapp; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                       <h3 class="widget-title">Quick Links</h3>
                        <ul id="">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="projects-all.php">Projects</a></li>
                            <li><a href="team.php">Our Team</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                       <h3 class="widget-title">Our Services</h3>
                        <ul id="">

                            <?php
                            $query = "SELECT * FROM service LIMIT 5";
                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <li><a href="service-details.php?service_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                            <?php 
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_post clearfix">
                       <h3 class="widget-title">Recent Posts</h3>
                       <ul class="cmt-recent-post-list">
                            <li>
                                <a href="#"><img src="images/blog/post-01.jpg" alt="post-01"></a>
                                <a href="single-blog.html">Our Biggest Summer Meetup</a>
                                <span class="post-date clearfix">August 1, 2018</span>
                            </li>
                            <li>
                                <a href="#"><img src="images/blog/post-02.jpg" alt="post-02"></a>
                                <a href="single-blog.html">Our Biggest Summer Meetup</a>
                                <span class="post-date clearfix">Octomber 10, 2019</span>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_text clearfix">
                       <h3 class="widget-title">Get Free Estimate</h3>
                       <div class="">
                            <h3 class="widget_text_title cmt-textcolor-skincolor"><?php echo $mobile; ?></h3>
                            <p>Our online scheduling and payment system is safe.</p>
                            <!-- <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-border cmt-btn-color-skincolor mt-15 mb-20" href="#">Request With Online Form</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text cmt-bgcolor-darkgrey cmt-textcolor-white">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-8 cmt-footer2-left">
                    <span>Copyright © <?php echo date('Y');?>&nbsp; <?php echo $company; ?> . All rights reserved. Designed by <a href="https://digitalsurpass.co.tz/">digitalsurpass</a></span>
                </div>
                <div class="col-md-4 cmt-footer2-right">
                   <div class="social-icons">
                        <ul class="list-inline">
                            <li><a href="<?php echo $facebook; ?>"><i class="ti ti-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $instagram; ?>"><i class="ti ti-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $linkedin; ?>"><i class="ti ti-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $twitter; ?>"><i class="ti ti-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->
<!--back-to-top start-->
<a id="totop" href="#top">
    <i class="fa fa-angle-up"></i>
</a>
<!--back-to-top end-->