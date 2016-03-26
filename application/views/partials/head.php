<?php
    header('Content-Type: text/html; charset=utf-8; X-UA-Compatible: IE=Edge');
?>
<!DOCTYPE html>
<html>
<head>
    <?= link_tag('assets/img/favlogo.png', 'shortcut icon', 'image/png'); ?>
    <title>Web</title>
    <?php foreach($this->config->item('cssIncludes') as $css) { ?>
      <link rel="stylesheet" href="<?=base_url('assets/css/'.$css.'.css?t=' . time());?>">
    <?php } ?>
    <?php foreach($this->config->item('cssIncludesPrint') as $css) { ?>
      <link rel="stylesheet" media="print" href="<?=base_url('assets/css/'.$css.'.css?t=' . time());?>">
    <?php } ?>
    <?php if(isset($cssIncludes)) foreach($cssIncludes as $css) { ?>
      <link rel="stylesheet" href="<?=base_url('assets/css/'.$css.'.css?t=' . time());?>">
    <?php } ?>
</head>
<?php $notificacoes = $this->session->flashdata('data_notificacao');?>
<body <?= ($notificacoes) ? 'data-tp-alerta="' . $notificacoes['tipo_alerta'] . '" data-codigo="' . $notificacoes['codigo'] . '" data-msg-notificacao="' . $notificacoes['mensagem'] . '"' : '';?>>