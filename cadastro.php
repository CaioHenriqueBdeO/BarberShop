<?php
require_once 'conexao.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_cadastro = date('Y-m-d H:i:s');

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES (:nome, :email, :senha, :data_cadastro)";
        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':data_cadastro', $data_cadastro, PDO::PARAM_STR);
        
        $stmt->execute();

        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
            <title>Cadastrar</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="css/estilo.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div id="arealogin" class="mt-5 col-md-6 offset-md-3">
                    <div>
                        <h2 id="titulo" class="mt-5">Falta Pouco!</h2>
                    </div>
                    <div id="centralizador">
                        <img src="imagens/logo.jpg" style="width: 20%; border-radius: 100%;" class="mb-3">
                    </div>
                    <form action="" method="post">
                        <div class="form-group col-md-8 offset-md-2">
                            <input type="text" id="nome" name="nome" required class="form-control"
                            placeholder="Nome" maxlength="30" style="border-left: none; border-right: none; border-top: none;">
                            <input type="email" id="email" name="email" required class="form-control mt-5"placeholder="E-mail" maxlength="40" style="border-left: none; border-right: none; border-top: none;">
                            <input type="password" name="senha" required class="form-control mt-5"
                            placeholder="Senha" maxlength="15" style="border-left: none; border-right: none; border-top: none;">
                            <input type="submit" name="cadastrar" class="btn mt-5 mb-3" id="btncuston" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>

</html>