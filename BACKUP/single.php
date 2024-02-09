<?php get_header(); ?>
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
	<!-- <h3 class="text-danger">single.php</h3> -->

            <?php
                if ( have_posts() )
                {
                    while ( have_posts() )
                    {
                        the_post();
						$sIstaknutaSlika = "";
						if( get_the_post_thumbnail_url($post->ID) )
						{
							$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
						}
						else
						{
							$sIstaknutaSlika = "";
						}
                        
                        echo '<div class="row">
								<div class="col-md-6"><img class="img-fluid" src="'.$sIstaknutaSlika.'" alt=""></div>
								<div class="col-md-6">'.nl2br($post->post_content).'</div>
							</div>';
                    }
                }
            ?>
</div>

<?php
	get_footer();
?>