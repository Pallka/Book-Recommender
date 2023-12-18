<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <!--Navbar-->
    <div class="navbar">
        <div class="container flex">
            <div class="logo">
                <div class="logoim">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none">
                        <path d="M8.66666 41.1667V10.8333C8.66666 9.68406 9.1232 8.58186 9.93586 7.7692C10.7485 6.95655 11.8507 6.5 13 6.5H42.0333C42.3781 6.5 42.7088 6.63696 42.9526 6.88076C43.1964 7.12456 43.3333 7.45522 43.3333 7.8V36.2137" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M34.6667 19.0233C34.6664 20.327 34.1509 21.5778 33.2323 22.503C31.1177 24.635 29.0658 26.858 26.871 28.912C26.6259 29.1352 26.3045 29.2559 25.9731 29.249C25.6417 29.2422 25.3256 29.1083 25.09 28.8752L18.7677 22.5052C17.8486 21.5794 17.3329 20.3278 17.3329 19.0233C17.3329 17.7189 17.8486 16.4673 18.7677 15.5415C19.2262 15.0795 19.7717 14.7129 20.3726 14.4627C20.9736 14.2125 21.6181 14.0836 22.269 14.0836C22.9199 14.0836 23.5644 14.2125 24.1653 14.4627C24.7663 14.7129 25.3117 15.0795 25.7703 15.5415L26 15.7733L26.2297 15.5415C26.918 14.8457 27.7978 14.3705 28.7571 14.1763C29.7164 13.9822 30.7118 14.0779 31.6165 14.4513C32.5213 14.8246 33.2944 15.4588 33.8376 16.273C34.3808 17.0872 34.6694 18.0446 34.6667 19.0233Z" fill="url(#paint0_linear_80_109)" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M13 36.8333H43.3333M13 45.5H43.3333" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M13 45.5C11.8507 45.5 10.7485 45.0435 9.93586 44.2308C9.1232 43.4181 8.66666 42.3159 8.66666 41.1667C8.66666 40.0174 9.1232 38.9152 9.93586 38.1025C10.7485 37.2899 11.8507 36.8333 13 36.8333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                          <linearGradient id="paint0_linear_80_109" x1="35" y1="32" x2="2.5" y2="-3.49997" gradientUnits="userSpaceOnUse">
                            <stop offset="0.0937294" stop-color="#FF3F3F"/>
                            <stop offset="0.684149" stop-color="white"/>
                          </linearGradient>
                        </defs>
                      </svg>
                </div>
                <h1><a href="index.html">BOOK RECOMMENDER</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../about.html">About</a></li>
                    <div class="btn-login">
                          <li><a href="./index.php">Log in</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<section class='signIn'>
                <div class='container grid-signIn'>
                <div class='form card'>
                <div class='form bodytext'>
                <h2 >You are registered successfully.</h2><br/>
                <p class='link'>Click here to <a href='login.php'><i><b>Login</b></i></a> again.</p>
                </div>
                    </div>
                </div>
                </section>";
        } else {
            echo "
                  <section class='signIn'>
                <div class='container grid-signIn'>
                <div class='form card'>
                <div class='form bodytext'>
                  <h2>Required fields are missing.</h2><br/>
                  <p class='link'>Click here to <a href='registration.php'><i><b>registration</b></i></a> again.</p>
                  </div>
                    </div>
                </div>
            </section>";
        }
    } else {
?>

    <section class="registration-form">
            <div class="container grid-registration">
                <h1>Registration</h1>
                <div class="form card">
                    <form action="" method="post">
                        <div class="form-control">
                            <input type="text" name="username" placeholder="Username" class="bodytext" required>
                        </div>
                        <div class="form-control">
                            <input type="text" name="email" placeholder="Email Adress" class="bodytext" required>
                        </div>
                        <div class="form-control">
                            <input type="password" name="password" placeholder="Password" class="bodytext" required>
                        </div>
                        <input type="submit" value="Register" class="btntwo">
                        <h2>Already have an account? <a href="login.php"><i><b>Log in </b></i></a>
                        </h2>
                    </form>
                </div>
            </div>
    </section>
    
<?php
    }
?>
<!--foter-->
<section class="footer">
        <div class="container footer-des">
            <h1><a href="index.html">BOOK RECOMMENDER</a></h1>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about.html">About</a></li>
                <li><a href="./index.php">Log in</a></li>
                <li><a href="./registration.php">Registration</a></li>
            </ul>
        </div>
    </section>

</body>
</html>
