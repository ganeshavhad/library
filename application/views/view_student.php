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
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                          <strong>Alert , Student Added/Updated Unsuccessfully !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Student Added/Updated Successfully !</strong> 
                    </div> 
                 </div> 
              <?php } ?>

                   <h3>Student Details  <?php if($pri[0]->pri_add=="1"){ ?><a href="<?php echo base_url('Student/index');?>">
                    <button type="button" class="btn btn-default btn-sm"> + Add Student </button></a>
                    <a href="<?php echo base_url('Student/inactive');?>"><button type="button" class="btn btn-default btn-sm">  Inactive Student </button></a><?php } ?>
                  </h3>
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
                          <th>Student Name</th>
                          <th>Standard </th>
                          <th> Division</th>
                          <th>Library ID</th>
                          <th>Contact</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                     <tbody><?php $i=0;  foreach($result as $value){   $i++;?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->name;?></td>

                          <?php foreach($result2 as $value1){ if($value->classesID==$value1->id) { ?>
                            <td><?php echo $value1->name; } ?></td>
                          <?php }?>
                           <?php foreach($result1 as $value1){ if($value->sectionID==$value1->id) { ?>
                            <td><?php echo $value1->name; } ?></td>
                          <?php }?>
                       
                          <td><?php echo $value->library;?></td>
                          <!-- <td><?php echo $value->address;?></td> -->
                          <td><?php echo $value->phone;?></td>
                          <td>  <?php if($pri[0]->pri_edit=="1"){ ?><a href="<?php echo base_url('Student/edit/?id=');echo $value->studentID;?>"> <button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button> </a><?php } ?>

                            <a href="<?php echo base_url('Student/profile/?id=');echo $value->studentID;?>"> <button class="btn btn-success" type="button" > <i class="fa fa-eye"></i></button></a>
                            <?php if($pri[0]->pri_delete=="1"){ ?>
                             <a href="<?php echo base_url('Student/inactivestd/?id=');echo $value->studentID;?>" ><button  class="btn btn-danger" onclick=" return confirm('Please Confirm Once Again!')" type="button" > <i class="fa fa-close"></i></button></a><?php } ?>
                          </td>
                        </tr>

                        <?php  } ?>
                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>

             
        <!-- /page content -->

       <?php include 'footer.php';?>