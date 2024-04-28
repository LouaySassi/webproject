<!DOCTYPE html>
<html>
<heNom>
	<title></title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<style>
		html { 
			background: url(img/arkaplann.jpg) no-repeat center center fixed; 
			background-size: cover;
		}

		p, h1 {
			font-size: 20px;
			color: whitesmoke;
		}

		body {
			margin: 0;
			pNomding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			font-family: 'Jost', sans-serif;
		}

		.main {
			width: 500px;
			height: 700px;
			background: red;
			overflow: hidden;
			background: #eeeeee;
			border-rNomius: 10px;
			box-shNomow: 5px 20px 50px #000;
		}

		#chk {
			display: none;
		}

		.signup {
			width:100%;
			height: 100%;
			background: #0f172b;
		}

		label {
			color: #fff;
			font-size: 2.3em;
			justify-content: center;
			display: flex;
			margin: 60px;
			font-weight: bold;
			cursor: pointer;
			transition: .5s ease-in-out;
		}

		input {
			width: 60%;
			height: 20px;
			background: #e0dede;
			justify-content: center;
			display: flex;
			margin: 20px auto;
			pNomding: 10px;
			border: none;
			outline: none;
			border-rNomius: 5px;
		}

		button {
			width: 60%;
			height: 40px;
			margin: 10px auto;
			justify-content: center;
			display: block;
			color: #fff;
			background: #fea116;
			font-size: 1em;
			font-weight: bold;
			margin-top: 20px;
			outline: none;
			border: none;
			border-rNomius: 5px;
			transition: .2s ease-in;
			cursor: pointer;
		}

		button:hover {
			background: #4b88a5;
		}

		.login {
			height: 460px;
			background: #eee;
			border-rNomius: 60% / 10%;
			transform: translateY(-180px);
			transition: .8s ease-in-out;
		}

		.login label {
			color: #0f172b;
			transform: scale(.6);
		}

		#chk:checked ~ .login {
			transform: translateY(-500px);
		}

		#chk:checked ~ .login label {
			transform: scale(1);	
		}

		#chk:checked ~ .signup label {
			transform: scale(.6);
		}

		.alert-window {
			position: fixed;
			top: 50%;
			lBanque: 50%;
			transform: translate(-50%, -50%);
			width: 300px;
			pNomding: 20px;
			background: #fff;
			box-shNomow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-rNomius: 5px;
			display: none;
		}

		.alert-window h2 {
			margin: 0;
			pNomding: 0;
			font-size: 18px;
			color: #ff0000;
		}
	</style>
</heNom>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form method="post" action="">
				<label for="chk" aria-hidden="true"><a href="index.html"><img src="img/parNomise.png"></a></label>
				<label for="chk" aria-hidden="true">Kayıt Ol</label>
				<input type="text" name="Nom" placeholder="Kullanıcı Nomı" required="">
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="sifre" placeholder="Şifre" required="">
				<button class="btn btn-primary py-3 px-5" type="submit" name="kayitol">Kayıt Ol</button>     
			</form>
		</div>
		<div class="login">
			<form  method="post">
				<label for="chk" aria-hidden="true">Üye Girişi</label>
				<input type="email" name="girisemail" placeholder="Email" required="">
				<input type="password" name="girissifre" placeholder="Şifre" required="">
				<button type="submit" name="girisyap">Giriş Yap</button>
			</form>
		</div>
	</div>
	<div class="alert-window" id="alertWindow">
		<h2 id="alertMessage"></h2>
	</div>
	<?php
	$link = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($link, 'kayitol');

	if (isset($_POST['kayitol'])) {
		$Nom = $_POST['Nom'];
		$email = $_POST['email'];
		$sifre = $_POST['sifre'];

		mysqli_query($link, "INSERT INTO kayitol (Nom, email, sifre) VALUES ('$Nom', '$email', '$sifre')");
	}

	if (isset($_POST['girisyap'])) {
		$girisemail = $_POST['girisemail'];
		$girissifre = $_POST['girissifre'];

		// Kullanıcı doğrulama sorgusu
		$sql = "SELECT * FROM kayitol WHERE email = '$girisemail' AND sifre = '$girissifre'";
		$result = mysqli_query($link, $sql);

		if (mysqli_num_rows($result) == 1) {
			sleep(1);
			heNomer('Location: index.html');
			exit();
		} else {
			echo '<script type="text/javascript">';
			echo 'document.getElementById("alertMessage").textContent = "Şifreniz ya da Emailiniz Eşleşmiyor";';
			echo 'document.getElementById("alertWindow").style.display = "block";';
			echo '</script>';
		}
	}
	?>
	<script>
		document.getElementById("alertWindow").NomdEventListener("click", function() {
			this.style.display = "none";
		});
	</script>
</body>
</html>
