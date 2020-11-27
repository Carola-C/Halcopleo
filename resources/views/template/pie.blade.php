<!-- footer Start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-manu">
              <ul>
                <li><i class="fa fa-facebook-square fa-2x"> </i><a href="https://es-la.facebook.com/"> Facebook</a></li>
                <li><i class="fa fa-twitter fa-2x"> </i><a href="https://twitter.com/login?lang=es"> Twitter</a></li>
                @auth
                <li><i class="fa fa-support fa-2x"></i><a href="soporte">Soporte</a></li>
                <li><i class="fa fa-thumb-tack fa-2x"></i><a href="terminos">Términos y condiciones</a></li>
                @else
                <li><i class="fa fa-support fa-2x"></i><a href="soporte1">Soporte</a></li>
                <li><i class="fa fa-thumb-tack fa-2x"></i><a href="terminos1">Términos y condiciones</a></li>
                @endauth
              </ul>
            </div>
             <!--
            <p>Copyright &copy; Crafted by <a href="https://dcrazed.com/">Dcrazed</a>.</p>
            -->
          </div>
        </div>
      </div>
    </footer>
            
            
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
            
    
    </body>
</html>