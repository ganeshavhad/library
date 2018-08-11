<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>School Details  <!-- <a href="<?php echo base_url('School/index');?>"><button type="button" class="btn btn-default btn-sm"> + Add School </button></a> --></h3>
              </div>
              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            
            </div>           
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
                  <div class="x_content bs-example-popovers" id="topScroll" >
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                          <strong>Alert , School Added/Updated Unsuccessfull !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , School Added/Updated Successfull !</strong> 
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
                          <th>School Name</th>
                          <th>Address</th>
                          <th>School Contact</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody><?php $i=0; foreach($result as $value){ $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->school_name;?></td>
                          <td><?php echo $value->address;?></td>
                          <td><?php echo $value->contact;?></td>
                          <td>  <a href="<?php echo base_url('School/edit/?id=');echo $value->id;?>">
                            <?php if($pri[0]->pri_edit=="1"){?><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button><?php } ?> </a></td>
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