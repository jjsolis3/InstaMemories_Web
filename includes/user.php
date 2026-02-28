<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="users";
	protected static $db_fields = array('id', 'first_name', 'last_name', 'email', 'password', 'phone', 'event', 'forgot_pass_identity', 'event_identity','role', 'created', 'modified', 'status');
	
	public $id;
	public $password;
	public $email;
	public $phone;
	public $event;
	public $first_name;
	public $last_name;
	public $role;
	
	
  public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }

	public static function authenticate($email="", $password="") {
    global $database;
    $email = $database->escape_value($email);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE email = '{$email}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

}

?>