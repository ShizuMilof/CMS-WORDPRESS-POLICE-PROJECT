<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <?php wp_head(); ?>
    <style>
        body {
            
        }

        footer {
         
            bottom: 0;
            width: 100%;
            
            padding: 15px 0; /* Adjust padding as needed */
            color: #343a40; /* Set your desired text color */
        }

        .container {
            max-width: 1200px; /* Set your desired max-width */
            left-margin:300px;
            margin: 0 auto; /* Center the container */
        }

        .footer-content {
            text-align: center;
        }

        .btn-group.social-buttons {
            margin-top: 10px; /* Adjust margin as needed */
        }

   
    </style>
</head>
<body>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-9 col-xs-12 text-center">
                <div class="footer-content">
                    <div class="footer-head">
                        <h3>POVEŽITE SE S NAMA</h3>
                        <?php dynamic_sidebar('footer-sidebar4'); ?>
                        
                        <div class="btn-group social-buttons" role="group">
                            <a href="https://www.instagram.com/policijahrvatske/" target="_blank" class="btn btn-instagram"><i class="fab fa-instagram"></i> Instagram</a>
                            <a href="https://www.facebook.com/profile.php?id=100066907401713" target="_blank" class="btn btn-facebook"><i class="fab fa-facebook"></i> Facebook</a>
                            <a href="https://mup.gov.hr/" target="_blank" class="btn btn-police"><i class="fas fa-globe"></i> Web</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright text-muted">© Martin Čikor <?php echo date('Y'); ?>. Sva prava zadržana.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
