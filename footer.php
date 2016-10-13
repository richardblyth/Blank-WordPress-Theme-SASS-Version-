<?php
//Main footer
?>

    <footer>
      <nav>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      </nav>
    </footer>

    <noscript class="no-jsmsg">
      <p>You currently have JavaScript disabled. This site requires JavaScript to be enabled and some functiomns of the site may not be usable or may not look correct until JavaScript is enabled.</p>
    </noscript>

    <!--[if lt IE 8]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please >upgrade your browser to improve your experience.</p><![endif]-->

    <!--<script>
      //Use as required
      var templateUrl = '<?php echo get_template_directory_uri('/'); ?>';
    </script>-->
    <?php wp_footer(); ?>
  </body>
</html>   
