<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'O-Tech || Blog Sidebar';
    include('partials/title-meta.php');
    ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>

    <?php include('partials/loader.php'); ?>

    <?php include('partials/header/navbar.php'); ?>

    <main>
        
        <!--================= Banner section start =================-->
        <section class="vl-breadcrumb-bg p-relative z-index-1 fix pt-200 pb--70" style="background-image: url(assets/img/banner/vl-breadcrumb-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-30">
                        <div class="vl-breadcrumb">
                            <h1 class="vl-fs-60 vl-white">Our Blog</h1>
                            <div class="vl-breadcrumb-list">
                                <span><a href="index.php">Home</a></span>
                                <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
                                <span class="active"><a href="#">Our Blog</a></span>
                                <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
                                <span class="active"><a href="#">Our Blog Details</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 mb-30">
                        <div class="vl-hero-img p-relative">
                            <div class="vl-hero-shape-4">
                                <div class="vl-shape-2">
                                    <img src="assets/img/icons/vl-emoji-4.2.svg" alt="">
                                </div>
                                <div class="vl-shape-3">
                                    <img src="assets/img/icons/vl-emoji-4.3.svg" alt="">
                                </div>

                            </div>
                            <div class="vl-breadcrumb-fan">
                                <img class="w-100" src="assets/img/icons/vl-fan-sm.svg" alt="">
                            </div>
                            <div class="vl-breadcrumb-img">
                                <img src="assets/img/banner/vl-breadcrumb-1.png" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================= Banner section End =================-->

        <!--================= Service Details Start =================-->
        <section class="vl-service-deatil pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <div class="vl-sidebar-widget">
                            <!-- search widget -->
                            <div class="vl-sidebar-widget-search mb-30 vl-gray-bg-4 br-16">
                                <h3 class="vl-text-cmn-blck vl-fs-20 vl-lineheight-20 pb-24 m-0">Search</h3>
                                <div class="vl-sidebar-widget-search-form p-relative z-index-1">
                                    <form action="#">
                                        <input type="text" placeholder="Search..">
                                    </form>
                                    <div class="vl-sidebar-widget-search-icon">
                                        <span><i class="fa-regular fa-magnifying-glass"></i></span>
                                    </div>
                                </div>
                            </div>

                            <!-- recent post -->
                            <div class="vl-sidebar-widget-search mb-30 vl-gray-bg-4 br-16">
                                <h3 class="vl-text-cmn-blck vl-fs-20 vl-lineheight-20 pb-24 m-0">Our Blog</h3>
                                <div class="vl-sidebar-rec-post">
                                    <ul>
                                        <li><a href="blog-single.php">Technology Solution <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                        <li><a href="blog-single.php">Website & Mobile App <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                        <li><a href="blog-single.php">Tracking Security <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                        <li><a href="blog-single.php">Mobile App Design <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                        <li><a href="blog-single.php">IT Management Service <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- recent post -->
                            <div class="vl-sidebar-widget-search mb-30 vl-gray-bg-4 br-16">
                                <h3 class="vl-text-cmn-blck vl-fs-20 vl-lineheight-20 pb-24 m-0">Popular Tags</h3>
                                <div class="vl-sidebar-tags">
                                    <a href="#">#IT Consulting</a>
                                    <a href="#">#IT Infrastructure</a>
                                    <a href="#">#Cloud Computing</a>
                                    <a href="#">#Tech Support</a>
                                    <a href="#">#Cybersecurity</a>
                                    <a href="#">#Future Of Work</a>
                                </div>
                            </div>

                            <!-- author -->
                            <div class="vl-sidebar-widget-search mb-30 vl-gray-bg-4 br-16">
                                <h3 class="vl-text-cmn-blck vl-fs-20 vl-lineheight-28 pb-10 m-0">Our Author</h3>
                                <div class="vl-sidebar-auth">
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.1.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.2.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.3.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.4.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.5.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.6.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.7.png" alt="">
                                    </div>
                                    <div class="vl-sidebar-auth-single pt-14">
                                        <img src="assets/img/blog/vl-blog-auth-1.8.png" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="vl-service-details ml-40">
                            <!-- single blog item -->
                            <article>
                                <!-- single blog item -->
                                <div class="vl-single-blog-item vl-single-blog-item-3 inner-blog mb-30">
                                    <div class="vl-single-blog-img vl-single-blog-img-4 br-8 fix p-relative">
                                        <a href="blog-single.php"><img class="w-100" src="assets/img/blog/vl-blog-4.1.png" alt=""></a>
                                    </div>
                                    <div class="vl-single-blog-4 p-relative z-index-1">
                                        <div class="vl-single-blog-right-arow">
                                            <a href="blog-single.php"><i class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                        <div class="vl-single-blog-meta">
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-calender-3.1.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">10 October 2024</a>
                                                </div>
                                            </div>
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-user-3.2.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">Shakib Mahmud</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-single-blog-content vl-single-blog-content-4 p-relative z-index-1">
                                            <h3 class="vl-single-blog-title vl-single-blog-title-4 pt-18 pb-12"><a href="blog-single.php">Your Trusted Partner in Technology Transformation</a></h3>
                                            <p class="pb-24">Looking to stay ahead in the fast-paced world technology? Our blog offers in-depth articles, case studies, & thought.</p>
                                            <a href="blog-single.php" class="vl-readmore">Read More <span><i class="fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- single blog item end -->

                            <!-- single blog item -->
                            <article>
                                <div class="vl-single-blog-item vl-single-blog-item-3 inner-blog mb-30">
                                    <div class="vl-single-blog-img vl-single-blog-img-4 br-8 fix p-relative">
                                        <a href="blog-single.php"><img class="w-100" src="assets/img/blog/vl-blog-4.4.png" alt=""></a>
                                    </div>
                                    <div class="vl-single-blog-4 p-relative z-index-1">
                                        <div class="vl-single-blog-right-arow">
                                            <a href="blog-single.php"><i class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                        <div class="vl-single-blog-meta">
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-calender-3.1.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">10 October 2024</a>
                                                </div>
                                            </div>
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-user-3.2.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">Shakib Mahmud</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-single-blog-content vl-single-blog-content-4 p-relative z-index-1">
                                            <h3 class="vl-single-blog-title vl-single-blog-title-4 pt-18 pb-12"><a href="blog-single.php">Explore the Future of Technology with Us</a></h3>
                                            <p class="pb-24">Technology is evolving rapidly—are you keeping up? Our <br> blog offers thought-provoking articles, practical tips.</p>
                                            <a href="blog-single.php" class="vl-readmore">Read More <span><i class="fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- single blog item end -->

                            <!-- single blog item -->
                            <article>
                                <div class="vl-single-blog-item vl-single-blog-item-3 inner-blog mb-30">
                                    <div class="vl-single-blog-img vl-single-blog-img-4 br-8 fix p-relative">
                                        <a href="blog-single.php"><img class="w-100" src="assets/img/blog/vl-blog-4.2.png" alt=""></a>
                                    </div>
                                    <div class="vl-single-blog-4 p-relative z-index-1">
                                        <div class="vl-single-blog-right-arow">
                                            <a href="blog-single.php"><i class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                        <div class="vl-single-blog-meta">
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-calender-3.1.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">10 October 2024</a>
                                                </div>
                                            </div>
                                            <!-- single metabox -->
                                            <div class="vl-single-blog-meta-box mr-16">
                                                <div class="vl-single-blog-meta-box-icon mr-4">
                                                    <span><img src="assets/img/icons/vl-user-3.2.svg" alt=""></span>
                                                </div>
                                                <div class="vl-single-blog-meta-box-content">
                                                    <a href="#">Shakib Mahmud</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-single-blog-content vl-single-blog-content-4 p-relative z-index-1">
                                            <h3 class="vl-single-blog-title vl-single-blog-title-4 pt-18 pb-12"><a href="blog-single.php">The Latest in Tech: News, Tips, and Insights</a></h3>
                                            <p class="pb-24">Our blog is your go-to source for expert opinions practical <br> tips the latest industry updates from digital transformation.</p>
                                            <a href="blog-single.php" class="vl-readmore">Read More <span><i class="fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- single blog item end -->
                        </div>

                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="theme-pagination text-center mt-18">
                                    <ul>
                                        <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                                        <li><a class="active" href="#">01</a></li>
                                        <li><a href="#">02</a></li>
                                        <li>...</li>
                                        <li><a href="#">12</a></li>
                                        <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>

            </div>
        </section>
        <!--================= Service Details End =================-->

        <?php include('partials/cta.php'); ?>

    </main>

    <?php include('partials/footer.php'); ?>

    <?php include('partials/progress-circle.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

</body>

</html>