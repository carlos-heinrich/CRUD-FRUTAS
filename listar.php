<?php include 'db.php'; ?>
<IDOCTYPE html> 
<html>
<head>
<link rel='stylesheet' href='style.css'> 
<title>Quitanda</title> </head>
<body class='listar'>
<h1>Quitanda</h1>
<?php
$stmt = $pdo->query('SELECT * FROM frutas ORDER BY nome');
 $frutas = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($frutas)== 0) {
echo '<p>Nenhuma fruta.</p>';
} else {
echo '<table border="1">';
echo '<thead><tr><th>Nome</th> <th>Tamanho</th> <th>peso</th><th>quntidade</th><th>preço</th><th colspan="2">
Opções</th></tr></thead>';
echo '<tbody>';

foreach ($frutas as $fruta) {
echo '<tr>';
echo '<td>' . $fruta['nome'] . '</td>';
echo '<td>' . $fruta['tamanho'] . '</td>'; 
echo '<td>' . $fruta['peso'] . '</td>';
echo '<td>' . $fruta['quantidade'] . '</td>';
echo '<td>' . $fruta['preço'] . '</td>';
echo '<td><a style="color:black;" href="atualizar.php?id='.$fruta['id'] . '">Atualizar</a></td>';
echo '<td><a style="color:black;" href="deletar.php?id='.$fruta['id'] .'">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?>
<h1>cliente</h1>
<?php
$stmt = $pdo->query('SELECT * FROM cliente ORDER BY nome');
 $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente)== 0) {
echo '<p>Nenhum cliente.</p>';
} else {
echo '<table border="1">';
echo '<thead><tr><th>Nome</th> <th>E-mail</th> <th>Telefone</th><th>Data</th><th colspan="2">
Opções</th></tr></thead>';
echo '<tbody>';

foreach ($cliente as $clientes) {
echo '<tr>';
echo '<td>' . $clientes['nome'] . '</td>';
echo '<td>' . $clientes['email'] . '</td>'; 
echo '<td>' . $clientes['telefone'] . '</td>';
echo '<td>' . date('d/m/Y', strtotime($clientes['data_de_nascimento'])) . '</td>';
echo '<td><a style="color:black;" href="atualizar.php?id='.$clientes['id'] . '">Atualizar</a></td>';
echo '<td><a style="color:black;" href="deletar.php?id='.$clientes['id'] .'">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?>
</body>

</html>