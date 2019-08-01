<html lang="en">
	<head>
		<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro de Novo Produto</h1>

			<?php 
				echo form_open("produtos/novo"); 

				echo form_label("Nome","nome");
				echo form_input(array(
					"name" => "nome",
					"class" => "form-control",
					"id" => "nome",
					"maxlength" => "255",
					"value"=>set_value("nome","")
					));
			
					echo form_error("nome");
				
					echo form_label("Preco","preco");
				echo form_input(array(
					"name" => "preco",
					"class" => "form-control",
					"id" => "preco",
					"maxlength" => "255",
					"type" => "number",
					"value" =>set_value("preco","")
					));
					echo form_error("preco");
				echo form_textarea(array(
					"name" => "descricao",
					"class" => "form-control",
					"id"=>"descricao",
					"value" => set_value("descricao","")
					
				));

				echo form_error("preco");

				echo form_button(array(
					"class"=>"btn btn-primary",
					"content" =>"Salve",
					"type" =>"submit"
				));

				echo form_close();
			?>
		</div>
	</body>
</html>
