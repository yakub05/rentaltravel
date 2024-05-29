<nav id="navbar" class="navbar">
  <ul>
      <li><a id="beranda" class="nav-link scrollto" href="/">Beranda</a></li>
      <li><a id="tentang-kami" class="nav-link scrollto" href="/tentang-kami">Tentang Kami</a></li>
      <li><a id="travel" class="nav-link scrollto" href="/travel">Travel</a></li>
      <li><a id="artikel" class="nav-link scrollto" href="/artikel">Artikel</a></li>
      <li><a id="portfolio" class="nav-link scrollto" href="/portfolio">Portofolio</a></li>
      <li><a id="testimoni" class="nav-link scrollto" href="/testimoni">Testimoni</a></li>
      <li><a id="register" class="login scrollto" href="/register">Register</a></li>
      <li><a id="login" class="login scrollto" href="/login">Login</a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const path = window.location.pathname;
  const navbarLinks = document.querySelectorAll('#navbar .nav-link, #navbar .login');

  navbarLinks.forEach(link => {
      if (link.getAttribute('href') === path) {
          link.classList.add('active');
      } else {
          link.classList.remove('active');
      }
  });
});
</script>
