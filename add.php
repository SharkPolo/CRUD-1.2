<html>
<head>
	<title>Cadastro</title>
</head>

<body>
	<h2>Cadastro</h2>
	

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Nome:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Idade:</td>
				<td><input type="text" name="age"></td>
			</tr>
			<tr> 
				<td>E-mail:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Cadastrar"></td>
			</tr>
		</table>
	</form>
	<p>
		<a href="index.php">Voltar</a>
	</p>
</body>
</html>

