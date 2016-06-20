<?php 

/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'mytheme_get_featured_content',
));

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
/*

 * Load Files.
 */





include_once( get_template_directory() . '/inc/product-category.php');
//Loading options.php for theme customizer
include_once( get_template_directory() . '/options.php');

//Loads the Options Panel
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/options/' );
	include_once( get_template_directory() . '/options/options-framework.php' );
}


if ( ! function_exists( 'website_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own website_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function website_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,vietnamese';
	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'websitefonts' ) ) {
		$fonts[] = 'Roboto Condensed:400,700,900,400italic,700italic,900italic';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;

function website_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'website-fonts', website_fonts_url(), array(), null );
	// Theme stylesheet.
	wp_enqueue_style( 'website-style', get_stylesheet_uri() );


	wp_enqueue_style( 'bt-style', get_template_directory_uri(). '/assets/lib/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/assets/lib/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'select2-style', get_template_directory_uri(). '/assets/lib/select2/css/select2.min.css' );
    wp_enqueue_style( 'bxslider-style', get_template_directory_uri(). '/assets/lib/jquery.bxslider/jquery.bxslider.css' );
    wp_enqueue_style( 'owl-style', get_template_directory_uri(). '/assets/lib/owl.carousel/owl.carousel.css' );
    wp_enqueue_style( 'jquery-style', get_template_directory_uri(). '/assets/lib/jquery-ui/jquery-ui.css' );
    wp_enqueue_style( 'animate-style', get_template_directory_uri(). '/assets/css/animate.css' );
    wp_enqueue_style( 'reset-style', get_template_directory_uri(). '/assets/css/reset.css' );
    wp_enqueue_style( 'style-style', get_template_directory_uri(). '/assets/css/style.css' );
    wp_enqueue_style( 'responsive-style', get_template_directory_uri(). '/assets/css/responsive.css' );
    wp_enqueue_style( 'option2-style', get_template_directory_uri(). '/assets/css/option2.css' );



	wp_enqueue_script("jquery");
	wp_enqueue_script( 'bt-script', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script( 'select2-script', get_template_directory_uri() . '/assets/lib/select2/js/select2.min.js');
    wp_enqueue_script( 'bxslider-script', get_template_directory_uri() . '/assets/lib/jquery.bxslider/jquery.bxslider.min.js');
    
    wp_enqueue_script( 'elevatezoom-script', get_template_directory_uri() . '/assets/lib/jquery.elevatezoom.js');
    wp_enqueue_script( 'owl-script', get_template_directory_uri() . '/assets/lib/owl.carousel/owl.carousel.min.js');
    wp_enqueue_script( 'countdown-script', get_template_directory_uri() . '/assets/lib/countdown/jquery.plugin.js');
    wp_enqueue_script( 'countdown2-script', get_template_directory_uri() . '/assets/lib/countdown/jquery.countdown.js');
    wp_enqueue_script( 'actual-script', get_template_directory_uri() . '/assets/js/jquery.actual.min.js');
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/theme-script.js');



	


}

add_action( 'wp_enqueue_scripts', 'website_scripts' );

// Custom Scripting to Move JavaScript from the Head to the Footer

function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// END Custom Scripting to Move JavaScript

/**
*tạo menu
*/
register_nav_menus( array(
		'primary' => __( 'Danh mục chính', 'websites' ),
		'sanpham'  => __( 'Sản phẩm', 'websites' ),
    'dieukhoan'  => __( 'Điều khoản - chính sách', 'websites' ),
		
	) );

add_editor_style('editor-style.css');
/**
*tao post type moi
*/



function san_pham_post_type()
{
 
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Sản phẩm', //Tên post type dạng số nhiều
        'singular_name' => 'Sản phẩm' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type Sản phẩm', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'san-pham'), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, false thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-image-rotate', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('san-pham', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'san_pham_post_type');


function danh_muc_taxonomy() {
 
        /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
         */
        $labels = array(
                'name' => 'Danh mục sản phẩm',
                'singular' => 'Danh mục sản phẩm',
                'menu_name' => 'Danh mục sản phẩm'
        );
 
        /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
         */
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
 
        /* Hàm register_taxonomy để khởi tạo taxonomy
         */
        register_taxonomy('danh-muc-san-pham', 'san-pham', $args);
 
}
 
// Hook into the 'init' action
add_action( 'init', 'danh_muc_taxonomy', 0 );



/**
 * Register widget area.
 *
 * @since Oto trả góp 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Trang chủ widget', 'websites' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'websites' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );


$allowed_widget_tags = "<br><p><b><u><i><div><span><img>";



// The excerpt based on words
if ( !function_exists('web_string_limit_words') ) {
	function web_string_limit_words($string, $word_limit) {
	  $words = explode(' ', $string, ($word_limit + 1));
	    if(count($words) > $word_limit) array_pop($words);
	    $res = implode(' ', $words);
	    $res = trim ($res);
	    //$res = preg_replace("/[.]+$/", "", $res);
	    if ( '' !=  $res) {
	    	return str_replace('[…]', '...', $res); 
		} else {
			return str_replace('[…]', '...', $res); 
		}
	}
}


function custom_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( 'san-pham' != $post->post_type ||  'publish' != $post->post_status  )  {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'custom_remove_cpt_slug', 10, 3 );



function custom_parse_request_tricksy( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'san-pham', 'page') );
    }
}
add_action( 'pre_get_posts', 'custom_parse_request_tricksy' );


class Primary_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu container-fluid\">\n";
  }
  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];

        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
  function start_el( &$output, $item, $depth, $args ) {
        if ( $args->has_children ) {
            $item->classes[] = 'dropdown';
        }

        parent::start_el($output, $item, $depth, $args);
    }
}

class sanpham_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"vertical-dropdown-menu\">\n";
  }
  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];

        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
  function start_el( &$output, $item, $depth, $args ) {
        if ( $args->has_children ) {
            $item->classes[] = 'parent';
        }

        parent::start_el($output, $item, $depth, $args);
    }
}
function breadcrumbs() {
  
  $delimiter = '<span>&raquo;</span>';
  $name = 'Trang chủ'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  
  if ( !is_home() || !is_front_page() || is_paged() ) {
  
    echo '<div id="crumbs">';
  
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
  
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      single_cat_title();
       
  
    }
  
    echo '</div>';
  
  }
}

function product_images( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    )

  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Thư viện ảnh',

    // all post types to utilize (string|array)
    'post_type'     => array('san-pham' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'side',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => 'image',  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Thêm ảnh!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Thêm tệp', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Đính kèm tệp', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );
  $attachments->register( 'product_images', $args ); // unique instance name
}

add_action( 'attachments_register', 'product_images' );
