<?php
$digitsHash = "Hash";

$crackedHash = "4 digit number";

//If they submited gitis to get hash
if ( isset($_GET['digits']) ) { //I have to check if it's a 4 digit number
    $digits = $_GET['digits'];
    $digitsHash = hash('md5', $digits);
}
if ( isset($_GET['hash']) ) {
    $time_pre = microtime(true);
    $hash = $_GET['hash'];

    $found = false; //Havent been found
    $exist =true; //We supose it exist
    $i=0;
    $j=0;
    $k=0;
    $l=0;
    $testw="";
    while (!$found && $exist) {
        $testw=$i.$j.$k.$l;
        $check = hash('md5', $testw);
        if ($check==$hash) {
            $found=true;
            $crackedHash=$testw;
            break;
        }
        if ($l<9) {
            $l++;
        }elseif ($k<9) {
            $l=0;
            $k++;
        }elseif ($j<9) {
            $l=0;
            $k=0;
            $j++;
        }elseif ($i<9) {
            $l=0;
            $k=0;
            $j=0;
            $i++;
        }else{
            $exist=false;
            $crackedHash="That is not a md5 hash from a 4 digit number";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Isaac Palacio MD5 Cracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="height: 100vh; background: url(https://images.unsplash.com/photo-1495195129352-aeb325a55b65?ixlib=rb-1.2.1&auto=format&fit=crop&w=1055&q=80) no-repeat center fixed; -webkit-background-size: cover;">

<div class="container h-100">
<div class="row h-100">
<div class="col align-self-center">
<div class="row justify-content-center card-columns">
    <div class="card p-3 m-3">
        <h1 class="text-center font-weight-bold">Get your Hash</h1>
        <h4 class="text-center font-weight-bold">Write down a 4 digit number and get the md5 hash</h4>
        <form>
        <div class="row justify-content-center">
            <input type="text" name="digits" class="form-control col-md-4 m-3" placeholder="4 digits number">
            <button type="submit" class="btn btn-primary col-12 col-md-auto m-3">Get hash</button>
            <output class="form-control col-md-4 m-3 overflow-auto"><?= $digitsHash ?></output>
        </div>
        </form>
    </div>
    <div class="card p-3 m-3">
        <h1 class="text-center font-weight-bold">Crack your Hash</h1>
        <h4 class="text-center font-weight-bold">Find out what is the 4 digit number that produce that hash</h4>
        <form>
        <div class="row justify-content-center">
            <input type="text" name="hash" class="form-control col-md-4 m-3" placeholder="Md5 hash">
            <button type="submit" class="btn btn-primary col-12 col-md-auto m-3">Crack</button>
            <output class="form-control col-md-4 m-3"><?= $crackedHash ?></output>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

</body>
</html>
