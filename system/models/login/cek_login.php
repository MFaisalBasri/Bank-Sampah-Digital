
<?php
		include '../../config/koneksi.php';
		// if(isset($_POST['login'])){
		// 	$user = mysqli_real_escape_string($conn, $_POST['user']);
		// 	$pass = mysqli_real_escape_string($conn, $_POST['password']);


		// 	$data_admin = mysqli_query($conn, "SELECT * FROM admin WHERE nia = '$user' AND password = '$pass'");
		// 	$data_nasabah = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin = '$user' AND password = '$pass'");

		// 	$n = mysqli_fetch_array($data_nasabah);
		// 	$a = mysqli_fetch_array($data_admin);

		// 	// admin
		// 	$email_a = isset($a['email']);
		// 	$password_a = isset($a['password']);
		// 	$level = isset($a['level']);
		// 	$nama_a = isset($a['nama']);
		// 	$telepon_a = isset($a['telepon']);
		// 	$nia = isset($a['nia']); 	
		// 	$cek_admin = mysqli_num_rows($data_admin);
		// 	// nasabah
		// 	$email_n = isset($n['email']);
		// 	$password_n = isset($n['password']);
		// 	$nama_n = isset($n['nama']);
		// 	$telepon_n = isset($n['telepon']);
		// 	$alamat = isset($n['alamat']);
		// 	$nin = isset($n['nin']);
		// 	$rt = isset($n['rt']);
		// 	$saldo = isset($n['saldo']);
		// 	$sampah = isset($n['sampah']);
		// 	$cek_user = mysqli_num_rows($data_nasabah);

		// 	if ($user == "" || $password_a == "") {
		// 		echo "
		// 		<script>
		// 			alert('Username dan Password tidak boleh kosong!');
		// 			document.location.href ='login.php';
		// 		</script>
		// 		";
		// 	}
		// 	else {
		// 		if ($cek_admin > 0) {
		// 		session_start();
		// 		$_SESSION['level'] = $level;
		// 		$_SESSION['nama'] = $nama_a;
		// 		$_SESSION['email'] = $email_a;
		// 		$_SESSION['pass'] = $password_a;
		// 		$_SESSION['telepon'] = $telepon_a;
		// 		$_SESSION['nia'] = $nia;
		// 		echo "
		// 		<script>
		// 			alert('Selamat Anda berhasil login!');
		// 			document.location.href ='http://localhost/project-web/Bank%20Sampah%20Digital/view/dashboard.php';
		// 		</script>
		// 		";
		// 		}
		// 		else if ($cek_user > 0) {
		// 		session_start();
		// 		$_SESSION['nama_n'] = $nama_n;
		// 		$_SESSION['email_n'] = $email_n;
		// 		$_SESSION['pass_n'] = $password_n;
		// 		$_SESSION['telepon_n'] = $telepon_n;
		// 		$_SESSION['nin'] = $nin;
		// 		$_SESSION['rt'] = $rt;
		// 		$_SESSION['alamat'] = $alamat;
		// 		$_SESSION['saldo'] = $saldo;
		// 		$_SESSION['sampah'] = $sampah;
		// 		echo "
		// 			<script>
		// 				alert('Selamat Anda berhasil login!');
		// 				document.location.href ='nasabah.php';
		// 			</script>
		// 		";	
		// 		}
		// 		else {
		// 		echo "
		// 		<script>
		// 			alert('Maaf username dan password tidak valid!');
		// 			document.location.href ='login.php';
		// 		</script>
		// 		";
		// 		}
		// 	}
		// } else {header('location:login.php');}

		session_start(); // memulai session

// jika tombol "login" diklik
if(isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    // melakukan query untuk mencari user dengan username dan password yang sesuai
    $query = "SELECT * FROM admin WHERE nia = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
    // jika ditemukan user dengan username dan password yang sesuai
    if ($username == "" || $password == "") {
		echo "
		<script>
			alert('Username dan Password tidak boleh kosong!');
			document.location.href ='login.php';
		</script>
		";
	}else
	if(mysqli_num_rows($result) > 0) {
        $_SESSION['nia'] = $username; // menyimpan username ke dalam session
		echo "
		<script>
			alert('Selamat Anda berhasil login!');
			document.location.href ='http://localhost/project-web/Bank%20Sampah%20Digital/view/dashboard.php';
		</script>
		";
    
    } else {
       echo  $error = "Username atau password salah"; // pesan error
    }
}

	?>