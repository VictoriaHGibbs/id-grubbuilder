<?php
require_once('../../../private/initialize.php');
require_once('../../assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

ob_start();

$recipe_id = $_GET['id'] ?? false;
$recipe = Recipe::find_by_id($recipe_id);


$dompdf = new Dompdf();

$html = "  
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

  <style>
    body { 
      padding: 20px; 
    }

    h1 {
      border-bottom: 2px solid #ddd;
      padding-bottom: 5px; 
    }

    section { 
      margin-bottom: 10px; 
    }

    li {
      line-height: 2;
    }

  </style>
</head>

<body>
  <h1>" . h($recipe->recipe_title) . "</h1>
  <p>" . Recipe::user_info($recipe) . "</p>
  <p>" . h($recipe->description) . "</p>

  <section>
    <h2>Details</h2>
    <p>Prep Time: " . h($recipe->prep_time_minutes) . " minutes</p>
    <p>Cook Time: " . h($recipe->cook_time_minutes) . " minutes</p>
    <p>Servings: " . h($recipe->servings) . "</p>
    <p>Yield: " . h(abs($recipe->yield)) . " " . h($recipe->get_measurement_name($recipe)) . ($recipe->yield > 1 ? "s" : "") . "</p>
  </section>


  <section>
    <h2>Ingredients</h2>
    <div>" . Recipe::ingredients($recipe_id) . "</div>
  </section>
  
    <section>
    <h2>Directions</h2>
    <div>" . Recipe::directions($recipe_id) . "</div>
  </section>

</body>
</html>";

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

ob_end_clean();

$dompdf->stream('recipe_' . h($recipe->recipe_title) . '.pdf', ['Attachment' => 0]);

error_reporting(E_ALL);
ini_set('display_errors', 1);

?> 
