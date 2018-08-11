<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

          <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
              <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                      </button>
                      <strong>Unsuccessfull !</strong> Please check username or Password.
                    </div>
                  </div>
                    <?php } if($this->session->flashdata('logout')=="successfull"){?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                        <strong>Logout Successfull !</strong> 
                </div>   
          <?php } ?>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <h3>Books Details  <a href="<?php echo base_url('book/add');?>"><button type="button" class="btn btn-default btn-sm"> + Add Books </button></a>  <a href="<?php echo base_url('book/view');?>"><button type="button" class="btn btn-default btn-sm">  Active Books </button></a>
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
                          <th>Book Name</th>
                          <th>Category </th>
                          <th>Author</th>
                          <th>Accession No</th>
                          <th>Price <i class="fa fa-rupee"></i></th>
                          <th>Quantity</th>
                          <th>Available</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>


                     <tbody><?php $i=0;  foreach($result2 as $value){ $i++;  ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->book;?></td>

                          <?php foreach($result1 as $value1){ if($value->bookcatID==$value1->bookcatID) { $value1->bookcat; ?>
                            <td><?php echo $value1->bookcat; } ?></td>
                          <?php }?>
                       
                          <td><?php echo $value->author;?></td>
                          <td><?php echo $value->accesseion_no;?></td>
                          <td><?php echo $value->price.".00";?></td>
                          <td><?php echo $value->quantity;?></td>
                          <td><?php echo $value->availbility;?></td>
                          
                          <td> 
                            <a href="<?php echo base_url('book/profile/?id=');echo $value->bookID;?>"> <button class="btn btn-info" type="button" > <i class="fa fa-eye"></i></button></a>
                            <a href="<?php echo base_url('book/bookactive/?id=');echo $value->bookID;?>"> <button class="btn btn-success" type="button" > <i class="fa fa-check"></i></button></a>
                          </td>
                        </tr>
                        <?php }  ?>
                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>

             
        <!-- /page content -->

       <?php include 'footer.php';?>