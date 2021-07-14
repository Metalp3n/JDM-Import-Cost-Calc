<?php
// This acts as the main configuration file for the rest of this application. Please make sure to only edit
// the areas that you are familiar with.
//
//
// Set the <TITLE></TITLE> of the calculator.
$title = "JDM Import Cost Calculator"; 

// Set Ports of Entry
$portsEntry = "Savannah,Newark,Baltimore";
// Set Steamship Charges In Same Order As Ports Above
$steamshipCharge = "57.23,173.15,157.65";

// Set The Profit Per Car
$profits = "1000";

// Set Your Default Currency Using THe 3 Digit Currency Code
$currency = "USD";



//.
//..
//...
//** DO NOT EDIT BELOW THIS LINE **\\ 

/* Setup Arrays For Loops */
$portsEntry = explode(",", $portsEntry);
$steamshipCharge = explode(",", $steamshipCharge);

//...
//..
//.

//.
//..
//...
// convertCurrency Function
function convertCurrency($amount,$from_currency,$to_currency){
  $apikey = 'c8b82943ca5945d09a5faac2658ca074'; //currconv.com free API key goes here

  $from_Currency = urlencode($from_currency);
  $to_Currency = urlencode($to_currency);
  $query =  "{$from_Currency}_{$to_Currency}";

  // change to the free URL if you're using the free version
  $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
  $obj = json_decode($json, true);

  $val = floatval($obj["$query"]);


  $total = $val * $amount;
  return number_format($total, 2, '.', '');
}
// END convertCurrency function
//...
//..
//.

//.
//..
//...
// roundUpToNearestThousand function
function roundUpToNearestThousand($n)
{
    return (1000 * ceil($n/1000));
}
// END roundUpToNearestThousand function
//...
//..
//.
