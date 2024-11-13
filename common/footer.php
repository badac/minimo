        </article>
      </div><!-- end wrap -->

        <footer role="contentinfo">

          <div class="container-fluid">
            <div class="row">
              <div class="col col-sm">
                <div id="footer-text">
                    <?php echo get_theme_option('Footer Text'); ?>
                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col col-sm">
                <ul class="nav footer-links my-5 justify-content-center">
                  <li class="nav-item m-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://facartes.uniandes.edu.co" target="_blank">Facultad de Artes y Humanidades</a> </li>
                  
                  <li><a href="https://historiadelarte.uniandes.edu.co/">Departamento de Historia del Arte</a></li>
                  
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col col-sm my-5 text-center">
                Universidad de los Andes | Vigilada MinEducación
                <br>
                  Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964.
                <br>
                  Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 MinJusticia
                <br>
              </div>
            </div>
          </div>

        </footer>


    <script>

    jQuery(document).ready(function() {

        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu('#top-nav');
    });
    </script>
</body>
</html>
