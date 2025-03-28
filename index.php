<?php  
        session_start();
        if (isset($_SESSION["email"])) {
            header("Location: dashboard_html.php");
            exit();
        }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>INVENTRIX </title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="./assets/Logo.svg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
    </head>

    <body id="page-top">

        <!-- NAVIGATION-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand " href="#page-top">
                    <img src="assets/Logoup.svg" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link px-4 text-white" href="#page-top">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-4 text-white" href="#Why Us?">Why Us?</a></li>
                        <li class="nav-item"><a class="nav-link px-4 text-white" href="#portfolio">Products</a></li>
                        <li class="nav-item"><a class="nav-link px-4 text-white" href="#team">Team</a></li>
                    </ul>
                </div>
        
                <div class="d-flex ">
                    <a href="login_html.php" class="btn btn-primary" id="loginBtn">Get-Started</a>

                </div>
            </div>
        </nav>


        <!-- BACKGROUND-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold ">Crafting comfort and style for every corner of your home</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Explore our wide range of furniture pieces to find the perfect addition to your home.</p>
                        <a class="btn btn-primary btn-xl" href="#Why Us?">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>



        <!-- WHY US?-->
        <section class="page-section " id="Why Us?">
            <div class="container  text-center">
                <h2 class="text-center mt-0">WHY CHOOSE US?</h2>
                <hr class="divider" />
                <p class="text-muted mb-4">We offer a wide range of furniture options and every product is individually checked <br>also we have generated trust and confidence among builders and consultants.</p>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-truck fs-1 text-primary"></i></i></div>
                            <h3 class="h4 mb-2">Fast & Free <br>Shipping</h3>
                            <p class="text-muted mb-0">We deliver the orders to door steps within 7 days.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-handbag fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Easy To <br>Shop</h3>
                            <p class="text-muted mb-0">User can easily purchase the product quickly.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-repeat fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Hassle Free <br>Returns</h3>
                            <p class="text-muted mb-0">We offer hassle-free returns through courier pickup.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-headset fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">24x7 <br>Support</h3>
                            <p class="text-muted mb-0">We offer 24/7 technical and remote support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- PRODUCTS -->
        <section class="page-section bg-light" id="portfolio">
            <div class="container p-0">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Products</h2>
                    <hr class="divider" />
                    <p class="section-subheading text-muted">Discover our carefully curated selection of premium furniture and decor, designed to elevate your space with style and functionality.<br> From contemporary designs to timeless classics, our collection caters to every taste and need.<br> Explore our range and find the perfect piece to complement your home or office.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">3-Piece Wardrobe</div>
                                <div class="portfolio-caption-subheading text-muted">"Spacious, organized clothing storage."</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Dining Table</div>
                                <div class="portfolio-caption-subheading text-muted">"Elegant centerpiece for shared meals."</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Study Table</div>
                                <div class="portfolio-caption-subheading text-muted">"Compact and practical workspace."</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Wall Showpiece</div>
                                <div class="portfolio-caption-subheading text-muted">"Timeless craftsmanship with warmth."</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Portfolio item 5-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Bed</div>
                                <div class="portfolio-caption-subheading text-muted">"Sturdy foundation for restful sleep."</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Single Piece Sofa</div>
                                <div class="portfolio-caption-subheading text-muted">"Plush comfort with stylish design."</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">3-Piece Wardrobe</h2>
                                    <p class="item-intro text-muted">"Spacious, organized clothing storage."</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p>A spacious and versatile storage solution with multiple compartments, including hanging space, shelves, and drawers for organized clothing and accessories.</p>
                                    <!-- <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Dining Table</h2>
                                    <p class="item-intro text-muted">"Elegant centerpiece for shared meals."</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>A sturdy and spacious surface designed for dining, gatherings, and everyday use, offering comfort and style for shared meals and conversations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Study Table</h2>
                                    <p class="item-intro text-muted">"Compact and practical workspace.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>A functional and ergonomic workspace offering a sturdy surface for studying, writing, or working, with storage options for books and essentials to enhance productivity.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Wall Showpiece</h2>
                                    <p class="item-intro text-muted">"Timeless craftsmanship with warmth."</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>A stylish decorative accent that enhances interiors with artistic designs, adding charm, elegance, and personality to any space.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Bed</h2>
                                    <p class="item-intro text-muted">"Sturdy foundation for restful sleep."</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>A comfortable and sturdy resting space designed for relaxation and support, offering a cozy retreat for restful sleep and rejuvenation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/close-icon 1.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Single Piece Sofa</h2>
                                    <p class="item-intro text-muted">"Plush comfort with stylish design."</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>A stylish and comfortable seating option designed for relaxation, socializing, and enhancing the aesthetics of any living space.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- TEAM -->
        <section class="page-section " id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <hr class="divider" />
                    <p class="section-subheading text-muted">A great team is more than just individuals—it’s a group of people who share a vision, support each other,and work towards a common goal.<br> With teamwork, dedication, and a passion for excellence, we ensure everything runs as smoothly as possible.</p>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Kripesh Adhikari</h4>
                            <p class="text-muted">Stock Manager</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/kushal.adk.5/" target="_blank" aria-label="Kripesh Adhikari Instagram Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/kripesh.adhikari.5" aria-label="Kripesh Adhikari Facebook Profile" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/nimesh1.jpg" alt="..." />
                            <h4>Nimesh Babu Thapa</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/nimesh_thapa_21/" target="_blank" aria-label="Nimesh Babu Thapa Instagram Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/nimesh.thapa.1221/" target="_blank" aria-label="Nimesh Babu Thapa Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Kritisha Shrestha</h4>
                            <p class="text-muted">Inventory Head</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/kritisha_shrestha/" target="_blank" aria-label="Kritisha Shrestha Instagram Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/kritisha.shrestha.792" target="_blank" aria-label="Kritisha Shrestha Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Pratibha Sharma</h4>
                            <p class="text-muted">Purchase Lead</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/prativaa_s/" target="_blank" aria-label="Pratibha Sharma Instagram Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/prativa.poudel.940" target="_blank" aria-label="Pratibha Sharma Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">"Committed to creating furniture that enhances every space, our team focuses on innovative designs, sustainable materials, and exceptional craftsmanship. Every piece is made with care to provide comfort and elegance.".</p></div>
                </div>
            </div>
        </section>







        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 INVENTRIX | All Rights Reserved</div></div>
        </footer>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
