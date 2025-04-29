<?php

class Session
{
  private $user_id;
  public $username;
  private $last_login;
  public $role_id;

  public const MAX_LOGIN_AGE = 60 * 60 * 24; // 1 day in seconds

  public function __construct()
  {
    session_start();
    $this->check_stored_login();
  }

  /**
   * Logs in a user by setting session variables and regenerating the session ID.
   *
   * @param object $user An object representing the user, expected to have properties:
   *                     - id (int|string): The user's unique identifier.
   *                     - username (string): The user's username.
   *                     - role_id (int|string): The user's role identifier.
   * @return bool Returns true upon successful login.
   */
  public function login($user)
  {
    if ($user) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->username = $_SESSION['username'] = $user->username;
      $this->last_login = $_SESSION['last_login'] = time();
      $this->role_id = $_SESSION['role_id'] = $user->role_id;
    }
    return true;
  }

  /**
   * Checks if the user is logged in.
   *
   * This method determines if a user is considered logged in by verifying
   * the presence of a user ID and ensuring the last login time is recent.
   *
   * @return bool Returns true if the user is logged in and the last login is recent, false otherwise.
   */
  public function is_logged_in()
  {
    // return isset($this->user_id);
    return isset($this->user_id) && $this->last_login_is_recent();
  }

  /**
   * Checks if an admin user is logged in.
   *
   * This method verifies if the user is logged in and has a role ID
   * corresponding to an admin. Admin roles are identified by role IDs
   * '2' or '3'.
   *
   * @return bool Returns true if the user is logged in and has an admin role, false otherwise.
   */
  public function is_admin_logged_in()
  {
    return $this->is_logged_in() && ($this->role_id == '2' || $this->role_id == '3');
  }

  /**
   * Checks if a superadmin user is logged in.
   *
   * This method verifies if the user is logged in and has a role ID of '3',
   * which corresponds to the superadmin role.
   *
   * @return bool Returns true if the user is logged in and is a superadmin, false otherwise.
   */
  public function is_superadmin_logged_in()
  {
    return $this->is_logged_in() && $this->role_id == '3';
  }

  /**
   * Logs the user out by clearing session variables and instance properties.
   *
   * This method unsets the following session variables:
   * - 'user_id': The ID of the logged-in user.
   * - 'username': The username of the logged-in user.
   * - 'last_login': The timestamp of the user's last login.
   * - 'role_id': The role ID of the logged-in user.
   *
   * Additionally, it unsets the corresponding instance properties:
   * - $this->user_id
   * - $this->username
   * - $this->last_login
   * - $this->role_id
   *
   * @return bool Returns true upon successful logout.
   */
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login']);
    unset($_SESSION['role_id']);
    unset($this->user_id);
    unset($this->username);
    unset($this->last_login);
    unset($this->role_id);
    return true;
  }

  /**
   * Checks and retrieves the stored login information from the session.
   *
   * This method checks if the session contains user login details. If the details
   * are present, it assigns the session values to the corresponding class properties:
   * - `user_id`: The ID of the logged-in user.
   * - `username`: The username of the logged-in user.
   * - `last_login`: The timestamp of the user's last login.
   * - `role_id`: The role ID associated with the user.
   *
   * @return void
   */
  private function check_stored_login()
  {
    if (isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->username = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
      $this->role_id = $_SESSION['role_id'];
    }
  }

  /**
   * Checks if the last login time is recent.
   *
   * This method determines whether the user's last login is within the
   * allowable time frame defined by the MAX_LOGIN_AGE constant.
   *
   * @return bool Returns true if the last login is recent, false otherwise.
   */
  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    } elseif (($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Handles setting and retrieving session messages.
   *
   * This method allows you to set a message in the session or retrieve
   * the currently stored message. If a message is provided as an argument,
   * it will be stored in the session. If no argument is provided, it will
   * return the stored session message or an empty string if no message exists.
   *
   * @param string $msg Optional. The message to set in the session.
   * @return string|bool Returns true if a message is set, or the stored message if retrieving.
   */
  public function message($msg = "")
  {
    if (!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message()
  {
    unset($_SESSION['message']);
  }
}
