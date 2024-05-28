<!doctype html>
<html lang="en">

<head>
    <title>Smarthop</title>
    <link rel="icon" type="image/png" href="assets/fav-icon.png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Script of PHP handling Product Recommendations -->
    <?php

    $id = "";
    $books = array();
    $data;

    if (isset($_POST['user_id'])) {

        // echo "Want Product of User having ID : " . $_POST['user_id'];
        $api_url = "http://localhost:8080/app/recs?userId=".$_POST['user_id'];

        $response = file_get_contents($api_url);

        if($response !== false) {
            $data = json_decode($response, true);

            // var_dump($data);
            // Access variables from the array
            $id = $data['userId'];
            $books = $data['recommendedBooks'];

            var_dump($books[0]["name"]);

            


        }else {
            echo "<script>alert('NO USER EXIST')</script>";
        }
    }

    

    

    // Decode JSON data into an associative array
     //$dataq = json_decode($jsonData, true);

    // Access variables from the array
     //$idw = $dataq['ID'];
     //$booksw = $dataq['books'];


    ?>

    <!-- Nav Section -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid col-8">
            <!-- Logo-->
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png" alt="Logo" width="150">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="nav-link"><img src="assets/button-cart.png" width="52" alt=""></button>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link mt-1">
                            <img src="assets/icon-user.png" width="38" alt="">
                            <span class="ms-1 username">Username ID <b><?php echo $id ?></b></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link mt-2"><img src="assets/icon-drop-user.png" width="14" alt=""></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <!-- Top Introduction / Search Products Section -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-9 bg-light bg-landpage mt-1">
                    <center class="mt-5 ">
                        <h1>Personalized Product Recommendations</h1>
                        <p>Discover Your Next Favorite Find with AI-Powered Recommendations <br>
                            Tailored Just for You ✨</p>
                        <div class="search mt-4">
                            <input type="text" class="input-search" placeholder="Search for your perfect find..." name="" id="">
                            <button class="btn btn-search">Search</button>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!-- Recommended Products Section -->
        <div class="container-fluid bg-grid-1 mt-4">
            <div class="row justify-content-center">
                <div class="col-9 section-recommendation mt-1 mb-5">
                    <div class="title-section mb-5">
                        <img src="assets/icon-recommended.png" alt="" width="28" height="26">
                        <h1>Recommended for You</h1>
                    </div>
                    <div class="recommended-products">
                        <?php


                        // Iterate over each book
                        foreach ($books as $book) {
                            $book['name'] = strlen($book['name']) > 36 ? substr($book['name'], 0, 36) . '...' : $book['name'];
                            
                            // Print HTML content for each book
                            echo '<div class="card" style="width: 16rem;">
                                    <img src="' . $book['imageUrl'] . '" class="card-img-top" alt="..." style="max-height: 320px;">
                                    <div class="card-body">
                                        <div style="display: inline-flex;">
                                            <span class="product-price">$10.99</span>
                                            <div class="product-rating">
                                                <img src="assets/icon-star.png" width="13" height="13" alt="">
                                                <span>--</span>
                                            </div>
                                        </div>
                                        <h3 class="product-title">' . $book['name'] . '</h3>
                                        <button class="btn btn-primary btn-add-cart">
                                            <img src="assets/icon-cart.png" alt="">
                                            Add to Cart</button>
                                    </div>
                                </div>';
                        }


                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Products Section -->
        <div class="container-fluid bg-light popular-container">
            <div class="row justify-content-center ">
                <div class="col-9 section-recommendation mt-1">
                    <div class="title-section mb-5">
                        <img src="assets/icon-Popular Products.png" alt="" class="me-2" width="34" height="28">
                        <h1 style="color: white;">Popular Products</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 popular-product">
                            <div class="card" style="width: 12rem;">
                                <img src="assets/book-cover-3.jpg" class="card-img-top" alt="..." style="max-height: 200px;">
                                <div class="card-body">
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;">
                                <img src="assets/book-cover-2.jpg" class="card-img-top" alt="..." style="max-height: 200px;">
                                <div class="card-body">
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;">
                                <img src="assets/book-cover-5.jpg" class="card-img-top" alt="..." style="max-height: 200px;">
                                <div class="card-body">
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;">
                                <img src="assets/book-cover-6.jpg" class="card-img-top" alt="..." style="max-height: 200px;">
                                <div class="card-body">
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;">
                                <img src="assets/book-cover.jpg" class="card-img-top" alt="..." style="max-height: 200px;">
                                <div class="card-body">
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-3 bg-popular">.</div>
                        </div> !-->
                    </div>
                </div>
            </div>
            <!-- List of Products Section -->
            <div class="container-fluid bg-grid-2 mt-5">
                <div class="row justify-content-center ">
                    <div class="col-9 section-recommendation section-list-product mt-5">
                        <div class="title-section mb-4">
                            <img src="assets/icon-list-product.png" alt="" width="28" height="26">
                            <h1>List of Product</h1>
                        </div>
                        <div class="recommended-products">
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-2.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-3.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-9.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-5.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="11" height="12" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-6.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-7.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                            <div class="card" style="width: 15.5rem;">
                                <img src="assets/book-cover-8.jpg" class="card-img-top" alt="..." style="max-height: 320px;">
                                <div class="card-body">
                                    <div style="display: inline-flex;">
                                        <span class="product-price">$10.99</span>
                                        <div class="product-rating">
                                            <img src="assets/icon-star.png" width="13" height="13" alt="">
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title">Customer Segmentation
                                        Targeted</h3>
                                    <button class="btn btn-primary btn-add-cart">
                                        <img src="assets/icon-cart.png" alt="">
                                        Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="mb-5">
        <div class="col-6">

        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>