<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
             <?php $count = 1;  $count1 = $count ++; ?>
                <div id="printarea<?php echo $count1; ?>">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
              <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
                  <div class="x_content bs-example-popovers" id="topScroll" >
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                          <strong>Book Not Added  ! </strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Book Added Successfully ! </strong> 
                    </div> 
                 </div> 
              <?php }  ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <table cellpadding="5" style="width:100%;"><tr>
                <td style="width:10%;"><img src="<?php echo base_url($result5[0]->logo);?>" width="120px" style="padding-left:10px" alt="Logo"></td>
                  
              <td style="width:80%; text-align: center;"> 
                <h3><?php print_r($result5[0]->school_name);?></h3>
                <h4>Lost Book Report of last week </h4>
                 <form role="form" method="post" action="<?php echo base_url('Report/issue');?>">
                  <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                    <input type="date" required="" value="<?php if(isset($_POST['from'])){ echo $_POST['from']; }else{print_r($to);} ?>" name="from" class="form-control has-feedback-left" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                    <input type="date" required="" value="<?php if(isset($_POST['to'])){ echo $_POST['to']; }else{print_r($from);} ?>" name="to" class="form-control">
                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                  </div>          
                  <div class="col-md-2 col-sm-3 col-xs-12 form-group has-feedback">
                    <button type="submit" value="submit"  class="btn btn-success">Submit</button>
                  </div>
                </form>
              </td>
              <td style="width:10%;"><img src="<?php echo base_url($result5[0]->logo);?>" width="120px" style="padding-right:10px" alt="Logo"></td></tr>
              </table>
            </div>
          </div>          
            <div class="clearfix"></div>
              </div>
                  <div class="x_content">
                 
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                       <tr>
                          <th>Sr No</th>
                          <th width="15%">Book Name</th>
                          <th width="10%">Author Name</th>
                          <th>Serial No</th>
                          <th>Lost By</th>
                          <th>Lost on Date</th>
                          <th>Fine Type</th>
                          <th>Fine</th>
                          <th>note</th>
                          <th>status</th>
                        </tr>
                      </thead>
                     <tbody><?php $i=0; foreach($result as $value){   $i++; ?>
                        <tr>
                          <th ><?php echo $i;?></th>
                          <td><?php echo $value->bookname; ?></td>                         
                          <td><?php echo $value->author;  ?></td>
                           <td><?php echo $value->serialno;  ?></td>
                           <?php foreach($result2 as $value2){ if($value->lID==$value2->library) { ?>
                          <td><?php echo "name : ".$value2->name;  foreach($result3 as $value3){if($value3->id==$value2->classesID) echo " , std : ".$value3->name." ";}
                          foreach($result4 as $value4){if($value4->id==$value2->sectionID) echo " , div : ".$value4->name;} ?></td>
                          <?php } } ?>
                          <td><?php $date =explode("-", $value->lost_date); echo $date[2]."-".$date[1]."-".$date[0];?></td>
                          <td><?php echo $value->finetype;  ?></td>
                          <td><?php echo $value->fine;  ?></td>
                          <td><?php echo $value->note; ?></td>
                          <td><?php echo "Complete";//echo $value->fine_conc; ?></td>
                        </tr>
                        <?php }  ?>
                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="panel-footer text-center">
            <a class="btn btn-primary" name="btn_submit" value="Print" href="javascript:printDiv('printarea<?php echo $count1; ?>')" >PRINT</a>
          </div>
        </div>
             
        <!-- /page content -->
       <!-- /page content -->
 <script type="text/javascript">

    /*--This JavaScript method for Print command--*/

    function printDiv(divID) {
//Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
//Get the HTML of whole page
        var oldPage = document.body.innerHTML;

//Reset the page's HTML with div's HTML only
        document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body></html>";

//Print Page
        window.print();

//Restore orignal HTML
        document.body.innerHTML = oldPage;

        location.reload();
    }

    /*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=800 ,height=842');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script> 
 <?php include 'footer.php';?>