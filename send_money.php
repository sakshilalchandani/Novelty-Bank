<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Send money</title>
  </head>
  <body>
    <?php require 'common_files/_nav.php'; ?>


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>


<style>
    .form-group{
        margin-left:200px;
        margin-right:200px;
        margin-top:20px;
    }

    .style_c{
        width:50%;
    }
    select,option{
        width : 150px;
    }
    .style_but{
       display:inline-block;
       width:400px;
}
</style>


<?php


    include 'common_files/_dbconnect.php';

    //1 echo $_POST['Account No.'];
    $sender = $_POST['uid'];

    echo "<div class='container my-4 text-center'>";

    $sql2 = "select * from `customers` where Sno = '$sender' ";
    $val2 = mysqli_query($con, $sql2);
    
    //2 echo $val2;
    //echo var_dump($val2);

    //3
    if($val2){
        while($row2 = mysqli_fetch_array($val2)){
            echo "<b>SENDER : </b>" . $row2['Name']. "<br><br>";
            echo "<b>CURRENT BALANCE : </b>" . $row2['Balance']. "<br><br>";
            $sen_name=$row2['Name'];

    }
    }

    //4
    //echo "<form method='POST' action=#send>
    echo "<form method='POST' action='middle.php'>
    <b>SELECT RECEIVER : </b> 
    <select class='custom-select select_c' name='receiver'>
    <option selected>Select a user to send Money</option>";
    $sql3 = "select * from `customers` ";
    $val3 = mysqli_query($con, $sql3);
    if($val3){
        while($row3 = mysqli_fetch_array($val3)){
            if($row3['Name'] != $sen_name){                                                       // 5
                echo "<option>" . $row3['Name'] . "</option>" ;
            }
        }
    }
  echo '</select><br><br>';

    echo "<label for='money'> <b>SPECIFY MONEY : </b></label><br>
    <input type='number' name='money' id='money' min='0'><br><br><br>
    <input type='hidden' name='uid' value='$sender'>     
    <div class='style_but'>
    <input type='submit'  class='btn btn-primary btn-lg btn-block' value = 'Send'>";
    
    session_start();
    $_SESSION['sending'] = true;
    
    echo '</div>
    </form>
    </div>';

/*echo "<div class='send' id='send'>";

?>


  <?php
    // value of dropdown and input field can be obtained as $_GET['name of that input']
    // fir usko check kar lenge badi hai ki chotii simpleeeeeeeeeeeeeeeeee.



// yahape agar class='send' kia toh this doesn't work.
// bar bar connect kyu krna hai ??????????
?>


<?php

// COMMENTS

//1 yeh chiz pe arror aya kyuki yeh value mene form ke sath(input type=hidden krke) nhi bheji thii......
//2 above stmt(echo $var) will give true/false, to check if it is t/f, use var_dump.
//3 jo niche sender ke liye firse natak hora tha wo mene yahi pe kr dia tha.
/*4 without action, error ayega, kyuki default action is current page, and form ke sath mene 'uid' naam ki 
    koi chiz nai bheji hai.but at the same time, i can't redirect it to any other page(ex aboutus or any other)
    kyuki mujhe wahi pe rehke results dene hai for transaction. isliye yahape shayad get use krna hoga */
// agar koi banda sender hai, toh us particular transaction ke liye, he can't become receiver !!


// Dropdown mein saare customers ka name hoga except the sender.
// form ke sath jo bhi page ka name daalo wahape redirect hota hi haiii.
// megha ne view.php me line 96 pe action=#check kyu likha hai??????? ----> google kro !!! it's in history also.
// yeh uid value wapas send karna hai 2nd form se. wo b try krke dekhna.
// jaise maine index page se hidden input krke uid bheja tha(to send_money), vaise hi send_money se middle me bhi toh bhej sakti hu 



// ek galti thi wo yeh ki me Sno = receiver name de rahi thi, isliye it didn'y work
// so now, middle page is working provided i'm not redirecting it to the send_oney.php page.
// if i redirect, undefined index : uid
// if i don't redirect, andwork on the same send_money.php page, undefined index : receiver & money. 

// itna problem hora hai toh mat kro is page pe redirect, kahi aur karo !!!!!!!111 
// jab middle page banaya, toh reeiver & money ko detect ni kr raha, jab same page pe kr rahi toh uid ko detect nhi krra.

?>