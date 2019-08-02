<html lang="en">
	<head>
		<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
	</head>
	<body>
		<div class="container">
			<h1>Apresentação do Produto</h1>
			<table class = "table">
				<tr>
					<td><b>ID:</b><?= returnIDCorrigido($produto["id"])?>
					<td><b>Nome:</b><?= " ".$produto["nome"]?></td>
					<td><b>Descrição:</b><?= auto_typography(html_escape($produto["descricaotext"]))?></td>
					<td><b>Preço:</b><?=" ".$produto["preco"]?></td>
					<td><b>ID_Usuário</b><?= $produto["id_usuario"]?></td>
				</tr>
			</table>	
			<br>
			<hr>
			<br>
			<h2>Compre agora mesmo</h2>
			<?php
			echo form_open("vendas/nova");

			echo form_hidden("produto_id",$produto["id"]);

			echo form_label("Data de entrega", "data_de_entrega");
			echo form_input(array(
				"name" => "data_de_entrega",
				"class" => "form-control",
				"id" => "data_de_entrega",
				"maxlength" => "255",
				"value"=> ""
			));

			echo form_button(array(
				"class"=>"btn btn-primary",
				"content" =>"Comprar",
				"type" =>"submit"
			));

			echo form_close();
			?>
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
