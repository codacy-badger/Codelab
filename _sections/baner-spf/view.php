<?php
// Asset rocket plugin
clApp::asset(
    array(
        '/app/assets/plugins/swiper/swiper.min.css',
        '/app/assets/plugins/swiper/swiper.min.js',
    )
);
?>

<section id="clSection_<?php echo $clSection['id']; ?>" class="clSection baner" >

<video id="bannerVideo" autoplay muted loop>
   <source src="<?php echo $clSection['url']; ?>bg.m4v" type="video/mp4" />
   Your browser does not support the video element.
</video>
<div class="layer"></div>


    <!-- Swiper -->
    <div class="swiper-container">
      	<div class="swiper-wrapper">
    		<div class="swiper-slide">

                <div class="container">
                    <!--
                    <div class="image">
                        <img alt="image" src="">
                    </div>
                    -->
                    <h1>Transportation Safety<br /><span>Safety Performance Functions</span></h1>
                    <h5>Web-based tool that allows instant access to your project, perform analyses in seconds, manage users, review reports and presents the results in a user-friendly interface within seconds.</h5>
                </div>
    		</div>
    		<div class="swiper-slide">

                <div class="container">
                    <h1>Cloud-based<br /><span>Multi-Platform access</span></h1>
                    <h5>The most advanced state-of-the-art methods integrated into a user-friendly interface. Powerful and minimalist design allows all users to manage transportation safety projects efficiently.</h5>
                </div>
    		</div>
      	</div>
        <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
    </div>
</section>
