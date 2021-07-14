<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fed Legal Cost Estimator</title>
      <style>
      .center_div{
    margin: 0 auto;
    width:80% /* value of your choice which suits your alignment */
}
    </style>
  </head>
  <body>

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>