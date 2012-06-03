<?php

if (isset($_POST['name']) && !empty($_POST['name'])) {
  $list = json_decode(file_get_contents('users-list.json'));
  $item = array('name' => $_POST['name'], 'description' => $_POST['description']);
  $list[] = $item;
  file_put_contents(json_encode($list));
  echo json_encode($item);
}
