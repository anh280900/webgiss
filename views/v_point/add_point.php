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
    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"  style="font-size: 2.1rem; margin-left: 560px;">ADD POINT TO MAPS</h3>
            </div>
            <form method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputProvince">No</label>
                        <input type="text" class="form-control" id="No" name="No" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">SHLK </label>
                        <input type="text" class="form-control" id="SHLK" name="SHLK" autofocus="true" autocomplete="on" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputProvince"> x(WGS84) </label>
                        <input type="text" class="form-control" id="x" name="x" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> y(WGS84) </label>
                        <input type="text" class="form-control" id="y" name="y" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">x(VN2000) </label>
                        <input type="text" class="form-control" id="X1" name="X1" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">y(VN2000) </label>
                        <input type="text" class="form-control" id="Y1" name="Y1" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> z </label>
                        <input type="text" class="form-control" id="z" name="z" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> EPSG </label>
                        <input type="text" class="form-control" id="EPSG" name="EPSG" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Province </label>
                        <input type="text" class="form-control" id="Province" name="Province" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> District </label>
                        <input type="text" class="form-control" id="District" name="District" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Commune </label>
                        <input type="text" class="form-control" id="Commune" name="Commune" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Detailed </label>
                        <input type="text" class="form-control" id="Detailed" name="Detailed" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Aquifer </label>
                        <input type="text" class="form-control" id="Aquifer" name="Aquifer" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">Depth </label>
                        <input type="text" class="form-control" id="depth" name="depth" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">Well screen </label>
                        <input type="text" class="form-control" id="Well_screen" name="Well_screen" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Diameter screen </label>
                        <input type="text" class="form-control" id="Diameter_screen" name="Diameter_screen" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Static water level </label>
                        <input type="text" class="form-control" id="Static_water_level" name="Static_water_level" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">TDS  </label>
                        <input type="text" class="form-control" id="TDS" name="TDS" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">  Year of well completion</label>
                        <input type="text" class="form-control" id="Year_of_well_completion" name="Year_of_well_completion" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Well type </label>
                        <input type="text" class="form-control" id="Well_type" name="Well_type" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Project </label>
                        <input type="text" class="form-control" id="Project" name="Project" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Log </label>
                        <input type="text" class="form-control" id="Log" name="Log" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Log scan </label>
                        <input type="text" class="form-control" id="Log_scan" name="Log_scan" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince">Pumping test scan </label>
                        <input type="text" class="form-control" id="Pumping_test_scan" name="Pumping_test_scan" autofocus="true" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProvince"> Water quality scan </label>
                        <input type="text" class="form-control" id="Water_quality_scan" name="Water_quality_scan" autofocus="true" autocomplete="on" required>
                    </div>
                    
                    <div>
                        <button class="btn btn-primary" name="btnSave" onclick="add_point()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
