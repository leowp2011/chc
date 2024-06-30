<?php
	require_once 'classes/class_session.php';

	Session::Start();

	if (isset($_SESSION['logado']) AND ($_SESSION['logado'] == true))
		header("Location: index.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title> Login </title>

	<link rel="stylesheet" href="dist/css/login.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body class="body-login">

	<div class="container-login" id="formlogin">		
		<img src="https://portal.unicruz.edu.br/FrameHTML/web/app/edu/PortalEducacional/login/assets/img/logo-responsivo.png" alt="Unicruz Logo" class="logo">
		
		<form name="form_login" method="POST" action="Database/verify_user.php">
		<fieldset>

		<div class="login-box">

			<legend><b> PORTAL DO ALUNO </b></legend>
 
			<div class="input-group">
				<label for="usuario">Usuário</label>

				<input type="number" name="ra" class="input-RA" id="usuario" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" autocomplete="off" minlength="6" maxlength="6"
				value="<?php if (isset($_SESSION['ra_error'])) 
					echo $_SESSION['ra_error'];?>"> 

			</div>	

			<div class="input-group">
				<label for="senha">Senha</label>

				<input type="password" name="senha" class="input-senha" id="senha" minlength="4" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" maxlength="8" 
				value="<?php if (isset($_SESSION['ra_error'])) 
								echo $_SESSION['senha_error'];?>">

			</div>

			<div class="input-group">
				<label for="corporeRM">CorporeRM</label>
				<select id="corporeRM" name="corporeRM">
					<option value="corporeRM">CorporeRM</option>
				</select>
			</div>
			
			<input type="submit" class="login-button" name="sendLogin" value="Acessar">

            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
			
		</div>	
		
		</fieldset>	
		</form>
	</div>

<script type="text/javascript" src="dist/js/login.js"></script>	
</body>
</html>

