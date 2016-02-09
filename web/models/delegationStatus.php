<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 22:09
 */

namespace models;


class delegationStatus
{
	public $id;
	public $statusName;
	public $selected;

	public static function getStatusName($id)
	{
		global $sql;
		$result = $sql->query("SELECT * FROM delegationstatus WHERE statusId = {$id}");
		return $result[0]['name'];
	}

	public static function getAll($selected = 0)
	{
		global $sql;
		$resultArr = array();
		$result = $sql->query("SELECT * FROM delegationstatus");

		foreach($result as $res)
		{
			$ds = new delegationStatus();
			$ds->id = $res['statusId'];
			$ds->statusName = $res['name'];

			if($ds->id == $selected) $ds->selected = true;
			else $ds->selected=false;

			$resultArr[] = $ds;
		}
		return $resultArr;
	}
}