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


    <?php
    $sPostContent = "";
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
                $sIstaknutaSlika = get_template_directory_uri(). '/img/signature_photo.jpg';
            }  
            $sPostContent = nl2br($post->post_content);        
        }
    }
?>
 <div class="container" id="fp_content">
    <!-- <h3 class="text-danger">front-page.php</h3> -->
    <div class="row justify-content-center custom-margin-left-300">
        <div class="col-md-6">
            <?php dynamic_sidebar( 'glavni-sidebar' ); ?>
        </div>
    </div>
</div>
<?php
    get_footer();
?>

<style>
    .custom-margin-left-300 {
        margin-left: -420px;
        margin-bottom: 100px;
      width:1900px;
    }

    .is-layout-flow{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .wp-block-heading{
        margin-left:170px;
    }
</style>