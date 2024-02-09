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
    
    <div id="switcheroo">        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div><h5 style="font-family: Roboto Mono, monospace;">Sva vozila</h5></div>
                
                <?php
                    echo daj_vozila2();
                  
                ?>
                
            </div>
            <div class="col-md-2"></div>    
        </div>
    </div>
    
</main>
<?php
get_footer();
?>