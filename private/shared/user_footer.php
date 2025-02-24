</main>

<footer role="contentinfo">
  <p>Grub Builder</p>

  <nav role="navigation">
    <ul>
      <li><a href="<?php echo url_for('/active_record/recipes/index.php') ?>">All Recipes</a></li>
      <li><a href="<?php echo url_for('/.php') ?>">Popular</a></li>
      <li><a href="<?php echo url_for('/.php') ?>">Courses</a></li>
      <li><a href="<?php echo url_for('/.php') ?>">Diet</a></li>
      <li><a href="<?php echo url_for('/.php') ?>">Cuisine</a></li>
      <li><a href="<?php echo url_for('/about.php') ?>">About us</a></li>
    </ul>
  </nav>

  <ul>
    <p>SOCIAL MEDIA ICONS GO HERE</p>
  </ul>
  <?php include(SHARED_PATH . '/copyright_disclaimer.php'); ?>
</footer>

</body>

</html>

<?php
db_disconnect($database);
?>
