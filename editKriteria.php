<?php
	include "config.php";
	$sql=mysqli_query($connect, "select *from kriteria where id_criteria='$_GET[id]'");
	$data=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="adminkit-dev/static/img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Alternatif</title>
	<link href="adminkit-dev/static/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>


		<style>
			table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
			position: absolute;
			}

			td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
			}

			tr{
				height: 35px;
			}

			tr:nth-child(even) {
			background-color: rgba(150, 212, 212, 0.4);
			}

			.card-footer{
				top: 500px;
			}

		</style>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
					<span class="align-middle">SPK</span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Metode SMART-TOPSIS
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="alternatif.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Alternatif</span>
            			</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="kriteria.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Kriteria</span>
            			</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="tambah-matriks.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Tambah Matriks</span>
            			</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="perhitungan.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Perhitungan</span>
            			</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="logout.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Logout</span>
            			</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Edit Data <strong>Kriteria</strong></h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
								<form action="updateKriteria.php" method="post">
									<table>
										<tr>
											<label name="kriteria"> Kriteria </label>
											<input type="text" name="kriteria" class="form-control" value="<?php echo $data['kriteria']; ?>">
										</tr>
                                        <tr>
											<label name="keterangan"> Keterangan </label>
											<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>">
										</tr>
										<tr>
											<label name="bobot"> Bobot </label>
											<input type="text" name="bobot" class="form-control" value="<?php echo $data['bobot']; ?>">
										</tr>	
                                        <tr>
											<label name="tipe"> Tipe </label>
											<input type="text" name="tipe" class="form-control" value="<?php echo $data['tipe']; ?>">
										</tr>
										<tr>
											<br>
											<button class="btn btn-primary" type="submit" name="proses" value="Update"> Update </button>
										</tr>
									</table>
								</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="" target="_blank"><strong>Sistem Pendukung Keputusan</strong></a> - <a class="text-muted" href="" target="_blank"><strong>Kelompok 6 SIB 3D</strong></a>								&copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>