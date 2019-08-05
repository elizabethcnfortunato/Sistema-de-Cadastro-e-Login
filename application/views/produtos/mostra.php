
			<h1>Apresentação do Produto</h1>
			<table class = "table">
				<tr>
					<th><b>ID</b>
					<th><b>Nome</b></th>
					<th><b>Descrição</th>
					<th><b>Preço</b></th>
					<th><b>ID_Usuário</b></th>
				</tr>
				<tr>
					<td><?= returnIDCorrigido($produto["id"])?></td>
					<td><?= " ".$produto["nome"]?></td>
					<td><?= auto_typography(html_escape($produto["descricaotext"]))?></td>
					<td><?=" ".$produto["preco"]?></td>
					<td><?= $produto["id_usuario"]?></td>
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
