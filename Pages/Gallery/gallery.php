<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>
<body>
    <div class="container">
        <h1>Marine Gallery</h1>
        <p>Explore the beauty of marine life through our curated collection.</p>

        <div class="gallery-section">
            <h2>Mammals</h2>
            <div class="gallery">
                <img src="../../images/mammals/dolphin.jpg" alt="Dolphin" onclick="openLightbox(this.src)">
                <img src="../../images/mammals/sea-lion.jpg" alt="Sea Lion" onclick="openLightbox(this.src)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Fish</h2>
            <div class="gallery">
                <img src="../../images/fish/barracuda.jpg" alt="Barracuda" onclick="openLightbox(this.src)">
                <img src="../../images/fish/shark.jpg" alt="Shark" onclick="openLightbox(this.src)">
                <img src="../../images/fish/eel.jpg" alt="Eel" onclick="openLightbox(this.src)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Coral Reefs</h2>
            <div class="gallery">
                <img src="../../images/coral/coral1.jpg" alt="Coral Reef 1" onclick="openLightbox(this.src)">
                <img src="../../images/coral/coral2.jpg" alt="Coral Reef 2" onclick="openLightbox(this.src)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Reptiles</h2>
            <div class="gallery">
                <img src="../../images/reptiles/sea-turtle.jpg" alt="Sea Turtle" onclick="openLightbox(this.src)">
                <img src="../../images/reptiles/marine-iguana.jpg" alt="Marine Iguana" onclick="openLightbox(this.src)">
            </div>
        </div>
    </div>

    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-img" src="">
    </div>

    <script>
        function openLightbox(src) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox').style.display = 'flex';
        }
        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
    </script>
</body>
</html>
