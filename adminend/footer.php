 </main>

</div>

 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php date('Y') ?> <a href="#"><?php echo APP_NAME; ?></a>.</strong> All rights
    reserved.
  </footer>
   <div class="control-sidebar-bg"></div>



<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Slimscroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>



<script type="text/javascript">

    // Fill modal with content from link href
  $("#myModal").on("show.bs.modal", function(e) {
      //get data-id attribute of the clicked element
      var title = $(e.relatedTarget).data('title');
      var dataid = $(e.relatedTarget).data('data-id');
      //alert(title);
      $("h4.modal-title").text(title);
      var link = $(e.relatedTarget);
      $(this).find(".modal-body").load(link.attr("href"));
  });


  // this preserves scrolling behavior correctly on modal that open another modal
  $(document).on('hidden.bs.modal', function(event) {
      if ($('.modal:visible').length) {
          $('body').addClass('modal-open');
      }
  });

  
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>