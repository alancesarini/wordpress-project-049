<?php 
$logos = Project049_Logo::get_logos(); 
$now = new DateTime();

?>

<footer>
  <div class="container">
    <p>Con el apoyo de:</p>
    <div class="footer_logo">
      <div class="row">
        <?php foreach( $logos as $logo ) { ?>
            <div class="col-md-2">
                <img src="<?php echo $logo; ?>" alt="logo" title="logo" class="img-fluid" />
            </div>
        <?php } ?>
      </div>
    </div>
    <div class="footer_nav">
      <ul>
        <li><a href="<?php echo home_url( 'terminos-y-condiciones' ); ?>">Terminos y condiciones</a></li>
        <li><a href="<?php echo home_url( 'politica-de-privacidad-y-cookies' ); ?>">Política de privacidad y cookies</a></li>
        <li>© project049 <?php echo $now->format( 'Y' ); ?></li>
      </ul>
    </div>
  </div>
</footer>

<?php get_template_part( 'partials/menu' ); ?>

<?php wp_footer(); ?>

</body>
</html>
