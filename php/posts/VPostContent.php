<?php
    class VPostContent{

        private $query;
        private $id;
        private $title_err;
        private $content_err;

        public function __construct($query, $id) {
            $this->query = $query;
            $this->id = $id; 
        }

        public function viewPostContent(){
            if($this->query->rowcount() === 0){ //when this if is triggered it means the page doesn't exist
                echo '<div class="title-main">Page not found</div><hr class="section-divider-bar">';
                BD::opreste_conexiune();
                exit();
            } else {
                $row = $this->query->fetch(PDO::FETCH_ASSOC);
                
                echo '<div class="title-main">' . $row['NAME'] . '</div><hr class="section-divider-bar">';
                echo $row['CONTENT'];
                echo '<p style="text-align: center; font-size: 30px; margin-top: 2%;">Think you got it? Then try solving the problems! </p>
                <div style="text-align: center; align-content: center;">
                    <button class="button-regular" type="button" onclick="window.open(\'quiz.php?id=' . $this->id . '\');">Practice</button>
                </div>';
            }
        }

        public function viewUploadPage() { ?>

            <div class="title-main">Create a theory page</div><hr class="section-divider-bar">
            <form action = "" method = "POST" enctype = "multipart/form-data" onsubmit="prepareDiv()" id="uploadPage">
            <div class="upload-title">
            <label for="docTitle">Title:</label>
            <input class="upload-title" type="text" id="docTitle" name="docTitle" placeholder = "Page title" required="required"><br>

            <label for="docContent">Content:</label><br>
            </div>
            <div style="text-align: center; align-content: center;">
            
            <input class ="fa fa-bold" name="bold" value="&#xf032" type = "button" onclick = "execCmd('bold')"><i ></i>
            <input class="fa fa-italic" name="italic" type = "button" value = "&#xf033" onclick = "execCmd('italic')">
            <input class="fa fa-underline" name="underline" type = "button" value = "&#xf0cd" onclick = "execCmd('underline')">
            <input class="fa fa-align-left" name="justifyLeft" type = "button" value = "&#xf036" onclick = "execCmd('justifyLeft')">
            <input class="fa fa-align-center" name="justifyCenter" type = "button" value = "&#xf037" onclick = "execCmd('justifyCenter')">
            <input class="fa fa-align-right" name="justifyRight" type = "button" value = "&#xf038" onclick = "execCmd('justifyRight')">
            <input class="fa fa-align-justify" name="justifyFull" type = "button" value = "&#xf039" onclick = "execCmd('justifyFull')">
            <input class="fa fa-cut" name="cut" type = "button" value = "&#xf0c4" onclick = "execCmd('cut')">
            <input class="fa fa-copy" name="copy" type = "button" value = "&#xf0c5" onclick = "execCmd('copy')">
            <input class="fa fa-subscript" name="subscript" type = "button" value = "&#xf12c" onclick = "execCmd('subscript')">
            <input class="fa fa-superscript" name="superscript" type = "button" value = "&#xf12b" onclick = "execCmd('superscript')">
            <input class="fa fa-undo" name="undo" type = "button" value = "&#xf0e2" onclick = "execCmd('undo')">
            <input class="fa fa-redo" name="redo" type = "button" value = "&#xf01e" onclick = "execCmd('redo')">
            <input class="fa fa-list-ul" name="insertUnorderedList" type = "button" value = "&#xf0ca" onclick = "execCmd('insertUnorderedList')">
            <input class="fa fa-list-ol" name="insertOrderedList" type = "button" value = "&#xf0cb" onclick = "execCmd('insertOrderedList')">
            <input class="fa fa-paragraph" name="insertParagraph" type = "button" value = "&#xf1dd" onclick = "execCmd('insertParagraph')">
            <input class="fa fa-bold" name="insertHorizontalRule" type = "button" value = "HR" onclick = "execCmd('insertHorizontalRule')">
            <br>
            <select onclick = "execCmdWithArgument('formatBlock', this.value)">
                <option value="H1">H1</option>
                <option value="H2">H2</option>
                <option value="H3">H3</option>
                <option value="H4">H4</option>
                <option value="H5">H5</option>
                <option value="H6">H6</option>
            </select>
            
            <select onclick = "execCmdWithArgument('fontName', this.value)">
                <option value="Arial">Arial</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Courier">Courier</option>
                <option value="Georgia">Georgia</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
            </select>
            <select onclick = "execCmdWithArgument('fontSize', this.value)">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            Color: <input type="color" onchange="execCmdWithArgument('foreColor', this.value);">
            Background: <input type="color" onchange="execCmdWithArgument('hiliteColor', this.value);">

            </div>
            <p>
            <div contenteditable class="upload-content" name = "docContent" id="docContent" style="border:solid 1px #999; padding:10px;"></div>
            <input type="hidden" id="docContent_hidden" name="docContent" required="required"/>

            <div style="font-size: 20px; text-align: center; align-content: center;", >
            <label for="docContent">We recommand you to draw the figure <a href="https://www.drawsvg.org/drawsvg.html" target="_blank">here</a> and save it in svg format.</label><br>
            </div>
            <div style="text-align: center; align-content: center;">
                <p>
                <input class="button-regular" name = "docContent[]" type="file" id="image" accept="image/*" multiple="multiple" onchange="showFiles()" />
                </p>
                <input name="upload" id="subButton" class="button-regular" type="submit" value="Upload page" />
                <p>
            </div>
            </div>
        
        </form>
        
        </body>
        <script>
            document.getElementById("subButton").onclick = function() {
                if (document.getElementById("docContent").innerHTML.trim().length == 0) {
                    alert("Please fill content as well.");
                    return false;
                }
            };
        </script>
        <script>
            function showFiles() {
                var div = document.getElementById('docContent');
                var fi = document.getElementById('image');
        
                if (fi.files.length > 0) {
                    for (var i = 0; i <= fi.files.length - 1; i++) {
        
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = new Image();
                            img.src = e.target.result;
                            //img.setAttribute('style', 'clear:both; margin:10px 0;');
        
                            div.appendChild(img);
                        };
                        reader.readAsDataURL(fi.files.item(i));
                    }
                }
            }
            function execCmd(command) {
                document.execCommand(command, false, null);
            }
            function execCmdWithArgument(command, arg) {
                document.execCommand(command, false, arg);
            }
            function prepareDiv() {
                document.getElementById("docContent_hidden").value = document.getElementById("docContent").innerHTML;
            }

        </script>
        
        <?php }

    }

?>