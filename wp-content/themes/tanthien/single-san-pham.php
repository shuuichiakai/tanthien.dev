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
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-7">

                             <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                        <img id="product-zoom" src='<?php echo $image[0]?>' data-zoom-image="<?php echo $image[0]?>"/>
                                        


                                    
                                    </div>

                                    <?php 

         


                                 $attachments = new Attachments( 'product_images', $post->ID ); ?>
                                 <?php if( $attachments->exist() ) :?>


                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="21" data-loop="true">
                                        <?php 
                                       
                                            while( $attachment = $attachments->get() ) : ?>
                                            <li>
                                                <a href="#" data-image="<?php echo $attachments->url();?>" data-zoom-image="<?php echo $attachments->url();?>">
                                                    <img style="width:auto;height:68px;"  id="product-zoom"  src="<?php echo $attachments->url();?>" /> 
                                                </a>
                                            </li>
                                            <?php 
                     
                                             endwhile; ?>
                                           
                                        </ul>
                                    </div>
                                     <?php 
                                     endif; 

                                    
                                    ?>
                                </div>
                                <!-- product-imge-->



                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-5">
                                <h1 class="product-name"><?php the_title()?></h1>
                               <?php 
                                $gia_ban = get_field( "gia_ban" );
                                  $gia_khuyen_mai = get_field( "gia_khuyen_mai" );
                                  $price = '';
                                  if ($gia_ban && $gia_khuyen_mai) {
                                    $price = '<span class="price product-price">'.number_format($gia_ban).'</span>
                                                                            <span class="old-price">'.number_format($gia_khuyen_mai).'</span>. <span class="discount">'. floor((($gia_ban-$gia_khuyen_mai)/$gia_ban)*100) .'%</span>';
                                  }elseif ($gia_ban) {
                                    $price = '<span class="price product-price">'.number_format($gia_ban).'</span>';
                                  }else{
                                    $price = 'Liên hệ';
                                  }
                                ?>
                                <div class="product-price-group">
                                    <?php echo $price; ?>
                                   
                                </div>

                           
                                <div class="product-desc">
                                    <?php echo the_field('pro-description'); ?>
                                </div>
                                
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" href="#" data-toggle="modal" data-target="#ordermedical">Mua hàng</a>
                                         
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#product-detail">CHI TIẾT</a>
                                </li>
                           
                                <li>
                                    <a data-toggle="tab" href="#reviews">BÌNH LUẬN</a>
                                </li>
                            
                         
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                 <?php the_content(); ?>
                                </div>
                       
                                <div id="reviews" class="tab-panel">
                                    <div class="product-comments-block-tab">
                                        <div class="comment ">
                                           <div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="5"></div>
                                        </div>
                                        
                                      
                                    </div>
                                    
                                </div>
                              
                                
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <div class="box-hotline"></div>
                        <div class="page-product-box">
                            <h3 class="heading">SẢN PHẨM LIÊN QUAN</h3>
                        


                              <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>



                              <?php
                              $terms = get_the_terms( $post->ID, 'danh-muc-san-pham');
                              //print_r($terms);
                                foreach ( $terms as $term ) {
                                    $termID[] = $term->term_id;
                                }


                              //  $the_terms = get_the_terms( $terms[0]->slug, 'danh-muc-san-pham' );
                                //print_r($the_terms);
                                if(isset($the_terms) && !empty($the_terms)){
                                    foreach($the_terms as $the_term){
                                        $the_terms_slugs[] = $the_term->slug;
                                    }
                                }

                                $args = array(
                                                                'post_type' => 'san-pham',
                                                                'posts_per_page' => 6,
                                                                'tax_query' => array(array(
                                                                    'taxonomy' => 'danh-muc-san-pham',
                                                                    'field' => 'slug',
                                                        'terms' => $terms[0]->slug
                                                                )));

                                 $san_pham_khac = new WP_Query($args);

                                //This will print the works which have the same genre as the current post
                                 if( $san_pham_khac->have_posts() ) {   
                                    while ($san_pham_khac->have_posts()) : $san_pham_khac->the_post();
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


                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="<?php the_permalink();?>">
                                               

                                                <?php the_post_thumbnail('medium',array('class'=>'img-responsive'));?>
                                            </a>
                                           
                                            
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                           
                                            <div class="content_price">
                                               <?php echo  $price;?>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <?php
                                 endwhile; 

                            }
                                wp_reset_query(); 
                                ?>
                                
                            </ul>
                                
                                
                           
                        </div>
                        <!-- ./box product -->
                        <!-- box product -->
                        
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>


<?php include 'modal.php'; ?>
<!-- Footer -->
<?php get_footer();?>