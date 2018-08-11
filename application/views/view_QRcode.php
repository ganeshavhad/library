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
                          <strong>Alert , Qr Code Added/Updated Unsuccessfull !</strong> .
                        </div>
                        <?php } if($this->session->flashdata('login')=="successfull"){?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="span" aria-hidden="true">×</span>
                          </button>
                            <strong>Alert , Qr Code Added/Updated Successfull !</strong> 
                    </div> 
                 </div> 
              <?php } ?>

                   <h3>Book QR Code Details  </h3>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
               
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
<?php 
  $k=$book[0]->quantity; for($x = 1; $x <= $k; $x++) { 
                       
    $result['qrcodedata']=$book[0]->bookID."_".$x;
    $result['quality']="60";
    $result['width']="146";
    $result['height']="146";
    if(isset($result['qrcodedata']) && strlen($result['qrcodedata']))
      {
      $q = 50;
      $w = 126;
      $h = 126;
        if(isset($result['quality'])) $q = intval($result['quality']);
        if(isset($result['width'])) $w = intval($result['width']);
        if(isset($result['height'])) $h = intval($result['height']);

 ?>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <table class="table table-striped table-bordered" >
              <tr>
                  <td><?php $url=base_url('/QRcodeC/display?data=%s&w=%d&h=%d&q=%d');
                         $img="<img src=".$url."/>";
                         printf($img, urlencode($result['qrcodedata']), $w, $h, $q); ?>
                  </td>
              </tr>
              <tr>
                  <td><?php echo "Name : ".$book[0]->book;?></td>
              </tr>
              <tr>
                  <td><?php echo "Rack : ".$book[0]->rack;?></td>
              </tr>
              <tr>
                  <td><?php echo "Serial No : ".$x;?></td>
              </tr>
            </table>
        </div>

   <?php
      }  }
   ?>
 
                </div>
              </div>
              </div>
              </div> <div class="panel-footer text-center">
            <a class="btn btn-primary" name="btn_submit" value="Print" href="javascript:printDiv('printarea<?php echo $count1; ?>')" >PRINT</a>
          </div>
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