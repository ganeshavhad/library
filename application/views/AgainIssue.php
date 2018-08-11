<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Issue Book Again </h3>
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

                  <?php echo form_open_multipart('IssueBook/add', array(
                  'class' => 'form-horizontal form-label-left', 
                  )); ?>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Library ID <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="libraryid" value="<?php print_r($result[0]->lID);?>"  required="required" readonly type="text">
                        </div>  
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Category <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php foreach($result2 as $value){ if($value->bookcatID==$result[0]->bookcatID){
                            $Category=$value->bookcat;} }?>
                           <input id="name" class="form-control col-md-7 col-xs-12" name="bookcategory" value="<?php if(isset($Category)){print_r($Category);} else{ echo $result[0]->bookcatID;}?>"  required="required" readonly type="text">

                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="name" class="form-control col-md-7 col-xs-12" name="bookname" value="<?php print_r($result1[0]->book);?>"  required="required" readonly type="text">
                         <input id="name" class="form-control col-md-7 col-xs-12" value="$result[0]->bookID"  name="bookID"   type="hidden">
                        </div> 
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Serial No <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="name" class="form-control col-md-7 col-xs-12" name="bookname" value="<?php print_r($result[0]->serial_no);?>"  required="required" readonly type="text">
                         <input id="name" class="form-control col-md-7 col-xs-12" value="$result[0]->bookID"  name="bookID"   type="hidden">
                        </div> 
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="authorname" value="<?php print_r($result[0]->author);?>" readonly  required="required" type="text">
                        </div>  
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession No <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="<?php print_r($result[0]->accesseion_no);?>" readonly  data-validate-length-range="6"  name="accesseion_no"  required="required" type="text">
                        </div>
                      </div>
<?php date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d'); // add 3 days to date
$default=$result3[0]->due_date;// add 3 days to date
$NewDate=Date('Y-m-d', strtotime("+".$default." days"));?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Issue Date <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="issuedate" value="<?php echo $date;?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Due Date <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="duedate" value="<?php echo $NewDate;?>" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="fine" value="<?php echo $result3[0]->fine;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Note 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="note"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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