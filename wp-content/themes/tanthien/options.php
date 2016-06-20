<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

if(!function_exists('optionsframework_option_name')) {
	function optionsframework_option_name() {
		// This gets the theme name from the stylesheet (lowercase and without spaces)
		$themename = 'tecksv';

		$optionsframework_settings = get_option('optionsframework');
		$optionsframework_settings['id'] = $themename;
		update_option('optionsframework', $optionsframework_settings);

	}
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

if(!function_exists('optionsframework_options')) {

	function optionsframework_options() {

		// Logo type
		$logo_type = array(
			"image_logo" => __( "Image Logo", 'tecksv'),
			"text_logo" => __( "Text Logo", 'tecksv')
		);

		// Search box in the header
		$g_search_box = array(
			"yes" => __( "Yes", 'tecksv'),
			"no" => __( "No", 'tecksv')
		);
		$g_popup_box = array(
			"yes" => __( "Yes", 'tecksv'),
			"no" => __( "No", 'tecksv')
		);
		$g_subiz_box = array(
			"yes" => __( "Yes", 'tecksv'),
			"no" => __( "No", 'tecksv')
		);
		// Breadcrumbs
		$g_breadcrumb = array(
			"yes" => __( "Yes", 'tecksv'),
			"no" => __( "No", 'tecksv')
		);

		// Superfish fade-in animation
		$sf_f_animation_array = array(
			"show" => __( "Enable fade-in animation", 'tecksv'),
			"false" => __( "Disable fade-in animation", 'tecksv')
		);

		// Superfish slide-down animation
		$sf_sl_animation_array = array(
			"show" => __( "Enable slide-down animation", 'tecksv'),
			"false" => __( "Disable slide-down animation", 'tecksv')
		);

		// Superfish animation speed
		$sf_speed_array = array(
			"slow" => __( "Slow", 'tecksv'),
			"normal" => __( "Normal", 'tecksv'),
			"fast" => __( "Fast", 'tecksv')
		);

		// Superfish arrows markup
		$sf_arrows_array = array(
			"true" => __( "Yes", 'tecksv'),
			"false" => __( "No", 'tecksv')
		);

		// Slider show
		$sl_show_array = array(
			"yes" => __( "Show", 'tecksv'),
			"no" => __( "Hide", 'tecksv')
		);

		// Slider effects
		$sl_effect_array = array(
			"fade" => __( "Fade", 'tecksv'),
			"slide" => __( "Slide", 'tecksv')
		);

		// Slider direction
		$sl_direction_array = array(
			'horizontal' => __( 'Horizontal', 'tecksv'),
			'vertical' => __( 'Vertical', 'tecksv')
		);

		// Slider slideshow
		$sl_slideshow_array = array(
			"true" => __( "Yes", 'tecksv'),
			"false" => __( "No", 'tecksv')
		);

		// Slider control nav
		$sl_control_array = array(
			"true" => __( "Yes", 'tecksv'),
			"false" => __( "No", 'tecksv')
		);

		// Slider direction nav
		$sl_direction_nav_array = array(
			"true" => __( "Yes", 'tecksv'),
			"false" => __( "No", 'tecksv')
		);

		// Slide as link
		$sl_as_link_array = array(
			"true" => __( "Yes", 'tecksv'),
			"false" => __( "No", 'tecksv')
		);


		// Slider number nav
		$sl_num_array = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15');


		// Slider caption
		$sl_caption_array = array('show' => __( 'Show', 'tecksv'), 'hide' => __( 'Hide', 'tecksv') );

		// Slider caption title
		$sl_capt_title_array = array('show' => __( 'Show', 'tecksv'), 'hide' => __( 'Hide', 'tecksv') );

		// Slider caption excerpt
		$sl_capt_exc_array = array('show' => __( 'Show', 'tecksv'), 'hide' => __( 'Hide', 'tecksv') );

		// Slider caption button
		$sl_capt_btn_array = array('show' => __( 'Show', 'tecksv'), 'hide' => __( 'Hide', 'tecksv') );


		// Footer menu
		$footer_menu_array = array("true" => __( "Yes", 'tecksv'), "false" => __( "No", 'tecksv') );

		$footer_code_array = array("true" => __( "Yes", 'tecksv'), "false" => __( "No", 'tecksv') );

		$post_sidebar_array = array("left" => __( "Left Sidebar", 'tecksv'), "right" => __( "Right Sidebar", 'tecksv') );

		// Featured image on the blog.
		$post_image_array = array(
			"normal" => __( "Yes", 'tecksv'),
			"noimg" => __( "No", 'tecksv')
		);

		// Featured image size on the single page.
		$single_image_array = array(
			"normal" => __( "Yes", 'tecksv'),
			"noimg" => __( "No", 'tecksv')
		);

		// True/False options array for blog
		$post_opt_array = array("true" => __( "Yes", 'tecksv'), "false" => __( "No", 'tecksv') );





		// Pull all the categories into an array
		$options_categories = array();
		$options_categories_obj = get_categories();
		foreach ($options_categories_obj as $category) {
				$options_categories[$category->cat_ID] = $category->cat_name;
		}

		$all_cats_array = array('from_all' => __( 'Select from all', 'tecksv' ) ) + $options_categories;

		// Pull all the pages into an array
		$options_pages = array();
		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
		$options_pages[''] = __( "Select a page:", "tecksv" );
		foreach ($options_pages_obj as $page) {
				$options_pages[$page->ID] = $page->post_title;
		}

		// If using image radio buttons, define a directory path
		$imagepath =  get_template_directory_uri() . '/inc/images/';

		$options = array();

		$options[] = array( "name" => __( "TỔNG QUAN", "tecksv" ),
							"type" => "heading");

		$options['g_sologan'] = array( "name" => __( "Khẩu hiệu", "tecksv" ),
							"desc" => __( "Nhập Khẩu hiệu", "tecksv" ),
							"id"   => "g_sologan",
							"type" => "textarea",
							"std"  => "nhập khẩu hiệu");


		$options['g_hotline'] = array( "name" => __( "Số điện thoại liên hệ", "tecksv" ),
							"desc" => __( "Nhập số điện thoại liên hệ", "tecksv" ),
							"id"   => "g_hotline",
							"type" => "text",
							"std"  => "0915.916.523");
		$options['g_email'] = array( "name" => __( "Email liên hệ", "tecksv" ),
							"desc" => __( "Nhập email liên hệ", "tecksv" ),
							"id"   => "g_email",
							"type" => "text",
							"std"  => "LIENHE@VANXUANDUONG.COM");
		$options['g_logo'] = array( "name" => __( "Logo website", "tecksv" ),
							"desc" => __( "Tải ảnh lên làm logo", "tecksv" ),
							"id"   => "g_logo",
							"type" => "upload");
		$options['g_keysearch'] = array( "name" => __( "Từ khóa gợi ý", "tecksv" ),
							"desc" => __( "Nhập từ khóa gợi ý", "tecksv" ),
							"id"   => "g_keysearch",
							"type" => "textarea",
							"std"  => "");
		


		$options[] = array( "name" => __( "SLIDESHOW", "tecksv" ),
							"type" => "heading");

		$options['number_of_images'] = array( "name" => __( "Số lượng ảnh", "tecksv" ),
							"desc"    => __( "Hiển thị bao nhiêu ảnh trên slidershow", "tecksv" ),
							"id"      => "number_of_images",
							"type"    => "select",
							"std"     => "1",
							"options" => $sl_num_array);


		$n_of_img = of_get_option('number_of_images');

		//$value['val'] = $val;
		


			for ($i=1; $i <= $n_of_img; $i++) { 
				$options['img_num_'.$i] = array( "name" => __( "Ảnh ".$i, "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => "img_num_".$i,
							"type" => "upload");
				$options['url_img_'.$i] = array( "name" => __( "", "tecksv" ),
							"desc" => __( "Đường dẫn", "tecksv" ),
							"id"   => 'url_img_'.$i,
							"type" => "text",
							"std"  => "/");
				$options['alt_img_'.$i] = array( "name" => __( "", "tecksv" ),
							"desc" => __( "Thuộc tính alt", "tecksv" ),
							"id"   => 'alt_img_'.$i,
							"type" => "text",
							"std"  => "");
			}
			$options[] = array( "name" => __( " MÀU SẮC ", "tecksv" ),
							"type" => "heading");

			$options['bg_color'] = array( "name" => __( "Màu nền", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'bg_color',
							"type" => "color",
							"std"  => "#f1f3f4");
			$options['menu_color'] = array( "name" => __( "Màu nền menu", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'menu_color',
							"type" => "color",
							"std"  => "#ef233c");
			$options['menuc_color'] = array( "name" => __( "Màu nền menu đang chọn", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'menuc_color',
							"type" => "color",
							"std"  => "#ef233c");

			$options[] = array( "name" => __( " HEADER ", "tecksv" ),
							"type" => "heading");
			$options['header_bg_color'] = array( "name" => __( "Màu nền header", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'header_bg_color',
							"type" => "color",
							"std"  => "#232323");

			$options['header_logo'] = array( "name" => __( "Header Logo ", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => "header_logo",
							"type" => "upload");

			$options['header_mobile'] = array( "name" => __( "Số điện thoại trên đầu", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'header_mobile',
							"type" => "text",
							"std"  => "");
			$options['header_email'] = array( "name" => __( "Email trên đầu", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'header_email',
							"type" => "text",
							"std"  => "");


			$options[] = array( "name" => __( " FOOTER ", "tecksv" ),
							"type" => "heading");
			$options['footer_logo'] = array( "name" => __( "Footer Logo ", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => "footer_logo",
							"type" => "upload");
	
			$options['footer_mobile'] = array( "name" => __( "SĐT chân trang", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'footer_mobile',
							"type" => "text",
							"std"  => "");
				$options['footer_hotline'] = array( "name" => __( "hotline chân trang", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'footer_hotline',
							"type" => "text",
							"std"  => "");
			$options['footer_email'] = array( "name" => __( "Email chân trang", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'footer_email',
							"type" => "text",
							"std"  => "");
			$options['footer_address'] = array( "name" => __( "Địa chỉ chân trang", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'footer_address',
							"type" => "text",
							"std"  => "");
			$options['fanpage_address'] = array( "name" => __( "Địa chỉ fanpage", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'fanpage_address',
							"type" => "text",
							"std"  => "");
			$options['footer_link'] = array( "name" => __( "Địa chỉ fanpage", "tecksv" ),
							"desc" => __( "", "tecksv" ),
							"id"   => 'footer_link',
							"type" => "editor",
							"std"  => "");



		
		


		


		

		$options[] = array( "name" => __( "GIỚI THIỆU NGẮN", "tecksv" ),
							"type" => "heading");

		$options['s_intro_title'] = array( "name" => __( "Tiêu đề giới thiệu ngắn", "tecksv" ),
							"desc" => __( "Nhập tiêu đề tùy chỉnh cho phần giới thiệu trang chủ", "tecksv" ),
							"id"   => "s_intro_title",
							"type" => "text",
							"std"  => "");
		$options['s_intro_content'] = array( "name" => __( "Nội dung", "tecksv" ),
							"desc" => __( "Nhập nội dung cho phần giới thiệu trang chủ", "tecksv" ),
							"id"   => "s_intro_content",
							"type" => "editor",
							"std"  => "");

	
		$options['s_intro_img'] = array( "name" => __( "Ảnh đại diện", "tecksv" ),
							"desc" => __( "Tải ảnh đại diện cho phần giới thiệu ngắn", "tecksv" ),
							"id"   => "s_intro_img",
							"type" => "upload");

		$options['s_intro_link'] = array( "name" => __( "Đường dẫn giới thiệu ngắn", "tecksv" ),
							"desc" => __( "Nhập Đường dẫn cho phần giới thiệu trang chủ", "tecksv" ),
							"id"   => "s_intro_link",
							"type" => "text",
							"std"  => "");

		$options[] = array( "name" => __( " CHÂN TRANG", "tecksv" ),
							"type" => "heading");

		$options['c_company_c'] = array( "name" => __( "Liên hệ", "tecksv" ),
							"desc" => __( "Tên Công ty", "tecksv" ),
							"id"   => "c_company_c",
							"type" => "text",
							"std"  => "Nhập tên công ty");

		$options['c_email_c'] = array( 
							"desc" => __( "Nhập Email", "tecksv" ),
							"id"   => "c_email_c",
							"type" => "text",
							"std"  => "Email liên hệ");
		$options['c_website_c'] = array( 
							"desc" => __( "Nhập Website ", "tecksv" ),
							"id"   => "c_website_c",
							"type" => "text",
							"std"  => "Nhập Website ");




		$options['hn_address_c'] = array( "name" => __( "Hà Nội", "tecksv" ),
							"desc" => __( "Nhập địa chỉ liên hệ", "tecksv" ),
							"id"   => "hn_address_c",
							"type" => "text",
							"std"  => "Nhập địa chỉ hàn nội");
		$options['hn_mobile_c'] = array( 
							"desc" => __( "Nhập số điện thoại hà nội", "tecksv" ),
							"id"   => "hn_mobile_c",
							"type" => "text",
							"std"  => "");
		

		$options['hcm_address_s'] = array( "name" => __( "Hồ chí minh", "tecksv" ),
							"desc" => __( "Nhập địa chỉ hcm", "tecksv" ),
							"id"   => "hcm_address_s",
							"type" => "text",
							"std"  => "Địa chỉ hcm");
		$options['hcm_mobile_s'] = array( 
							"desc" => __( "Nhập số điện thoại hcm", "tecksv" ),
							"id"   => "hcm_mobile_s",
							"type" => "text",
							"std"  => "");
		
		$options['c_fb'] = array( "name" => __( "Facebook fanpage", "tecksv" ),
							"desc" => __( "Nhập đường dẫn fanpage", "tecksv" ),
							"id"   => "c_fb",
							"type" => "text",
							"std"  => "");
		$options['c_dk'] = array( "name" => __( "Đăng ký mua thuốc", "tecksv" ),
							"desc" => __( "Nhập đường dẫn Đăng ký mua thuốc", "tecksv" ),
							"id"   => "c_dk",
							"type" => "text",
							"std"  => "");
		$options['c_hd'] = array( "name" => __( "Hướng dẫn mua thuốc", "tecksv" ),
							"desc" => __( "Nhập đường dẫn Hướng dẫn mua thuốc", "tecksv" ),
							"id"   => "c_hd",
							"type" => "text",
							"std"  => "");

		
		$options['c_yt'] = array( "name" => __( "Youtube", "tecksv" ),
							"desc" => __( "Nhập đường dẫn Youtube", "tecksv" ),
							"id"   => "c_yt",
							"type" => "text",
							"std"  => "");

		$options['c_google'] = array( "name" => __( "Code Google", "tecksv" ),
							"desc" => __( "Nhập code của google", "tecksv" ),
							"id"   => "c_google",
							"type" => "textarea",
							"std"  => "");
		$options['footer_code'] = array( "name" => __( "Hiển thị code chat ?", "tecksv" ),
							"desc"    => __( "Hiển thị code chat  ?", "tecksv" ),
							"id"      => "footer_code",
							"std"     => "false",
							"type"    => "radio",
							"options" => $footer_code_array);

		$options['c_codechat'] = array( "name" => __( "Code chat", "tecksv" ),
							"desc" => __( "Nhập Code chat", "tecksv" ),
							"id"   => "c_codechat",
							"type" => "textarea",
							"std"  => "");


		$options['c_copy'] = array( "name" => __( "Bản quyền", "tecksv" ),
							"desc" => __( "Nhập thông tin bản quyền", "tecksv" ),
							"id"   => "c_copy",
							"type" => "text",
							"std"  => "");




		$options[] = array( "name" => __( "Quảng cáo và popup", "tecksv" ),
							"type" => "heading");

		$options['g_popup_box_id'] = array( "name" => __( "Hiển thị popup ?", "tecksv" ),
							"desc"    => __( "Hiển thị popup ?", "tecksv" ),
							"id"      => "g_popup_box_id",
							"type"    => "radio",
							"std"     => "yes",
							"options" => $g_popup_box);

		$options['popup_url'] = array( "name" => __( "Ảnh popup", "tecksv" ),
							"desc" => __( "Tải ảnh popup", "tecksv" ),
							"id"   => "popup_url",
							"type" => "upload");

	
		
		

		
		
		$options['g_mobile1'] = array( "name" => __( "Số điện thoại hỗ trợ 1", "tecksv" ),
												"desc" => __( "Nhập số điện thoại hỗ trợ ở popup 1", "tecksv" ),
												"id"   => "g_mobile1",
												"type" => "text",
												"std"  => "");
							$options['g_mobile2'] = array( "name" => __( "Số điện thoại hỗ trợ 2", "tecksv" ),
																	"desc" => __( "Nhập số điện thoại hỗ trợ ở popup 1", "tecksv" ),
																	"id"   => "g_mobile2",
																	"type" => "text",
																	"std"  => "");


		$options['name_cate_1'] = array( "name" => __( "3 Mục giữa trang chủ", "tecksv" ),
							"desc" => __( "Tên mục 1", "tecksv" ),
							"id"   => "name_cate_1",
							"type" => "text");
		$options['img_cate_1'] = array( 
							"desc" => __( "Ảnh mục 1", "tecksv" ),
							"id"   => "img_cate_1",
							"type" => "upload");
		$options['url_cate_1'] = array( 
							"desc" => __( "Liên kết mục 1", "tecksv" ),
							"id"   => "url_cate_1",
							"type" => "text");


		$options['name_cate_2'] = array( 
							"desc" => __( "Tên mục 2", "tecksv" ),
							"id"   => "name_cate_2",
							"type" => "text");
		$options['img_cate_2'] = array( 
							"desc" => __( "Ảnh mục 2", "tecksv" ),
							"id"   => "img_cate_2",
							"type" => "upload");
		$options['url_cate_2'] = array( 
							"desc" => __( "Liên kết mục 2", "tecksv" ),
							"id"   => "url_cate_2",
							"type" => "text");
		$options['name_cate_3'] = array( 
							"desc" => __( "Tên mục 3", "tecksv" ),
							"id"   => "name_cate_3",
							"type" => "text");
		$options['img_cate_3'] = array( 
							"desc" => __( "Ảnh mục 3", "tecksv" ),
							"id"   => "img_cate_3",
							"type" => "upload");
		$options['url_cate_3'] = array( 
							"desc" => __( "Liên kết mục 3", "tecksv" ),
							"id"   => "url_cate_3",
							"type" => "text");
		
		




	


		return $options;
	}

}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');


if(!function_exists('optionsframework_custom_scripts')) {

	function optionsframework_custom_scripts() { ?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

			$('#example_showhidden').click(function() {
					$('#section-example_text_hidden').fadeToggle(400);
			});

			if ($('#example_showhidden:checked').val() !== undefined) {
				$('#section-example_text_hidden').show();
			}

		});
		</script>

		<?php
		}

}


/**
* Front End Customizer
*
* WordPress 3.4 Required
*/
add_action( 'customize_register', 'tecksv_register' );

if(!function_exists('tecksv_register')) {

	function tecksv_register($wp_customize) {
		/**
		 * This is optional, but if you want to reuse some of the defaults
		 * or values you already have built in the options panel, you
		 * can load them into $options for easy reference
		 */
		$options = optionsframework_options();



		/*-----------------------------------------------------------------------------------*/
		/*	General
		/*-----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'tecksv_header', array(
			'title' => __( 'General', 'tecksv' ),
			'priority' => 200
		));


		/* Search Box */
		$wp_customize->add_setting( 'tecksv[g_search_box_id]', array(
				'default' => $options['g_search_box_id']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_search_box_id', array(
				'label' => $options['g_search_box_id']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_search_box_id]',
				'type' => $options['g_search_box_id']['type'],
				'choices' => $options['g_search_box_id']['options'],
				'priority' => 11
		) );

		/* Breadcrumbs */
		$wp_customize->add_setting( 'tecksv[g_breadcrumbs_id]', array(
				'default' => $options['g_breadcrumbs_id']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_breadcrumbs_id', array(
				'label' => $options['g_breadcrumbs_id']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_breadcrumbs_id]',
				'type' => $options['g_breadcrumbs_id']['type'],
				'choices' => $options['g_breadcrumbs_id']['options'],
				'priority' => 12
		) );

		/* Portfolio cat */
		$wp_customize->add_setting( 'tecksv[g_portfolio_cat]', array(
				'default' => $options['g_portfolio_cat']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_portfolio_cat', array(
				'label' => $options['g_portfolio_cat']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_portfolio_cat]',
				'type' => $options['g_portfolio_cat']['type'],
				'priority' => 13
		) );

		/* g_author_bio */
		$wp_customize->add_setting( 'tecksv[g_author_bio]', array(
				'default' => $options['g_author_bio']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio', array(
				'label' => $options['g_author_bio']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio]',
				'type' => $options['g_author_bio']['type'],
				'choices' => $options['g_author_bio']['options'],
				'priority' => 14
		) );

		/* g_author_bio_title */
		$wp_customize->add_setting( 'tecksv[g_author_bio_title]', array(
				'default' => $options['g_author_bio_title']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_title', array(
				'label' => $options['g_author_bio_title']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_title]',
				'type' => $options['g_author_bio_title']['type'],
				'priority' => 15
		) );

		/* g_author_bio_img */
		$wp_customize->add_setting( 'tecksv[g_author_bio_img]', array(
				'type' => 'option'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'g_author_bio_img', array(
			'label' => $options['g_author_bio_img']['name'],
			'section' => 'tecksv_header',
			'settings' => 'tecksv[g_author_bio_img]',
			'priority' => 16
		) ) );

		/* g_author_bio_message */
		$wp_customize->add_setting( 'tecksv[g_author_bio_message]', array(
				'default' => $options['g_author_bio_message']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_message', array(
				'label' => $options['g_author_bio_message']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_message]',
				'type' => 'text',
				'priority' => 17
		) );

		/* g_author_bio_social_twitter */
		$wp_customize->add_setting( 'tecksv[g_author_bio_social_twitter]', array(
				'default' => $options['g_author_bio_social_twitter']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_social_twitter', array(
				'label' => $options['g_author_bio_social_twitter']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_social_twitter]',
				'type' => $options['g_author_bio_social_twitter']['type'],
				'priority' => 18
		) );

		/* g_author_bio_social_facebook */
		$wp_customize->add_setting( 'tecksv[g_author_bio_social_facebook]', array(
				'default' => $options['g_author_bio_social_facebook']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_social_facebook', array(
				'label' => $options['g_author_bio_social_facebook']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_social_facebook]',
				'type' => $options['g_author_bio_social_facebook']['type'],
				'priority' => 19
		) );

		/* g_author_bio_social_google */
		$wp_customize->add_setting( 'tecksv[g_author_bio_social_google]', array(
				'default' => $options['g_author_bio_social_google']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_social_google', array(
				'label' => $options['g_author_bio_social_google']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_social_google]',
				'type' => $options['g_author_bio_social_google']['type'],
				'priority' => 20
		) );

		/* g_author_bio_social_linked */
		$wp_customize->add_setting( 'tecksv[g_author_bio_social_linked]', array(
				'default' => $options['g_author_bio_social_linked']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_social_linked', array(
				'label' => $options['g_author_bio_social_linked']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_social_linked]',
				'type' => $options['g_author_bio_social_linked']['type'],
				'priority' => 21
		) );

		/* g_author_bio_social_rss */
		$wp_customize->add_setting( 'tecksv[g_author_bio_social_rss]', array(
				'default' => $options['g_author_bio_social_rss']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_g_author_bio_social_rss', array(
				'label' => $options['g_author_bio_social_rss']['name'],
				'section' => 'tecksv_header',
				'settings' => 'tecksv[g_author_bio_social_rss]',
				'type' => $options['g_author_bio_social_rss']['type'],
				'priority' => 22
		) );

		/*-----------------------------------------------------------------------------------*/
		/*	Logo
		/*-----------------------------------------------------------------------------------*/

		$wp_customize->add_section( 'tecksv_logo', array(
			'title' => __( 'Logo & Favicon', 'tecksv' ),
			'priority' => 201
		) );

		/* Logo Type */
		$wp_customize->add_setting( 'tecksv[logo_type]', array(
				'default' => $options['logo_type']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_logo_type', array(
				'label' => $options['logo_type']['name'],
				'section' => 'tecksv_logo',
				'settings' => 'tecksv[logo_type]',
				'type' => $options['logo_type']['type'],
				'choices' => $options['logo_type']['options'],
				'priority' => 11
		) );

		/* Logo Path */
		$wp_customize->add_setting( 'tecksv[logo_url]', array(
			'type' => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
			'label' => $options['logo_url']['name'],
			'section' => 'tecksv_logo',
			'settings' => 'tecksv[logo_url]',
			'priority' => 12
		) ) );

		/* Favicon Path */
		$wp_customize->add_setting( 'tecksv[favicon]', array(
			'type' => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon', array(
			'label' => $options['favicon']['name'],
			'section' => 'tecksv_logo',
			'settings' => 'tecksv[favicon]',
			'priority' => 13
		) ) );

		/*-----------------------------------------------------------------------------------*/
		/*	Navigation
		/*-----------------------------------------------------------------------------------*/

		/* Nav Delay */
		$wp_customize->add_setting( 'tecksv[sf_delay]', array(
				'default' => $options['sf_delay']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sf_delay', array(
				'label' => $options['sf_delay']['name'],
				'section' => 'nav',
				'settings' => 'tecksv[sf_delay]',
				'type' => $options['sf_delay']['type'],
				'priority' => 11
		) );

		/* nav_fade_in */
		$wp_customize->add_setting( 'tecksv[sf_f_animation]', array(
				'default' => $options['sf_f_animation']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sf_f_animation', array(
				'label' => $options['sf_f_animation']['name'],
				'section' => 'nav',
				'settings' => 'tecksv[sf_f_animation]',
				'type' => $options['sf_f_animation']['type'],
				'choices' => $options['sf_f_animation']['options'],
				'priority' => 12
		) );

		/* nav_slide_down */
		$wp_customize->add_setting( 'tecksv[sf_sl_animation]', array(
				'default' => $options['sf_sl_animation']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sf_sl_animation', array(
				'label' => $options['sf_sl_animation']['name'],
				'section' => 'nav',
				'settings' => 'tecksv[sf_sl_animation]',
				'type' => $options['sf_sl_animation']['type'],
				'choices' => $options['sf_sl_animation']['options'],
				'priority' => 13
		) );

		/* nav_speed */
		$wp_customize->add_setting( 'tecksv[sf_speed]', array(
				'default' => $options['sf_speed']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sf_speed', array(
				'label' => $options['sf_speed']['name'],
				'section' => 'nav',
				'settings' => 'tecksv[sf_speed]',
				'type' => $options['sf_speed']['type'],
				'choices' => $options['sf_speed']['options'],
				'priority' => 14
		) );

		/* Nav Arrows */
		$wp_customize->add_setting( 'tecksv[sf_arrows]', array(
				'default' => $options['sf_arrows']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sf_arrows', array(
				'label' => $options['sf_arrows']['name'],
				'section' => 'nav',
				'settings' => 'tecksv[sf_arrows]',
				'type' => $options['sf_arrows']['type'],
				'choices' => $options['sf_arrows']['options'],
				'priority' => 15
		) );


		/*-----------------------------------------------------------------------------------*/
		/*  Slider (visualisation)
		/*-----------------------------------------------------------------------------------*/

		$wp_customize->add_section( 'tecksv_slider_visual', array(
		    'title' => __( 'Slider (visualisation)', 'tecksv' ),
		    'priority' => 202
		) );

		/* Slider Show */
		$wp_customize->add_setting( 'tecksv[sl_show]', array(
		        'default' => $options['sl_show']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_show', array(
		        'label' => $options['sl_show']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_show]',
		        'type' => $options['sl_show']['type'],
		        'choices' => $options['sl_show']['options'],
		        'priority' => 11
		) );

		/* Slider Effect */
		$wp_customize->add_setting( 'tecksv[sl_effect]', array(
		        'default' => $options['sl_effect']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_effect', array(
		        'label' => $options['sl_effect']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_effect]',
		        'type' => $options['sl_effect']['type'],
		        'choices' => $options['sl_effect']['options'],
		        'priority' => 12
		) );

		/* Slider Direction */
		$wp_customize->add_setting( 'tecksv[sl_direction]', array(
		        'default' => $options['sl_direction']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_direction', array(
		        'label' => $options['sl_direction']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_direction]',
		        'type' => $options['sl_direction']['type'],
		        'choices' => $options['sl_direction']['options'],
		        'priority' => 13
		) );

		/* Slider Slideshow */
		$wp_customize->add_setting( 'tecksv[sl_slideshow]', array(
		        'default' => $options['sl_slideshow']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_slideshow', array(
		        'label' => $options['sl_slideshow']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_slideshow]',
		        'type' => $options['sl_slideshow']['type'],
		        'choices' => $options['sl_slideshow']['options'],
		        'priority' => 14
		) );

		/* Slider Controls */
		$wp_customize->add_setting( 'tecksv[sl_control]', array(
		        'default' => $options['sl_control']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_control', array(
		        'label' => $options['sl_control']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_control]',
		        'type' => $options['sl_control']['type'],
		        'choices' => $options['sl_control']['options'],
		        'priority' => 15
		) );

		/* Slider Effect */
		$wp_customize->add_setting( 'tecksv[sl_direction_nav]', array(
		        'default' => $options['sl_direction_nav']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_direction_nav', array(
		        'label' => $options['sl_direction_nav']['name'],
		        'section' => 'tecksv_slider_visual',
		        'settings' => 'tecksv[sl_direction_nav]',
		        'type' => $options['sl_direction_nav']['type'],
		        'choices' => $options['sl_direction_nav']['options'],
		        'priority' => 16
		) );


		/*-----------------------------------------------------------------------------------*/
		/*  Slider (content)
		/*-----------------------------------------------------------------------------------*/

		$wp_customize->add_section( 'tecksv_slider_content', array(
		    'title' => __( 'Slider (content)', 'tecksv' ),
		    'priority' => 203
		) );

		/* Slider Number */
		$wp_customize->add_setting( 'tecksv[sl_num]', array(
		        'default' => $options['sl_num']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_num', array(
		        'label' => $options['sl_num']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_num]',
		        'type' => $options['sl_num']['type'],
		        'choices' => $options['sl_num']['options'],
		        'priority' => 11
		) );

		/* Slider Category */
		$wp_customize->add_setting( 'tecksv[sl_category]', array(
		        'default' => $options['sl_category']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_category', array(
		        'label' => $options['sl_category']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_category]',
		        'type' => $options['sl_category']['type'],
		        'priority' => 12
		) );

		/* Slider Link */
		$wp_customize->add_setting( 'tecksv[sl_as_link]', array(
		        'default' => $options['sl_as_link']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_as_link', array(
		        'label' => $options['sl_as_link']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_as_link]',
		        'type' => $options['sl_as_link']['type'],
		        'choices' => $options['sl_as_link']['options'],
		        'priority' => 13
		) );

		/* Slider Caption */
		$wp_customize->add_setting( 'tecksv[sl_caption]', array(
		        'default' => $options['sl_caption']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_caption', array(
		        'label' => $options['sl_caption']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_caption]',
		        'type' => $options['sl_caption']['type'],
		        'choices' => $options['sl_caption']['options'],
		        'priority' => 14
		) );

		/* Slider Caption Title */
		$wp_customize->add_setting( 'tecksv[sl_capt_title]', array(
		        'default' => $options['sl_capt_title']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_capt_title', array(
		        'label' => $options['sl_capt_title']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_capt_title]',
		        'type' => $options['sl_capt_title']['type'],
		        'choices' => $options['sl_capt_title']['options'],
		        'priority' => 15
		) );

		/* Slider Captiopn Excerpt */
		$wp_customize->add_setting( 'tecksv[sl_capt_exc]', array(
		        'default' => $options['sl_capt_exc']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_capt_exc', array(
		        'label' => $options['sl_capt_exc']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_capt_exc]',
		        'type' => $options['sl_capt_exc']['type'],
		        'choices' => $options['sl_capt_exc']['options'],
		        'priority' => 16
		) );

		/* Slider Caption Excerpt Length */
		$wp_customize->add_setting( 'tecksv[sl_capt_exc_length]', array(
		        'default' => $options['sl_capt_exc_length']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_capt_exc_length', array(
		        'label' => $options['sl_capt_exc_length']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_capt_exc_length]',
		        'type' => $options['sl_capt_exc_length']['type'],
		        'priority' => 17
		) );

		/* Slider Caption Button */
		$wp_customize->add_setting( 'tecksv[sl_capt_btn]', array(
		        'default' => $options['sl_capt_btn']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_capt_btn', array(
		        'label' => $options['sl_capt_btn']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_capt_btn]',
		        'type' => $options['sl_capt_btn']['type'],
		        'choices' => $options['sl_capt_btn']['options'],
		        'priority' => 18
		) );

		/* Slider Caption Button Text */
		$wp_customize->add_setting( 'tecksv[sl_capt_btn_txt]', array(
		        'default' => $options['sl_capt_btn_txt']['std'],
		        'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_sl_capt_btn_txt', array(
		        'label' => $options['sl_capt_btn_txt']['name'],
		        'section' => 'tecksv_slider_content',
		        'settings' => 'tecksv[sl_capt_btn_txt]',
		        'type' => $options['sl_capt_btn_txt']['type'],
		        'priority' => 19
		) );

		/*-----------------------------------------------------------------------------------*/
		/*	Blog
		/*-----------------------------------------------------------------------------------*/


		$wp_customize->add_section( 'tecksv_blog', array(
				'title' => __( 'Blog', 'tecksv' ),
				'priority' => 204
		) );

		/* Blog sidebar position */
		$wp_customize->add_setting( 'tecksv[blog_sidebar_pos]', array(
				'default' => $options['blog_sidebar_pos']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_blog_sidebar_pos', array(
				'label' => $options['blog_sidebar_pos']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[blog_sidebar_pos]',
				'type' => $options['blog_sidebar_pos']['type'],
				'choices' => $options['blog_sidebar_pos']['options'],
				'priority' => 11
		) );

		/* Blog image size */
		$wp_customize->add_setting( 'tecksv[post_image_size]', array(
				'default' => $options['post_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_image_size', array(
				'label' => $options['post_image_size']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_image_size]',
				'type' => $options['post_image_size']['type'],
				'choices' => $options['post_image_size']['options'],
				'priority' => 12
		) );

		/* Single post image size */
		$wp_customize->add_setting( 'tecksv[single_image_size]', array(
				'default' => $options['single_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_single_image_size', array(
				'label' => $options['single_image_size']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[single_image_size]',
				'type' => $options['single_image_size']['type'],
				'choices' => $options['single_image_size']['options'],
				'priority' => 13
		) );

		/* Post Meta */
		$wp_customize->add_setting( 'tecksv[post_meta]', array(
				'default' => $options['post_meta']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_meta', array(
				'label' => $options['post_meta']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_meta]',
				'type' => $options['post_meta']['type'],
				'choices' => $options['post_meta']['options'],
				'priority' => 14
		) );

		/* Post Excerpt */
		$wp_customize->add_setting( 'tecksv[post_excerpt]', array(
				'default' => $options['post_excerpt']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_excerpt', array(
				'label' => $options['post_excerpt']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_excerpt]',
				'type' => $options['post_excerpt']['type'],
				'choices' => $options['post_excerpt']['options'],
				'priority' => 15
		) );

		/* Post Button */
		$wp_customize->add_setting( 'tecksv[post_button]', array(
				'default' => $options['post_button']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_button', array(
				'label' => $options['post_button']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_button]',
				'type' => $options['post_button']['type'],
				'choices' => $options['post_button']['options'],
				'priority' => 16
		) );

		/* Post Button Text */
		$wp_customize->add_setting( 'tecksv[post_button_txt]', array(
				'default' => $options['post_button_txt']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_button_txt', array(
				'label' => $options['post_button_txt']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_button_txt]',
				'type' => $options['post_button_txt']['type'],
				'priority' => 17
		) );


		/* Post author */
		$wp_customize->add_setting( 'tecksv[post_author]', array(
				'default' => $options['post_author']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_post_author', array(
				'label' => $options['post_author']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[post_author]',
				'type' => $options['post_author']['type'],
				'choices' => $options['post_author']['options'],
				'priority' => 19
		) );


		/* Related title */
		$wp_customize->add_setting( 'tecksv[blog_related]', array(
				'default' => $options['blog_related']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_blog_related', array(
				'label' => $options['blog_related']['name'],
				'section' => 'tecksv_blog',
				'settings' => 'tecksv[blog_related]',
				'type' => $options['blog_related']['type'],
				'priority' => 20
		) );

		/*-----------------------------------------------------------------------------------*/
		/*	Portfolio
		/*-----------------------------------------------------------------------------------*/


		$wp_customize->add_section( 'tecksv_portfolio', array(
				'title' => __( 'Portfolio', 'tecksv' ),
				'priority' => 205
		) );

		/* Per page */
		$wp_customize->add_setting( 'tecksv[portfolio_per_page]', array(
				'default' => $options['portfolio_per_page']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_portfolio_per_page', array(
				'label' => $options['portfolio_per_page']['name'],
				'section' => 'tecksv_portfolio',
				'settings' => 'tecksv[portfolio_per_page]',
				'type' => $options['portfolio_per_page']['type'],
				'priority' => 11
		) );

		/* Thumb */
		$wp_customize->add_setting( 'tecksv[portfolio_show_thumbnail]', array(
				'default' => $options['portfolio_show_thumbnail']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'portfolio_show_thumbnail', array(
				'label' => $options['portfolio_show_thumbnail']['name'],
				'section' => 'tecksv_portfolio',
				'settings' => 'tecksv[portfolio_show_thumbnail]',
				'type' => $options['portfolio_show_thumbnail']['type'],
				'choices' => $options['portfolio_show_thumbnail']['options'],
				'priority' => 12
		) );

		/* Title */
		$wp_customize->add_setting( 'tecksv[portfolio_show_title]', array(
				'default' => $options['portfolio_show_title']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'portfolio_show_title', array(
				'label' => $options['portfolio_show_title']['name'],
				'section' => 'tecksv_portfolio',
				'settings' => 'tecksv[portfolio_show_title]',
				'type' => $options['portfolio_show_title']['type'],
				'choices' => $options['portfolio_show_title']['options'],
				'priority' => 13
		) );

		/* Excerpt */
		$wp_customize->add_setting( 'tecksv[portfolio_show_excerpt]', array(
				'default' => $options['portfolio_show_excerpt']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'portfolio_show_excerpt', array(
				'label' => $options['portfolio_show_excerpt']['name'],
				'section' => 'tecksv_portfolio',
				'settings' => 'tecksv[portfolio_show_excerpt]',
				'type' => $options['portfolio_show_excerpt']['type'],
				'choices' => $options['portfolio_show_excerpt']['options'],
				'priority' => 14
		) );

		/* Link */
		$wp_customize->add_setting( 'tecksv[portfolio_show_link]', array(
				'default' => $options['portfolio_show_link']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'portfolio_show_link', array(
				'label' => $options['portfolio_show_link']['name'],
				'section' => 'tecksv_portfolio',
				'settings' => 'tecksv[portfolio_show_link]',
				'type' => $options['portfolio_show_link']['type'],
				'choices' => $options['portfolio_show_link']['options'],
				'priority' => 15
		) );

		/*-----------------------------------------------------------------------------------*/
		/*	Footer
		/*-----------------------------------------------------------------------------------*/

		$wp_customize->add_section( 'tecksv_footer', array(
			'title' => __( 'Footer', 'tecksv' ),
			'priority' => 206
		) );

		/* Footer Copyright Text */
		$wp_customize->add_setting( 'tecksv[footer_text]', array(
				'default' => $options['footer_text']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_footer_text', array(
				'label' => $options['footer_text']['name'],
				'section' => 'tecksv_footer',
				'settings' => 'tecksv[footer_text]',
				'type' => 'text'
		) );


		/* Display Footer Menu */
		$wp_customize->add_setting( 'tecksv[footer_menu]', array(
				'default' => $options['footer_menu']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'tecksv_footer_menu', array(
				'label' => $options['footer_menu']['name'],
				'section' => 'tecksv_footer',
				'settings' => 'tecksv[footer_menu]',
				'type' => $options['footer_menu']['type'],
				'choices' => $options['footer_menu']['options']
		) );



	};

}
