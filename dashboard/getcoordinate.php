<?php


if (isset($_POST['submit'])) {

    $address = $_POST['address'];

    $json = "https://api.geoapify.com/v1/geocode/search?text=" . urlencode($address) . "&limit=1&apiKey=add936821e934f8988b81a5b251935e0";

    $ch = curl_init($json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0");
    $jsonfile = curl_exec($ch);
    curl_close($ch);

    $RG_array = json_decode($jsonfile, true);

    $lon = $RG_array['features']['0']['properties']['lon'];
    $lat = $RG_array['features']['0']['properties']['lat'];
    
    if ((empty($RG_array['features']['0']['properties']['lon'])) || (empty($RG_array['features']['0']['properties']['lat']))) {
        echo "<script type='text/javascript'>alert('ERROR: Address not found.');</script>";
        header("Location: search_location.php");
    } else {
        header("Location: search_location.php?latitude=$lat&longitude=$lon&address=$address");
        exit;
    }
}
