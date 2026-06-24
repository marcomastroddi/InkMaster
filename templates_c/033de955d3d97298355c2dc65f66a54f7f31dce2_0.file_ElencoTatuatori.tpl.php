<?php
/* Smarty version 5.8.0, created on 2026-06-25 00:46:31
  from 'file:pages/ricerca/ElencoTatuatori.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c5e47cc9ab9_44552411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '033de955d3d97298355c2dc65f66a54f7f31dce2' => 
    array (
      0 => 'pages/ricerca/ElencoTatuatori.tpl',
      1 => 1782341187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c5e47cc9ab9_44552411 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3017939236a3c5e47cba036_67204718', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3925085016a3c5e47cbbaf6_27571377', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18849670776a3c5e47cbc058_98521964', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base_ricerca.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_3017939236a3c5e47cba036_67204718 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Risultati ricerca — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_3925085016a3c5e47cbbaf6_27571377 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <link rel="stylesheet" href="/CSS/ElencoTatuatori.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_18849670776a3c5e47cbc058_98521964 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>


<div class="el-page">

  <div class="el-bg">
    <div class="el-blob el-blob-1"></div>
    <div class="el-blob el-blob-2"></div>
    <svg class="el-lines" viewBox="0 0 1440 400" preserveAspectRatio="none">
      <path class="el-l1" d="M-60,100 C 320,30 520,200 780,140 S 1220,50 1520,160"></path>
      <path class="el-l2" d="M-60,220 C 280,150 560,300 820,240 S 1180,150 1520,260"></path>
    </svg>
  </div>

  <div class="el-toolbar">
    <p class="el-count">
      <?php $_smarty_tpl->assign('totale', $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data')), false, NULL);?>
      <strong><?php echo $_smarty_tpl->getValue('totale');?>
</strong> <?php if ($_smarty_tpl->getValue('totale') == 1) {?>studio trovato<?php } else { ?>studi trovati<?php }?>
      <?php if ($_smarty_tpl->getValue('filtri_correnti')['testo']) {?> per "<strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('filtri_correnti')['testo'], ENT_QUOTES, 'UTF-8', true);?>
</strong>"<?php }?>
      <?php if ($_smarty_tpl->getValue('filtri_correnti')['citta']) {?> a <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('filtri_correnti')['citta'], ENT_QUOTES, 'UTF-8', true);?>
</strong><?php }?>
    </p>
  </div>

  <div class="el-body">

    <div class="el-list">
      <?php if ($_smarty_tpl->getValue('totale') == 0) {?>
        <div class="el-empty">Nessun risultato. <a href="/home" style="color:#2fd8aa">Torna alla home</a></div>
      <?php } else { ?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'studio');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('studio')->value) {
$foreach0DoElse = false;
?>
          <?php $_smarty_tpl->assign('nomeStudio', $_smarty_tpl->getValue('studio')->getNome(), false, NULL);?>
          <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('studio')->getId();?>
" class="el-card">

            <div class="el-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('nomeStudio'), (int) 0, (int) 2) ?? '', 'UTF-8');?>
</div>

            <div class="el-info">
              <div class="el-nome"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeStudio'), ENT_QUOTES, 'UTF-8', true);?>
</div>
              <?php if ($_smarty_tpl->getValue('studio')->getDescrizione()) {?>
                <div class="el-desc"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('studio')->getDescrizione(), ENT_QUOTES, 'UTF-8', true);?>
</div>
              <?php }?>
              <div class="el-tags">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('studio')->getTatuatori(), 'tat', true);
$_smarty_tpl->getVariable('tat')->iteration = 0;
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tat')->value) {
$foreach1DoElse = false;
$_smarty_tpl->getVariable('tat')->iteration++;
$_smarty_tpl->getVariable('tat')->last = $_smarty_tpl->getVariable('tat')->iteration === $_smarty_tpl->getVariable('tat')->total;
$foreach1Backup = clone $_smarty_tpl->getVariable('tat');
?>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tat')->getStili(), 'st');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('st')->value) {
$foreach2DoElse = false;
?>
                    <span class="el-tag"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('st')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php
$_smarty_tpl->setVariable('tat', $foreach1Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </div>
              <div class="el-tat">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('studio')->getTatuatori(), 'tat', true);
$_smarty_tpl->getVariable('tat')->iteration = 0;
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tat')->value) {
$foreach3DoElse = false;
$_smarty_tpl->getVariable('tat')->iteration++;
$_smarty_tpl->getVariable('tat')->last = $_smarty_tpl->getVariable('tat')->iteration === $_smarty_tpl->getVariable('tat')->total;
$foreach3Backup = clone $_smarty_tpl->getVariable('tat');
?>
                  <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getCognome(), ENT_QUOTES, 'UTF-8', true);
if (!$_smarty_tpl->getVariable('tat')->last) {?>, <?php }?>
                <?php
$_smarty_tpl->setVariable('tat', $foreach3Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </div>
            </div>

            <div class="el-meta">
              <div class="el-rating">
                <div class="el-stars">★★★★★</div>
                <div class="el-rating-label">Valutazione</div>
              </div>
              <div class="el-location">
                <span class="el-pin">📍</span>
                <span class="el-city"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('studio')->getPosizione()->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
              </div>
              <span class="el-cta">Scopri →</span>
            </div>

          </a>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      <?php }?>
    </div>

            <div class="el-map-wrap">
  <div class="el-map-head">I nostri studi in Italia</div>
  <div class="el-map">
    <svg class="el-map-svg" viewBox="0 0 220 275" xmlns="http://www.w3.org/2000/svg">

      <!-- ═══ PENISOLA (~230 punti) ═══ -->
      <path class="el-map-land" d="
        M 32,95
        L 33,87 L 31,85 L 26,81 L 25,74
        L 23,61 L 23,51 L 23,48
        L 26,46 L 34,45 L 38,45
        L 40,39 L 44,41 L 49,42
        L 54,48 L 58,46 L 61,44
        L 66,41 L 72,33 L 75,32
        L 79,30 L 83,28
        L 91,21 L 95,22 L 97,23
        L 101,28 L 107,31 L 117,32 L 121,32
        L 121,49 L 120,49 L 124,52
        L 118,52 L 112,53 L 110,54
        L 107,56 L 103,59
        L 102,63 L 102,68 L 101,74
        L 101,76 L 101,79 L 102,81 L 104,84
        L 107,89 L 109,90
        L 113,92 L 115,94 L 118,96 L 120,98
        L 122,99 L 124,101
        L 126,106 L 127,109 L 128,111 L 130,115
        L 133,125 L 134,126 L 136,128
        L 138,131 L 141,133 L 143,135
        L 145,136 L 146,137
        L 152,143 L 155,145
        L 157,144 L 158,143 L 159,141
        L 159,140 L 160,138 L 161,138 L 162,138
        L 163,139 L 164,139
        L 163,141 L 162,143 L 161,145
        L 160,145 L 159,145
        L 160,151 L 162,152 L 164,153
        L 167,155 L 169,156 L 171,158
        L 174,159 L 175,160
        L 177,162 L 178,163 L 179,165
        L 181,166 L 183,167 L 185,167
        L 185,168 L 186,170 L 187,173
        L 188,175 L 190,177
        L 193,178 L 193,181 L 192,184 L 191,186
        L 189,183 L 187,181 L 185,180
        L 183,179 L 181,178 L 179,175
        L 176,172 L 174,171
        L 170,174 L 168,173 L 166,175
        L 165,178 L 164,181 L 163,187 L 163,191 L 165,191
        L 164,196 L 166,199 L 170,202
        L 173,203 L 174,204
        L 172,207 L 168,210 L 164,211
        L 163,214 L 160,216
        L 160,222 L 158,224 L 156,225
        L 157,229 L 155,229 L 153,229
        L 152,228 L 151,225
        L 151,222
        L 154,220 L 154,219 L 154,215
        L 153,212 L 157,210
        L 161,205 L 156,201 L 156,196
        L 153,190 L 152,184 L 151,181 L 149,180
        L 147,179 L 145,179
        L 143,181
        L 143,177 L 142,173 L 140,170
        L 138,166 L 136,167 L 134,167
        L 132,169 L 132,167 L 130,162
        L 129,163 L 128,164 L 127,164
        L 126,161 L 125,157 L 121,154
        L 120,153 L 119,153 L 118,153
        L 116,152 L 114,151 L 110,149
        L 107,148 L 108,148 L 104,145
        L 101,141 L 98,138 L 96,135 L 95,134
        L 94,130 L 93,129 L 92,128
        L 90,127 L 89,127 L 87,126 L 86,126
        L 85,124 L 83,122 L 81,120 L 80,119
        L 79,117 L 77,116 L 76,115
        L 74,110 L 74,104 L 73,100
        L 72,95 L 72,93 L 71,91
        L 69,89 L 67,88 L 66,88
        L 63,85 L 60,84 L 59,83
        L 57,82 L 55,82 L 53,81 L 51,81 L 49,81
        L 46,83 L 44,85 L 43,89
        L 42,91 L 41,92 L 40,93 L 38,93 L 36,94 L 34,95
        Z
      "/>
            <!-- ═══ SICILIA (~40 punti) ═══ -->
        <path class="el-map-land" d="
            M 150,222
            L 146,231 L 145,233
            L 143,239 L 145,245
            L 144,248 L 136,248
            L 138,254 L 144,257
            L 141,257 L 136,254 L 135,250
            L 133,249 L 131,248
            L 128,249 L 126,248
            L 121,243 L 119,241
            L 116,239 L 114,239
            L 112,235 L 110,234
            L 107,233 L 105,232 L 104,232
            L 103,232
            L 105,227 L 107,225
            L 108,223 L 110,222 L 112,222
            L 118,224 L 122,225 L 125,225
            L 127,226 L 130,225
            L 134,224 L 138,224
            L 142,223 L 145,222
            Z
        "/>
              <!-- ═══ SARDEGNA (~30 punti) ═══ -->
        <path class="el-map-land" d="
            M 62,155
            L 60,154 L 57,153
            L 50,160 L 45,162
            L 44,169 L 42,168
            L 43,172 L 47,175
            L 46,184 L 47,185 L 46,187
            L 45,190 L 45,192 L 45,193
            L 47,201 L 49,205 L 49,208
            L 47,207 L 45,205
            L 52,200 L 56,199
            L 60,200 L 62,201
            L 63,198
            L 64,190 L 64,183
            L 64,175 L 63,172 L 64,170
            L 61,160
            Z
        "/>
              <!-- Roma (evidenziata) -->
      <circle class="el-map-city-dot el-map-city-dot--main" cx="105" cy="138" r="4"/>
      <circle class="el-map-city-ring"                       cx="105" cy="138" r="7"/>
      <!-- altre città -->
      <circle class="el-map-city-dot" cx="57"  cy="58"  r="3"/>
      <circle class="el-map-city-dot" cx="35"  cy="67"  r="3"/>
      <circle class="el-map-city-dot" cx="102" cy="61"  r="3"/>
      <circle class="el-map-city-dot" cx="53"  cy="83"  r="3"/>
      <circle class="el-map-city-dot" cx="88"  cy="80"  r="3"/>
      <circle class="el-map-city-dot" cx="87"  cy="95"  r="3"/>
      <circle class="el-map-city-dot" cx="122" cy="101" r="3"/>
      <circle class="el-map-city-dot" cx="133" cy="128" r="3"/>
      <circle class="el-map-city-dot" cx="131" cy="163" r="3"/>
      <circle class="el-map-city-dot" cx="169" cy="158" r="3"/>
      <circle class="el-map-city-dot" cx="118" cy="228" r="3"/>
      <circle class="el-map-city-dot" cx="139" cy="240" r="3"/>
      <circle class="el-map-city-dot" cx="54"  cy="199" r="3"/>
      <circle class="el-map-city-dot" cx="85"  cy="43"  r="3"/>
      <!-- etichette -->
      <text class="el-map-lbl el-map-lbl--main" x="108" y="136">Roma</text>
      <text class="el-map-lbl" x="60"  y="56" >Milano</text>
      <text class="el-map-lbl" x="15"  y="65" >Torino</text>
      <text class="el-map-lbl" x="105" y="60" >Venezia</text>
      <text class="el-map-lbl" x="55"  y="80" >Genova</text>
      <text class="el-map-lbl" x="90"  y="78" >Bologna</text>
      <text class="el-map-lbl" x="90"  y="93" >Firenze</text>
      <text class="el-map-lbl" x="123" y="99" >Ancona</text>
      <text class="el-map-lbl" x="135" y="126">Pescara</text>
      <text class="el-map-lbl" x="134" y="162">Napoli</text>
      <text class="el-map-lbl" x="172" y="156">Bari</text>
      <text class="el-map-lbl" x="121" y="227">Palermo</text>
      <text class="el-map-lbl" x="143" y="238">Catania</text>
      <text class="el-map-lbl" x="57"  y="197">Cagliari</text>
      <text class="el-map-lbl" x="88"  y="41" >Trento</text>

    </svg>
  </div>
</div>

  </div>
    <?php if ($_smarty_tpl->getValue('totale') > 10) {?>
  <div class="el-pagination">
    <a href="#" class="el-pag-btn">‹</a>
    <a href="#" class="el-pag-btn active">1</a>
    <a href="#" class="el-pag-btn">2</a>
    <a href="#" class="el-pag-btn">3</a>
    <a href="#" class="el-pag-btn">›</a>
  </div>
  <?php } else { ?>
  <div class="el-pagination-single">
    <span class="el-pag-chip">
      <span class="el-pag-chip-dot"></span>
      <?php echo $_smarty_tpl->getValue('totale');?>
 <?php if ($_smarty_tpl->getValue('totale') == 1) {?>risultato trovato<?php } else { ?>risultati trovati<?php }?>
    </span>
  </div>
  <?php }?>

</div>

<?php
}
}
/* {/block "content"} */
}
