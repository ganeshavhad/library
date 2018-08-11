<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Books Category Details <?php if($pri[0]->pri_add=="1"){ ?> <a href="<?php echo base_url('book/addcategory');?>"><button type="button" class="btn btn-default btn-sm"> + Add Books Category </button></a><?php }?>
                </h3></h3>
              </div>
           
            </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

            <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
            <div class="x_content bs-example-popovers" id="topScroll" >
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                    </button>
                    <strong>Alert , Category Added/Updated Unsuccessfull !</strong> .
                  </div>
                  <?php } if($this->session->flashdata('login')=="successfull"){?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                    </button>
                      <strong>Alert , Category Added/Updated Successfull !</strong> 
              </div> 
           </div> 
          <?php } ?>
          
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
                          <th>Category Name</th>
                        <!--   <th>Date And Time</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody><?php $i=0; foreach($result as $value){ $i++;  ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->bookcat;?></td>
                         <!--  <td><?php echo $value->added_on;?></td> --> 
                          
                          <td> <a href="<?php echo base_url('Book/editcat/?id=');echo $value->bookcatID;?>">
                          <?php if($pri[0]->pri_edit=="1"){ ?>  <button class="btn btn-info" type="button" >  <i class="fa fa-edit"> </button><?php } ?></a></td>
                        </tr>
                        <?php } ?>
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