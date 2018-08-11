<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

<?php if($this->session->flashdata('login')=="unsuccessfull"){?>
<div class="x_content bs-example-popovers" id="topScroll" >
  <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Unsuccessful , Book Return Unsuccessfully !</strong> .
  </div>
    <?php } if($this->session->flashdata('login')=="successfull"){?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Successful , Book Return Successfully !</strong> .
  </div>
    <?php } if($this->session->flashdata('Issue')=="unsuccessfull"){?>
    
  <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Unsuccessful , Book issued Unsuccessfully !</strong> .
  </div>
    <?php } if($this->session->flashdata('Issue')=="successfull"){?>  
  <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Successful , Book issueed Successfully !</strong> 
  </div> 
</div> 
<?php } ?>

               <h3>Book Issue Details <?php if($pri[0]->pri_add=="1"){?> <a href="<?php echo base_url('IssueBook/IssueBook');?>"><button type="button" class="btn btn-default btn-sm"> + Issue Book </button></a> <?php }?>
                    <!-- <a href="<?php //echo base_url('IssueBook/settings');?>"><button type="button" class="btn btn-default btn-sm"> Set Fine And Due date </button></a> --></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                 <tr>
                    <th>Sr No</th>
                    <th>Student Name</th>
                    <th width="20%">Book Name </th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Fine <i class="fa fa-rupee"></i></th>
                    <th width="8%">Edit Issue</th>
                    <th width="8%">Issue Again</th>
                    <th width="8%">Return Book</th>
                    <th width="8%">Pay Fine</th>
                     
                  </tr>
                </thead>

               <tbody><?php $i=0;  foreach($result3 as $value){  if(empty($value->return_date)){ $i++; ?>
                  <tr>
                    <td scope="row"><?php echo $i;?></td>

                    <?php foreach($result1 as $value1){ if($value->lID==$value1->library) { ?>
                    <td><?php echo $value1->name;?></td>
<?php } }
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
if(strtotime($date) > strtotime($value->due_date)){
$diff = abs(strtotime($date) - strtotime($value->due_date));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$day = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$days=($years*365)+($months*30)+$day;
}else{$days=0;}

?>
                   <?php foreach($result2 as $value1){ if($value->bookID==$value1->bookID) { ?>
                   <td><?php echo $value1->book; ?></td>   
                         <?php } }?>            
                    <td><?php $date =explode("-", $value->issue_date); echo $date[2]."-".$date[1]."-".$date[0];?></td>
                    <td><?php $date1 =explode("-", $value->due_date);echo $date1[2]."-".$date1[1]."-".$date1[0];?></td>
                    <td><?php  echo $value->fine*($days).".00";?></td>
                      <td><?php if($pri[0]->pri_edit=="1"){ ?><a href="<?php echo base_url('IssueBook/edit/?id=');echo $value->issueID;?>"> <button type="button" class="btn btn-default"> <i class="fa fa-edit"></i></button></a><?php } ?>
                    </td>
                    <td> <a href="<?php echo base_url('IssueBook/again/?id=');echo $value->issueID;?>"> <button type="button" class="btn btn-success"> <i class="fa fa-reply"></i></button></a>
                    </td>
                    <td> <a href="<?php echo base_url('IssueBook/return/?id=');echo $value->issueID."&&fine=".$value->fine*$days;?>"><?php if($days <= 0){ ?> <button class="btn btn-info" type="button" >  <i class="fa fa-refresh"></i><?php } ?> </button> </a>                            
                    </td>
                    <td> <a href="<?php echo base_url('IssueBook/fine/?id=');echo $value->issueID."&&fine=".$value->fine*$days;?>"><?php if($days >= 1){ ?> <button class="btn btn-danger" type="button" >  <i class="fa fa-rupee"></i> </button><?php } ?> </a>                         
                </td>
              </tr>
            <?php }  } ?>
        </tbody>
        </table>
      </div> 
    </div>
  </div>

             
        <!-- /page content -->

       <?php include 'footer.php';?>