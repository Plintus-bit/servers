<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

header('Content-type: json/application');

require 'func.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

$connect = mysqli_connect("db", "user", "password", "appDB");

switch ($method) {
    case 'GET':
        if($type === 'services'){
            if(isset($id)){
                getService($connect,$id);
            } else {
                getServices($connect);
            }
        }
        break;
    case 'POST':
        if(isset($_POST['id'])){
            updateService($connect,$_POST);
        }
        else {
            addService($connect,$_POST);
        }
        break;
    case 'DELETE':
        if($type === 'services'){
            if(isset($id))
            {
                deleteService($connect,$id);      
            }  
        }  
        break;
}
