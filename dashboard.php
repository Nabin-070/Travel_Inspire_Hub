<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TravelEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Custom styles for dashboard */
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            transition: all 0.3s;
            position: fixed;
            z-index: 1000;
        }
        
        #sidebar.active {
            margin-left: -250px;
        }
        
        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
            margin-left: 250px;
        }
        
        #content.active {
            margin-left: 0;
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: #343a40;
            color: white;
        }
        
        .sidebar-header h3 {
            margin-bottom: 0;
        }
        
        .list-unstyled {
            padding: 20px 0;
        }
        
        .list-unstyled li a {
            padding: 10px 20px;
            display: block;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .list-unstyled li a:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .list-unstyled li.active a {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #content {
                margin-left: 0;
            }
            
            #content.active {
                margin-left: 250px;
            }
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .border-left-primary {
            border-left: 0.25rem solid #4e73df;
        }
        
        .border-left-success {
            border-left: 0.25rem solid #1cc88a;
        }
        
        .border-left-info {
            border-left: 0.25rem solid #36b9cc;
        }
        
        .border-left-warning {
            border-left: 0.25rem solid #f6c23e;
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark">
            <div class="sidebar-header">
                <h3>TravelEase</h3>
                <p>Welcome, <span id="userName">John Doe</span></p>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="dashboard.html"><i class="fas fa-home me-2"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#profileSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li><a href="#"><i class="fas fa-edit me-2"></i>Edit Profile</a></li>
                        <li><a href="#"><i class="fas fa-lock me-2"></i>Change Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-plane me-2"></i>Bookings</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-heart me-2"></i>Wishlist</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog me-2"></i>Settings</a>
                </li>
                <li>
                    <a href="#" id="logoutBtn"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <i class="fas fa-bell"></i>
                                <span class="badge bg-danger">3</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">New booking confirmed</a></li>
                                <li><a class="dropdown-item" href="#">Payment received</a></li>
                                <li><a class="dropdown-item" href="#">Special offer for you</a></li>
                            </ul>
                        </div>
                        <div class="dropdown ms-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i>
                                <span>John Doe</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" id="logoutBtn2">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2>Dashboard</h2>
                        <p>Welcome back! Here's what's happening with your travel plans.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Upcoming Trips</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Saved Destinations</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-heart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Travel Points</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1,250</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-star fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Pending Requests</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Upcoming Trips</h6>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Destination</th>
                                                <th>Dates</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bali, Indonesia</td>
                                                <td>June 15-25, 2025</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                            </tr>
                                            <tr>
                                                <td>Paris, France</td>
                                                <td>August 5-12, 2025</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tokyo, Japan</td>
                                                <td>December 10-20, 2025</td>
                                                <td><span class="badge bg-info">Processing</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">Details</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Recommended Destinations</h6>
                            </div>
                            <div class="card-body">
                                <div class="recommendation-item mb-3">
                                    <img src="images/recommendation-1.jpg" alt="Santorini" class="img-fluid rounded mb-2">
                                    <h6>Santorini, Greece</h6>
                                    <p class="small text-muted">Perfect romantic getaway with stunning views</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Explore</a>
                                </div>
                                <div class="recommendation-item">
                                    <img src="images/recommendation-2.jpg" alt="Kyoto" class="img-fluid rounded mb-2">
                                    <h6>Kyoto, Japan</h6>
                                    <p class="small text-muted">Experience traditional Japanese culture</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });

        // Logout functionality
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault();
            // Add logout logic here
            window.location.href = 'login.html';
        });
        
        document.getElementById('logoutBtn2').addEventListener('click', function(e) {
            e.preventDefault();
            // Add logout logic here
            window.location.href = 'login.html';
        });

        // Fetch user data from session
        document.addEventListener('DOMContentLoaded', function() {
            // In a real app, you would fetch this from your backend
            // For demo purposes, we'll use localStorage
            const userName = localStorage.getItem('userName') || 'John Doe';
            document.getElementById('userName').textContent = userName;
            document.querySelector('#userDropdown span').textContent = userName;
        });
    </script>
</body>
</html>