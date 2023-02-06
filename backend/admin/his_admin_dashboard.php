<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <!--Head Code-->
    <?php include("assets/inc/head.php");?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('assets/inc/sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <!--Start InPatients-->
                            <div class="mt-3 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/in-patient.png" height="80"></span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-right font-22">
                                                <?php
                                                    //code for summing up number of in / admitted  patients 
                                                    $result ="SELECT count(*) FROM his_patients WHERE pat_type = 'InPatient' ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($inpatient);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $inpatient;?></span></h3>
                                                <p class="text-success mb-1">InPatients</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <!--End InPatients-->

                            <!--Start Employees-->
                             <div class="mt-3 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/employee.png" height="80"></span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-right font-22">
                                                <?php
                                                    //code for summing up number of employees in the certain Hospital 
                                                    $result ="SELECT count(*) FROM his_docs ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($doc);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $doc;?></span></h3>
                                                <p class="text-warning mb-1">Employees</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <!--End Employees-->

                            <!--Start Corporation Assets-->
                            <div class="mt-3 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/corp-asst.png" height="80"></span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-right font-22">
                                                <?php
                                                    /* 
                                                     * code for summing up number of assets,
                                                     */ 
                                                    $result ="SELECT count(*) FROM his_equipments ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($assets);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $assets;?></span></h3>
                                                <p class="text-info mb-1">MMC Assets</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <!--End Corporation Assets-->
                        </div>

                        <div class="row">
                            <!--Start OutPatients-->
                            <div class="mt-2 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/out-patient.png" height="80"></span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-right font-22">
                                                <?php
                                                    //code for summing up number of outpatients 
                                                    $result ="SELECT count(*) FROM his_patients WHERE pat_type = 'OutPatient' ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($outpatient);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $outpatient;?></span></h3>
                                                <p class="text-blue mb-1">OutPatients</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <!--End Out Patients-->

                            <!--Start Vendors-->
                            <div class="mt-2 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/vendor.png" height="80"></span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-right font-22">
                                                <?php
                                                    /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */ 
                                                    $result ="SELECT count(*) FROM his_vendor ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($vendor);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $vendor;?></span></h3>
                                                <p class="text-danger mb-1">Vendors</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col--> 
                            <!--End Vendors-->  

                            <!--Start Pharmaceuticals-->
                            <div class="mt-2 col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="avatar-lg">
                                                <span><img src="assets/images/pharmaceuticals.png" height="70"></span>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="text-right font-22">
                                                <?php
                                                    /* 
                                                     * code for summing up number of pharmaceuticals,
                                                     */ 
                                                    $result ="SELECT count(*) FROM his_pharmaceuticals ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($phar);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $phar;?></span></h3>
                                                <p class="text-primary mb-1">Pharmaceuticals</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <!--End Pharmaceuticals-->

                        </div>
                        
                        <!--Employees-->
                        <div class="row">
                            <div class="mt-3 col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Employees</h4>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th colspan="2"></th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $ret="SELECT * FROM his_docs ORDER BY RAND() LIMIT 10 "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 36px;">
                                                        <img src="../doc/assets/images/users/<?php echo $row->doc_dpic;?>" alt="img" title="contact-img" class="rounded-circle avatar-sm bg-dark" />
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?>
                                                    </td>    
                                                    <td>
                                                        <?php echo $row->doc_email;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->doc_dept;?>
                                                    </td>
                                                    <td>
                                                        <a href="his_admin_view_single_employee.php?doc_id=<?php echo $row->doc_id;?>&&doc_number=<?php echo $row->doc_number;?>" class="btn btn-xs btn-success"><i class="mdi mdi-eye"></i> View</a>
                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>
                                            </tbody>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->                                                                                                                                                                                                                                         
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>
        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>