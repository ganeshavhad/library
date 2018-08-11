<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>assets/uploads/quicklibrary.jpg" alt=""><?php echo $this->session->userdata('user');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right"><?php $id=$this->session->userdata('roleid');?>
                    <li><a href="<?php echo base_url('User/profile/?id=');echo $id;?>"> Profile</a></li>
                    <li><a href="<?php echo base_url('Login/change/?id=');echo $id;?>"> Change Password</a></li>
                  
                    <li><a href="<?php echo base_url('Login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
<?php $query = $this->db->query("select * from `mst_book` order by `bookID` desc limit 5");
    $latest=$query->result();
?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                   
                    <span class="badge bg-green">New 5 Book &nbsp <i class="fa fa-book"></i> </span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php foreach($latest as $value){ ?>
                    <li><a>
                        <span>
                          <span>Name : <?php print_r($value->book);?></span>
                        </span>
                        <span class="message">
                         Author : <?php print_r($value->author);?>
                        </span>
               </a>
                    </li><?php } ?>
                   </ul>
                     <!--  <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div> -->
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation