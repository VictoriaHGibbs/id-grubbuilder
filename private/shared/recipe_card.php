<?php foreach($recipes as $recipe) { ?>
        <section class="recipe-card-preview">
          <a href="detail.php?id=<?php echo h($recipe->id); ?>">
          <?php Recipe::first_image_only($recipe->id) ?>
          <h3><?php echo h($recipe->recipe_title); ?></h3>
          <p><?php echo ($recipe->user_info($recipe)) ?></p>
          <p><?php echo h($recipe->description); ?></p>
          <p><?php Recipe::display_average_rating($recipe->id) ?></p>
          </a>
        </section>

<?php } ?>
