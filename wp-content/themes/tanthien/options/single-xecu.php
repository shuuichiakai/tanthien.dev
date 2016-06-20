<?php
/**
 * Single
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xeototragop
 * @subpackage xeoto_tragop
 * @since Xe oto trả góp 1.0
 */

get_header(); ?>

<?php 
require_once('inc/slider.php');	
 ?>
 <div class="single-sanpham-page">
 	<div class="container">
 		<div class="single-sanpham-content">
 			<div class="col-md-9 left-block">
 			<div class="header-block tragop-title">
				<?php post_type_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
				<div class="row">
			<div class="content-block">
			<?php
				$type = 'gia-xe';
				$args=array(
				  'post_type' => $type,
				  'post_status' => 'publish',
			
				  'caller_get_posts'=> 1
				  );
				$my_query = null ;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
				  while ($my_query->have_posts()) : $my_query->the_post();
			?>
				    <div class="col-md-3 col-xs-6">
					<div class="img-sp">
			            <a href="<?php the_permalink() ?>">
			              <span id="foo2">
			                 <?php the_post_thumbnail( $size = 'post-thumbnail',array('class'=>'img-responsive')) ?>
			                 </span>
			            </a>
			        </div>
			        <div class="name-sp"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
			        <div class="ex-sp"><?php echo web_string_limit_words(get_the_excerpt(),15)?>...</div>
				</div>


			<?php
				  endwhile;
				}
				wp_reset_query();  // Restore global post data stomped by the_post().
			?>
			</div>
			<div class="clearboth"></div>

			


				
		
			</div>
			<div class="pagination">

                <?php wp_pagenavi(); ?>


            </div>
 			</div>
 			<div class="col-md-3 right-block">
 				<div class="block-menu">
				<div class="header-block-menu">
					<span>HÃNG XE</span>
				</div>
				<div class="body-block-menu">
					<?php if ( has_nav_menu( 'hanggiaxeoto' ) ) : ?>
						<?php
						
							wp_nav_menu( array(
								'menu_class'     => 'hanggiaxeoto-menu',
								'theme_location' => 'hanggiaxeoto',
								'container_id'=>'hanggiaxeoto-menu'
							) );
						?>
				<?php endif; ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
			<?php endif; ?>

			





 			</div>
 			<div class="clearboth"></div>

 		</div>
 			
 	</div>
 </div>


<?php get_footer(); ?>
