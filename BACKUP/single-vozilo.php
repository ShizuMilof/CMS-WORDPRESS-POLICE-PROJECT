<?php
    get_header();
?>
<header class="masthead" style="background-image: url('<?php echo get_template_directory_uri() . '/img/signature_photo.jpg' ?>')">
    <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-family: 'Roboto Mono', monospace;"><?php echo the_title(); ?></h1>
                    <span class="subheading"></span>
                    <?php
                    $gp = get_post_meta($post->ID, 'godina_proizvodnje', true);
                    $reg = get_post_meta($post->ID, 'registracija', true);
                    echo "<h5 style='font-family: Roboto Mono, monospace;'>Godište: {$gp}</h5>";
                    echo "<h5 style='font-family: Roboto Mono, monospace;'>Registracija vrijedi do: {$reg}</h5>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<main>


        <?php
            //<img class="img-fluid img-thumbnail" src="'.$sIstaknutaSlika.'" alt="">
            //nl2br($post->post_content)
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

                    $date1 = date('Y-m-d');
                    $converted_date = date("Y-m-d", strtotime($reg) );
                    
                    
                    echo '<div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-dark text-white">
                                            <img class="card-img" src="'.$sIstaknutaSlika.'" alt="Card image">
                                            <div class="card-img-overlay">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h7 class="card-title">O vozilu</h7>
                                                <p class="card-text">'.nl2br($post->post_content).'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h7 class="card-title">Status</h7>';
                                                if ($date1 > $converted_date){
                                                    //echo "$date1 is latest than $date2";
                                                    echo '<p class="card-text text-danger">Registracija je istekla, vozilo nije registrirano!</p>';
                                                }                
                                                else {
                                                    echo '<p class="card-text">Informacije o vozilu su uredne</p>';
                                                }
                                           
                echo                       '</div>
                                        </div>
                                    </div>
                                </div>                                                                
                            </div>
                            <div class="col-md-1"></div>                                
                        </div>';
                }
            }
        ?>


</main>
<?php
    get_footer();
?>