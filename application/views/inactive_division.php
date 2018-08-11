<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- page content -->

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Division</h3>
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
                      <tbody><?php $i=0; foreach($result as $value){  $i++; if($value->activediv=="0"){?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $value->name;?></td>
                          <!-- <td><?php echo $value->address;?></td> -->
                          
                          <td><a href="<?php echo base_url('Division/edit/?id=');echo $value->id;?>"><button class="btn btn-info" type="button" >  <i class="fa fa-edit"></i> </button> 

                          <a href="<?php echo base_url('Division/activediv/?id=');echo $value->id;?>"> <button class="btn btn-success" type="button" > <i class="fa fa-check"></i>
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