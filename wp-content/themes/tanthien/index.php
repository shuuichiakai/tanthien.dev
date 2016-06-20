<? get_header();?>
<?php
$n_of_img = of_get_option('number_of_images');
?>
<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <ul id="contenhomeslider">
                     <?php  
                          for ($i=1; $i <= $n_of_img ; $i++) { 
                          ?>

                      <li> <a href="<?php echo of_get_option('url_img_'.$i);?>"><img alt="<?php echo of_get_option('alt_img_'.$i);?>" src="<?php echo of_get_option('img_num_'.$i);?>" title="<?php echo of_get_option('alt_img_'.$i);?>" /> </a></li>
                    <?php  }?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->

<!---->
<div class="content-page">
    <div class="container">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div id="widget-area" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- .widget-area -->
            <?php endif; ?>


       
    </div>
</div>

<div id="content-wrap">
    <div class="container">
  

        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title">TIN TỨC</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                <?php
                    //is sticky
                    $sticky = get_option( 'sticky_posts' );
                    $args = array(
                        'posts_per_page' => 3, //get all post
                         'post_type' =>'post',
                        'post__in'  => $sticky, //are they sticky post
                        'orderby' => 'modified',
                            'order'   => 'DESC',
                     
                    );
                     
                    // The Query
                    $the_query = new WP_Query( $args );
                    $i = 1;
                    // The Loop //we are only getting a list of the title as a li see the loop docs for details on the loop or copy this from index.php (or posts.php)
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                  
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="<?php the_permalink();?>"><img src="<?php echo  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" alt="<? the_title();?>"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="<?php the_permalink();?>" style="text-transform:uppercase;"><? the_title();?></a>
                            </h5>
                            <div class="post-meta" style="line-height: 100%;margin-top: 10px;text-align: justify;">
                              <?php echo web_string_limit_words(get_the_excerpt(),30) ;?>
                            </div>
                          
                        </div>
                    </li>
                   <?php
    $i++;
 
                    }
                wp_reset_query(); //reset the original WP_Query
 
 
        ?>
 
                </ul>
            </div>
        </div>
        <!-- ./blog list -->
        <!-- service 2 -->
        
        <!-- ./service 2 -->
    </div> <!-- /.container -->
</div>

<!-- Footer -->
<?php get_footer();?>