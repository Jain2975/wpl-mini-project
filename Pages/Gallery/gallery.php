<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Gallery</title>
    <link rel="stylesheet" href="gallery.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="../../index.php" class="home-link">← Back to Home</a>
            <h1>Marine Gallery</h1>
            <p>Explore the beauty of marine life through our curated collection.</p>
        </div>

        <div class="gallery-section">
            <h2>Mammals</h2>
            <div class="gallery">
                <img src="../../images/gallery/mammals/dolphin.jpg" alt="Dolphin" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/sea-lion.jpg" alt="Sea Lion" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/whale.jpg" alt="Whale" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/seal.jpg" alt="Seal" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Fish</h2>
            <div class="gallery">
                <img src="../../images/gallery/fishes/barracuda.jpeg" alt="Barracuda" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/shark.jpg" alt="Shark" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/eel.jpg" alt="Eel" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/clownfish.jpg" alt="Clownfish" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/angelfish.jpg" alt="Angelfish" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Coral Reefs</h2>
            <div class="gallery">
                <img src="../../images/gallery/coral reefs/coral1.jpg" alt="Coral Reef 1" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/coral reefs/coral2.jpg" alt="Coral Reef 2" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/coral reefs/coral3.jpg" alt="Coral Reef 3" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Reptiles</h2>
            <div class="gallery">
                <img src="../../images/gallery/reptiles/sea-turtle.jpeg" alt="Sea Turtle" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/reptiles/marine-iguana.jpg" alt="Marine Iguana" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/reptiles/sea-snake.jpg" alt="Sea Snake" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>
    </div>

    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-img" src="" alt="">
        <div id="lightbox-caption"></div>
    </div>

    <script>
        function openLightbox(src, alt) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox-img').alt = alt;
            document.getElementById('lightbox-caption').textContent = alt;
            document.getElementById('lightbox').style.display = 'flex';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }

        // Close lightbox when pressing Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>
</html>
