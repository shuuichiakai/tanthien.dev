<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    
</head>


<body class="<?php echo is_home()?'home':''?> option2 right-sidebar">
<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="tel:<?php echo of_get_option('header_mobile');?>"><img alt="phone" src="<?php echo bloginfo('template_url')?>/assets/images/phone.png" /><?php echo of_get_option('header_mobile');?></a>
                <a href="mail:<?php echo of_get_option('header_email');?>"><img alt="email" src="<?php echo bloginfo('template_url')?>/assets/images/email.png" />Liên hệ</a>
            </div>
            <div class="support-link g_slogan">
                <?php
        if ( is_home() ) {
            // This is the blog posts index
            echo '<h1>'.of_get_option('g_sologan').'</h1>';
        } else {
            // This is not the blog posts index
            echo '<span>'.of_get_option('g_sologan').'</span>';
        }
        ?>
                        
            </div>
           
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="/"><img alt="Bách hóa việt" style="max-height:80px;" src="<?php echo of_get_option('header_logo');?>" /></a>
            </div>
            <div class="col-sm-6">
                  
        <div class="col-xs-12 col-md-4"> 
      <div class="coler-desc">
       <div class="coler-icon_pro"><span class="fa fa-credit-card"></span></div>
      <div class="coler-mesting">Thanh toán khi nhận hàng</div>
      </div>  <!-- hotline coler-desc-->
     </div>  <!-- het cam ket-->
      <div class="col-xs-12 col-md-4"> 
      <div class="coler-desc">
       <div class="coler-icon_pro"><span class="fa fa-truck"></span></div>
      <div class="coler-mesting">Giao hàng toàn quốc</div>
      </div>  <!-- hotline coler-desc-->
    </div>  <!-- het cam ket-->
      <div class="col-xs-12 col-md-4">
      <div class="coler-desc">
       <div class="coler-icon_pro"><span class="fa fa-calendar"></span></div>
      <div class="coler-mesting">Đổi/Trả hàng trong 5 ngày</div>
      </div>  <!-- hotline coler-desc--> 
     </div>  <!-- het cam ket-->     
              


            </div>
           <div class=" col-sm-3 ">
               <div class="hotline coler-desc">
                   <div class="coler-icon"><span class="glyphicon glyphicon-phone-alt"></span></div>
                  <div class="coler-mest">Hotline <span>24/7</span>
                  <p class="sdt">
                  <strong><a href="Tel:<?php echo of_get_option('header_mobile');?>"><span style="color: #bf0203;"><?php echo of_get_option('header_mobile');?></span></a></strong>

                  </p></div>
              </div>
            </div>
           
        </div>
        
    </div>
    <!-- END MANIN HEADER -->

    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">DANH MỤC</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                       
                            <?php if ( has_nav_menu( 'sanpham' ) ) : ?>
                
                                    <?php
                                       
                                        wp_nav_menu( array(
                                            'menu_class'     => 'vertical-menu-list',
                                            'theme_location' => 'sanpham',
                                            'walker' => new sanpham_Nav_Menu()
                                        ) );
                                    ?>
                            
                            <?php endif; ?>

           
                        <div class="all-category"><span class="open-cate">Tất cả danh mục</span></div>
                    </div>
                </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                
                                    <?php
                                       
                                        wp_nav_menu( array(
                                            'menu_class'     => 'nav navbar-nav',
                                            'theme_location' => 'primary',
                                            'walker' => new Primary_Nav_Menu()
                                        ) );
                                    ?>
                            
                            <?php endif; ?>
                                
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                    <div id="form-search-opntop">
            <form class="form-inline" action="" method="get">
                  
                      <div class="form-group input-serach">
                        <input type="text" name="s" placeholder="Tìm sản phẩm...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
                </form></div>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->