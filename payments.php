<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css"
      href="main.js" 
    />
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/pay.css" />
    <title>Payment Form</title>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
  </head>
<body>
<style>
@import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background:orange url("images/paym.jpg") center/cover;
  overflow: hidden;
}

.card {
  margin-left: -500px;
  background: linear-gradient(
    to bottom right,
    rgb(54, 48, 98),
    rgb(54, 48, 98)
  );
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.5), -1px -1px 2px #aaa,
    1px 1px 2px #555;
  backdrop-filter: blur(0.8rem);
  padding: 1.5rem;
  border-radius: 1rem;
  animation: 1s cubic-bezier(0.16, 1, 0.3, 1) cardEnter;
}

.card__row {
  display: flex;
  justify-content: space-between;
  padding-bottom: 2rem;
}

.card__title {
  font-weight: 600;
  font-size: 2.5rem;
  color: #fff;
  font-weight: 500;
  margin: 1rem 0 1.5rem;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}

.card__col {
  padding-right: 2rem;
}

.card__input {
  background: none;
  border: none;
  border-bottom: dashed 0.2rem rgb(54, 48, 98);
  font-size: 1.2rem;
  color: #fff;
  text-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);
}
.card__input--large {
  font-size: 2rem;
}

.card__input::placeholder {
  color: rgba(255, 255, 255, 1);
  text-shadow: none;
}

.card__input:focus {
  outline: none;
  border-color: rgba(255, 255, 255, 0.6);
}

.card__label {
  display: block;
  color: #fff;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
  font-weight: 400;
}

.card__chip {
  align-self: flex-end;
}

.card__chip img {
  width: 3rem;
}

.card__brand {
  font-size: 3rem;
  color: #fff;
  min-width: 100px;
  min-height: 75px;
  text-align: right;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
}

@keyframes cardEnter {
  from {
    transform: translateY(100vh);
    opacity: 0.1;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}



  
.pay{
  width:200px;
  background: #ff7200;

  border:none;
  height: 40px;
  font-size: 18px;
  border-radius: 5px;
  cursor: pointer;
  color:white;
  transition: 0.4s ease;
  margin-left: 100px;
 

}


.pay a{
  text-decoration: none;
  color: black;
  font-weight: bold;
  
}


.btn{
  width:200px;
  background: #ff7200;

  border:none;
  height: 40px;
  font-size: 18px;
  border-radius: 5px;
  cursor: pointer;
  color:white;
  transition: 0.4s ease;
 
  
  

}


.btn a{
  text-decoration: none;
  color: white;
  font-weight: bold;
  
}

.payment{
  margin-top: -550px;
  margin-left: 100px;
}
</style>
<?php

require_once('connection.php');
session_start();
$email  =   $_SESSION['email'] ;
$carid=$_GET['id'];
$sql="select *from mobiles where MOB_ID='$carid' ";
$cname = mysqli_query($con,$sql);
$email = mysqli_fetch_assoc($cname);

if(isset($_POST['pay'])){
  $cardno=mysqli_real_escape_string($con,$_POST['cardno']);
  $exp=mysqli_real_escape_string($con,$_POST['exp']);
  $cvv=mysqli_real_escape_string($con,$_POST['cvv']);
  $price=$email['PRICE'];
  if(empty($cardno) || empty($exp) ||  empty($cvv) ){
    echo '<script>alert("please fill the place")</script>';
  }
  else{
    $sql2="insert into payment (CARD_NO,EXP_DATE,CVV,PRICE) values('$cardno','$exp',$cvv,$price)";
    $result = mysqli_query($con,$sql2);
    if($result){
      header("Location: r.html");
    }
  }

}


?>






  <h2 class="payment">TOTAL PAYMENT : <a>₹<?php echo $email['PRICE'] ?>/- </a></h2>
    <div class="card">
      <form method="POST">
        <h1 class="card__title">Enter Card Details</h1>
        <div class="card__row">
          <div class="card__col">
            <label for="cardNumber" class="card__label">Card Number</label
            ><input
              type="text"
              class="card_input card_input--large"
              id="cardNumber"
              placeholder="xxxx-xxxx-xxxx-xxxx"
              required="required"
              name="cardno"
              maxlength="16"
            />
          </div>
          <!-- <div class="card_col card_chip">
            <img src="img/chip.svg" alt="chip" />
          </div> -->
        </div>
        <div class="card__row">
          <div class="card__col">
            <label for="cardExpiry" class="card__label">Expiry Date</label
            ><input
              type="text"
              class="card__input"
              id="cardExpiry"
              placeholder="xx/xx"
              required="required"
              name="exp"
              maxlength="5"
            />
          </div>
          <div class="card__col">
            <label for="cardCcv" class="card__label">CCV</label
            ><input
              type="password"
              class="card__input"
              id="cardCcv"
              placeholder="xxx"
              required="required"
              name="cvv"
              maxlength="3"
            />
          </div>
          <div class="card_col card_brand"><i id="cardBrand"></i></div>
        </div>
        <input type="submit" VALUE="PAY NOW" class="pay" name="pay">
        <button class="btn"><a href="cancelbooking.php">CANCEL</a></button>
        <script>
               
          
          </script>
      </form>
      
    </div>
  </body>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>