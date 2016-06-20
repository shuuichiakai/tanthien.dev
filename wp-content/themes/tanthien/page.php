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
        
               
                
                <!-- ./Comment -->
            </div>
            </div>

       
    </div>
</div>


<!-- Footer -->
<?php get_footer();?>