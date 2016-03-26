<?php
  $uri = $this->uri->segment("1");
?>

<ul class="cbp-vimenu">
  <li><a href="#" class="icon-logo"></a></li>
  <li <?= ($uri == '') ? 'class="cbp-vicurrent"' : ''; ?>><a href="home" class="icon-archive"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li <?= ($uri == 'chamados') ? 'class="cbp-vicurrent"' : ''; ?>><a href="chamados" class="icon-search"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
  <li <?= ($uri == 'equipes') ? 'class="cbp-vicurrent"' : ''; ?>><a href="equipes" class="icon-pencil"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
  <li <?= ($uri == '') ? 'class="cbp-vicurrent"' : ''; ?>><a href="#" class="icon-archive"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></a></li>
  <li <?= ($uri == '') ? 'class="cbp-vicurrent"' : ''; ?>><a href="#" class="icon-search"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
  <li <?= ($uri == '') ? 'class="cbp-vicurrent"' : ''; ?>><a href="#" class="icon-pencil"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span></a></li>
</ul>