<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Check for empty fields
	if (empty($name) || empty($age) || empty($email)) {

		echo "<font color='red'>Edição não realizada devido ao seguinte erro: </font><br/>";

		if (empty($name)) {
			echo "Campo nome vazio.<br/>";
		}
		
		if (empty($age)) {
			echo "Campo idade vazio.<br/>";
		}
		
		if (empty($email)) {
			echo "Campo e-mail vazio.<br/>";
		}

	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email' WHERE `id` = $id");
		
		// Display success message
		echo "<p>Cadastro atualizado com sucesso!</p>";
		echo "<a href='index.php'>Voltar a pagina inicial</a>";
	}
}
