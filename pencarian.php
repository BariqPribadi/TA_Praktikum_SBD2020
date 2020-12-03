<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Pencarian</h3>
				</div>
				<div class="panel-body">
					<form action="cari.php" method="get">
						<div class="form-group">
							<label>Cari Apa?</label>
							<input type="text" class="form-control" name="keyword" placeholder="Masukkan Keyword">
						</div>
						<button class="btn btn-primary">Search</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><br>

</body>
</html>