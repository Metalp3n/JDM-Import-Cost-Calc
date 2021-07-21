<?php
// Get Vehicle Price & convert
$vehiclePriceB3USD =  convertCurrency($vehiclePriceB3YEN, 'JPY', 'USD');

//Auction Fees Calculation
$auctionFeesYEN = $vehiclePriceB3YEN*0.05;
$auctionFeesYEN = $auctionFeesYEN + 70000;
if ($auctionFeesYEN < 80000) {
  $auctionFeesYEN = "80000";
}
$auctionFeesYEN = roundUpToNearestThousand($auctionFeesYEN);
$auctionFeesUSD = convertCurrency($auctionFeesYEN, 'JPY', 'USD');

//Remaining Static Import Costs Pricing Variables & Conversions
$inlandTransportYEN = "38000";
$inlandTransportUSD = convertCurrency($inlandTransportYEN, 'JPY', 'USD');
$preshipmentWashYEN = "5000";
$preshipmentWashUSD = convertCurrency($preshipmentWashYEN, 'JPY', 'USD');
$roroShippingYEN = "98000";
$roroShippingUSD = convertCurrency($roroShippingYEN, 'JPY', 'USD');
$usTitleUSD = "275";
$usTitleYEN = convertCurrency($usTitleUSD, 'USD', 'JPY');
$customsDutyUSD = "240";
$customsDutyYEN = convertCurrency($customsDutyUSD, 'USD', 'JPY');

//THIS IS WHERE YOU MAKE MONEY
$profitsUSD = $profits; // SET PROFIT HERE IN USD
$profitsYEN= convertCurrency($profitsUSD, 'USD', 'JPY');

//Customs Filing Formmula
$customsFilingUSD = $inlandTransportUSD + $preshipmentWashUSD + $roroShippingUSD + $vehiclePriceB3USD + $auctionFeesUSD;

if ($vehicleType == "Truck") {
  $customsFilingUSD = $customsFilingUSD * .254714;
} else {
  $customsFilingUSD = $customsFilingUSD * 0.029714;
}
$customsFilingYEN = convertCurrency($customsFilingUSD, 'USD', 'JPY');

//Calculate Port Charge & Steamship Charge
if ($portofEntry == "Savannah") {
  $steamshipChargeUSD = "57.23";
} elseif ($portofEntry == "Newark") {
  $steamshipChargeUSD = "173.15";
} else {
  $steamshipChargeUSD = "157.65";
}
$steamshipChargeYEN = convertCurrency($steamshipChargeUSD, 'USD', 'JPY');

$portofEntry = $_POST["portEntry"];
if ($portofEntry == "Savannah") {
  $portChargeUSD = "76";
} elseif ($portofEntry == "Newark") {
  $portChargeUSD = "0";
} else {
  $portChargeUSD = "0";
}

$portChargeYEN = convertCurrency($portChargeUSD, 'USD', 'JPY');


// FINAL TOTAL CALCULATION
$total = $vehiclePriceB3USD + $auctionFeesUSD + $inlandTransportUSD + $preshipmentWashUSD + $roroShippingUSD + $usTitleUSD + $customsFilingUSD + $customsDutyUSD + $portChargeUSD + $steamshipChargeUSD + $profitsUSD;
// CONVERT TOTAL TO YEN
$totalYEN = convertCurrency($total, 'USD', 'JPY');

//PREPARE EVERYTHING IN PRETTY DISPLAYS
setlocale(LC_MONETARY, 'en_US.UTF8');
$vehiclePriceB3USD = money_format('$%!i', $vehiclePriceB3USD);
$vehiclePriceB3YEN = money_format('¥%!i', $vehiclePriceB3YEN);
$auctionFeesUSD = money_format('$%!i', $auctionFeesUSD);
$auctionFeesYEN = money_format('¥%!i', $auctionFeesYEN);
$inlandTransportUSD = money_format('$%!i', $inlandTransportUSD);
$inlandTransportYEN = money_format('¥%!i', $inlandTransportYEN);
$preshipmentWashUSD = money_format('$%!i', $preshipmentWashUSD);
$preshipmentWashYEN = money_format('¥%!i', $preshipmentWashYEN);
$roroShippingUSD = money_format('$%!i', $roroShippingUSD);
$roroShippingYEN = money_format('¥%!i', $roroShippingYEN);
$customsFilingUSD = money_format('$%!i', $customsFilingUSD);
$customsFilingYEN = money_format('¥%!i', $customsFilingYEN);
$customsDutyUSD = money_format('$%!i', $customsDutyUSD);
$customsDutyYEN = money_format('¥%!i', $customsDutyYEN);
$portChargeUSD = money_format('$%!i', $portChargeUSD);
$portChargeYEN = money_format('¥%!i', $portChargeYEN);
$steamshipChargeUSD = money_format('$%!i', $steamshipChargeUSD);
$steamshipChargeYEN = money_format('¥%!i', $steamshipChargeYEN);
$usTitleUSD = money_format('$%!i', $usTitleUSD);
$usTitleYEN = money_format('¥%!i', $usTitleYEN);
$jdmImporterUSD = money_format('$%!i', $profitsUSD);
$jdmImporterYEN = money_format('¥%!i', $profitsYEN);
$total = money_format('$%!i', $total);
$totalYEN = money_format('¥%!i', $totalYEN);
?>