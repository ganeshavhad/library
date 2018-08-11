<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Info Update</h3>
              </div>

            
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('School/add');?>" method="post" enctype="multipart/form-data"> -->

                  <?php echo form_open_multipart('Student/update', array(
                  'class' => 'form-horizontal form-label-left', 
                  )); ?>

                     <!--   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Roll No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentno" value="<?php print_r($result['0']->roll);?>"  required="required" type="text" readonly>
                          <input type="hidden" name="studentID" value="<?php print_r($result['0']->studentID);?>" >
                        </div>
                      </div> -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Full Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result[0]->name);?>" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Role 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php foreach($result3 as $role){if($role->role_id==$result[0]->user_role) {echo $role->role_name; } } ?>" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> DOB 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php $date1 =explode("-", $result[0]->birth_date);echo $date1[2]."-".$date1[1]."-".$date1[0]; ?>" required="required" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Gender 
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result[0]->gender);?>" required="required" type="text" readonly>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Email 
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result[0]->email);?>" required="required" type="text" readonly>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Contact 
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result[0]->mobile_number);?>" required="required" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> User Name 
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result[0]->user_name);?>" required="required" type="text" readonly>
                        </div>
                      </div>
                                            
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         
                         <!--  <button id="send" type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                   <?php echo form_close('');?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'footer.php';?>