<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Life Awareness</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .content {
            width: 90%;
            max-width: 1200px;
            margin-top: 100px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            backdrop-filter: blur(5px);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
        }
        .section {
            margin-bottom: 40px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            border-left: 4px solid #3498db;
        }
        .section h2 {
            color: #3498db;
            margin-bottom: 20px;
            font-size: 24px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .section p {
            line-height: 1.8;
            margin-bottom: 15px;
            font-size: 16px;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .section ul {
            list-style-type: none;
            padding-left: 20px;
        }
        .section ul li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
            line-height: 1.6;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .section ul li:before {
            content: "•";
            color: #3498db;
            position: absolute;
            left: 0;
            font-size: 20px;
        }
        .support-orgs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .org-card {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s;
            cursor: pointer;
            border: 1px solid rgba(52, 152, 219, 0.3);
        }
        .org-card:hover {
            transform: translateY(-5px);
            background: rgba(0, 0, 0, 0.8);
        }
        .org-card h3 {
            color: #3498db;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .org-card p {
            font-size: 14px;
            margin-bottom: 15px;
        }
        .org-card a {
            display: inline-block;
            padding: 8px 15px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .org-card a:hover {
            background: #2980b9;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.9);
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: center;
        }
        .modal-content h2 {
            color: #3498db;
            margin-bottom: 20px;
        }
        .modal-content p {
            margin-bottom: 20px;
        }
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .modal-buttons .login-btn {
            background: #3498db;
            color: white;
        }
        .modal-buttons .cancel-btn {
            background: #e74c3c;
            color: white;
        }
        .modal-buttons button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="../Pages/contact.php">Contact</a>
    </div>
    
    <div class="content">
        <div class="section">
            <h2>Why Marine Life Matters</h2>
            <p>Marine ecosystems are vital to our planet's health and human survival. They provide:</p>
            <ul>
                <li>Over 50% of the world's oxygen through phytoplankton</li>
                <li>Food for billions of people worldwide</li>
                <li>Regulation of global climate patterns</li>
                <li>Habitats for countless species</li>
                <li>Economic benefits through tourism and fisheries</li>
            </ul>
        </div>
        
        <div class="section">
            <h2>Current Threats</h2>
            <p>Our oceans face numerous challenges that threaten marine life:</p>
            <ul>
                <li>Plastic pollution - 8 million tons enter oceans annually</li>
                <li>Overfishing - 90% of large fish populations depleted</li>
                <li>Climate change - Rising temperatures and acidification</li>
                <li>Habitat destruction - Coral reefs dying at alarming rates</li>
                <li>Oil spills and chemical pollution</li>
            </ul>
        </div>
        
        <div class="section">
            <h2>How You Can Help</h2>
            <p>Simple actions can make a big difference:</p>
            <ul>
                <li>Reduce single-use plastics</li>
                <li>Choose sustainable seafood</li>
                <li>Support marine conservation organizations</li>
                <li>Participate in beach cleanups</li>
                <li>Spread awareness about ocean conservation</li>
            </ul>
        </div>
        
        <div class="section">
            <h2>Support Organizations</h2>
            <p>These organizations are working to protect marine life:</p>
            <div class="support-orgs">
                <div class="org-card" onclick="showLoginModal()">
                    <h3>Ocean Conservancy</h3>
                    <p>Dedicated to protecting the ocean from today's greatest global challenges.</p>
                    <a href="#">Learn More</a>
                </div>
                <div class="org-card" onclick="showLoginModal()">
                    <h3>Sea Shepherd</h3>
                    <p>Direct action to defend, conserve, and protect the ocean.</p>
                    <a href="#">Learn More</a>
                </div>
                <div class="org-card" onclick="showLoginModal()">
                    <h3>Marine Conservation Institute</h3>
                    <p>Working to protect marine biodiversity worldwide.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h2>Sign In Required</h2>
            <p>Please sign in to support these organizations and make a donation.</p>
            <div class="modal-buttons">
                <button class="login-btn" onclick="window.location.href='../Pages/login.php'">Sign In</button>
                <button class="cancel-btn" onclick="closeLoginModal()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function showLoginModal() {
            document.getElementById('loginModal').style.display = 'block';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('loginModal')) {
                closeLoginModal();
            }
        }
    </script>
</body>
</html> 