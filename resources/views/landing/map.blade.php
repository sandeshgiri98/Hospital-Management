
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        #map {
            height: 535px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col items-center justify-center px-4 py-8 space-y-6">
    <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg">
        <div id="map" class="rounded-md overflow-hidden shadow"></div>
    </div>
    <script>
        function initMap() {
            const latLng = { lat: 27.73944, lng: 85.32550 };
            const mapOptions = {
                zoom: 15,
                center: latLng,
            };
            const map = new google.maps.Map(document.getElementById("map"), mapOptions);
            new google.maps.Marker({
                position: latLng,
                map: map,
                title: "SANDESH HOSPITAL - The best Hospital",
            });
        }
        window.initMap = initMap;
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"
        async defer>
    </script>
</body>
</html>