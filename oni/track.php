<!DOCTYPE html >
  <head>
    <title>Coast Panic Maps</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="refresh" content='10'>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      #map {height: 100%;}
      html, body {height: 100%;margin: 0;padding: 0;}
    </style>
  </head>
<html>
  <body>
    <div id="map"></div>
    <!-- <div id="map" style="width:100%;height:400px;"></div> -->
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          // center: new google.maps.LatLng($data, 151.207977),
        //   center: new google.maps.LatLng(-7.28626, 112.793710),
          center: new google.maps.LatLng(-7.285751, 112.797032),
          zoom: 2
        });
        var infoWindow = new google.maps.InfoWindow;
        var bounds = new google.maps.LatLngBounds(map.center);
        <?php 
            include 'connect.php';
            // $data=query("SELECT * FROM tb_tracking");
            $id_s=query("SELECT id_kapal FROM tb_kapal");
            $data=[];
            // Memilih data id max dengan masing-masing id_kapal
            foreach($id_s as $val){
                $id_kapal=$val['id_kapal'];
            	$max=query("SELECT MAX(id) FROM tb_tracking WHERE id_kapal='$id_kapal'")[0]['MAX(id)'];
            	$data[]=query("SELECT * FROM tb_tracking WHERE id='$max'")[0];
            }
            
            foreach($data as $val){
                $id=$val['id_kapal'];
                $lati=$val['latitude'];
                $longi=$val['longitude'];
                echo ("addMarker('$lati', '$longi','$id');\n");
            }
        ?>
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi,
                label: info
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow,lat+' <br> '+lng);
         }        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuNn7SlBcMsuJbechyeUjUFNrC4Le5TTg&callback=initMap">
    </script>
  </body>
</html>