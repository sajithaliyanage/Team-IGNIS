<?php
$var = "status";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">


</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-chevron-circle-right"></i> Leave Status
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top table-responsive">
                            <center>
                                <h4>My Recent Leave Requests</h4>
                            </center>
                            <hr>

                            <table class="table ">
                                <thead style="color: #065ABC">
                                    <tr>

                                        <th style='text-align: center;'>Applied Date</th>
                                        <th style='text-align: center;'>Number of Days</th>
                                        <th style='text-align: center;'>Start Date - End Date</th>
                                        <th style='text-align: center;'>Leave Type</th>
                                        <th style='text-align: center;'>Leave Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "select * from apply_leave JOIN leave_type ON apply_leave.leave_id = leave_type.leave_id where apply_leave.comp_id =:myId ORDER BY apply_leave_id DESC ";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('myId'=>$empID));
                                        $rowCount = $query->rowCount();
                                        $result = $query->fetchAll();

                                        if($rowCount==0){
                                            echo "<tr><td><center>-</center></td>";
                                            echo "<td><center>-</center></td>";
                                            echo "<td><center>-</center></td>";
                                            echo "<td><center>-</center></td>";
                                            echo "<td><center>-</center></td></tr>";
                                        }

                                        foreach($result as $rs) {
                                            echo "<tr>
                                                    <td style='text-align: center;'>" . $rs['apply_date'] . "</td>
                                                    <td style='text-align: center;'>" . $rs['number_of_days'] . " day</td>
                                                    <td style='text-align: center;'>" . $rs['start_date'] . " - " . $rs['end_date'] . "</td>
                                                    <td style='text-align: center;'>" . ucwords($rs['leave_name']) . "</td>
                                                    <td style='text-align: center;'><span>";
                                                    if ($rs['status'] == 'waiting' | $rs['status'] == 'recommended') {
                                                        echo "Waiting for Approve <i class='fa fa-question' aria-hidden='true'></i></span></a> <a class=\"btn btn-link btn-xs\" data-toggle=\"modal\" data-target='#cancel-leave" . $rs['apply_leave_id'] . "'><span class=\"label label-danger\" title='Cancel leave'>X</span></a>";
                                                    } else if ($rs['status'] == 'approved') {
                                                        echo "<span style=\"color:#00a65a;\">Approved<i class='fa fa-check' style='margin-left:4px;' aria-hidden='true'></i></span></a> <a class=\"btn btn-link btn-xs\" style='"; if(DateTime::createFromFormat('d/m/Y',$rs['start_date']) < DateTime::createFromFormat('d/m/Y',date('d/m/Y'))){echo 'display:none;';} echo "' data-toggle=\"modal\" data-target='#cancel-approved-leave" . $rs['apply_leave_id'] . "'><span class=\"label label-danger\" title='Cancel leave'>X</span></a></span>";
                                                    } else if ($rs['status'] == 'rejected') {
                                                        echo '<span style="color:#d43f3a;">Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></span>';
                                                    } else if ($rs['status'] == 'canceled') {
                                                        echo '<span style="color:#FF8717;">Canceled <i class=\'fa fa-exclamation\' aria-hidden=\'true\'></i></span></span>';
                                                    }
                                                    echo "</td>
                                                        </tr>

                                                          <form action='../../module/rejectApprovedLeave.php?app_leave_id=".$rs['apply_leave_id']."' method='POST'>
                                                            <div class=\"modal fade\" id='cancel-approved-leave".$rs['apply_leave_id']."' >
                                                                        <div class=\"modal-dialog\">

                                                                            <!-- Modal content-->
                                                                            <div class=\"modal-content\">
                                                                                <div class=\"modal-header\">
                                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                                    <h4 class=\"modal-title\">Cancel Approved Leave</h4>
                                                                                </div>
                                                                                <div class=\"modal-body\">
                                                                                    <p>Are you sure you want to cancel this leave ?</p>
                                                                                </div>
                                                                                <div class=\"modal-footer\">
                                                                                    <button class=\"btn btn-warning\" type='submit' name=\"submit\" value='cancel'>Cancel</button>
                                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                          </form>
                                                          <form action='../../module/cancelLeave.php?app_leave_id=".$rs['apply_leave_id']."' method='POST'>
                                                            <div class=\"modal fade\" id='cancel-leave".$rs['apply_leave_id']."' >
                                                                        <div class=\"modal-dialog\">

                                                                            <!-- Modal content-->
                                                                            <div class=\"modal-content\">
                                                                                <div class=\"modal-header\">
                                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                                    <h4 class=\"modal-title\">Cancel Leave</h4>
                                                                                </div>
                                                                                <div class=\"modal-body\">
                                                                                    <p>Are you sure you want to cancel this leave ?</p>
                                                                                </div>
                                                                                <div class=\"modal-footer\">
                                                                                    <button class=\"btn btn-warning\" type='submit' name=\"submit\" value='cancel'>Cancel</button>
                                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                          </form>
                                                          
                                                          ";
                                                }
                                    ?>

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>

</body>
</html>