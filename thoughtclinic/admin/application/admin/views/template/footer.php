</div>
    <!-- /#wrapper -->

 
    <!-- Bootstrap Core JavaScript -->
	<script src="<?=base_url('assets')?>/js/moment.js"></script>
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/bootstrap-timepicker.js"></script>
	
	<!---------------------------------time picker-------------------------------------------------->
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/datepair.js"></script>
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/jquery.datepair.js"></script>
	<script type="text/javascript" charset="utf8" src="<?=base_url('assets')?>/js/jquery.timepicker.js"></script>
	
	
	<!----------------------------------------------------------------------------------------------->
	<!----- chosen jquery----------->
	<script src="<?=base_url('assets')?>/js/chosen.jquery.js"></script> 
	<script src="<?=base_url('assets')?>/js/prism.js"></script> 
	
	 <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
	
    <script src="<?=base_url('assets')?>/js/bootstrap.min.js"></script>
    <!--<script src="<?=base_url('assets')?>/js/bootstrap-datepicker.js"></script>-->
	<script src="<?=base_url('assets')?>/js/bootstrap-tagsinput.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('assets')?>/js/plugins/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
	<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script src="<?=base_url('assets')?>/js/sb-admin-2.js"></script>
	 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();	
		//$('.datetimepicker6').datetimepicker({format:'yyyy-mm-dd'});
		//$('.datetimepicker7').datetimepicker({format:'yyyy-mm-dd'});
		
    });
    </script>
	   <script type="text/javascript">
            $('.timepicker').timepicker();
        </script>
		
		
		
</body>

</html>
