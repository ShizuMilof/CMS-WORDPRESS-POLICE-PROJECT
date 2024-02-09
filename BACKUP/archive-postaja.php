<?php
get_header();
?>
<header class="masthead" style="background-image: url('<?php echo get_template_directory_uri() . '/img/signature_photo.jpg' ?>')">
    <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-family: 'Roboto Mono', monospace;">Policijske postaje</h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    
   <div class="flex-container">
    <?php
        echo daj_postaje( 'policijska-uprava-bjelovarsko-bilogorska' );
        //echo '<div>'.daj_postaje( 'policijska-uprava-bjelovarsko-bilogorska' ).'</div>';
        
    ?>
    </div>
</main>
<?php
get_footer();
?>