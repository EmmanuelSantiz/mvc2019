<br>
<br>
<div id="divError"></div>
<?php
if(isset($_SESSION['flash'])) { ?>
<script>
	$(function() {
		$('#divSuccess').html('').html(message('success', '<?php echo $_SESSION["flash"]; ?>'));
	});
</script>
<?php
unset($_SESSION['flash']);
}
?>
<div id="divSuccess"></div>