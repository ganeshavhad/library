<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

<!--   <style>
    body   { font-family: serif }
    h1     { font-size: 25pt; }
    h2, h3 { font-size: 17pt; line-height: 5mm }
    h4     { font-size: 20pt; line-height: 7mm }
    h2 + p { font-size: 14pt; line-height: 7mm }
    h3 + p { font-size: 14pt; line-height: 7mm }
  
    h1      { margin: 0 }
   
    h2, h3  { margin: 0 3mm 3mm 0; float: left }
    h2 + p,
    h3 + p  { margin: 0 0 3mm 20mm }
    h4      { margin: 2mm 0 0 20mm; border-bottom: 1px solid black }
  
    article { border: 4px double black; padding: 5mm 10mm; border-radius: 3mm }
  
  </style> -->

 <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="page-title">
        <div class="title_left">
          <h3> Payment Receipt </h3>
        </div><button class="btn btn-info" onclick="myFunction()">Print this page</button> 
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

 
<article>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4"> 
          <img src="<?php echo base_url();?>assets/uploads/quicklibrary.jpg" alt="School logo" style="width:120px;height:120px; ">
        </div>
    <div class="col-md-6 col-sm-6 col-xs-6">  
    <h1><?php print_r($result2[0]->school_name);?></h1>
   
      <lable>Address : <?php print_r($result2[0]->address);?></lable><br>
      <lable>Contact : <?php print_r($result2[0]->contact);?></lable><br>
      <lable>Web URl : <?php print_r($result2[0]->web_url);?></lable>
      </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <p><b> Receipt No.<?php print_r($result[0]->paymentID);?></b></p>
      <p> <b>Receipt Date.<?php print_r($result[0]->paymentdate);?></b></p>
    </div>
   </div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 
  <hr>
      <h2>Name : <?php 
          foreach($result1 as $value){
          if($result[0]->studentID==$value->library)
          { print_r($value->name);
          } } ?></h2>
     
      <h2>For : <?php $number = $result[0]->paymentamount ; print_r($result[0]->bookID);?></h2>
  
      <h4>Amount In Number : <i class="fa fa-inr"></i> <?php print_r($number);echo " .00 ONLY ";

        $no = round($number);
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

       ?>
     </h4>
       <h4>Amount In Words : <i class="fa fa-inr"></i> <?php  echo $Rsresult . "Rupees  " . $points . "  Only";?></h4>
   
        <p>Paid by : <?php print_r($result[0]->paymenttype);?></p>
      <p style="float:right";><b>-- SIGNATORY --</b></p>
    </div>
  </div>
  </article>

</div>
</div>
</div>
</div>
</div>
</div>
 
<script>
  function myFunction() {
  window.print();
  }
</script> 
       <?php include 'footer.php';?>