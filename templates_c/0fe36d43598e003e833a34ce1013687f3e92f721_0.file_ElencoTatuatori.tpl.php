<?php
/* Smarty version 5.8.0, created on 2026-06-26 20:03:31
  from 'file:pages/ricerca/ElencoTatuatori.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3edb13ae5cf8_78478241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fe36d43598e003e833a34ce1013687f3e92f721' => 
    array (
      0 => 'pages/ricerca/ElencoTatuatori.tpl',
      1 => 1782504207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3edb13ae5cf8_78478241 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4759626916a3edb13aa8ef2_23152417', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15543133716a3edb13aae375_49351741', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14821582696a3edb13aaf049_19484758', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base_ricerca.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_4759626916a3edb13aa8ef2_23152417 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>
Risultati ricerca — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_15543133716a3edb13aae375_49351741 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>

    <link rel="stylesheet" href="/CSS/ElencoTatuatori.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_14821582696a3edb13aaf049_19484758 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
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
    <div class="el-map-card">
    <div class="el-map-head">
      <span class="el-map-eyebrow">La nostra rete</span>
      <h2 class="el-map-title">Inchiostro in tutta <span class="el-accent">Italia</span></h2>
      <p class="el-map-sub">Studi verificati da Nord a Sud</p>
    </div>
    <div class="el-map">
    <svg class="el-map-svg" viewBox="0 0 220 275" xmlns="http://www.w3.org/2000/svg">

      <!-- PENISOLA ~280 punti -->
      <path class="el-map-land" d="
        M 32,95
        L 33,87 L 32,86 L 31,85 L 29,83 L 27,81 L 26,79 L 25,77 L 24,75
        L 23,72 L 23,68 L 23,63 L 23,60 L 23,55 L 23,51 L 23,48
        L 24,46 L 25,46 L 26,46 L 28,45 L 30,45 L 32,45 L 34,45 L 36,45 L 38,45
        L 40,39 L 42,38 L 43,37 L 44,37 L 46,39 L 47,40 L 49,41 L 50,42
        L 52,42 L 54,46 L 56,45 L 58,44 L 60,44
        L 62,43 L 64,41 L 65,40 L 67,38 L 69,35 L 71,33 L 72,32
        L 75,32 L 77,31 L 79,29 L 81,28 L 83,27 L 85,26 L 87,25 L 89,23 L 91,21
        L 93,22 L 95,22 L 97,23 L 99,25 L 101,28
        L 103,29 L 105,30 L 107,31 L 109,31 L 111,31 L 113,31
        L 115,31 L 117,31 L 119,32 L 121,32
        L 121,35 L 121,39 L 121,43 L 121,47 L 121,49 L 120,49 L 124,52
        L 118,52 L 115,53 L 113,53 L 111,54 L 109,54 L 107,56
        L 105,57 L 103,59 L 102,61 L 102,63 L 102,65
        L 102,68 L 101,71 L 101,74 L 101,77 L 101,79
        L 102,80 L 103,82 L 104,84 L 106,86
        L 107,89 L 108,90 L 109,90 L 110,91 L 111,92 L 113,92
        L 114,93 L 115,94 L 116,95 L 118,96 L 119,97 L 120,98 L 122,99
        L 123,100 L 124,101 L 125,103 L 126,105 L 126,107 L 127,109
        L 128,111 L 129,113 L 130,115 L 131,118 L 132,120 L 133,125
        L 134,126 L 135,127 L 136,128 L 138,130 L 139,132 L 141,133
        L 142,135 L 143,136 L 144,136 L 145,136 L 146,137
        L 147,139 L 148,140 L 149,141 L 151,142 L 153,143 L 155,145
        L 155,143 L 155,141 L 155,139 L 155,138 L 155,137
        L 156,136 L 156,135 L 157,135 L 157,136 L 157,137
        L 158,137 L 158,138 L 159,138 L 159,139
        L 158,140 L 157,141 L 157,142 L 156,143 L 156,144 L 156,145 L 156,146
        L 157,148 L 158,149 L 159,150 L 160,151 L 161,152 L 162,152
        L 163,153 L 164,153 L 165,154 L 166,155 L 167,155 L 168,156 L 169,156
        L 170,157 L 171,158 L 172,158 L 173,159 L 174,159 L 175,160
        L 176,161 L 177,162 L 178,163 L 179,164 L 180,165 L 181,166
        L 182,166 L 183,167 L 184,167 L 185,167
        L 185,168 L 186,170 L 186,171 L 187,173 L 187,174
        L 188,175 L 189,176 L 190,177 L 191,178 L 192,178
        L 193,179 L 193,181 L 193,183 L 192,185 L 191,186
        L 190,185 L 190,184 L 189,183 L 188,182 L 187,181
        L 186,181 L 185,180 L 184,180 L 183,180 L 182,179
        L 181,179 L 180,178 L 179,177 L 178,176 L 177,175
        L 175,173 L 174,172 L 174,171
        L 172,173 L 170,173 L 169,174 L 168,174
        L 167,174 L 166,175 L 165,176 L 165,177
        L 164,179 L 164,181 L 163,184 L 163,187 L 163,190 L 163,191
        L 163,193 L 163,195 L 164,196 L 164,197 L 164,198 L 165,199
        L 166,200 L 166,201 L 167,201 L 168,202 L 170,203
        L 172,204 L 173,204 L 174,205 L 173,206 L 172,207
        L 172,208 L 171,209 L 170,210 L 169,211 L 168,212
        L 167,213 L 166,214 L 165,215 L 164,216 L 163,217
        L 162,218 L 161,219 L 160,220 L 160,221 L 160,222
        L 159,223 L 158,224 L 157,225 L 156,225 L 155,225
        L 155,226 L 155,227 L 156,228 L 157,229
        L 156,229 L 155,229 L 154,229 L 153,229
        L 152,228 L 151,227 L 151,225
        L 151,222 L 152,220 L 153,219 L 154,218
        L 154,217 L 154,216 L 154,215 L 154,214
        L 153,213 L 153,212 L 154,211 L 155,210
        L 156,210 L 157,210 L 158,209 L 159,208
        L 160,207 L 161,206 L 161,205 L 160,204
        L 159,203 L 158,202 L 157,201 L 156,201
        L 156,200 L 156,199 L 156,197 L 156,196
        L 155,195 L 155,194 L 155,192 L 154,191
        L 153,190 L 152,188 L 152,186 L 152,185 L 152,184
        L 151,183 L 151,182 L 151,181 L 150,181 L 149,180
        L 148,180 L 147,180 L 147,179 L 146,179 L 145,179
        L 144,180 L 143,181 L 143,179 L 143,178
        L 143,177 L 143,176 L 143,175
        L 142,174 L 142,173 L 141,172 L 140,170 L 140,169
        L 139,168 L 138,167 L 137,166
        L 136,167 L 135,167 L 134,167 L 133,168 L 132,169
        L 132,168 L 132,167 L 131,166 L 131,165
        L 130,163 L 130,162 L 129,163 L 129,164
        L 128,164 L 128,163 L 127,163 L 126,162 L 125,162
        L 125,161 L 124,160 L 123,159 L 122,157
        L 121,156 L 121,155 L 121,154
        L 120,153 L 120,152 L 119,152 L 118,152
        L 117,152 L 116,152 L 115,151 L 114,151 L 113,151
        L 111,150 L 110,149 L 109,149
        L 107,148 L 106,147 L 105,146 L 104,145
        L 103,144 L 102,143 L 101,141 L 100,140
        L 99,139 L 97,137 L 96,136 L 95,135 L 95,134
        L 94,132 L 94,130 L 93,130 L 93,129 L 92,128
        L 91,128 L 90,127 L 89,127 L 88,127 L 87,126 L 86,126
        L 86,125 L 85,124 L 84,123 L 83,122 L 82,121 L 81,120 L 80,119
        L 79,118 L 79,117 L 78,117 L 77,116 L 76,116 L 76,115
        L 75,113 L 74,111 L 74,109 L 74,106
        L 74,104 L 73,102 L 73,100 L 73,98
        L 72,96 L 72,94 L 72,93 L 71,91
        L 70,90 L 69,89 L 68,88 L 67,88 L 66,88
        L 64,87 L 63,86 L 62,85 L 61,85 L 60,84
        L 59,84 L 59,83 L 58,83 L 57,82 L 56,82
        L 55,82 L 54,82 L 53,81 L 52,81 L 51,81 L 50,81 L 49,81
        L 47,82 L 46,83 L 45,84 L 44,85 L 43,87 L 43,89
        L 42,90 L 42,91 L 41,92 L 40,93 L 39,93 L 38,93
        L 37,94 L 36,94 L 35,95 L 34,95
        Z
      "/>

      <!-- SICILIA ~70 punti -->
      <path class="el-map-land" d="
        M 150,222
        L 151,224 L 150,226 L 149,227 L 147,229 L 146,231
        L 145,232 L 145,233 L 144,235 L 143,237 L 143,239
        L 143,241 L 144,243 L 145,245 L 145,246 L 145,247
        L 146,248 L 147,249 L 148,250
        L 147,252 L 146,254 L 145,256 L 144,257
        L 143,257 L 142,257 L 141,256 L 140,256 L 139,255
        L 138,254 L 136,252 L 135,252 L 134,251
        L 133,250 L 132,249 L 131,248
        L 129,248 L 127,248 L 126,248
        L 124,246 L 122,245 L 120,243
        L 118,242 L 116,241 L 114,239
        L 113,238 L 112,237 L 111,237 L 109,237 L 107,237
        L 106,236 L 106,235 L 105,234
        L 104,233 L 104,232 L 103,232
        L 103,231 L 103,230 L 104,229
        L 105,227 L 105,226 L 106,225
        L 107,225 L 107,224 L 108,223
        L 108,222 L 109,222 L 110,222 L 111,222 L 113,222 L 115,223
        L 118,224 L 120,224 L 122,225 L 124,225
        L 127,226 L 129,226 L 130,225 L 132,225
        L 134,224 L 136,224 L 138,224 L 140,223 L 142,223 L 145,222
        Z
      "/>

      <!-- SARDEGNA ~50 punti -->
      <path class="el-map-land" d="
        M 62,155
        L 61,156 L 60,156 L 60,155 L 59,155 L 58,154 L 57,153
        L 55,155 L 53,157 L 51,159 L 50,160
        L 48,161 L 47,162 L 45,162
        L 44,163 L 44,165 L 44,167 L 44,169
        L 43,170 L 42,169 L 42,168
        L 43,170 L 44,172 L 45,173
        L 46,175 L 47,176 L 47,177
        L 47,179 L 47,181 L 47,183 L 47,184 L 47,185
        L 46,186 L 46,187 L 45,188
        L 45,190 L 45,192 L 45,193 L 45,194
        L 46,196 L 46,198 L 47,200 L 47,201
        L 48,203 L 49,205 L 49,206 L 49,208
        L 48,208 L 47,208 L 47,207 L 46,207 L 45,206 L 45,205
        L 49,202 L 51,201 L 53,200 L 54,200
        L 55,199 L 56,199 L 57,199 L 58,200
        L 60,200 L 61,200 L 62,201
        L 63,199 L 63,198 L 63,196
        L 64,193 L 64,191 L 64,189 L 64,187
        L 64,185 L 64,183 L 64,181 L 64,179
        L 64,177 L 64,175 L 63,173 L 63,172
        L 64,170 L 64,168 L 63,166
        L 62,164 L 61,162 L 61,160
        Z
      "/>

      <!-- Roma -->
      <circle class="el-map-city-dot" cx="105" cy="138" r="4"/>
      <!-- altre città -->
      <circle class="el-map-city-dot" cx="57"  cy="58"  r="3"/>
      <circle class="el-map-city-dot" cx="35"  cy="67"  r="3"/>
      <circle class="el-map-city-dot" cx="102" cy="61"  r="3"/>
      <circle class="el-map-city-dot" cx="53"  cy="81"  r="3"/>
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

      <text class="el-map-lbl" x="108" y="136">Roma</text>
      <text class="el-map-lbl" x="60"  y="56" >Milano</text>
      <text class="el-map-lbl" x="15"  y="65" >Torino</text>
      <text class="el-map-lbl" x="105" y="60" >Venezia</text>
      <text class="el-map-lbl" x="55"  y="79" >Genova</text>
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

  </div>
    <div class="el-pagination-single">
    <span class="el-pag-chip">
      <span class="el-pag-chip-dot"></span>
      <?php echo $_smarty_tpl->getValue('totale');?>
 <?php if ($_smarty_tpl->getValue('totale') == 1) {?>risultato trovato<?php } else { ?>risultati trovati<?php }?>
    </span>
  </div>

</div>

<?php
}
}
/* {/block "content"} */
}
