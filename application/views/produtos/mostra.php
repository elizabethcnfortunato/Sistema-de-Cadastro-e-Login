<html lang="en">
	<head>
		<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
	</head>
	<body>
		<div class="container">
			<h1>Apresentação do Produto</h1>
			<table class = "table">
				<tr>
					<td><?= returnIDCorrigido($produto["id"])?>
					<td><?= $produto["nome"]?></td>
					<td><?= $produto["descricaotext"]?></td>
					<td><?= $produto["preco"]?></td>
					<td><?= $produto["id_usuario"]?></td>
				</tr>
			</table>			
		</div>
	</body>
</html>
<?php
function returnIDCorrigido($par){
	if($par <10){
		$a = "0".$par;
   }else{
		$a = $par;
   }
   return $a;
}

?>
