<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Inspire Hub - Personalized Travel Companion</title>
    <link href="index-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('hero-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 250px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease;
        }
        
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease;
        }
        
        .btn-hero {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            animation: fadeIn 1.5s ease;
        }
        
        .btn-hero:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        /* Section Styling */
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 50px;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* About Section */
        .about-img {
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .about-img:hover {
            transform: scale(1.03);
        }
        
        /* Services Section */
        .service-card {
            padding: 30px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }
        
        .service-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        /* Gallery Section */
        .gallery-img {
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .gallery-img:hover {
            transform: scale(1.05);
        }
        
        /* Team Section */
        .team-card {
            border: none;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .team-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin: 0 auto 20px;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
        }
        
        /* Testimonials */
        .testimonial-card {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
            position: relative;
            border-top: 4px solid var(--primary-color);
        }
        
        .testimonial-card:before {
            content: '\201C';
            font-size: 5rem;
            color: rgba(52, 152, 219, 0.1);
            position: absolute;
            top: 10px;
            left: 10px;
        }


/* Packages Section */
.package-img-container {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.package-img-container img {
    transition: transform 0.5s ease;
}

.service-card:hover .package-img-container img {
    transform: scale(1.05);
}

/* Badge styling */
.badge {
    padding: 5px 10px;
    font-weight: 500;
    letter-spacing: 0.5px;
}


.plane-animation {
    position: absolute;
    top: 20%;
    left: -200px; 
    width: 100px;
    animation: flyAcross 20s linear infinite;
    z-index: 2;
}

@keyframes flyAcross {
    0% {
        transform: translateX(0) rotate(5deg);
        opacity: 0.5;
    }
    30% {
        opacity: 1;
    }
    100% {
        transform: translateX(120vw) rotate(10deg);
        opacity: 0.2;
    }
}

        
        /* Contact Section */
        .contact-section {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), url('contact-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
        }
        
        .contact-card {
            background: white;
            color: var(--dark-color);
            padding: 30px;
            border-radius: 10px;
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .contact-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInDown {
            from { 
                opacity: 0;
                transform: translateY(-30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Travel Inspire Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Experts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <div class="d-flex">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="my_bookings.php" class="btn btn-outline-light me-2">My Bookings</a>
                        <a href="logout.php" class="btn btn-outline-light">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                        <a href="register.php" class="btn btn-outline-light">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Explore the World with Travel Inspire Hub</h1>
            <p>Personalized travel companion for unforgettable journeys</p>
            <a href="#packages" class="btn btn-hero">Discover Packages</a>
            
        </div>
        
<img src="plane-removebg-preview.png" alt="Flying Plane" class="plane-animation">
    </section>

    <!-- About Section -->
    <section id="about" class="section bg-light">
        <div class="container">
            
            <h2 class="text-center section-title">About Us</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="about-us.jpg" alt="About TravelEase" class="img-fluid about-img">
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3">Our Story</h3>
                    <p>Founded in 2025, Travel Inspire Hub began with a simple mission: to make travel planning effortless and exciting. What started as a small team of travel enthusiasts has grown into a trusted companion for thousands of travelers worldwide.</p>
                    <p>We believe every journey should be as unique as the traveler. Our expert team works tirelessly to craft personalized experiences that go beyond the ordinary, ensuring your adventures are filled with unforgettable moments.</p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <i class="fas fa-globe-americas me-3 text-primary" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h5 class="mb-1">Global Network</h5>
                                    <p class="mb-0 text-muted">Partners in 50+ countries</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <i class="fas fa-award me-3 text-primary" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h5 class="mb-1">Award Winning</h5>
                                    <p class="mb-0 text-muted">Recognized excellence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="text-center section-title">Our Services</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h4>Flight Bookings</h4>
                        <p>Find the best deals on domestic and international flights with our extensive airline partnerships and flexible booking options.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <h4>Hotel Reservations</h4>
                        <p>From luxury resorts to budget stays, access our global network of accommodations with verified reviews and best price guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h4>Customized Tours</h4>
                        <p>Tailor-made itineraries designed by our travel experts to match your interests, pace, and budget perfectly.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-passport"></i>
                        </div>
                        <h4>Visa Assistance</h4>
                        <p>Comprehensive visa support including documentation, application guidance, and embassy coordination.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Travel Insurance</h4>
                        <p>Peace of mind with customizable insurance plans covering medical, trip cancellation, and baggage protection.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h4>Transportation</h4>
                        <p>Seamless transfers, car rentals, and private drivers to ensure smooth transitions throughout your journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Packages Section -->
<section id="packages" class="section">
    <div class="container">
        <h2 class="text-center section-title">Featured Travel Packages</h2>
        <p class="text-center text-muted mb-5">Discover our handpicked selection of unforgettable journeys</p>
        
        <div class="row">
            <?php
            try {
                // Get 3 featured packages (you can modify this query as needed)
                $stmt = $pdo->query("SELECT * FROM packages LIMIT 3");
                $packageCount = $stmt->rowCount();
                
                if ($packageCount === 0) {
                    echo '<div class="col-12 text-center">
                            <i class="fas fa-globe-americas fa-4x mb-3" style="color: var(--primary-color);"></i>
                            <h3>No Packages Available</h3>
                            <p class="text-muted">We currently don\'t have any packages available. Please check back later.</p>';
                    
                    if (isset($_SESSION['user_id']) && $_SESSION['user_email'] === 'admin@example.com') {
                        echo '<a href="add_package.php" class="btn btn-primary mt-3">Add New Package</a>';
                    }
                    
                    echo '</div>';
                } else {
                    while ($package = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-lg-4 col-md-6 mb-4">
                                <div class="service-card">
                                    <div class="package-img-container" style="height: 200px; overflow: hidden; border-radius: 10px 10px 0 0;">
                                        <img src="' . htmlspecialchars($package['image_url'] ?? 'default-package.jpg') . '" 
                                             class="img-fluid w-100 h-100" 
                                             style="object-fit: cover;" 
                                             alt="' . htmlspecialchars($package['name']) . '">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-primary">' . $package['duration'] . ' days</span>
                                            <span class="h5" style="color: var(--primary-color);">$' . number_format($package['price'], 2) . '</span>
                                        </div>
                                        <h4 class="mb-3">' . htmlspecialchars($package['name']) . '</h4>
                                        <p class="text-muted mb-4">' . htmlspecialchars(substr($package['description'], 0, 100)) . '...</p>
                                        <div class="d-grid">';
                        
                        if (isset($_SESSION['user_id'])) {
                            echo '<a href="book.php?id=' . $package['id'] . '" class="btn btn-primary">Book Now</a>';
                        } else {
                            echo '<a href="login.php" class="btn btn-primary">Login to Book</a>';
                        }
                        
                        echo '</div>
                                    </div>
                                </div>
                            </div>';
                    }

                                
                    // Add "View All Packages" button if there are packages
                    echo '<div class="text-center mt-4">
                            <a href="#packages" class="btn btn-outline-primary">View All Packages</a>
                          </div>';
                }
            } catch (PDOException $e) {
                echo '<div class="col-12 alert alert-danger">Error loading packages: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>
    </div>
</section>







    <!-- Gallery Section -->
    <section id="gallery" class="section bg-light">
        <div class="container">
            <h2 class="text-center section-title">Gallery</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="paris.jpg" alt="Paris" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Paris, France</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="bali.jpg" alt="Bali" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Bali, Indonesia</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="Tokyo.jpg" alt="Tokyo" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Tokyo, Japan</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="New-York.jpg" alt="New York" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">New York, USA</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="Italy.jpeg" alt="Rome" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Rome, Italy</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="canada.jpg" alt="Cape Town" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Ottawa, Ottawa</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="australia.jpg" alt="Sydney" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Sydney, Australia</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="Rio.jpg" alt="Rio" class="img-fluid gallery-img">
                    <h5 class="text-center mt-2">Rio de Janeiro, Brazil</h5>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="#gallery" class="btn btn-primary">View More</a>
            </div>
        </div>
    </section>

    <!-- Travel Experts Section -->
    <section id="team" class="section">
        <div class="container">
            <h2 class="text-center section-title">Meet Our Travel Experts</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <img src="expert1.jpg" alt="Sarah Johnson" class="img-fluid team-img">
                        <h4>Sarah Johnson</h4>
                        <p class="text-muted">European Specialist</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f me-2"></i></a>
                            <a href="#"><i class="fab fa-twitter me-2"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <img src="expert2.jpg" alt="Michael Chen" class="img-fluid team-img">
                        <h4>Michael Chen</h4>
                        <p class="text-muted">Asian Adventures</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f me-2"></i></a>
                            <a href="#"><i class="fab fa-twitter me-2"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <img src="expert3.jpg" alt="Elena Rodriguez" class="img-fluid team-img">
                        <h4>Elena Rodriguez</h4>
                        <p class="text-muted">Luxury Travel</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f me-2"></i></a>
                            <a href="#"><i class="fab fa-twitter me-2"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <img src="expert4.jpg" alt="David Wilson" class="img-fluid team-img">
                        <h4>David Wilson</h4>
                        <p class="text-muted">Adventure Tours</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f me-2"></i></a>
                            <a href="#"><i class="fab fa-twitter me-2"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section bg-light">
        <div class="container">
            <h2 class="text-center section-title">What Our Clients Say</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="mb-4">"Travel Inspire Hub planned our honeymoon to perfection. Every detail was taken care of, and we had the most magical time in Bali. Their recommendations were spot on!"</p>
                        <div class="d-flex align-items-center">
                            <img src="client1.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Sarah & James K.</h6>
                                <small class="text-muted">Honeymoon in Bali</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="mb-4">"The customized European tour was beyond our expectations. The hotels were excellent, and the private guides made each city come alive. Will definitely use them again!"</p>
                        <div class="d-flex align-items-center">
                            <img src="client2.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Robert M.</h6>
                                <small class="text-muted">European Grand Tour</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                        <p class="mb-4">"As a solo female traveler, I felt completely safe and well taken care of during my Japan trip. The itinerary balanced must-see sights with hidden gems perfectly."</p>
                        <div class="d-flex align-items-center">
                            <img src="client3.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Anika P.</h6>
                                <small class="text-muted">Japan Adventure</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="text-center section-title text-white">GET IN TOUCH</h2>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h3 class="mb-4">Ready to Plan Your Journey?</h3>
                    <p class="mb-4">We're here to help you create unforgettable travel experiences. Contact us with questions, trip ideas, or to start planning your next adventure.</p>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h5>Our Office</h5>
                                <p class="mb-0">123 Travel Street<br>New York, NY 10001</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <h5>Call Us</h5>
                                <p class="mb-0">+1 (555) 123-4567<br>Mon-Fri, 9am-6pm EST</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h5>Email Us</h5>
                                <p class="mb-0">info@travelease.com<br>responses within 24 hours</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Emergency assistance<br>for traveling clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="contact-card">
                        <h4 class="mb-4">Send Us a Message</h4>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" required>
                                    <option value="" disabled selected>Select Service</option>
                                    <option>Flight Booking</option>
                                    <option>Hotel Reservation</option>
                                    <option>Custom Tour</option>
                                    <option>Visa Assistance</option>
                                    <option>Other Inquiry</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Travel Inspire Hub</h5>
                    <p>Making travel planning effortless and exciting since 2010. Your trusted companion for unforgettable journeys around the world.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#home" class="text-white">Home</a></li>
                        <li class="mb-2"><a href="#about" class="text-white">About</a></li>
                        <li class="mb-2"><a href="#services" class="text-white">Services</a></li>
                        <li class="mb-2"><a href="#gallery" class="text-white">Gallery</a></li>
                        <li class="mb-2"><a href="#packages" class="text-white">Packages</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Travel Street, New York, NY</li>
                        <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +1 (555) 123-4567</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@travelease.com</li>
                        <li class="mb-2"><i class="fas fa-clock me-2"></i> Mon-Fri: 9am-6pm EST</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Newsletter</h5>
                    <p>Subscribe for travel tips and exclusive deals</p>
                    <form class="mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                    <small class="text-muted">We never share your email with others</small>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 Travel Inspire Hub. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white me-3">Terms of Service</a>
                    <a href="#" class="text-white">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Animation for elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.service-card, .team-card, .testimonial-card');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if(elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        // Set initial state
        document.querySelectorAll('.service-card, .team-card, .testimonial-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
        });
        
        // Run on load and scroll
        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>
</html>