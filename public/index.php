<?php 
require_once('../private/initialize.php');

$page_title = 'Home';

include(SHARED_PATH . '/public_header.php');
?>

<ul>
  <li><a href="<?php echo url_for('/active_record/users/index.php') ?>">user index</a></li>
  <li><a href="<?php echo url_for('/active_record/users/new.php') ?>">Add User</a></li>
  <li><a href="<?php echo url_for('/active_record/recipes/index.php') ?>">recipe index</a></li>
  <li><a href="<?php echo url_for('/active_record/index.php') ?>">active record index</a></li>
  <li><a href="<?php echo url_for('/active_record/login.php') ?>">user login</a></li>
  <li><a href="<?php echo url_for('/active_record/signup.php') ?>">new user sign up</a></li>
</ul>

<p>Welcome</p>
<form action="<?php echo url_for('/index.php'); ?>" method="get">
  <label for="table">Choose a table to view:</label>
  <select id="table" name="table">
    <option value="">Pick One</option>
    <option value="diet">Diet</option>
    <option value="meal_type">Meal Type</option>
    <option value="style">Style</option>
    <option value="role">Role</option>
    <option value="measurement">Measurement</option>
    <option value="visibility">Visibility</option>
  </select>

  <input type="submit" value="submit"><br>

</form>

  <?php 
   
    $table = $_GET['table'] ?? die();
    $sql = "SELECT * FROM " . $table . " ORDER BY " . $table . "_id ASC";

    $result = mysqli_query($database, $sql);
    
  echo "<br><table border=1>
    <caption style='text-transform: capitalize; font-weight: bold;'>" . $table .  " Table Values</caption>
    <tr>
      <th>ID number</th>
      <th>Entry</th>
    </tr>";

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row[$table . "_id"] . "</td><td>" . $row[$table] . "</td></tr>";
        }
    }
     else {
      echo "0 results";
    }
    
  ?>

</table>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
