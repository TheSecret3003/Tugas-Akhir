<?php
    include 'routing.php';
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
    <title>Jakarta Public Transportation </title>
</head>
<body>
<div class="container">
    <div class ="search-container">
        <div class="search">
            <h1>Jakarta</h1>
            <div class="input-container">
                <div class="input">
                    <div class="input-content">
                        <span class="input-icon">
                            <div class="input-placeholder">
                                <div class="icon">
                                    <img src="https://www.trafi.com/dist/spa/style/f-e6160f.svg">
                                </div>
                                <div class="text-body" style="color: rgb(102, 95, 102);">Dari</div>
                            </div>
                        </span>
                        <input type="text" class="input-value" placeholder="Tentukan lokasi Anda" value onchange="getLocation(this.value)">
                    </div>
                </div>
                <div class="input">
                    <div class="input-content">
                        <span class="input-icon">
                            <div class="input-placeholder">
                                <div class="icon small-icon">
                                    <img src="https://www.trafi.com/dist/spa/style/f-e6160f.svg">
                                </div>
                                <div class="text-body" style="color: rgb(102, 95, 102);">Ke</div>
                            </div>
                        </span>
                        <input type="text" class="input-value" placeholder="Tentukan tujuan Anda" value onchange="getLocation(this.value)"/>
                    </div>
                </div>
            </div>
            <div class="transportation-choice">
                <div class="label">
                    <h2>Transportasi</h2>
                </div>
                <div class="flex-scrollable">
                    <div class="transportation-types">
                        <a class="type" href="transjakarta.php?transjakarta=1">
                            <div class="card" style="background-color: rgb(34, 58, 120);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=transjakarta&amp;size=48&amp;cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">TransJakarta</div>
                            </div>
                        </a>
                        <a class="type" href="bus.php">
                            <div class="card" style="background-color: rgb(42, 104, 37);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=bus&size=48&cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">Bus</div>
                            </div>
                        </a>
                        <a class="type" href="bus_sedang.php">
                            <div class="card" style="background-color: rgb(255, 107, 79);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=minibus&size=48&cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">Bus Sedang</div>
                            </div>
                        </a>
                        <a class="type" href="angkot.php">
                            <div class="card" style="background-color: rgb(114, 198, 222);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=angkot&size=48&cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">Angkot</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-big">        
        <div id="map"></div>
            <script>
            var map;
            var tableAll = <?= $tableString ?>;

            function getLocation(val){
                val = val.replace(/ /g,"+");
                var url = `https://maps.googleapis.com/maps/api/geocode/json?address=${val},+CA&key=AIzaSyBpkMug-4w2hYng_XKAEP9v1nOG1Khyu-8`;
                
                fetch(url)
                    .then((resp) => resp.json())
                    .then(data => {
                        console.log("Response", data);
                        var pinColor = '5c359d';
                        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                            new google.maps.Size(50, 50),
                            new google.maps.Point(0,0),
                            new google.maps.Point(10, 34));
                        var marker = new google.maps.Marker({
                            position: {lat: data.results[0].geometry.location['lat'], lng: data.results[0].geometry.location['lng']},
                            map: map,
                            icon: pinImage
                        });
                    })
            }
            
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.1822265, lng: 106.8014449},
                zoom: 12
                });
            }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpkMug-4w2hYng_XKAEP9v1nOG1Khyu-8&callback=initMap"
            async defer></script>
    </div>
</div>

</body>
</html>