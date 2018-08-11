<?php include 'header.php';
    include 'sidebar.php'; 
    include 'navigation.php';?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
             <a href="<?php echo base_url('Book/category');?>">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?php print_r(count($result));?></div>
                  <h3>Book Category</h3>
                 
                </div>
              </div></a><a href="<?php echo base_url('Book/view');?>">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?php print_r(count($result3));?></div>
                  <h3>Books</h3>
                
                </div>
              </div></a><a href="<?php echo base_url('IssueBook/index');?>">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?php print_r(count($result2));?></div>
                  <h3>Issued Books</h3>
                  
                </div>
              </div></a><a href="<?php echo base_url('Student/view');?>">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count"><?php print_r(count($result1));?></div>
                  <h3> Members</h3>
                
                </div>
              </div></a>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 5 Books <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><?php foreach($book as $value){ ?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">Image</p>
                       <!--  <p class="day">23</p> -->
                      </a>
                      <div class="media-body">
                        <a class="title" href="<?php echo base_url('/Book/profile/?id=');echo $value->bookID;?>"><?php foreach($result3 as $key){ if($key->bookID==$value->bookID){ print_r($key->book); } } ?></a>
                       <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                      </div>
                    </article>
                        <?php }?>         
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 5 Authors <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><?php foreach($author as $value){ ?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">Image</p>
                        <!-- <p class="day">23</p> -->
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?php print_r($value->author);?></a>
                       <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                      </div>
                    </article>  <?php } ?>              
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 5 Readers <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="x_content"><?php foreach($student as $value){ ?>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">Image</p>
                        <!-- <p class="day">23</p> -->
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?php foreach ($result1 as $key) { if($key->library==$value->lID){print_r($key->name);
                           }    }?></a>
                       <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                      </div>
                    </article>  <?php } ?>              
                  </div>
                   
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php';?>