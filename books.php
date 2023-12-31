<?php
require_once 'connection.php';
$sqlBook = "SELECT * , author.author_name
        FROM book
        INNER JOIN author ON book.book_author_id = author.author_id
        LEFT JOIN categories ON book.categories_id = categories.id";

$all_book = $con->query($sqlBook);

$sqlCategories = "SELECT * FROM categories";
$all_categories = $con->query($sqlCategories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Book Recommender Books</title>
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="about.html">About</a></li>
                    <div class="iconbooks">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="35" viewBox="0 0 41 35" fill="none">
                            <path d="M12.4619 0V34.8936H19.212V0H12.4619ZM0 3.8951V19.3132H3.98087V3.8951H0ZM13.6734 5.7615H15.2312V31.7288H13.6734V5.7615ZM24.8134 6.38553L20.8952 7.04478L26.2455 35L30.1637 34.3408L24.8134 6.38553ZM5.5386 7.7902V29.7001H10.9041V7.7902H5.5386ZM29.9 10.1175L27.512 11.0729L27.9874 12.1178L30.3754 11.1625L29.9 10.1175ZM30.9869 12.506L28.5987 13.4612L29.0741 14.5062L31.462 13.5509L30.9867 12.506H30.9869ZM32.0734 14.8945L29.6854 15.8496L38.3113 34.808L40.6993 33.8526L32.0735 14.8945H32.0734ZM0 20.7739V23.2083H3.98087V20.7739H0ZM16.4427 21.3419H18.0005V31.7288H16.4427V21.3419ZM0 24.669V34.8936H3.98087V24.669H0ZM5.5386 31.1608V34.8936H10.9041V31.1608H5.5386Z" fill="black"/>
                          </svg>
                          <li><a href="./log-reg/dashboard.php">My bookshelf</a></li>
                    </div>  
                </ul>
            </nav>
        </div>
    </div>

    <!--categories-->
    <section class="categories">
        <div class="container">
            <div class="categories-text-and-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path opacity="0.2" d="M21.1816 12.2754L23.9062 15L14.2898 24.6023C13.232 25.643 11.8058 26.2236 10.3219 26.2176C8.83805 26.2115 7.41665 25.6194 6.36737 24.5701C5.31809 23.5208 4.72594 22.0994 4.7199 20.6155C4.71385 19.1316 5.29441 17.7054 6.33511 16.6477L17.973 4.84805C18.6763 4.14471 19.6303 3.74957 20.625 3.74957C21.6196 3.74957 22.5736 4.14471 23.2769 4.84805C23.9803 5.55139 24.3754 6.50533 24.3754 7.5C24.3754 8.49468 23.9803 9.44861 23.2769 10.152L21.1816 12.2754Z" fill="#7F5539"/>
                    <path d="M24.5695 14.3367C24.6566 14.4238 24.7258 14.5272 24.773 14.641C24.8201 14.7548 24.8444 14.8768 24.8444 15C24.8444 15.1232 24.8201 15.2452 24.773 15.359C24.7258 15.4728 24.6566 15.5762 24.5695 15.6633L14.9542 25.2727C13.7233 26.5034 12.0539 27.1948 10.3132 27.1947C8.57252 27.1946 6.90317 26.503 5.6724 25.2721C4.44163 24.0411 3.75026 22.3717 3.75037 20.631C3.75048 18.8903 4.44206 17.221 5.67299 15.9902L17.305 4.18711C18.1838 3.30739 19.3761 2.81279 20.6195 2.81213C21.863 2.81148 23.0558 3.3048 23.9355 4.18359C24.8152 5.06238 25.3098 6.25464 25.3105 7.4981C25.3111 8.74155 24.8178 9.93434 23.939 10.8141L12.3046 22.6172C11.7763 23.1455 11.0597 23.4424 10.3124 23.4424C9.56523 23.4424 8.84862 23.1455 8.32026 22.6172C7.79189 22.0888 7.49506 21.3722 7.49506 20.625C7.49506 19.8778 7.79189 19.1612 8.32026 18.6328L18.082 8.7164C18.1675 8.62518 18.2704 8.55199 18.3846 8.50113C18.4988 8.45027 18.6221 8.42277 18.7471 8.42026C18.8721 8.41774 18.9963 8.44025 19.1125 8.48648C19.2287 8.5327 19.3344 8.60169 19.4236 8.6894C19.5127 8.77711 19.5833 8.88175 19.6314 8.99718C19.6795 9.11261 19.704 9.23648 19.7034 9.36151C19.7029 9.48655 19.6774 9.61021 19.6283 9.72523C19.5793 9.84025 19.5078 9.94429 19.4179 10.0312L9.65502 19.9582C9.56761 20.0449 9.49814 20.148 9.45056 20.2616C9.40299 20.3751 9.37826 20.497 9.37777 20.6201C9.37728 20.7432 9.40104 20.8652 9.44771 20.9792C9.49438 21.0931 9.56303 21.1968 9.64975 21.2842C9.73647 21.3716 9.83955 21.4411 9.95312 21.4886C10.0667 21.5362 10.1885 21.5609 10.3116 21.5614C10.4348 21.5619 10.5568 21.5382 10.6707 21.4915C10.7847 21.4448 10.8883 21.3762 10.9757 21.2895L22.6089 9.49219C23.1373 8.96491 23.4346 8.24934 23.4353 7.5029C23.4361 6.75645 23.1403 6.04027 22.613 5.51191C22.0858 4.98355 21.3702 4.68629 20.6237 4.68552C19.8773 4.68475 19.1611 4.98054 18.6328 5.50781L7.00307 17.3062C6.5674 17.7412 6.22167 18.2578 5.98562 18.8263C5.74957 19.3949 5.62783 20.0045 5.62734 20.6201C5.62685 21.2357 5.74762 21.8454 5.98277 22.4144C6.21791 22.9834 6.56282 23.5005 6.99779 23.9361C7.43277 24.3718 7.9493 24.7175 8.51789 24.9536C9.08649 25.1896 9.696 25.3114 10.3116 25.3119C10.9273 25.3124 11.537 25.1916 12.106 24.9564C12.6749 24.7213 13.192 24.3764 13.6277 23.9414L23.2441 14.332C23.4205 14.157 23.6592 14.0591 23.9077 14.06C24.1563 14.0609 24.3943 14.1604 24.5695 14.3367Z" fill="#7F5539"/>
                  </svg>
                  <h1>CATEGORIES</h1>
            </div>
            <ul class="categories-set">
                <?php
                while($row = $all_categories->fetch_assoc()){
                 ?>

                <li><a href=""><h2><?php echo $row["categories"]; ?></h2></a></li>

                <?php
                    }
                ?>

            </ul>
        </div>
    </section>
    <section class="all-books">
        <div class="container">
        <div class="all-books-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M26.25 5.625H18.75C18.0223 5.625 17.3046 5.79443 16.6537 6.11987C16.0028 6.44531 15.4366 6.91783 15 7.5C14.5634 6.91783 13.9972 6.44531 13.3463 6.11987C12.6954 5.79443 11.9777 5.625 11.25 5.625H3.75C3.25272 5.625 2.77581 5.82254 2.42417 6.17417C2.07254 6.52581 1.875 7.00272 1.875 7.5V22.5C1.875 22.9973 2.07254 23.4742 2.42417 23.8258C2.77581 24.1775 3.25272 24.375 3.75 24.375H11.25C11.9959 24.375 12.7113 24.6713 13.2387 25.1988C13.7662 25.7262 14.0625 26.4416 14.0625 27.1875C14.0625 27.4361 14.1613 27.6746 14.3371 27.8504C14.5129 28.0262 14.7514 28.125 15 28.125C15.2486 28.125 15.4871 28.0262 15.6629 27.8504C15.8387 27.6746 15.9375 27.4361 15.9375 27.1875C15.9375 26.4416 16.2338 25.7262 16.7613 25.1988C17.2887 24.6713 18.0041 24.375 18.75 24.375H26.25C26.7473 24.375 27.2242 24.1775 27.5758 23.8258C27.9275 23.4742 28.125 22.9973 28.125 22.5V7.5C28.125 7.00272 27.9275 6.52581 27.5758 6.17417C27.2242 5.82254 26.7473 5.625 26.25 5.625ZM11.25 22.5H3.75V7.5H11.25C11.9959 7.5 12.7113 7.79632 13.2387 8.32376C13.7662 8.85121 14.0625 9.56658 14.0625 10.3125V23.4375C13.2519 22.8275 12.2645 22.4984 11.25 22.5ZM26.25 22.5H18.75C17.7355 22.4984 16.7481 22.8275 15.9375 23.4375V10.3125C15.9375 9.56658 16.2338 8.85121 16.7613 8.32376C17.2887 7.79632 18.0041 7.5 18.75 7.5H26.25V22.5Z" fill="#7F5539"/>
                      </svg>
                      <h1>ALL BOOKS</h1>
                </div>
        </div>
    </section>
    <!--all books-->
    <main>
        <?php
            while($row = $all_book->fetch_assoc()){
        ?>
        <section class="all-books">
            <div class="container">
                <div class="books-cards">
                    <div class="card">
                        <div class="imagine-of-book">
                            <img src="<?php echo $row["cover_im"]; ?>" alt="">
                        </div>
                        <div class="caption">
                            <p class="book-name">
                                <h3><?php echo $row["book_title"]; ?></h3>
                            </p>
                            <div class="autor-save">
                                <p class="author-name">
                                    <h4><?php echo $row["author_name"]; ?></h4>
                                </p>
                                <button class="save-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 15 20" fill = "none">
                                        <path d="M13.5217 19L7.26087 15.087L1 19V1.78261C1 1.57505 1.08245 1.37599 1.22922 1.22922C1.37599 1.08245 1.57505 1 1.78261 1H12.7391C12.9467 1 13.1458 1.08245 13.2925 1.22922C13.4393 1.37599 13.5217 1.57505 13.5217 1.78261V19Z" stroke="#3D3C3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                </button>
                            </div>
                        </div>  
                    </div>
               
        </section>
        <?php
            }
        ?>
    </main>
    
    <!--foter-->
    <section class="footer">
        <div class="container footer-des ">
            <h1><a href="index.html">BOOK RECOMMENDER</a></h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="books.html">Books</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="./log-reg/dashboard.php">My bookshelf</a></li>
            </ul>
        </div>
    </section>
</body>
</html>