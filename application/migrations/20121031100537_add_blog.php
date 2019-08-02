<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

        public function up(){
			$this->dbforge->add_field(array(
				'id' => array(
					'type'=> 'INT',
					'auto_increment' =>true
				),
				'produto_id' => array(
					'type' => 'INT'
				),
				'comprador_id' => array(
					'type' => 'INT'
				),
				'date_de_entrega' => array(
					'type' => 'DATE'
				)
			));
			$this->dbforge->add_key('id',true);
			$this->dbforge->create_table('vendas');
		}

        public function down(){
			$this->dbforge->drop_table('vendas');
		}
}
