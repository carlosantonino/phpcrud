<?php require_once './conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastrar</title>
</head>
<body>       
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($dados['CadUsuario'])){
            // var_dump($dados);

            $empty_input = false;

            $dados = array_map('trim', $dados);
            if(in_array("", $dados)){
                $empty_input = true;
                echo "Necessário preencher todos os campos";
            } elseif(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)){
                $empty_input = true;
                echo "Necessario preencher com email válido.";
            }
            // var_dump($dados);
            if(!$empty_input){
                $query_usuario = "INSERT INTO usuarios (nome , email) VALUES (:nome, :email)";
                $cad_usuario = $conn -> prepare($query_usuario);
                $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $cad_usuario -> execute();                
                if($cad_usuario->rowCount()){
                    echo "<p style='color:green'>Usuario cadastrado com sucesso</p>";
                } else {
                    echo "Erro, usuário não foi cadastrado com sucesso";
                }
            }          
            
        }

        ?>
    <div class="container">
    <h1 class="text-center mt-5">Cadastrar</h1>
        <form class="form-group" name="cad-usuario" action="" method="POST">
            <label class="label-control" for="">Nome:</label>
            <input class="form-control mb-2" type="text" name="nome" id="nome" placeholder="Nome completo">
            <label class="label-control" for="">E-mail</label>
            <input class="form-control mb-2" type="email" name="email" id="email" placeholder="Email">
            <input class="btn btn-primary" type="submit" value="Cadastrar" name="CadUsuario" >
        </form>
    </div>
    
</body>
</html>