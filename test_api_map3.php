<?php include('SQL_link.php'); ?>
<?php $resultAddress = $linkSQL->query("select * from orderdata"); ?>
<script>
    var allOrder = [];
    <?php while ($getAddress = $resultAddress->fetch(PDO::FETCH_ASSOC)) { ?>
        allOrder.push({
            allAddress: '<?php echo  $getAddress['order_address'] ?>',
            orderId: '<?php echo  $getAddress['order_id'] ?>',
            orderTitle: '<?php echo  $getAddress['order_title'] ?>',
            orderImg: '<?php echo  $getAddress['order_img'] ?>'
        });
    <?php } ?>
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Geocoding Service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        #map {
            height: 100vh;
            width: 50%;
            margin: auto;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        function initMap() {
            var latlng = {
                lat: 25.046891,
                lng: 121.516602
            }; // 給一個初始位置
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14, //放大的倍率
                center: latlng //初始化的地圖中心位置
            });
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    let icon_path = "static/img/";
                    let icons = {
                        pin: {
                            name: "pin",
                            icon: icon_path + "pin.png"
                        }
                    };
                    var marker = new google.maps.Marker({
                        position: pos,
                        icon: icons.pin.icon,
                        map: map
                    });
                    map.setZoom(17);
                    map.setCenter(pos);
                    let contentString = "您的位置";
                    let infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                });

                let geocoder = new google.maps.Geocoder();

                window.onload = function() {
                    geocodeAddress(geocoder, map);
                };
            } else {
                // Browser doesn't support Geolocation
                alert("未允許或遭遇錯誤！");
            }
        } //init_end



        function geocodeAddress(geocoder, resultsMap) {
            var locationArray = [];

            let icon_path = "static/img/";
            let icons = {
                tool: {
                    name: "tool",
                    icon: icon_path + "toolicon.png"
                }
            };
            for (let i = 0; i < allOrder.length; i++) {
                let address = allOrder[i].allAddress;
                geocoder.geocode({
                    address: address
                }, function(results, status) {
                    if (status === 'OK') {
                        let lat = results[0].geometry.location.lat();
                        let lng = results[0].geometry.location.lng()
                        locationArray.push([lat, lng]);
                        // resultsMap.setCenter(results[0].geometry.location);
                        let marker = new google.maps.Marker({
                            map: resultsMap,
                            icon: icons.tool.icon,
                            position: results[0].geometry.location
                        });
                        let contentString = allOrder[i].orderTitle;
                        let infowindow = new google.maps.InfoWindow({
                            content: contentString,
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    } else {
                        // alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALTkJ27avk-n-6allfr1gNC3hK_7ZPAL4&callback=initMap">
    </script>
</body>

</html>