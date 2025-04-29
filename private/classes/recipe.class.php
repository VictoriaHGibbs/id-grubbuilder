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

  /**
   * Retrieves the ingredients associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to fetch ingredients.
   * @return array An array of Ingredient objects associated with the given recipe ID.
   */
  static public function get_ingredients($recipe_id) {
    return Ingredient::find_by_recipe_id($recipe_id);
  }

  /**
   * Generates an HTML unordered list of ingredients for a given recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve ingredients.
   * @return string An HTML string containing a list of ingredients with their quantities and measurements.
   */
  static public function ingredients($recipe_id) {
    $ingredients = Recipe::get_ingredients($recipe_id);
    $html = "<ul>";
    foreach ($ingredients as $ingredient) {
      $measurement_id = $ingredient->get_measurement_id();
      $measurement = $ingredient->get_measurement_name($ingredient);
      if ($ingredient->quantity > 1 && $measurement_id != 16) $measurement .= "s";
      $html .= "<li class=\"mb-2\"><span class=\"quantity\">" . abs($ingredient->quantity) . "</span> " . h($measurement) . " " . ucfirst(h($ingredient->ingredient_name)) . "</li>";
    };
    $html .= "</ul>";
    return $html;
  }
  
  /**
   * Retrieves the directions associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve directions.
   * @return array|null An array of directions if found, or null if no directions exist for the given recipe ID.
   */
  static public function get_directions($recipe_id) {
    return Direction::find_by_recipe_id($recipe_id);
  }

  /**
   * Generates an ordered list of directions for a given recipe.
   *
   * This method retrieves the directions associated with the specified recipe ID,
   * formats them into an HTML ordered list, and returns the resulting HTML string.
   *
   * @param int $recipe_id The ID of the recipe for which directions are to be retrieved.
   * @return string The HTML string containing the ordered list of directions.
   */
  static public function directions($recipe_id) {
    $directions = Recipe::get_directions($recipe_id);
    $html = "<ol>";
    foreach ($directions as $direction) {
      $html .= "<li class=\"mb-2\">" . ucfirst(h($direction->direction_text)) . "</li>";
    };
    $html .= "</ol>";
    return $html;
  }

  /**
   * Retrieves the diet information associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve diet information.
   * @return mixed The diet information associated with the recipe, as returned by RecipeDiet::find_by_recipe_id().
   */
  static public function get_recipeDiet($recipe_id) {
    return RecipeDiet::find_by_recipe_id($recipe_id);
  }

  /**
   * Retrieves the style information associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve style information.
   * @return mixed The style information associated with the recipe, as returned by RecipeStyle::find_by_recipe_id().
   */
  static public function get_recipeStyle($recipe_id) {
    return RecipeStyle::find_by_recipe_id($recipe_id);
  }

  /**
   * Retrieves the meal type information associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve meal type information.
   * @return mixed The meal type information associated with the recipe, as returned by RecipeMealType::find_by_recipe_id().
   */
  static public function get_recipeMealType($recipe_id) {
    return RecipeMealType::find_by_recipe_id($recipe_id);
  }

  /**
   * Generates an HTML unordered list of recipe categories based on the recipe ID.
   *
   * This method retrieves the diet, style, and meal type categories associated
   * with a given recipe ID and formats them into an HTML list.
   *
   * @param int $recipe_id The ID of the recipe for which categories are retrieved.
   * @return string An HTML string containing an unordered list of recipe categories.
   *
   * The categories are retrieved using the following methods:
   * - Recipe::get_recipeDiet($recipe_id): Retrieves diet categories.
   * - Recipe::get_recipeStyle($recipe_id): Retrieves style categories.
   * - Recipe::get_recipeMealType($recipe_id): Retrieves meal type categories.
   *
   * Each category is displayed as a list item (<li>) with its value fetched
   * using the `find_value_from_lookup` function.
   */
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

  /**
   * Retrieves the images associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve images.
   * @return mixed The images associated with the recipe, as returned by Image::find_by_recipe_id().
   */
  static public function get_images($recipe_id) {
    $result = Image::find_by_recipe_id($recipe_id);
    if ($result) {
      return $result;
    }
  }


  /**
   * Generates and displays a Bootstrap carousel for recipe images.
   *
   * This static method retrieves images associated with a given recipe ID
   * and creates a Bootstrap carousel to display them. If no images are found,
   * the method does not output anything.
   *
   * @param int $recipe_id The ID of the recipe for which images are to be displayed.
   *
   * @return void Outputs the HTML for the Bootstrap carousel if images are available.
   */
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

  /**
   * Outputs the first image of a recipe as an HTML image element.
   *
   * This method retrieves all images associated with a given recipe ID,
   * selects the first image from the list, and generates an HTML structure
   * to display the image. If no images are found, no output is generated.
   *
   * @param int $recipe_id The ID of the recipe whose first image is to be displayed.
   * 
   * @return void
   */
  static public function first_image_only($recipe_id) {
    $images = Recipe::get_images($recipe_id);
    if ($images){
    $image = $images[0];
    echo '<div id="image-card">';
    echo '<img class="small-card" src="' .IMAGE_PATH . h($image->image_url) . '"  alt="Recipe Image." >';
    echo '</div>';
    }
  }

  /**
   * Retrieves the ratings associated with a specific recipe.
   *
   * @param int $recipe_id The ID of the recipe for which to retrieve ratings.
   * @return mixed The ratings associated with the recipe, as returned by Rating::find_by_recipe_id().
   */
  static public function get_ratings($recipe_id) {
    return Rating::find_by_recipe_id($recipe_id);
  }


  /**
   * Calculates the average rating for a given recipe.
   *
   * This method retrieves all ratings associated with the specified recipe ID,
   * sums up the rating levels, and calculates the average rating.
   *
   * @param int $recipe_id The ID of the recipe for which the average rating is calculated.
   * @return float|null The average rating as a float, or null if there are no ratings.
   */
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


  /**
   * Displays the average rating for a given recipe.
   *
   * This method calculates the average rating of a recipe using the `average_rating` method
   * and displays it in a formatted HTML paragraph. If the average rating is not an integer,
   * it formats the value to one decimal place. If no ratings are available, it displays
   * a message indicating that there are no ratings yet.
   *
   * @param int $recipe_id The ID of the recipe for which the average rating is to be displayed.
   * @return void Outputs the average rating or a "No ratings yet" message directly to the page.
   */
  static public function display_average_rating($recipe_id) {
    $average = Recipe::average_rating($recipe_id);
    
    if (isset($average)) {
      if (!is_int($average)) $average = number_format($average, 1);
      echo "<p class=\"mb-3 rating-icon\">Average Rating: " . h($average) . "/5 <i class=\"fa-solid fa-drumstick-bite\"></i>";
    } else {
      echo  "<p class=\"mb-3\">No ratings yet!";
    }
  }


  /**
   * Displays the total number of raters for a given recipe.
   *
   * This method retrieves the ratings for the specified recipe ID
   * and calculates the total number of contributors based on the
   * affected rows in the database.
   *
   * @param int $recipe_id The ID of the recipe to retrieve ratings for.
   * @return string A formatted string displaying the total number of contributors.
   */
  static public function display_total_raters($recipe_id) {
    Recipe::get_ratings($recipe_id);
    $total = parent::$database->affected_rows;
    return " (" . h($total) . " contributors)</p>";
  }


  /**
   * Checks if a user has submitted a rating for a specific recipe.
   *
   * This method retrieves all ratings for the given recipe and checks if the
   * specified user has already submitted a rating. If a rating is found, it
   * returns the rating object; otherwise, it returns null.
   *
   * @param int $recipe_id The ID of the recipe to check ratings for.
   * @param int $user_id The ID of the user to check for a submitted rating.
   * @return object|null The rating object if the user has submitted a rating, or null if not.
   */
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

  /**
   * Retrieves the user ID associated with the recipe.
   *
   * @return int The user ID as an integer.
   */
  public function get_user_id() {
    return (int) $this->user_id;
  }

  /**
   * Retrieves and displays the username of the user who created the recipe.
   *
   * @param object $recipe An instance of the recipe object, which provides access to the user ID.
   * 
   * @return void Outputs the username of the recipe creator.
   */
  static public function user_info($recipe) {
      $user_id = $recipe->get_user_id();
      $username = User::get_username_by_id($user_id);
      echo "Created by: " . $username;
  }
  
  /**
   * Sets the user ID for the recipe object.
   *
   * This method retrieves the user ID from the current session
   * and assigns it to the `user_id` property of the object.
   *
   * @return void
   */
  protected function set_user_id() {
    $this->user_id = $_SESSION['user_id'];
  }

  /**
   * Creates a new recipe record.
   *
   * This method sets the user ID for the recipe and then calls the parent
   * class's create method to handle the actual creation process.
   *
   * @return mixed The result of the parent create method.
   */
  protected function create() {
    $this->set_user_id();
    return parent::create();
  }

  
  /**
   * Retrieves the video associated with a specific recipe.
   *
   * This method fetches a video record linked to the given recipe ID
   * by utilizing the `find_by_recipe_id` method of the `Video` class.
   *
   * @param int $recipe_id The ID of the recipe for which the video is to be retrieved.
   * @return mixed The video object associated with the recipe, or null if no video is found.
   */
  static public function get_video($recipe_id) {
    $result =  Video::find_by_recipe_id($recipe_id);
    if ($result) {
      return $result;
    }
  }

  /**
   * Displays the video associated with a specific recipe.
   *
   * This method retrieves the video information for the given recipe ID
   * and generates an HTML structure to display the video using an iframe.
   * If no videos are found, no output is generated.
   *
   * @param int $recipe_id The ID of the recipe for which to display the video.
   *
   * @return void Outputs the HTML for the video iframe if available.
   */
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

  /**
   * Validates the data for the current instance.
   *
   * This method performs validation specific to the subclass and populates
   * the `$errors` property with any validation errors encountered.
   *
   * @return array An array of validation errors. If no errors are found, the array will be empty.
   */
  protected function validate()
  {
    $this->errors = [];

    // Subclass specific validation

    return $this->errors;
  }

}
