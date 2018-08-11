<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Book </h3>
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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <?php echo form_open('Book/update', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Category 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select  class="form-control col-md-6 " name="bookcategory" readonly>
                          <option value="<?php echo $result['0']->bookcatID;?>"><?php  foreach($result1 as $value){ if($result['0']->bookcatID==$value->bookcatID){ echo $value->bookcat; } }?></option>
                           <!-- <option value=""> Select Category </option>
                           <?php foreach($result1 as $value){  ?>
                           <option value="<?php echo $value->bookcatID?>"><?php echo $value->bookcat?></option>
                         <?php }?> -->
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Book Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="bookname"  value="<?php echo $result['0']->book;?>"  required="required" type="text" readonly>
                          <input type="hidden" name="id" value="<?php echo $result['0']->bookID;?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Author Name 
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="authorname"  value="<?php echo $result['0']->author;?>" required="required" type="text" readonly>
                        </div>  
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession No 
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="accesseion_no"  value="<?php echo $result['0']->accesseion_no;?>" required="required" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Accession Date 
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="accesseion_date"  value="<?php echo $result['0']->accesseion_date;?>" required="required" type="date" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Quantity 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="quantity" placeholder="" value="<?php echo $result['0']->quantity;?>" required="required" type="number" readonly>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Rack No 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $result['0']->rack;?>" name="rack_no"  required="required" type="text" readonly>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> ISBN 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="isbn" value="<?php echo $result['0']->ISBN_NO;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Price 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="price" value="<?php echo $result['0']->price;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Classification/Section No
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="classification"  value="<?php echo $result['0']->classification;?>"required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Publisher 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="publisher" value="<?php echo $result['0']->publisher;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Publisher Address 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="pubilcation_address" value="<?php echo $result['0']->pubilcation_address;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Edition 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="edition" value="<?php echo $result['0']->edition;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Pages 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="page" value="<?php echo $result['0']->page;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Place of Availability 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="availbility" value="<?php echo $result['0']->availbility;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Receipt No. 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="receipt" value="<?php echo $result['0']->receipt;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
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