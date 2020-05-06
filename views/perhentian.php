<?php

    include 'routing.php';
    $trayek = $_GET['rute'];

    $sql1 = "SELECT nama_terminal,jadwal,latitude,longitude FROM `terminal` WHERE id_trayek = $trayek ORDER BY id_terminal";
    $sql2 = "SELECT koridor,jenis_trayek,nama_trayek,warna FROM `rute` WHERE id_trayek = $trayek";
    $result1 = mysqli_query($db, $sql1);
    $result2 = mysqli_query($db, $sql2);
    $resultCheck = mysqli_num_rows($result1);
    $result = 70*($resultCheck-1);
    $table = array();
    $count = 0;
    while ($row = $result1->fetch_assoc()) {
        $count++;
        if($count==1 || $count==$resultCheck){
            $row['r1'] = 6;
            $row['r2'] = 3;
        } else {
            $row['r1'] = 4;
            $row['r2'] = 2;
        }
        array_push($table, $row);
    }
    $trayek_result = $result2->fetch_assoc();
?>
<!-- Insert HTML code here -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/home.css">
    <title> Perhentian </title>
</head>
<body>
<div class="container">
    <div class ="search-container">
        <div class="search">
            <h1>Jakarta</h1>
                <div class="breadcrumbs">
                    <div class="breadcrumbs-pair">
                        <a class="link" href="home_page.php" style="color: rgb(115, 0, 139); cursor: pointer;">Jakarta</a>
                        <div class="icon small-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill="#999199" transform="rotate(315 8 8) translate(2.5 2.5)" d="M 0.74992 6.5C 0.335772 6.5 0 6.83577 0 7.24992C 0 7.66424 0.335772 8.00001 0.750006 7.99992L 7.25 7.99992C 7.66424 8.00001 8.00001 7.66424 7.99992 7.25L 7.99992 0.750006C 8.00001 0.335772 7.66424 0 7.24992 0C 6.83577 0 6.5 0.335772 6.5 0.74992L 6.5 6.5L 0.74992 6.5Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="breadcrumbs-pair">
                        <a class="link" href="transjakarta.php?transjakarta=1" style="color: rgb(115, 0, 139); cursor: pointer;">TransJakarta</a>
                        <div class="icon small-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill="#999199" transform="rotate(315 8 8) translate(2.5 2.5)" d="M 0.74992 6.5C 0.335772 6.5 0 6.83577 0 7.24992C 0 7.66424 0.335772 8.00001 0.750006 7.99992L 7.25 7.99992C 7.66424 8.00001 8.00001 7.66424 7.99992 7.25L 7.99992 0.750006C 8.00001 0.335772 7.66424 0 7.24992 0C 6.83577 0 6.5 0.335772 6.5 0.74992L 6.5 6.5L 0.74992 6.5Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <?php
                    echo("
                        <div class='standard-cell'>
                            <div class='image-cell'>
                                <div class='badge badge-large badge-margin-right' style='background-color: ".$trayek_result['warna']."'>
                                    <div class='badge-label'>".$trayek_result['koridor']."</div>
                                </div>
                            </div>
                            <div class='content-cell'>
                                <div class='text-cell'>
                                    <div class='title-cell'>
                                        <h3>".$trayek_result['nama_trayek']."</h3>
                                    </div>
                                    <div class='body-cell'>
                                        <div class='text'>".$trayek_result['jenis_trayek']."</div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    "
                    )
                ?>
            <div class="flex-scrollable">
                <div class="label">
                    <h2>Seluruh Perhentian</h2>
                </div>
                <?php
                    echo("
                        <div class='path-line' style='top: 74.5px; bottom: 26px;'>
                            <div class='path-line-solid' style='background-color: rgb(204, 96, 127); height:".$result."px'>
                            </div>
                        </div>"
                    )
                ?>
                <?php
                    foreach ($table as $row){
                        echo(
                            "
                            <a class='standard-cell'>
                                <div class='image-cell with-path-cell'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14'>
                                        <circle cx='7' cy='7' r='". $row['r1'] ."' fill='#D02027' stroke='#D02027'>
                                        </circle>
                                        <circle cx='7' cy='7' r='". $row['r2'] ."' fill='white'>
                                        </circle>
                                    </svg>
                                </div>
                                <div class='content-cell'>
                                    <div class='text-cell'>
                                        <div class='body-cell'>". $row['nama_terminal'] ."</div>
                                        <div class='body-cell'>
                                            <div class='text'>". $row['jadwal'] . "</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            "
                        );
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="map-big">
        <div id="map"></div>
            <script>
            var map;
            <?php
                $halteData = "let halteData = [";
                foreach($table as $row) {
                    $halteData = $halteData . "{nama_terminal:'" . $row['nama_terminal'] . "', koridor:'" . $trayek_result['koridor'] . "', warna:'" . $trayek_result['warna'] . "', lat:" . $row['latitude'] . ", lng:" . $row['longitude'] . "},";
                }
                $halteData = $halteData . "];";
                echo $halteData;
            ?>
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.1822265, lng: 106.8014449},
                zoom: 12
                });
                var tripCoordinates = [];
                var latLng;
                halteData.forEach(data => {
                    latLng = {
                        'lat':data['lat'],
                        'lng':data['lng']
                    };
                    tripCoordinates.push(latLng);
                    var pinColor = data['warna'].substring(1, data.warna.length);
                        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                            new google.maps.Size(21, 34),
                            new google.maps.Point(0,0),
                            new google.maps.Point(10, 34));
                    var marker = new google.maps.Marker({
                        position: {lat: data['lat'], lng: data['lng']},
                        map: map,
                        title: data['nama_terminal'],
                        label: data['koridor'],
                        icon: pinImage
                    });
                    
                    var tripPath = new google.maps.Polyline({
                        path: tripCoordinates,
                        geodesic: true,
                        strokeColor: data['warna'],
                        strokeOpacity: 1.0,
                        strokeWeight: 1
                    });
                    tripPath.setMap(map);
                })
                    
                
                
                
            }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpkMug-4w2hYng_XKAEP9v1nOG1Khyu-8&callback=initMap"
            async defer></script>
    </div>
</div>
</body>
</html>