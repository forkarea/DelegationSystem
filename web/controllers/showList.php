<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 21:20
 */
use models\Delegation;
require "/models/delegation.php";

$delegations = Delegation::getAll(true);

$tpl->assignByRef('delegations',$delegations);
$tpl->display('showDelegations.html');