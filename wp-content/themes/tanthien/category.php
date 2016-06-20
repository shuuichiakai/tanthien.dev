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
                    <span class="page-heading-title2"><?php single_cat_title(); ?></span>
                </h1>
                <div class="sortPagiBar clearfix">
                   
                    <div class="bottom-pagination">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
                 <?php if ( have_posts() ) : ?>
                <ul class="blog-posts">
                <?php
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>

                    <li class="post-item">
                        <article class="entry">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="entry-thumb image-hover2">
                                        <a href="<?php the_permalink(); ?>">
                                         <?php the_post_thumbnail('medium', array('img-responsive')); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="entry-ci">
                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="entry-meta-data">
                                   
                                        </div>
                                   
                                        <div class="entry-excerpt">
                                         <?php the_excerpt(); ?>
                                        </div>
                                        <div class="entry-more">
                                            <a href="<?php the_permalink(); ?>">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    <?php   endwhile; ?>
                    
                </ul>
                <?php else :
                        echo "Đang cập nhật";

                    endif;
                     ?>
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
            </div>
            </div>

       
    </div>
</div>


<!-- Footer -->
<?php get_footer();?>