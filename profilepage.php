<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEq</title>
  <link rel="stylesheet" type = "text/css" href="css/style_global.css">
  <link rel="stylesheet" type = "text/css" href="css/navbar.css">
</head>
<body>
  <?php
    include "navbar.php"; ?>
    <div class = "profile-back">
        <div class = "profile-box">
            <?php
                include "./php/profile/profile.php";
            ?>
        </div>
    </div>
<script src="js/navbar.js"></script>
</body>
</html>
