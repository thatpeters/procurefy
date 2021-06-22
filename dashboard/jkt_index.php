<?php
include "jkt_header.php";

$sql_Total = "SELECT * FROM posts";



$result = mysqli_query($connect, $sql_Total);
$rowcount_Total = mysqli_num_rows($result);
$pending = 0;
$acknowledged = 0;
$closed = 0;
$waiting = 0;
$alert_for_waiting = false;
$alert_for_waiting_week = false;

while ($row_posts = mysqli_fetch_array($result)) {

    if (empty($row_posts['pbtid'])) {
        $alert_for_waiting = true;
        $waiting += 1;
        $d = DateTime::createFromFormat('Y-m-d H:i:s', $row_posts['timestamp']);
        if ($d === false) {
            die("Incorrect date string");
        } else {

            if (date_timestamp_get($d) < strtotime("-1 week")) {
                $alert_for_waiting_week = true;
            }
        }
    }





    if ($row_posts['status'] == "Pending") {
        $pending += 1;
    } elseif ($row_posts['status'] == "Acknowledged") {
        $acknowledged += 1;
    } elseif ($row_posts['status'] == "Closed") {
        $closed += 1;
    }
}


mysqli_free_result($result);


?>


<div class="row">

    <?php

    if ($alert_for_waiting === true) {

        echo '<section class="panel" id="notification">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-secondary">
                                <i class="fa fa-exclamation"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <h4 class="title">ALERT:</h4>
                            <div class="info">
                            <h4>There are cases waiting for you to identify local government.</h4>
                            </div>
                            <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="pbt_my_case.php?category=Waiting">Go To Waiting Case</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }
    if ($alert_for_waiting_week === true) {

        echo '<section class="panel" id="notification">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-secondary">
                                <i class="fa fa-exclamation"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <h4 class="title">ALERT:</h4>
                            <div class="info">
                                <h4>Some cases are waiting for more than 1 weeks.</h4>

                            </div>
                            <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="pbt_my_case.php?category=Waiting">Go To Waiting Case</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    ?>



    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-tertiary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-tertiary">
                            <i class="fa fa-folder"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <h4 class="title">PSSF Total Reports</h4>
                        <div class="info">
                            <h4><?php echo $rowcount_Total ?></h4>
                        </div>
                        <div class="summary-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-tertiary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-tertiary">
                            <i class="fa fa-file"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <h4 class="title">Total Waiting</h4>
                        <div class="info">
                            <h4><?php echo $waiting ?></h4>
                        </div>
                        <div class="summary-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                            <i class="fa fa-exclamation"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <h4 class="title">Total Pending</h4>
                        <div class="info">
                            <h4><?php echo $pending ?></h4>
                        </div>
                        <div class="summary-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-quartenary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-quartenary">
                            <i class="fa fa-eye"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <h4 class="title">Total Acknowledged</h4>
                        <div class="info">
                            <h4><?php echo $acknowledged ?></h4>
                        </div>
                        <div class="summary-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-primary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fa fa-file-excel-o"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <h4 class="title">Total Closed</h4>
                        <div class="info">
                            <h4><?php echo $closed ?></h4>
                        </div>
                        <div class="summary-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>





</div>


<script>
    $(function() {
        var checkDiv = setInterval(function() {
            if ($('#notification').length > 0) { // it would be good if you would use id instead of the class
                clearInterval(checkDiv);
                var notice = new PNotify({
                    title: 'Click to Close',
                    text: 'Please address those waiting cases immediately!',
                    type: 'error',
                    icon: 'fa fa-exclamation',

                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });

                notice.get().click(function() {
                    notice.remove();
                });

                Notification.requestPermission(function(result) {
                    if (result === 'granted') {
                        navigator.serviceWorker.ready.then(function(registration) {
                            const options = {
                                icon: '../assets/images/apple-touch-icon-ipad-retina-152x152.png',
                                body: 'Please address those waiting cases immediately!'

                            };
                            registration.showNotification('PSSF', options);
                        });
                    }
                });
            }
        }, 100); // check after 100ms every time
    });
</script>


<?php
include "footer.html";
?>