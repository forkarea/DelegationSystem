<?php
/* Smarty version 3.1.29, created on 2016-02-06 14:49:58
  from "C:\xampp\htdocs\DelegationSystem\templates\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b5fa069886f4_34482415',
  'file_dependency' => 
  array (
    '799c69f3604c6f5e7fdef0e16840040366a51b19' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DelegationSystem\\templates\\index.html',
      1 => 1454766596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_56b5fa069886f4_34482415 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="jumbotron">
    <div class="container">
        <h1>Witaj w DelegationSystem</h1>
        <p>DelegationSystem to system zarządzania i przechowywnia delegacji w twojej firmie!</p>
    </div>
</div>
<div class='container'>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
