<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | FAQ</title>
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
		
		h1 {
    		margin-bottom: 20px; /* Adjust the value as needed */
		}
		
		.faq-container {
    		max-width: 800px;
    		margin: 20px auto;
    		padding: 20px;
    		background-color: #fff;
    		border-radius: 8px;
    		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			margin-bottom: 30px;
  		}

  		.faq-item {
    		margin-bottom: 20px;
  		}

  		.faq-question {
    		font-weight: bold;
    		cursor: pointer;
    		color: #432818;
    		font-size: 18px;
    		margin-bottom: 10px;
  		}

  		.faq-answer {
    		display: none;
    		color: #555;
  		}

  		.faq-answer.active {
    		display: block;
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
	<div class="faq-container">
  <h1>Frequently Asked Questions (FAQ)</h1>

  <div class="faq-item">
    <div class="faq-question">How do I shop on GlowSkinRealm.com?</div>
    <div class="faq-answer">
      <p>Shopping on GlowSkinRealm.com is easy! Simply follow these steps:</p>
      <ol>
        <li>Browse our website to explore our wide range of makeup and skincare products.</li>
        <li>Add your desired items to your shopping cart.</li>
        <li>Proceed to checkout and fill in your shipping and payment information.</li>
        <li>Review your order summary and confirm your purchase.</li>
        <li>Once your order is confirmed, sit back and wait for your fabulous products to arrive!</li>
      </ol>
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question">Can I return or exchange products?</div>
    <div class="faq-answer">
      <p>Yes, we offer a hassle-free return and exchange policy. If you're not completely satisfied with your purchase, you can return or exchange it within 30 days of delivery. Simply contact our customer service team for assistance, and they'll guide you through the process.</p>
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question">How can I track my order?</div>
    <div class="faq-answer">
      <p>Tracking your order is easy! Once your order has been shipped, you'll receive a confirmation email with a tracking number. Simply click on the tracking link provided in the email or enter the tracking number on our website to check the status of your delivery.</p>
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question">Is my payment information secure?</div>
    <div class="faq-answer">
      <p>Yes, we take the security of your payment information very seriously. Our website is equipped with industry-standard encryption technology to ensure that your personal and financial data is protected at all times. You can shop with confidence knowing that your information is safe and secure.</p>
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question">Do you offer international shipping?</div>
    <div class="faq-answer">
      <p>Yes, we offer international shipping to many countries worldwide. Simply select your country during checkout, and we'll take care of the rest. Please note that shipping times and fees may vary depending on your location.</p>
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question">Can I contact customer support for assistance?</div>
    <div class="faq-answer">
      <p>Absolutely! Our friendly customer support team is here to help you with any questions or concerns you may have. You can reach us via email, phone, or live chat during our business hours. We're committed to providing you with the best shopping experience possible.</p>
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
	<script>
  // JavaScript to toggle FAQ answers
  document.addEventListener("DOMContentLoaded", function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
      question.addEventListener('click', function() {
        const answer = this.nextElementSibling;
        answer.classList.toggle('active');
      });
    });
  });
</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>