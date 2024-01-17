<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>CRU Vinicius</title>
</head>

<body>
	<h2>CRUD - Desenvolvido por Vinicius Polo</h2>
	<p>
		<a href="add.php">Cadastrar novo aluno</a>
	</p>
	<table width='100%' border=0>
		<tr bgcolor='#DDDDDD'>



			<td><strong>Nome</strong></td>
			<td><strong>Idade</strong></td>
			<td><strong>Email</strong></td>

			<td><strong>Ações</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['email']."</td>";




			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <td><a href=\"delete.php?id=$res[id]\">Apagar</a>";
			
		}
		?>
	</table>
</body>
</html>
