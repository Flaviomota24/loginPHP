<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
			margin: 50px auto;
			max-width: 500px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		input[type="text"], input[type="password"] {
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
			width: 100%;
			margin-bottom: 20px;
		}
		button[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.2s;
		}
		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.error {
			color: red;
			font-weight: bold;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>

	<?php

	// Inicia a sessão
	session_start();

	// Verifica se o usuário já está logado
	if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
		header('Location: principal.php');
		exit;
	}

	// Verifica se o formulário foi enviado
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		// Verifica se o usuário e senha estão corretos
		if ($_POST['usuario'] == 'usuario' && $_POST['senha'] == 'senha') {
			
			// Define a variável de sessão "logado" como true
			$_SESSION['logado'] = true;
			
			// Redireciona para a página principal
			header('Location: principal.php');
			exit;
		} else {
			$erro = 'Usuário ou senha inválidos.';
		}
	}

	?>

	<form method="POST">
		<h1>Login</h1>

		<?php if (isset($erro)) { ?>
			<p class="error"><?php echo $erro; ?></p>
		<?php } ?>

		<label>Usuário:</label>
		<input type="text" name="usuario" required>

		<label>Senha:</label>
		<input type="password" name="senha" required>

		<button type="submit">Entrar</button>
	</form>

</body>
</html>
