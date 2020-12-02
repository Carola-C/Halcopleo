<!-- footer Start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-manu">
              <ul>
                <li><a href="https://es-la.facebook.com/"><i class="fa fa-facebook-square"> </i> Facebook</a></li>
                <li><a href="https://twitter.com/login?lang=es"><i class="fa fa-twitter"> </i> Twitter</a></li>
                @auth
                <li><a href="soporte"><i class="fa fa-support"></i> Soporte</a></li>
                <li><a href="terminos"><i class="fa fa-thumb-tack"></i>Términos y condiciones</a></li>
                @else
                <li><a href="soporte1"><i class="fa fa-support"></i> Soporte</a></li>
                <li><a href="terminos1"><i class="fa fa-thumb-tack"></i> Términos y condiciones</a></li>
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