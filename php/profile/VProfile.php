<?php
class VProfile {

    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function viewProfile() {
        if($this->user->rowcount() === 0) {
            echo 'Error 404 user not found';
        } else {
            $row = $this->user->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class = "profile-photo">
                <p>
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="prepareDiv();">
                    <input type="image" src="<?php echo $row['IMAGE_PATH'] ?>" alt="img" class="profile-photo" id="uploadPhoto" name="uploadPhoto" >
                    <!-- <input type="hidden" id="uploadPhoto" name="uploadPhoto"/> -->
                    <input class="profile-choose-button" name="image" id="image" type="file" accept="image/*" multiple="multiple" onchange='loadFile(event); showFiles();' />
                    <input name="subButton" id="subButton" class="profile-upload-button" type="submit" value="Upload photo" />
                </form>
                </p>
            </div>
            <div class = "profile-stats">
                <?php echo "Points: ".$row['SCORE'] ?>

                <br>

                <div id="profile-stats2">
                    <?php echo "Publications: " . $row['DOC'];
                    ?>
                </div>
            </div>
            <div class = "profile-name">
                <?php echo $row['USERNAME'] ?>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" onsubmit="prepareDiv();">
                <input name="deleteAcc" id="deleteAcc" class="delete-button" type="submit" value="Delete account" />
            </form>


            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('uploadPhoto');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src);
                    }
                };
            </script>
            <script>
                function prepareDiv() {
                    document.getElementById("subButton").value = document.getElementById("uploadPhoto").value;

                }

                function showFiles() {
                    var div = document.getElementById('uploadPhoto');
                    var fi = document.getElementById('image');

                    if (fi.files.length > 0) {
                        for (var i = 0; i <= fi.files.length - 1; i++) {

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var img = new Image();
                                img.src = e.target.result;

                                div.value = img.src;
                            };
                            reader.readAsDataURL(fi.files.item(i));
                        }
                    }
                }
            </script>



            <?php
        }
    }
}
?>