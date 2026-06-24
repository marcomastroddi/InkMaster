<?php
/* Smarty version 5.8.0, created on 2026-06-24 15:48:37
  from 'file:pages/auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3bfc55704f64_50260168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0927b3bdf0477b13099ec5023fb6f657eded9d48' => 
    array (
      0 => 'pages/auth/login.tpl',
      1 => 1782294574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3bfc55704f64_50260168 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1899491706a3bfc556e3cd6_46540268', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7063866696a3bfc556e8a28_64740117', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1899491706a3bfc556e3cd6_46540268 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>
Accedi — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_7063866696a3bfc556e8a28_64740117 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>

    <h1>Accedi</h1>

        <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null)))) {?>
        <p class="form-error"><?php echo $_smarty_tpl->getValue('message');?>
</p>
    <?php }?>

    <form method="post" action="/login">
        <label>Username <input type="text" name="username" required></label>
        <label>Password <input type="password" name="password" required></label>
        <button type="submit">Accedi</button>
    </form>

        <p>Non hai un account?</p>
    <ul>
        <li><a href="/registrazione_cliente">Registrati come cliente</a></li>
        <li><a href="/registrazione_studio">Registra il tuo studio</a></li>
    </ul>
<?php
}
}
/* {/block "content"} */
}
