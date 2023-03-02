<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Dr.shyama Prasad Gate entry Management </title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <?php  require 'nav/navbar.php' ?>
            
      
        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        
                        <h3> <?php if(isset($_GET['fname'])): ?>
                            Your name is <?php echo $_GET["fname"]; ?>
                             <?php endif; ?></h3>

                        <h1 class="home__title"> Gate Entry</h1>
                        <h2 class="home__subtitle">First You Registered then <br> Login.</h2>
                        <a href="signup.php" class="button">Registered</a>
                    </div>
    
                    <img src="assets/img/gate.png" alt="" class="home__img">
                </div>
            </section>
            
            <!--========== ABOUT ==========-->
            <section class="about section bd-container" id="login">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">About us</span>
                        <h2 class="section-title about__initial">If you are Already Registered Our portal  <br>Login </h2>
                        <p class="about__description">Before Login, Check your login ID and Password by going to your registered Gmail.</p>
                        <a href="login.php" class="button">Login</a>
                    </div>

                    <img src="assets/img/login.png" alt="" class="about__img">
                </div>
            </section>

          
            <!--========== MENU ==========-->
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

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>