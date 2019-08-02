<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_venda extends CI_Migration{
	public function up(){
		$this->dbforge->add_column('produtos',array(
			'vendido'=> array(
				'type' => 'boolean',
				'default' => '0'
			)
			));
	}
	public function down(){
		$this->dbforge->drop_column('produtos','vendido');
	}
}

?>
