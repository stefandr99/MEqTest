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
            <a href="#" class="logo">M&Sigma;q</a>
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

    <div class="content">
        <div class="title-main">Pythagorean Theorem</div>
        <hr class="section-divider-bar">
        <p>
            The Pythagorean theorem, also known as Pythagoras' theorem, is a fundamental relation in Euclidean geometry among the three sides of a right triangle. It states that the area of the square whose side is the hypotenuse (the side opposite the right angle) is equal to the sum of the areas of the squares on the other two sides. 
            <br><br>
            This theorem can be written as an equation relating the lengths of the sides a, b and c, often called the "Pythagorean equation":
        </p>
        <div class="formula">
            $$ a^2 + b^2 = c^2 $$
        </div>
        <p style="font-weight: bold;">Proof using similar triangles</p>
        <p>This proof is based on the proportionality of the sides of two similar triangles, that is, upon the fact that the ratio of any two corresponding sides of similar triangles is the same regardless of the size of the triangles.</p>
        
        <div class="theory">
            <div class="figura"> 
                <img src="css/resource/images/triangle.png" alt="">
            </div>  
                
            <div class="formula">
                $$ \frac{BC}{AB} = \frac{BH}{BC} \ and \ \frac{AC}{AB} = \frac{AH}{AC} $$
            </div>
            <div class="formula">
                $$ BC^2 = AB \times BH \ and \ AC^2 = AB \times AH. $$
            </div>
            <div class="formula">
                $$ BC^2 + AC^2 = AB \times BH + AB \times AH = AB \times (AH + BH) = AB^2, $$
            </div>
            <div class="formula">
                $$ BC^2 + AC^2 = AC^2 $$
            </div>
        </div>
        
        <p style="text-align: center; font-size: 30px; margin-top: 2%;">Think you got it? Then try solving the problems! </p>
        <div style="text-align: center; align-content: center;">
            <button class="button-regular" type="button" onclick="window.open('quiz.php?id=1');">Practice</button>
        </div>
        <p id="comment-title">Comments</p>
        <hr class="section-divider-bar">
        
        <div class="comment-wrapper">
            <?php include 'php/comments/comments.php'; ?>
			
            <p>Post comment:</p>
            <div class="container-boxwrapper">
                <div class="comment-boxwrapper">
                    <form  method="POST" action="postpage.php">
                    <div class="comment-boxwrapper">
                        <textarea class="textinput" placeholder="Comment" name="comment"></textarea>
                    </div>
                    <div style="text-align: center; align-content: center;">
                        <input name="actiune" class="button-regular" type="submit" value="Post Comment" />
                    </div> 
                    </form>
                </div>
            </div>
        
        </div>
        
    </div>
    <script src="js/navbar.js"></script>
    <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    

</body>