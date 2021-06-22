<?php
$postid = $_GET['postid'];

session_start();
if (isset($_SESSION['pbtid'])) {
    session_write_close();
    include 'pbt_header.php';
    $sql_posts = "SELECT * FROM posts WHERE postid='" . $postid . "' AND pbtid='" . $_SESSION['pbtid'] . "' AND status='Pending'";
} elseif (isset($_SESSION['userid'])) {
    session_write_close();
    include 'header.php';
    $sql_posts = "SELECT * FROM posts WHERE postid='" . $postid . "' AND userid='" . $_SESSION['userid'] . "' AND status='Pending'";
} elseif (isset($_SESSION['jktid'])) {
    session_write_close();
    include 'jkt_header.php';
    $sql_posts = "SELECT * FROM posts WHERE postid='" . $postid . "' AND pbtid is null";
}




$res_posts = mysqli_query($connect, $sql_posts);
if (mysqli_num_rows($res_posts) > 0) {
    $row_post = mysqli_fetch_array($res_posts);
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
}


$lon = (float)$row_post['longitude'];
$lat = (float)$row_post['latitude'];
$addr = getAddress($lat, $lon);

$pbt_list_sql = "SELECT * FROM pbt ORDER BY state asc";
$pbt_list = mysqli_query($connect, $pbt_list_sql);

?>





<div class="row">

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">


                <h2 class="panel-title">Edit Feedback</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="post" action="edit_post_query.php">


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textareaAutosize">Feedback ID</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $postid; ?>" name="postid" id="inputReadOnly" class="form-control" readonly="readonly"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textareaAutosize">Time</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $row_post['timestamp']; ?>" id="inputReadOnly" class="form-control" disabled> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textareaAutosize">Address</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $addr; ?>" id="inputReadOnly" class="form-control" disabled> </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">Category of Feedback</label>
                        <div class="col-md-6">
                            <select name="category" class="form-control" required <?php if ((isset($_SESSION['pbtid'])) || (isset($_SESSION['jktid']))) {
                                                                                        echo "disabled";
                                                                                    } ?>>
                                <option value="" hidden>Choose a category</option>
                                <option <?php if ($row_post['category'] == 'Potholes') {
                                            echo ("selected");
                                        } ?> value="Potholes">Potholes</option>
                                <option <?php if ($row_post['category'] == 'Parking/Building') {
                                            echo ("selected");
                                        } ?> value="Parking/Building">Parking/Building</option>
                                <option <?php if ($row_post['category'] == 'Light/Traffic Light') {
                                            echo ("selected");
                                        } ?> value="Light/Traffic Light">Light/Traffic Light</option>
                                <option <?php if ($row_post['category'] == 'Plants/Grass') {
                                            echo ("selected");
                                        } ?> value="Plants/Grass">Plants/Grass</option>
                                <option <?php if ($row_post['category'] == 'Garbage') {
                                            echo ("selected");
                                        } ?> value="Garbage">Garbage</option>
                                <option <?php if ($row_post['category'] == 'Drain') {
                                            echo ("selected");
                                        } ?> value="Drain">Drain</option>
                                <option <?php if ($row_post['category'] == 'Insects/Animals') {
                                            echo ("selected");
                                        } ?> value="Insects/Animals">Insects/Animals</option>
                                <option <?php if ($row_post['category'] == 'Signboard/Ads') {
                                            echo ("selected");
                                        } ?> value="Signboard/Ads">Signboard/Ads</option>
                                <option <?php if ($row_post['category'] == 'Open Burning') {
                                            echo ("selected");
                                        } ?> value="Open Burning">Open Burning</option>
                                <option <?php if ($row_post['category'] == 'Toilet') {
                                            echo ("selected");
                                        } ?> value="Toilet">Toilet</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textareaAutosize">Description</label>
                        <div class="col-md-6">
                            <textarea <?php if ((isset($_SESSION['pbtid'])) || (isset($_SESSION['jktid']))) {
                                            echo "disabled";
                                        } ?> required class="form-control" rows="6" name="post_text" id="textareaAutosize" data-plugin-textarea-autosize><?php echo $row_post['text']; ?></textarea>
                        </div>
                    </div>
                    <?php
                    if ((isset($_SESSION['pbtid'])) || (isset($_SESSION['jktid']))) {
                        echo '<div class="form-group">
                        <label class="col-md-3 control-label">Transfering to:</label>
                        <div class="col-md-6">
                            <select class="select2 form-control" id="select2" name="pbtid" required>
                                <option selected disabled value="">Choose a Local Government</option>';

                        while ($pbt_row = mysqli_fetch_array($pbt_list)) {
                            $pbtname = $pbt_row['state'] . ", " . $pbt_row['name'];
                            $pbtid = $pbt_row['pbtid'];
                            echo "<option value='$pbtid'>$pbtname</option>";
                        }
                        echo '</select></div></div>';
                    }



                    ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">


                            <button type="submit" class="btn btn-primary hidden-xs" id="submit" name="submit">Submit</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" id="submit" name="submit">Submit</button>



                        </div>
                    </div>

                </form>
            </div>
        </section>



    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({});
    });


    function showPhone(str) {
        if (str == "") {
            document.getElementById("phone").innerHTML = "";
            document.getElementById("phone").href = "#";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("phone").innerHTML = this.responseText;
                document.getElementById("phone").href = "tel:" + this.responseText;
            }
        }
        xmlhttp.open("GET", "getphone.php?q=" + str, true);
        xmlhttp.send();
    }
</script>




<?php
include 'footer.html';
?>