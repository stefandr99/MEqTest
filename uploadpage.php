<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" type = "text/css" href="css/style_postpage.css" />
    <link rel="stylesheet" type = "text/css" href="css/style_comment.css" />
    <link rel="stylesheet" type = "text/css" href="css/style_global.css" />
    <link rel="stylesheet" type = "text/css" href="css/navbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="nav-container">
        <nav class="navbar">
            <span class="navbar-toggle" id="js-navbar-toggle">
                <i class="fa fa-bars"></i>
            </span>
            <a href="index.html" class="logo">M&Sigma;q</a>
            <ul class="main-nav" id="js-menu">
                <li>
                    <a href="#" class="nav-links">Home</a>
                </li>
                <li>
                    <a href="#" class="nav-links">Problems</a>
                </li>
                <li>
                    <a href="#" class="nav-links">Forum</a>
                </li>
                <li>
                    <a href="#" class="nav-links">Login</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php include 'php/posts/upload_page.php'; ?>
    <script src="js/navbar.js"></script>
    <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    <script src="js/mathjax-reset.js"></script>

</body>