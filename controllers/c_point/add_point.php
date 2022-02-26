<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../models/database.php');
    include_once('../../models/m_point.php');
    $database = new database();
    $connect = $database->connect();

    $m_point = new m_point($connect);
    
    
    $data = json_decode(file_get_contents("php://input"));
    $m_point->No = $data->No;
    $m_point->SHLK = $data->SHLK;
    $m_point->x = $data->x;
    $m_point->y = $data->y;
    $m_point->X1 = $data->X1;
    $m_point->Y1 = $data->Y1;
    $m_point->z= $data->z;
    $m_point->EPSG = $data->EPSG;
    $m_point->Province = $data->Province;
    $m_point->District = $data->District;
    $m_point->Commune = $data->Commune;
    $m_point->Detailed = $data->Detailed;
    $m_point->Aquifer = $data->Aquifer;
    $m_point->depth = $data->depth;
    $m_point->Well_screen = $data->Well_screen;
    $m_point->Diameter_screen = $data->Diameter_screen;
    $m_point->Static_water_level = $data->Static_water_level;
    $m_point->TDS = $data->TDS;
    $m_point->Year_of_well_completion = $data->Year_of_well_completion;
    $m_point->Well_type = $data->Well_type;
    $m_point->Project = $data->Project;
    $m_point->Log = $data->Log;
    $m_point->Log_scan = $data->Log_scan;
    $m_point->Pumping_test_scan = $data->Pumping_test_scan;
    $m_point->Water_quality_scan = $data->Water_quality_scan;
    
    
    if($m_point->add_point()){
        echo json_encode(array('message','Created'));
    } else {
        echo json_encode(array('message','Not created'));
    }
?>