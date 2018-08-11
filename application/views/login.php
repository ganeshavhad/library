<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q-LMS</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('');?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('');?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('');?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('');?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('');?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
       
       <?php if($this->session->flashdata('login')=="unsuccessfull"){?>
            <div class="x_content bs-example-popovers">
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                    </button>
                    <strong>Unsuccessfull !</strong> Please check username or Password.
                  </div>
                
                  <?php } if($this->session->flashdata('logout')=="successfull"){?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                      <strong>Logout Successfull !</strong> 
              </div> 
              </div>  
    <?php } ?>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="<?php echo base_url('');?>assets/uploads/quicklibrary.jpg" alt="..."   style="width:120px;height:150px;  "  > 
         
           <?php echo form_open_multipart('Login/index', array(
                  'class' => 'form-horizontal form-label-left', 
                  ));?>
              <h1> Q-LMS  Login</h1>
              <div>
                <input type="text" name="username" onkeypress="return RestrictSpace()"  class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" onkeypress="return RestrictSpace()"  class="form-control" placeholder="Password" required="" />
              </div>
             <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                
                  <button id="send" type="submit" value="login" name="login" class="btn btn-success">Submit</button>
                </div>
              </div>
          <?php echo form_close();?>
               <div class="separator">
              
                <div class="clearfix"></div>
      

                <div>
                  
                  <p> Developed And Designed By <a href="http://quick4it.com/" style="color: blue">Quick4IT Solutions.</a></p>
                </div>
              </div>
           
          </section>
        </div>

      </div>
    </div>
    <script type="text/javascript">
function RestrictSpace() {
  if (event.keyCode == 32) {
  return false;
      }
    }
</script>
  </body>
</html>
