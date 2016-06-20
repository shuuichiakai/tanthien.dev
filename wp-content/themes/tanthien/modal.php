<style type="text/css">
	#buymedical_form {list-style: none;margin: 0;padding: 0}
	#buymedical_form li{display: inline-block;margin-top: 5px;}
	#buymedical_form .wpcf7-form-control{width: 100%;}
	#buymedical_form .wpcf7-textarea{max-height: 100px;}
	 .wpcf7-submit{background: #bf0203;border-radius: 5px;border: none;color: #fff;padding: 5px 10px}
</style>



<div id="ordermedical" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Đặt hàng ngay</h4>
            </div>
      <div class="modal-body">
      <?php echo do_shortcode('[contact-form-7 id="77" title="Mua hàng"]'); ?>
      </div> 
    </div> 
  </div> 
  </div>

  <div id="modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;"> 
 <div class="modal-dialog" role="document"> 

 

 </div>

</div>

  <div id="modal_reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;"> 
 <div class="modal-dialog" role="document"> 

 <?php echo do_shortcode('[userpro template=register]' ); ?>

 </div>

</div>
