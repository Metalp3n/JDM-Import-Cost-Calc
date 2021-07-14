<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fed Legal Cost Estimator</title>
    
    <style>
      .center_div{
    margin: 0 auto;
    width:95% /* value of your choice which suits your alignment */
}
    </style>
  </head>
  <body>

<div class="container center_div">
    <div class="row">
    <div class="col-md-12">
      <h2><center>JDM Importer Cost Estimator</center></h2>
      <h3><center>Total Fees</center></h3>
    </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			
            <?php
include "config.inc.php";


// Get Vehicle Price & convert
$vehiclePriceB3YEN = $_POST["vehiclePriceB3"];
$vehiclePriceB3USD =  convertCurrency($vehiclePriceB3YEN, 'JPY', 'USD');
//...
//..
//.

//Setup Basic Pricing Variables
//Auction Fees Calculation
$auctionFeesYEN = $vehiclePriceB3YEN*0.05;
$auctionFeesYEN = $auctionFeesYEN + 70000;
if ($auctionFeesYEN < 80000) {
  $auctionFeesYEN = "80000";
}
//Setup Auction Fees in YEN & USD
$auctionFeesYEN = roundUpToNearestThousand($auctionFeesYEN);
$auctionFeesUSD = convertCurrency($auctionFeesYEN, 'JPY', 'USD');
//...
//..
//.

//Remaining Basic Pricing Variables & Conversions
$inlandTransportYEN = "38000";
$inlandTransportUSD = convertCurrency($inlandTransportYEN, 'JPY', 'USD');
$preshipmentWashYEN = "5000";
$preshipmentWashUSD = convertCurrency($preshipmentWashYEN, 'JPY', 'USD');
$roroShippingYEN = "98000";
$roroShippingUSD = convertCurrency($roroShippingYEN, 'JPY', 'USD');
$usTitleUSD = "275";
$usTitleYEN = convertCurrency($usTitleUSD, 'USD', 'JPY');
//Customs Filing Formmula
$customsFilingUSD = $inlandTransportUSD + $preshipmentWashUSD + $roroShippingUSD + $vehiclePriceB3USD + $auctionFeesUSD;
$vehicleType = $_POST["vehicleType"];
if ($vehicleType == "Truck") {
  $customsFilingUSD = $customsFilingUSD * .254714;
} else {
  $customsFilingUSD = $customsFilingUSD * 0.029714;
}
$customsFilingYEN = convertCurrency($customsFilingUSD, 'USD', 'JPY');
//Remaining Basic Pricing Variables & Conversions
$customsDutyUSD = "240";
$customsDutyYEN = convertCurrency($customsDutyUSD, 'USD', 'JPY');

//Calculate Port Charge
//...
//..
//.
$portofEntry = $_POST["portEntry"];
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


//THIS IS WHERE YOU MAKE MONEY
//SET PROFIT IN USD
$jdmImporterUSD = "1000";
$jdmImporterYEN= convertCurrency($jdmImporterUSD, 'USD', 'JPY');

// FINAL TOTAL CALCULATION
$total = $vehiclePriceB3USD + $auctionFeesUSD + $inlandTransportUSD + $preshipmentWashUSD + $roroShippingUSD + $usTitleUSD + $customsFilingUSD + $customsDutyUSD + $portChargeUSD + steamshipChargeUSD + $jdmImporterUSD;
// CONVERT TOTAL TO YEN
$totalYEN = convertCurrency($total, 'USD', 'JPY');

//PREPARE EVERYTHING IN PRETTY DISPLAYS
//...
//..
//.
$vehiclePriceB3USD = money_format('$%i', $vehiclePriceB3USD);
$auctionFeesUSD = money_format('$%i', $auctionFeesUSD);
$inlandTransportUSD = money_format('$%i', $inlandTransportUSD);
$preshipmentWashUSD = money_format('$%i', $preshipmentWashUSD);
$roroShippingUSD = money_format('$%i', $roroShippingUSD);
$customsFilingUSD = money_format('$%i', $customsFilingUSD);
$customsDutyUSD = money_format('$%i', $customsDutyUSD);
$portChargeUSD = money_format('$%i', $portChargeUSD);
$steamshipChargeUSD = money_format('$%i', $steamshipChargeUSD);
$usTitleUSD = money_format('$%i', $usTitleUSD);
$jdmImporterUSD = money_format('$%i', $jdmImporterUSD);
$total = money_format('$%i', $total);
$totalYEN = money_format('¥%i', $totalYEN);


//START DISPLAY
//...
//..
//.
?>

<table class="table table-sm">
<tbody>
  <tr>
    <td>Winning Bid:</td>
    <td><?=$vehiclePriceB3YEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$vehiclePriceB3USD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Auction Fees:</td>
    <td><?=$auctionFeesYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$auctionFeesUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Inland Transport:</td>
    <td><?=$inlandTransportYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$inlandTransportUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Preshipment Wash:</td>
    <td><?=$preshipmentWashYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$preshipmentWashUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>RoRo Shipping:</td>
    <td><?=$roroShippingYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$roroShippingUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Customs Filing:</td>
    <td><?=$customsFilingYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$customsFilingUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Customs Duty:</td>
    <td><?=$customsDutyYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$customsDutyUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Port Charge:</td>
    <td><?=$portChargeYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$portChargeUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Steamship Charge:</td>
    <td><?=$steamshipChargeYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$steamshipChargeUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>US Title Fee:</td>
    <td><?=$usTitleYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$usTitleUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>JDM Importer Service Fee:</td>
    <td><?=$jdmImporterYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$jdmImporterUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
   <tr class="success">
    <td>Total:</td>
    <td><?=$totalYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$total?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
</tbody>
</table>
 
<?php
//echo "Vehicle Price: $vehiclePriceB3YEN JPY // $vehiclePriceB3USD USD
//<br>Auction Fees: $auctionFeesYEN JPY // $auctionFeesUSD USD
//<br>Inland Transport: $inlandTransportYEN JPY // $inlandTransportUSD USD
//<br>Preshipment Wash: $preshipmentWashYEN JPY // $preshipmentWashUSD USD
//<br>RoRo Shipping: $roroShippingYEN JPY // $roroShippingUSD USD
//<br>Customs Filing: $customsFilingYEN JPY // $customsFilingUSD USD
//<br>Customs Duty: $customsDutyYEN JPY // $customsDutyUSD USD
//<br>Port Charge ($portofEntry): $portChargeUSD USD
//<br>Steamship Charge: $steamshipChargeUSD USD
//<br>";

//echo "<br><br>";

//echo "<h3>Total: ".$totalYEN. " JPY // ".$total." USD</h3>";
//echo "<br><br>";
?>

		</div>
	</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>