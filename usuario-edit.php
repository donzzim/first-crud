<?php
    session_start();
    require 'conexao.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Editar</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                            $query = mysqli_query($conexao, $sql);

                            if(mysqli_num_rows($query) > 0){
                                $usuario = mysqli_fetch_array($query);
                            }
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="usuario_id" value="<?= $usuario['id'];?>">
                            <div class="mb-3">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?= $usuario['nome'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $usuario['email'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" value="<?= $usuario['data_nascimento'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php 
                        } else{
                            echo'<h5>Usuário não encontrado!</h5>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>