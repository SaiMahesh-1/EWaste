
<html>
    <head>
        <title>Login Form </title>
        <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
        <link rel="stylesheet" href="log ewas.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: index.html");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("User email doesn\'t exist")</script>';
            }
        }
    }
    ?>
        <div class="form"> 
           <h1> Login </h1>
           <form method="POST">
            <input type="email" name="email"  placeholder="Enter email ">
            <input type="password"  name="pass" placeholder="password">
            <button class="btn" type="submit" value="Login" name="login">LOGIN</button>
           </form>
         
        
         <div class="member">
            Create new account? <a href="register.php">
               <b>Register Now</b>
            </a>
         </div>
        </div>

    </body>
</html>