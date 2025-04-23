<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Marine Conservation</title>
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
        .org-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        .org-card {
            background: rgba(0, 0, 0, 0.6);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(52, 152, 219, 0.3);
            transition: transform 0.3s;
        }
        .org-card:hover {
            transform: translateY(-5px);
            background: rgba(0, 0, 0, 0.8);
        }
        .org-card h2 {
            color: #3498db;
            margin-bottom: 15px;
            font-size: 22px;
        }
        .org-card p {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .donation-form {
            margin-top: 20px;
        }
        .donation-form label {
            display: block;
            margin-bottom: 10px;
            color: #3498db;
        }
        .donation-form input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            margin-bottom: 15px;
        }
        .donation-form button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .donation-form button:hover {
            background: #2980b9;
        }
        .org-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="../Pages/awareness.php">Awareness</a>
        <a href="../Pages/contact.php">Contact</a>
    </div>
    
    <div class="content">
        <h1 style="text-align: center; color: #3498db; margin-bottom: 30px;">Support Marine Conservation</h1>
        <p style="text-align: center; margin-bottom: 30px;">Choose an organization to support and make a donation to help protect our oceans.</p>
        
        <div class="org-grid">
            <div class="org-card" id="ocean-conservancy">
                <img src="../images/ocean-conservancy.png" alt="Ocean Conservancy" class="org-logo">
                <h2>Ocean Conservancy</h2>
                <p>Dedicated to protecting the ocean from today's greatest global challenges. Your donation will help fund research, advocacy, and conservation efforts.</p>
                <div class="donation-form">
                    <label for="amount1">Donation Amount ($)</label>
                    <input type="number" id="amount1" min="1" value="25">
                    <button onclick="processDonation('Ocean Conservancy', 'amount1')">Donate Now</button>
                </div>
            </div>
            
            <div class="org-card" id="sea-shepherd">
                <img src="../images/sea-shepherd.png" alt="Sea Shepherd" class="org-logo">
                <h2>Sea Shepherd</h2>
                <p>Direct action to defend, conserve, and protect the ocean. Your support helps fund patrols and interventions against illegal fishing and whaling.</p>
                <div class="donation-form">
                    <label for="amount2">Donation Amount ($)</label>
                    <input type="number" id="amount2" min="1" value="25">
                    <button onclick="processDonation('Sea Shepherd', 'amount2')">Donate Now</button>
                </div>
            </div>
            
            <div class="org-card" id="marine-conservation">
                <img src="../images/marine-conservation.png" alt="Marine Conservation Institute" class="org-logo">
                <h2>Marine Conservation Institute</h2>
                <p>Working to protect marine biodiversity worldwide. Your contribution supports marine protected areas and conservation initiatives.</p>
                <div class="donation-form">
                    <label for="amount3">Donation Amount ($)</label>
                    <input type="number" id="amount3" min="1" value="25">
                    <button onclick="processDonation('Marine Conservation Institute', 'amount3')">Donate Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the organization from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const selectedOrg = urlParams.get('org');

        // If an organization is specified, scroll to and highlight that card
        if (selectedOrg) {
            const orgId = selectedOrg.toLowerCase().replace(/\s+/g, '-');
            const orgCard = document.getElementById(orgId);
            if (orgCard) {
                orgCard.scrollIntoView({ behavior: 'smooth' });
                orgCard.style.border = '2px solid #3498db';
                orgCard.style.boxShadow = '0 0 15px rgba(52, 152, 219, 0.5)';
            }
        }

        function processDonation(organization, amountId) {
            const amount = document.getElementById(amountId).value;
            if (amount < 1) {
                alert('Please enter a valid donation amount.');
                return;
            }
            
            // Here you would typically send the donation information to your server
            // For now, we'll just show a confirmation message
            alert(`Thank you for your donation of $${amount} to ${organization}!`);
        }
    </script>
</body>
</html> 