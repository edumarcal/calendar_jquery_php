<?php
// Agradeço a Deus pelo dom do conhecimento

namespace App\Core\Database;

class Connection
{
	public static function make($config)
	{
		try {
			return new \PDO(
				$config['connection'] .';dbname=' . $config['name'],
				$config['username'],
				$config['password'],
				$config['options']
			);
		} catch(\PDOException $e) {
			die('Não foi possível conectar ao Banco de Dados. por este motivo:  '. $e->getMessage());
		}
	}
}
