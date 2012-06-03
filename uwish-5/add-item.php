<?php

if (isset($_POST['name']) && !empty($_POST['name'])) {
  $item = array('name' => $_POST['name']);
  if (isset($_POST['description'])) {
    $item['description'] = $_POST['description'];
  }
  $list = json_decode(file_get_contents('users-list.json'));
  $list[] = $item;
  file_put_contents('users-list.json', json_encode($list));

  header('Content-type: application/json');
  echo json_encode($item);
}
