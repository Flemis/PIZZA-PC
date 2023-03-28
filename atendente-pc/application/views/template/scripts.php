<script src="<?php echo base_url('public/js/clock.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery-3.6.0.js'); ?>"></script>
<script src="<?php echo base_url('public/js/script.js'); ?>"></script>

<?php if (isset($scripts)) {
	foreach ($scripts as $script_name) {
		$src = base_url() . "public/js/" . $script_name; ?>
		<script src="<?=$src?>"></script>
	<?php }
} ?>