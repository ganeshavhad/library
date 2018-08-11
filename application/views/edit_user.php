<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Info</h3>
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
                  <?php echo form_open_multipart('User/Update', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>
                   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Full Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" value="<?php echo $result[0]->name;?>" data-validate-words="2" name="name"  required="required" type="text">
                          <input type="hidden" name="user_id" value="<?php echo $result[0]->user_id;?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> User Role <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-7 col-xs-12" required="" name="role_name">
                          <?php foreach($result1 as $value){ if($result[0]->user_role==$result1->role_id){?>
                          <option value="<?php echo $result[0]->user_role;?> "><?php echo $result[0]->user_role; ?></option><?php } }?>
                          <option value=""> Select User Role </option>
                           <?php foreach($result1 as $value){ ?>
                           <option value="<?php echo $value->role_id;?>"> <?php echo $value->role_name;?> </option><?php } ?>
                         </select>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Gender <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-7 col-xs-12" required="" name="usergender">
                          <option value=""> Select Gender</option>
                           <option value="male"> Male </option>
                           <option value="female"> Female </option>
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> DOB <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" value="<?php echo $result[0]->birth_date;?>" class="form-control col-md-7 col-xs-12"  name="userdob" placeholder="" required="required" type="date">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" value="<?php echo $result[0]->email;?>" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" value="<?php echo $result[0]->email;?>" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> contact <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" value="<?php echo $result[0]->mobile_number;?>"  max="9999999999" name="rolecontact" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> User name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" value="<?php echo $result[0]->user_name;?>" name="username" onkeypress="return RestrictSpace()" class="form-control col-md-7 col-xs-12"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password  <span id="span" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" value="<?php echo $result[0]->password;?>" type="password" onkeypress="return RestrictSpace()" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password  <span id="span" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2"  value="<?php echo $result[0]->password;?>"type="password" onkeypress="return RestrictSpace()" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
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
<script type="text/javascript">
function RestrictSpace() {
  if (event.keyCode == 32) {
  return false;
      }
    }
</script>
<?php include 'footer.php';?>