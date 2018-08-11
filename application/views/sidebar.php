
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div style="position: fixed;" class="col-md-3 left_col">
          <div  class="left_col scroll-view">
            <div  class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('Book/index');?>" class="site_title"><i class="fa fa-book"></i>  <span> Q-LMS</span></a>
            </div>

            <div class="clearfix"></div>
 <?php
$role=$this->session->userdata("roleid");
$query = $this->db->get_where('trans_privilege', array('role_id' => $role));
  if($query->num_rows() == 0){
    $this->Insert_M->newpri($role);
  }
$sidebar = $query->result();
$sidebar[0]->pri_view;

 ?> 
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/uploads/quicklibrary.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php print_r($this->session->userdata('user'));?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu"  class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              
                <ul class="nav side-menu">
                   <li><a href="<?php echo base_url('Book/index');?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a ><i class="fa fa-home"></i>School Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!-- <li><a href="<?php //echo base_url('School/index');?>">Add School</a></li>-->
                        <?php if($sidebar[3]->pri_view=="1"){ ?>
                       <li><a href="<?php echo base_url('School/view');?>"><i class="fa fa-institution"></i>School Info </a></li><?php } if($sidebar[2]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('Standard/view');?>"><i class="fa fa-book"></i>Standard </a></li><?php } if($sidebar[1]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('Division/view');?>" ><i class="fa fa-home"></i>Division</a></li><?php } if($sidebar[4]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('Standard/stddivview');?>"><i class="fa fa-home"></i>Standard Wise Division </a></li><?php } if($sidebar[8]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('CreateDb/backup');?>"><i class="fa fa-archive"></i>Backup </a></li><?php } ?>

                    </ul>
                  </li>
                
                 <?php if($sidebar[0]->pri_view=="1"){ ?> <li><a href="<?php echo base_url('Student/view');?>"><i class="fa fa-graduation-cap"></i>Student </a> </li><?php } ?>
             
                  <li><a ><i class="fa fa-book"></i>Library Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if($sidebar[10]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('Book/category');?>"><i class="fa fa-bookmark-o"></i>Add Book Category </a></li>
                    <?php } if($sidebar[5]->pri_view=="1"){ ?>
                      <li><a href="<?php echo base_url('Book/view');?>"><i class="fa fa-file-text-o"></i>View Books </a></li>
                    <?php } if($sidebar[11]->pri_view=="1"){ ?> 
                      <li><a href="<?php echo base_url('IssueBook/index');?>" ><i class="fa fa-check-square"></i>Issue Books</a></li>
                    <?php } if($sidebar[12]->pri_view=="1"){ ?> 
                      <li><a href="<?php echo base_url('IssueBook/bookfine');?>"><i class="fa fa-inr"></i>Fine</a></li>
                     <li><a href="<?php echo base_url('IssueBook/settings');?>"><i class="fa fa-wrench"></i>Fine & Due Date Settings </a></li> 
                      <?php } if($sidebar[5]->pri_view=="1"){ ?> 
                     <li><a href="<?php echo base_url('Book/lost');?>"><i class="fa fa-tags"></i>Lost Book </a></li> <?php } ?>
                  </ul>
                  </li><?php if($sidebar[6]->pri_view=="1"){ ?>
                  <li><a ><i class="fa fa-user"></i>User Privileges <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('User/index');?>"><i class="fa fa-plus"></i>Create User </a></li>
                      <li><a href="<?php echo base_url('User/role');?>"><i class="fa fa-user "></i>Add Role </a></li>
                      <li><a href="<?php echo base_url('User/view');?>"><i class="fa fa-wrench"></i>Assign Privileges </a></li>
                    </ul>
                   </li><?php  } if($sidebar[6]->pri_view=="1"){ ?>
                   <li><a ><i class="fa fa-newspaper-o"></i>Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Report/issue');?>"><i class="fa fa-check"></i> Book Issue Report </a></li>
                      <li><a href="<?php echo base_url('Report/duedate');?>"><i class="fa fa-calendar "></i>Due Date Report</a></li>
                      <li><a href="<?php echo base_url('Report/late');?>"><i class="fa fa-clock-o"></i>Late Submission Report </a></li>
                      <li><a href="<?php echo base_url('Report/fine');?>"><i class="fa fa-inr"></i>Fine Report </a></li>
                      <li><a href="<?php echo base_url('Report/lost');?>"><i class="fa fa-tags"></i>Lost Book Report</a></li>
                    </ul>
                   </li><?php } ?>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
        <!--     <div class="sidebar-footer hidden-small"> -->
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
            <!--   <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php// echo base_url('Login/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>