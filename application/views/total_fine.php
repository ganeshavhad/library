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
                          <strong>Alert , Fine Added/Updated Unsuccessfull !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Fine Added/Updated Successfull !</strong> 
                    </div> 
                 </div> 
              <?php } ?>



                   <h3>Total Fine Details  <!-- <a href="<?php echo base_url('Student/index');?>"><button type="button" class="btn btn-default btn-sm"> + Add Student </button></a>
                    <a href="<?php echo base_url('Student/inactive');?>"><button type="button" class="btn btn-default btn-sm">  Inactive Student </button></a> --></h3>
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
                          <th>Book Name</th>
                          <th>Student Name</th>
                          <th>Total fine <i class="fa fa-inr"></i> </th>
                          <th>Library ID</th>
                          <th>Payment date</th>
                          <th width="10%">Print Receipt</th>
                          
                        </tr>
                      </thead>


                     <tbody><?php $i=0; foreach($result as $value){ $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->bookID;?></td>
                          <?php foreach($result1 as $value1){ if($value1->library==$value->studentID){ ?>
                          <td><?php echo $value1->name;?></td><?php } }?>
                           <td><?php echo $value->paymentamount." .00";  ?> <i class="fa fa-inr"></i></td>
                           <td><?php echo $value->studentID;?></td>
                          <td><?php  $date =explode("-", $value->paymentdate); echo $date[2]."-".$date[1]."-".$date[0];
                          ?></td>
                          <td>   <a href="<?php echo base_url('IssueBook/receipt/?paymentID=');echo $value->paymentID;?>"> <button class="btn btn-info" type="button" >  <i class="fa fa-print"></i> </button> </a>

                          </td>
                        </tr>
                        <?php } ?>

                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4>Confirm Before Inactive Student </h4>
                          <p>U Can Activate Student Again</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a href="<?php echo base_url('Student/inactivestd/?id=');echo $value->studentID;?>"> <button type="button" class="btn btn-danger">Inactive Student</button></a>
                        </div>
                      </div>
                    </div>
                  </div>

                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>

             
        <!-- /page content -->

       <?php include 'footer.php';?>