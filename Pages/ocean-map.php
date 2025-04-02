<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Health Map</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        body {
            background: url('../images/background.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: transparent;
        }
        .nav a {
            font-size: 18px;
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            transition: 0.3s;
        }
        .nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        #map {
            width: 80%;
            height: 500px;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .legend {
            position: absolute;
            bottom: 30px;
            left: 30px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="../Pages/contact.php">Contact</a>
    </div>
    
    <h1>Interactive Ocean Health Map</h1>
    <div id="map"></div>
    <div class="legend" id="legend">
        <strong>Legend:</strong><br>
        🔴 High Pollution Zone<br>
        🟢 Biodiversity Hotspot<br>
        🔵 Marine Protected Area<br>
        🟠 Oil Spill Incident<br>
        ⚫ Overfishing Area<br>
        <span style="background: red; padding: 2px 5px;">&nbsp;</span> High Pollution Density<br>
        <span style="background: yellow; padding: 2px 5px;">&nbsp;</span> Moderate Pollution Density<br>
        <span style="background: green; padding: 2px 5px;">&nbsp;</span> Low Pollution Density
    </div>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        
        // Function to set marker colors based on category
        function getMarkerColor(type) {
            const colors = {
                "High Pollution Zone": "red",
                "Biodiversity Hotspot": "green",
                "Marine Protected Area": "blue",
                "Oil Spill Incident": "orange",
                "Overfishing Area": "black"
            };
            return colors[type] || "gray";
        }
        
        // Expanded GeoJSON data with more locations
        var oceanData = {
            "type": "FeatureCollection",
            "features": [
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [-75, 20] }, "properties": { "name": "Great Pacific Garbage Patch", "description": "Plastic Density: 700kg/km²", "type": "High Pollution Zone" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [85, -10] }, "properties": { "name": "Great Barrier Reef", "description": "Coral Reefs Present", "type": "Biodiversity Hotspot" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [130, -25] }, "properties": { "name": "Papahānaumokuākea Marine National Monument", "description": "Low human activity, rich biodiversity", "type": "Marine Protected Area" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [-45, 35] }, "properties": { "name": "North Atlantic Overfishing Zone", "description": "Declining Fish Population", "type": "Overfishing Area" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [50, -30] }, "properties": { "name": "Deepwater Horizon Oil Spill Site", "description": "Major oil spill disaster in 2010", "type": "Oil Spill Incident" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [13, 80] }, "properties": { "name": "Chennai Coast", "description": "High Plastic & Chemical Pollution", "type": "High Pollution Zone" } },
                { "type": "Feature", "geometry": { "type": "Point", "coordinates": [106, -6] }, "properties": { "name": "Jakarta Bay", "description": "Severe Waste Dumping & Water Contamination", "type": "High Pollution Zone" } }
            ]
        };
        
        // Add GeoJSON layer with color-coded markers
        L.geoJSON(oceanData, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 8,
                    fillColor: getMarkerColor(feature.properties.type),
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.8
                });
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup(`<strong>${feature.properties.name}</strong><br>${feature.properties.description}`);
            }
        }).addTo(map);
        
        // Expanded Heatmap Data
        var heatData = [
            [20, -75, 0.9],
            [-10, 85, 0.6],
            [-25, 130, 0.8],
            [35, -45, 0.7],
            [-30, 50, 0.5],
            [13, 80, 0.9],
            [106, -6, 0.8]
        ];
        
        L.heatLayer(heatData, { radius: 25, blur: 15, maxZoom: 5 }).addTo(map);
    </script>
</body>
</html>
