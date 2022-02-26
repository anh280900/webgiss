<?php
header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
/**
 * PHP GeoJSON Constructor, adpated from https://github.com/bmcbride/PHP-Database-GeoJSON
 */

# Connect to MySQL database
require_once('../../models/config.php');
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die('không thể kết nối tới database');
    mysqli_query($conn,'SET NAMES "UTF8"');
    $query=mysqli_query($conn,'select * from tb_point');

# However the User's Query will be passed to the DB:

# Try query or error

# Build GeoJSON feature collection array
$geojson = array(
   'type'      => "FeatureCollection",
   'features'  => array()
);

# Loop through rows to build feature arrays
while($row = mysqli_fetch_assoc($query)) {
    $feature = array(
        
        'type' => 'Feature', 
        'properties' => array(
            'No' => $row['No'],
            'SHLK' => $row['SHLK'],
            'x' => $row['x'],
            'y' => $row['y'],
            'X1' => $row['X1'],
            'Y1' => $row['Y1'],
            'z' => $row['z'],
            'EPSG' => $row['EPSG'],
            'Province' => $row['Province'],
            'District' => $row['District'],
            'Commune' => $row['Commune'],
            'Detailed' => $row['Detailed'],
            'Aquifer' => $row['Aquifer'],
            'depth' => $row['depth'],
            'Well_screen' => $row['Well_screen'],
            'Diameter_screen' => $row['Diameter_screen'],
            'Static_water_level' => $row['Static_water_level'],
            'TDS' => $row['TDS'],
            'Year_of_well_completion' => $row['Year_of_well_completion'],
            'Well_type' => $row['Well_type'],
            'Project' => $row['Project'],
            'Log' => $row['Log'],
            'Log_scan' => $row['Log_scan'],
            'Pumping_test_scan' => $row['Pumping_test_scan'],
            'Water_quality_scan' => $row['Water_quality_scan'],
            
            
            
        ),
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($row['x'], $row['y'], $row['z'])
        )
       
        );
    # Add feature arrays to feature collection array
    array_push($geojson['features'], $feature);
}

header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
$conn = NULL;
?>