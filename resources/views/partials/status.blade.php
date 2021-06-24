@if (session('status'))
    <?php $mensaje=session('status');?>
    <script type="text/javascript">
        alert("<?php echo $mensaje; ?>");
    </script>
@endif
