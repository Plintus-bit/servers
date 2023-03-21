<?php

function GetCart($connect, $usr_name) {
    $data = $connect->query("SELECT * FROM serv_cart where usr_name=$usr_name");
    $data_list= [];
    while($row = mysqli_fetch_assoc($data)) {
        $data_list[] = $row;
    }
    echo json_encode($post);
}

functino AddToCart($connect, $id, $usr_name) {
    
}