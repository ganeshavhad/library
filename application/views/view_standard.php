<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
            <!--     <h3>Standard Details <a href="<?php echo base_url('Standard/index');?>"><button type="button" class="btn btn-default btn-sm"> + Add Standard </button></a></h3> -->
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
                          <strong>Alert , Standard Added/Updated Unsuccessfull !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Standard Added/Updated Successfull !</strong> 
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
                   <?php if($pri[0]->pri_add=="1"){?>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url('Standard/add');?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Standard Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12"  name="standardname" required="required" type="text">
                        </div>
                      </div>     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                <?php } ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Standard Name</th>
                         <!--  <th>Division</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody><?php $i=0; foreach($result as $value){ $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->name;?></td>
                          <!-- <td><?php echo $value->division;?></td>  -->
                          
                          <td> <a href="<?php echo base_url('Standard/edit/?id=');echo $value->id;?>">
                             <?php if($pri[0]->pri_edit=="1"){?><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button><?php } ?> </td>
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