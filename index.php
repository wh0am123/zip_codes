<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title>Conversor</title>
	<script src="angular.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
	<form action="php/process.php" method="post" class="form" style="margin-top: 10%;">
	<div class="row" style="display: flex;justify-content: center;">
		<div class="col-sm-3">
	<label for="postcode1">Código Postal #1</label>
	<input type="text" id="etc" ng-model="cp1" name="postcode1" class="form-control">
</div>
	<div class="col-sm-3">
	<label for="postcode2">Código Postal #2</label>
	<input type="text" id="etc" ng-model="cp2" name="postcode2" class="form-control">
	</div>
</div>
<div class="row" style="display:flex;justify-content: center;margin: 1% 32%;">
	<div class="col-sm-3">
	<button type="submit" class="btn btn-success">Procesar</button>
	</div>
</div>

	</form>
</body>
</html>
