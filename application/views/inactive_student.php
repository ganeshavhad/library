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
                   <h3>Student Details  <a href="<?php echo base_url('Student/index');?>"><button type="button" class="btn btn-default btn-sm"> + Add Student </button></a>
                    <a href="<?php echo base_url('student/view');?>"><button type="button" class="btn btn-default btn-sm">  Active Student </button></a></h3>
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
                          <th>Address</th>
                          <th>Contact</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                     <tbody><?php $i=0;  foreach($result as $value){ $i++;   ?>
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
                          <td><?php echo $value->address;?></td>
                          <td><?php echo $value->phone;?></td>
                          <td>
                            <a href="<?php echo base_url('Student/profile/?id=');echo $value->studentID;?>"> <button class="btn btn-info" type="button" > <i class="fa fa-eye"></i></button></a>

                             <a href="<?php echo base_url('Student/active/?id=');echo $value->studentID;?>"> <button class="btn btn-success" type="button" > <i class="fa fa-check"></i></button></a>
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