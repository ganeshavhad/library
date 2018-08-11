<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>School Info</h3>
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

                  <?php echo form_open_multipart('School/update', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">School Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="schoolname" value="<?php print_r($result['0']->school_name);?>" required="required" type="text">
                          <input type="hidden" name="id" value="<?php print_r($result['0']->id);?>" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="textarea" required="required" value="<?php print_r($result['0']->address);?>" name="schooladdress" class="form-control col-md-7 col-xs-12"></input>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">School Email <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="schoolemail" value="<?php print_r($result['0']->email);?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">School contact <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number"  max="9999999999" name="schoolnumber" value="<?php print_r($result['0']->contact);?>" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="schoolwebsite" required="required" value="<?php print_r($result['0']->web_url);?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Board <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="board" value="<?php print_r($result['0']->board);?>" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >School Logo <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="file" name="schoollogo" value="<?php print_r($result['0']->logo);?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">
                          <?php $photo = str_replace(' ', '_', $result['0']->logo);?>
                        <img src="<?php echo base_url($photo);?>" alt="Student photo" style="width:100px;height:150px;">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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