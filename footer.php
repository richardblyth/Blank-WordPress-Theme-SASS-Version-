<?php
//Main footer
?>

    <footer>
      <nav>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      </nav>
    </footer>

    <div class="no-jsmsg">
    <p>You currently have JavaScript disabled. This site requires JavaScript to be enabled and some functiomns of the site may not be usable or may not look correct until JavaScript is enabled. You can enable JavaScript by following <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="How to enable JavaScript" rel="nofollow">this tutorial</a>.</p>
    </div>

    <!--[if lt IE 8]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

    <script>
      //Use as required
      //var templateUrl = '<?php get_template_directory_uri(); ?>';
    </script>
    <?php wp_footer(); ?>
  </body>
</html>   
