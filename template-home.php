<?php
/**
Template Name: Home
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <div class="container-flex">
                <div class="row" id="the-portfolios">
                    <div class="col-sm-4" id="home-web-portfolio"></div>
                    <div class="col-sm-4" id="home-photo-portfolio"></div>
                    <div class="col-sm-4" id="home-writing-portfolio"></div>
                </div>

                <div class="row" id="the-blog">
                    <div class="col-xs-12" id="home-blog-sec">

                    </div>
                </div>

            </div>


<?php
get_sidebar();
get_footer();
