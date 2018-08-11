<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Issue Book </h3>
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
                  ));?>

      <input type="hidden" name="issueid" value="<?php echo $result[0]->issueID;?>">
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Library ID<span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="student" name="libraryid" class="form-control col-md-6 " required="">
                    <option value="<?php echo $result[0]->lID;?>"><?php echo $result[0]->lID;?></option>
                    <option value="">Select Library ID</option>
                    </select>
                  </div>  
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Name<span id="span" class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="studentname" name="libraryname" class="form-control col-md-6 " >
                <?php foreach($result4 as $value){ if($value->library==$result[0]->lID) {?><option value="<?php echo $value->studentID;?>"><?php echo $value->name;?></option><?php } } ?> 
                  <option>Select Student Name</option>
                </select>
                </div>  
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Category <span id="span" class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
              
                 <select id="category" class="form-control col-md-6 " name="bookcategory" required="required">
                 <?php foreach($result2 as $value){ if($value->bookcatID==$result[0]->bookcatID) {?><option value="<?php echo $value->bookcatID;?>"><?php echo $value->bookcat;?></option><?php } } ?>  
                  <option value="">Select Category</option>
                  <?php
                  if(!empty($result2)){
                      foreach($result2 as $row){ 
                          echo '<option value="'.$row->bookcatID.'">'.$row->bookcat.'</option>';
                      }
                  }else{
                      echo '<option value="">Category not available</option>';
                  }
                  ?>
              </select>
                  
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Name <span id="span" class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="bookname" name="bookname" class="form-control col-md-6 " required="" >
                    <option value="<?php echo $result1[0]->bookID;?>"><?php echo $result1[0]->book;?></option> 
                    <option value="">Select book name</option>
                  </select>                    
                </div> 
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name <span id="span" class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="author" readonly  class="form-control col-md-6 " name="authorname" required="required">
                    <option value="<?php echo $result1[0]->author;?>"><?php echo $result1[0]->author;?></option>  
                  </select>
                </div>  
              </div>

             <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession No <span id="span" class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="accesseion" readonly class="form-control col-md-6 " name="accesseion_no" >
                 <option value="<?php echo $result1[0]->accesseion_no;?>"><?php echo $result1[0]->accesseion_no;?></option> 
                </select>
              </div>
            </div>
<?php date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d'); 
$default=$result3[0]->due_date;// add 3 days to date
$NewDate=Date('Y-m-d', strtotime("+".$default." days")); ?>
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Serial No <span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" name="serial_no" value="<?php echo $result[0]->serial_no;?>"   required="required" type="number">
                  </div>
              </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Issue Date <span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" class="form-control col-md-7 col-xs-12" name="issuedate" value="<?php echo $date;?>" required="required" type="date">
                  </div>
                </div>

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Due Date <span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" class="form-control col-md-7 col-xs-12" name="duedate" value="<?php echo $NewDate;?>" required="required" type="date">
                  </div>
                </div>
                      
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine <span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="fine" value="<?php print_r($result3[0]->fine); ?>" required="required" class="form-control col-md-7 col-xs-12">
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
<script src="<?php echo base_url('/assets/build/js/jquery.min.js');?>"></script> 
<script type="text/javascript">
$(document).ready(function(){
   
    /* Populate data to state dropdown */
    $('#category').on('change',function(){
        var bookcatID = $(this).val();console.log(bookcatID);
        if(bookcatID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getbook'); ?>',
                data:'bookcatID='+bookcatID,
                success:function(data){
                  $("#bookname").empty();
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.bookID).text(this.book);           
                            $('#bookname').append(option);
                        });
                    }else{
                        $('#bookname').html('<option value="">Book not available</option>');
                    }
                }
            }); 
        }else{
            $('#book').html('<option value="">Select Category first</option>');
            $('#city').html('<option value="">Select Book first</option>'); 
        }
    });

     $('#student').on('change',function(){
        var studentID = $(this).val(); 
        if(studentID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getstudent'); ?>',
                data:'studentID='+studentID,
                success:function(data){
                  
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){ console.log(dataObj);
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.name).text(this.name);           
                            $('#studentname').html(option);
                        });
                    }
                }
            }); 
        }
    });
      $('#studentname').on('change',function(){
        var studentname = $(this).val(); 
        if(studentname){console.log(studentname);
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/studentbyname'); ?>',
                data:'studentname='+studentname,
                success:function(data){
                  
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){ console.log(dataObj);
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.library).text(this.library);           
                            $('#student').html(option);
                        });
                    }
                }
            }); 
        }
    });

    
    /* Populate data to city dropdown */
    $('#bookname').on('change',function(){
        var bookID = $('#bookname').val(); 
        console.log(bookID);
        if(bookID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getBookID'); ?>',
                data:'bookID='+bookID,
                success:function(data){
                   
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.author).text(this.author);           
                           $('#author').html(option);
                    
                            var accesseion = $('<option />');
                            accesseion.attr('value',this.accesseion_no).text(this.accesseion_no);
                            $('#accesseion').html(accesseion);
                        });
                    }else{
                        $('#author').html('<input value="Author not available" />');
                    }
                }
            }); 
        }else{
            $('#author').html('<option value="">Select author first</option>'); 
        }
    });

});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var student = <?php echo json_encode($result4); ?>;
          var arr = [];
          var name = [];
            for(var i=0; i < student.length; i++) {
              arr.push(student[i].library);
              name.push(student[i].name);
          } 

          $("#student").select2({
                data:arr
           });
          $("#studentname").select2({
                data:name
           });

      var book = <?php echo json_encode($result5); ?>;
          var arry = [];
            for(var i=0; i < book.length; i++) {
              arry.push(book[i].book);
          } 
           $("#bookname").select2({
               data:arry
           });
        });
     
</script>

<?php include 'footer.php';?>
<link href="<?php echo base_url('');?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url('');?>assets/vendors/select2/dist/js/select2.min.js"></script>