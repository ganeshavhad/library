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
                          <strong>Lost Book Not Added  ! </strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Lost Book Added Successfully ! </strong> 
                    </div> 
                 </div> 
              <?php } ?>

                   <h3>Books Details    <?php if($pri[0]->pri_add=="1"){?> <a href="<?php echo base_url('book/addlost');?>"><button type="button" class="btn btn-default btn-sm"> + Add Lost Books </button></a>  <?php }?>
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
                          <th width="15%">Book Name</th>
                          <th>Student</th>
                          <th width="10%">Author</th>
                          <th>Lost date </th>
                          <th>Fine <i class="fa fa-rupee"></i></th>
                       <!--    <th>Action </th>  -->                       
                        </tr>
                      </thead>

                    <tbody><?php $i=0; foreach($result as $value){ $i++; ?>
                         <tr>
                          <th ><?php echo $i;?></th>
                          <td><?php echo $value->bookname;?></td>
                          <td><?php echo $value->lID; ?></td>
                          <td><?php echo $value->author;?></td>
                          <td><?php echo $value->lost_date;?></td>
                          <td><?php echo $value->fine;?></td>                       
                          <!-- <td><a href="<?php echo base_url('book/edit/?id=');echo $value->id;?>">
                             <button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button> </a>
                          </td> -->
                        </tr>
                        <?php  } ?>
                      </tbody> 
                    </table>
                  </div> 
                </div>
              </div>
             
        <!-- /page content -->

       <?php include 'footer.php';?>