<?php
include("head.php");
?>
    <body class="hold-transition sidebar-mini layout-fixed">
<?php
if (isset($_POST['btnSave'])){
    header('Location: point.php');
}
?>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
    </nav>
    <?php
    include("aside.php");
    ?>
    <?php
    require_once("../../models/config.php");
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    $No=$_GET['No'];
    $query=mysqli_query($conn,"select * from tb_point where No ='$No'");
    $row=mysqli_fetch_assoc($query);
    ?>

    <div class="content-wrapper">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 2.1rem; margin-left: 560px;">UPDATE POINT</h3>
            </div>
            <form method="post" action="update_point.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputProvince">No: <?php echo $row['No']; ?></label>
                        <input type="text" class="form-control" id="No" value="<?php echo $row['No']; ?>" style="display: none;" name="No" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="SHLK" name="SHLK" value="<?php echo $row['SHLK']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="x" name="x" value="<?php echo $row['x']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="y" name="y" value="<?php echo $row['y']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="X1" name="X1" value="<?php echo $row['X1']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Y1" name="Y1" value="<?php echo $row['Y1']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="z" name="z" value="<?php echo $row['z']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="EPSG" name="EPSG" value="<?php echo $row['EPSG']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Province" name="Province" value="<?php echo $row['Province']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="District" name="District" value="<?php echo $row['District']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Commune" name="Commune" value="<?php echo $row['Commune']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Detailed" name="Detailed" value="<?php echo $row['Detailed']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Aquifer" name="Aquifer" value="<?php echo $row['Aquifer']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="depth" name="depth" value="<?php echo $row['depth']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Well_screen" name="Well_screen" value="<?php echo $row['Well_screen']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Diameter_screen" name="Diameter_screen" value="<?php echo $row['Diameter_screen']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Static_water_level" name="Static_water_level" value="<?php echo $row['Static_water_level']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="TDS" name="TDS" autofocus="true" value="<?php echo $row['TDS']; ?>" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Year_of_well_completion" name="Year_of_well_completion" value="<?php echo $row['Year_of_well_completion']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Well_type" name="Well_type" value="<?php echo $row['Well_type']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Project" name="Project" value="<?php echo $row['Project']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Log" name="Log" value="<?php echo $row['Log']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Log_scan" name="Log_scan" value="<?php echo $row['Log_scan']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Pumping_test_scan" name="Pumping_test_scan" value="<?php echo $row['Pumping_test_scan']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> </label>
                        <input type="text" class="form-control" id="Water_quality_scan" name="Water_quality_scan" value="<?php echo $row['Water_quality_scan']; ?>" autofocus="true" autocomplete="on" required>
                    </div>
                    <div>
                        <button class="btn btn-warning" name="btnSave" onclick="update_point()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
include("footer.php");
?>