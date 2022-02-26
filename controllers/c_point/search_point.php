<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../models/database.php');
    include_once('../../models/m_point.php');
    $database = new database();
    $connect = $database->connect();

    $m_point = new m_point($connect);
    $m_point -> SHLK=isset($_GET['SHLK']) ? $_GET['SHLK']:die();
    $read_all = $m_point->search_point();
    
    $num = $read_all->rowCount();
    if($num>0){
        
        $point_array['point'] = [];

        while($row = $read_all->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $point_item = array(
                'No' => $No,
                'SHLK' => $SHLK,
                'x' => $x,
                'y' => $y,
                'X1' => $X1,
                'Y1' => $Y1,
                'z' => $z,
                'EPSG' => $EPSG,
                'Province' => $Province,
                'District' => $District,
                'Commune' => $Commune,
                'Detailed' => $Detailed,
                'Aquifer' => $Aquifer,
                'depth' => $depth,
                'Well_screen' => $Well_screen,
                'Diameter_screen' => $Diameter_screen,
                'Static_water_level' => $Static_water_level,
                'TDS' => $TDS,
                'Year_of_well_completion' => $Year_of_well_completion,
                'Well_type' => $Well_type,
                'Project' => $Project,
                'Log' => $Log,
                'Log_scan' => $Log_scan,
                'Pumping_test_scan' => $Pumping_test_scan,
                'Water_quality_scan' => $Water_quality_scan,
                


            );
            array_push($point_array['point'],$point_item);
        }
        echo json_encode($point_array);
    }
?>