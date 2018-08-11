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
                          <strong>Book Not Added  ! </strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Book Added Successfully ! </strong> 
                    </div> 
                 </div> 
              <?php } ?>

                   <h3>Books Details  <?php if($pri[0]->pri_add=="1"){?> <a href="<?php echo base_url('book/add');?>"><button type="button" class="btn btn-default btn-sm"> + Add Books </button></a>  <a href="<?php echo base_url('book/inactive');?>"><button type="button" class="btn btn-default btn-sm">  Inactive Books </button></a><?php }?>
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
                          <th width="5%">Sr No</th>
                          <th width="15%">Book Name</th>
                          <th width="10%">Category </th>
                          <th width="15%">Author</th>
                          <th width="5%">Accession No</th>
                          <th width="5%">Price <i class="fa fa-rupee"></i></th>
                          <th width="5%">Quantity</th>
                          <th width="10%">Available</th>
                          <th width="30%">Action</th>
                        <!--   <th>InActive</th> -->
                        </tr>
                      </thead>


                     <tbody><?php $i=0; foreach($result2 as $value){  $i++; ?>
                        <tr>
                          <th ><?php echo $i;?></th>
                          <td><?php echo $value->book;?></td>

                          <?php foreach($result1 as $value1){ if($value->bookcatID==$value1->bookcatID) { ?>
                            <td><?php echo $value1->bookcat.$value->bookcatID.$value1->bookcatID; } ?></td>
                          <?php } ?>
                          <?php foreach($result1 as $value1){ if($value->bookcatID==$value1->bookcat) { ?>
                            <td><?php echo $value1->bookcat; } ?></td>
                          <?php } ?>
                       
                          <td><?php echo $value->author;?></td>
                          <td><?php echo $value->accesseion_no;?></td>
                          <td><?php echo $value->price.".00";?></td>
                          <td><?php echo $value->quantity;?></td>
                          <td><?php echo $value->availbility;?></td>
                          
                          <td><a href="<?php echo base_url('book/edit/?id=');echo $value->bookID;?>">
                             <?php if($pri[0]->pri_edit=="1"){?><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button> <?php } ?> </a>

                            <a href="<?php echo base_url('book/profile/?id=');echo $value->bookID;?>"> <button class="btn btn-success" type="button" > <i class="fa fa-eye"></i></button></a>

                            <?php if($pri[0]->pri_delete=="1"){ ?>
 
                              <input type="hidden" class="example" value="<?php echo $value->bookID;?>">

                             <a href="<?php echo base_url('book/bookinactive/?id=');echo $value->bookID;?>"><button  class="btn btn-danger" onclick=" return confirm('Please Confirm Once Again!')" type="button"> <i class="fa fa-close"></i></button></a>
                            <?php } ?>

                             <a href="<?php echo base_url('QRcodeC/view/?id=');echo $value->bookID;?>"><button class="btn btn-default" type="button"> <i class="fa fa-qrcode"></i></button></a>
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