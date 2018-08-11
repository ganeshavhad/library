<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

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
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <strong>Unsuccessfull , Role Added Allready  !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                            <strong>Successfull , Role Added/Updated Successfully !</strong> 
                    </div> 
                 </div> 
              <?php } ?>

                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('User/role');?>" method="post">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="20" name="rolename" required="required" type="text">
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

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Sr No</th>
                        <th>Role Name</th>
                        <th>Edit </th>
                         <th>InActive </th>
                       
                      </tr>
                    </thead>
                    <tbody><?php $i=0; foreach($result as $value){  $i++; if($value->status=="1"){ ?>
                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $value->role_name;?></td>
                        <!-- <td><?php echo $value->address;?></td> -->
                        
                        <td><a href="<?php echo base_url('User/editrole/?id=');echo $value->role_id;?>"><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button>
                        </a>
                        </td>
                        <td> <a href="<?php echo base_url('User/inactiverole/?id=');echo $value->role_id;?>">
                         <button  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-danger" type="button" > <i class="fa fa-close"></i></button></a>
                        </td>
                      </tr>
                      <?php } } ?>


                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-body">
                        <h4>Confirm Before Inactive Role </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a href="<?php echo base_url('User/inactiverole/?id=');echo $value->role_id;?>"><button type="button" class="btn btn-danger">Inactive Role</button></a>
                      </div>
                    </div>
                  </div>
                </div>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
        <!-- /page content -->

        <?php include 'footer.php';?>