
<?php
include '../../config/koneksi.php';

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
		session_start(); // memulai session
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