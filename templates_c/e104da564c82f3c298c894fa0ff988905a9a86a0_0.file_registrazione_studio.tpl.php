<?php
/* Smarty version 5.8.0, created on 2026-06-24 09:32:37
  from 'file:pages/auth/registrazione_studio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ba4351332f3_03879326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e104da564c82f3c298c894fa0ff988905a9a86a0' => 
    array (
      0 => 'pages/auth/registrazione_studio.tpl',
      1 => 1782292872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ba4351332f3_03879326 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16317787416a3ba4350db576_80886680', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10073494406a3ba4350e0b55_18317298', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_16317787416a3ba4350db576_80886680 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
?>
Registrazione studio — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_10073494406a3ba4350e0b55_18317298 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\auth';
?>

    <h1>Registra il tuo studio</h1>

        <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null)))) {?>
        <p class="form-error"><?php echo $_smarty_tpl->getValue('message');?>
</p>
    <?php }?>

    <form method="post" action="/registra_studio">
        <label>Nome studio <input type="text" name="nome" required></label>
        <label>Partita IVA <input type="text" name="partita_iva" required></label>
        <label>Email <input type="email" name="email" required></label>
        <label>Telefono <input type="text" name="telefono"></label>

                <label>Città <input type="text" name="posizione" required></label>

        <label>Descrizione <textarea name="descrizione"></textarea></label>

        <label>Username <input type="text" name="username" required></label>
        <label>Password <input type="password" name="password" required></label>
        <label>Conferma password <input type="password" name="conferma_password" required></label>

        <button type="submit">Registra studio</button>
    </form>

    <p>Hai già un account? <a href="/login">Accedi</a></p>
<?php
}
}
/* {/block "content"} */
}
