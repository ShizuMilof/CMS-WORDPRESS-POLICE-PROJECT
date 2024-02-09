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
<main>
    
   <div class="flex-container">
    <?php

      // Primjer poziva funkcije s dva sluga
echo daj_postaje( array( 'policijska-uprava-bjelovarsko-bilogorska', 'policijska-uprava-pozesko-slavonska' ) );

  
      
        //echo '<div>'.daj_postaje( 'policijska-uprava-bjelovarsko-bilogorska' ).'</div>';
        // Primjer poziva funkcije za prikaz taksonomije 'uprava'
    ?>
    </div>
</main>
<?php
get_footer();
?>