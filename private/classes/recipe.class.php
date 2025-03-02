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

// Display recipe info, TESTING PURPOSES
  public function display() {
    return (h($this->recipe_title) . "<br>" . h($this->description) . "<br>");
  }

// Retrieve associated ingredients
  static public function get_ingredients($recipe_id) {
    return Ingredient::find_by_recipe_id($recipe_id);
  }

// Display ingredients
  static public function ingredients($recipe_id) {
    $ingredients = Recipe::get_ingredients($recipe_id);
    echo "<ul>";
    foreach ($ingredients as $ingredient) {
      $measurement = $ingredient->get_measurement_name($ingredient);
      if ($ingredient->quantity > 1) $measurement .= "s";
      echo  "<li>" . abs($ingredient->quantity) . " " . h($measurement) . " " . h($ingredient->ingredient_name) . "</li>";
    };
    echo "</ul>";
  }
  
// Retrieve associated directions
  static public function get_directions($recipe_id) {
    return Direction::find_by_recipe_id($recipe_id);
  }

// Display directions
  static public function directions($recipe_id) {
    $directions = Recipe::get_directions($recipe_id);
    echo "<ol>";
    foreach ($directions as $direction) {
      echo "<li>" . h($direction->direction_text) . "</li>";
    };
    echo "</ol>";
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
    echo "<div id=\"image-card\">";
    foreach ($images as $image) {
      echo "<img src=";
      echo (IMAGE_PATH . h($image->image_url));
      echo ">";
    };
    echo "</div>";
    }
  }

// Display first image by sort_order
  static public function first_image_only($recipe_id) {
    $images = Recipe::get_images($recipe_id);
    if ($images){
    $image = $images[0];
    echo "<div id=\"image-card\">";
    echo "<img src=";
    echo (IMAGE_PATH . h($image->image_url));
    echo ">";
    echo "</div>";
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
    echo "<p>Average Rating: " . $average . "/5</p>";
  } else {
    echo  "<p>No ratings yet!</p>";
  }
}

// Allows the user to rate a recipe that is not their own and save it to the database
  static public function save_rating($recipe_id) {
    
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

  // Retrieves the stored youtube video link, puts it in the iframe and then displays it.
  static public function get_video($recipe_id) {
    $sql = "SELECT youtube_url FROM video WHERE recipe_id='" . h($recipe_id) . "'";
    $result = parent::$database->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $link = h($row["youtube_url"]);
      if ($link) { ?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo h($link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
