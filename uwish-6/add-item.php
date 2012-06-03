<?php
header('Content-Type: application/json');
if (!isset($_POST['name']) || empty($_POST['name'])) {
	echo '';
	die;
}
$item = array('name' => $_POST['name']);
$item['description'] = '';
if (isset($_POST['description']) && !empty($_POST['description'])) {
	$item['description'] = $_POST['description'];
}
$list = json_decode(file_get_contents('users-list.json'));
$list[] = $item;
file_put_contents('users-list.json', json_encode($list));
echo json_encode($item);
