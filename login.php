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

	<!-- <link rel="icon" type="image/jpg" href="img/choppcup.png" /> -->
	<link rel="stylesheet" href="dist/css/login.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>

	<div class="container-login" id="formlogin">		
		<form name="form_login" method="POST" action="Database/verify_user.php">
		<fieldset>	
				<!-- onsubmit="return return_form()"> -->
				<legend> Login </legend> 
				
				<div class="input-form">
					<input type="number" name="ra" class="input-RA" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" autocomplete="off" minlength="6" maxlength="6"
					value="<?php //echo $_SESSION['ra_error'];?>"> 

					<label class="label label-RA">RA</label> 
					
					<div id="invalid-RA"> <small> O RA é obrigatório. </small> </div>
				</div>	

				<div class="input-form">
					<input type="password" name="senha" class="input-senha" minlength="4" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" maxlength="8" 
					value="<?php //echo $_SESSION['senha_error']; ?>">
					<label class="label label-senha">Senha</label>

					<div class="submit-eye"><i class="fas fa-eye"></i></div>

					<div id="invalid-senha"> <small> A senha é obrigatório. </small> </div>
				</div>

				<div class="div-button">
					<!-- <button class="btn-login" name="sendLogin">Logar</button> -->
					<input type="submit" class="btn-login" name="sendLogin" value="Logar">
				</div>
			</fieldset>	
		</form>
	</div>

<script type="text/javascript" src="dist/js/login.js"></script>	
</body>
</html>

