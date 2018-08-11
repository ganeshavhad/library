<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Info Update</h3>
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

                    <!-- <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('School/add');?>" method="post" enctype="multipart/form-data"> -->

                  <?php echo form_open_multipart('Student/update', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Roll No 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentno" value="<?php print_r($result['0']->roll);?>"  required="required" type="text" readonly>
                          <input type="hidden" name="studentID" value="<?php print_r($result['0']->studentID);?>" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Full Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentname" value="<?php print_r($result['0']->name);?>" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Standard 
                        </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-6 " name="Studentstd" readonly>
                          <?php foreach($result2 as $value1){ if($result['0']->classesID==$value1->id) {?>
                           <option value="<?php echo $value1->id?>"><?php echo $value1->name?> </option>
                           <?php } }?>
                           <option value=""> Select Standard </option>
                           <?php foreach($result2 as $value){?>
                           <option value="<?php echo $value->id?>"><?php echo $value->name ?></option>
                         <?php }?>
                         </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Division 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  class="form-control col-md-6 " name="Studentdiv" readonly>
                             <?php foreach($result1 as $value1){ if($result['0']->sectionID==$value1->id) {?>
                           <option value="<?php echo $value1->id?>"><?php echo $value1->name?> </option>
                           <?php } }?>
                           <option value=""> Select Division </option>
                           <?php foreach($result1 as $value){?>
                           <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                         <?php }?>
                         </select>
                      </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Gender 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-7 col-xs-12" name="Studentgender" readonly>
                           <option value="male"> Male </option>
                           <option value="female"> Female </option>
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student DOB 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="Studentdob" value="<?php print_r($result['0']->dob);?>"required="required" type="date" readonly>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Library No 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="StudentLibno" value="<?php print_r($result['0']->library);?>" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="textarea" required="required"  value="<?php print_r($result['0']->address);?>" name="Studentadrs" class="form-control col-md-7 col-xs-12" readonly/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Student/parents Email 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="Studentemail" value="<?php print_r($result['0']->email);?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Student/Parents contact 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="Studentcontact" value="<?php print_r($result['0']->phone);?>" required="required" type="text" pattern="[0-9]" maxlength="10"  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                                           
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Student Image 
                        </label>
                       <!--  <div class="col-md-3 col-sm-3 col-xs-12"> -->
                         <!--  <input type="file" name="Studentimage" required="required" value="<?php print_r($result['0']->photo);?>" class="form-control col-md-7 col-xs-12" readonly> -->
                    <!--     </div> -->
                        <div class="col-md-3 col-sm-3 col-xs-12">
                       <?php $photo = str_replace(' ', '_', $result['0']->photo);?>
                        <img src="<?php echo base_url($photo);?>" alt="Student photo" style="width:100px;height:150px;">
                      </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         
                         <!--  <button id="send" type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                   <?php echo form_close('');?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'footer.php';?>