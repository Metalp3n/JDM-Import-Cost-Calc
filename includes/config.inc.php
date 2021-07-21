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

//THIS IS WHERE YOU MAKE MONEY
$profits = "2500"; // SET PROFIT HERE IN USD

// Set Your Default Currency Using THe 3 Digit Currency Code
$currency = "USD";

//Known Import Cost Variables. The inland transport, roro shipping, and preshipment wash are al charged to you in YEN, as such the values are entered in YEN to simplify things. For US titles and customs duty, these are charged to you in USD, and as such the values entered need to be in USD. 
$inlandTransportYEN = "38000";
$preshipmentWashYEN = "5000";
$roroShippingYEN = "98000";
$usTitleUSD = "275";
$customsDutyUSD = "240";

// Don't Touch This Include
require_once "functions.inc.php";
?>