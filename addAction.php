<html>
<head>
	<title>Cadastro</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

// Função para verificar se o e-mail é válido
function isValidEmail($email) {
    return preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
}

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// Check for empty fields
	if (empty($name) || empty($age) || empty($email) || !isValidEmail($email) || ($age <= 0) || !is_numeric($age)) {
    echo "<font color='red'>Cadastro não realizado devido ao seguinte erro: </font><br/>";
    if (empty($name)) {
        echo "Campo nome vazio.<br/>";
    }

    if (empty($age)) {
        echo "Campo idade vazio.<br/>";
    } elseif (!is_numeric($age)) {
    echo "A idade deve ser um número.<br/>";
	} elseif ($age <= 0) {
    echo "A idade deve ser maior que zero.<br/>";
	}
    if (empty($email)) {
        echo "Campo e-mail vazio.<br/>";
    } elseif (!isValidEmail($email)) {
        echo "E-mail inválido.<br/>";
    }

    // Show link to the previous page
    echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
}
 else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')");
		
		// Display success message
		echo "<p><font color='green'>Cadastro realizado com sucesso!</p>";
		echo "<a href='index.php'>Voltar para a pagina inicial</a>";
	}
}
?>
</body>
</html>
