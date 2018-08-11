<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';
    ini_set('max_execution_time', 300);
    ?>
    <!-- Begin: Content -->
    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Back Up </h3>
              </div>

            
            </div>
            <div class="clearfix"></div>

  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
              <div class="panel panel-visible" id="spy2">
				<div style="padding: 20px 0px;text-align: -webkit-center;">
                      <h3> <b>Database Backup</b> </h3>
                    </div>
					<div class="box">
						<!-- form start -->
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-6" style="padding: 20px 0px;">	
									<form action="<?=base_url('CreateDb/full_backup');?>" class="form-horizontal" role="form" method="post">  
										<label for="photo" class="col-sm-4 control-label col-xs-8 col-md-5"  style="padding:0px;">
										Backup Application Folder 
										</label>
										<div class="form-group">
											<div class="col-md-2 rep-mar">
												<input type="hidden" value="0" name="hidden">
												<!-- <input type="submit" class="btn btn-info" value="Download Backup"> -->
											  
												<button type="submit" class="btn btn-primary">
												   <i class="fa fa-download"></i> Backup Application
												</button>
											</div>
										</div>
									</form>
								</div>
								<div class="col-sm-6" style="padding: 20px 0px;">	
									<form action="<?=base_url('CreateDb/up');?>" class="form-horizontal" role="form" method="post">  
										<label for="photo" class="col-sm-2 control-label col-xs-8 col-md-4"  style="padding:0px;">
										  Backup Uploads Folder 
										</label>
										<div class="form-group">
											<div class="col-md-1 rep-mar">
												<input type="hidden" value="0" name="hidden">
												<!-- <input type="submit" class="btn btn-info" value="Download Backup"> -->
											  
												<button type="submit" class="btn btn-primary">
												   <i class="fa fa-download"></i> Backup Uploads Folder
													</button>

											</div>
										</div>
									</form>
									<br>
								</div>
								<div class="col-sm-4" style="padding: 20px 0px;display: none;">
									<form action="<?=base_url('CreateDb/singletable');?>" class="form-horizontal" role="form" method="post">  
										<label for="photo" class="col-sm-2 control-label col-xs-8 col-md-4"  style="padding:0px;">
										  Backup Single Table 
										</label>
										<div class="form-group">
											<div class="col-md-1 rep-mar">
												<input type="hidden" value="0" name="hidden">
												<!-- <input type="submit" class="btn btn-info" value="Download Backup"> -->
											  <br>
											   <div class="col-sm-6">

											   <?php
												$array = array();

												$cdatabasename=$this->db->database;
													
												$tables=$this->db->query("SELECT t.TABLE_NAME AS myTables FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = '$cdatabasename'")->result_array();    
												?><select name="table"><?php
						
												foreach($tables as $key => $val)
												{
												?>
												<option value="<?php echo $val['myTables'] ?>"><?php echo $val['myTables'] ?></option>
												<?php

												}
												?>
					  
												</select>
												<?php							
													
												?>

												</div>
											  <br>
											<br><br>						  
												<button type="submit" class="btn btn-primary">
												   <i class="fa fa-download"></i>Backup Single Table
													</button>

											</div>
										</div>
									</form>
									
								</div>            
							</div><!-- row -->
						</div><!-- Body -->
					</div><!-- /.box -->
              </div>
            </div>
          </div>
        </div>
    </div></div></div>
        <!-- end: .tray-center -->
     
   <script type="text/javascript">
  $(document).ready(function() {

   $('#datatable2').dataTable({
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });
  });
  </script>
<?php include 'footer.php'; ?>
  <!-- END: PAGE SCRIPTS