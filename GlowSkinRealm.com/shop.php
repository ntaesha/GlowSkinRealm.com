<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | Shop</title>
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
	
	.card {
  		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
		margin-bottom: 20px;
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
	
	#filter .btn-primary {
		border-radius: 25px;
	}
	
	.custom-mb {
  		margin-bottom: 20px;
	}
	
	.quantity-input.custom-quantity-input {
    	width: 30px !important; /* Adjust the width as needed */
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
	<!-- Search bar -->
<div class="text-center mb-3">
    <input type="text" id="searchInput" onkeyup="searchItems()" placeholder="Search for items..." style="border: 3px solid #432818; width: 400px;  border-radius: 30px; padding: 8px; margin-bottom: 15px; margin-top: 15px;">
</div>


<!-- Container to display items -->
<div class="container">
	<!-- Filter buttons -->
    <div class="row justify-content-center custom-mb" id="filter">
        <div class="col-auto">
            <button class="btn btn-primary" onclick="getItems('skincare')">Skincare</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" onclick="getItems('makeup')">Makeup</button>
        </div>
    </div>
    <div class="row text-center">
        <!-- PHP code block to display items -->
        <?php
		// Connect to the database
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "gsrdb";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the $filter variable
$filter = '';

// Check if the 'filter' parameter exists in the URL
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

// Prepare the SQL query
$sql = "";
// If no filter is selected, retrieve all items
if (empty($filter)) {
    $sql = "SELECT item_name, item_price, item_desc, item_image FROM skincare UNION SELECT item_name, item_price, item_desc, item_image FROM makeup";
} else {
    // Otherwise, filter based on the user's selection
    if ($filter === 'skincare') {
        $sql = "SELECT item_name, item_price, item_desc, item_image FROM skincare";
    } elseif ($filter === 'makeup') {
        $sql = "SELECT item_name, item_price, item_desc, item_image FROM makeup";
    } else {
        // Debugging: Output the value of $filter to identify the issue
        echo "Invalid filter value: " . $filter;
    }
}

// Check if $sql is empty
if (empty($sql)) {
    die("Error: SQL query is empty.");
}

// Execute the query
$result = $conn->query($sql);
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Initialize a counter
            $counter = 0;

            // Loop through the items
            while ($row = $result->fetch_assoc()) {
                // Increment the counter
                $counter++;

                // Check if it's the first item in a row
                if (($counter - 1) % 3 === 0) {
                    // Open a new row
                    echo '<div class="row text-center">';
                }

                // Output the column and card HTML
                echo '<div class="col-md-4 pb-1 pb-md-0">';
                echo '<div class="card">';
                echo '<img class="card-img-top" src="' . $row["item_image"] . '.png" alt="' . $row["item_name"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["item_name"] . '</h5>';
				echo '<h6 class="card-text">' . $row["item_price"] . '</h6>';
                echo '<p class="card-text">' . $row["item_desc"] . '</p>';
                echo '<div class="input-group mb-3">';
echo '<button class="btn btn-primary minus-btn" type="button">-</button>'; // Minus button
echo '<input id="cart" type="text" class="form-control quantity-input custom-quantity-input" value="1" style="width: 30px;">'; // Quantity input
echo '<button class="btn btn-primary plus-btn" type="button">+</button>'; // Plus button
echo '</div>'; // Close input-group
echo '<a href="#" class="btn btn-primary add-to-cart">Add to cart</a>';
                echo '</div>'; // Close card-body
                echo '</div>'; // Close card
                echo '</div>'; // Close column

                // Check if it's the last item in a row or the last item overall
                if ($counter % 3 === 0 || $counter === $result->num_rows) {
                    // Close the row
                    echo '</div>'; // Close row
                }
            }
        } else {
            echo "0 results";
        }
        ?>
        <!-- End of PHP code block -->
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
function searchItems() {
    var input, filter, cards, card, title, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName("card");
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".card-title");
        txtValue = title.textContent || title.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}

function getItems(filter) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the item container with the response from the server
            document.getElementById("itemContainer").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "shop.php?filter=" + filter, true);
    xhttp.send();
}
</script>
<script>
function getItems(filter) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the item container with the response from the server
            document.getElementById("itemContainer").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "shop.php?filter=" + filter, true);
    xhttp.send();
}
</script>
	<!-- JavaScript for adding items to the cart and adjusting quantity -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to plus and minus buttons
    const minusButtons = document.querySelectorAll('.minus-btn');
    const plusButtons = document.querySelectorAll('.plus-btn');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    minusButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Decrease quantity when minus button is clicked
            let currentValue = parseInt(quantityInputs[index].value);
            if (currentValue > 1) {
                quantityInputs[index].value = currentValue - 1;
            }
        });
    });

    plusButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Increase quantity when plus button is clicked
            let currentValue = parseInt(quantityInputs[index].value);
            quantityInputs[index].value = currentValue + 1;
        });
    });

    addToCartButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Get item ID, name, price, and quantity
            const card = button.closest('.card');
            const itemName = card.querySelector('.card-title').innerText;
            const itemPrice = card.querySelector('.card-text').innerText;
            const quantity = parseInt(quantityInputs[index].value);

            // Make an AJAX request to add the item to the cart
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // Handle the response from the server
                    console.log(this.responseText);
                    // Redirect to the cart page or display a success message
                }
            };
            // Modify the URL to pass item ID and quantity as parameters
            xhttp.open("GET", "addToCart.php?item_name=" + itemName + "&item_price=" + itemPrice + "&quantity=" + quantity, true);
            xhttp.send();
        });
    });
	// Adjust the width of the quantity input field
    const quantityInput = document.getElementById('cart');
    quantityInput.style.width = '30px'; // Set the width to 30 pixels
});
</script>
</body>
</html>