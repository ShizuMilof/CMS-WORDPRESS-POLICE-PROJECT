<?php
get_header();
?>
<header class="masthead" style="background-image: url('<?php echo get_template_directory_uri() . '/img/signature_photo.jpg' ?>')">
    <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-family: 'Roboto Mono', monospace;">Policajci</h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    
   <div class="container" id="polView">
    <?php
        
        echo daj_policajce();
        /*echo '<h2>Interventna policija</h2>';
        echo daj_policajce( 'interventna-policija' );
        echo '<h2>Specijalna policija</h2>';
        echo daj_policajce( 'specijalna-policija' );*/
        
    ?>
    </div>
</main>
<?php
get_footer();
?>