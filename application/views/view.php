<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

    <!-- Country dropdown -->

    <!-- this is back view for add_issue page -->


<script src="<?php echo base_url('/assets/build/js/jquery.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    /* Populate data to state dropdown */
    $('#category').on('change',function(){
        var bookcatID = $(this).val();
        if(bookcatID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getbook'); ?>',
                data:'bookcatID='+bookcatID,
                success:function(data){
                  
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
        console.log(bookID);
        if(bookID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('IssueBook/getCities'); ?>',
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
        var country = <?php echo json_encode($result1); ?>;
          var arr = [];
            for(var i=0; i < country.length; i++) {
              arr.push(country[i].studentID);
          } 

          $("#student").select2({
                data:arr
           });
          var data1 = 'select book name';
           $("#bookname").select2({
               
           });
                  });
</script>

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
                     <h2> Issue Book </h2>
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

                        <!--  <select  class="form-control col-md-6 " name="libraryid" required="required">
                           <option value=""> Student Library ID </option>
                           <?php foreach($result1 as $value){  ?>
                           <option value="<?php echo $value->library?>"><?php echo $value->library?></option>
                         <?php }?>
                         </select> -->
                        <select id="student" name="lID" class="form-control col-md-6 " >
                         <option>Select Library ID</option>
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

                          <select id="bookname" class="form-control col-md-6 " >
                            <option>Select book name</option>
            <!-- Dropdown List Option -->
                          </select>
                           <!-- <input type="text" name="item_name" id="item_name" class="form-control col-md-6 " placeholder="Item Name" autocomplete="off"> -->
                     <div id="item_name_list"></div>
                         <!-- <select id="book" class="form-control col-md-6 " name="bookID" required="required">
                          <option value="">Select Book </option>
                          </select> -->
 
                        </div> 
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name <span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="author" class="form-control col-md-6 " name="authorname" required="required">
                          </select>
                        </div>  
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession No <span id="span" class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <select id="accesseion" class="form-control col-md-6 " name="accesseion_no" >
                          </select>
                        </div>
                      </div>
<?php date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d h-i-s'); // add 3 days to date
$NewDate=Date('Y-m-d', strtotime("+7 days")); ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Due Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="duedate" value="<?php echo $NewDate;?>" required="required" type="text">
                        
                        </div>
                      </div>
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fine <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="fine" value="10" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Note <span id="span" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="note" required="required" class="form-control col-md-7 col-xs-12">
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
           <link href="<?php echo base_url('');?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
        <script src="<?php echo base_url('');?>assets/vendors/select2/dist/js/select2.min.js"></script>