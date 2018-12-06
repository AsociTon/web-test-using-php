<?php
  if(is_numeric($_GET["num"])){
    $flag = 0;
    $i = 1;
    while($i < $_GET["num"]){
      if($i%$_GET["num"]==0){
        $flag  = 1;
        echo "<h1>".$_GET["num"]." is not prime.</h1>"
      }
    }
    if($flag == 0){
      echo "<h1>".$_GET["num"]." is prime.</h1>"
    }
  }
?>

<form>
  <input name = "num" type = "number">
  <input type = "submit" value = "is prime?">
</form>
