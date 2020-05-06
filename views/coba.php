<?php
    include 'routing.php';
    function distance($lat1, $lon1, $lat2, $lon2) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
      
          return ($miles * 1.609344);
         
        }
    }
    $sql1= "SELECT latitude,longitude FROM `terminal` WHERE id_halte = 68";
    $result1 = mysqli_query($db, $sql1);
    $origin = $result1->fetch_assoc();

    $sqlHalte= "SELECT id_halte,nama_terminal,durasi,latitude, longitude FROM `terminal`";
    $resultHalte = mysqli_query($db, $sqlHalte);
    $tableHalte = array();
    while ($rowHalte = $resultHalte->fetch_assoc()) {
        array_push($tableHalte, $rowHalte);
    }
    function searchNearestHalte($location) {
        $halteOrigin = array("id_halte"=>$GLOBALS['tableHalte']['0']['id_halte'],"nama_terminal"=>$GLOBALS['tableHalte']['0']['nama_terminal'],
        "durasi"=>$GLOBALS['tableHalte']['0']['durasi'],"latitude"=>$GLOBALS['tableHalte']['0']['latitude'],
        "longitude"=>$GLOBALS['tableHalte']['0']['longitude'],
        "distance"=>distance($location['latitude'], $location['longitude'], $GLOBALS['tableHalte']['0']['latitude'], $GLOBALS['tableHalte']['0']['latitude']));
        foreach($GLOBALS['tableHalte'] as $rowHalte){
            $dist = distance($location['latitude'], $location['longitude'], $rowHalte['latitude'], $rowHalte['longitude']);
            if($dist < $halteOrigin["distance"]){
                $halteOrigin["distance"] = $dist;
                $halteOrigin["id_halte"] = $rowHalte["id_halte"];
                $halteOrigin["nama_terminal"] = $rowHalte["nama_terminal"];
                $halteOrigin["durasi"] = $rowHalte["durasi"];
                $halteOrigin["latitude"] = $rowHalte["latitude"];
                $halteOrigin["longitude"] = $rowHalte["longitude"];
            } 
        }
        return $halteOrigin;
    }
    var_dump(searchNearestHalte($origin));
    // var_dump($result1);
    // var_dump($result2);
    //echo distance($result1['latitude'], $result1['longitude'], $result2['latitude'], $result2['longitude']);
?>

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
                                    <img src="download.png" width="16" height="16">
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
                                    <img src="download.png" width="16" height="16">
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