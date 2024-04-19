<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | Homepage</title>
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
	
	#carouselExampleControls {
		margin-top: 15px;
		margin-bottom: 15px;
		box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
    }
	
	.card {
  		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Add shadow */
	}
	
	/* Custom CSS to change button color */
	.btn-primary {
    	background-color: #432818;
		border-color: #432818;
    	color: #fff;
	}

	/* Hover effect for the button */
	.btn-primary:hover {
    	background: #99582a;
		border-color: #99582a;
		color: #fff;
	}
	
	.custom-mb {
  		margin-bottom: 60px;
	}
	
	makeup .card-body {
  		display: flex;
  		align-items: center;
	}

	makeup .card-img-left {
  		max-width: 100%;
  		height: auto;
  		margin-right: 20px; 
	}
	
	.stars {
    	color: gold; /* Change to any color you prefer */
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
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleControls" data-slide-to="1"></li>
              <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="heading1.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="heading2.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="heading3.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="freeship.png" style="width: 60px; height: 60px;"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4 style="margin-top: 10px; margin-left: 5px;" >Free Shipping</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="freereturn.png" style="width: 60px; height: 60px;"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4 style="margin-top: 10px; margin-left: 5px;">Free Returns</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="lowprice.png" style="width: 60px; height: 60px;"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4 style="margin-top: 10px; margin-left: 5px;">Low Prices</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h2 class="text-center">TOP BRANDS IN SKINCARE</h2>
    <hr>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="rhode.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">RHODE</h5>
              <p class="card-text">Rhode Skin by Hailey Bieber: Simple, clean skincare for natural beauty.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="anua.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">ANUA</h5>
              <p class="card-text">ANUA Skincare: Nature meets science for radiant, healthy skin.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="sulwhasoo.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">SULWHASOO</h5>
              <p class="card-text">Sulwhasoo: Fusion skincare blending ginseng and botanicals for radiant skin.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4 custom-mb">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="skii.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">SK-II</h5>
              <p class="card-text">SK-II: Revitalize and glow with Pitera-infused skincare.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="fentyskin.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">FENTY SKIN</h5>
              <p class="card-text">Fenty Skin by Rihanna: Empowering diverse beauty through effective, inclusive skincare.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="dom.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">DAUGHTERS OF MALAYA</h5>
              <p class="card-text">Daughters of Malaya: Timeless beauty, rooted in tradition.</p>
              <a href="#" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h2 class="text-center">TRENDING SEARCHES IN MAKEUP</h2>
    <hr>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card" id="makeup">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb1.png" style="width: 100%;">
            	<source src="vid1.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">MAAEZ Foundations</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span> <!-- Example for 4 full stars and 1 half star -->
  				4.5
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb2.png" style="width: 100%;">
            	<source src="vid2.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">RARE BEAUTY Liquid Blush</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
  				5.0
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb3.png" style="width: 100%;">
            	<source src="vid3.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">KIMUSE Water Liptint</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
  				4.3
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb4.png" style="width: 100%;">
            	<source src="vid4.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">ALHA ALFA Eyeshadow</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
  				5.0
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb5.png" style="width: 100%;">
            	<source src="vid5.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">GIORGIO ARMANI Lip Power</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
  				4.2
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <div class="card-body">
              <video class="card-img-left" controls poster="thumb6.png" style="width: 100%;">
            	<source src="vid6.mp4" type="video/mp4">
            	Your browser does not support the video tag.
          	  </video>
          	<div>
            <h5 class="card-title">TOM FORD Eye Deepening Pen</h5>
            <p class="card-text">
  				Average Rating:
  				<span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
  				4.5
			</p>
            <a href="#" class="btn btn-primary">See More</a>
          	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
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
  </body>
</html>