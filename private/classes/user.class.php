<?php

class User extends DatabaseObject
{

    static public $table_name = 'user';
    static public $db_columns = ['id', 'username', 'profile_image_url', 'email_address', 'password_hash', 'joined_at', 'role_id', 'active'];

    public $id;
    public $username;
    public $profile_image_url;
    // public $f_name;
    // public $l_name;
    public $email_address;
    protected $password_hash;
    public $joined_at;
    public $role_id;
    public $active;
    public $password;
    public $confirm_password;
    protected $password_required = true;



    public function __construct($args = [])
    {
        $this->username = $args['username'] ?? '';
        $this->profile_image_url = $args['profile_image_url'] ?? 'default_profile.webp';
        // $this->f_name = $args['f_name'] ?? '';
        // $this->l_name = $args['l_name'] ?? '';
        $this->email_address = $args['email_address'] ?? '';
        $this->password_hash = $args['password_hash'] ?? '';
        $this->joined_at = $args['joined_at'] ?? date('Y-m-d H:i:s');
        $this->role_id = $args['role_id'] ?? 1;
        $this->active = $args['active'] ?? 1;
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    /**
     * Retrieves the username associated with a given user ID.
     *
     * This method fetches a user object by its ID and returns the username
     * if the user exists. If no user is found, it returns null.
     *
     * @param int $id The ID of the user whose username is to be retrieved.
     * @return string|null The username of the user, or null if no user is found.
     */
    static public function get_username_by_id($id)
    {
        $user = self::find_by_id($id);
        return $user ? $user->username : null;
    }


    /**
     * Retrieves the profile image URL of a user by their ID.
     *
     * This method fetches a user record by its ID and returns the URL of the user's profile image.
     * If the user is not found, it returns null.
     *
     * @param int $id The ID of the user whose profile image URL is to be retrieved.
     * @return string|null The profile image URL of the user, or null if the user is not found.
     */
    static public function get_user_image($id)
    {
        $user = self::find_by_id($id);
        return $user ? $user->profile_image_url : null;
    }


    /**
     * Sets the profile image for a user by uploading the image file and updating the database.
     *
     * @param int $id The ID of the user whose profile image is being set.
     *
     * @return void
     *
     * @throws Exception If the file upload fails or the file type/size is invalid.
     *
     * The function performs the following steps:
     * - Retrieves the uploaded file from the global $_FILES array.
     * - Validates the file type to ensure it is one of the allowed types (jpg, jpeg, png, webp).
     * - Checks for upload errors and ensures the file size is below the specified limit (75KB).
     * - Renames the file to include the user's ID and moves it to the uploads directory.
     * - Updates the user's profile image URL in the database.
     *
     * Error messages are echoed directly if any validation fails:
     * - "Your file is too big!" if the file size exceeds the limit.
     * - "There was an error uploading your file." if there is an upload error.
     * - "You cannot upload images of that type!" if the file type is not allowed.
     */
    static public function set_profile_image($id)
    {
        $file = $_FILES['profile_image_url'];

        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];

        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($file_actual_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 75000) {
                    $file_name_new = "profile_" . $id . "." . $file_actual_ext;
                    $file_destination = ('../../uploads/') . $file_name_new;
                    move_uploaded_file($file_tmp_name, $file_destination);
                    $sql = "UPDATE user SET profile_image_url='" . self::$database->escape_string($file_name_new) . "' WHERE id='" . $id . "';";
                    parent::$database->query($sql);
                } else {
                    echo "<p>Your file is too big!</p>";
                }
            } else {
                echo "<p>There was an error uploading your file.</p>";
            }
        } else {
            echo "<p>You cannot upload images of that type!</p>";
        }
    }

    /**
     * Determines the display status of the user based on their active state.
     *
     * @return string Returns 'Active' if the user is active, otherwise 'Deactivated'.
     */
    public function active_display()
    {
        return $this->active == 1 ? 'Active' : 'Deactivated';
    }

    /**
     * Retrieves the full name of the user by combining the first name and last name.
     *
     * @return string The full name of the user, with leading and trailing whitespace removed.
     */
    // public function full_name()
    // {
    //     return trim("{$this->f_name} {$this->l_name}");
    // }


    /**
     * Hashes the user's password using the bcrypt algorithm and sets it to the 
     * password_hash property.
     *
     * This method uses PHP's password_hash function with the PASSWORD_BCRYPT 
     * algorithm to securely hash the password stored in the $this->password property.
     *
     * @return void
     */
    protected function set_hashed_password()
    {
        $this->password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    }

    /**
     * Verifies the provided password against the hashed password stored in the 
     * password_hash property.
     *
     * This method uses PHP's password_verify function to check if the provided 
     * password matches the hashed password.
     *
     * @param string $password The password to verify.
     * @return bool Returns true if the password matches, otherwise false.
     */
    public function verify_password($password)
    {
        return password_verify($password, $this->password_hash);
    }

    /**
     * Creates a new user record in the database.
     *
     * This method hashes the password before creating the user record.
     *
     * @return bool Returns true on success, false on failure.
     */
    protected function create()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    /**
     * Updates the user record in the database.
     *
     * This method checks if the password is being updated. If it is, it hashes the new password
     * and validates it. If not, it skips hashing and validation.
     *
     * @return bool Returns true on success, false on failure.
     */
    protected function update()
    {
        if ($this->password != '') {
            $this->set_hashed_password();
            // validate password
        } else {
            // password not being updated, skip hashing and validation
            $this->password_required = false;
        }
        return parent::update();
    }

    /**
     * Validates the user attributes before saving to the database.
     *
     * This method checks for blank values, length constraints, and uniqueness of username and email.
     *
     * @return array An array of error messages if validation fails, otherwise an empty array.
     */
    protected function validate()
    {
        $this->errors = [];

        if (is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        } elseif (!has_length($this->username, array('min' => 5, 'max' => 20))) {
            $this->errors[] = "Username must be between 5 and 20 characters.";
        } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
            $this->errors[] = "Username not allowed. Try another.";
        }

        if (is_blank($this->email_address)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email_address, array('max' => 100))) {
            $this->errors[] = "Email must be less than 100 characters.";
        } elseif (!has_valid_email_format($this->email_address)) {
            $this->errors[] = "Email must be a valid format.";
        }

        if ($this->password_required) {
            if (is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 12))) {
                $this->errors[] = "Password must contain 12 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if (is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }
        }

        return $this->errors;
    }

    /**
     * Finds a user by their username.
     *
     * This method retrieves a user object from the database based on the provided username.
     * If no user is found, it returns false.
     *
     * @param string $username The username of the user to find.
     * @return User|false The user object if found, otherwise false.
     */
    static public function find_by_username($username)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }


    /**
     * Retrieves the recipes rated by a specific user.
     *
     * This method fetches all the recipes that have been rated by the user
     * with the given user ID by utilizing the `Rating::find_rating_by_user_id` method.
     *
     * @param int $user_id The ID of the user whose rated recipes are to be retrieved.
     * @return mixed The result of the `Rating::find_rating_by_user_id` method, 
     *               which could be an array of ratings or another data structure, 
     *               depending on the implementation.
     */
    static public function get_user_rated_recipes($user_id)
    {
        return Rating::find_rating_by_user_id($user_id);
    }

    /**
     * Counts the total number of ratings given by a specific user.
     *
     * This method retrieves the rated recipes for the user with the given user ID
     * and returns the count of those ratings.
     *
     * @param int $user_id The ID of the user whose ratings are to be counted.
     * @return int The total number of ratings given by the user.
     */
    static public function count_all_ratings_by_user_id($user_id)
    {
        $ratings = User::get_user_rated_recipes($user_id);
        $total = count($ratings);
        return $total;
    }
}
