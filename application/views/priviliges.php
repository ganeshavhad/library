
<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Role Info <!-- <a href="<?php echo base_url('Division/inactive');?>"><button type="button" class="btn btn-default btn-sm">  Inactive Role </button></a> --></h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
                  <div class="x_content bs-example-popovers" id="topScroll" >
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                          <strong>Unsuccessful , Privileges Added Allready  !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Successful , Privileges Added/Updated Successfully !</strong> 
                    </div> 
                 </div> 
              <?php } ?>

                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('User/view');?>" method="post">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <select class="form-control col-md-7 col-xs-12" required name="roleid">

                          	<option value="">Select Role Name</option>
                          	<?php foreach($result as $value){?>
                          	<option value="<?php echo $value->role_id;?>"><?php echo $value->role_name;?></option><?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">  
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

           
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
<?php  echo form_open('User/addpriviliges');?>

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr> <input type="checkbox" onClick="toggle(this)" /> Checked All<br/></tr>
                        <tr>
                          <th>Sr No</th>
                          <th>Page Name</th>
                          <th>View </th>
                          <th>Add </th>
                          <th>Edit </th>
                          <th>Delete </th>
                        </tr>
                      </thead>
                      <tbody><?php $i=0;  foreach($result1 as $value){  $i++;  if(isset($submit)){ ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <?php foreach($result2 as $value1){ if($value->privilege_id==$value1->privilege_id){ ?>
                          <td><?php echo $value->page_name;?></td>

                        <?php  if($value1->pri_view=="1"){ ?>
                          <td> <input type="checkbox" checked="" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="view[]"></td>
                        <?php } else{ ?>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="view[]"></td>

                        <?php } if($value1->pri_add=="1"){ ?>
                          <td> <input type="checkbox" checked="" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="add[]"></td>
                        <?php }else { ?>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="add[]"></td>

                        <?php } if($value1->pri_edit=="1"){ ?>
                          <td> <input type="checkbox" checked="" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="update[]"></td>
                        <?php }else { ?>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="update[]"></td>

                        <?php } if($value1->pri_delete=="1"){ ?>
                          <td> <input type="checkbox" checked="" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="delete[]"></td>
                        <?php }else { ?>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="delete[]"></td>
                        <?php } } } ?>

                        </tr>
                        <?php  } else{    ?>

                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->page_name;?></td>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>"  name="view[]"></td>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>"  name="add[]">  </td>
                          <td> <input type="checkbox" class="btn btn-info" value="<?php echo $value->privilege_id;?> "  name="update[]">  </td>
                          <td> <input type="checkbox" class="btn btn-info" value=" <?php echo $value->privilege_id;?>" name="delete[]">  </td>
                        </tr>
                        <?php  } } ?>

                      </tbody>
                    </table>
<?php if(isset($submit)){
$pri=count($result1); $updte=count($result2); ?>
<input type="hidden" name="role_id" value="<?php echo $submit;?>">
<input type="hidden" name="tra_priv_id" value="<?php  if($pri==$updte){ echo $pri;} else{echo "1";} ?>" >
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">  
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                <?php } echo form_close('');?>

                  </div>
                </div>
              </div>             
            </div>
          </div>
        </div>
        <!-- /page content -->
<script type="text/javascript">
 function toggle(source) {
  checkboxes = document.getElementsByName('delete[]');
  check = document.getElementsByName('view[]');
  checkb = document.getElementsByName('update[]');
  checkbox = document.getElementsByName('add[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
  for(var i=0, n=check.length;i<n;i++) {
    check[i].checked = source.checked;
  }
  for(var i=0, n=checkb.length;i<n;i++) {
    checkb[i].checked = source.checked;
  }
  for(var i=0, n=checkbox.length;i<n;i++) {
    checkbox[i].checked = source.checked;
  }
}
</script>
        <?php include 'footer.php';?>