<?php
include "functions.inc.php";
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
$profitsUSD = "1000"; // SET PROFIT HERE IN USD
$profitsYEN= convertCurrency($profitsUSD, 'USD', 'JPY');


// Set Your Default Currency Using THe 3 Digit Currency Code
$currency = "USD";
