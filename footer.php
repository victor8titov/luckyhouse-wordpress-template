<?php
?>

	<!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <!-- <span class="copyright">Copyright &copy; Your Website 2019</span> -->
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="<?php echo lh_get_meta_box('instagram'); ?>">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo lh_get_meta_box('vk'); ?>">
                <i class="fab fa-vk"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo lh_get_meta_box('facebook'); ?>">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <!-- <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul> -->
        </div>
      </div>
    </div>
  </footer>

 

<?php wp_footer(); ?>



<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.3'><\/script>".replace("HOST", location.hostname));
//]]></script>


</body>
</html>
