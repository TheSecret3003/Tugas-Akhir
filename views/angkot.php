<?php

// if (isset($_COOKIE['access_token'])) {
//     include 'include/dbh.inc.php';

//     $searchbook = mysqli_real_escape_string($conn, $_POST['searchbook']);

//     //Error Handlers
//     // Check if inputs are empty
//     if (empty($searchbook)) {
//         # code...
//         header("Location: search_book.php?searchbook=". $searchbook);
//         exit();
//     } else {
//         $sql = "SELECT book.name as name, book.ID as ID, book.author as author, book.description as description, AVG(review.rating) as rating, COUNT(review.ID) as reviewer, book.image as image FROM book LEFT OUTER JOIN review ON book.ID = review.book_id WHERE book.name LIKE \"%". $searchbook ."%\" GROUP BY book.ID";
//         $result = mysqli_query($conn, $sql);
//         $resultCheck = mysqli_num_rows($result);
//         $table = array();
//         while ($row = $result->fetch_assoc()) {
//             array_push($table, $row);
//         }
//     }
// } else {
//     header("Location: login.php?sign-in-first-dude");
//     exit();
// }
?>
<!-- Insert HTML code here -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/home.css">
    <title> Angkot </title>
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
                            <img src="https://cdn.trafi.com/icon.ashx?src=angkot&amp;size=32&amp;cl=">
                        </div>
                    </div>
                    <div class="content-cell">
                        <div class="text-cell">
                           <h3>Angkot</h3>
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
                        <input type="text" class="input-value" placeholder="Cari" value>
                    </div>
                </div>
            <div class="transportation-choice">
                <div class="label">
                    <h2>Angkot</h2>
                </div>
                <div class="flex-scrollable">
                    <div class="transportation-types">
                        <a class="type">
                            <div class="card" style="background-color: rgb(34, 58, 120);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=transjakarta&amp;size=48&amp;cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">TransJakarta</div>
                            </div>
                        </a>
                        <a class="type">
                            <div class="card" style="background-color: rgb(42, 104, 37);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=bus&size=48&cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">Bus</div>
                            </div>
                        </a>
                        <a class="type">
                            <div class="card" style="background-color: rgb(255, 107, 79);">
                                <div class="card-icon">
                                    <div class="c-icon">
                                        <img src="https://cdn.trafi.com/icon.ashx?src=minibus&size=48&cl=ffffff">
                                    </div>
                                </div>
                                <div class="card-label">BusSedang</div>
                            </div>
                        </a>
                        <a class="type">
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
        <div class="map-pigeon">
            <div style="width: 100%; height: 100%; position: relative; display: inline-block; overflow: hidden; background: rgb(221, 221, 221); touch-action: none;">
                <div class style="width: 433.891px; height: 625px; position: absolute; top: 0px; left: 0px; overflow: hidden; will-change: transform; transform: scale(1, 1); transform-origin: left top;">
                    <div style="position: absolute; width: 512px; height: 768px; will-change: transform; transform: translate(-40.775px, -117.643px);">
                        <img src="https://a-tiles.locationiq.com/v2/obk/r/12/3262/2117@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://a-tiles.locationiq.com/v2/obk/r/12/3262/2117.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://a-tiles.locationiq.com/v2/obk/r/12/3262/2117@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 0px; top: 0px; will-change: transform; transform-origin: left top; opacity: 1;">
                        <img src="https://b-tiles.locationiq.com/v2/obk/r/12/3262/2118@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://b-tiles.locationiq.com/v2/obk/r/12/3262/2118.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://b-tiles.locationiq.com/v2/obk/r/12/3262/2118@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 0px; top: 256px; will-change: transform; transform-origin: left top; opacity: 1;">
                        <img src="https://c-tiles.locationiq.com/v2/obk/r/12/3262/2119@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://c-tiles.locationiq.com/v2/obk/r/12/3262/2119.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://c-tiles.locationiq.com/v2/obk/r/12/3262/2119@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 0px; top: 512px; will-change: transform; transform-origin: left top; opacity: 1;">
                        <img src="https://b-tiles.locationiq.com/v2/obk/r/12/3263/2117@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://b-tiles.locationiq.com/v2/obk/r/12/3263/2117.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://b-tiles.locationiq.com/v2/obk/r/12/3263/2117@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 256px; top: 0px; will-change: transform; transform-origin: left top; opacity: 1;">
                        <img src="https://c-tiles.locationiq.com/v2/obk/r/12/3263/2118@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://c-tiles.locationiq.com/v2/obk/r/12/3263/2118.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://c-tiles.locationiq.com/v2/obk/r/12/3263/2118@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 256px; top: 256px; will-change: transform; transform-origin: left top; opacity: 1;">
                        <img src="https://a-tiles.locationiq.com/v2/obk/r/12/3263/2119@undefinedx.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69" srcset="https://a-tiles.locationiq.com/v2/obk/r/12/3263/2119.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69, https://a-tiles.locationiq.com/v2/obk/r/12/3263/2119@2x.png?key=pk.ef8d929ba500fdc3ada9635b11a64b69 2x" width="256" height="256" style="position: absolute; left: 256px; top: 512px; will-change: transform; transform-origin: left top; opacity: 1;">
                    </div>
                </div>
                <div style="position: absolute; width: 433.891px; height: 625px; top: 0px; left: 0px;">
                    <canvas class="map__overlay" width="433" height="625" style="position: absolute; left: 9.68575e-08px; top: 3.01516e-08px; width: 433.891px; height: 625px;">
                    </canvas>
                </div>
            </div>
            <div class="map-controls">
                <div class="map-control-group">
                    <button type="button" class="map-control">
                        <div class="icon large-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g transform="translate(-16944 -1553)">
                                    <path transform="translate(16946 1555)" fill="#665F66" fill-rule="evenodd" d="M 10 0C 9.44727 0 9 0.447754 9 1L 9 1.05493C 4.82812 1.51611 1.51562 4.82837 1.05469 9L 1 9C 0.447266 9 0 9.44775 0 10C 0 10.5522 0.447266 11 1 11L 1.05469 11C 1.51562 15.1716 4.82812 18.4839 9 18.9451L 9 19C 9 19.5522 9.44727 20 10 20C 10.5527 20 11 19.5522 11 19L 11 18.9451C 15.1719 18.4839 18.4844 15.1716 18.9453 11L 19 11C 19.5527 11 20 10.5522 20 10C 20 9.44775 19.5527 9 19 9L 18.9453 9C 18.4844 4.82837 15.1719 1.51611 11 1.05493L 11 1C 11 0.447754 10.5527 0 10 0ZM 4 10C 4 10.5306 3.59375 10.9611 3.07031 10.9941C 3.50586 14.0624 5.93359 16.4899 9 16.929C 9.03906 16.4126 9.47266 16 10 16C 10.5273 16 10.9609 16.4126 11 16.929C 14.0664 16.4899 16.4941 14.0624 16.9297 10.9941C 16.4062 10.9611 16 10.5306 16 10C 16 9.47363 16.4121 9.03857 16.9297 8.99927C 16.4902 5.93188 14.0664 3.50037 10.998 3.06421C 10.9648 3.58655 10.5312 4 10 4C 9.47266 4 9.04102 3.59326 9.00195 3.0769C 5.93555 3.51599 3.50781 5.93872 3.07031 9.0061C 3.59375 9.03918 4 9.46936 4 10ZM 13 10C 13 11.6569 11.6562 13 10 13C 8.34375 13 7 11.6569 7 10C 7 8.34314 8.34375 7 10 7C 11.6562 7 13 8.34314 13 10Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </button>
                </div>
                <div class="map-control-group">
                    <button type="button" class="map-control map-zoom-in">
                        <div class="icon large-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 9">
                                <rect x="2" y="4" width="5" height="1" fill="#665F66">
                                </rect>
                                <rect x="4" y="2" width="1" height="5" fill="#665F66"> 
                                </rect>
                            </svg>
                        </div>
                    </button>
                    <button type="button" class="map-control map-zoom-out">
                        <div class="icon large-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 9">
                                <rect x="2" y="4" width="5" height="1" fill="#665F66">
                                </rect>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>