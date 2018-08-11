<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
 <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
                  <div class="x_content bs-example-popovers" id="topScroll" >
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <strong>Unsuccessfull , User Added/Updated Unsuccessfully !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                            <strong>Successfull , User Added/Updated Successfully !</strong> 
                    </div> 
                 </div> 
              <?php } ?>



                   <h3>User Details  <a href="<?php echo base_url('User/creat');?>"><button type="button" class="btn btn-default btn-sm"> + Add User </button></a>
                    <a href="<?php echo base_url('User/index');?>"><button type="button" class="btn btn-default btn-sm"> Active User </button></a></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
              
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                       <tr>
                          <th>Sr No</th>
                          <th>Full Name</th>
                          <th>User Role </th>
                          <th>username</th>
                          <th>Email ID</th>
                          <th>Contact</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                     <tbody><?php $i=0;  foreach($result as $value){ $i++; if($value->status=="0"){ ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->name;?></td>

                          <?php foreach($result1 as $value1){ if($value->user_role==$value1->role_id) { ?>
                            <td><?php echo $value1->role_name; } ?></td>
                          <?php }?>
                          
                          <td><?php echo $value->user_name;  ?></td>                       
                          <td><?php echo $value->email;?></td>
                          <td><?php echo $value->mobile_number;?></td>
                          <td>  
                            <a href="<?php echo base_url('User/activeuser/?id=');echo $value->user_id;?>">
                             <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-success" type="button" > <i class="fa fa-check"></i></button></a>
                          </td>
                        </tr>
                        <!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4>Confirm Before Inactive User </h4>
                          <p>U Can Activate User Again</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a href="<?php echo base_url('User/activeuser/?id=');echo $value->user_id;?>"> <button type="button" class="btn btn-danger">Inactive User</button></a>
                        </div>
                      </div>
                    </div>
                  </div> -->
                        <?php } } ?>
                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>

             
        <!-- /page content -->

       <?php include 'footer.php';?>