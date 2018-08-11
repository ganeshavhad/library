<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Standard Details  <?php if($pri[0]->pri_add=="1"){?>  <a href="<?php echo base_url('Standard/standwisediv');?>"><button type="button" class="btn btn-default btn-sm"> + Add Standard wise division </button></a><?php } ?> </h3>
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
                          <strong>Alert , Standard Wise Division Added/Updated Unsuccessful !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Standard Wise Division Added/Updated Successful !</strong> 
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
                          <th>Standard Name</th>
                          <th>Division Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody><?php $i=0; foreach($result as $value){ $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php foreach($resultstd as $value1){  if($value1->id==$value->std_id){echo $value1->name; } } ?></td>
                          <td><?php foreach($resultdiv as $value1){ if($value1->id==$value->div_id){  echo $value1->name; }  }?></td> 
                          
                          <td><?php if($pri[0]->pri_edit=="1"){?> <a href="<?php echo base_url('Standard/editstandwisediv/?id=');echo $value->id;?>"><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button> </a><?php } ?></td>
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