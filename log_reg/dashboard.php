<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

$con = new mysqli("localhost","br_user","bookrecommender","br");

// Check connection
if ($con->connect_error) {
 die("Connection failed: " . $con->connect_error);
}

 //$sql = "SELECT * FROM book WHERE book_title LIKE '%$search%' OR author_name LIKE '%$search%'";
 //$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User area</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="style-account.css" />
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
                <h1><a href="../index.html">BOOK RECOMMENDER</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../books.php">Books</a></li>
                    <li><a href="../about.html">About</a></li>
                    <div class="iconbooks">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="35" viewBox="0 0 41 35" fill="none">
                            <path d="M12.4619 0V34.8936H19.212V0H12.4619ZM0 3.8951V19.3132H3.98087V3.8951H0ZM13.6734 5.7615H15.2312V31.7288H13.6734V5.7615ZM24.8134 6.38553L20.8952 7.04478L26.2455 35L30.1637 34.3408L24.8134 6.38553ZM5.5386 7.7902V29.7001H10.9041V7.7902H5.5386ZM29.9 10.1175L27.512 11.0729L27.9874 12.1178L30.3754 11.1625L29.9 10.1175ZM30.9869 12.506L28.5987 13.4612L29.0741 14.5062L31.462 13.5509L30.9867 12.506H30.9869ZM32.0734 14.8945L29.6854 15.8496L38.3113 34.808L40.6993 33.8526L32.0735 14.8945H32.0734ZM0 20.7739V23.2083H3.98087V20.7739H0ZM16.4427 21.3419H18.0005V31.7288H16.4427V21.3419ZM0 24.669V34.8936H3.98087V24.669H0ZM5.5386 31.1608V34.8936H10.9041V31.1608H5.5386Z" fill="black"/>
                          </svg>
                          <li><a href="dashboard.php">My bookshelf</a></li>
                    </div>
                    
                </ul>
            </nav>
        </div>
    </div>

    <section class="welcome-page">
        <div class="container">
            <div>
            <p><h1>Hey, <?php echo $_SESSION['username']; ?>!</h1></p>
            <p><h4>You are in your bookshelf.</h4></p>
            </div>
            <p class="btn-logout"><a href="logout.php">Log out</a></p>
        </div>
    </section>
    
    <div class="container">
        <form action="" method="GET" class="container search-bar">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" required placeholder="Type the name of book or author...">
            <button type="submit"><img src="../images/search.png" alt=""></button>
        </form>

        <?php
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $query = "SELECT * , author.author_name
                    FROM book
                    INNER JOIN author ON book.book_author_id = author.author_id
                    LEFT JOIN categories ON book.categories_id = categories.id
                    WHERE CONCAT(book_title,author_name) LIKE '%$filtervalues%' ";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    
                    ?>

        <section class="all-books">
            <div class="container dash-grid">
                <div class="books-cards-search">
                    <div class="card search-des">
                        <div class="caption">
                            <p class="book-name">
                                <h3><?= $items["book_title"]; ?></h3>
                            </p>
                            <p class="author-name">
                                <i><h4><?= $items["author_name"]; ?></h4></i>
                            </p>
                        <div>
                            <p><h4><?= $items["book_about"]; ?></h4></p>
                        </div>
                        <div>
                             <h4 class="bodytext">Rate: <?= $items["rating"]; ?></h4>
                        </div>
                 </div>   
            </div>               
        </section>    

                    <?php
                }
            }
            else {
             ?>
                <h2 class="no-res">No results found</h2>
             <?php
            }
        }
        ?>
    </div>

</body>
</html>
