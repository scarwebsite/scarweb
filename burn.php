<?php
    header('Access-Control-Allow-Origin: *');
    // Token Contract Address
    $contract = '0xe5d3cbee3c4dacf69f7b35e0d1c5170fc92f3843';
    // Ethplorer API URL
    $url = 'https://api.ethplorer.io/getTokenInfo/'.$contract.'?apiKey=freekey';
    // Curl Ethplorer
    $ch = curl_init();
    $timeout = 60;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

    $result = curl_exec($ch);
    curl_close($ch);

    $values = json_decode($result);

    $supply = substr($values->totalSupply, 0, 8);

    $burned = 200 - $supply;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://btk.community/api/scroller.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://btk.community/api/scroller.min.js"></script>
</head>
<body>

<div class="jumbotron text-center" style="border-radius: 8px;">
    <p class="text-center" style="font-weight: bold; color: #6d4173;">$MRO TOKENS BURNED</p>
    <div class="odometer" style="font-size: 50px;"></div>
</div>

<script>
  setTimeout(function () {
    $('.odometer').html(<?php echo $burned; ?>);
  }, 1000);
</script>

</body>
</html>
