function add_point(){
    const a_No =document.getElementById('No').value;
    const a_SHLK =document.getElementById('SHLK').value;
    const a_x =document.getElementById('x').value;
    const a_y =document.getElementById('y').value;
    const a_X1 =document.getElementById('X1').value;
    const a_Y1 =document.getElementById('Y1').value;
    const a_z =document.getElementById('z').value;
    const a_EPSG =document.getElementById('EPSG').value;
    const a_Province =document.getElementById('Province').value;
    const a_District =document.getElementById('District').value;
    const a_Commune =document.getElementById('Commune').value;
    const a_Detailed =document.getElementById('Detailed').value;
    const a_Aquifer =document.getElementById('Aquifer').value;
    const a_depth =document.getElementById('depth').value;
    const a_Well_screen =document.getElementById('Well_screen').value;
    const a_Diameter_screen =document.getElementById('Diameter_screen').value;
    const a_Static_water_level =document.getElementById('Static_water_level').value;
    const a_TDS =document.getElementById('TDS').value;
    const a_Year_of_well_completion =document.getElementById('Year_of_well_completion').value;
    const a_Well_type =document.getElementById('Well_type').value;
    const a_Project =document.getElementById('Project').value;
    const a_Log =document.getElementById('Log').value;
    const a_Log_scan =document.getElementById('Log_scan').value;
    const a_Pumping_test_scan =document.getElementById('Pumping_test_scan').value;
    const a_Water_quality_scan =document.getElementById('Water_quality_scan').value;
    
   
    const url_add = 'http://localhost/tesst/controllers/c_point/add_point.php';
    var data = {
        No : a_No,
        SHLK : a_SHLK,
        x : a_x,
        y : a_y,
        X1 : a_X1,
        Y1 : a_Y1,
        z : a_z,
        EPSG : a_EPSG,
        Province : a_Province,
        District : a_District,
        Commune : a_Commune,
        Detailed : a_Detailed,
        Aquifer : a_Aquifer,
        depth : a_depth,
        Well_screen : a_Well_screen,
        Diameter_screen : a_Diameter_screen,
        Static_water_level: a_Static_water_level,
        TDS : a_TDS,
        Year_of_well_completion : a_Year_of_well_completion,
        Well_type : a_Well_type,
        Project : a_Project,
        Log: a_Log,
        Log_scan : a_Log_scan,
        Pumping_test_scan : a_Pumping_test_scan,
        Water_quality_scan : a_Water_quality_scan
        
        
    }
    var option = {
        method: 'POST',
        body: JSON.stringify(data)
    }
    fetch(url_add, option).then(function(res) {
        return res.json(); // chuyển chuỗi nhận được thành đối tượng json
    });
}

function update_point(id) {
    const a_No =document.getElementById('No').value;
    const a_SHLK =document.getElementById('SHLK').value;
    const a_x =document.getElementById('x').value;
    const a_y =document.getElementById('y').value;
    const a_X1 =document.getElementById('X1').value;
    const a_Y1 =document.getElementById('Y1').value;
    const a_z =document.getElementById('z').value;
    const a_EPSG =document.getElementById('EPSG').value;
    const a_Province =document.getElementById('Province').value;
    const a_District =document.getElementById('District').value;
    const a_Commune =document.getElementById('Commune').value;
    const a_Detailed =document.getElementById('Detailed').value;
    const a_Aquifer =document.getElementById('Aquifer').value;
    const a_depth =document.getElementById('depth').value;
    const a_Well_screen =document.getElementById('Well_screen').value;
    const a_Diameter_screen =document.getElementById('Diameter_screen').value;
    const a_Static_water_level =document.getElementById('Static_water_level').value;
    const a_TDS =document.getElementById('TDS').value;
    const a_Year_of_well_completion =document.getElementById('Year_of_well_completion').value;
    const a_Well_type =document.getElementById('Well_type').value;
    const a_Project =document.getElementById('Project').value;
    const a_Log =document.getElementById('Log').value;
    const a_Log_scan =document.getElementById('Log_scan').value;
    const a_Pumping_test_scan =document.getElementById('Pumping_test_scan').value;
    const a_Water_quality_scan =document.getElementById('Water_quality_scan').value;
    const url_add = 'http://localhost/tesst/controllers/c_point/update_point.php';
    var data = {
        No : a_No,
        SHLK : a_SHLK,
        x : a_x,
        y : a_y,
        X1 : a_X1,
        Y1 : a_Y1,
        z : a_z,
        EPSG : a_EPSG,
        Province : a_Province,
        District : a_District,
        Commune : a_Commune,
        Detailed : a_Detailed,
        Aquifer : a_Aquifer,
        depth : a_depth,
        Well_screen : a_Well_screen,
        Diameter_screen : a_Diameter_screen,
        Static_water_level: a_Static_water_level,
        TDS : a_TDS,
        Year_of_well_completion : a_Year_of_well_completion,
        Well_type : a_Well_type,
        Project : a_Project,
        Log: a_Log,
        Log_scan : a_Log_scan,
        Pumping_test_scan : a_Pumping_test_scan,
        Water_quality_scan : a_Water_quality_scan

    }
    var option = {
        method: 'PUT',
        body: JSON.stringify(data)
    }
    fetch(url_add, option).then(function (res) {
        return res.json(); // chuyển chuỗi nhận được thành đối tượng json
    });
}

function search_point(id) {
    const a_No =document.getElementById('No').value;
    const a_SHLK =document.getElementById('SHLK').value;
    const a_x =document.getElementById('x').value;
    const a_y =document.getElementById('y').value;
    const a_X1 =document.getElementById('X1').value;
    const a_Y1 =document.getElementById('Y1').value;
    const a_z =document.getElementById('z').value;
    const a_EPSG =document.getElementById('EPSG').value;
    const a_Province =document.getElementById('Province').value;
    const a_District =document.getElementById('District').value;
    const a_Commune =document.getElementById('Commune').value;
    const a_Detailed =document.getElementById('Detailed').value;
    const a_Aquifer =document.getElementById('Aquifer').value;
    const a_depth =document.getElementById('depth').value;
    const a_Well_screen =document.getElementById('Well_screen').value;
    const a_Diameter_screen =document.getElementById('Diameter_screen').value;
    const a_Static_water_level =document.getElementById('Static_water_level').value;
    const a_TDS =document.getElementById('TDS').value;
    const a_Year_of_well_completion =document.getElementById('Year_of_well_completion').value;
    const a_Well_type =document.getElementById('Well_type').value;
    const a_Project =document.getElementById('Project').value;
    const a_Log =document.getElementById('Log').value;
    const a_Log_scan =document.getElementById('Log_scan').value;
    const a_Pumping_test_scan =document.getElementById('Pumping_test_scan').value;
    const a_Water_quality_scan =document.getElementById('Water_quality_scan').value;
    const url_add = 'http://localhost/tesst/controllers/c_point/search_point.php';
    var data = {
        No : a_No,
        SHLK : a_SHLK,
        x : a_x,
        y : a_y,
        X1 : a_X1,
        Y1 : a_Y1,
        z : a_z,
        EPSG : a_EPSG,
        Province : a_Province,
        District : a_District,
        Commune : a_Commune,
        Detailed : a_Detailed,
        Aquifer : a_Aquifer,
        depth : a_depth,
        Well_screen : a_Well_screen,
        Diameter_screen : a_Diameter_screen,
        Static_water_level: a_Static_water_level,
        TDS : a_TDS,
        Year_of_well_completion : a_Year_of_well_completion,
        Well_type : a_Well_type,
        Project : a_Project,
        Log: a_Log,
        Log_scan : a_Log_scan,
        Pumping_test_scan : a_Pumping_test_scan,
        Water_quality_scan : a_Water_quality_scan

    }
    var option = {
        method: 'PUT',
        body: JSON.stringify(data)
    }
    fetch(url_add, option).then(function (res) {
        return res.json(); // chuyển chuỗi nhận được thành đối tượng json
    });
}


function delete_point(No){
    const url_delete = 'http://localhost/tesst/controllers/c_point/delete_point.php?No='+No;
    fetch(url_delete).then(function(res) {
        return res.json(); // chuyển chuỗi nhận được thành đối tượng json
    }).then(function(data) {
        location.reload();
    });
}
