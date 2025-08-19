<?php 
    session_start();
    require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include 'mensagem.php'?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Usuários
                            <a href="usuarios-create.php" class="btn btn-primary float-end">Adicionar usuários</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = 'SELECT * FROM usuarios';
                                    $usuarios = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($usuarios) > 0){
                                        foreach($usuarios as $usuario){
                                ?>
                                <tr>
                                    <td><?= $usuario['id']?></td>
                                    <td><?= $usuario['nome']?></td>
                                    <td><?= $usuario['email']?></td>
                                    <td><?= date('d/m/Y', strtotime($usuario['data_nascimento']))?></td>
                                    <td>
                                        <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span class="fa fa-eye"></span> Visualizar</a>
                                        <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span> Editar</a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_usuario" value="<?= $usuario['id']?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Excluir</button>
                                        </form>    
                                    </td>
                                </tr>
                                <?php
                                    }
                                    }
                                    else{
                                        echo'<h5>Nenhum usuário encontrado!</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>