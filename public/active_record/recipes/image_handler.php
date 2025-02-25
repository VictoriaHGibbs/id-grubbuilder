<?php

if (isset($_POST['image'])) {
  $file = $_FILES['image[0][image_url]'];

  $file_name = $file['name'];  // this is the 'picture.jpg'
  $file_tmp_name = $file['tmp_name'];
  $file_size = $file['size'];
  $file_error = $file['error'];
  $file_type = $file['type'];

  $file_ext = explode('.', $file_name);  // array where values are 'picture' and 'jpg'
  $file_actual_ext = strtolower(end($file_ext)); // this is just the 'jpg'

  $allowed = array('jpg', 'jpeg', 'png', 'webp');

  if (in_array($file_actual_ext, $allowed)) { // checking if uploaded extension is allowed
    if ($file_error === 0) {
      if ($file_size < 30000) { // max file size in kb
        $file_name_new =  "recipe" . "$recipe_id" . "$image_line_item" . "." . $file_actual_ext;
        $file_destination = url_for('/images/user/') . $file_name_new;
        move_uploaded_file($file_tmp_name, $file_destination);
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file.";
    }
  } else {
    echo "You cannot upload images of that type!";
  }

}
