<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dữ liệu lỗ khoan</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- markercluster  -->
    <link rel="stylesheet" href="./dist/MarkerCluster.css" />
    <link rel="stylesheet" href="./dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="./lib/css/main.css">

    
    <style>
        body {
          font-family: Arial;
        }
        
        * {
          box-sizing: border-box;
        }
        
        form.example input[type=text] {
          padding: 10px;
          font-size: 17px;
          border: 1px solid grey;
          float: left;
          width: 80%;
          background: #f1f1f1;
        }
        
        form.example button {
          float: left;
          width: 20%;
          padding: 10px;
          background: #2196F3;
          color: white;
          font-size: 17px;
          border: 1px solid grey;
          border-left: none;
          cursor: pointer;
        }
        
        form.example button:hover {
          background: #0b7dda;
        }
        
        form.example::after {
          content: "";
          clear: both;
          display: table;
        }
        </style>
</head>

<body>

    <div class="main">
        <header class="header" style=" position: fixed;
        top: 0;
        left: 0;
        width: 100%; z-index: 99999;">
            <div class="header-logo__box">
                <a href="http://www.nawapi.gov.vn/" class="header-logo__link" target="_bank">
                    <img src="./lib/img/logo1.png" alt="" class="header-logo__img">
                </a>
                <a href="https://www.hunre.edu.vn/" class="header-logo__link" target="_bank">
                    <img src="./lib/img/logo-hunre.png" alt="" class="header-logo__img">
                </a>
            </div>

            <div class="header-nav">
                <a href="https://monre.gov.vn/" target="_bank" class="no-bg">MINISTRY OF NATURAL RESOURCES AND
                    ENVIRONMENT</a>

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                       <a href="index.php" style="text-decoration: none"> <button class="nav-link header-nav__link " id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Home</button></a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link header-nav__link active " id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" href="#pills-profile" aria-controls="pills-profile"
                            aria-selected="false">Data</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link header-nav__link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-acknowledgements" type="button" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Acknowledgements</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link header-nav__link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Contact Us</button>
                    </li>
                </ul>

            </div>
        </header>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="map"></div>
        </div>

        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form class="example" action="data.php" method="GET" style="margin: auto; margin-top:7%;max-width:500px; ">
                <input type="text" placeholder="Search to SHLK" name="SHLK">
                <button type="submit" name= "btn_search" value="search_point"><i class="fa fa-search"></i></button>
            </form>
            <div class="wrapper">
                <div class="content-wrapper1" style="margin-top: 1%;">

                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card1">
                                    <?php
                                        require_once("models/config.php");
                                        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("không thể kết nối tới database");
                                        mysqli_query($conn,"SET NAMES 'UTF8'");
                                        if (!empty($_GET['btn_search'])){
                                            $SHLK = $_GET['SHLK'];
                                            $query=mysqli_query($conn,"select * from tb_point where SHLK LIKE '%$SHLK%'");
                                            $row=mysqli_fetch_assoc($query);
                                        
                                    ?>
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
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php 
                                        }else { 
                                    ?>
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
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="tab-pane fade" id="pills-acknowledgements" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="acknowledgements" style="padding: 154px 40px; font-size: 18px">
                <h1 font: inherit;>
                    Lý do thực hiện
                </h1>

                <p>
                    Tài nguyên nước là nền tảng cơ bản để phát triển kinh tế-xã hội,
                    mọi hoạt động phát triển kinh tế - xã hội phải dựa trên khả năng thực tế của nguồn nước,
                    phù hợp với các xu thế diễn biến nguồn nước trong tương lai. Vì vậy, giải quyết vấn về tài nguyên
                    nước,
                    bảo đảm khai thác, sử dụng là cần thiết để đáp ứng các yêu cầu phát triển kinh tế, xã hội bền vững
                    vùng
                    Đồng bằng sông Cửu Long trong bối cảnh nêu trên, điều này đòi hỏi phải có cách nhìn nhận mới về cách
                    thức
                    quản lý, sử dụng nguồn nước. Hiện nay việc khoan khảo sát nguồn nước đang rất được quan tâm,
                    đặc biệt là khu vực Đồng bằng sông Cửu Long. Phát triển một hệ thống thông
                    tin quản lý dữ liệu là rất cần thiết. Chính vì thế em áp dụng những kiến thức
                    đã được học để phát triển một ứng dụng Webgis phục vụ công tác quản lý dữ liệu các
                    mũi khoan nước của khu vực Đồng bằng sông Cửu Long.
                </p>
                <br>
                <h1>
                    Mục tiêu
                </h1>

                <p>
                    Dự án sẽ góp phần:
                    <br>
                    - Thu hẹp khoảng cách thông tin giữa người nghiên cứu và người sử dụng thông tin.
                    <br>
                    - Hỗ trợ chính phủ và các nhà quản lý trong nỗ lực tìm kiếm nguồn nước mới giúp ứng phó lại nạn hạn
                    hán ngày càng gia tăng trong những năm gần đây.
                    <br>
                    - Tạo ra một hệ thống cung cấp thông tin chính xác cho những nhà nghiên cứu trẻ, những người muốn
                    tìm hiểu về các thông tin liên quan.
                    <br>
                    - Thúc đẩy tiềm năng cho các dịch vụ phụ thuộc vào nguồn nước.

                </p>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h2>Contact</h2>
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact
            <br>Contact<br>
            Contact
        </div>
    </div>



    <footer class="footer" style="width: 100%;
    position: fixed;
    left: 0;
    bottom: 0;">

        <li style="color: #fff;">© Co-developed by <a style="color: aqua;" href="#"
                onclick="window.open('https://www.facebook.com/adcc.toppp/')"> NGUYEN DUC ANH</a> with
            Assistance from <a style="color: aqua;" href="#" onclick="window.open('http://www.saswe.net')">NAWAPI</a>
            and <a style="color: aqua;" href="#"
                onclick="window.open('http://students.washington.edu/nbiswas')">HUNRE</a> <br>
        </li>

        <li style="color: #fff;">Governing Agency <a style="color: aqua;" href="#"
                onclick="window.open('https://monre.gov.vn/')"> MINISTRY OF RESOURCES AND ENVIRONMENT</a>
        </li>




        </a>
    </footer>
</body>

</html>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script src="./data/city.js"></script>
<script src="./data/area.js"></script>
<script src="./data/point.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

<!-- markercluster  -->
<script src="./dist/leaflet.markercluster.js"></script>
<script>
    var map = L.map('map').setView([10.241493, 105.732860], 8);


    // Layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
    });
    osm.addTo(map);


    // Tile layer
    var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: '',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    Stamen_Watercolor.addTo(map);


    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: ''
    });
    Esri_WorldImagery.addTo(map);

    // GGmap street layer
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);

    // GGmap Satellite layer
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleSat.addTo(map);


    // GeoJSON

    const geojsonMarkerOptions = {
        radius: 8,
        fillColor: "#ff7800",
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8,
    };


    // loading geojson

    var pointdata = L.geoJSON(pointJSON, {
        onEachFeature: function (feature, layer) {
            const popupContent =
                '<b><center/>THÔNG TIN LỖ KHOAN TÀI NGUYÊN NƯỚC</b>' +
                '<div class="container"><table class="table">' +
                "<thead><tr><th><center/>Attribute</th><th><center/>Value</th></tr></thead>" +
                "<tbody><tr><td> Project: </td><td>" +
                feature.properties.Project +
                "</td></tr>" +
                "<tr><td> Location: </td><td>" +
                feature.properties.Commune + ', ' + feature.properties.District + ', ' + feature.properties.Province + ', Việt Nam' +
                "</td></tr>" +
                "<tr><td>Serial: </td><td>" +
                feature.properties.SHLK +
                "</td></tr>" +
                "<tr><td> X, Y, Z: </td><td>" +
                feature.properties.x + ', ' + feature.properties.y + ', ' + feature.properties.z +
                "</td></tr>" +

                "<tr><td> Type: </td><td>" +
                feature.properties.Well_type +
                "</td></tr>" +

                "<tr><td> Detail: </td><td>" +
                "<a href='https://www.facebook.com/'target='_bank'>Click here</a>" +
                "</td></tr>";
            layer.bindPopup(popupContent);
        },
        pointToLayer: function (feature, latlng) {
            return L.circleMarker(latlng, geojsonMarkerOptions);
        },
    }).addTo(map);


    var citydata = L.geoJSON(cityJSON, {
        style: {
            color: 'orange'

        }
    }).addTo(map);
    var areadata = L.geoJSON(areaJSON).addTo(map);

    // Control layer
    var baseLayers = {
        "OpenStreetMap": osm,
        "Water": Stamen_Watercolor,
        "Google map": googleStreets,
        "Satellite": googleSat,
    };

    var overlays = {

        "Point": pointdata,
        "City": citydata,
        "Area": areadata,



    };




    L.control.layers(baseLayers, overlays).addTo(map);

    L.Control.geocoder().addTo(map);


</script>