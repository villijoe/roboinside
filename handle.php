<?php

require_once 'interfaces/IConnect_DB.php';
require_once 'classes/Connect_DB.php';
require_once 'classes/Auth_User.php';
require_once 'classes/List_Users.php';
require_once 'classes/Create_User.php';
require_once 'classes/Edit_User.php';

if (isset($_POST['method']) && !empty($_POST['method'])) {

	$method = $_POST['method'];
	$conn = new Connect_DB(); // create obj connect db
	if (isset($_POST['email']) && !empty($_POST['email'])) { $email = $_POST['email']; } else { $email = ''; }
	if (isset($_POST['password']) && !empty($_POST['password'])) { $password = $_POST['password']; } else { $password = ''; }

	if ($method == 'authUser') { // if need authentification user to admin panel
		$auth = new Auth_User();
		$auth->check_user($conn, $email, $password);
		$auth->setJSON($auth->getArray());
		echo $auth->getJSON();
	} else if ($method == 'listUsers') { // if need print list users
		$list = new List_Users($conn);
	} else if ($method == 'createUser') { // if need create new user
		$create = new Create_User($conn, $email, $password);
		echo $create->getJSON();
	} else if ($method == 'editUser') { // if need edit existing user
		$edit = new Edit_User($conn, $email, $password);
	}
} else {
	return false;
}