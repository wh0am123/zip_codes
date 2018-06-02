<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title>Conversor</title>
	<script src="angular.min.js"></script>
</head>
<body>
	<form action="php/process.php" method="post">
	<label for="postcode1">Código Postal #1</label>
	<input type="text" id="etc" ng-model="cp1" name="postcode1">
	<br>
	<label for="postcode2">Código Postal #2</label>
	<input type="text" id="etc" ng-model="cp2" name="postcode2">
	<br>
	<button type="submit">Procesar</button>
	</form>
</body>
</html>