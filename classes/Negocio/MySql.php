<?php
	class MySql{


		private static $pdo;

		// FAZ CONEXÃO COM O BANCO DE DADOS.

		public static function conectar(){
			if(self::$pdo == null){
				try{
				self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
					echo '<h3>Erro ao conectar</h3>';
				}
			}
			return self::$pdo;
		}
		public static function deleteById($nome_tabela,$where,$id){
			$sql = MySql::conectar()->prepare(MySqlSQL::deleteById($nome_tabela,$where,$id));
			if($sql->execute() == true)
				return true;
			else 
				return false;
				
		}
		public static function selectAll($tabela,$start = null,$end = null){
			if($start == null && $end == null)
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
			else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
				$sql->execute();

			
			return $sql->fetchAll();

		}
		public static function select($table,$query = '',$arr = ''){
			if($query != false){
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetch();
		}

	}
?>