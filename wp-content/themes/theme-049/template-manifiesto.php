<?php 

/**
 * Template name: Manifiesto
 */

get_header(); 

if( have_posts() ) {
    the_post();
}
?>

<section class="articulados articulados_page manifiesto">
  <div class="container">
  
    <div class="top_title_text">
        <span>Manifiesto</span> 
    </div>

    <div class="row row-flex">
        <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 col-flex-top">
                
            <p><strong>Stop Making Sense (SMS)</strong></p>

                <p>Google ha cambiado su logo más de cinco veces en veinte años y <strong>“el hombre” nuevo cavernario no se ha renovado</strong> hace al menos dos siglos: aumenta su productividad, sus máquinas, su estrés, su peso; baja su felicidad, baja su autoestima, busca tiempo donde no lo hay. Duerme, lee, juega mientras va en el metro, se apaga en casa, a veces come. </p>
                
                <p>Nosotros, en cambio, <strong>vemos a este hombre nuevo remezclado y revolcado para ser híbrido y multiforme, un desgenerado</strong> que ilumina su propio mundo engullendo cantidades industriales de series transmitidas por la red, desaparecidas las antenas, mientras se desplaza al trabajo como hace siglo y medio otros obreros con otras máquinas escucharon o leyeron folletines de Dostoievsky, Dickens o Balzac.</p>
                
        </div>
        <div class="col-lg-4 col-sm-12 col-flex-bottom">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/manifiesto1.jpg" alt="" class="img-fluid first-image">
        </div>
    </div>

    <div class="row row-flex">
            <div class="col-lg-4 col-sm-12 col-flex-bottom">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/manifiesto2.jpg" alt="" class="img-fluid image-right">
             </div>
        <div class="col-lg-6 col-md-8 col-sm-12 col-flex-top">
                <p>Somos <strong>Marie Curie</strong> entrenando cuerpo a tierra a sesenta mujeres para operar camiones de rayos X en el campo de batalla. La lente de <strong>Diane Arbus</strong> buscando incansablemente aquello que está fuera de campo. <strong>Violeta Parra</strong> exponiendo arpilleras en el Louvre cuando su folclor apenas era conocido lejos de su terruño natal.</p>

                <p>De igual modo, otras voces también gritan que se mueren  porque no muere lo moderno, lo post y lo post de lo post. Los marcos ya no sostienen sus propias colecciones y en las calles se apuntalan murallas con grandes obras… de otros ámbitos. Mendigos y equilibristas se sustentan y cantan en Youtube, afuera de museos y catedrales: glosadores de nuevas apariencias y formas, quienes a veces recrean y recitan, aunque mejor, aquello que solo se venera en los templos de los ‘sabios’.</p>
           
        </div>

    </div>    

    <div class="row row-flex">
            <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 col-flex-top">
                    <p>Perseguimos la dedicación sobre el punto, la línea, la ausencia y presencia de lo uno y lo diverso, de las palabras y las cosas, del discurso y sus consecuencias; sobre todo, sobre todo, de sus causas y consecuencias.</p>

                    <p>Es quizá por eso que acechamos el lado oscuro de <strong>Steve Jobs</strong>, creador de pantallas felices. Rastreamos en <strong>Reddit</strong> conspiraciones entre la ópera de Percival y los diálogos de Matrix; los descarnados cuentos “de hadas” de los hermanos Grimm y las películas de <strong>Miyasaki</strong>; los perritos de Koons y los tiburones de Hirst; las parodias de <strong>Banksy</strong> y las ficciones de Kusama…</p>                        
            </div>
            <div class="col-lg-4 col-sm-12 col-flex-bottom">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/manifiesto3.jpg" alt="" class="img-fluid">
            </div>
    </div>  

    <div class="row row-flex">
                <div class="col-lg-4 col-sm-12 col-flex-bottom">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/manifiesto4.jpg" alt="" class="img-fluid image-right">
                    </div>
            <div class="col-lg-6 col-md-8 col-sm-12 col-flex-top">
                    <p>Leemos Dublineses medio fumados mientras escuchamos en NatGeo un documental sobre el pensamiento de la televisión de <strong>William Foster Wallace</strong> (en el History pasaban la historia del Hip-hop al <strong>Trap</strong>), como Clarice Lispector lee a Hermann Hesse en un colegio de Río de Janeiro. Vemos <strong>Los Simpson</strong> en nuestra sala, Bojack Horseman y alguno que otro reality de canto y baile.</p>

                    <p>Nos sumergimos en las profundidades de <strong>lo trans humano y género</strong>, asumiendo que las barreras de la tecnología son para los insectos hiperespecializados y lo humano, si es que existe, mucho más humano, mucho más híbrido. Porque nada puro puede nacer de aquello que nuca lo fue. <strong>Vivimos en una cultura sin culto</strong>.</p>
                    
                                                
                </div>

    </div>  

    <div class="row row-flex">
                    <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 col-flex-top">
                            <p>Así, <strong>nos proponemos crear espacios virtuales de meditación breve</strong>, como un crecimiento espiritual a lo bonsái, una especie de <strong>salvación por el arte en cápsulas</strong>, evitando la grandilocuencia de dioses muertos y de lo sublime, aunque se hable de nombres rimbombantes como mercado al alza… <strong>Stop Making Sense (SMS)</strong></p>                              
                    </div>
                    <div class="col-lg-4 col-sm-12 col-flex-bottom">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/manifiesto5.jpg" alt="" class="img-fluid">
                    </div>
    </div>  

  </div>
</section> 

<?php get_footer(); ?>