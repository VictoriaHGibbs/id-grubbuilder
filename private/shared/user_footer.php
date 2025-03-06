</main>

<footer role="contentinfo">
  <section >
    <h2><a href="#">Grub Builder</a></h2>
    <nav role="navigation" id="footer-nav">
      <ul>
        <li><a href="<?php echo url_for('/recipes.php') ?>">All Recipes</a></li>
        <li><a href="<?php echo url_for('/.php') ?>">Popular</a></li>
        <li><a href="<?php echo url_for('/about.php') ?>">About us</a></li>
      </ul>
    </nav>
    <ul id="social">
      <li> <a href="https://github.com/VictoriaHGibbs" target="_blank" class="fa-brands fa-github"></a></li>
      <li> <a href="https://www.linkedin.com/in/victoriahgibbs/" target="_blank" class="fa-brands fa-linkedin"></a></li>
      <li> <a href="https://discordapp.com/users/251824756049838080" target="_blank" class="fa-brands fa-discord"></a></li>
    </ul>
  </section>

  <?php include(SHARED_PATH . '/copyright_disclaimer.php'); ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php
db_disconnect($database);
?>
