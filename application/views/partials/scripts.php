<?php foreach($this->config->item('jsIncludes') as $js) { ?>
    <script src="<?=base_url('assets/js/'.$js.'.js?t=' . time());?>"></script>
<?php } ?>
<?php if(isset($jsIncludes)) foreach($jsIncludes as $js) { ?>
    <script src="<?=base_url('assets/js/'.$js.'.js?t=' . time());?>"></script>
<?php } ?>
</html>
