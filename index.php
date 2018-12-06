<?php
  if(is_numeric($_GET["num"])){
    $flag = 0;
    $i = 2;
    while($i < $_GET["num"]){
      if(($_GET["num"]%$i) == 0){
        $flag  = 1;
        $i=$_GET["num"];
      }
      $i++;
    }
    if($flag == 0|| $_GET["num"] == 2){
      echo "<h1>".$_GET["num"]." is prime.</h1>";
    }else{
      echo "<h1>".$_GET["num"]." is not prime.</h1>";
    }
  }
?>

<form>
  <input name = "num" type = "text">
  <input type = "submit" value = "is prime?">
</form>
