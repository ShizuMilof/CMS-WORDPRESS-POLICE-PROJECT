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
                </div>
            </div>
        </div>
    </div>
</header>
<main>
	<!-- <h3 class="text-danger">single.php</h3> -->

            <?php
                if ( have_posts() )
                {
                    while ( have_posts() )
                    {
                        the_post();

                        $args = array(
                            'post_type' => 'policajac',
                            'posts_per_page' => -1
                        );

                        $args2 = array(
                            'post_type' => 'vozilo',
                            'posts_per_page' => -1
                        );

                        add_filter('the_content', 'wpse_get_content_without_images');

                        function wpse_get_content_without_images() {
                            $content = get_the_content();
                            $content = preg_replace( '/<iframe[^>]+./', '', $content );
                            return $content;
                        }    

						$sIstaknutaSlika = "";
						if( get_the_post_thumbnail_url($post->ID) )
						{
							$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
						}
						else
						{
							$sIstaknutaSlika = "";
						}
                        
                        $policajci_query = new WP_Query($args);
                        $oPolicajci = get_post_meta( $post->ID, 'policajci' );  
                        
                        $vozila_query = new WP_Query($args2);
                        $oVozila = get_post_meta( $post->ID, 'vozila' ); 

                        echo '<div class="row">
                                <div class="col-md-1"></div>';
						echo    '<div class="col-md-3" style="font-family: Roboto Mono, monospace;">
                                    <div class="card bg-light">
                                        <div class="card-header text-white bg-dark">';
                                             echo  the_title();
                        echo            '</div>
                                        <div class="card-body">
                                            <img class="img-fluid" src="'.$sIstaknutaSlika.'" alt="img" />
                                            <p>'.wpse_get_content_without_images().'</p>
                                        </div> 
                                    </div>                                 
                                </div>';
                        echo    '<div class="col-md-7" style="font-family: Roboto Mono, monospace;">';                        
                        echo        '<table id="my-first-table" class="table table-sm table-light table-striped rounded rounded-3 overflow-hidden"><thead><tr><th>#</th><th>Ime i prezime</th><th>Policijsko zvanje</th><th>Odjel</th></thead>';
                        $ukupno =0;
                        if($policajci_query-> have_posts()):
                            while($policajci_query->have_posts()):
                            
                                $policajci_query->the_post();
                            
                            foreach ($oPolicajci as $value) {
                            // echo get_the_ID() .'aaaaaaaaa';
                                    $vak = explode("," ,$value);
                                    foreach ($vak as $ac) { 
                                        if($ac == get_the_ID())
                                        {
                                            $ukupno++;
                                            $sKIstaknutaSlika = "";
                                            $sPolicajacUrl = $post->guid;
                                            $sPolicajacNaziv = $post->post_title;

                                            $oPolicijskaZvanja = wp_get_post_terms( $post->ID, 'policijsko_zvanje' );
                                            $sPolicijskoZvanje = "-";
                                            if(sizeof($oPolicijskaZvanja)>0)
                                            {
                                                $sPolicijskoZvanje = $oPolicijskaZvanja[0]->name;
                                            }

                                            $oOdjeli = wp_get_post_terms( $post->ID, 'odjel' );
                                            $sOdjel = "-";
                                            if(sizeof($oOdjeli)>0)
                                            {
                                                $sOdjel = $oOdjeli[0]->name;
                                            }



                                            if( get_the_post_thumbnail_url($post->ID) )
                                            {
                                                $sKIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
                                            }
                                            else
                                            {
                                                $sKIstaknutaSlika = get_template_directory_uri(). '/img/Policeman_smallest.png';
                                            }
                                            
                                            echo '<tr><td><img class="img-fluid"  src="'.$sKIstaknutaSlika.'" alt="image"></td>';
                                            echo '<td><a href="'.$sPolicajacUrl.'">'.$sPolicajacNaziv.'</a></td>';
                                            echo '<td>'.$sPolicijskoZvanje.'</td>';
                                            echo '<td>'.$sOdjel.'</td>';
                                            
                                            
                                                
                                        }
                                    }
                                }
                                
                            endwhile;                            
                        endif;
                        
                        echo        '</tbody></table>';
                        echo        '<div style="text-align: left;">Vozila</div>';
                        echo        '<table class="table table-light table-striped rounded rounded-3 overflow-hidden"><thead><tr><th>#</th><th>Naziv</th><th>Godište</th><th>Vrsta</th></thead>';

                        $ukupno1 =0;
                        if($vozila_query-> have_posts()):
                            while($vozila_query->have_posts()):
                            
                                $vozila_query->the_post();
                            
                            foreach ($oVozila as $value) {
                            // echo get_the_ID() .'aaaaaaaaa';
                                    $voz = explode("," ,$value);
                                    foreach ($voz as $vo) { 
                                        if($vo == get_the_ID())
                                        {
                                            $ukupno1++;
                                            $sIstaknutaSlika1 = "";
                                            $sVoziloUrl = $post->guid;
                                            $sVoziloNaziv = $post->post_title;
                                            $sGodiste = get_post_meta($post->ID,"godina_proizvodnje",true);
                                            $oVoziloVrsta = wp_get_post_terms( $post->ID, 'vrsta_vozila' );
                                            $sVoziloVrsta = "-";
                                            if(sizeof($oVoziloVrsta)>0)
                                            {
                                                $sVoziloVrsta = $oVoziloVrsta[0]->name;
                                            }


                                            if( get_the_post_thumbnail_url($post->ID) )
                                            {
                                                $sIstaknutaSlika1 = get_the_post_thumbnail_url($post->ID);
                                            }
                                            else
                                            {
                                                $sIstaknutaSlika1 = get_template_directory_uri(). '/img/Policeman_smallest.png';
                                            }
                                            
                                            echo '<tr><td><img class="img-fluid"  src="'.$sIstaknutaSlika1.'" alt="image" style="width: 150px; height: 100px;"></td>';
                                            echo '<td><a href="'.$sVoziloUrl.'">'.$sVoziloNaziv.'</a></td>';
                                            echo '<td>'.$sGodiste.'</td>';
                                            echo '<td>'.$sVoziloVrsta.'</td>';
                                            
                                            
                                                
                                        }
                                    }
                                }
                                
                            endwhile;                            
                        endif;

                        echo        '</tbody></table>';
                        echo    '</div>
                               <div class="col-md-1"></div>';                                
						echo '</div>';

                        /*echo '<div class="row">';
                        echo    '<div class="col-md-4"></div>';
                        echo    '<div class="col-md-7" style="font-family: Roboto Mono, monospace;">';
                        echo        '<table class="table table-light table-striped rounded rounded-3 overflow-hidden"><thead><tr><th>#</th><th>Naziv</th><th>Godište</th><th>Vrsta</th></thead>';

                        

                        echo        '</tbody></table>';
                        echo    '</div>
                                <div class="col-md-1"></div>';
                        echo '</div>';*/
                    }
                }
            ?>
</main>
<?php
    get_footer();
?>