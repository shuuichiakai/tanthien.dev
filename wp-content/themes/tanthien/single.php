<? get_header();?>



<!---->
<div class="columns-container" >
    <div class="container" id="columns">
    <div class="breadcrumb clearfix">
        <?php if ( function_exists('yoast_breadcrumb') )  {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?></div>
         <div class="row">
          <?php include_once 'sidebar.php'; ?>
    
        <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?php the_title(); ?></span>
                </h1>
                <article class="entry-detail">
                   
                    
                    <div class="content-text clearfix">
                      <?php the_content(); ?>
                    </div>
                  
                </article>
                <!-- Related Posts -->
               <div class="single-box">
                    <h2>Bài viết liên quan</h2>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>


                    <?php
                        //for use in the loop, list 5 post titles related to first tag on current post
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                    
                        $first_tag = $tags[0]->term_id;
                        $args=array(
                        'tag__in' => array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>5,
                        'caller_get_posts'=>1
                        );
                        $my_query = new WP_Query($args);
                        if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
               

                        


                        <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                    <a href="<?php the_permalink();?>">
                                     <?php the_post_thumbnail();?>
                                    
                                    </a>
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                             
                                    <div class="entry-more">
                                        <a href="<?php the_permalink();?>">Read more</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                        <?php
                        endwhile;
                        }
                        wp_reset_query();
                        }
                        ?>
                        
                    </ul>
                </div>
                <!-- ./Related Posts -->
        
            </div>
            </div>

       
    </div>
</div>


<!-- Footer -->
<?php get_footer();?>