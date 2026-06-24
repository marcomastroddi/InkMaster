<?php
/* Smarty version 5.8.0, created on 2026-06-24 18:20:09
  from 'file:pages/auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c03b9150373_93215361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9968a0de5db30c78b2d23aa0f017ce3ee9075116' => 
    array (
      0 => 'pages/auth/login.tpl',
      1 => 1782295987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c03b9150373_93215361 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7090642336a3c03b914d4e3_46265273', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7147951626a3c03b914ed03_26778722', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7090642336a3c03b914d4e3_46265273 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>
Accedi — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_7147951626a3c03b914ed03_26778722 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
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
