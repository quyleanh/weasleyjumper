<?php
include 'common.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $lang['PAGE_TITLE']; ?></title>
        <link rel="stylesheet" href="styles/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url"                content="https://hogwarts.vn/weasleyjumper" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="WeasleyJumper - Hogwarts.vn" />
        <meta property="og:description"        content="Christmas 2017 - Nhận áo len Weasley của bạn!" />
        <meta property="og:image"              content="https://i.imgur.com/W0BoIav.jpg" />


        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="bootstrap-maxlength.min.js"></script>
        <script src="highlight.pack.js"></script>
        <style>
            body {
                width: 100%;
                height:90%;
            }
            .centerBlock {
                display: table;
                margin: auto;
            }
        </style>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                $('#xmasForm').change(function () {
                    skin_value = $("input[name='optionsSkins']:checked").val();
                    face_value = $("input[name='optionsFaces']:checked").val();
                    //hair_value = $("#optionsHairs option:selected").text();
                    var hair_e = document.getElementById("optionsHairs");
                    hair_value = hair_e.options[hair_e.selectedIndex].value;

                    //color_value = $("#optionsHairColors option:selected").text();
                    var color_e = document.getElementById("optionsHairColors");
                    color_value = color_e.options[color_e.selectedIndex].value;

                    var bg_e = document.getElementById("optionsBgs");
                    bg_value = bg_e.options[bg_e.selectedIndex].value;

                    scarf_value = $("input[name='optionsScarfs']:checked").val();
                    letter_value = $("#optionsLetters option:selected").text();
                    //glass_value = $("input[name='optionsGlass']:checked").val();
                      // alert(letter_value);

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            // alert(this.responseText);
                            document.getElementById("preview-image").src = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "function.php?optionsBgs=" + bg_value + "&optionsSkins=" + skin_value + 
                            "&optionsFaces=" + face_value + "&optionsHairs=" + hair_value +
                            "&optionsHairColors=" + color_value + "&scarf=" + scarf_value +
                            "&letter=" + letter_value + "&download=no", true);
                    xmlhttp.send();

                    /*$.ajax({
                     url: 'image-xmas.php',
                     type: 'POST',
                     dataType: 'json',
                     'success': function (response) {
                     if (response.status == 'success') {
                     lastInput = rdio.val();
                     } else {
                     $('input[name="radio_group"][value="' + lastInput + '"]').prop('checked', true);
                     }
                     },
                     });*/
                });
                $('#chooseJumper').change(function () {
                    alert('"Má không nghĩ màu này hợp với con. Để má chọn cho", Molly nói.');           
                });
            });

            function downloadImage() {
                skin_value = $("input[name='optionsSkins']:checked").val();
                face_value = $("input[name='optionsFaces']:checked").val();
                //hair_value = $("#optionsHairs option:selected").text();
                var hair_e = document.getElementById("optionsHairs");
                hair_value = hair_e.options[hair_e.selectedIndex].value;

                //color_value = $("#optionsHairColors option:selected").text();
                var color_e = document.getElementById("optionsHairColors");
                color_value = color_e.options[color_e.selectedIndex].value;

                var bg_e = document.getElementById("optionsBgs");
                bg_value = bg_e.options[bg_e.selectedIndex].value;

                scarf_value = $("input[name='optionsScarfs']:checked").val();
                letter_value = $("#optionsLetters option:selected").text();
                //glass_value = $("input[name='optionsGlass']:checked").val();
                // alert(letter_value);

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // alert(this.responseText);
                        document.getElementById("pre-download-image").href = this.responseText;
                        var d = new Date();
                        var month = d.getMonth() + 1;
                        var fileName = d.getFullYear() + "" + month + "" + d.getDate() + "" + d.getTime() + ".jpg";
                        var a = document.getElementById("pre-download-image");
                        a.download = fileName;
                        a.click();

                    }
                };

                xmlhttp.open("GET", "function.php?optionsBgs=" + bg_value + "&optionsSkins=" + skin_value +
                        "&optionsFaces=" + face_value + "&optionsHairs=" + hair_value +
                        "&optionsHairColors=" + color_value + "&scarf=" + scarf_value +
                        "&letter=" + letter_value + "&download=yes", true);
                xmlhttp.send();



                // var urlImage = document.getElementById("pre-download-image").src;
                //        var d = new Date();
                //        var month = d.getMonth() + 1;
                //        var fileName = d.getFullYear() + "" + month + "" + d.getDate() + "" + d.getTime() + ".jpg";
                //var a = document.createElement('a');
             //   a.href = urlImage;
               // a.download = fileName;
              //  document.body.appendChild(a);
              //  a.click();
               // document.body.removeChild(a);
           }

        </script>
    </head>
    <body>
        <?php
        $text = "What are you doing?";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = test_input($_POST["yourowl"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div style="width: 90%; margin: auto;" class="container-fluid">
            <div class="bg-3 text-center">
                <h3><b><?php echo $lang['HEADER_TITLE_H3_TOP']; ?></b></h3></br>
                <img src="images/logo.png" class="img-circle" width="30%" height="30%" alt="Bird"></br></br>
                <h3>#WeasleyJumper #XmasHogwartsVietnam</h3>
            </div>

            <div style=" margin-top: 50px; margin-left: auto;margin-right: auto;" class="container-fluid">
                <div class="row ajax-call" id="xmasForm" action="function.php" method="get" role="form">

                    <!-- Column Face and Skin -->
                    <div class="col-sm-6" style="width: 90%;">
                        <div class="row">
                            <div class="col-sm form-group center-block">
                                
                                <div class="form-group centerBlock text-left">
                                    <!-- Choose Skin -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_SKIN']; ?></label>
                                    <div class="">
                                        <label>
                                            <input type="radio" name="optionsSkins" id="optionsRadios1" value="option1" checked>
                                            <?php echo $lang['LB_CHOOSE_SKIN_S1']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsSkins" id="optionsRadios2" value="option2">
                                            <?php echo $lang['LB_CHOOSE_SKIN_S2']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsSkins" id="optionsRadios3" value="option3">
                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                        </label><br><br>
                                    </div>

                                    <!-- Choose Face -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_FACE']; ?></label>
                                    <div class="">
                                        <label>
                                            <input type="radio" name="optionsFaces" id="optionsRadios1" value="option1" checked>
                                            <?php echo $lang['LB_CHOOSE_FACE_F1']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsFaces" id="optionsRadios2" value="option2">
                                            <?php echo $lang['LB_CHOOSE_FACE_F2']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsFaces" id="optionsRadios3" value="option3">
                                            <?php echo $lang['LB_CHOOSE_FACE_F3']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsFaces" id="optionsRadios4" value="option4">
                                            <?php echo $lang['LB_CHOOSE_FACE_F4']; ?>
                                        </label><br>    
                                        <label>
                                            <input type="radio" name="optionsFaces" id="optionsRadios5" value="option5">
                                            <?php echo $lang['LB_CHOOSE_FACE_F5']; ?>
                                        </label><br><br>
                                    </div>

                                    <!-- Choose Hair -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_HAIR']; ?></label>
                                    <div class="">
                                        <select id="optionsHairs" name="optionsHairs">
                                            
                                            <option id="optionsRadios1" value="option1"><?php echo $lang['LB_CHOOSE_HAIR_H01']; ?></option>  
                                            <option id="optionsRadios2" value="option2"><?php echo $lang['LB_CHOOSE_HAIR_H02']; ?></option> 
                                            <option id="optionsRadios3" value="option3"><?php echo $lang['LB_CHOOSE_HAIR_H03']; ?></option>  
                                            <option id="optionsRadios4" value="option4"><?php echo $lang['LB_CHOOSE_HAIR_H04']; ?></option>  
                                            <option id="optionsRadios5" value="option5"><?php echo $lang['LB_CHOOSE_HAIR_H05']; ?></option>  
                                            <option id="optionsRadios6" value="option6"><?php echo $lang['LB_CHOOSE_HAIR_H06']; ?></option>  
                                            <option id="optionsRadios7" value="option7"><?php echo $lang['LB_CHOOSE_HAIR_H07']; ?></option> 
                                            <option id="optionsRadios8" value="option8"><?php echo $lang['LB_CHOOSE_HAIR_H08']; ?></option>  
                                            <option id="optionsRadios9" value="option9"><?php echo $lang['LB_CHOOSE_HAIR_H09']; ?></option>  
                                            <option id="optionsRadios10" value="option10"><?php echo $lang['LB_CHOOSE_HAIR_H10']; ?></option> 
                                            <option id="optionsRadios11" value="option11"><?php echo $lang['LB_CHOOSE_HAIR_H11']; ?></option> 
                                            <option id="optionsRadios12" value="option12"><?php echo $lang['LB_CHOOSE_HAIR_H12']; ?></option> 
                                            <option id="optionsRadios13" value="option13"><?php echo $lang['LB_CHOOSE_HAIR_H13']; ?></option> 
                                            <option id="optionsRadios14" value="option14"><?php echo $lang['LB_CHOOSE_HAIR_H14']; ?></option> 
                                            <option id="optionsRadios15" value="option15"><?php echo $lang['LB_CHOOSE_HAIR_H15']; ?></option> 
                                            
                                        </select>
                                        <br><br><br>
                                    </div>

                                    <!-- Choose Hair Color -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_HAIR_COLOR']; ?></label>
                                    <div class="">
                                        <select id="optionsHairColors" name="optionsHairColors">
                                            
                                            <option id="optionsRadios1" value="option1"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_1']; ?></option> 
                                            <option id="optionsRadios2" value="option2"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_2']; ?></option> 
                                            <option id="optionsRadios3" value="option3"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_3']; ?></option> 
                                            <option id="optionsRadios4" value="option4"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_4']; ?></option> 
                                            <option id="optionsRadios5" value="option5"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_5']; ?></option> 
                                            <option id="optionsRadios6" value="option6"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_6']; ?></option> 
                                            <option id="optionsRadios7" value="option7"><?php echo $lang['LB_CHOOSE_HAIR_COLOR_7']; ?></option> 
                                            
                                        </select>
                                        <br><br>    
                                    </div>

                                    <div class="w-100"></div>
                                </div>
                            </div>

                            <!-- Column 2 -->
                            <div class="col-sm form-group center-block text-center">
                                
                                <div class="form-group centerBlock text-left">
                                    <!-- Choose Scraf -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_SCARF']; ?></label>
                                    <div class="">
                                        <label>
                                            <input type="radio" name="optionsScarfs" id="optionsRadios1" value="option1" checked>
                                            Slytherin
                                            <?php //echo $lang['BG_1']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsScarfs" id="optionsRadios2" value="option2">
                                             Gryffindor
                                            <?php //echo $lang['BG_5']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsScarfs" id="optionsRadios3" value="option3">
                                             Hufflepuff
                                            <?php //echo $lang['BG_5']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsScarfs" id="optionsRadios4" value="option4">
                                             Ravenclaw
                                            <?php //echo $lang['BG_5']; ?>
                                        </label><br><br>
                                    </div>

                                    <!-- Choose Jumper -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_JUMPER']; ?></label>
                                    <div class=""  id="chooseJumper">
                                        <label>
                                            <input type="radio" name="optionsJumpers" id="optionsRadios1" value="option1" checked>
                                            <?php echo $lang['LB_CHOOSE_JUMPER_C1']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsJumpers" id="optionsRadios2" value="option2">
                                            <?php echo $lang['LB_CHOOSE_JUMPER_C2']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsJumpers" id="optionsRadios3" value="option3">
                                            <?php echo $lang['LB_CHOOSE_JUMPER_C3']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsJumpers" id="optionsRadios4" value="option4">
                                            <?php echo $lang['LB_CHOOSE_JUMPER_C4']; ?>
                                        </label><br>
                                        <label>
                                            <input type="radio" name="optionsJumpers" id="optionsRadios5" value="option5">
                                            <?php echo $lang['LB_CHOOSE_JUMPER_C5']; ?>
                                        </label><br><br>
                                    </div>


                                    <!-- Choose Letter -->
                                    <label for="name" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_NAME']; ?></label>
                                    <div class="">
                                        <select id="optionsLetters" name="optionsLetters">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                            <option>F</option>
                                            <option>G</option>
                                            <option>H</option>
                                            <option>I</option>
                                            <option>J</option>
                                            <option>K</option>
                                            <option>L</option>
                                            <option>M</option>
                                            <option>N</option>
                                            <option>O</option>
                                            <option>P</option>
                                            <option>Q</option>
                                            <option>R</option>
                                            <option>S</option>
                                            <option>T</option>
                                            <option>U</option>
                                            <option>V</option>
                                            <option>W</option>
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                        <br><br>
                                    </div>


                                    <!-- Choose background -->
                                    <label for="bg" class="font-weight-bold control-label"><?php echo $lang['LB_CHOOSE_BACKGROUND']; ?></label>
                                    <div class="">
                                        <select id="optionsBgs" name="optionsBgs">
                                            <option id="optionsRadios1" value="option1"><?php echo $lang['BG_1']; ?></option>
                                            <option id="optionsRadios2" value="option2"><?php echo $lang['BG_2']; ?></option>
                                            <option id="optionsRadios3" value="option3"><?php echo $lang['BG_3']; ?></option>
                                            <option id="optionsRadios4" value="option4"><?php echo $lang['BG_4']; ?></option>
                                            <option id="optionsRadios5" value="option5"><?php echo $lang['BG_5']; ?></option>
                                        </select>
                                    </div> 

                                    <div class="w-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image and download button -->
                    <div class="col-sm-6" align="center" style="margin: auto;">
                        <div class="form-group">
                            <img id="preview-image" src="images/default.jpg" class="row" width="80%" height="80%">
                            </br></br>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-outline-primary" id="btn-download" name="btnDownload" onclick="downloadImage()" type="button" value="<?php echo $lang['BUTTON_CREATE_XMAS']; ?>" class="btn btn-default">
                        </div>
                    </div>
                    <!--  <img style="display: none" src="" class="row" width="80%" height="80%" download="myImage"/>-->
                    <a href="images/default.jpg" id = "pre-download-image" style="display: none" src="" class="row" width="80%" height="80%" download="myImage"/>
                </div>
            </div>
        </div>
    </body>
</html>
