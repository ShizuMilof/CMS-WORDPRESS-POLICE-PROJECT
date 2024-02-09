<?php
    get_header();

    $sImageUrl = get_template_directory_uri().'/img/policija-pocetna.png';
?>
  <!-- GLAVNA SLIKA  -->

<header class="masthead" style="background-image: url('<?php echo $sImageUrl; ?>'); background-size: full-size; height: 200px;">    <div class="overlay"></div>
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
								<div class="col-md-12"><img class="img-fluid rounded mx-auto d-block w-80" src="'.$sIstaknutaSlika.'" alt=""></div>
							</div>
							<div class="row">
								<div class="col-md-12 mt-2" style="font-family: Roboto Mono, monospace;">'.nl2br(the_content()).'</div>
							</div>';
                    }
                }
            ?>
</div>

<?php
	get_footer();
?>