<?php
session_start();
ob_start();
require_once 'conexao.php';

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            header('Location: index.php?id=' . $usuario['id'] . '&nome=' . urlencode($usuario['nome']));
            exit; 
        } else {
            echo "E-mail ou senha incorretos!";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
    </head
    >
    <body>
        <div class="container">
            <div class="row">
                <div id="arealogin" class="mt-5 col-md-6 offset-md-3">
                    <div>
                        <h2 id="titulo" class="mt-5">Bem vindo!</h2>
                    </div>
                    <div id="centralizador">
                        <img src="imagens/logo.jpg" style="width: 20%; border-radius: 100%;" class="mb-3">
                    </div> 
                    <form action="" method="post">
                        <div class="form-group grupos col-md-8 offset-md-2">
                            <input type="email" id="email" name="email" required class="form-control" placeholder="E-mail" style="border-left: none; border-right: none; border-top: none;">
                            <input type="password" id="senha" name="senha" required class="form-control mt-5" placeholder="Senha" style="border-left: none; border-right: none; border-top: none;">
                            <input type="submit" name="entrar" id="btncuston" class="btn mt-5" value="Entrar">
                        </div>
                    </form>
                    <p class="mt-5 text-center">Ainda não é Cliente? <a href="cadastro.php">Registre-se.</a></p>
                </div>
            </div>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>

</html>
