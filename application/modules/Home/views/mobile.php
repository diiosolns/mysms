<!DOCTYPE html>
<!-- <html class="bg-black"> -->
<html class="bg-aqua">
    <head>
        <meta charset="UTF-8">
        <title>diioLab | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
       <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
         <style type="text/css">
          .diiobg {
            background: linear-gradient(to bottom, #336699 15%, #00ccff 100%);
          }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <!-- <body class="bg-blue"> -->
   <body class="diiobg">
   <div style="padding-left: 40px; padding-top: 20px; padding-bottom: 0px; font-family: OCR A Extended; font-size: 58px; color: #fff;">
       <font size="28" ><b>MySMS</b></font>
   </div>
   <div style="text-align: center; font-size: 24px;">
       <b> </b>
   </div>

        <div style="margin-top: 0px;" class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form action="<?php echo base_url('Home/loginMobile')?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="email" name="username" class="form-control" placeholder="Username E-mail)" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div> 
                   <!--  <div class="form-group">
                        <input type="number" name="onetimepwrd" class="form-control" placeholder="One Time Password :
"/>
                    </div>    -->      
                    <!-- <div class="form-group">
                        <input type="checkbox" name="rmb_me"/> Remember me for 2  Weeks
                    </div> -->
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-info btn-block" name="loginBtn" value="ok" style="border-radius: 20px;"><b>Login</b></button>  

                   <!--  <p><a href="#">I forgot my password</a></p> -->
                   <p style="text-align: center;"><b style="color: red;"><?php echo $loginErr; ?></b></p>
                    
                    <!-- <a href="<?php echo base_url('Users/login')?>" class="text-center">Register a New Membership</a> -->
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>       

    </body>
</html>