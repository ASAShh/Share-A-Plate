<?php
$connection = mysqli_connect("localhost:3306", "root", "", "demo");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
include '../connection.php';
session_start();
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['area'];
    $address=$_POST['address'];

    $pass=password_hash($password,PASSWORD_DEFAULT);

    $sql="select * from admin where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);

    if($num==1){
         echo '<script type="text/javascript">alert("Account already exists !!!")</script>';
         echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into admin(name,email,password,location,address) values('$username','$email','$pass','$location','$address')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
         //$_SESSION['email']=$email;
         //$_SESSION['name']=$row['name'];
         //$_SESSION['gender']=$row['gender'];
       
        header("location:signin.php");
        echo "<h1><center>Account does not exists </center></h1>";
        echo '<script type="text/javascript">alert("Account created successfully")</script>';
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <script src="signin.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action=" " method="post" id="form">
            <p class="logo" style="">Food <b style="color:#06C167; ">Donate</b></p>
            <span class="title">Register</span>
            <br>
            <br>
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" required/>
                <div class="error"></div>
            </div>
            <div class="input-group">
                    <label for="email">Email</label>
                <input type="email" id="email" name="email" required/>
                        
                    </div>
            <!-- <div class="input-group">
                 <label for="phoneno">phone Number</label> 
                <input type="text" id="phoneno" name="phoneno" placeholder="Phone Number"  required/>
                <div class="error"></div>
            </div> -->

            <label class="textlabel" for="password">Password</label> 
             <div class="password">
              
                <input type="password" name="password" id="password"  required/>
                <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                <!-- <i class="bi bi-eye-slash" id="showpassword"></i>  -->
                <!-- <i class="uil uil-lock icon"></i> -->
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
                <?php
                    if($msg==1){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password don\'t match.</p>';
                    }
                    ?> 
             </div>
            <!-- <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
                <div class="error"></div>
            </div> -->
            <div class="input-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" id="address" required/></textarea>
     
                <!-- <input type="text" id="address" name="address" required/> -->
                        
                    </div>
            <div class="input-field">
                        <!-- <label for="area">Location:</label> -->
                        <!-- <br> -->
                        <select id="area" name="area" style="padding:10px; padding-left: 20px;">
                          <option value="Domlur">Domlur</option>
                          <option value="Indiranagar">Indiranagar</option>
                          <option value="Rajajinagar">Rajajinagar</option>
                          <option value="Malleswaram">Malleswaram</option>
                          <option value="Sadashivanagar">Sadashivanagar</option>
                          <option value="Ulsoor">Ulsoor</option>
                          <option value="Vasanth Nagar">Vasanth Nagar</option>
                          <option value="Belladur">Belladur</option>
                          <option value="Hoodi">Hoodi</option>
                          <option value="Krishnarajapuram">Krishnarajapuram</option>
                          <option value="Marathalli">Marathalli</option>
                          <option value="Whitefield">Whitefield</option>
                          <option value="HBR Layout">HBR Layout</option>
                          <option value="Kalyan Nagar">Kalyan Nagar</option>
                          <option value="Hebbal">Hebbal</option>
                          <option value="Yelhanka">Yelhanka</option>
                          <option value="Electronic city">Electronic city</option>
                          <option value="Kormangla" selected>Kormangla</option>
                        </select> 
                        

                        <!-- <input type="password" class="password" placeholder="Create a password" required> -->
                        <!-- <i class="uil uil-map-marker icon"></i> -->
                    </div>
                  
         
            <button type="submit" name="sign">Register</button>
            <div class="login-signup" >
                    <span class="text">Already a member?
                        <a href="signin.php" class="text login-link">Login Now</a>
                    </span>
                </div>
        </form>
    </div>
    <br>
    <br>
    <script src="login.js" ></script>
    <!-- <script src="../login.js"></script> -->
</body>
</html>