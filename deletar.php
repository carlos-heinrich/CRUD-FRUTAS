<!DOCTYPE html>
<html>
<head>
    <title>Deletar </title>
    <link rel='stylesheet' href='style.css'> 
</head>
<body>
    <h1>Deletar </h1>
    <?php
    include 'db.php';

    if(!isset($_GET['id'])){
        header('location: listar.php');
        exit;
    }

    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
    $stmt->execute([$id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$client) {
        header('location: listar.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $stmt = $pdo->prepare('DELETE FROM cliente WHERE id = ?');
        $stmt->execute([$id]);
        header('location: listar.php');
        exit;
    }
    ?>
    <p>tem certeza que deseja deletar de
        <?php echo $client['nome']; ?> 
        <?php echo $client['email']; ?> 
        <?php echo $client['telefone']; ?> 
       em <?php echo date('d/m/y',strtotime($client['data_de_nascimento'])); ?></p>   
    <form method="post">
        <button type="submit">sim</button>
        <button type="button" onclick="window.location.href = 'listar.php';">Não</button>
    </form>
</body>
</html>
