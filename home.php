
<?php
    get_header();
    $sImageUrl = get_template_directory_uri().'/img/policija-pocetna.png';
?>
<header class="masthead" style="background-image: url('<?php echo get_template_directory_uri() . '/img/signature_photo.jpg' ?>')">
    <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-family: 'Roboto Mono', monospace;"><?php echo the_title(); ?></h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content--> 
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
                if ( have_posts() )
                {
                    while ( have_posts() )
                    {
                        the_post();
                        echo '
                                <div class="post-preview">
                                    <a href="' . get_permalink($post->ID) . '">
                                        <h2 class="post-title">'. $post->post_title .'</h2>
                                        <h3 class="post-subtitle">'. $post->post_content .'</h3>
                                    </a>
                                    <p class="post-meta">
                                          Posted by '. get_the_author_link() .'
                                          on '. get_the_date( 'l, F jS, Y' ) .'
                                        </p>
                                </div>
                                <hr />  
                        ';
                    }
                }
            ?>
			<div style="text-align:center;">
				<?php 	$sep = ' . ';
						$prelabel = 'prethodna stranica';
						$nextlabel = 'sljedeća stranica';
				?>
				<?php posts_nav_link( $sep, $prelabel, $nextlabel ); ?>
			</div>
        </div>
    </div>
</div>

<?php
	get_footer();
?>