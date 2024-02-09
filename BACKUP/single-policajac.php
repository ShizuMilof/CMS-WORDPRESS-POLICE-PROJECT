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
                    $oPolicijskaZvanja = wp_get_post_terms( $post->ID, 'policijsko_zvanje' );
                    $sPolicijskoZvanje = "-";
                    if(sizeof($oPolicijskaZvanja)>0)
                    {
                        $sPolicijskoZvanje = $oPolicijskaZvanja[0]->name;
                    }
                    //$gp = get_post_meta($post->ID, 'godina_proizvodnje', true);
                    //$reg = get_post_meta($post->ID, 'registracija', true);
                    echo "<h5 style='font-family: Roboto Mono, monospace;'>Čin: {$sPolicijskoZvanje}</h5>";
                    //echo "<h5 style='font-family: Roboto Mono, monospace;'>Registracija vrijedi do: {$reg}</h5>";
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
                        $sIstaknutaSlika = get_template_directory_uri(). '/img/Placeholder.png';
                    }
                    
                    
                    echo '<div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card bg-dark text-white">
                                            <img class="card-img" src="'.$sIstaknutaSlika.'" alt="Card image">
                                            <div class="card-img-overlay">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h7 class="card-title">Životopis</h7>
                                                <p class="card-text">'.nl2br($post->post_content).'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h7 class="card-title">Opcije</h7>
                                                <p class="card-text">Promjeni čin policajca</p>
                                                <form class="policeEdit" action="" id="primaryPostForm" method="POST">
                                                    <div class="form-group form-field">
                                                        <label for="policijsko-zvanje">Čin: *</label>
                                                        <select name="policijsko-zvanje" class="policijsko_zvanje" tabindex="9" class="required">
                                                        <option value="Kita"></option>';
                                                        
                                                        $cinovi = get_terms('policijsko_zvanje', array('hide_empty' => 0));
                                                        foreach ($cinovi as $cin) {
                                                        echo "<option id='policijsko_zvanje' value='$cin->name'>$cin->name</option>";
                                                        }
                                                        
                                                echo   '</select>
                                                    </div>    
                                                        <input type="hidden" name="post_id" class="post_id" value="'.get_the_ID().'" id="postID" >
                                                        <button type="submit" class="btn btn-primary">Spremi</button>
                                                                                                   
                                                </form>'; 
                                           
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