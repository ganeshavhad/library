<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Return Book </h3>
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

                  <?php echo form_open_multipart('IssueBook/return', array(
                  'class' => 'form-horizontal form-label-left', 
                  )); ?>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Library ID<span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="libraryid" value="<?php print_r($result[0]->lID);?>"  required="required" readonly type="text">
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
<!-- <?php date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d h-i-s'); // add 3 days to date
$NewDate=Date('Y-m-d', strtotime("+7 days")); ?> -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Due Date <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="duedate" value="<?php print_r($result[0]->due_date);?>" required="required" type="date">
                        
                        </div>
                      </div>
                      
                <input type="hidden" name="bookID" value="<?php print_r($result[0]->bookID);?>">
                <input type="hidden" name="issueID" value="<?php print_r($result[0]->issueID);?>">
                      <!--       <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="name" name="fine" value="<?php print_r($fine);?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      </div> -->

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

<script type="text/javascript">
function updateDue() {

    var total = parseInt(document.getElementById("totalval").value);
    var val2 = parseInt(document.getElementById("inideposit").value);

    // to make sure that they are numbers
    if (!total) { total = 0; }
    if (!val2) { val2 = 0; }

    var ansD = document.getElementById("remainingval");
    ansD.value = total - val2;
}
</script>
        <!-- /page content -->
<?php include 'footer.php';?>