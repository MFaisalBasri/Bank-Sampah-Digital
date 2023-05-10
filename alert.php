<!DOCTYPE html>
<html>
<head>
	<title>Contoh Alert</title>
	<style>
	.alert {
        width: 350px;
		padding: 15px;
		background-color: #f44336;
		color: white;
	}

	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	.closebtn:hover {
		color: black;
	}
	</style>
</head>
<body>

	<div class="alert">
	  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
	  <strong>Perhatian!</strong> Ini adalah contoh alert.
	</div>

</body>
</html>