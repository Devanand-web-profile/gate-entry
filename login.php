<?php

$login = false;
$showError = false;
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        include 'database/student_registered.php';
        $examroll = $_POST["Examroll"];
        $password = $_POST["password"];
        $fname = $_POST["fname"];

        $sql = "SELECT * FROM `student_registered` WHERE Examroll ='$examroll' AND password ='$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1)
            {   
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['fname'] = $fname;
                header("location: index.php");
                echo 
                '<script>
                alert("welcome");
                </script>';
            }
        else
        {
            $showError = true;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Student Login :</title>
</head>
<body>
        <div class="container">
        <?php require "nav/navbar.php" ?>
    <?php
    if($login){
    echo "<script>
    alert('successfully login');
    window.location.href='index.php'
    </script>";
    }
    if($showError){
    echo "<script>
    alert('Invalid Exam-roll ');
    window.location.href='login.php'
    </script>";
    }
    ?>

            <br><br>
            <section class="h-100 h-custom" style="background-color: #8fc4b7;">
             <div class="container py-5 h-100">
               <div class="row d-flex justify-content-center align-items-center h-100">
                 <div class="col-lg-8 col-xl-6">
                  <div class="card rounded-3">
                    <img src="assets/img/1677408550480.jpg";
                    class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                        <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login :</h3>

                        <!-- login detail form  -->
                        <form class="px-md-2" action="/main/login.php" method="POST">
                            <!-- User-id  -->
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="exam-roll" placeholder="Exam-roll" name="Examroll">
                          <label for="exam-roll">Exam-roll</label>
                        </div>
                              <!-- password -->
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                          <label for="password">Password</label>
                        </div>

                        <!-- remember me chechbox  -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? :<a href="signup.php" class="link-danger">Register</a></p>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Are you lost your password? :<a href="#!" class="link-danger">Forgot password</a></p>

                      </div>                
                     </form>
                    </div>
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