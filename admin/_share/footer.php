<?php
    require_once $path.'../commons/utils.php';
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <script>
  $(function () {
    $('#example1').DataTable()
  });
</script>

<div id="alert-area"></div>
<script>
<?php
    include $path.'../js/alertbox.js';
?>
</script>