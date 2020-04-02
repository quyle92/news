<?php
require_once "config.php";//if config.php is located in htdocs\news, we need to edit as require once $_SERVER['DOCUMENT_ROOT']."\\news\\config.php";
class goc {
		protected $db;
		function __construct() {
			$this->db=new mysqli (DBHOST,DBUSER,DBPASS,DBNAME);
			$this->db->set_charset("utf8");
		}
}
?>