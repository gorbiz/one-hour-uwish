<?php
if (!isset($_POST['id']) || empty($_POST['id'])) {
	// TODO Raise error
	die;
}
$list = json_decode(file_get_contents('users-list.json'));
foreach ($list as $key => $item) {
	if ($item->id == $_POST['id']) {
		unset($list[$key]);
		break;
	}
}
file_put_contents('users-list.json', json_encode($list));
echo 'success';
