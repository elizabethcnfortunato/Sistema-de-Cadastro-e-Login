<?php
<<<<<<< HEAD

//convert data pt para formato mySql
=======
>>>>>>> 4a71eb9405611bd1c59c63f46bfddb29205eade0
function dataPtParaMysql($dataPtBr){
	$partes = explode("/",$dataPtBr);
	return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}
<<<<<<< HEAD

function dataMysqlParaPtBr($dataMysql){
	$data = new DateTime($dataMysql);
	return $data->format("d/m/Y");
}
=======
>>>>>>> 4a71eb9405611bd1c59c63f46bfddb29205eade0
?>
