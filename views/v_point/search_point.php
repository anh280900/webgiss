<?php
include("head.php");
?>
    <body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"></nav>
    <?php
    include("aside.php");
    ?>
    <div class="content-wrapper" style="background: #FFF;">
    <?php
    require_once("../../models/config.php");
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    $SHLK=$_GET['SHLK'];
    if($SHLK == ''){
        echo "<script>alert('Bạn phải nhập thông tin tìm kiếm');window.location='point.php'</script>";
    }else {
        
        $query=mysqli_query($conn,"select * from tb_point where SHLK LIKE '%$SHLK%'");
        $row=mysqli_fetch_assoc($query);
    }
    ?>
        <div class="content" style="padding: 0;">
           
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="box-shadow: none;">
                            
                            <table class="table table-bordered" id="point" style="white-space: nowrap;">
                                <thead class="thead-dark" style="text-align:center; ">
                                <tr>
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
                                    <th scope="col" style="width: 300px !important;">Project</th>
                                    <th scope="col">Log</th>
                                    <th scope="col">Log scan</th>
                                    <th scope="col">Pumping test scan</th>
                                    <th scope="col">Water quality scan</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th style="vertical-align: middle !important;"><?php echo $row['No']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['SHLK']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['x']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['y']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['X1']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Y1']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['z']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['EPSG']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Province']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['District']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Commune']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Detailed']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Aquifer']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['depth']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Well_screen']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Diameter_screen']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Static_water_level']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['TDS']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Year_of_well_completion']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Well_type']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Project']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Log']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Log_scan']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Pumping_test_scan']; ?></th>
                                        <th style="vertical-align: middle !important;"><?php echo $row['Water_quality_scan']; ?></th>
                                        <th style="vertical-align: middle !important;"><a href= "point.php"><button type="button" class="btn btn-danger" onclick="delete_point('<?php echo $row['No'] ?>')">Xoá</button></a></th>
                                        <th style="vertical-align: middle !important;"><button type="button" class="btn btn-warning" onclick="window.location.href='update_point.php?No=<?php echo $row['No'] ?>'">Sửa</button></th>
                                    </tr>
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