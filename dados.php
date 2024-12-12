<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Cliente - Academia das Maravilhas</title>
    <link rel="stylesheet" href="ifrn.css">
</head>
<body>
    <header>
        <h1>Academia das Maravilhas</h1>
        <nav>
            <a href="index.html">Início</a>
            <a href="desenvolvedores.html">Desenvolvedores</a>
            <a href="dados.php">Dados do cliente</a>
        </nav>
    </header>
    <main>
        <h2>Dados do Cliente</h2>
        <?php
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $nome = $_POST['nome'] ?? 'Não informado';
            $email = $_POST['email'] ?? 'Não informado';
            $telefone = $_POST['telefone'] ?? 'Não informado';
            $horario = $_POST['horario'] ?? 'Não informado';
            $dataNascimento = $_POST['data-nascimento'] ?? 'Não informado';
            $senha = $_POST['senha'] ?? 'Não informado';
            $corpo = $_POST['corpo'] ?? 'Não informado';
            $mesEntrada = $_POST['mes-entrada'] ?? 'Não informado';
            $avatar = $_FILES['avatar']['name'] ?? 'Não enviado';

            echo "<ul>";
            echo "<li><strong>Nome Completo:</strong> $nome</li>";
            echo "<li><strong>Email:</strong> $email</li>";
            echo "<li><strong>Telefone:</strong> $telefone</li>";
            echo "<li><strong>Horário Preferido:</strong> $horario</li>";
            echo "<li><strong>Data de Nascimento:</strong> $dataNascimento</li>";
            echo "<li><strong>Senha:</strong> (segredo!)</li>";
            echo "<li><strong>Medida da Cintura:</strong> $corpo cm</li>";
            echo "<li><strong>Mês de Entrada:</strong> $mesEntrada</li>";

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $destino = 'uploads/' . basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destino)) {
                    echo "<li><strong>Foto:</strong> <img src='$destino' alt='Avatar' width='150'></li>";
                } else {
                    echo "<li><strong>Foto:</strong> Erro ao enviar arquivo.</li>";
                }
            } else {
                echo "<li><strong>Foto:</strong> $avatar</li>";
            }

            echo "</ul>";
        } else {
            echo "<p>Nenhum dado recebido. Por favor, volte ao fórmulario e envie novamente.</p>";
        }
        ?>
    </main>
    <footer>
        <p>IFRN Campus Santa Cruz</p>
        <p>Trabalho de Autoria Web - Prof. Marcelo Figueiredo Barbosa Júnior</p>
        <p>Grupo: Júlio César Rocha, Maria Luiza e Kayla Samara</p>
    </footer>
</body>
</html>
