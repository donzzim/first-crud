<?php
    require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Visualizar</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Usuário
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
                        <div class="mb-3">
                            <label for="">Nome</label>
                            <p class="form-control">
                                <?= $usuario['nome'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <p class="form-control">
                                <?= $usuario['email'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">Data de Nascimento</label>
                            <p class="form-control">
                                <?= date('d/m/Y',strtotime($usuario['data_nascimento']))?>
                            </p>
                        </div>
                        <?php 
                        }
                        else{
                            echo'<h5>Usuário não encontrado</h5>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>