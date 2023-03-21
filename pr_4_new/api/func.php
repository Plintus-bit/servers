<?php

function getServices($connect) {
    $services = mysqli_query($connect,"SELECT * FROM services");
    $serv_list = [];
    while ($serv = mysqli_fetch_assoc($services)) {
        $serv_list[] = $serv;
    }
    echo json_encode($serv_list);
}

function getService($connect, $id) {
    $services = mysqli_query($connect,"SELECT * FROM services WHERE id=$id");
    if (mysqli_num_rows($services) === 0) {
        http_response_code(404);
		$res = [
			"status" => false,
			"message" => "Service not found"
		];
        echo json_encode($res);
    }
    else {
        $serv = mysqli_fetch_assoc($services);
        echo json_encode($serv);
    }
    
}

function addService($connect, $data) {
    $descript = $data['descript'];
    $s_name = $data['s_name'];
    $cost = $data['cost'];
    mysqli_query($connect, "INSERT INTO services (descript, s_name, cost) VALUES ($descript, $s_name, $cost)");
    http_response_code(201);
    	$res = [
		"status" => true,
		"id" => mysqli_insert_id($connect)
	];
	echo json_encode($res);
}

function updateService($connect, $data) {
    $id = $data['id'];
    $descript = $data['descript'];
    $s_name = $data['s_name'];
    $cost = $data['cost'];
    mysqli_query($connect, "UPDATE services SET descript=$descript, s_name=$s_name, cost=$cost WHERE id=$id");
    http_response_code(200);
	$res = [
		"status" => true,
		"message" => "service is edited",
        "name" => $s_name,
		"descript" => $descript,
		"cost" => $cost
	];
	echo json_encode($res);
}

function deleteService($connect, $id) {
    mysqli_query($connect, "DELETE FROM services WHERE id = $id");
    http_response_code(200);
    $res = [
		"status" => true,
		"id" => $id,
		"message" => "service is deleted",
	];
	echo json_encode($res);
}
