<?php if (isset($datos['script'])) { ?>
    <script type="module"  src="<?php print BASE_URL ?>assets/js/<?php print $datos['script'] ?>"></script>
<?php } ?>
<script>
    const URL_BASE = '<?php print BASE_URL ?>';
</script>
</body>

</html>