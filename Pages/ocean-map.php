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
            margin: 0;
            padding: 0;
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
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1000;
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
        .map-container {
            width: 90%;
            max-width: 1200px;
            margin-top: 100px;
            position: relative;
        }
        #map {
            width: 100%;
            height: 600px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
        }
        .legend {
            position: absolute;
            bottom: 30px;
            left: 30px;
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 10px;
            font-size: 14px;
            color: white;
            backdrop-filter: blur(5px);
            z-index: 1000;
        }
        .legend-item {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 50%;
        }
        .info-panel {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 10px;
            color: white;
            backdrop-filter: blur(5px);
            z-index: 1000;
            max-width: 300px;
        }
        .custom-popup {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
        }
        .custom-popup h3 {
            color: #3498db;
            margin: 0 0 10px 0;
        }
        .heatmap-legend {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 10px;
            color: white;
            backdrop-filter: blur(5px);
            z-index: 1000;
        }
        .heatmap-gradient {
            height: 20px;
            width: 200px;
            background: linear-gradient(to right, #00ff00, #ffff00, #ff0000);
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="../Pages/contact.php">Contact</a>
    </div>
    
    <div class="map-container">
        <h1>Interactive Ocean Health Map</h1>
        <div id="map"></div>
        <div class="legend">
            <strong>Legend:</strong><br>
            <div class="legend-item">
                <div class="legend-color" style="background: #ff0000;"></div>
                <span>High Pollution Zone</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background: #00ff00;"></div>
                <span>Biodiversity Hotspot</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background: #0000ff;"></div>
                <span>Marine Protected Area</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background: #ffa500;"></div>
                <span>Oil Spill Incident</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background: #000000;"></div>
                <span>Overfishing Area</span>
            </div>
        </div>
        <div class="heatmap-legend">
            <strong>Pollution Density:</strong><br>
            <div class="heatmap-gradient"></div>
            <div style="display: flex; justify-content: space-between;">
                <span>Low</span>
                <span>Medium</span>
                <span>High</span>
            </div>
        </div>
        <div class="info-panel">
            <h3>Ocean Health Status</h3>
            <p>This map shows real-time data about ocean health, including:</p>
            <ul>
                <li>Pollution hotspots</li>
                <li>Biodiversity areas</li>
                <li>Protected zones</li>
                <li>Oil spill incidents</li>
                <li>Overfishing regions</li>
            </ul>
        </div>
    </div>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2);
        
        // Use a more detailed base map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        
        // Function to create custom popup content
        function createPopupContent(feature) {
            return `
                <div class="custom-popup">
                    <h3>${feature.properties.name}</h3>
                    <p>${feature.properties.description}</p>
                    ${feature.properties.date ? `<p><strong>Date:</strong> ${feature.properties.date}</p>` : ''}
                    ${feature.properties.impact ? `<p><strong>Impact:</strong> ${feature.properties.impact}</p>` : ''}
                    ${feature.properties.source ? `<p><strong>Source:</strong> ${feature.properties.source}</p>` : ''}
                </div>
            `;
        }
        
        // Enhanced GeoJSON data with more detailed information
        var oceanData = {
            "type": "FeatureCollection",
            "features": [
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [-145, 35] }, 
                    "properties": { 
                        "name": "Great Pacific Garbage Patch", 
                        "description": "Largest accumulation of ocean plastic in the world. Estimated size: 1.6 million square kilometers.",
                        "type": "High Pollution Zone",
                        "impact": "Severe impact on marine life and ecosystems",
                        "source": "Ocean Cleanup Foundation"
                    } 
                },
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [145, -18] }, 
                    "properties": { 
                        "name": "Great Barrier Reef", 
                        "description": "World's largest coral reef system. Home to thousands of marine species.",
                        "type": "Biodiversity Hotspot",
                        "impact": "Critical habitat for marine biodiversity",
                        "source": "UNESCO World Heritage"
                    } 
                },
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [-160, 25] }, 
                    "properties": { 
                        "name": "Papahānaumokuākea Marine National Monument", 
                        "description": "Largest marine protected area in the world. Area: 1.5 million square kilometers.",
                        "type": "Marine Protected Area",
                        "impact": "Protected habitat for endangered species",
                        "source": "NOAA"
                    } 
                },
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [-45, 35] }, 
                    "properties": { 
                        "name": "North Atlantic Overfishing Zone", 
                        "description": "Severe depletion of cod and other fish stocks.",
                        "type": "Overfishing Area",
                        "impact": "90% reduction in fish populations since 1950",
                        "source": "FAO"
                    } 
                },
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [-88, 28] }, 
                    "properties": { 
                        "name": "Deepwater Horizon Oil Spill", 
                        "description": "Largest marine oil spill in history. Released 4.9 million barrels of oil.",
                        "type": "Oil Spill Incident",
                        "date": "April 20, 2010",
                        "impact": "Affected 1,300 miles of coastline",
                        "source": "NOAA"
                    } 
                },
                { 
                    "type": "Feature", 
                    "geometry": { "type": "Point", "coordinates": [80, 13] }, 
                    "properties": { 
                        "name": "Chennai Coast", 
                        "description": "Severe plastic and chemical pollution. High concentration of microplastics.",
                        "type": "High Pollution Zone",
                        "impact": "Threatening local marine ecosystems",
                        "source": "Indian Ocean Commission"
                    } 
                }
            ]
        };
        
        // Add GeoJSON layer with enhanced markers
        L.geoJSON(oceanData, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 10,
                    fillColor: getMarkerColor(feature.properties.type),
                    color: "#fff",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.8
                });
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup(createPopupContent(feature));
            }
        }).addTo(map);
        
        // Enhanced Heatmap Data with more points and consistent density
        var heatData = [
            // High Pollution Zones
            [35, -145, 0.9], // Great Pacific Garbage Patch
            [13, 80, 0.9],   // Chennai Coast
            [28, -88, 0.8],  // Deepwater Horizon area
            // Moderate Pollution Zones
            [35, -45, 0.6],  // North Atlantic
            [25, -160, 0.5], // Papahānaumokuākea
            // Low Pollution Zones
            [-18, 145, 0.3]  // Great Barrier Reef
        ];
        
        // Add heatmap layer with adjusted parameters
        L.heatLayer(heatData, {
            radius: 30,
            blur: 20,
            maxZoom: 5,
            gradient: {
                0.3: 'green',
                0.6: 'yellow',
                0.9: 'red'
            }
        }).addTo(map);
        
        // Function to get marker color based on type
        function getMarkerColor(type) {
            const colors = {
                "High Pollution Zone": "#ff0000",
                "Biodiversity Hotspot": "#00ff00",
                "Marine Protected Area": "#0000ff",
                "Oil Spill Incident": "#ffa500",
                "Overfishing Area": "#000000"
            };
            return colors[type] || "#808080";
        }
    </script>
</body>
</html>
