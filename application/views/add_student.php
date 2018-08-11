<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Info</h3>
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

                  <?php echo form_open_multipart('Student/add', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Register No <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" maxlength="10" name="Studentno"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Full Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="Studentname"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Standard <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-6 " name="Studentstd" required="">
                           <option value=""> Select Standard </option>
                           <?php foreach($result1 as $value){?>
                           <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                         <?php }?>
                         </select>
                        </div>
                        
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Division <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  class="form-control col-md-6 " name="Studentdiv" required="">
                           <option value=""> Select Division </option>
                           <?php foreach($result as $value){?>
                           <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                         <?php }?>
                         </select>
                      </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Gender <span id="span"  class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-7 col-xs-12" name="Studentgender" required="">
                           <option value=""> Select Gender </option>
                           <option value="male"> Male </option>
                           <option value="female"> Female </option>
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> DOB <span style="color: red" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentdob" placeholder="" required="required" type="date">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Library No <span style="color: red" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" name="library" class="form-control col-md-7 col-xs-12"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span style="color: red" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="Studentadrs" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="Studentemail" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> contact 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number"  max="9999999999" name="Studentcontact" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                                           
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Image <span style="color: red" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" accept=".jpg , .png , .jpeg" name="Studentimage" class="form-control col-md-7 col-xs-12">
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