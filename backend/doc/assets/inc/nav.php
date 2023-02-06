<?php
    $doc_id = $_SESSION['doc_id'];
    $doc_number = $_SESSION['doc_number'];
    $ret="SELECT * FROM  his_docs WHERE doc_id = ? AND doc_number = ?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('is',$doc_id, $doc_number);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
?>
    <div class="navbar-custom bg-white">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/<?php echo $row->doc_dpic;?>" alt="dpic" class="rounded-circle bg-dark">
                    <span class="pro-user-name ml-1 text-dark ">
                        <?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?> <i class="mdi mdi-chevron-down text-dark"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a href="his_doc_account.php" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>My Account</span>
                    </a>

                    <a href="his_doc_update-account.php" class="dropdown-item notify-item">
                        <i class="fas fa-user-tag"></i>
                        <span>Update Account</span>
                    </a>


                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="his_doc_logout_partial.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

           

        </ul>

          <!-- LOGO -->
            <div class="logo-box">
                <a href="his_admin_dashboard.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="assets/images/logo-header.png" alt="" height="55">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/mmc_icon.png" alt="" height="45">
                    </span>
                </a>
            </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <img class="mb-1" src="assets/images/menu.png" alt="" height="25">
                </button>
            </li>

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Create New
                    <i class="mdi mdi-chevron-down dark"></i> 
                </a>
                <div class="dropdown-menu">
                    

                    <!-- item-->
                    <a href="his_doc_register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <span>Patient</span>
                    </a>



                    <!-- item-->
                    <a href="his_doc_lab_report.php" class="dropdown-item">
                        <i class="fe-hard-drive mr-1"></i>
                        <span>Laboratory Report</span>
                    </a>

                    
                    <div class="dropdown-divider"></div>

                    
                </div>
            </li>

        </ul>
    </div>
<?php }?>