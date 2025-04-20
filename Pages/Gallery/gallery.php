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
                <img src="../../images/gallery/mammals/beluga-whale.jpg" alt="Beluga Whale" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/sea-lion.jpg" alt="Sea Lion" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/humpback-whales.jpg" alt="Humpback Whale" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/seal.jpg" alt="Seal" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/blue-whale.jpg" alt="Blue Whale" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/dugong.jpg" alt="Dugong" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/vaquita.jpeg" alt="Vaquita" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/mammals/dolphin.jpeg" alt="Dolphin" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Fish</h2>
            <div class="gallery">
                <img src="../../images/gallery/fishes/baracuda.jpeg" alt="Barracuda" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/shark1.jpg" alt="Shark" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/emperor-angelfish.jpg" alt="Emperor Angelfish" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/whale-shark.jpeg" alt="Whale Shark" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/blue-spotted-ribbontail-ray.jpeg" alt="Blue Spotted Ribbontail Ray" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/lion-fish.jpg" alt="Lion Fish" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/clown-fish.jpeg" alt="Clown Fish" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/fishes/mandarin.jpg" alt="Mandarin Fish" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>

        <div class="gallery-section">
            <h2>Coral Reefs</h2>
            <div class="gallery">
                <img src="../../images/gallery/coral reefs/coral.jpg" alt="Coral Reef 1" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/coral reefs/coral2.jpeg" alt="Coral Reef 2" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/coral reefs/coral3.jpg" alt="Coral Reefs visible from above the surface" onclick="openLightbox(this.src, this.alt)">
            </div>
        </div>`

        <div class="gallery-section">
            <h2>Reptiles</h2>
            <div class="gallery">
                <img src="../../images/gallery/reptiles/sea-turtle.jpeg" alt="Green Sea Turtle" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/reptiles/marine-iguana.jpg" alt="Marine Iguana" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/reptiles/turtle2.jpg" alt="Loggerhead Sea Turtle" onclick="openLightbox(this.src, this.alt)">
                <img src="../../images/gallery/reptiles/iguana2.jpg" alt="Marine Iguana Swimming" onclick="openLightbox(this.src, this.alt)">
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
