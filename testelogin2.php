<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno - Unicruz</title>

    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #002D75;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    text-align: center;
}

.logo {
    width: 150px;
    margin-bottom: 20px;
}

.login-box {
    background-color: #F5F5F5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.login-box h2 {
    margin: 0;
    color: #4C4C4C;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #4C4C4C;
}

.input-group input, .input-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.login-button {
    width: 100%;
    padding: 10px;
    background-color: #A5264C;
    color: #FFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.login-button:hover {
    background-color: #8D2041;
}

.forgot-password {
    display: block;
    margin-top: 15px;
    color: #4C4C4C;
    text-decoration: none;
}

.forgot-password:hover {
    text-decoration: underline;
}
    </style>


</head>
<body>
    <div class="login-container">
        <img src="https://home.unicruz.edu.br/wp-content/uploads/2022/04/logo-horizontal-PNG.png alt="Unicruz Logo" class="logo">
        <div class="login-box">
            <h2>PORTAL DO ALUNO</h2>
            <form action="#">
                <div class="input-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario">
                </div>
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <div class="input-group">
                    <label for="corporeRM">CorporeRM</label>
                    <select id="corporeRM" name="corporeRM">
                        <option value="corporeRM">CorporeRM</option>
                    </select>
                </div>
                <button type="submit" class="login-button">ACESSAR</button>
            </form>
            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
        </div>
    </div>
</body>
</html>