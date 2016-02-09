<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 21:51
 */

namespace models;

require 'model.php';
require 'delegationRoad.php';
require 'delegationStatus.php';

use models\delegationRoad;

class Delegation extends model
{
	public $id;
	public $addDate;
	public $topic;
	public $status;
	public $addUser;
	public $loan = 0;
	private $deleted;

	public $rides;

	public function __construct()
	{

	}

	public function isDeleted()
	{
		if($this->deleted == 1) return true;
		return false;
	}

	public function getStatusName()
	{
		return delegationStatus::getStatusName($this->status);
	}

	public function getRidesCost()
	{
		$sum = 0;
		foreach($this->rides as $r)
		{
			$sum += $r->cost;
		}

		return $sum;
	}

	public static function getAll()
	{
		global $sql;
		$result = $sql->query("SELECT * FROM delegation");
			$delegationArr = array();
			foreach ($result as $res) {
				$d = new Delegation();
				$d->id = $res['delegationId'];
				$d->status = $res['status'];
				$d->addDate = $res['addDate'];
				$d->loan = $res['loan'];
				$d->addUser = $res['addUser'];
				$d->topic = $res['topic'];
				$delegationArr[] = $d;
			}

			return $delegationArr;

	}

	public function getById($id)
	{
		global $sql;

		$result = $sql->query("SELECT * FROM delegation WHERE delegationId = {$id}");
		if(isset($result))
		{
			$this->id = $result[0]['delegationId'];
			$this->addUser = $result[0]['addUser'];
			$this->addDate = str_replace(' ','T',substr($result[0]['addDate'],0,16));
			$this->topic = $result[0]['topic'];
			$this->status = $result[0]['status'];
			$this->loan = $result[0]['loan'];
			$this->deleted = $result[0]['deleted'];

			$this->rides = new delegationRoad();
			$this->rides = $this->rides->getByDelegationId($this->id);

		}
	}

	public function save()
	{
		global $sql;
		if(isset($this->id)) // UPDATE
		{
			$query = "
				UPDATE delegation
				SET
					addDate='{$this->addDate}',
					topic='{$this->topic}',
					status={$this->status},
					deleted={$this->deleted},
					loan={$this->loan}
			  	WHERE delegationId = {$this->id}
			";
			$result = $sql->execute($query);
		}

		foreach($this->rides as $ride)
		{
			$ride->save($this->id);
		}
	}

	public function delete($id=-1)
	{
		global $sql;
		if($id == -1)
		{
			$id = $this->id;
		}
			$query = "
				DELETE FROM delegation
			  	WHERE delegationId = {$id}
			";
			$result = $sql->execute($query);
	}
}