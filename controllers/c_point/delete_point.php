<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    include_once('../../models/database.php');
    include_once('../../models/m_point.php');
    $database = new database();
    $connect = $database->connect();

    $m_point = new m_point($connect);
    $m_point->No = isset($_GET['No']) ? $_GET['No'] : die();

    if($m_point->delete_point()){
        echo json_encode(array('message','Deleted'));
    } else {
        echo json_encode(array('message','Not deleted'));
    }
?>