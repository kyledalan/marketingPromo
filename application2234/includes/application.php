<?php
/*
 * Sample use: 
 * 
include('./includes/applicationShirt2.php');
$app = new applicationShirt2();
$user = $app->getItem('someuser@whitehouse.gov'); 
print_r($user); 

 *
 * Database tables: 
 * 
DROP TABLE IF EXISTS `test`.`shirts3423_users`;
CREATE TABLE  `test`.`shirts3423_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `emailconfirmed` int(10) unsigned DEFAULT NULL,
  `resethash` varchar(255) DEFAULT NULL,
  `promoid` varchar(255) NOT NULL,
  `promocompleted` varchar(255) NOT NULL,
  `lastedit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User storage for promos app';

 *
 *
 */
 
class application2234
{
	protected $applicationLog = array(); 
	public $userMessages = array(); 
	public $user = array(); 
	public $loginPage = '/?action=login';
	public $thanksPage = '/?action=thanks';

	public function __construct() 
	{
		$this->getDb();
		
		if(!empty($_REQUEST['action']))
		{ 
			if($_REQUEST['action'] == 'get-export') {
				header('Content-type: text/xml'); 
				print $this->exportXml();
				exit(); 
			}
			elseif($_REQUEST['action'] == 'user-login') 
			{ 
				$name = empty($_REQUEST['name']) ? '' : $_REQUEST['name'];
				header('Content-type: application/json'); 
				print $this->getUserJson($name);
				exit(); 
			}
			elseif($_REQUEST['action'] == 'user-register') 
			{ 
				header('Content-type: application/json'); 
				$user = $this->saveUser(); 
				$name = empty($user->name) ? '' : $user->name; 
				print $this->getUserJson($name);
				exit();
			}
		}
	}

	private function getDb() 
	{
		$this->mysqli = new  mysqli('localhost', 'root', 'root');
		$this->mysqli->select_db('test');
		$this->log[] = $this->mysqli->stat();
		return $this->mysqli->stat();
	}
	
	
	public function checkUserPassword($passwordString = '') 
	{
		$e = array(); 
		if (preg_match('/\s/', $passwordString)) {
			$this->userMessages[] = $e[] = 'Password cannot contain spaces.';	
		}
		if (strlen($passwordString) < 6) {
			$this->userMessages[] = $e[] = 'Password must be at least 6 characters.';
		}
		return empty($e) ? true : false; 
	}
	
	public function checkname($nameString = '') 
	{
		$e = array(); 
		if (preg_match('/\s/', $nameString)) {
			$this->userMessages[] = $e[] = 'name should not contain spaces.';
		}
		if (strlen($nameString) < 6) {
			$this->userMessages[] = $e[] = 'name must be at least 6 characters'; 
		}
		return empty($e) ? true : false; 
	}

	public function exportXml() 
	{
		$dom = new DOMDocument('1.0');

		$node = $dom->createElement('markers');
		$parentNode = $dom->appendChild($node); 
		
		$query = sprintf('SELECT * FROM `tablename`');
		$result = $this->mysqli->query($query); 

		while($data = $result->fetch_object()) {
			$node = $dom->createElement('marker');  
			$newNode = $parentNode->appendChild($node);   
			$newNode->setAttribute('field', $data->field);
			$newNode->setAttribute('field', $data->field2);  
			$newNode->setAttribute('field', $data->field3);  
			$newNode->setAttribute('field', $data->field4);  
		}
		return $dom->saveXML();
	}

	public function saveUser() 
	{
		$query = sprintf('INSERT INTO `shirts3423_users` (username, useremail, userpassword) VALUES ("%s", "%s", "%s")
			ON DUPLICATE KEY UPDATE username="%s", useremail="%s", userpassword="%s"', 
			addslashes($_REQUEST['name']), addslashes($_REQUEST['email']), addslashes($_REQUEST['password']),
			addslashes($_REQUEST['name']), addslashes($_REQUEST['email']), addslashes($_REQUEST['password'])
			);
		$result = $this->mysqli->query($query); 
		if(!$result) {
			return $this->mysqli->error();
		}
		return $this->getUser($_REQUEST['name']);
	}

	public function getUser($userId = null) 
	{
		$_REQUEST['name'];
		$query = sprintf('SELECT * FROM `shirts3423_users` WHERE username="%s" AND "%s"!=""', $userId, $userId); 
		$result = $this->mysqli->query($query);
		return $result->fetch_object();
	}
	
	public function getUserJson($userId = null) {
		$user = $this->getUser($userId); 
		$data = empty($user) ? array() : $user; 
		return json_encode($data); 
	}




}




