<?php
// Configuro novo tamanho de imagem ( classes );
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'modelo1', 78, 78, true ); 
		add_image_size( 'modelo2', 48, 48, true ); 
		add_image_size( 'modelo3', 213, 200, true );
		add_image_size( 'modelo4', 200, 200, true );
		add_image_size( 'modelo5', 200, 200, true );
	}

// Echo slug page
	function the_slug($echo=true){
		$slug = basename(get_permalink());
		do_action('before_slug', $slug);
		$slug = apply_filters('slug_filter', $slug);
		if( $echo ) echo $slug;
		do_action('after_slug', $slug);
		return $slug;
	}

// Excerpt limite
	function custom_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Excerpt custom
	function new_excerpt_more($more) {
      	global $post;
		return '... </br><a href="'. get_permalink($post->ID) . '">Conheça mais</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

// Remove post thumbnail class
	function the_post_thumbnail_remove_class($output) {
		$output = preg_replace('/class=".*?"/', '', $output);
		return $output;
	}
	add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');

// Enable Post Thumbnail
	add_theme_support( 'post-thumbnails' ); 

// Adiciona um tipo de Post específico para as Chamadas no Site
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'Chamadas',
			array(
				'labels' => array(
					'name' => __( 'Chamadas' ),
					'singular_name' => __( 'Chamadas' )
				),
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category', 'post_tag') 
			)
		);
	}

// Adiona thumbs nas "chamadas" 
	add_action('init', 'thumbs_chamadas');
	function thumbs_chamadas() {
		add_post_type_support( 'chamadas', 'thumbnail' );
		add_post_type_support( 'chamadas', 'custom-fields'  );
	}

// Desativa as Widgets padrão do wordpress
	function unregister_default_wp_widgets() {
	    unregister_widget('WP_Widget_Pages');
	    unregister_widget('WP_Widget_Calendar');
	    unregister_widget('WP_Widget_Archives');
	    unregister_widget('WP_Widget_Links');
	    unregister_widget('WP_Widget_Meta');
	    unregister_widget('WP_Widget_Search');
	    unregister_widget('WP_Widget_Text');
	    unregister_widget('WP_Widget_Categories');
	    unregister_widget('WP_Widget_Recent_Posts');
	    unregister_widget('WP_Widget_Recent_Comments');
	    unregister_widget('WP_Widget_RSS');
	    unregister_widget('WP_Widget_Tag_Cloud');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);	

// Remove Wordpress Junk
	remove_action('wp_head', 'rsd_link'); // Removes the Really Simple Discovery link
	remove_action('wp_head', 'wlwmanifest_link'); // Removes the Windows Live Writer link
	remove_action('wp_head', 'wp_generator'); // Removes the WordPress version
	remove_action('wp_head', 'start_post_rel_link'); // Removes the random post link
	remove_action('wp_head', 'index_rel_link'); // Removes the index page link
	remove_action('wp_head', 'adjacent_posts_rel_link'); // Removes the next and previous post links


// Remove All classes
	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
	    return array();
	}
// Login style
	function login_page_styles() {
	    wp_enqueue_style( 'login-page-styles', get_template_directory_uri() . '/css/login.css' ); 
	}
	add_action( 'login_enqueue_scripts', 'login_page_styles' );

// Admin style
	function main_dashbord() {
	    wp_enqueue_style( 'main_dashbord', get_template_directory_uri() . '/css/dashboard.css' ); 
	}
	add_action('admin_head', 'main_dashbord');

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

// Insert page in admin top bar
function toolbar_link_to_mypage( $wp_admin_bar ) {
	$args = array(
		'id'    => 'exit',
		'title' => 'Sair',
		'href'  => 'http://localhost/estudo_sebrae/wwwroot/wwwroot/wp-login.php?action=logout&_wpnonce=b7932b04a0',
		'meta'  => array( 'style'=>'float:right !important;' )
	);
	$wp_admin_bar->add_node( $args );
}

function my_login_logo() { ?>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var img ="<?php echo bloginfo('template_url'); ?>/images/panel/logo.png";
			$('body').prepend('<div class="bar"><a target="_blank" href="http://plusinterativa.com"><img class="assinatura" src="'+img+'"/></a></div>');
			$('body').append('<div class="copy">copyright &copy; <a target="_blank" href="http://plusinterativa.com">Plus Interativa</a></div>');
		});
	</script>
	<link href='<?php echo bloginfo('template_url'); ?>/css/panel.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300,600' rel='stylesheet' type='text/css'>
    <style type="text/css">
	    .copy{
	    	position: absolute;
			bottom: 15px;
			text-align: center;
			display: inline-block;
			width: 100%;
			color: #fff;
	    }
	    .copy a{
	    	color: #fff;
	    }
	    .copy a:hover{
	    	text-decoration: none;
	    }
    	.bar{
    		height: 51px;
		  	background: #fff;
		  	border-bottom: 1px solid #EEE;
    	}
    	.assinatura{
		  	width: 110px;
		  	height: auto;
		  	margin: 0 auto;
		  	display: block;
		  	padding-top: 6px;
    	}
		.login form{
			box-shadow:none;
			-webkit-box-shadow:none;
			-moz-box-shadow:none;
		}
		body{
			/*background:#fff;*/
			background: url(<?php echo bloginfo('template_url'); ?>/images/panel/4.jpg) no-repeat center center fixed; 
			background: #046da1; /* Old browsers */
			background: -moz-linear-gradient(top,  #046da1 0%, #008CD8 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#046da1), color-stop(100%,#008CD8)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  #046da1 0%,#008CD8 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  #046da1 0%,#008CD8 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  #046da1 0%,#008CD8 100%); /* IE10+ */
			background: linear-gradient(to bottom,  #046da1 0%,#008CD8 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#046da1', endColorstr='#008CD8',GradientType=0 ); /* IE6-9 */
		  	font-family: 'Open Sans', sans-serif;
		  	-webkit-background-size: cover;
		  	-moz-background-size: cover;
		  	-o-background-size: cover;
		  	background-size: cover;
		}
		.login h1 a {
            background-image: url(<?php echo bloginfo('template_url'); ?>/images/panel/sebraeprev-icon.png) !important;
            /*padding-bottom: 30px;*/
        }
		.login label{
			color: #fff;
			cursor: default;
			font-weight: 100;
			text-transform: uppercase;
		}
		.login label[FOR=rememberme]{
			text-transform: none;
		}
		.login label[FOR=rememberme] input{
			background:#004E74;
			border:none;
			outline: none;
		}
		#loginform{
			background: transparent;
		}
		#loginform input[type=text],
		#loginform input[type=password]{
			background:#004E74;
			border:0;
			color: #fff;
			outline: none;
			font-weight: 800;
  			padding: 4px 10px;
		}
		#loginform input[type=submit]{
			opacity: 1;
		}
		#nav,#backtoblog{display: none;}
		.wp-core-ui .button-primary {
			background: #F0A514;
			border-color: #D79516;
		}
		input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus{
			box-shadow: none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			/*border-color: #D79516;*/
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );