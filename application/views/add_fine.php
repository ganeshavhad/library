<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Book Fine</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!--  <h2>  Book Fine</h2> -->
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

                  <?php echo form_open_multipart('IssueBook/addfine', array(
                  'class' => 'form-horizontal form-label-left' 
                  ));  ?>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Library ID<span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">

                         <input id="name" class="form-control col-md-7 col-xs-12" name="lID" value="<?php print_r($result[0]->lID);?>"  required="required" readonly type="text">
                         <input name="issueID" value="<?php print_r($result[0]->issueID);?>"  type="hidden">
                        </div>  
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Category <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php foreach($result2 as $value){ if($value->bookcatID==$result[0]->bookcatID){
                            $Category=$value->bookcat;} }?>
                           <input id="name" class="form-control col-md-7 col-xs-12" name="bookcatID" value="<?php if(isset($Category)){print_r($Category);} else{ echo $result[0]->bookcatID;}?>"  required="required" readonly type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Name <span id="span" class="required">*</span>
                        </label>
                       
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php foreach($result1 as $value){ if($value->bookID==$result[0]->bookID){ ?>
                         <input id="name" class="form-control col-md-7 col-xs-12" name="book" value="<?php echo $value->book;?>"  required="required" readonly type="text">
                       <?php } } ?>
                         <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $result[0]->bookID;?>" name="bookID"   type="hidden">
 
                        </div> 
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="author" value="<?php print_r($result[0]->author);?>" readonly  required="required" type="text">
                        </div>  
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Total Fine
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="totalval" class="form-control col-md-7 col-xs-12"  onchange="updateDue()" name="total_fine" value="<?php print_r($fine);?>" readonly  required="required" type="numbers">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine Concession <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="inideposit" onchange="updateDue()" class="form-control col-md-7 col-xs-12" name="fine_conc" value="<?php if($fine==0){echo 0;}?>"  required="required" type="numbers">

                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="numbers" readonly id="remainingval" value="<?php if($fine==0){echo 0;}?>" name="fine" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Payment Mode <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="paymenttype" class="form-control col-md-7 col-xs-12" onchange="yesnoCheck(this);">
                              <option value="cash">cash</option>
                              <option value="Cheque">Cheque</option>
                              <option value="card">Debit Card/ Neft</option>
                           </select>
                        </div>
                      </div>

                      <div id="Bankname" style="display: none;"  class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Bank Name <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="bank_name"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div id="Chequeno" style="display: none;" class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Cheque No <span id="span" class="required">*</span>
                        </label>
                        <div  class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="cheque_no"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
            
                      <div id="card" style="display: none;" class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Reference No <span id="span" class="required">*</span>
                        </label>
                        <div  class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="reference_no" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
<?php  date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');   ?>              
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date <span class="required" id="span">*</span>
                        </label>
                        <div  class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" required="required" value="<?php echo $date;?>" id="name" name="payment_date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Remark 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="fine_remark" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <button id="send" type="submit" class="btn btn-success">Submit</button>       
                        </div>                        
                      </div>
                   <?php echo form_close(''); ?>
                    <!-- <div class="form-group">
                   <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href="<?php //echo base_url('IssueBook/receipt/?Issueid=');echo $result[0]->issueID."&&LID=".$result[0]->lID?>"> <button  class="btn btn-success">print</button> </a>           
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<script>
    function yesnoCheck(that) {
        if (that.value == "card") {
          $("#card").show();
           $("#Bankname").show();
        } else {
          $("#card").removeAttr("style").hide();     
        }

        if (that.value == "cash") {
         $("#Bankname").removeAttr("style").hide();
          $("#Chequeno").removeAttr("style").hide();
           $("#card").removeAttr("style").hide();
        }

        if(that.value == "Cheque"){
          $("#Chequeno").show();
          $("#Bankname").show();
     
        } else {
          $("#Chequeno").removeAttr("style").hide();
        }
    }

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