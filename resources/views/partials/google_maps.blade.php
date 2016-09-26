<script>

    var map;
    var infoWindowRaamsdonksveer = null;
    var infoWindowRaamsdonk = null;

    function initMap() {

        infoWindowRaamsdonksveer = new google.maps.InfoWindow();
        infoWindowRaamsdonk = new google.maps.InfoWindow();
        var windowLatLngRaamsdonksveer = new google.maps.LatLng(51.69741, 4.87708);
        var windowLatLngRaamsdonk = new google.maps.LatLng(51.68738, 4.90918);

        infoWindowRaamsdonksveer.setOptions({
            content: "<h3>Bakkerij van der Westen - Raamsdonksveer</h3>" +
            "<div class='google-maps-text-item'>Prins Hendrikstraat 44<br>" +
            "4941 JV Raamsdonksveer<br>" +
            "0162 520181<br>" +
            "info@bakkerijvanderwesten.nl" +
            "</div>",
            position: windowLatLngRaamsdonksveer
        });

        infoWindowRaamsdonk.setOptions({
            content: "<h3>Bakkerij van der Westen - Raamsdonk</h3>" +
            "<div class='google-maps-text-item'>Stationstraat 14<br>" +
            "4944 AK Raamsdonk<br>" +
            "0162 512380 <br>" +
            "info@bakkerijvanderwesten.nl" +
            "</div>",
            position: windowLatLngRaamsdonk
        });

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 51.69741, lng: 4.88708},
            zoom: 14,
            scrollwheel: false
        });

        var markerRaamsdonksveer = new google.maps.Marker({
            position: windowLatLngRaamsdonksveer,
            map: map,
            title: 'Bakkerij van der Westen - Raamsdonksveer'
        });

        var markerRaamsdonk = new google.maps.Marker({
            position: windowLatLngRaamsdonk,
            map: map,
            title: 'Bakkerij van der Westen - Raamsdonksveer'
        });

        infoWindowRaamsdonksveer.open(map, markerRaamsdonksveer);
        infoWindowRaamsdonk.open(map, markerRaamsdonk);

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTapurH6hss2gCJsRSyJQgd1RBU87OxMo&callback=initMap"
        async defer></script>

    <div id="google-maps" class="col-xs-12 no-padding">
        <div id="map"></div>
    </div>
