<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="nivi.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> </head>
 </head>
    <body>
    <?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from mobiles ";
    $cars= mysqli_query($con,$sql2);
    ?>
    <?php
        while($result= mysqli_fetch_array($cars))
        {            
    ?>
    <li>
    <form method="POST">  
<div>
    
<div class="pagebackground page2background d-flex flex-column justify-content-center">
    
             <div class="d-flex flex-row justify-content-center">
              <div class="cardbackground cardbackgroundforpage2">
            <h1  class="heading">Mobile</h1>
            <div class="x">
            <img src="img/<?php echo $result['MOB_IMG']?>">
            </div>
            <?php $res=$result['MOB_ID'];?>
            <p class="price">PRICE : <a><?php echo $result['PRICE']?></a><br>RATING : <a><?php echo $result['MOB_RATING']?></a></p>

            <button  type="submit" class="showbutton" onclick="display('sectionpage2')"><a href="payments.php?id=<?php echo $res;?>">BUY NOW</a></button>
        </div>
        </div>
        
         <!-- <div class="d-flex flex-row justify-content-center">
        <div class="cardbackground cardbackgroundforpage2">
            <h1 class="heading" >Mobile</h1>
            <div>
            <img class="img" src="./img/ph2.jpg">
            </div>
            <p class="price"> price:4000/-<br>>Rating : 4.0</p>
            <button class="showbutton">Buy now</button>
        </div>
         </div>
        
        <div class="d-flex flex-row justify-content-center">
        <div class=" cardbackground cardbackgroundforpage2">
            <h1  class="heading">Mobile</h1>
            <div>
            <img class="img3" src="./img/ph3.jpg">
            </div >
            <p class="price"> price:5000/-<br>Rating : 3.5</p>
            <button class="showbutton">Buy now</button>
            </div>
            </div> -->
        </div>
        </form>
        </li>

        <?php
        }
    ?>
    <?php 
    require_once('connection.php');
        

    $value = $_SESSION['email'];
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    ?>

   
<script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
  </body>
</html>