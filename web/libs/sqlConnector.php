<?php
namespace libs;

use mysqli;
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 15:40
 */


class sqlConnector
{
	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $db = 'ds_db';

	public $mysql;
	public $connected;

	public function __construct()
	{
		$this->mysql = new mysqli($this->host, $this->user, $this->password, $this->db);
		if($this->mysql->errno)
		{
			$this->connected = false;
		}
		else{
			$this->connected = true;
			$this->mysql->set_charset('utf8');
		}
	}

	public function isConnected()
	{
		return $this->connected;
	}

	public function query($query)
	{
		$resultArr = array();
		$result = $this->mysql->query($query);
		while ($row = $result->fetch_assoc()) {
			$resultArr[] = $row;
		}
		return $resultArr;
	}

	public function execute($query)
	{
		try {
			$result = $this->mysql->query($query);
		}catch(Exception $e)
		{
			$result = $e->getMessage();
		}
		return $result;
	}
}