</main>

<footer role="contentinfo">
  <section >
    <h2><a href="#">Grub Builder</a></h2>
    <nav role="navigation" id="footer-nav">
      <ul>
        <li><a href="<?php echo url_for('/recipes.php') ?>">All Recipes</a></li>
        <li><a href="<?php echo url_for('/.php') ?>">Popular</a></li>
        <li><a href="<?php echo url_for('/.php') ?>">Courses</a></li>
        <li><a href="<?php echo url_for('/.php') ?>">Diet</a></li>
        <li><a href="<?php echo url_for('/.php') ?>">Cuisine</a></li>
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

</body>

</html>

<?php
db_disconnect($database);
?>
