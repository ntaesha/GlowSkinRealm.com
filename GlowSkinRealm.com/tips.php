<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | Tips & Advices</title>
	  <link rel="icon" href="logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
</head>
<style>
	.navbar-nav .nav-link {
        color: #fff;
		font-size: 18px;
	}
	
	.navbar-nav .nav-item.shop {
		margin-right: 20px;
        margin-left: 20px;
    }
	
	.navbar-nav .nav-item{
		margin-right: 20px;
	}
		
	#languageCurrencyBtn {
        font-size: 14px;
    }
		
	.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;	
	}
	
	.bg-custom-color {
    background-color: #432818 !important;
	}
	
	.tips-container {
        margin-top: 20px;
    }

    .tip {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .tip h3 {
        margin-top: 0;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
	
	.custom-mt{
		margin-top: 20px;
	}
	
	.custom-bm{
		margin-bottom: 30px;
	}
	
	.add-tip-btn {
        cursor: pointer;
        font-size: 24px;
    }
	
	#submitTipBtn {
        background-color: #432818;
        color: #fff;
		border-color: #432818;
    }
	
	#submitTipBtn:hover {
        background: #99582a;
		border-color: #99582a;
		color: #fff;
    }
	
	.custom-bg-color {
  		background-color: #8B6752;
	}
	
	.white-link {
  		color: white;
  		text-decoration: none; /* Removes underline */
	}

	.white-link:hover {
  		color: lightgray; /* Change color on hover if needed */
	}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-custom-color">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="Homepage.php">
            <img src="logo.png" alt="Home" width="200" height="70" class="d-inline-block align-top" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <!-- Shop Button menu -->
                <li class="nav-item shop">
    				<a class="nav-link custom-button" href="Shop.php">Shop</a>
				</li>
            <!-- Tips & Advices Button menu -->
                <li class="nav-item">
    				<a class="nav-link custom-button" href="tips.php">Tips & Advices</a>
				</li>
            <!-- About Us Button menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link custom-button" href="aboutUs.php">About Us</a>
                </li> 
			  <!-- FAQ Button menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link custom-button" href="FAQ.php">FAQ</a>
                </li> 
          </ul>
          <!-- Language | Currency Button with dynamic icon and text -->
		  <div class="navbar-text">
            <button class="btn btn-link" id="languageCurrencyBtn">
              <img src="malaysia.png" alt="MY" id="flagIcon" style="height: 40px; width: 40px"> <!-- Default Malaysia flag icon -->
              <span id="languageCurrencyText" color=#fff>EN | MYR</span> <!-- Default language and currency text -->
            </button>
          </div>
	<script>
    // Initialize i18next
    i18next.init({
        lng: 'EN', // Default language
        resources: {
            EN: {
                translation: {
                    welcomeMessage: 'Welcome!'
                }
            },
            MY: {
                translation: {
                    welcomeMessage: 'Selamat Datang!'
                }
            },
            IN: {
                translation: {
                    welcomeMessage: 'Selamat Datang!'
                }
            },
            PH: {
                translation: {
                    welcomeMessage: 'Sumalubong!'
                }
            }
        }
    });

    // Function to change the language
    function changeLanguage(language) {
        i18next.changeLanguage(language);
    }

    // Example: Call the function to change the language when the button is clicked
    document.getElementById('languageBtn').addEventListener('click', function () {
        // Assume the user selects French language
        changeLanguage('MY');
    });

    // Example: Update text content based on the selected language
    i18next.on('languageChanged', () => {
        // Update text content using i18next
        document.getElementById('welcomeMessage').textContent = i18next.t('welcomeMessage');
    });

    // Function to change the language and currency
    function changeLanguageCurrency(language, currency) {
        const iconElement = document.getElementById('currencyIcon');

        // If no currency is provided, default to MYR
    	if (!currency) {
        	currency = 'MYR';
    	}
		
		// Update the flag icon and text based on the selected language and currency
        switch (currency) {
            case 'MYR':
                // Update the flag icon to Malaysia flag
                iconElement.src = 'malaysia.jpg';
                break;
            case 'IN':
                iconElement.src = 'indo.jpg';
                break;
            case 'PH':
                iconElement.src = 'phillipine.jpg';
                break;
            case 'US':
                iconElement.src = 'us.jpg';
                break;
        }

        // Update the language and currency text
        document.getElementById('welcomeMessage').textContent = i18next.t('welcomeMessage');
        document.getElementById('languageCurrencyText').textContent = language + ' | ' + currency;

        // Update all currency values on the page
        updateAllCurrencies(currency);
    }

    // Function to update all currency values on the page based on the selected currency
    function updateAllCurrencies(currency) {
        // Example: Retrieve exchange rates from API
        const exchangeRates = {
            'MYR': 4.74,
            'INR': 15814.15,
            'PHP': 56.39,
            'USD': 1.0 // Base currency
        };

        // Example: Convert currency values on the page
        const currencyElements = document.querySelectorAll('.currency');
        currencyElements.forEach(element => {
            const currentValue = parseFloat(element.textContent);
            const convertedValue = currentValue / exchangeRates['USD'] * exchangeRates[currency];
            element.textContent = convertedValue.toFixed(2); // Display currency with two decimal places
        });
    }

    document.getElementById('languageCurrencyBtn').addEventListener('click', function () {
        // Assume the user selects English language and Malaysian Ringgit (MYR) currency
        changeLanguageCurrency('EN', 'MYR');
    });
</script>
			
		  <!-- Log In / Sign Up Button with icon -->
          <div class="navbar-text">
             <a href="profile.php" class="btn btn-link" id="profileBtn">
               <img src="profile.png" alt="Login/Signup" width="70" height="70">
			   <span style="font-size: 16px;">My Profile</span>
             </a>
          </div>
        </div>
      </div>
    </nav>
	<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- "+" button to toggle the form -->
            <div class="d-flex justify-content-end custom-mt">
                <span class="add-tip-btn" id="addTipBtn">+ Share Your Tips</span>
            </div>
            <!-- Form for users to submit tips (initially hidden) -->
            <form id="tipForm" style="display: none;">
                <div class="form-group">
                    <label for="tipTitle">Tip Title</label>
                    <input type="text" class="form-control" id="tipTitle" required>
                </div>
				<div class="form-group">
                    <label for="tipDesc">Tip Description</label>
                    <input type="text" class="form-control" id="tipDesc" required>
                </div>
                <div class="form-group">
                    <label for="tipContent">Tip Content (Video URL)</label>
                    <input type="url" class="form-control" id="tipVideoUrl" required>
                </div>
                <button type="submit" class="btn btn-primary custom-bm" id="submitTipBtn">Submit Tip</button>
            </form>
        </div>
    </div>
    <!-- Container for displaying tips -->
    <div class="row tips-container">
        <div class="col-md-8 offset-md-2">
            <h2>Shared Tips & Advices</h2>
            <div id="tipsList"></div>
        </div>
    </div>
</div>
	<div class="container text-white custom-bg-color p-4">
      <div class="row">
        <div class="col-md-4 col-lg-5 col-6">
			<address>
            <strong>ByteNexus Co.</strong><br>
            Permata Business Centre<br>
            Masai, Johor, 81100<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
          <address>
            <strong>Email Us</strong><br>
            <a href="mailto:#" class="white-link">glowskinrealmcs@gmail.com</a>
          </address>
        </div>
        <div class="col-6 col-md-8 col-lg-7">
          <div class="row text-center">
            <div class="col-sm-6 col-md-4 col-lg-4 col-12">
              <ul class="list-unstyled">
                <li class="btn-link"> <a href="#" class="white-link">Shop</a> </li>
                <li class="btn-link"> <a href="#" class="white-link">Tips & Advices</a> </li>
                <li class="btn-link"> <a href="#" class="white-link">About Us</a> </li>
                <li class="btn-link"> <a href="#" class="white-link">FAQ</a> </li>
                <li class="btn-link"> <a href="#" class="white-link">My Profile</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © GlowSkinRealm.com. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
	<script>
    // Function to fetch tips from the database and display them
    function fetchTips() {
        // Example AJAX call to fetch tips from the server
        $.ajax({
            url: 'fetch_tips.php',
            method: 'GET',
            success: function (response) {
                // Clear existing tips
                $('#tipsList').empty();
                // Append fetched tips to the tips container
                response.forEach(function (tip) {
                    $('#tipsList').append('<div class="tip"><h3>' + tip.title + '</h3><div class="video-container"><iframe src="' + tip.videoUrl + '" frameborder="0" allowfullscreen></iframe></div></div>');
                });
            },
            error: function () {
                console.log('Error fetching tips');
            }
        });
    }

    // Function to handle form submission and add a new tip
    $('#tipForm').submit(function (event) {
        event.preventDefault();
        var title = $('#tipTitle').val();
        var videoUrl = $('#tipVideoUrl').val();
        // Example AJAX call to submit the tip to the server
        $.ajax({
            url: 'submit_tip.php',
            method: 'POST',
            data: {title: title, videoUrl: videoUrl},
            success: function () {
                // Clear form fields after successful submission
                $('#tipTitle').val('');
                $('#tipVideoUrl').val('');
                // Fetch updated tips and display them
                fetchTips();
            },
            error: function () {
                console.log('Error submitting tip');
            }
        });
    });

    // Show/hide tip form when the "+" button is clicked
    $('#addTipBtn').click(function () {
        $('#tipForm').toggle();
    });

    // Fetch tips when the page loads
    $(document).ready(function () {
        fetchTips();
    });
</script>
</body>
</html>