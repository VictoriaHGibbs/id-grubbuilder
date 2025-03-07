</main>

<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 px-3 px-md-5 mt-4 border-top">

    <div class="col-12 col-md-4 d-flex justify-content-start align-items-center mb-2 mb-md-0">
      <span class="text-body-secondary small"><?php include(SHARED_PATH . '/copyright_disclaimer.php'); ?></span>
    </div>

    <ul class="nav col-12 col-md-4 justify-content-center mb-2 mb-md-0">
      <li class="nav-item"><a href="<?php echo url_for('/index.php') ?>" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/recipes.php') ?>" class="nav-link px-2 text-body-secondary">All Recipes</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/popular.php') ?>" class="nav-link px-2 text-body-secondary">Popular</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/about.php') ?>" class="nav-link px-2 text-body-secondary">About us</a></li>
    </ul>

    <ul class="nav col-12 col-md-4 justify-content-center justify-content-md-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="https://github.com/VictoriaHGibbs" target="_blank"><i class="fa-brands fa-github fa-lg"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="https://www.linkedin.com/in/victoriahgibbs/" target="_blank"><i class="fa-brands fa-linkedin fa-lg"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="https://discordapp.com/users/251824756049838080" target="_blank"><i class="fa-brands fa-discord fa-lg"></i></a></li>
    </ul>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php
db_disconnect($database);
?>
