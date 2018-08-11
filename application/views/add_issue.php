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

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Library ID<span id="span" class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="student" name="libraryid" class="form-control col-md-6 " >
                    <option>Select Library ID</option>
                    </select>
                  </div>  
              </div>

            <!--   <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Search with name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="text" name="item_name" id="item_name" class="form-control col-md-7 col-xs-12"  placeholder="Item Name" autocomplete="off">
                    <div id="item_name_list"></div>
                  </div>  
              </div> -->

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Student Name<span id="span" class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <select id="studentname" name="libraryname" class="form-control col-md-6 " >
                    <option>Select Student Name</option>
                    </select>
                  
                    </div>  
                  </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Category <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      
                         <select id="category" class="form-control col-md-6 " name="bookcategory" required="required">
                          <option value="">Select Category</option>
                          <?php
                          if(!empty($countries)){
                              foreach($countries as $row){ 
                                  echo '<option value="'.$row['bookcatID'].'">'.$row['bookcat'].'</option>';
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
                          <select id="bookname" name="bookname" class="form-control col-md-6 " >
                            <option>Select book name</option>
                          </select>                    
                        </div> 
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <input readonly="" type="text" class="form-control col-md-6" name="authorname" id="author" >
                        </div>  
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession No <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="" type="text" class="form-control col-md-6" name="accesseion_no" id="accesseion" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Serial No <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="serial_no" required="required" type="number">
                        </div>
                      </div>
<?php date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d'); 
$default=$result3[0]->due_date;// add 3 days to date
$NewDate=Date('Y-m-d', strtotime("+".$default." days")); ?>
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

   $('#student').on('change',function(){
        var studentID = $(this).val(); 
        if(studentID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getstudent'); ?>',
                data:'studentID='+studentID,
                success:function(data){
                  
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){ 
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
        if(studentname){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/studentbyname'); ?>',
                data:'studentname='+studentname,
                success:function(data){
                  
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){ 
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
   
    /* Populate data to state dropdown */
    $('#category').on('change',function(){
        var bookcatID = $(this).val();
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

    /* Populate data to city dropdown */
    $('#bookname').on('change',function(){
        var bookID = $('#bookname').val(); 
        var myarr = bookID.split("-");
     console.log(myarr[1]);
        if(bookID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getBookID'); ?>',
                data:'bookID='+myarr[1],
                success:function(data){
                   
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){     
                            $('#author').val(this.author);
                            $('#accesseion').val(this.accesseion_no);
                            $('#category').val(this.bookcatID);
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

    $(document).ready(function() {
        var student = <?php echo json_encode($result1); ?>;
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

      var book = <?php echo json_encode($result2); ?>;
      var bookname = [];
           for(var i=0; i < book.length; i++) {
            var name= "id-";
            name += book[i].bookID+" -" ;
            name += book[i].book ;
              bookname.push(name);
          } 

          $("#bookname").select2({
                data:bookname
           });
             /*for(var i=0; i < book.length; i++) {
               var newListItem = "<option value='"+book[i].bookID+"'>"+book[i].book+"</option>";
              $("#bookname").select().append(newListItem);
         }*/
    });

</script>


<!-- <script>
      $('#item_name').keyup(function(){
    var item_name = $(this).val();
     //alert(item_name);
    $.ajax({  
          url:'<?php echo base_url('IssueBook/get_item_name'); ?>',  
          method:"POST",  
          data:{query:item_name},
          cache : false,
           success:function(html)  
           {  
            // $("#show").after(html);
            if (item_name != '')
            {
              $('#item_name_list').slideDown();  
              $('#item_name_list').html(html);
            }
            else
            {
              $('#item_name_list').empty();
              $('#item_name_list').slideUp();  
            }
           }  
      });
  });
 </script> -->
<?php include 'footer.php';?>
<link href="<?php echo base_url('');?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url('');?>assets/vendors/select2/dist/js/select2.min.js"></script>