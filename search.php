<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEq - Search</title>
    <link rel="stylesheet" type = "text/css" href="css/style_search.css" />
    <link rel="stylesheet" type = "text/css" href="css/style_global.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "navbar.php" ?>

    <div class="search-container">
        <label for="fname">Search:</label>
        <input type="text" id="searchbar" name="fname" placeholder="Enter a title">
    </div>

    <div id="content">
        <!--<div class="post">
            <div class="post-counters">
                <div>1234 <br><div>upvotes</div></div>
                <div>5678 <br><div>views</div></div>
                <div>323 <br><div>comments</div></div>
            </div>
            <div class="post-desc">
                <a href="postpage.html" class="post-title">Pythagorean Theorem</a>
                <div class="post-shortdesc">This thing is just to preview the html...</div>
                <div class="post-tags">
                    <div class="post-tagstext">Tags:</div>
                    <div class="post-tagwrapper">
                        <button class="buttontag" type="button" onclick="alert('Clicked')">geometry</button>
                        <button class="buttontag" type="button" onclick="alert('Clicked')">theorem</button>
                    </div>
                </div>
                <div class="post-date">Posted on: 20-5-2021</div>
            </div>-->
    </div>
    <script src="js/search/ajaxsearch.js"></script>
</body>