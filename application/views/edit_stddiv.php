<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Standard</h3>
              </div>

          
            </div>
            <div class="clearfix"></div>

            <div class="row">
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

                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url('Standard/updatestandwisediv');?>">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Standard Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                   
                          <select class="form-control" name="standard">
                           <option value="<?php echo $result['0']->std_id;?>"><?php  foreach($result2 as $value){ if($result['0']->std_id==$value->id){ echo $value->name; }}?></option> 
                          <option>Select Standard</option>
                          <?php foreach($result2 as $value){ ?>
                          <option name="standard" value="<?php echo $value->id;?>"><?php echo $value->name;?></<option>
                          <?php } ?>
                          </select>
                        
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $result['0']->id;?>">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Division <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                   
                          <select class="form-control" name="division">
                            <option value="<?php echo $result['0']->div_id;?>"><?php  foreach($result1 as $value){ if($result['0']->div_id==$value->id){ echo $value->name; }}?></option>
                          <option>Select Division</option>
                          <?php foreach($result1 as $value){ ?>
                          <option name="division" value="<?php echo $value->id;?>"><?php echo $value->name;?></<option>
                          <?php } ?>
                          </select>
                        
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
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'footer.php';?>