<?php
/*
Plugin Name: Danh mục sản phẩm
Plugin URI: https://www.facebook.com/shuuichiakai
Description: Hiển thị bài viết của 1 danh mục ra widget
Author: shuuichiakai
Version: 1.0
Author URI: https://www.facebook.com/shuuichiakai
*/



require_once  WP_PLUGIN_DIR.'/ad-widget/lib/Utility.php';


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register our styles
 *
 * @return void
 */

/**
 * Category Posts Widget Class
 *
 * Shows the single category posts with some configurable options
 */
class CategoryPosts extends WP_Widget {
	function CategoryPosts() {
		$widget_ops = array('classname' => 'cat-post-widget', 'description' => __('liệt kê các sản phẩm của 1 danh mục'));
		$this->WP_Widget('category-posts', __('Danh mục sản phẩm'), $widget_ops);
	}
	// Displays category posts widget on blog.
	function widget($args, $instance) {
		global $post;
		$post_old = $post; // Save the post object.
		extract( $args );
		$sizes = get_option('mkrdip_cat_post_thumb_sizes');
		// If not title, use the name of the category.
		if( !$instance["title"] ) {
			$category_info = get_category($instance["cat"]);
			$instance["title"] = $category_info->name;
	  }
	  $valid_sort_orders = array('date', 'title', 'comment_count', 'rand');
	  if ( in_array($instance['sort_by'], $valid_sort_orders) ) {
		$sort_by = $instance['sort_by'];
		$sort_order = (bool) isset( $instance['asc_sort_order'] ) ? 'ASC' : 'DESC';
	  } else {
		// by default, display latest first
		$sort_by = 'date';
		$sort_order = 'DESC';
	  }
		
		// Get array of post info.
	  $cat_posts = new WP_Query(
		"showposts=" . $instance["num"] . 
		"&cat=" . $instance["cat"] .
		"&orderby=" . $sort_by .
		"&order=" . $sort_order
	  );


		echo $before_widget;
		// Widget title
		$term1 = get_term( $instance["cat"], 'danh-muc-san-pham' );
		$slug = $term->slug;


		$children = get_term_children($term1->term_id,'danh-muc-san-pham');
		$term_childs = '';

		foreach ( $children as $child ) {
				$term = get_term_by( 'id', $child, 'danh-muc-san-pham' );
				$term_childs .=  '<li><a href="' . get_term_link( $child, 'danh-muc-san-pham' ) . '">' . $term->name . '</a></li>';
			}

		$prolist = '';
			$args = array(
	 'posts_per_page' => $instance["num"],
	 'orderby' => 'rand',
	 'post_type' => 'san-pham',
	 'orderby'=>' $sort_by',
	 'order'=>$sort_order,
	 
	 'post_status' => 'publish',
	 'tax_query' => array(
		array(
			'taxonomy' => 'danh-muc-san-pham',
			'field' => 'term_id',
			'terms' => $term1->term_id
		))
	

);
$my_query = new WP_Query( $args );


		
		if( $my_query->have_posts() ) {
				  while ($my_query->have_posts()) : $my_query->the_post();

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

				 

				  	$prolist .= '<li class="col-sm-3">
                                                   
                                                    <div class="left-block">
                                                        <a href="'.get_the_permalink().'">'.  get_the_post_thumbnail( $post->ID, 'medium',array('class'=>'img-responsive') ).'</a>
                                                     
                                                        <div class="add-to-cart">
                                                            <a title="Mua hàng" href="'.get_the_permalink().'">Mua hàng</a>
                                                        </div>
                                                    </div>
                                                     <div class="right-block">
                                                        <h5 class="product-name"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>
                                                        <div class="content_price">
                                                            '.$price.'
                                                        </div>
                                                    </div>
                                                </li>';
		
				  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
				


		echo ' <div class="category-featured '.$instance["color"].'">
            <nav class="navbar nav-menu show-brand">
              <div class="container">
       
                  <div class="navbar-brand"><a href="'.get_term_link( $term1, 'danh-muc-san-pham' ).'">'.$instance["title"].'</a></div>
                  <span class="toggle-menu"></span>
             
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                  '.$term_childs.'
               
                  </ul>
                </div>
              </div>
          
            </nav>
           <div class="product-featured clearfix">
                <div class="row">
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active" id="tab-4">
                                 
                                   <div >
                                       <ul class="product-list row">
                                                
                                            '.$prolist.'
                                       </ul>
                                   </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>';
		
	




		wp_reset_postdata();
	
	}

	/**
	 * Update the options
	 *
	 * @param  array $new_instance
	 * @param  array $old_instance
	 * @return array
	 */
	function update($new_instance, $old_instance) {
		$sizes = get_option('mkrdip_cat_post_thumb_sizes');
			
		if ( !$sizes ) {
			$sizes = array();
		}
		
		$sizes[$this->id] = array($new_instance['thumb_w'], $new_instance['thumb_h']);
		update_option('mkrdip_cat_post_thumb_sizes', $sizes);
				
		return $new_instance;
	}

	/**
	 * The widget configuration form back end.
	 *
	 * @param  array $instance
	 * @return void
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'          => __( '' ),
			'color'          => __( 'sports' ),
			'cat'			 => __( '' ),
			'num'            => __( '' ),
			'sort_by'        => __( '' ),
			'asc_sort_order' => __( '' ),
			'title_link'	 => __( '' ),
			'excerpt'        => __( '' ),
			'excerpt_length' => __( '' ),
			'comment_num'    => __( '' ),
			'date'           => __( '' ),
			'thumb'          => __( '' ),
			'thumb_w'        => __( '' ),
			'thumb_h'        => __( '' )
		) );

		$title          = $instance['title'];
		$color          = $instance['color'];
		$cat 			= $instance['cat'];
		$num            = $instance['num'];
		$sort_by        = $instance['sort_by'];
		$asc_sort_order = $instance['asc_sort_order'];
		$title_link		= $instance['title_link'];		
		$excerpt        = $instance['excerpt'];
		$excerpt_length = $instance['excerpt_length'];
		$comment_num    = $instance['comment_num'];
		$date           = $instance['date'];
		$thumb          = $instance['thumb'];
		$thumb_w        = $instance['thumb_w'];
		$thumb_h        = $instance['thumb_h'];


		$link_id = $this->get_field_id('w_link');
		$img_id = $this->get_field_id('w_img');
		        
		 $defaults = array('w_link' => get_bloginfo('url'), 'w_img' => '', 'w_adv' => 'New Advertiser', 'w_resize' => 'no', 'w_new' => 'no');
		        
				$instance = wp_parse_args((array) $instance, $defaults);
		        
		        $img  = $instance['w_img'];
		        $link = $instance['w_link'];
		        $adv  = $instance['w_adv'];
		        $resize  = $instance['w_resize'];
				
			?>
			<p>
				<label for="<?php echo $this->get_field_id("title"); ?>">
					<?php _e( 'Title' ); ?>:
					<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
				</label>
			</p>
			
			<p>
				<label>
					<?php _e( 'Danh mục' ); ?> : 
					<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"],'taxonomy' => 'danh-muc-san-pham','hide_empty'         => 0,  ) ); ?>
				</label>
			</p>
			<p>
				<label>
					<?php _e( 'Màu sắc' ); ?> : 
					<select name="<?php echo $this->get_field_name("color"); ?>">
						<option value="fashion" <?php echo ($instance["color"] == 'fashion')?'selected':' ' ?>>Màu hồng</option>
						<option value="sports" <?php echo ($instance["color"] == 'sports')?'selected':' ' ?>>Màu xanh lá cây</option>
						<option value="electronic" <?php echo ($instance["color"] == 'electronic')?'selected':' ' ?>>Màu xanh nước biển</option>
						<option value="digital" <?php echo ($instance["color"] == 'digital')?'selected':' ' ?>>Màu xanh dương</option>
						<option value="furniture" <?php echo ($instance["color"] == 'furniture')?'selected':' ' ?>>Màu xanh chuối</option>
						<option value="jewelry" <?php echo ($instance["color"] == 'jewelry')?'selected':' ' ?>>Màu xám</option>
					</select>
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id("num"); ?>">
					<?php _e('Số lượng bài hiển thị'); ?>:
					<input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id("sort_by"); ?>">
					<?php _e('Sắp xếp bởi'); ?>:
					<select id="<?php echo $this->get_field_id("sort_by"); ?>" name="<?php echo $this->get_field_name("sort_by"); ?>">
					  <option value="date"<?php selected( $instance["sort_by"], "date" ); ?>>Ngày</option>
					  <option value="title"<?php selected( $instance["sort_by"], "title" ); ?>>Tiêu đề</option>
					  <option value="rand"<?php selected( $instance["sort_by"], "rand" ); ?>>Ngẫu nhiên</option>
					</select>
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id("asc_sort_order"); ?>">
					<input type="checkbox" class="checkbox" 
					  id="<?php echo $this->get_field_id("asc_sort_order"); ?>" 
					  name="<?php echo $this->get_field_name("asc_sort_order"); ?>"
					  <?php checked( (bool) $instance["asc_sort_order"], true ); ?> />
							<?php _e( 'Đảo ngược sắp xếp' ); ?>
				</label>
			</p>

			 <div class="widget-content">
       <p style="text-align: center;" class="bs-proof">
           <?php if($instance['w_img']): ?>
                Ảnh của danh mục.
                <br/><br/><strong>Scaled Visual:</strong><br/>
                <div class="bs-proof"><img style="width:100%;" src="<?php echo $instance['w_img'] ?>" alt="Ad" /></div><br/>
           <?php endif; ?>
           <a href="#" class="upload-button" rel="<?php echo $img_id ?>">Nhấn vào đây để tải ảnh lên.</a> Bạn cũng có thể dán đường dẫn hình ảnh vào ô bên dưới
           
       </p>
       <input class="widefat tag" placeholder="Đường dẫn hình ảnh" type="text" id="<?php echo $img_id; ?>" name="<?php echo $this->get_field_name('w_img'); ?>" value="<?php echo htmlentities($instance['w_img']); ?>" />
       <br/><br/> 
       <p>
            <label for="<?php echo $this->get_field_id('w_link'); ?>">Đường dẫn quảng cáo:</label><br/>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('w_link'); ?>" name="<?php echo $this->get_field_name('w_link'); ?>" value="<?php echo $instance['w_link']; ?>" />
        </p>
       <p>
            <label for="<?php echo $this->get_field_id('w_adv'); ?>">Tên quảng cáo:</label><br/>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('w_adv'); ?>" name="<?php echo $this->get_field_name('w_adv'); ?>" value="<?php echo $instance['w_adv']; ?>" />
        </p>
       <p>
           <label for="<?php echo $this->get_field_id('w_resize'); ?>">Tự động căn chỉnh kích thước? </label>
           <input type="checkbox" name="<?php echo $this->get_field_name('w_resize'); ?>" value="yes"  <?php if($instance['w_resize'] == 'yes') echo 'checked'; ?> />
       </p>
       <p>
           <label for="<?php echo $this->get_field_id('w_new'); ?>">Mở ở cửa sổ mới? </label>
           <input type="checkbox" name="<?php echo $this->get_field_name('w_new'); ?>" value="yes"  <?php if($instance['w_new'] == 'yes') echo 'checked'; ?> />
       </p>
      

        </div>



			<?php

		}

}

add_action( 'widgets_init', create_function('', 'return register_widget("CategoryPosts");') );