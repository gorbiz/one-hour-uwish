<?php
if (!isset($_POST['name']) || empty($_POST['name'])) {
	// TODO Return error
	echo 'error';
	die;
}

$item = array('name' => $_POST['name'], 'description' => '');
if (isset($_POST['description'])) {
	$item['description'] = $_POST['description'];
}

$list = json_decode(file_get_contents('users-list.json'));

$id = 1;
foreach ($list as $key => $it) {
	if ($it->id >= $id) $id = $it->id +1;
}
$item['id'] = $id;

$list[] = $item;
file_put_contents('users-list.json', json_encode($list));

header('Content-Type: application/json');
echo json_encode($item);
