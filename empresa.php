<?php
session_start();

if(isset($_POST['submit'])){
    include_once('conn.php');

    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    
    // Processar os resíduos selecionados
    $residuos = [];
    if(isset($_POST['residuos']) && is_array($_POST['residuos'])) {
        $residuos = $_POST['residuos'];
    }
    
    // Converter array em string separada por vírgulas
    $residuos_str = implode(', ', $residuos);
    
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    // Verificar se pelo menos um resíduo foi selecionado
    if(empty($residuos)) {
        echo "<script>
                alert('Por favor, selecione pelo menos um tipo de resíduo que sua empresa trata.');
                window.history.back();
              </script>";
        exit();
    }

    $result = mysqli_query($conn, "INSERT INTO empresa (cnpj, nome, endereco, bairro, residuo, email, telefone, senha) VALUES ('$cnpj','$nome','$endereco','$bairro','$residuos_str','$email','$telefone','$senha')");

    if($result){
        // login automático após cadastro
        $_SESSION['logado'] = true;
        $_SESSION['tipo'] = 'empresa';
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['endereco'] = $endereco;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['id'] = $cnpj;
        
        // manda pra página do dashboard da empresa
        header('Location: ../empresa_dashboard.php');
        exit();
    } else {
        echo "Erro ao cadastrar empresa: " . mysqli_error($conn);
    }
}
?>