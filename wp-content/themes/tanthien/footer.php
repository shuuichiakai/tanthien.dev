
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <p class="widgettitlefooter">BÁCH HÓA VIỆT</p>

                        <p class="dia_chi">Địa chỉ: <?php echo of_get_option('footer_address');?></p>
                        <p class="congty">Email:<?php echo of_get_option('footer_email');?></p>


                    </div> 
                </div>
                <div class="col-md-3">
                <div class="list-left"><p class="widgettitlefooter">LIÊN HỆ BÁN HÀNG</p>            <div class="textwidget lien-he">
                                <p><span class="fa fa-phone-square"></span> Hotline:<strong><a href="Tel:<?php echo of_get_option('footer_hotline');?>"><span style="color: #fff;"> <?php echo of_get_option('footer_hotline');?></span></a></strong></p>
                                <p><span class="fa fa-phone-square"></span> Điện thoại:<strong><a href="Tel:<?php echo of_get_option('footer_mobile');?>"><span style="color: #fff;"> <?php echo of_get_option('footer_mobile');?></span></a></strong></p></div>
                                        </div>
                </div>
                <div class="col-md-3">
                            <div class="list-left"><p class="widgettitlefooter">Điều khoản-Chính sách</p><div class="menu-dieu-khoan-chung-container">
                                

                                <?php if ( has_nav_menu( 'dieukhoan' ) ) : ?>
                
                                    <?php
                                       
                                        wp_nav_menu( array(
                                            'menu_class'     => 'dieu-khoan',
                                            'theme_location' => 'dieukhoan'
                                                                         ) );
                                    ?>
                            
                            <?php endif; ?>
                            </div></div>
                </div>
           
                <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">FACEBOOK</div>
                        <div class="fb-page" data-href="<?php echo of_get_option('fanpage_address');?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo of_get_option('fanpage_address');?>" class="fb-xfbml-parse-ignore"><a href="<?php echo of_get_option('fanpage_address');?>">Facebook</a></blockquote></div>
                    </div>
                    
                </div>
            </div><!-- /#introduce-box -->
        
            
         
            <div id="footer-menu-box">
                

            <?php echo of_get_option('footer_link');?>
                <p class="text-center">Copyrights &#169; 2016 enine.vn . All Rights Reserved. </p>
            </div><!-- /#footer-menu-box -->
        </div> 
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->



<?php wp_footer();?>




<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;js.async=true; 
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=536241956560707";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script async  type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4febbfcc3619866c"></script>


</body>
</html>