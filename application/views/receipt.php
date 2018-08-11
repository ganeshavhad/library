<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?><!-- Begin: Content -->
 <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      
<section id="content" class="table-layout animated fadeIn">
    <div class="row">
        <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
            <!-- <div class="panel-title hidden-xs">
                <Span>Payment Receipt</span>
            </div> -->
        </div>
        <?php $count = 1;  $count1 = $count ++; ?>
            <div class="panel-body pn">
                    <!-- begin: .tray-center -->
                <div id="printarea<?php echo $count1; ?>">

                    <div class="row"><div class="col-md-2"></div>
                        <div class="col-md-12">
                            <!--FIRST VIEW START-->
                            <div style=" border: 2px solid #a1a1a1; padding: 10px 40px; width:100%; border-radius: 0px;">
                            <style>
                                table, td, th {    
                                    border: 1px solid #ddd;
                                    text-align: left;
                                }

                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                th, td {
                                    padding: 5px;
                                }
                                td.amt {
                                    text-align: center;
                                }
                            </style>
                                            
                            <table cellpadding="5" style="width:100%;">
                                <tr>
                                    <td width="10%"><img src="<?php echo base_url();?>assets/uploads/quicklibrary.jpg ?>" width="150px" style="padding-left:10px" alt="Logo"></td>
                                    <td style="width:80%;">
                                    <center>
                                    <h4 style="margin:5px 0px;font-size: 15px;"><u>RECEIPT</u><br></h4>
                                    <h3 style="margin:5px 0px;font-size: 20px;"><?php print_r($result2[0]->school_name);?></h3>
                                    <h5 style="margin:5px 0px;"><u>Address : <?php print_r($result2[0]->address);?></u></h5>
                                    <h5 style="margin:5px 0px;">Contact : <?php print_r($result2[0]->contact);?> </h5>
                                    <h5>Web URl : <?php print_r($result2[0]->web_url);?></h5> 
                                    </center>   
                                    </td>
                                    <td width="10%"><img src="<?php echo base_url();?>assets/uploads/quicklibrary.jpg" width="130px" alt="Logo"></td>
                                    </tr>
                                </table>
 
                                    <hr>
                                    <table cellpadding="5" style="width:100%;">
                                        <tr>
                                            <td width="60%">Receipt No.<?php print_r($result[0]->paymentID);?></td>
                                            <td width="40%">Receipt Date.<?php print_r($result[0]->paymentdate);?></td>
                                        </tr>
                                        <tr>
                                            <td width="60%">Received with Thanks from &nbsp; <b><?php 
                                            foreach($result1 as $value){
                                            if($result[0]->studentID==$value->library)
                                            { print_r($value->name);
                                            } } ?></b></td>
                                            <td width="40%">Payment Date :&nbsp; <?php print_r($result[0]->paymentdate); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="60%">For : <?php $number = $result[0]->paymentamount ; print_r($result[0]->bookID);?></td>
                                            <td width="60%">the sum of Rupees &nbsp; <b><i class="fa fa-inr"></i> <?php print_r($number);echo " .00 ONLY "; $no = round($number);
                            $point = round($number - $no, 2) * 100;
                            $hundred = null;
                            $digits_1 = strlen($no);
                            $i = 0;
                            $str = array();
                            $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                '13' => 'Thirteen', '14' => 'Fourteen',
                                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
                                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                '60' => 'Sixty', '70' => 'Seventy',
                                '80' => 'Eighty', '90' => 'Ninety');
                            $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                            while ($i < $digits_1) {
                                $divider = ($i == 2) ? 10 : 100;
                                $number = floor($no % $divider);
                                $no = floor($no / $divider);
                                $i += ($divider == 10) ? 1 : 2;
                                if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                            " " . $digits[$counter] . $plural . " " . $hundred :
                                            $words[floor($number / 10) * 10]
                                            . " " . $words[$number % 10] . " "
                                            . $digits[$counter] . $plural . " " . $hundred;
                                } else
                                    $str[] = null;
                            }
                            $str = array_reverse($str);
                            $Rsresult = implode('', $str);
                            $points = ($point) ?
                                    "" . $words[$point / 10] . " " .
                                    $words[$point = $point % 10] : '';
                           /* if($point == ''){
                                echo $Rsresult . "Rupees  " . $points . "Only";
                            }else{
                               echo $Rsresult . "Rupees  " . $points . " Paise Only"; 
                            }*/

                           ?></b></td>

                                    </tr>
                              
                                    <tr>
                                        <td width="60%" colspan="2">By Cash/Cheque/Draft/Online Payment : &nbsp;<?php print_r($result[0]->paymenttype); ?></td>
                                     
                                    </tr>
                                    <tr>
                                       <?php if($result[0]->paymenttype == 'Cheque') 
                                        {  ?>
                                        <td width="60%">
                                             Cheque No : &nbsp;<?php print_r($result[0]->cheque_no);?>
                                        </td>
                                            <?php } 
                                             else if($result[0]->paymenttype == 'card') { ?>
                                        <td width="60%">
                                            Transaction Reference No :&nbsp;<?php print_r($result[0]->reference_no); ?>   
                                        </td>
                                            <?php } ?>
                                  
                                    </tr>
                                    <tr>
                                        
                                        <td width="20%">
                                        Cheque Date :&nbsp;<?php  print_r($result[0]->paymentdate); ?>
                                        </td>
                                     
                                    </tr>
                                    <tr>
                                        <?php if($result[0]->paymenttype == 'cash') { }else { ?>
                                        <td width="20%">
                                            Bank Name :&nbsp;<?php echo $result[0]->bank_name; ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </table>
                                <br>
                                <table width="100%">
                                    <tr>
                                        <td width="20%">
                                            <div style="border:2px solid #000; width:230px; height:40px; text-align: center;font-size: 25px;"> &nbsp;<i class="fa fa-inr"></i> <?php print_r($number);  ?>.00/-</div>
                                        </td>
                                        <td style="text-align: right; width: 80%;">
                                            </br></br><strong>For <i class="fa fa-inr"></i>  <?php   echo $Rsresult . "Rupees  " . $points . "  Only";?></strong> 
                                        </td>   
                                    </tr>
                                </table>
                            </div>
                            <!---FIRST VIEW END-->
                        </div>

                    </div>
                </div>
                <!-- end: .tray-center -->
                <div class="panel-footer text-center">
                    <a class="btn btn-primary" name="btn_submit" value="Print" href="javascript:printDiv('printarea<?php echo $count1; ?>')" >PRINT</a>
                  <!--   <a class="btn btn-primary" href="<?php echo base_url(); ?>transaction/payment/<?php echo $receipt_details->purchase_id;?>">Back to Payment Details</a> -->
                </div>
            </div>
        <?php ?>
        </div>
    </div>			
</section>
</Span>
</div>
</div>
</div>
</div>
</section>
</div>

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