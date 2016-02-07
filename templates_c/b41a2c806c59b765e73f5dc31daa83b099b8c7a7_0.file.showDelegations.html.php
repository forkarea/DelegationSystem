<?php
/* Smarty version 3.1.29, created on 2016-02-06 22:06:05
  from "C:\xampp\htdocs\DelegationSystem\templates\showDelegations.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b6603de05ff2_19947649',
  'file_dependency' => 
  array (
    'b41a2c806c59b765e73f5dc31daa83b099b8c7a7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DelegationSystem\\templates\\showDelegations.html',
      1 => 1454792765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_56b6603de05ff2_19947649 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br/><br/><br/>
<div class="container">
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Data dodania</th>
        <th>Cel delegacji</th>
        <th>Status</th>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['delegations']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_delegation_0_saved_item = isset($_smarty_tpl->tpl_vars['delegation']) ? $_smarty_tpl->tpl_vars['delegation'] : false;
$_smarty_tpl->tpl_vars['delegation'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['delegation']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['delegation']->value) {
$_smarty_tpl->tpl_vars['delegation']->_loop = true;
$__foreach_delegation_0_saved_local_item = $_smarty_tpl->tpl_vars['delegation'];
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['delegation']->value['delegationId'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['delegation']->value['addDate'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['delegation']->value['topic'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['delegation']->value['status'];?>
</td>
        </tr>
    <?php
$_smarty_tpl->tpl_vars['delegation'] = $__foreach_delegation_0_saved_local_item;
}
if ($__foreach_delegation_0_saved_item) {
$_smarty_tpl->tpl_vars['delegation'] = $__foreach_delegation_0_saved_item;
}
?>
</table>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
