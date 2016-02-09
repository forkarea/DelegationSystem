<?php
/* Smarty version 3.1.29, created on 2016-02-09 01:48:03
  from "C:\xampp\htdocs\DelegationSystem\templates\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b93743eb11a5_68417422',
  'file_dependency' => 
  array (
    'dd746228de147fd9d2b3c9ed8737eaf4dbf16b04' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DelegationSystem\\templates\\header.html',
      1 => 1454978882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56b93743eb11a5_68417422 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
 :: <?php echo $_smarty_tpl->tpl_vars['pageName']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/../vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/../templates/css/style.css" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href='<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/index.php/'><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href='<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/index.php/'>Główna</a></li>
                <li><a href='<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/index.php/list/1'>Delegacje</a></li>
                <li><a href="#contact">Administracja</a></li>
            </ul>
            <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value == false) {?>
            <form class="navbar-form navbar-right" action="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/index.php/login" method="post">
                <div class="form-group">
                    <input type="text" name='login' placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Zaloguj</button>
            </form>
            <?php } else { ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_smarty_tpl->tpl_vars['Username']->value;?>
 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout">Wyloguj</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php }?>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?php }
}
