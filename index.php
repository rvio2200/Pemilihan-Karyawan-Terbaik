<?php
	//aksi login
if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='login') {
			
		session_start();
		include 'assets/conn/config.php';
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query=mysqli_query($conn,"SELECT * FROM tbl_akun WHERE email='$email' AND password='$password'");
		$cek = mysqli_num_rows($query);

		if ($cek > 0) {
			$data = mysqli_fetch_assoc($query);

			if ($data['level']=='Admin') {

				$_SESSION['email'] = $email;
				$_SESSION['level'] = "Admin";
				header("location:admin/index.php");
			
			}elseif ($data['level']=='Area Coordinator') {

				$_SESSION['email'] = $email;
				$_SESSION['level'] = "Area Coordinator";
				header("location:arco/index.php");

			}
		}else{
			header("location:index.php?pesan=gagal");
		}


	}
		
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PEMILIHAN KARYAWAN TERBAIK</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/desain-login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/desain-login/css/main.css">
	<style>
        .image-container {
    text-align: center; /* Untuk mengatur gambar menjadi tengah secara horizontal */
    margin-bottom: 20px; /* Jarak bawah antara gambar dan teks berikutnya */
}

.image-container img {
    max-width: 100%; /* Agar gambar tidak melebihi lebar kontainer */
    height: auto; /* Gambar akan menyesuaikan tinggi sesuai aspek rasio */
}
    </style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="index.php?aksi=login" method="POST">
					
					<?php
    				if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
       					 echo "<div class='alert alert-danger' role='alert'><span class='fa fa-info-circle'></span>&nbsp;Login Gagal!!</div><br>";
    				}	
					?>

					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						Nestle Agency Team
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="assets/desain-login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/desain-login/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/desain-login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/desain-login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/desain-login/vendor/select2/select2.min.js"></script>
	<script src="assets/desain-login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/desain-login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/desain-login/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/desain-login/js/main.js"></script>

</body>
</html>