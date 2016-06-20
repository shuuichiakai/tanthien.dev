<? get_header();?>

<!---->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
           

<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
           <?php include_once 'sidebar.php'; ?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9 sports" id="center_column">
               

                <!-- category short-description -->
                <div class="cat-short-desc">
                    <div class="desc-text text-left">
                        <p>
                           <?php echo  term_description(); ?>
                        </p>
                    </div>
                  
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h1 class="page-heading">
                        <span class="page-heading-title"><?php single_cat_title(); ?></span>
                    </h1>
                    <?php if ( have_posts() ) : ?>
                  
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list style2 grid">
                    <?php
            // Start the Loop.
            while ( have_posts() ) : the_post(); 

                    $gia_ban = get_field( "gia_ban" );
                  $gia_khuyen_mai = get_field( "gia_khuyen_mai" );
                  $price = '';
                  if ($gia_ban && $gia_khuyen_mai) {
                    $price = '<span class="price product-price">'.number_format($gia_ban).'</span>
                                                            <span class="price old-price">'.number_format($gia_khuyen_mai).'</span>';
                  }elseif ($gia_ban) {
                    $price = '<span class="price product-price">'.number_format($gia_ban).'</span>';
                  }else{
                    $price = 'Liên hệ';
                  }


            ?>

                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="<?php the_permalink(); ?>">
                                       

                                        <?php the_post_thumbnail('medium', array('img-responsive')); ?>
                                    </a>
                                    
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                                    <div class="content_price">
                                                           <?php echo($price); ?>
                                                        </div>
                                
                                   
                                   
                                    
                                </div>
                            </div>
                        </li>

                        <?php   endwhile; ?>

                        
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->
                    <?php else :
            echo "Đang cập nhật";

        endif;
         ?>
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>


<!-- Footer -->
<?php get_footer();?>