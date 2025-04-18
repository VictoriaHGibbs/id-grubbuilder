<?php

class Recipe extends DatabaseObject {

  static public $table_name = 'recipe';
  static public $db_columns = ['id', 'user_id', 'recipe_title', 'prep_time_minutes', 'cook_time_minutes', 'description', 'created_at', 'yield', 'measurement_id', 'servings', 'visibility_id'];

  
  public $id;
  public $user_id;
  public $recipe_title;
  public $prep_time_minutes;
  public $cook_time_minutes;
  public $description;
  public $created_at;
  public $yield;
  public $measurement_id;
  public $servings;
  public $visibility_id;

  public $video_link;


  public function __construct($args = []) {
    $this->user_id = $args['user_id'] ?? '';
    $this->recipe_title = $args['recipe_title'] ?? '';
    $this->prep_time_minutes = $args['prep_time_minutes'] ?? '';
    $this->cook_time_minutes = $args['cook_time_minutes'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
    $this->yield = $args['yield'] ?? '';
    $this->measurement_id = $args['measurement_id'] ?? '';
    $this->servings = $args['servings'] ?? '';
    $this->visibility_id = $args['visibility_id'] ?? 1;
  }

// Retrieve associated ingredients
  static public function get_ingredients($recipe_id) {
    return Ingredient::find_by_recipe_id($recipe_id);
  }

// Display ingredients
  static public function ingredients($recipe_id) {
    $ingredients = Recipe::get_ingredients($recipe_id);
    $html = "<ul>";
    foreach ($ingredients as $ingredient) {
      $measurement_id = $ingredient->get_measurement_id();
      $measurement = $ingredient->get_measurement_name($ingredient);
      if ($ingredient->quantity > 1 && $measurement_id != 16) $measurement .= "s";
      $html .= "<li><span class=\"quantity\">" . abs($ingredient->quantity) . "</span> " . h($measurement) . " " . ucfirst(h($ingredient->ingredient_name)) . "</li>";
    };
    $html .= "</ul>";
    return $html;
  }
  
// Retrieve associated directions
  static public function get_directions($recipe_id) {
    return Direction::find_by_recipe_id($recipe_id);
  }

// Display directions
  static public function directions($recipe_id) {
    $directions = Recipe::get_directions($recipe_id);
    $html = "<ol>";
    foreach ($directions as $direction) {
      $html .= "<li>" . ucfirst(h($direction->direction_text)) . "</li>";
    };
    $html .= "</ol>";
    return $html;
  }

// Retrieve associated RecipeDiet categories
  static public function get_recipeDiet($recipe_id) {
    return RecipeDiet::find_by_recipe_id($recipe_id);
  }

// Retrieve associated RecipeStyle categories
  static public function get_recipeStyle($recipe_id) {
    return RecipeStyle::find_by_recipe_id($recipe_id);
  }

// Retrieve associated RecipeMealType categories
  static public function get_recipeMealType($recipe_id) {
    return RecipeMealType::find_by_recipe_id($recipe_id);
  }

// Display Categories
  static public function recipe_categories($recipe_id) {
    $dietArr = Recipe::get_recipeDiet($recipe_id);
    $styleArr = Recipe::get_recipeStyle($recipe_id);
    $mealtypeArr = Recipe::get_recipeMealType($recipe_id);

    $html = "<ul class=\"list-unstyled ps-0\">";

    if ($dietArr) {
      foreach ($dietArr as $diet) {
        $html .= "<li>" . find_value_from_lookup(($diet->diet_id), 'diet') . "</li>";
      }
    }

    if ($styleArr) {
      foreach ($styleArr as $style) {
        $html .= "<li>" . find_value_from_lookup(($style->style_id), 'style') . "</li>";
      }
    }

    if ($mealtypeArr) {
      foreach ($mealtypeArr as $meal_type) {
        $html .= "<li>" . find_value_from_lookup(($meal_type->meal_type_id), 'meal_type') . "</li>";
      }
    }

    $html .= "</ul>";
    return $html;
  }

// Retrieve associated images
  static public function get_images($recipe_id) {
    $result = Image::find_by_recipe_id($recipe_id);
    if ($result) {
      return $result;
    }
  }

// Display images
  static public function images($recipe_id) {
    $images = Recipe::get_images($recipe_id);
    if ($images) {
      echo '<div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">';
      echo '<div class="carousel-inner">';
      
      $first = true;
      foreach ($images as $image) {
        echo '<div class="carousel-item' . ($first ? ' active' : '') . '">';
        echo '<img src="' . IMAGE_PATH . h($image->image_url) . '" class="d-block w-100" alt="Recipe Image.">';
        echo '</div>';
        $first = false;
      };

      echo '</div>';
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </button>';
        echo '</div>';
    }
  }

// Display first image by sort_order
  static public function first_image_only($recipe_id) {
    $images = Recipe::get_images($recipe_id);
    if ($images){
    $image = $images[0];
    echo '<div id="image-card">';
    echo '<img class="small-card" src="' .IMAGE_PATH . h($image->image_url) . '"  alt="Recipe Image." >';
    echo '</div>';
    }
  }

// Retrieve associated ratings
  static public function get_ratings($recipe_id) {
    return Rating::find_by_recipe_id($recipe_id);
  }

// Average and display ratings
  static public function average_rating($recipe_id) {
    $ratings = Recipe::get_ratings($recipe_id);
    $rows = 0;
    $sum = 0;
    if ($ratings) {
      foreach ($ratings as $rating) {
        $sum += h($rating->rating_level);
        $rows += 1;
      }
      $average = $sum / $rows;
      return $average;
    }
  }

// Display Average rating
  static public function display_average_rating($recipe_id) {
    $average = Recipe::average_rating($recipe_id);
    
    if (isset($average)) {
      if (!is_int($average)) $average = number_format($average, 1);
      echo "<p class=\"rating-icon\">Average Rating: " . h($average) . "/5 <i class=\"fa-solid fa-drumstick-bite\"></i>";
    } else {
      echo  "<p>No ratings yet!";
    }
  }

// Display the number of people who have rated the recipe
  static public function display_total_raters($recipe_id) {
    Recipe::get_ratings($recipe_id);
    $total = parent::$database->affected_rows;
    return " (" . h($total) . " contributors)</p>";
  }

// Checks to see if the current user has already rated the recipe
  static public function check_if_user_submitted_rating($recipe_id, $user_id) {
    $ratings = Recipe::get_ratings($recipe_id);
    if ($ratings) {
      foreach ($ratings as $rating) {
        if ($rating->rater_user_id == $user_id) {
          return $rating;
        }
      }
    }
  }

// Retrieve user id 
  public function get_user_id() {
    return (int) $this->user_id;
  }

// Display user info, takes recipe object
  static public function user_info($recipe) {
      $user_id = $recipe->get_user_id();
      $username = User::get_username_by_id($user_id);
      echo "Created by: " . $username;
  }
  
  protected function set_user_id() {
    $this->user_id = $_SESSION['user_id'];
  }

  protected function create() {
    $this->set_user_id();
    return parent::create();
  }

  // Retrieves the stored youtube video object
  static public function get_video($recipe_id) {
    $result =  Video::find_by_recipe_id($recipe_id);
    if ($result) {
      return $result;
    }
  }

  // Displays the link by putting it in the iframe
  static public function video($recipe_id) {
    $videos = Recipe::get_video($recipe_id);
    if ($videos) {
      foreach ($videos as $video) { ?>

      <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo h($video->youtube_url); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>  

    <?php }
    }
  }

  protected function validate()
  {
    $this->errors = [];

    // Subclass specific validation

    return $this->errors;
  }

}
