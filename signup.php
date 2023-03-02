<?php

$verificatiton_code = bin2hex(random_bytes(4));
        // mail verification send code 
        session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        function sendmail($email, $v_code)
       {
          
            $Examroll = $_POST["Examroll"];
            $password = $_POST["password"];
            $verificatiton_code = bin2hex(random_bytes(4));
            $email = $_POST["email"];
            $fname = $_POST["fname"];

            //Load Composer's autoloader
            require ("phpmailer/PHPMailer.php");
            require ("phpmailer/Exception.php");
            require ("phpmailer/SMTP.php");
    
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
    
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dspmugatepass12@gmail.com';                     //SMTP username
                $mail->Password   = 'wyigvsilmoodzadg';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('dspmugatepass12@gmail.com', 'Devanand');
                $mail->addAddress($email);     //Add a recipient
               
                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email verification from DSPMU Collage gate entry pass ';
                $mail->Body    = "Thanks for Registration ! 
                          
                        <br><br>   Dear  $fname ,
                        <br><br>   Your login id : $Examroll
                        <br><br>     password is : $password   
                        <br><br>  
                                    click to <a href='https://localhost/main/verify.php?email=$email&verfication_code=$verificatiton_code'> 
                                    Verify </a>";
            
                $mail->send();
                return true;
    
            } 
            catch (Exception $e) {
                return false;
            }
       }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'database/student_registered.php';

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $date = $_POST["dob"];
        $gender = $_POST["gender"];
        $Examroll = $_POST["Examroll"];
        $batch = $_POST["batch"];
        $Department = $_POST["Department"];
        $Semester = $_POST["Semester"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

      // check if username already exist ..
      $existsql =" SELECT * FROM `student_registered` WHERE Examroll ='$Examroll'";
      $result = mysqli_query($conn, $existsql);
      $numExistRows = mysqli_num_rows($result);
      if($numExistRows > 0)
      {
        echo "User already exist";
      }
      else
      {

        $success = false;
        $failed = false;
          if($password == $cpassword)
          {
              $sql = "INSERT INTO `student_registered` (`fname`, `lname`, `dob`, `gender`, `Examroll`, `batch`, `Department`, `Semester`, `email`,`verification_code`,`is_verified`,`phone`, `password`, `cpassword`) 
                        VALUES ('$fname', '$lname', '$date', '$gender', '$Examroll', '$batch', '$Department', '$Semester', '$email','$verificatiton_code','0' ,'$phone', '$password', '$cpassword')";
              $result = mysqli_query($conn, $sql);
              if($result ==  true && sendmail($_POST['email'], $verificatiton_code))
              {
                // echo "<h1> Registration seccess </h1>";
                $success = true;
                session_start();
                header("location: login.php");
              }
              else
              {
                echo '<script>
                alert("server error");
                window.location.href="login.php";
                </script>';
              }

          }
          else
          {
            echo '<script>
            alert("Password does not match !");
            window.location.href="signup.php";
            </script>';
          }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale= 1.0"> -->

    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
    
        <!--========== BOX ICONS ==========-->
     <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="assets/css/bootstrap.css">
     <link rel="stylesheet" href="assets/css/styles.css">
    <title>Student Registration Form </title>
</head>
<style>
     body
    {
        height: 100%;
    }
    .form-control
    {
      width: 300px;
      /* background-color: #8fc4b7; */
      /* color:#000; */
    }
    .form-select
    {
      width: 300px;
      /* background-color: #dfdfdfa9; */

    }
    .card
    {
      padding: 5px;
    }
    .login-bar
    {
      width: 100%;
    }
</style>
<body>
    
      <?php require "nav/navbar.php" ?>
    <?php
        if($success)
        {
        echo '<script>
        alert("Registered successfully.");
        window.location.href="login.php";
        </script>';
        }

    ?>
    <div class="container">

    <br><br>
      <section class="h-10" style="background-color: #8fc4b7;">
        <div class="container py-3 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-8">
              <div class="card rounded-3">
                <img src="assets/img/1677408550480.jpg"
                  class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"alt="Sample photo">
                  <hr>

                  <!-- heading collage detail  -->
                      <h2 style="font-family: 'Gloock', serif; font-weight: 600;"> Collage details :</h2>
                      <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                    <form action="/main/signup.php" method="POST"> 

                      <!-- first name  -->
                    <div class="row">
                      <div class="col-md ">
                        <div class="form-floating mb-3">
                          <input type="fname" class="form-control" id="fname" placeholder="last name" name="fname">
                          <label for="fname">First name</label>
                        </div>
                      </div>
    
                      <!-- last name  -->
                      <div class="col-md">
                        <div class="form-floating mb-3">
                          <input type="lname" class="form-control" id="lname" placeholder="last name" name="lname">
                          <label for="lname">Last name</label>
                        </div>
                      </div>
                    </div>

                    <!-- gender and Date of birth  -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" placeholder="Date of Birth" name="dob">
                          <label for="date">Date of Birth</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="gender">
                          <option selected>Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>


                    <!-- exam roll  and batch -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="Examroll" placeholder="Exam-roll" maxlength="9" size="9">
                          <label for="floatingInput">Exam-Roll</label>
                        </div>
                        </div>
                      <div class="col-md-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="batch">
                          <option selected>BATCH</option>
                          <option value="2020-23">2020-23</option>
                          <option value="2020-23">2021-24</option>
                          <option value="2020-23">2022-25</option>

                        </select>
                        </div>
                    </div>
                    

                    <!-- department and semester  -->

                    <div class="row">
                      <div class="col-md-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="Department">
                          <option selected>Department</option>
                          <option value="BCA-CA">BCA-CA</option>
                          <option value="BCA-IT">BCA-IT</option>
                          <option value="Others">Others</option>
                        </select>
                        </div>
                      <div class="col-md-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="Semester">
                          <option selected>Current Semester</option>
                          <option value="1">I</option>
                          <option value="2">II</option>
                          <option value="3">III</option>
                          <option value="4">IV</option>
                          <option value="5">V</option>
                          <option value="6">VI</option>
                          </select>
                        </div>
                    </div>
                    <br>
                        

                       
                          <!-- login information  -->
                        <h2 style="font-family: 'Gloock', serif; font-weight: 600;">Login details :</h2>
                        <hr style="height:2px;border-width:0;color:#000;background-color:gray">
                 
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control login-bar" name="email" placeholder="Email address">
                          <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="tel" class="form-control login-bar" name="phone" placeholder="Phone number">
                          <label for="phone">Phone number</label>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control login-bar" name="password" placeholder="Password"  minlength="4" maxlength="8" size="10">
                          <label for=" Password">Password <small>{ must be upto 8 Character }</small></label>
                        </div>
                        
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control login-bar" name="cpassword" placeholder="Confirm Password"  minlength="4" maxlength="8" size="10">
                          <label for="cpassword">Confirm Password  <small>{ Entered Same Password }</small></label>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have a account ? :<a href="login.php" class="link-danger">Login</a></p>

                        </form>

              </div>
            </div>
          </div>
        </div>
      </section>

         <section class="menu section bd-container" id="help">
                <span class="section-subtitle">Help</span>
                <h2 class="section-title">If you're Facing any Queries for Registration and Login</h2>

                <div class="menu__container bd-grid">
                    <div class="menu__content">
                        <img src="assets/img/rkm.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">prof.Rajendar kr mahto </h3>
                        <span class="menu__detail"><i>rajendrabit57@gmail.com</i> </span>
                        <!-- <span class="menu__preci">$22.00</span> -->
                        <a href="#" class="button menu__button"><i class='fa fa-phone'></i></a>
                    </div>

                    <div class="menu__content">
                        <img src="assets/img/rds.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">prof.Rahul deo sah</h3>
                        <span class="menu__detail"><i>rahuldeosah@gmail.com</i></span>
                        <!-- <span class="menu__preci">$12.00</span> -->
                        <a href="#" class="button menu__button"><i class='fa fa-phone'></i></a>
                    </div>
                    
                    <div class="menu__content">
                        <img src="assets/img/jaffer.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">prof.syed jaffer abbas</h3>
                        <span class="menu__detail"><i>syedjafferabbas@gmail.</i></span>
                        <!-- <span class="menu__preci">$9.50</span> -->
                        <a href="#" class="button menu__button"><i class='fa fa-phone'></i></a>
                    </div>

                    <div class="menu__content">
                        <img src="assets/img/dk.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">prof.Dharmraj</h3>
                        <span class="menu__detail"><i>dharamrajkumar@gmail.</i></span>
                        <!-- <span class="menu__preci">$9.50</span> -->
                        <a href="#" class="button menu__button"><i class='fa fa-phone'></i></a>
                    </div>

                   
                </div>
            </section>

           
            <!--========== CONTACT US ==========-->
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Let's talk</span>
                        <h2 class="section-title contact__initial">Feedback</h2>
                        <p class="contact__description">  If you face any kind of bug then do give us your feedback.If you want some other things in this website, these are some important things.</p>
                    </div>
                      
                    <!-- <div class="contact__button">
                        <a href="#" class="button">Contact us now</a>
                    </div> -->

                    <div class="form-floating" id="comment">
                        <label for="floatingTextarea2">Feedback</label>

                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <a href="#" type="submit" class="button">send</a>
                      </div>
                          
                </div>
            </section>
        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container" id="about">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Gate entry</a>
                    <span class="footer__description">Dr. shyama prasad mukherjee university ranchi</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Attendance report</a></li>
                        <li><a href="#" class="footer__link">75% Attendance Or/Not </a></li>
                        <!-- <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li> -->
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Dr. Shyama Prasad Mukherjee University  </li>
                        <li> P.O. - Ranchi University Morabadi Ranchi-834008</li>
                        <li>TELEPHONE +91- 9431140704</li>
                        <li> EMAIL registrar@dspmuranchi.ac.in </li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">©2018;  ALL RIGHTS RESERVED Dr. Shyama Prasad Mukherjee University</p>
        </footer>



    </div>


              <!--========== SCROLL REVEAL ==========-->
              <script src="https://unpkg.com/scrollreveal"></script>

          <!--========== MAIN JS ==========-->
          <script src="assets/js/main.js"></script>
    
</body>
</html>