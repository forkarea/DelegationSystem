<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 21:51
 */

namespace models;


class Delegation
{
	public $id;
	public $addDate;
	public $topic;
	public $status;
	public $addUser;

	public function __construct($id = null, $addDate = null, $topic = '', $status = 0, $addUser = null)
	{
		isset($id) ? $this->id = $id : null;
		isset($addDate) ? $this->addDate = $addDate : null;
		isset($addUser) ? $this->addUser = $addUser : null;
		$this->topic = $topic;
		$this->status = $status;

	}

	public static function getAll($obj = true)
	{
		global $sql;
		$result = $sql->query("SELECT * FROM delegation");
		if ($obj) {
			$delegationArr = array();
			foreach ($result as $res) {
				$delegationArr[] = new Delegation($res['delegationId'], $res['addDate'], $res['topic'], $res['status'], $res['addUser']);
			}

			return $delegationArr;
		}
		else
		{
			return $result;
		}
	}
}