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
            <div>
                <h2>Policijska uprava na području za koje je osnovana:</h2>
                <p >
                    1. Prati i analizira stanje sigurnosti i pojave koje pogoduju nastanku i razvitku kriminaliteta <br>
                    2. Organizira, usklađuje, usmjerava i nadzire rad policijskih postaja <br>
                    3. Izravno sudjeluje u obavljanju složenijih poslova iz djelokruga rada policijske postaje <br>
                    4. Obavlja i provodi utvrđene mjere u graničnoj kontroli i osiguranju državne granice <br>
                    5. Poduzima mjere radi zaštite određenih osoba i objekata <br>
                    6. Obavlja druge poslove utvrđene posebnim propisima. <br>
                    Policijskom upravom upravlja načelnik policijske uprave.
                </p>
                <h2>Ovdje se nalaze policijske uprave</h2>
            </div>
            
            <?php
                prikazi_taksonomije( 'uprava' );
            ?>
            
        </div>
        <div class="col-md-2"></div>    
    </div>
</div>
<style>
    #switcheroo {
        /* Dodajte stilove po potrebi */
    }

    p {
        font-family:;
        line-height: 1.5; /* Prilagodite visinu linije prema potrebi */
        color: #050505; /* Promijenite boju teksta prema potrebi */
    }

    h2 {
        font-family: 
        color: #050505;
    }
</style>

    
</main>
<?php
get_footer();
?>