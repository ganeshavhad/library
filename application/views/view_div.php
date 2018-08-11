<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Division  <?php if($pri[0]->pri_add=="1"){?> <a href="<?php echo base_url('Division/inactive');?>"><button type="button" class="btn btn-default btn-sm">  Inactive Division </button></a><?php } ?></h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
                  <div class="x_content bs-example-popovers" id="topScroll" >
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                          <strong>Unsuccessfull , Divisioin Added Allready  !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Divisioin Added/Updated Successfull !</strong> 
                    </div> 
                 </div> 
              <?php }  if($pri[0]->pri_add=="1"){ ?>

                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('Division/add');?>" method="post">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Division Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="20"  name="Divisionname" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><?php } ?>
                </div>
              </div>
            </div>

           
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
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
                          <th>Division Name</th>
                          <th>Action </th>                        
                        </tr>
                      </thead>
                      <tbody><?php $i=0; foreach($result as $value){  if($value->activediv=="1"){ $i++;  ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->name;?></td>
                          
                          <td> <?php if($pri[0]->pri_edit=="1"){?><a href="<?php echo base_url('Division/edit/?id=');echo $value->id;?>">
                            <button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button>
                          </a> <?php } if($pri[0]->pri_delete=="1"){?>
                           <a href="<?php echo base_url('Division/inactivediv/?id=');echo $value->id;?>"> <button  class="btn btn-danger" onclick=" return confirm('Please Confirm Once Again!')" type="button" > <i class="fa fa-close"></i></button></a><?php } ?>
                          </td>
                        </tr>
                        <?php } } ?>

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