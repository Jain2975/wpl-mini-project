<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Marine Gallery</h1>
        <p>Explore the beauty of marine life through our curated collection.</p>
    </div>

    <?php
    $categories = ['mammals', 'fish', 'coral_reefs', 'reptiles'];
    $baseDir = 'images/gallery/';

    foreach ($categories as $category) {
        $folder = $baseDir . $category;
        if (is_dir($folder)) {
            $images = array_diff(scandir($folder), ['.', '..']);
            echo "<div class='category-section'>";
            echo "<h2>" . ucfirst(str_replace('_', ' ', $category)) . "</h2>";
            echo "<div class='gallery'>";
            foreach ($images as $img) {
                $imgPath = "$folder/$img";
                echo "<img src='$imgPath' alt='$category image' onclick='openLightbox(\"$imgPath\")'>";
            }
            echo "</div></div>";
        }
    }
    ?>

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
