</main>

<div class="container justify-content-center">
  <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 px-5 mt-4 border-top"  style="height: 100px;">
    <div class="col-md-4 d-flex justify-content-beginning">
      <a href="<?php echo url_for('/index.php'); ?>" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary"><?php include(SHARED_PATH . '/copyright_disclaimer.php'); ?></span>
    </div>

    <ul class="nav col-md-4 justify-content-center">
      <li class="nav-item"><a href="<?php echo url_for('/index.php') ?>" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/recipes.php') ?>" class="nav-link px-2 text-body-secondary">All Recipes</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/popular.php') ?>" class="nav-link px-2 text-body-secondary">Popular</a></li>
      <li class="nav-item"><a href="<?php echo url_for('/about.php') ?>" class="nav-link px-2 text-body-secondary">About us</a></li>
    </ul>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="https://github.com/VictoriaHGibbs" target="_blank"><i class="fa-brands fa-github"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="https://www.linkedin.com/in/victoriahgibbs/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="https://discordapp.com/users/251824756049838080" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
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
