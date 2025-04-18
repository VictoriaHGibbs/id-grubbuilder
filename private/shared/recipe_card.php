
<div class="container mt-4">

  <div class="row">
    <?php foreach($recipes as $recipe) { ?>
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
          <div class="card h-100 shadow-sm border-1 border-dark rounded-3 d-flex flex-column">
            <a href="<?php echo url_for('active_record/recipes/show.php?id=' . h(u($recipe->id))); ?>" class="text-dark text-decoration-none align-self-stretch h-100">

              <div class="card-img-top bg-light d-flex align-items-center justify-content-center" >
                <?php Recipe::first_image_only($recipe->id) ?>
              </div>

              <div class="card-body d-flex flex-column justify-content-between align-self-stretch"> 
                <h3 class="card-title fw-bold"><?php echo h($recipe->recipe_title); ?></h3>
                <p class="text-muted"><?php echo ($recipe->user_info($recipe)) ?></p>
                <p class="card-text flex-grow-1"><?php echo h($recipe->description); ?></p>
                <?php echo Recipe::recipe_categories($recipe->id) ?>
                <?php Recipe::display_average_rating($recipe->id) ?>
              </div>

            </a>
          </div>
        </div>

    <?php } ?>

  </div>
</div>



  
