<?php

    include 'routing.php';
    $transjakarta = $_GET['transjakarta'];

    $sql = "SELECT id_trayek,koridor,jenis_trayek,nama_trayek,warna FROM `rute` WHERE id_kendaraan = $transjakarta ORDER BY id_trayek ASC";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    $table = array();
    while ($row = $result->fetch_assoc()) {
        array_push($table, $row);
    }
    
    $sqlTrayek = "SELECT id_trayek,koridor,nama_trayek,warna FROM `rute`";
    $resultTrayek = mysqli_query($db, $sqlTrayek);
    $tableTrayek = array();
    while ($row = $resultTrayek->fetch_assoc()) {
        array_push($tableTrayek, $row);
    }
    $tableAll = array();
    foreach($tableTrayek as $rowTrayek){
        $sqlHalte = "SELECT id_halte,durasi,latitude,longitude FROM `terminal` WHERE id_trayek=" . $rowTrayek['id_trayek'] . ";";
        $resultHalte = mysqli_query($db, $sqlHalte);
        $tableHalte = array();    
        // Masukin data ke table halte
        while ($rowHalte = $resultHalte->fetch_assoc()) {
            array_push($tableHalte, $rowHalte);
        }
        $tableAll[$rowTrayek['id_trayek']] = array("warna" => $rowTrayek['warna'],"koridor" => $rowTrayek['koridor'], "station" => $tableHalte); 
    }
    $tableString = json_encode($tableAll);
     
?>
<!-- Insert HTML code here -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/home.css">
    <title> TransJakarta </title>
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
                </div>
                <div class="standard-cell">
                    <div class="image-cell">
                        <div class="icon large-icon margin-right">
                            <img src="https://cdn.trafi.com/icon.ashx?src=transjakarta&amp;size=32&amp;cl=">
                        </div>
                    </div>
                    <div class="content-cell">
                        <div class="text-cell">
                            <div class="title-cell">
                                <h3>TransJakarta</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input">
                    <div class="input-content">
                        <span class="input-icon">
                            <div class="icon small-icon">
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#999199" transform="translate(2 2)" fill-rule="evenodd" d="M 14.0838 13.1951C 15.2786 11.7974 16 9.98291 16 8C 16 3.58173 12.4183 0 8 0C 3.58173 0 0 3.58173 0 8C 0 12.4183 3.58173 16 8 16C 9.71387 16 11.3018 15.4611 12.6037 14.5434L 17.1635 19.1032C 17.554 19.4937 18.1872 19.4937 18.5777 19.1032C 18.9682 18.7127 18.9682 18.0795 18.5777 17.689L 14.0838 13.1951ZM 8 14C 11.3137 14 14 11.3137 14 8C 14 4.68628 11.3137 2 8 2C 4.68628 2 2 4.68628 2 8C 2 11.3137 4.68628 14 8 14Z">
                                    </path>
                                </svg>
                            </div>
                        </span>
                        <input type="text" class="input-value" placeholder="Cari" value onchange="searchVehicle(this.value)">
                    </div>
                </div>
            <div class="flex-scrollable">
                <div class="label">
                    <h2>TransJakarta</h2>
                </div>
                <div id="items">
                    <?php
                        foreach ($table as $row) {
                            echo("<a class='standard-cell' href='perhentian.php?rute=".$row['id_trayek']."'>
                                <div class='image-cell'>
                                    <div class='badge badge-large badge-margin-right' style='background-color: ". $row['warna'] .";'>
                                        <div class='badge-label'>". $row['koridor'] . "</div>
                                    </div>
                                </div>
                                <div class='content-cell'>
                                    <div class='text-cell'>
                                        <div class='body-cell'>
                                            ". $row['nama_trayek'] ."
                                        </div>
                                    </div>
                                    <div class='suffix-cell'>
                                        <div class='icon small-icon'>
                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
                                                <path fill='#999199' transform='rotate(315 8 8) translate(2.5 2.5)' d='M 0.74992 6.5C 0.335772 6.5 0 6.83577 0 7.24992C 0 7.66424 0.335772 8.00001 0.750006 7.99992L 7.25 7.99992C 7.66424 8.00001 8.00001 7.66424 7.99992 7.25L 7.99992 0.750006C 8.00001 0.335772 7.66424 0 7.24992 0C 6.83577 0 6.5 0.335772 6.5 0.74992L 6.5 6.5L 0.74992 6.5Z'>
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>");
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="map-big">
        <div id="map"></div>
        <script type="text/javascript">
        var map;
        var tableAll = <?= $tableString ?>;
        
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -6.1822265, lng: 106.8014449},
            zoom: 12
            });
            Object.keys(tableAll).forEach(key => {
                let station = tableAll[key].station
                var tripCoordinates = [];
                var latLng;
                station.forEach(data => {
                    latLng = {
                        'lat':parseFloat(data['latitude']),
                        'lng':parseFloat(data['longitude'])
                    };
                    tripCoordinates.push(latLng);
                    var pinColor = tableAll[key].warna.substring(1, tableAll[key].warna.length);
                    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                        new google.maps.Size(21, 34),
                        new google.maps.Point(0,0),
                        new google.maps.Point(10, 34));
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(data['latitude']), lng: parseFloat(data['longitude'])},
                        map: map,
                        icon: pinImage
                    }) 
                    var tripPath = new google.maps.Polyline({
                        path: tripCoordinates,
                        geodesic: true,
                        strokeColor: tableAll[key].warna,
                        strokeOpacity: 1.0,
                        strokeWeight: 1
                    });
                    tripPath.setMap(map); 
                });
            });
        }

        <?php
            $initialData = "let initialData = [";
            foreach($table as $row) {
                $initialData = $initialData . "{id:" . $row['id_trayek'] . ", koridor:'" . $row['koridor'] . "', nama_trayek:'" . $row['nama_trayek'] . "', warna:'" . $row['warna'] . "'},";
            }
            $initialData = $initialData . "];";
            echo $initialData;
        ?>

        function searchVehicle(val) {
            filteredData = initialData.filter(data => data.nama_trayek.includes(val))
            let parent = document.getElementById('items');
            console.log(val);
            parent.innerHTML = ""
            filteredData.forEach(data => {
                parent.innerHTML += `
                <a class='standard-cell' href='perhentian.php?rute=${data['id']}'>
                                <div class='image-cell'>
                                    <div class='badge badge-large badge-margin-right' style='background-color: ${data['warna']};'>
                                        <div class='badge-label'>${data['koridor']}</div>
                                    </div>
                                </div>
                                <div class='content-cell'>
                                    <div class='text-cell'>
                                        <div class='body-cell'>
                                            ${data['nama_trayek']}
                                        </div>
                                    </div>
                                    <div class='suffix-cell'>
                                        <div class='icon small-icon'>
                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
                                                <path fill='#999199' transform='rotate(315 8 8) translate(2.5 2.5)' d='M 0.74992 6.5C 0.335772 6.5 0 6.83577 0 7.24992C 0 7.66424 0.335772 8.00001 0.750006 7.99992L 7.25 7.99992C 7.66424 8.00001 8.00001 7.66424 7.99992 7.25L 7.99992 0.750006C 8.00001 0.335772 7.66424 0 7.24992 0C 6.83577 0 6.5 0.335772 6.5 0.74992L 6.5 6.5L 0.74992 6.5Z'>
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                `
            })  
        }


        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpkMug-4w2hYng_XKAEP9v1nOG1Khyu-8&callback=initMap"
        async defer></script>
    </div>
</div>
</body>
</html>