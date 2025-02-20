<?php

class User extends DatabaseObject {

  static public $table_name = 'user';
  static public $primary_key = 'user_id';
  static public $db_columns = ['user_id', 'username', 'profile_image_url', 'f_name', 'l_name', 'email_address', 'password_hash', 'joined_at', 'role_id', 'active'];

  public $user_id;
  public $username;
  public $profile_image_url;
  public $f_name;
  public $l_name;
  public $email_address;
  public $password_hash;
  public $joined_at;
  public $role_id;
  public $active;

  public function __construct($args=[]) {
    $this->user_id = $args['user_id'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->profile_image_url = $args['profile_image_url'] ?? '';
    $this->f_name = $args['f_name'] ?? '';
    $this->l_name = $args['l_name'] ?? '';
    $this->email_address = $args['email_address'] ?? '';
    $this->password_hash = $args['password_hash'] ?? '';
    $this->joined_at = $args['joined_at'] ?? '';
    $this->role_id = $args['role_id'] ?? 1;
    $this->active = $args['active'] ?? 1;
  }

  // Retrieve username from a $user_id
  static public function get_username_by_id($user_id) {
    $user = self::find_by_pk($user_id);
    return $user ? $user->username : null;
  }

  // Hash password before storing
  public function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  // Verify password
  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  // Check if a username exists
  static public function username_exists($username) {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE username = ?";
    $stmt = self::$database->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    return $count > 0;
  }

}
