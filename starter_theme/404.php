<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

			<div id="content" class="site-content">
		      	<div id="primary" class="content-area">
		        	<main id="main" class="site-main" role="main">					
                        <!-- cms content -->
                        <section class="section error-404 cityscape_overly not-found">
                        	 <div class="container">
                        	      <div class="page_not_found">
                                    <h1>404</h1>
                                    <h3>OOPS! Page Not Found!</h3>
                                    <p>The page you are looking for does not exist. It may have been moved, or removed altogether.</p>
                                    <a href="./" class="btn basic_btn">Go to home</a>
                                   </div>
                        	 </div>
                        </section>
					</main>
				</div>
			</div>

<?php
get_footer();
