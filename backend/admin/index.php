<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
        $ad_email=$_POST['ad_email'];
        $ad_pwd=sha1(md5($_POST['ad_pwd']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? ");//sql to log in user
        $stmt->bind_param('ss',$ad_email,$ad_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;//Assign session to admin id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
        {//if its sucessfull
            header("location:his_admin_dashboard.php");
        }
        else
        {
            $err = "Please check your credentials.";
        }
    }
?>
<!--End Login-->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>MMC - Administrator Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/images/mmc_icon.png">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"/>

        <!--Load Sweet Alert Javascript-->
        <script src="assets/js/swal.js"></script>
        
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                200);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function () 
                    { 
                        swal ("Access Denied", "<?php echo $err;?>",  "error" )
                    },
                    200);
            </script>
        <?php } ?>
    </head>

    <body>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <a href="index.php">
                                        <span><img class="mb-3" src="assets/images/logo-header.png" alt="" height="70"></span>
                                    </a>
                                </div>

                                <form method='post'>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email Address</label>
                                        <input class="form-control" name="ad_email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="ad_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-dark btn-block" name="admin_login" type="submit">Login</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <?php include ("assets/inc/footer1.php");?>

        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>