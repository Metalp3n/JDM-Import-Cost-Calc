<?php
include "includes/header.inc.php";

?>

<div class="container center_div">
  <div class="row">
    <div class="col-md-12">
      <h2><center>JDM Importer Cost Estimator</center></h2>
    </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			<form action="price.php" method="POST">
				<div class="row">
				  <div class="col-md-12">
				    <div class="form-group">
				    <label>Vehicle Price (YEN)</label>
				<input type="text" class="form-control" name="vehiclePriceB3" title="vehiclePrice" id="vehiclePrice">
				</div>
				  </div>
				  <div class="col-md-12">
				    <div class="form-group">
				      <label>Vehicle Type</label>
				    <select id="vehicleType" class="form-control" name="vehicleType">
				      <option value="Car">Passenger Car</option>
				      <option value="Truck">Truck</option>
				    </select>
				    </div>
				  </div>
				  <div class="col-md-12">
				    <div class="form-group">
				    <label>Port of Entry</label>
				    <select id="portEntry" class="form-control" name="portEntry">
				      <option value="Savannah">Savannah</option>
				      <option value="Newark">Newark</option>
				      <option value="Baltimore">Baltimore</option>
				    </select>
				    </div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-12">
				    <input type="submit" class="btn btn-primary mb-2" style="width:100%">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include "includes/footer.inc.php";

?>