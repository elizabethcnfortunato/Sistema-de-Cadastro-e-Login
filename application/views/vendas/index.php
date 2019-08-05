<html lang="en">
	<head>
		<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
	</head>
	<body>
		<div class="container">
			<?php foreach($produtosVendidos as $produto): ?>
				<h2> Vendas/index </h2>
				<table class = "table table-hover">
					<tr>
						<th>Nome:</th>
						<th>Preço:</th>
						<th>Data de Entrega:</th>
					</tr>
					<tr>
						<td><?= $produto["nome"]?></td>
						<td><?= $produto["preco"]?></td>
						<td><?= dataMysqlParaPtBr($produto["date_de_entrega"])?></td>
					</tr>
				</table>
		
			<?php endforeach;?>
		</div>
	</body>
 
</html>
