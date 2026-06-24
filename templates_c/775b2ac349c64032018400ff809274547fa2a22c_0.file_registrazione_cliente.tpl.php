<?php
/* Smarty version 5.8.0, created on 2026-06-24 09:32:52
  from 'file:pages/auth/registrazione_cliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ba444552d38_17778012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '775b2ac349c64032018400ff809274547fa2a22c' => 
    array (
      0 => 'pages/auth/registrazione_cliente.tpl',
      1 => 1782292864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ba444552d38_17778012 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10285776546a3ba444549252_11777646', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11045235736a3ba44454dde5_39346332', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_10285776546a3ba444549252_11777646 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
?>
Registrazione cliente — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_11045235736a3ba44454dde5_39346332 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
?>

    <h1>Registrati come cliente</h1>

        <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null)))) {?>
        <p class="form-error"><?php echo $_smarty_tpl->getValue('message');?>
</p>
    <?php }?>

    <form method="post" action="/registra_cliente">
        <label>Nome <input type="text" name="nome" required></label>
        <label>Cognome <input type="text" name="cognome" required></label>
        <label>Username <input type="text" name="username" required></label>
        <label>Email <input type="email" name="email" required></label>
        <label>Data di nascita <input type="date" name="data_nascita" required></label>

                <label>Posizione <input type="text" name="posizione"></label>

        <label>Password <input type="password" name="password" required></label>
        <label>Conferma password <input type="password" name="conferma_password" required></label>

        <button type="submit">Registrati</button>
    </form>

    <p>Hai già un account? <a href="/login">Accedi</a></p>
<?php
}
}
/* {/block "content"} */
}
