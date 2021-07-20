<?php 
include "includes/config.inc.php";
include "includes/header.inc.php"; 

// Get Submitted Variables
$vehiclePriceB3YEN = $_POST["vehiclePriceB3"];
$vehicleType = $_POST["vehicleType"];
$portofEntry = $_POST["portEntry"];

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
$profitsUSD = "1000"; // SET PROFIT HERE IN USD
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
$total = $vehiclePriceB3USD + $auctionFeesUSD + $inlandTransportUSD + $preshipmentWashUSD + $roroShippingUSD + $usTitleUSD + $customsFilingUSD + $customsDutyUSD + $portChargeUSD + steamshipChargeUSD + $jdmImporterUSD;
// CONVERT TOTAL TO YEN
$totalYEN = convertCurrency($total, 'USD', 'JPY');

//PREPARE EVERYTHING IN PRETTY DISPLAYS
$vehiclePriceB3USD = money_format('$%i', $vehiclePriceB3USD);
$vehiclePriceB3YEN = money_format('¥%i', $vehiclePriceB3YEN);
$auctionFeesUSD = money_format('$%i', $auctionFeesUSD);
$auctionFeesYEN = money_format('¥%i', $auctionFeesYEN);
$inlandTransportUSD = money_format('$%i', $inlandTransportUSD);
$inlandTransportYEN = money_format('¥%i', $inlandTransportYEN);
$preshipmentWashUSD = money_format('$%i', $preshipmentWashUSD);
$preshipmentWashYEN = money_format('¥%i', $preshipmentWashYEN);
$roroShippingUSD = money_format('$%i', $roroShippingUSD);
$roroShippingYEN = money_format('¥%i', $roroShippingYEN);
$customsFilingUSD = money_format('$%i', $customsFilingUSD);
$customsFilingYEN = money_format('¥%i', $customsFilingYEN);
$customsDutyUSD = money_format('$%i', $customsDutyUSD);
$customsDutyYEN = money_format('¥%i', $customsDutyYEN);
$portChargeUSD = money_format('$%i', $portChargeUSD);
$portChargeYEN = money_format('¥%i', $portChargeYEN);
$steamshipChargeUSD = money_format('$%i', $steamshipChargeUSD);
$steamshipChargeYEN = money_format('¥%i', $steamshipChargeYEN);
$usTitleUSD = money_format('$%i', $usTitleUSD);
$usTitleYEN = money_format('¥%i', $usTitleYEN);
$jdmImporterUSD = money_format('$%i', $profitsUSD);
$jdmImporterYEN = money_format('¥%i', $profitsYEN);
$total = money_format('$%i', $total);
$totalYEN = money_format('¥%i', $totalYEN);
?>

        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Total Import Cost: <em><?=$total;?></em></h1>
                            
                           
                            <div class="container totalCost">
  <div class="row">
    <div class="col-md-12">

<table class="table table-hover">
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
    <td>Customs Filing for a <?=$vehicleType?>:</td>
    <td><?=$customsFilingYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$customsFilingUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Customs Duty:</td>
    <td><?=$customsDutyYEN?> <span class="badge badge-pill badge-warning">JPY</span></td>
    <td><?=$customsDutyUSD?> <span class="badge badge-pill badge-success">USD</span></td>
  </tr>
  <tr>
    <td>Port Charge for <?=$portofEntry?>:</td>
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
   <tr class="thead-dark">
    <th>Total:</th>
    <th><?=$totalYEN?> <span class="badge badge-pill badge-warning">JPY</span></th>
    <th><?=$total?> <span class="badge badge-pill badge-success">USD</span></th>
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



                        </div>
                    </div>
                </div>
            </div>
        </header>



<!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
              <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Ready To Get Started?</h2>
                    </div>
              </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                            <h3>Fully Responsive</h3>
                            <p class="lead mb-0">This calculator will look great on any device, no matter the size!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Bootstrap 5 Ready</h3>
                            <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5 framework!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Want To Check Another Car?</h2>
                        
                                <form class="form-subscribe" id="jdmForm" action="price.php" method="post">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Vehicle Price (YEN)</label>
                                        <input class="form-control form-control-lg" name="vehiclePriceB3" title="vehiclePrice" id="vehiclePrice" type="text" placeholder="500000" required />
                                    </div>
                                     <div class="col-lg-4">
                                        <label>Vehicle Type</label>
                                         <select id="vehicleType" class="form-control form-control-lg" name="vehicleType">
                                          <option value="Car">Passenger Car</option>
                                          <option value="Truck">Truck</option>
                                         </select>
                                    </div>
                                     <div class="col-lg-4">
                                        <label>Desired Port of Entry</label>
                                        <select id="portEntry" class="form-control form-control-lg" name="portEntry">
                                          <option value="Savannah">Savannah</option>
                                          <option value="Newark">Newark</option>
                                          <option value="Baltimore">Baltimore</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-lg-12"><button class="btn btn-primary btn-lg" id="submitButton" type="submit" width="100%">Submit</button></div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
   <?php include "includes/footer.inc.php"; ?>