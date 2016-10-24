
<form action="http://uherederosw1617.hol.es/lab4/login.php" method="post" accept-charset="UTF-8"> 
	<h2>Identificación de usuario </h2>
		<p> Email : <input type="email" required name="email"  value="email" />
		<p> Password: <input type="password" required name="password" value="password" /> 
		<p> <input id="input_2" type="submit" value="Entrar" />
</form>
<span><a href='layout.html'>Inicio</a></spam>

<?php
if(isset($_POST["password"]))
	$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
	if ($connect) {
		$email=$_POST["email"];
		$password=$_POST["password"];
		$sql="SELECT * FROM Usuario WHERE email='$email' and password='$password'";
		$resultado=mysqli_query($connect,$sql);
		$contador=mysqli_num_rows($resultado);
		mysqli_close($resultado);
		if($contador==1){
			$sql="SELECT * FROM Conexiones";
			$resultado=mysqli_query($connect,$sql);
			$identificador=mysqli_num_rows($resultado);
			mysqli_close($resultado);
			$hora=date("H:i:s", time());
			$sql="INSERT Conexiones (identificador,email,hora) VALUES('$identificador','$email','$hora')";
			if(!mysqli_query($connect,$sql)){
					die('Error: ' .mysqli_error($connect));
			}
			header('Location: http://uherederosw1617.hol.es/lab4/insertarPregunta.php');
		}
		else{
			echo"DATOS INCORRECTOS.";
		}

		mysqli_close($connect);
	}

?>