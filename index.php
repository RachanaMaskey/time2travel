<?php
  include('connection.php');
  $username = $password = "";
  if(isset($_POST['submit1'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from registerinfo WHERE uname = '$username' AND password = '$password' ";
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);
			if($count>0){
        //echo 'hello';
				$row=mysqli_fetch_assoc($result);
				$_SESSION['USER_LOGIN'] = TRUE;
				$_SESSION['USER_ID'] = $row['uid'];
				$_SESSION['USER_NAME'] = $row['uname'];
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Time2Travel</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="maczac.com" />
    <link rel="icon" href="favicon.png" type="images/logo1.png" />

    <!-- CSS -->
    <link href="css/uikit.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="page">
        <header class="hdr-row-wrap full-width">
            <div class="hdr-row container-l">
                <div class="uk-grid-collapse" uk-grid>
                    <!-- <div class="uk-width-2-5@m hdr-left uk-box-shadow-bottom"> -->
                    <div>
                        <div class="uk-grid-collapse" uk-grid>
                            <div class="uk-width-4-5 uk-width-1-1@m">
                                <a href="index.php"><img src="images/logo1.png" width="120" height="46"
                                        alt="maczac" /></a>
                            </div>
                            <div class="uk-width-1-5 uk-hidden@m">
                                <div class="mobi-menu">
                                    <a class="btn-toggle" href="#mobi-menu" uk-toggle>
                                        <span uk-icon="icon: menu; ratio: 2"></span></a>
                                </div>
                                <!-- /.mobi-menu -->
                            </div>
                        </div>
                        <!-- CTA -->
                        <div class="uk-overlay uk-position-bottom tel-bg">
                            <div class="uk-text-center">
                                <!-- Visible on Desktop -->
                                <div class="uk-visible@m">
                                    <div class="tel-desk"></div>
                                </div>
                                <!-- Visible on Mobile Phone -->
                                <div class="uk-hidden@m" uk-sticky="animation: uk-animation-slide-top">
                                    <a class="btn-maroon bg-transition" href="tel:1-555-555-5555"><span
                                            class="uk-margin-small-right" uk-icon="icon: phone; ratio: 1.50"></span>
                                        9841100000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hdr-left -->
                    <div class="uk-width-3-5@m hdr-right">
                        <div class="hdr-nav">
                            <div class="desktop-menu uk-visible@m">
                                <ul class="menu">
                                    <li><a href="addpost.php" class="bg-transition">posts</a></li>

                                    <li>
                                        <a href="#modal-login" class="bg-transition" uk-toggle><?php
										        if(isset($_SESSION['USER_LOGIN'])){
                              ?><a href="logout.php">Logout</a><?php
										        }else{
										        ?>Login<?php
										        }
									?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.desktop-menu -->
                        </div>
                        <!-- /.hdr-nav -->

                        <div class="banner-wrap">
                            <!-- ##### Banner Slideshow ##### -->
                            <div uk-slideshow="min-height: 300; max-height: 340; animation: slide; autoplay: true">
                                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                    <ul class="uk-slideshow-items">
                                        <li>
                                            <img src="images/1pixel.png" width="400" height="300"
                                                alt="Travel Anywhere" />
                                            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                                                <h3 class="h2-hdr">Escape Completely</h3>
                                                <p>
                                                    No matter where in the world you want to go, we can
                                                    help get you there.
                                                </p>
                                                <a href="#modal-login"
                                                    class="btn-transparent hvr-sweep-to-top uk-margin-small-bottom"
                                                    uk-toggle>Start Your Journey</a>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/1pixel.png" width="400" height="300" alt="Travel Anywhere"
                                                uk-cover />
                                            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                                                <h3 class="h2-hdr">Get With Us and Get Away</h3>
                                                <p>You'll be happy to be back.</p>
                                                <a href="#modal-login"
                                                    class="btn-transparent hvr-sweep-to-top uk-margin-small-bottom"
                                                    uk-toggle>Start Your Journey</a>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/1pixel.png" width="400" height="300" alt="Travel Anywhere"
                                                uk-cover />
                                            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                                                <h3 class="h2-hdr">Endless Discoveries</h3>
                                                <p>We'll design the perfect trip.</p>
                                                <a href="#modal-login"
                                                    class="btn-transparent hvr-sweep-to-top uk-margin-small-bottom"
                                                    uk-toggle>Start Your Journey</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center"></ul>
                                </div>
                            </div>
                            <!-- ##### End of Banner Slideshow ##### -->
                        </div>
                    </div>
                    <!-- LOGINNNNNNNNNNNNNNNNNNNNNNN -->
                    <!-- /.hdr-right -->
                    <!-- <div class="uk-width-3-5@m hdr-right">
              <img src="images/login.png" />
            </div> -->
                </div>
        </header>

        <section class="cta-top-wrap full-width">
            <div class="cta-row container-l">
                <h2 class="h2-dark">Our Popular destinations</h2>
                <!-- Nested Grid -->
                <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-medium uk-grid-match" uk-grid>
                    <!-- 1 -->
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <div class="uk-inline-clip uk-transition-toggle">
                                    <img src="images/kathmandu.jpg" width="600" height="600" alt="Asia"
                                        class="uk-transition-scale-up uk-transition-opaque" />
                                </div>
                            </div>
                            <div class="cta-card">
                                <h3>Kathmandu</h3>
                                <p>
                                    <a href="index.php" target="_blank"
                                        class="hvr-line-dark-center">destinations</a><span
                                        uk-icon="icon: arrow-right; ratio: 1.5"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <div class="uk-inline-clip uk-transition-toggle">
                                    <img src="images/pokhara.jpg" width="600" height="600" alt="Europe"
                                        class="uk-transition-scale-up uk-transition-opaque" />
                                </div>
                            </div>
                            <div class="cta-card">
                                <h3>Pokhara</h3>
                                <p>
                                    <a href="index.php" target="_blank"
                                        class="hvr-line-dark-center">destinations</a><span
                                        uk-icon="icon: arrow-right; ratio: 1.5"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <div class="uk-inline-clip uk-transition-toggle">
                                    <img src="images/chitwan.jpg" width="600" height="600" alt="South America"
                                        class="uk-transition-scale-up uk-transition-opaque" />
                                </div>
                            </div>
                            <div class="cta-card">
                                <h3>Chitwan</h3>
                                <p>
                                    <a href="index.php" target="_blank"
                                        class="hvr-line-dark-center">destinations</a><span
                                        uk-icon="icon: arrow-right; ratio: 1.5"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <div class="uk-inline-clip uk-transition-toggle">
                                    <img src="images/mustang.jpg" width="600" height="600" alt="North America"
                                        class="uk-transition-scale-up uk-transition-opaque" />
                                </div>
                            </div>
                            <div class="cta-card">
                                <h3>Mustang</h3>
                                <p>
                                    <a href="index.php" target="_blank"
                                        class="hvr-line-dark-center">destinations</a><span
                                        uk-icon="icon: arrow-right; ratio: 1.5"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Nested Grid -->
            </div>
        </section>

        <section class="body-row-wrap full-width">
            <div class="body-row">
                <div class="container-l">
                    <div class="uk-grid-large uk-margin-remove" uk-grid>
                        <div class="uk-width-2-5@m body-left">
                            <div class="page-content">
                                <h1 class="h1-light">About Our Vision</h1>
                                <p>
                                    Traveling is fun but very stressful when it comes to planning and arranging the trip.
                                    Time2Travel is a travel friendly platform withs its main aim to make 
                                    travel planning less stressful.
                                </p>
                                <p>
                                    Our website solves the issue of lack of centralized information about the hotel informations,
                                    restaurant informatiions and nearby places to visit.So our website offers such feature and many 
                                    more.
                                    <br>
                                    Do explore the website
                                </p>
                                <div class="uk-margin-medium-top uk-text-center">
                                    <a href="index.php" target="_blank"
                                        class="btn-transparent hvr-sweep-to-top">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.body-left -->
                        <div class="uk-width-3-5@m body-right">
                            <div uk-lightbox>
                                <div class="uk-inline uk-light">
                                    <img src="images/logo1.png" width="500" height="400" alt="logo"
                                        style="border: 10px solid #f2e0c9;margin-right: 50px" />
                                    <div class="uk-position-center">
                                        <!-- <a class="ico-vdo" href="https://youtu.be/9dNegXgBa80"
                                            data-caption="Lightbox Popup Video"
                                            data-attrs="width: 1280; height: 720;"><span
                                                uk-icon="icon: play-circle; ratio: 3.5"></span></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.body-right -->
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="btm-one-wrap full-width">
            <div class="btm-one">
                <div class="container-l">
                    <div class="uk-grid-large uk-margin-remove" uk-grid>
                        <div class="uk-width-2-5@m bto-left">
                            <div class="bto-content">
                                <h2 class="h1-light">Our Team</h2>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Praesentium, velit quia
                                    <a href="#">corrupti porro</a> reiciendis explicabo vel est
                                    voluptatem quae, in mollitia sequi quidem perspiciatis.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet,
                                    <a href="#">consectetur adipisicing elit</a>. Beatae eaque
                                    repellat error quaerat, perferendis ab quasi unde porro,
                                    velit deserunt asperiores voluptatibus minima magnam ducimus
                                    magni, aperiam.
                                </p>
                                <div class="uk-margin-medium-top uk-text-center">
                                    <a href="imdex.php" target="_blank"
                                        class="btn-transparent hvr-sweep-to-top">Learn more</a>
                                </div>
                            </div>
                        </div>
                        </.btp-left -->
                        <!-- <div class="uk-width-3-5@m bto-right uk-flex-first@m">-->
                            <!-- Nested Grid -->
                            <!-- <div class="uk-child-width-1-3@s uk-grid-small uk-text-center" uk-grid>-->
                                <!-- 1 -->
                                <!-- <div>
                                    <div class="uk-inline-clip uk-transition-toggle" style="border: 5px solid #f2e0c9">
                                        <img src="images/profile-3.jpg" width="600" height="800"
                                            alt="Business Profile 3"
                                            class="uk-transition-scale-up uk-transition-opaque" />
                                        <div
                                            class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">
                                            <div class="uk-text-center">
                                                <a href="index.php target="_blank"
                                                    class="btn-blue bg-transition">Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- 2 -->
                                <!-- <div>
                                    <div class="uk-inline-clip uk-transition-toggle" style="border: 5px solid #f2e0c9">
                                        <img src="images/profile-1.jpg" width="600" height="800"
                                            alt="Business Profile 1"
                                            class="uk-transition-scale-up uk-transition-opaque" />
                                        <div
                                            class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">
                                            <div class="uk-text-center">
                                                <a href="index.php" target="_blank"
                                                    classf="index.php="btn-blue bg-transition">Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- 3 -->
                                <!-- <div>
                                    <div class="uk-inline-clip uk-transition-toggle" style="border: 5px solid #f2e0c9">
                                        <img src="images/profile-2.jpg" width="600" height="800"
                                            alt="Business Profile 2"
                                            class="uk-transition-scale-up uk-transition-opaque" />
                                        <div
                                            class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">
                                            <div class="uk-text-center">
                                                <a href="index.php" target="_blank"
                                                    class="btn-blue bg-transition">Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End of Nested Grid -->
                        <!-- </div> -->
                        <!-- /.bto-right -->
                    <!-- </div>
                </div>
            </div> -->
            <!-- /.btm-one
        </section>   -->


        <!-- Search -->
        <section class="btm-one-wrap full-width" style="margin-bottom: 0;">
            <!-- <div class="btm-one">
                <div class="container">-->
                    <div class="uk-grid-large uk-margin-remove" uk-grid>
                        <div class="uk-width-4-5@m bto-right uk-flex-center btm-one-wrap ">
                            <div class="container uk-flex-center">
                                <h2 class="h1-light" style="text-align:center;color:#8c3838;max-width: 900px;">Lets explore and plan</h2>
                                <br>
                                <div style="display: flex; gap: 20px; align-items: flex-start; flex-wrap: wrap;">
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="place" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Place:</b></label>
                                        <input type="text" id="place" class="uk-form-large form-control shadow-sm">
                                    </div>
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="budget" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Budget:</b></label>
                                        <input type="text" id="budget" class="uk-form-large form-control shadow-sm">
                                    </div>
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="time" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Days:</b></label>
                                        <input type="text" id="time" class="uk-form-large form-control shadow-sm">
                                    </div>
                                </div>

                                <br>
                                <button style="background-color: #8c3838; margin: 0 auto; display: block;" class="btn-transparent hvr-sweep-to-top" onclick="generateResponse();">Generate Response</button>
                                <br>
                               

                                <div id="response"></div>

                                <script src="script.js"></script>
                            </div>
                        </div>
                        <!-- <?php
                            // include('chatbot.php');
                        ?> -->
                    </div>
                <!--</div>    
            </div>-->
        </section>

        <div style="margin-top: 0;" class="review">
            <section class="btm-two-wrap full-width">
                <div class="btm-two container-l">
                    <h2 class="h2-light">Customer Reviews</h2>
                    <div class="rev-star uk-text-center uk-margin-medium-bottom">
                        <span class="uk-margin-small-right" uk-icon="icon: star; ratio: 1.5"></span>
                        <span class="uk-margin-small-right" uk-icon="icon: star; ratio: 1.5"></span>
                        <span class="uk-margin-small-right" uk-icon="icon: star; ratio: 1.5"></span>
                        <span class="uk-margin-small-right" uk-icon="icon: star; ratio: 1.5"></span>
                        <span class="uk-margin-small-right" uk-icon="icon: star; ratio: 1.5"></span>
                    </div>

                    <!-- Begin Slider -->
                    <div class="uk-slider-container-offset" uk-slider="center: true; autoplay: true">
                        <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-grid"
                                uk-height-match="target: > li > div > .uk-card">
                                <!-- 1 -->
                                <li>
                                    <div>
                                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                                            <h3>Best Travel Agency</h3>
                                            <p>
                                                I loved how the app suggested unique destinations and
                                                experiences I wouldn’t have found on my own. The
                                                customer support was also fantastic, always ready to
                                                assist with any queries.
                                            </p>
                                            <div class="rev-footer">
                                                <p><em>John</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- 2 -->
                                <li>
                                    <div>
                                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                                            <h3>Enjoyed so much</h3>
                                            <p>
                                                It made trip planning effortless and fun. The
                                                recommendations were fantastic, and I discovered
                                                places I wouldn’t have found on my own. It felt like
                                                having a personal travel guide in my pocket.
                                            </p>
                                            <div class="rev-footer">
                                                <p><em>Michelle</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- 3 -->
                                <li>
                                    <div>
                                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                                            <h3>For all your travel needs</h3>
                                            <p>
                                                From finding the best accommodations and activities to
                                                suggesting great local dining spots, it takes care of
                                                it all. The convenience of having everything in one
                                                place saved me so much time and effort.
                                            </p>
                                            <div class="rev-footer">
                                                <p><em>Monica</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- 4 -->
                                <li>
                                    <div>
                                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                                            <h3>Great deals</h3>
                                            <p>
                                                This app is a lifesaver for travelers on a budget! The
                                                deals it offers are unbeatable, whether it’s on
                                                flights, hotels, or activities. I saved so much money
                                                compared to other platforms, and the quality of the
                                                options provided was excellent.
                                            </p>
                                            <div class="rev-footer">
                                                <p><em>Adam</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- 6 -->
                                <li>
                                    <div>
                                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                                            <h3>Absolutely loved their services</h3>
                                            <p>
                                                The recommendations were spot-on, and the user
                                                interface was super easy to navigate. It made planning
                                                my trip a breeze, offering personalized suggestions
                                                that perfectly matched my interests.
                                            </p>
                                            <div class="rev-footer">
                                                <p><em>Alicia</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                    <!-- End Slider -->
                    <div class="uk-margin-large-top uk-text-center">
                        <a href="index.php" target="_blank" class="btn-transparent hvr-sweep-to-top">More Reviews</a>
                    </div>
                </div>
                <!-- /.review -->
        </div>
        <!-- /.btm-two -->
        </section>

        <section class="btm-three-wrap full-width">
            <div class="btm-three">
                <div class="container-l">
                    <div class="uk-grid-large uk-margin-remove" uk-grid>
                        <div class="uk-width-2-5@m btt-left">
                            <div class="btt-content">
                                <h2 class="h1-light">Contact Us</h2>
                                <p><strong>Time2Travel</strong></p>
                                <p>
                                    PRD <br />
                                    Paknajol, Kathmandu<br />
                                    Telephone: 9841000000
                                </p>
                                <p>
                                    <a href="https://www.google.com/maps" class="hvr-line-light-center"
                                        target="_blank">Map &amp; Directions</a>
                                </p>
                                <!-- Email -->
                                <div class="uk-margin-small-top uk-text-center"
                                    uk-scrollspy="cls: uk-animation-shake; repeat: true">
                                    <a href="#" target="_blank" class="btn-transparent hvr-sweep-to-top"
                                        uk-toggle>Email Us</a>
                                </div>
                                <!-- Social -->
                                <ul class="social-ftr uk-margin-medium-top">
                                    <li>
                                        <a href="index.php" target="_blank" class="hvr-sweep-to-top"
                                            uk-tooltip="title: Facebook; pos: bottom"><span
                                                uk-icon="icon: facebook; ratio: 1.50"></span></a>
                                    </li>
                                    <li>
                                        <a href="index.php" target="_blank" class="hvr-sweep-to-top"
                                            uk-tooltip="title: LinkedIn; pos: bottom"><span
                                                uk-icon="icon: linkedin; ratio: 1.50"></span></a>
                                    </li>
                                    <li>
                                        <a href="index.php" target="_blank" class="hvr-sweep-to-top"
                                            uk-tooltip="title: Twitter; pos: bottom"><span
                                                uk-icon="icon: twitter; ratio: 1.50"></span></a>
                                    </li>
                                    <li>
                                        <a href="index.php" target="_blank" class="hvr-sweep-to-top"
                                            uk-tooltip="title: YouTube; pos: bottom"><span
                                                uk-icon="icon: youtube; ratio: 1.50"></span></a>
                                    </li>
                                    <li>
                                        <a href="index.php" target="_blank" class="hvr-sweep-to-top"
                                            uk-tooltip="title: Instagram; pos: bottom"><span
                                                uk-icon="icon: instagram; ratio: 1.50"></span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.btt-content -->
                        </div>
                        <!-- /.btt-left -->
                        <div class="uk-width-3-5@m btt-right">
                            <div class="uk-card">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27776848722!2d85.28493299361479!3d27.70903024183718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1734792474152!5m2!1sen!2snp"
                                    width="900" height="340" style="border: 5px solid #f2e0c9" allowfullscreen=""
                                    loading="lazy" uk-responsive></iframe>
                            </div>
                        </div>
                        <!-- /.btt-right -->
                    </div>
                </div>
            </div>
            <!-- /.btm-three -->
        </section>

        <!-- ##### FOOTER ##### -->
        <footer class="footer-outer">
            <div class="footer-wrap container-l">
                <div class="copyright">
                    <p>&copy;  2021 Theme Ten by <a href="index.php" target="_blank" class="hvr-line-light-center">MacZac.com</a>. All rights reserved.</p>
                    <p>Photo credit: Unsplash, Pixabay &amp; Pexels.</p>
                    <p><a href="index.php" target="_blank"  class="hvr-line-light-center">Disclaimer</a> | <a href="https://maczac.com" target="_blank"  class="hvr-line-light-center">Site Map</a> | <a href="https://maczac.com" target="_blank"  class="hvr-line-light-center">Privacy Policy</a> </p>
                </div> <!-- /.copyright -->
                <a href="#" id="go-top" class="bg-transition" title="Go to top" uk-totop uk-scroll></a>
            </div>
        </footer>

        <!-- ##### Offcanvas ##### -->
        <div id="mobi-menu" uk-offcanvas="mode: push; overlay: true; flip: true">
            <div class="uk-offcanvas-bar">
                <div class="uk-text-right">
                    <button class="uk-close-large uk-offcanvas-close" type="button" uk-close></button>
                </div>
                <ul class="menu uk-list uk-list-divider">
                    <li>
                        <a href="index.html" class="bg-transition"><span uk-icon="icon: triangle-right"></span> Home</a>
                    </li>
                    <li>
                        <a href="index.html" class="bg-transition"><span uk-icon="icon: triangle-right"></span> About
                            Us</a>
                    </li>
                    <li>
                        <a href="index.php"><span class="uk-margin-small-right"
                                uk-icon="icon: plus"></span>Services</a>
                        <div class="menu-drop" uk-dropdown="animation: uk-animation-slide-top-small; duration: 1000">
                            <ul class="uk-list uk-list-divider uk-nav uk-dropdown-nav">
                                <li>
                                    <a href="index.php" target="_blank"><span class="uk-margin-small-right"
                                            uk-icon="icon: chevron-right"></span>Service 1</a>
                                </li>
                                <li>
                                    <a href="index.php" target="_blank"><span class="uk-margin-small-right"
                                            uk-icon="icon: chevron-right"></span>Service 2</a>
                                </li>
                                <li>
                                    <a href="index.php" target="_blank"><span class="uk-margin-small-right"
                                            uk-icon="icon: chevron-right"></span>Service 3</a>
                                </li>
                                <li>
                                    <a href="index.php" target="_blank"><span class="uk-margin-small-right"
                                            uk-icon="icon: chevron-right"></span>Service 4</a>
                                </li>
                                <li>
                                    <a href="index.php" target="_blank"><span class="uk-margin-small-right"
                                            uk-icon="icon: chevron-right"></span>Service 5</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="bg-transition"><span uk-icon="icon: triangle-right"></span> Our Team</a>
                    </li>
                    <li>
                        <a href="#modal-contact" class="bg-transition" uk-toggle><span
                                uk-icon="icon: triangle-right"></span> Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.uk-offcanvas-bar -->
        </div>
        <!-- /#mobi-menu -->
        <!-- ##### End Offcanvas ##### -->
        <!-- ### Modal - Contact ### -->
        <div id="modal-contact" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-margin-auto-vertical contact-form">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header cont-header">
                    <h2>Contact Us</h2>
                </div>
                <div class="uk-modal-body" uk-overflow-auto>
                    <div class="qc-card">
                        <!-- ##### Quick Contact ##### -->
                        <form class="uk-grid-small" uk-grid>
                            <div class="uk-width-1-1">
                                <input class="uk-input form-text uk-form-large" type="text" placeholder="Name"
                                    required />
                            </div>
                            <div class="uk-width-1-1">
                                <input class="uk-input form-text uk-form-large" type="text" placeholder="E-mail Address"
                                    required />
                            </div>
                            <div class="uk-width-1-1">
                                <textarea class="uk-textarea form-textarea uk-form-large" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="uk-width-1-1 uk-text-center">
                                <input class="quick-submit uk-button bg-transition" value="Submit" />
                            </div>
                        </form>
                        <!-- End Quick Contact Form -->
                    </div>
                    <!-- /.qc-card -->
                </div>
            </div>
        </div>
        <!-- ### End of Modal - Contact ### -->

        <!-- /#mobi-menu -->
        <!-- ##### End Offcanvas ##### -->
        <!-- ### Modal - login ### -->
        <div id="modal-login" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-margin-auto-vertical contact-form">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header cont-header">
                    <h2>Login</h2>
                </div>
                <div class="uk-modal-body" uk-overflow-auto>
                    <div class="qc-card">
                        <form method="post" class="uk-grid-small" uk-grid>
                            <div class="uk-width-1-1">
                                <input class="uk-input form-text uk-form-large" type="text" placeholder="Username" name="username" required />
                            </div>
                            <div class="uk-width-1-1">
                                <input class="uk-input form-text uk-form-large" type="password" placeholder="Password" name="password" required />
                            </div>
                            <div class="uk-width-1-1 uk-text-center">
                                <button type="submit" name="submit1" style="background-color: #8c3838;;" class="btn-transparent hvr-sweep-to-top">Login</button>
                                <div class="forgetpassword">
                                    <a href="#" class="link">Forget Password?</a>
                                </div>
                                <p>
                                    If not registered, please register &nbsp 
                                    <a href="#modal-register" uk-toggle class="link">Register</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
        <!-- ### End of Modal - Login ### -->

        <!-- /#mobi-menu -->
        <!-- ##### End Offcanvas ##### -->
        <!-- ### Modal - register ### -->
        <div id="modal-register" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-margin-auto-vertical contact-form">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header cont-header">
                    <h2>Register</h2>
                </div>
                <div class="uk-modal-body" uk-overflow-auto>
                    <!-- Directly Include the Register Form -->
                    <?php include("register.php"); ?>
                </div>
            </div>
        </div>

        <!-- ### End of Modal - Login ### -->

        <!-- Scripts -->
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/uikit.min.js" type="text/javascript"></script>
        <script src="js/uikit-icons.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </div>
    <!-- #page -->
</body>

</html>