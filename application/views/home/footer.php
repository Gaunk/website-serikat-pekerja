<footer id="footer" class="footer dark-background">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">eBusiness</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">eBusiness</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('temp_home/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url('temp_home/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('temp_home/') ?>assets/js/main.js"></script>
<script>
function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')        
        .replace(/[^\w\-]+/g, '')    
        .replace(/\-\-+/g, '-')      
        .replace(/^-+/, '')          
        .replace(/-+$/, '');         
}

document.addEventListener("DOMContentLoaded", function () {
    const titleInput = document.querySelector('#judul');
    const slugSpan = document.querySelector('#seo-slug');
    const metaTitleInput = document.querySelector('#meta_title');
    const metaDescInput = document.querySelector('#meta_description');
    const seoTitle = document.querySelector('#seo-title');
    const seoDesc = document.querySelector('#seo-description');

    function updatePreview() {
        const titleVal = titleInput.value.trim();
        const slug = slugify(titleVal);
        const metaTitle = metaTitleInput.value.trim() || titleVal;
        const metaDesc = metaDescInput.value.trim();

        slugSpan.textContent = slug;
        seoTitle.textContent = metaTitle.substring(0, 60);
        seoDesc.textContent = metaDesc.substring(0, 160);
    }

    titleInput.addEventListener('input', updatePreview);
    metaTitleInput.addEventListener('input', updatePreview);
    metaDescInput.addEventListener('input', updatePreview);

    updatePreview(); // Initial preview
});
</script>

</body>

</html>