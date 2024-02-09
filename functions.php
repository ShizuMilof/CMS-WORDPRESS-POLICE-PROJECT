<?php
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		//add_theme_support( 'title-tag' );
		register_nav_menus( array(
			'glavni-menu'	=> "Glavni navigacijski izbornik",
			'sporedni-menu' => "Izbornik u podnožju",
		) );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-background', apply_filters
			(
				'test_custom_background_args', array
				(
					'default-color' => 'f4f4f4',
					'default-image' => '',
				)
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );


function pol_tema_styles(){
	wp_enqueue_style( 'glavni-css', get_stylesheet_directory_uri() . '/style.css', false, '20150320' );
	wp_enqueue_style( 'bootstrap_blog_css', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . '/assets/fontawesome-free/css/all.css');
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Zen+Maru+Gothic&display=swap', false );
}

add_action( 'wp_enqueue_scripts', 'pol_tema_styles');

function pol_tema_js(){
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script( 'blog_js', get_template_directory_uri() . '/js/scripts.js');
}

add_action( 'wp_enqueue_scripts', 'pol_tema_js');

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

function admin_enqueue_scripts_callback(){

    //Add the Select2 CSS file
    wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0-rc.0');

    //Add the Select2 JavaScript file
    wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', 'jquery', '4.1.0-rc.0');

    //Add a JavaScript file to initialize the Select2 elements
    wp_enqueue_script( 'select2-init', '/wp-content/plugins/select-2-tutorial/select2-init.js', 'jquery', '4.1.0-rc.0');

}
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts_callback' );

/* datatables css and js */
function datatables_assets() {
	wp_enqueue_style( 'datatable_style', 'https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css' );
	wp_enqueue_script( 'datatables', 'https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js', array( 'jquery' ) );
    wp_enqueue_script( 'glavni-js', get_stylesheet_directory_uri() . '/js/scriptsss.js', array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'datatables_assets' );

//messing with footer pls help
function aktiviraj_sidebar()
{
	register_sidebar(
		array (
			'name' => "Glavni sidebar",
			'id' => 'glavni-sidebar',
			'description' => "Glavni sidebar",
			'before_widget' => '<div class="widget-content">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 1",
			'id' => 'footer-sidebar1',
			'description' => "Footer sidebar 1",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 2",
			'id' => 'footer-sidebar2',
			'description' => "Footer sidebar 2",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 3",
			'id' => 'footer-sidebar3',
			'description' => "Footer sidebar 3",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 4",
			'id' => 'footer-sidebar4',
			'description' => "Footer sidebar 4",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'aktiviraj_sidebar' );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="btn btn-primary"';
}


function registriraj_policajac_cpt() {
    $labels = array(
        'name' => _x( 'Policajci', 'Post Type General Name', 'pol' ),
        'singular_name' => _x( 'Policajac', 'Post Type Singular Name', 'pol' ),
        'menu_name' => __( 'Policajci', 'pol' ),
        'name_admin_bar' => __( 'Policajci', 'pol' ),
        'archives' => __( 'Policajci arhiva', 'pol' ),
        'attributes' => __( 'Atributi', 'pol' ),
        'parent_item_colon' => __( 'Roditeljski element', 'pol' ),
        'all_items' => __( 'Svi policajci', 'pol' ),
        'add_new_item' => __( 'Dodaj novoga policajca', 'pol' ),
        'add_new' => __( 'Dodaj novi', 'pol' ),
        'new_item' => __( 'Novi policajac', 'pol' ),
        'edit_item' => __( 'Uredi policajca', 'pol' ),
        'update_item' => __( 'Ažuriraj policajca', 'pol' ),
        'view_item' => __( 'Pogledaj policajca', 'pol' ),
        'view_items' => __( 'Pogledaj policajace', 'pol' ),
        'search_items' => __( 'Pretraži policajace', 'pol' ),
        'not_found' => __( 'Nije pronađeno', 'pol' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'pol' ),
        'featured_image' => __( 'Glavna slika', 'pol' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'pol' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'pol' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'pol' ),
        'insert_into_item' => __( 'Umentni', 'pol' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'pol' ),
        'items_list' => __( 'Lista', 'pol' ),
        'items_list_navigation' => __( 'Navigacija među policajcima', 'pol' ),
        'filter_items_list' => __( 'Filtriranje policajaca', 'pol' ),
    );
    $args = array(
        'label' => __( 'Policajac', 'pol' ),
        'description' => __( 'Policajac post type', 'pol' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type( 'policajac', $args );
}
add_action( 'init', 'registriraj_policajac_cpt', 0 );

function registriraj_vozilo_cpt() {
    $labels = array(
        'name' => _x( 'Vozila', 'Post Type General Name', 'pol' ),
        'singular_name' => _x( 'Vozilo', 'Post Type Singular Name', 'pol' ),
        'menu_name' => __( 'Vozila', 'pol' ),
        'name_admin_bar' => __( 'Vozila', 'pol' ),
        'archives' => __( 'Vozila arhiva', 'pol' ),
        'attributes' => __( 'Atributi', 'pol' ),
        'parent_item_colon' => __( 'Roditeljski element', 'pol' ),
        'all_items' => __( 'Sva vozila', 'pol' ),
        'add_new_item' => __( 'Dodaj novo vozilo', 'pol' ),
        'add_new' => __( 'Dodaj novi', 'pol' ),
        'new_item' => __( 'Novo vozilo', 'pol' ),
        'edit_item' => __( 'Uredi vozilo', 'pol' ),
        'update_item' => __( 'Ažuriraj vozilo', 'pol' ),
        'view_item' => __( 'Pogledaj vozilo', 'pol' ),
        'view_items' => __( 'Pogledaj vozila', 'pol' ),
        'search_items' => __( 'Pretraži vozila', 'pol' ),
        'not_found' => __( 'Nije pronađeno', 'pol' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'pol' ),
        'featured_image' => __( 'Glavna slika', 'pol' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'pol' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'pol' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'pol' ),
        'insert_into_item' => __( 'Umentni', 'pol' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'pol' ),
        'items_list' => __( 'Lista', 'pol' ),
        'items_list_navigation' => __( 'Navigacija među vozilima', 'pol' ),
        'filter_items_list' => __( 'Filtriranje vozila', 'pol' ),
    );
    $args = array(
        'label' => __( 'Vozilo', 'pol' ),
        'description' => __( 'Vozilo post type', 'pol' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type( 'vozilo', $args );
}
add_action( 'init', 'registriraj_vozilo_cpt', 0 );


function registriraj_taksonomiju_odjel() {
    $labels = array(
        'name' => _x( 'Odjeli', 'Taxonomy General Name',
        'pol' ),
        'singular_name' => _x( 'Odjel', 'Taxonomy Singular Name',
        'pol' ),
        'menu_name' => __( 'Odjeli', 'pol' ),
        'all_items' => __( 'Sva odjeli', 'pol' ),
        'parent_item' => __( 'Roditeljski odjel', 'pol' ),
        'parent_item_colon' => __( 'Roditeljski odjel', 'pol' ),
        'new_item_name' => __( 'Novi odjel', 'pol' ),
        'add_new_item' => __( 'Dodaj novi odjel', 'pol' ),
        'edit_item' => __( 'Uredi odjel', 'pol' ),
        'update_item' => __( 'Ažuiriraj odjel', 'pol' ),
        'view_item' => __( 'Pogledaj odjel', 'pol' ),
        'separate_items_with_commas' => __( 'Odvojite odjele sa zarezima', 'pol' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni odjel', 'pol' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'pol' ),
        'popular_items' => __( 'Popularna odjeli', 'pol' ),
        'search_items' => __( 'Pretraga', 'pol' ),
        'not_found' => __( 'Nema rezultata', 'pol' ),
        'no_terms' => __( 'Nema odjela', 'pol' ),
        'items_list' => __( 'Lista odjela', 'pol' ),
        'items_list_navigation' => __( 'Navigacija', 'pol' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'odjel', array( 'policajac' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_odjel', 0 );


function registriraj_taksonomiju_policijsko_zvanje() {
    $labels = array(
        'name' => _x( 'Policijska zvanja', 'Taxonomy General Name',
        'pol' ),
        'singular_name' => _x( 'Policijsko zvanje', 'Taxonomy Singular Name',
        'pol' ),
        'menu_name' => __( 'Policijska zvanja', 'pol' ),
        'all_items' => __( 'Sva policijska zvanja', 'pol' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'pol' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'pol' ),
        'new_item_name' => __( 'Novo policijsko zvanje', 'pol' ),
        'add_new_item' => __( 'Dodaj novo policijsko zvanje', 'pol' ),
        'edit_item' => __( 'Uredi policijsko zvanje', 'pol' ),
        'update_item' => __( 'Ažuiriraj policijsko zvanje', 'pol' ),
        'view_item' => __( 'Pogledaj policijsko zvanje', 'pol' ),
        'separate_items_with_commas' => __( 'Odvojite zvanja sa zarezima', 'pol' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni policijsko zvanje', 'pol' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'pol' ),
        'popular_items' => __( 'Popularna policijska zvanja', 'pol' ),
        'search_items' => __( 'Pretraga', 'pol' ),
        'not_found' => __( 'Nema rezultata', 'pol' ),
        'no_terms' => __( 'Nema policijskih zvanja', 'pol' ),
        'items_list' => __( 'Lista policijskih zvanja', 'pol' ),
        'items_list_navigation' => __( 'Navigacija', 'pol' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'policijsko_zvanje', array( 'policajac' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_policijsko_zvanje', 0 );

function registriraj_taksonomiju_postaja() {
    $labels = array(
        'name' => _x( 'Postaje', 'Taxonomy General Name',
        'pol' ),
        'singular_name' => _x( 'Postaja', 'Taxonomy Singular Name',
        'pol' ),
        'menu_name' => __( 'Postaje', 'pol' ),
        'all_items' => __( 'Sve postaje', 'pol' ),
        'parent_item' => __( 'Roditeljska postaja', 'pol' ),
        'parent_item_colon' => __( 'Roditeljska postaja', 'pol' ),
        'new_item_name' => __( 'Nova postaja', 'pol' ),
        'add_new_item' => __( 'Dodaj novu postaju', 'pol' ),
        'edit_item' => __( 'Uredi postaju', 'pol' ),
        'update_item' => __( 'Ažuiriraj postaju', 'pol' ),
        'view_item' => __( 'Pogledaj postaju', 'pol' ),
        'separate_items_with_commas' => __( 'Odvojite postaje sa zarezima', 'pol' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni postaju', 'pol' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'pol' ),
        'popular_items' => __( 'Popularne postaje', 'pol' ),
        'search_items' => __( 'Pretraga', 'pol' ),
        'not_found' => __( 'Nema rezultata', 'pol' ),
        'no_terms' => __( 'Nema postaja', 'pol' ),
        'items_list' => __( 'Lista postaja', 'pol' ),
        'items_list_navigation' => __( 'Navigacija', 'pol' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'postaja', array( 'policajac' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_postaja', 0 );

function registriraj_taksonomiju_vrsta_vozila() {
    $labels = array(
        'name' => _x( 'Vrste vozila', 'Taxonomy General Name',
        'pol' ),
        'singular_name' => _x( 'Vrsta vozila', 'Taxonomy Singular Name',
        'pol' ),
        'menu_name' => __( 'Vrste vozila', 'pol' ),
        'all_items' => __( 'Sve vrste', 'pol' ),
        'parent_item' => __( 'Roditeljska vrsta vozila', 'pol' ),
        'parent_item_colon' => __( 'Roditeljska vrsta vozila', 'pol' ),
        'new_item_name' => __( 'Nova vrsta vozila', 'pol' ),
        'add_new_item' => __( 'Dodaj novu vrstu vozila', 'pol' ),
        'edit_item' => __( 'Uredi vrstu vozila', 'pol' ),
        'update_item' => __( 'Ažuiriraj vrstu vozila', 'pol' ),
        'view_item' => __( 'Pogledaj vrstu vozila', 'pol' ),
        'separate_items_with_commas' => __( 'Odvojite vrste sa zarezima', 'pol' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni vrstu vozila', 'pol' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'pol' ),
        'popular_items' => __( 'Popularne vrste vozila', 'pol' ),
        'search_items' => __( 'Pretraga', 'pol' ),
        'not_found' => __( 'Nema rezultata', 'pol' ),
        'no_terms' => __( 'Nema vrste vozila', 'pol' ),
        'items_list' => __( 'Lista vrsta vozila', 'pol' ),
        'items_list_navigation' => __( 'Navigacija', 'pol' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'vrsta_vozila', array( 'vozilo' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_vrsta_vozila', 0 );



function daj_policajce()
{
    $date1 = date('Y-m-d');
    $placeholder_date = "20-02-2023";
    $converted_date = date("Y-m-d", strtotime($placeholder_date) );

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'policajac',
        'post_status' => 'publish',
        /*'tax_query' => array(
            
            array(
                'taxonomy' => 'odjel',
                'field' => 'slug',
                'terms' => $odjel
            )

        )*/
    );
    /*$policajci = get_posts( $args );
    $sHtml = "<ul>";
    foreach ($policajci as $policajac)
    {
        $sPolicajacUrl = $policajac->guid;
        $sPolicajacNaziv = $policajac->post_title;
        $sHtml .= '<li><a href="'.$sPolicajacUrl.'">'.$sPolicajacNaziv.'</a></li>';
    }
    $sHtml .= "</ul>";
    return $sHtml;*/

    $policajci = get_posts( $args );
		$sHtml = "<table id='my-first-table' class='table rounded rounded-3 overflow-hidden'><thead class='thead-dark'><tr><th>Ime i prezime</th><th>Policijsko zvanje</th><th>Odjel</th></thead>";
		foreach ($policajci as $policajac)
		{
            $sPolicajacUrl = $policajac->guid;
            $sPolicajacNaziv = $policajac->post_title;
           
            $oPolicijskaZvanja = wp_get_post_terms( $policajac->ID, 'policijsko_zvanje' );
            $sPolicijskoZvanje = "-";
            if(sizeof($oPolicijskaZvanja)>0)
            {
                $sPolicijskoZvanje = $oPolicijskaZvanja[0]->name;
            }
            

            $oOdjeli = wp_get_post_terms( $policajac->ID, 'odjel' );
            $sOdjel = "-";
            if(sizeof($oOdjeli)>0)
            {
                $sOdjel = $oOdjeli[0]->name;
            }

            
                

            $sHtml .= '<tr><td><a href="'.$sPolicajacUrl.'">'.$sPolicajacNaziv.'</a></td>';
            $sHtml .= '<td>'.$sPolicijskoZvanje.'</td>';
            $sHtml .= '<td>'.$sOdjel.'</td>';
            /*if ($date1 > $converted_date){
                
                $sHtml .= '<td class="table-info" data-toggle="tooltip" data-placement="right" title="Registracija je istekla!">'.$placeholder_date.'</td>';
            }                
            else {
                $sHtml .= '<td>'.$placeholder_date.'</td>';
            }
            */
            
		}
		$sHtml .= "</tbody></table>";
		return $sHtml;
}

//dodavanje ------------------- tagova kao postaje -----------------------------------------
/*function pol_filter_archive( $query ) {
    if ( is_admin() ) {
            return;
    }
    if ( is_archive() ) {
            if ( 'cat' === $_GET['getby'] ) {
                        $taxquery = array(
                                array(
                                        'taxonomy' => 'postaja',
                                        'field' => 'slug',
                                        'terms' => $_GET['cat'],
                                ),
                        );
                        $query->set( 'tax_query', $taxquery );
            }
    }        return $query;
}
add_action( 'pre_get_posts', 'pol_filter_archive');*/


//--------POSTAJE--------------------------

function registriraj_postaja_cpt() {
    $labels = array(
        'name' => _x( 'Postaje', 'Post Type General Name', 'pol' ),
        'singular_name' => _x( 'Postaja', 'Post Type Singular Name', 'pol' ),
        'menu_name' => __( 'Postaje', 'pol' ),
        'name_admin_bar' => __( 'Postaje', 'pol' ),
        'archives' => __( 'Postaje arhiva', 'pol' ),
        'attributes' => __( 'Atributi', 'pol' ),
        'parent_item_colon' => __( 'Roditeljski element', 'pol' ),
        'all_items' => __( 'Sve postaje', 'pol' ),
        'add_new_item' => __( 'Dodaj novu postaju', 'pol' ),
        'add_new' => __( 'Dodaj novu', 'pol' ),
        'new_item' => __( 'Nova postaja', 'pol' ),
        'edit_item' => __( 'Uredi postaju', 'pol' ),
        'update_item' => __( 'Ažuriraj postaju', 'pol' ),
        'view_item' => __( 'Pogledaj postaju', 'pol' ),
        'view_items' => __( 'Pogledaj postaje', 'pol' ),
        'search_items' => __( 'Pretraži postaje', 'pol' ),
        'not_found' => __( 'Nije pronađeno', 'pol' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'pol' ),
        'featured_image' => __( 'Glavna slika', 'pol' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'pol' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'pol' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'pol' ),
        'insert_into_item' => __( 'Umentni', 'pol' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'pol' ),
        'items_list' => __( 'Lista', 'pol' ),
        'items_list_navigation' => __( 'Navigacija među postajama', 'pol' ),
        'filter_items_list' => __( 'Filtriranje postaje', 'pol' ),
    );
    $args = array(
        'label' => __( 'Postaja', 'pol' ),
        'description' => __( 'Postaja post type', 'pol' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type( 'postaja', $args );
}
add_action( 'init', 'registriraj_postaja_cpt', 0 );

function registriraj_taksonomiju_uprava_postaje() {
    $labels = array(
        'name' => _x( 'Uprave', 'Taxonomy General Name',
        'pol' ),
        'singular_name' => _x( 'Uprava', 'Taxonomy Singular Name',
        'pol' ),
        'menu_name' => __( 'Uprave', 'pol' ),
        'all_items' => __( 'Sve uprave', 'pol' ),
        'parent_item' => __( 'Roditeljska uprava', 'pol' ),
        'parent_item_colon' => __( 'Roditeljska uprava', 'pol' ),
        'new_item_name' => __( 'Nova uprava', 'pol' ),
        'add_new_item' => __( 'Dodaj novu upravu', 'pol' ),
        'edit_item' => __( 'Uredi upravu', 'pol' ),
        'update_item' => __( 'Ažuiriraj upravu', 'pol' ),
        'view_item' => __( 'Pogledaj upravu', 'pol' ),
        'separate_items_with_commas' => __( 'Odvojite uprave sa zarezima', 'pol' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni upravu', 'pol' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'pol' ),
        'popular_items' => __( 'Popularne uprave', 'pol' ),
        'search_items' => __( 'Pretraga', 'pol' ),
        'not_found' => __( 'Nema rezultata', 'pol' ),
        'no_terms' => __( 'Nema uprava', 'pol' ),
        'items_list' => __( 'Lista uprava', 'pol' ),
        'items_list_navigation' => __( 'Navigacija', 'pol' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'uprava', array( 'postaja' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_uprava_postaje', 0 );






function daj_postaje( $slugs ) {
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'postaja',
        'post_status'    => 'publish',
        'tax_query'      => array(
            'relation' => 'OR', // Traži postaje koje pripadaju bilo kojoj od navedenih policijskih uprava
        ),
    );

    foreach ( $slugs as $slug ) {
        $args['tax_query'][] = array(
            'taxonomy' => 'uprava',
            'field'    => 'slug',
            'terms'    => $slug,
        );
    }

    $postaje = get_posts( $args );
    $sHtml    = "<div>";

    foreach ( $postaje as $postaja ) {
        $sPostajaUrl       = $postaja->guid;
        $sPostajaContent   = apply_filters( 'the_content', $postaja->post_content );
        $sPostajaNaziv     = $postaja->post_title;
        $sources           = get_iframe_src( $sPostajaContent );

        echo '<div class="card" style="width: 25rem;">
            <iframe src="' . implode( $sources ) . '" class="card-img-top" width="375" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="card-body">
                <h5 class="card-title" style="font-family: Roboto Mono, monospace; color: #0E4399;">' . $sPostajaNaziv . '</h5>
                <a href="' . $sPostajaUrl . '" class="btn btn-dark" style="font-family: Roboto Mono, monospace;">Detalji</a>
            </div>
        </div>';
    }

    $sHtml .= "</div>";
    return $sHtml;
}

function get_iframe_src( $input ) {
    preg_match_all("/<iframe[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $input, $output );
    $return = array();
    if( isset( $output[1][0] ) ) {
        $return = $output[1];
    }
    return $return;
}



function prikazi_taksonomije( $taksonomija )
{
    $terms = get_terms( array(
        'taxonomy' => $taksonomija,
        'hide_empty' => false,
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        echo '<ul>';
        foreach ( $terms as $term ) {
            echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Nema dostupnih taksonomija.';
    }
}






function daj_policijske_uprave( $slug )
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'uprava', // Pretpostavljeno da je ovo ime vašeg post tipa za policijske uprave
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'uprava',
                'field' => 'slug',
                'terms' => $slug
            )
        )
    );

    function get_iframe_src( $input ) {
        preg_match_all("/<iframe[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $input, $output );
        $return = array();
        if( isset( $output[1][0] ) ) {
            $return = $output[1];
        }
        return $return;
    }

    $policijske_uprave = get_posts( $args );
    $sHtml = "<div>";
    foreach ($policijske_uprave as $policijska_uprava)
    {
        $sPolicijskaUpravaUrl = $policijska_uprava->guid;
        $sPolicijskaUpravaContent = apply_filters('the_content', $policijska_uprava->post_content);
        $sPolicijskaUpravaNaziv = $policijska_uprava->post_title;
        $sources = get_iframe_src( $sPolicijskaUpravaContent );

        echo '<div class="card" style="width: 25rem;">
            <iframe src="'.implode($sources).'" class="card-img-top" width="375" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="card-body">
                <h5 class="card-title" style="font-family: Roboto Mono, monospace; color: #0E4399;">'.$sPolicijskaUpravaNaziv.'</h5>
                <a href="'.$sPolicijskaUpravaUrl.'" class="btn btn-dark" style="font-family: Roboto Mono, monospace;">Detalji</a>
            </div>
        </div>';
    }
    $sHtml .= "</div>";
    return $sHtml;
}

function add_meta_box_godina_proizvodnje()
{
add_meta_box( 'pol_vozilo_godina_proizvodnje', 'Godina proizvodnje', 'html_meta_box_vozilo', 'vozilo');
}

function html_meta_box_vozilo($post)
{
wp_nonce_field('spremi_godina_proizvodnje', 'godina_proizvodnje_nonce');
//dohvaćanje meta vrijednosti
$gp_vozilo = get_post_meta($post->ID, 'godina_proizvodnje', true);
echo '
<div>
<div>
<label for="godina_proizvodnje">Godina proizvodnje: </label>
<input type="text" id="godina_proizvodnje"
name="godina_proizvodnje" value="'.$gp_vozilo.'" />
</div>
</div>';
}

function spremi_godina_proizvodnje($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce_ects = ( isset( $_POST[ 'godina_proizvodnje_nonce' ] ) && wp_verify_nonce(
    $_POST[ 'godina_proizvodnje_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce_ects)
    {
        return;
    }

    if(!empty($_POST['godina_proizvodnje']))
    {
        update_post_meta($post_id, 'godina_proizvodnje',
        $_POST['godina_proizvodnje']);
    }
    else
    {
        delete_post_meta($post_id, 'godina_proizvodnje');
    }

}
add_action( 'add_meta_boxes', 'add_meta_box_godina_proizvodnje' );
add_action( 'save_post', 'spremi_godina_proizvodnje' );

//--------------------------------meta box registracija-------------------------------------//
function add_meta_box_registracija()
{
add_meta_box( 'pol_vozilo_registracija', 'Registracija', 'html_meta_box_vozilo1', 'vozilo');
}

function html_meta_box_vozilo1($post)
{
wp_nonce_field('spremi_registraciju', 'registracija_nonce');
//dohvaćanje meta vrijednosti
$reg_vozilo = get_post_meta($post->ID, 'registracija', true);
echo '
<div>
<div>
<label for="registracija">Registriracija vrijedi do:  </label>
<input type="text" id="registracija"
name="registracija" value="'.$reg_vozilo.'" />
</div>
</div>';
}

function spremi_registraciju($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce_ects = ( isset( $_POST[ 'registracija_nonce' ] ) && wp_verify_nonce(
    $_POST[ 'registracija_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce_ects)
    {
        return;
    }

    if(!empty($_POST['registracija']))
    {
        update_post_meta($post_id, 'registracija',
        $_POST['registracija']);
    }
    else
    {
        delete_post_meta($post_id, 'registracija');
    }

}
add_action( 'add_meta_boxes', 'add_meta_box_registracija' );
add_action( 'save_post', 'spremi_registraciju' );
//-------------------------------kraj meta box registracija--------------------------------//

function add_meta_box_policajci()
{
    add_meta_box('vuv_policajci','Policajac','html_meta_box_policajci', 'postaja');
}

function html_meta_box_policajci($post)
{
    wp_nonce_field('spremi_policajca', 'policajac_nonce');
    $policajac_ids = get_post_meta($post->ID, 'policajci', true);
    $policajac_ids = explode(',', $policajac_ids);
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'policajac',
        'post_status' => 'publish'
    );
    $policajci = get_posts($args);
    echo '<div>';
    foreach($policajci as $policajac)
    {
        $checked = (in_array($policajac->ID, $policajac_ids)) ? 'checked' : '';
        echo '<input type="checkbox" name="policajci[]" value="'.$policajac->ID.'" '.$checked.'>'.$policajac->post_title.'<br>';
    }
    echo '</div>';
}


function spremi_policajca($post_id)
    {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );

        $is_valid_nonce_titula_prefiks = ( isset( $_POST[ 'policajac_nonce' ] ) && wp_verify_nonce(
        $_POST[ 'policajac_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        $is_valid_nonce_titula_sufiks = ( isset( $_POST[ 'policajac_nonce' ] ) && wp_verify_nonce(
        $_POST[ 'policajac_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce_titula_prefiks || !$is_valid_nonce_titula_sufiks) {
        return;
        }
        if(!empty($_POST['policajci']))
        {
            $policajci = implode(",", $_POST[ 'policajci' ]);
            update_post_meta($post_id, 'policajci',$policajci);
        }
        else
        {
            delete_post_meta($post_id, 'policajci');
        }
    }
add_action( 'add_meta_boxes', 'add_meta_box_policajci' );
add_action( 'save_post', 'spremi_policajca' );


function add_meta_box_vozila()
{
    add_meta_box('vuv_vozila', 'Vozilo', 'html_meta_box_vozila', 'postaja');
}

function html_meta_box_vozila($post)
{
    wp_nonce_field('spremi_vozilo', 'vozilo_nonce');
    $vozilo_ids = get_post_meta($post->ID, 'vozila', true);
    $vozilo_ids = explode(',', $vozilo_ids);
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'vozilo',
        'post_status' => 'publish'
    );
    $vozila = get_posts($args);
    echo '<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".s2").select2({
            width: "resolve",
            theme: "classic",
            placeholder: "Odaberi vozilo"
        });
    });
    </script>';
    
    foreach ($vozila as $vozilo) {
        $checked = (in_array($vozilo->ID, $vozilo_ids)) ? 'checked' : '';
        echo '<div><label><input type="checkbox" name="vozila[]" value="' . $vozilo->ID . '" ' . $checked . '> ' . $vozilo->post_title . '</label></div>';
    }
}

function spremi_vozilo($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce = (isset($_POST['vozilo_nonce']) && wp_verify_nonce(
        $_POST['vozilo_nonce'],
        basename(__FILE__)
    )) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    if (!empty($_POST['vozila'])) {
        $vozila = implode(",", $_POST['vozila']);
        update_post_meta($post_id, 'vozila', $vozila);
    } else {
        delete_post_meta($post_id, 'vozila');
    }
}

add_action('add_meta_boxes', 'add_meta_box_vozila');
add_action('save_post', 'spremi_vozilo');

function daj_vozila($slug)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'vozilo',
        'post_status' => 'publish',
        'tax_query' => array(
            
            array(
                'taxonomy' => 'vrsta_vozila',
                'field' => 'slug',
                'terms' => $slug
            )

        )
    );

    /*function get_iframe_src( $input ) {
        preg_match_all("/<iframe[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $input, $output );
        $return = array();
        if( isset( $output[1][0] ) ) {
        $return = $output[1];
        }
        return $return;
        }*/


    $vozila = get_posts( $args );
    $sHtml = "<div>";
    foreach ($vozila as $vozilo)
    {
        
        $sVoziloUrl = $vozilo->guid;
        //$sPostajaContent = apply_filters('the_content', $postaja->post_content);
        $sVoziloNaziv = $vozilo->post_title;
        $sIstaknutaSlika = get_the_post_thumbnail_url($vozilo->ID);
        //$kita = preg_match("/<iframe[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $sPostajaContent);
        //$sources = get_iframe_src( $sPostajaContent );

        echo '<div class="card" style="width: 25rem;">
        <img src="'.$sIstaknutaSlika.'" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="font-family: Roboto Mono, monospace; color: #0E4399;">
          <a href="'.$sVoziloUrl.'">'.$sVoziloNaziv.'</a></h5>
          
        </div>
      </div>';
      


        /*echo '<div class="card">
        <div class="card-header"><a href="'.$sPostajaUrl.'">'.$sPostajaNaziv.'</a></div>
        <div class="card-body">
            '.$sPostajaContent.'
        </div>
      </div>';*/

        /*echo '<div class="cardViewPostaja"><a href="'.$sPostajaUrl.'">'.$sPostajaNaziv.'</a></div>';
        echo '<div>'.$sPostajaContent.'</div>';*/
    }
    $sHtml .= "</div>";
    return $sHtml;
}

function daj_vozila2()
{
    
    $date1 = date('Y-m-d');
    
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'vozilo',
        'post_status' => 'publish',
        /*'tax_query' => array(
            
            array(
                'taxonomy' => 'vrsta_vozila',
                'field' => 'slug',
                'terms' => $slug
            )

        )*/
    );
    $vozila = get_posts( $args );
		$sHtml = '<table class="table table-light table-striped rounded rounded-3 overflow-hidden" id="my-first-table"><thead><tr><th>Slika</th><th>Naziv</th><th>Godište</th><th>Vrsta</th><th>Datum</th></thead>';
		foreach ($vozila as $vozilo)
		{
            $sVoziloUrl = $vozilo->guid;
            $sVoziloNaziv = $vozilo->post_title;
            $sIstaknutaSlika = get_the_post_thumbnail_url($vozilo->ID);
            $sGodiste = get_post_meta($vozilo->ID,"godina_proizvodnje",true);
            $sRegistracija = get_post_meta($vozilo->ID,"registracija",true);
            $converted_date = date("Y-m-d", strtotime($sRegistracija) );
            $oVrsteVozila = wp_get_post_terms( $vozilo->ID, 'vrsta_vozila' );
            $sVrstaVozila = "-";
            if(sizeof($oVrsteVozila)>0)
            {
                $sVrstaVozila = $oVrsteVozila[0]->name;
            }
            

            
                
            $sHtml .= '<tr><td><img class="img-fluid" src="'.$sIstaknutaSlika.'" alt="image" style="width: 75px; height: 50px;"></td>';
            $sHtml .= '<td><a href="'.$sVoziloUrl.'">'.$sVoziloNaziv.'</a></td>';
            $sHtml .= '<td>'.$sGodiste.'</td>';
            $sHtml .= '<td>'.$sVrstaVozila.'</td>';
            if ($date1 > $converted_date){
                //echo "$date1 is latest than $date2";
                $sHtml .= '<td class="table-danger" data-toggle="tooltip" data-placement="right" title="Registracija je istekla!">'.$sRegistracija.'</td>';
            }                
            else {
                $sHtml .= '<td>'.$sRegistracija.'</td>';
            }
            
            
		}
		$sHtml .= "</tbody></table>";
		return $sHtml;
}


add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

echo '<script type="text/javascript">
var ajaxurl = "' . admin_url('admin-ajax.php') . '";
</script>';
}


function police_ajax_submit() {

  
    $postid = trim($_POST['post_id']);
    $PolZvanje = trim($_POST['policijsko_zvanje']);
    $postid = (int) $postid;
    $PolZvanje1 = array();
    $PolZvanje1[] = (int)$PolZvanje;
      
    wp_set_object_terms($postid, $PolZvanje, 'policijsko_zvanje', false);

    
    
   
    
    }
    
    add_action('wp_ajax_SubmitReservation', 'police_ajax_submit');
    add_action('wp_ajax_nopriv_SubmitReservation', 'police_ajax_submit');

?>