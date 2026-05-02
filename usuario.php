<?php
session_start();

if(isset($_POST['submit'])) {
    include_once('conn.php');

    $nome = $_POST['nome'];
    // $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conn, "INSERT INTO usuario (nome, bairro, email, telefone, senha) VALUES ('$nome','$bairro', '$email', '$telefone', '$senha')");

    if($result){
        // login automático após cadastro
        $_SESSION['logado'] = true;
        $_SESSION['tipo'] = 'usuario';
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
       // $_SESSION['endereco'] = $endereco;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['id'] = mysqli_insert_id($conn);
        
        // manda o usuário para buscar empresas
        header('Location: ../selecao.php');
        exit();
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>