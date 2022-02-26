<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
	 header('location: http://localhost/tesst/login.php');
}
?>
<?php
include("head.php");
?>
    <body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">
    <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"></nav> -->
    <?php
    include("aside.php");
    ?>
    <div class="content-wrapper1" style="margin-left: 13%; padding-left: 21px;" > 

        <div class="content" style="padding: 0;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div class="card" style="box-shadow: none;">
                            
                            <table class="table" id="point" style="white-space: nowrap;">
                                <thead class="thead-dark" style="text-align:center; ">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">No</th>
                                    <th scope="col">SHLK</th>
                                    <th scope="col">x(WGS84)</th>
                                    <th scope="col">y(WGS84)</th>
                                    <th scope="col">x(VN2000)</th>
                                    <th scope="col">y(VN2000)</th>
                                    <th scope="col">z</th>
                                    <th scope="col">EPSG</th>
                                    <th scope="col">Province</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Commune</th>
                                    <th scope="col">Detailed</th>
                                    <th scope="col">Aquifer</th>
                                    <th scope="col">depth</th>
                                    <th scope="col">Well screen</th>
                                    <th scope="col">Diameter screen</th>
                                    <th scope="col">Static water level</th>
                                    <th scope="col">TDS</th>
                                    <th scope="col">Year of well completion</th>
                                    <th scope="col">Well type</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Log</th>
                                    <th scope="col">Log scan</th>
                                    <th scope="col">Pumping test scan</th>
                                    <th scope="col">Water quality scan</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                <script>
                                    var url = "http://localhost/tesst/controllers/c_point/read_all.php";
                                    fetch(url, {
                                        method: "GET"
                                    }).then(function(res){
                                        return res.json();
                                    }).then(function(data){
                                        var bang = document.querySelector('#point');
                                        for (i = 0; i < data.point.length; i++){
                                            var obj = data.point[i];
                                            let dong_moi = bang.insertRow(-1);

                                            let o1 = dong_moi.insertCell(0);
                                            o1.innerText = i+1;

                                            let o2 = dong_moi.insertCell(1);
                                            o2.innerText = obj.No;

                                            let o3 = dong_moi.insertCell(2);
                                            o3.innerText = obj.SHLK;

                                            let o4 = dong_moi.insertCell(3);
                                            o4.innerText = obj.x;

                                            let o5 = dong_moi.insertCell(4);
                                            o5.innerText = obj.y;

                                            let o6 = dong_moi.insertCell(5);
                                            o6.innerText = obj.X1;

                                            let o7 = dong_moi.insertCell(6);
                                            o7.innerText = obj.Y1;

                                            let o8 = dong_moi.insertCell(7);
                                            o8.innerText = obj.z;

                                            let o9 = dong_moi.insertCell(8);
                                            o9.innerText = obj.EPSG;
                                            
                                            let o10 = dong_moi.insertCell(9);
                                            o10.innerText = obj.Province;
                                            
                                            let o11 = dong_moi.insertCell(10);
                                            o11.innerText = obj.District;
                                            
                                            let o12 = dong_moi.insertCell(11);
                                            o12.innerText = obj.Commune;
                                            
                                            let o13 = dong_moi.insertCell(12);
                                            o13.innerText = obj.Detailed;
                                            
                                            let o14 = dong_moi.insertCell(13);
                                            o14.innerText = obj.Aquifer;
                                            
                                            let o15 = dong_moi.insertCell(14);
                                            o15.innerText = obj.depth;
                                            
                                            let o16 = dong_moi.insertCell(15);
                                            o16.innerText = obj.Well_screen;
                                            
                                            let o17 = dong_moi.insertCell(16);
                                            o17.innerText = obj.Diameter_screen;
                                            
                                            let o18 = dong_moi.insertCell(17);
                                            o18.innerText = obj.Static_water_level;
                                            
                                            let o19 = dong_moi.insertCell(18);
                                            o19.innerText = obj.TDS;
                                            
                                            let o20 = dong_moi.insertCell(19);
                                            o20.innerText = obj.Year_of_well_completion;
                                            
                                            let o21 = dong_moi.insertCell(20);
                                            o21.innerText = obj.Well_type;
                                            
                                            let o22 = dong_moi.insertCell(21);
                                            o22.innerText = obj.Project;
                                            
                                            let o23 = dong_moi.insertCell(22);
                                            o23.innerText = obj.Log;
                                            
                                            let o24 = dong_moi.insertCell(23);
                                            o24.innerText = obj.Log_scan;
                                            
                                            let o25 = dong_moi.insertCell(24);
                                            o25.innerText = obj.Pumping_test_scan;
                                            
                                            let o26 = dong_moi.insertCell(25);
                                            o26.innerText = obj.Water_quality_scan;

                                            let o27 = dong_moi.insertCell(26);
                                            let del = "delete_point('"+obj.No+"')";

                                            var btn_xoa = document.createElement('button');
                                            btn_xoa.setAttribute('type', 'button');
                                            btn_xoa.setAttribute('class', 'btn btn-danger');
                                            btn_xoa.innerText = "Xóa";
                                            btn_xoa.setAttribute('onclick', del)
                                            o27.appendChild(btn_xoa);

                                            let o28 = dong_moi.insertCell(27);
                                            let edit = "update_point('"+obj.No+"')"
                                            var btn_sua = document.createElement('button');
                                            btn_sua.setAttribute('type', 'button');
                                            btn_sua.setAttribute('class', 'btn btn-warning');
                                            btn_sua.setAttribute('onclick', 'location.href="http://localhost/tesst/views/v_point/update_point.php?No='+obj.No+'";');
                                            btn_sua.innerText = "Sửa";
                                            o28.appendChild(btn_sua);

                                           
                                            
                                        }
                                    });
                                </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include("footer.php");
?>