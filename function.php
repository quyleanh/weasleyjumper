<?php

// Get option from user selections
// output is file name, make sure the file name correct
function getOptions($bg = 'option1',
                    $skinOption = 'option2', 
                    $faceOption = 'option1', 
                    $hairOption = 'option1', 
                    $hairColorOption = 'option1', 
                    $scarfOption = 'option1', 
                    $letterOption = 'D') {
    switch ($bg) {
        case 'option1':
            $bg = 'Bg1';
            break;
        case 'option2':
            $bg = 'Bg2';
            break;
        // case 'option3':
        //     $face = 'Bg3';
        //     break;
        // case 'option4':
        //     $face = 'Bg4';
        //     break;
        // case 'option5':
        //     $face = 'Bg5';
        //     break;
        default:
            $face = 'Bg1';
            break;
    }

    switch ($skinOption) {
        case 'option1':
            $skin = 'S1';
            break;
        case 'option2':
            $skin = 'S2';
            break;
        case 'option3':
            $skin = 'S3';
            break;
        default:
            $skin = 'S1';
            break;
    }

    switch ($faceOption) {
        case 'option1':
            $face = 'F1';
            break;
        case 'option2':
            $face = 'F2';
            break;
        case 'option3':
            $face = 'F3';
            break;
        case 'option4':
            $face = 'F4';
            break;
        case 'option5':
            $face = 'F5';
            break;
        default:
            $face = 'F1';
            break;
    }

    switch ($hairOption) {
        case 'option1':
            $hair = 'H01';
            break;
        case 'option2':
            $hair = 'H02';
            break;
        case 'option3':
            $hair = 'H03';
            break;
        case 'option4':
            $hair = 'H04';
            break;
        case 'option5':
            $hair = 'H05';
            break;
        case 'option6':
            $hair = 'H06';
            break;
        case 'option7':
            $hair = 'H07';
            break;
        case 'option8':
            $hair = 'H08';
            break;
        case 'option9':
            $hair = 'H09';
            break;
        case 'option10':
            $hair = 'H10';
            break;
        case 'option11':
            $hair = 'H11';
            break;
        case 'option13':
            $hair = 'H12';
            break;
        case 'option13':
            $hair = 'H13';
            break;
        case 'option14':
            $hair = 'H14';
            break;
        case 'option15':
            $hair = 'H15';
            break;
        default:
            $hair = '1';
            break;
    }

    switch ($hairColorOption) {
        case 'option1':
            $color = 'blonde';
            break;
        case 'option2':
            $color = 'red';
            break;
        case 'option3':
            $color = 'pink';
            break;
        case 'option4':
            $color = 'cyan';
            break;
        case 'option5':
            $color = 'black';
            break;
        case 'option6':
            $color = 'brown';
            break;
        case 'option7':
            $color = 'purple';
            break;
        default:
            $option1 = 'blonde';
            break;
    }

    switch ($scarfOption) {
        case 'option1':
            $scarf = 'Slytherin';
            break;
        case 'option2':
            $scarf = 'Gryffindor';
            break;
        case 'option3':
            $scarf = 'Hufflepuff';
            break;
        case 'option4':
            $scarf = 'Ravenclaw';
            break;
        default:
            $scarf = 'Ravenclaw';
            break;
    }
    $letter = $letterOption;
    return array($bg, $skin, $face, $hair, $color, $scarf, $letter);
}

function save_image($inPath, $outPath) { //Download images from remote server
    $in = fopen($inPath, "rb");
    $out = fopen($outPath, "wb");
    while ($chunk = fread($in, 8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

?>

<?php

$folderName = 'avas';

$isDownload = $_GET["download"];

if (file_exists($folderName)) {
    foreach (new DirectoryIterator($folderName) as $fileInfo) {
        if ($fileInfo->isDot()) {
            continue;
        }
        if ($fileInfo->isFile() && time() - $fileInfo->getCTime() >= 60 * 30) {
            unlink($fileInfo->getRealPath());
        }
    }
} else {
    mkdir($folderName, 0700);
}

list($bg, $skin, $face, $hair, $color, $scarf, $letter) = getOptions($_GET["optionsBgs"], $_GET["optionsSkins"], $_GET["optionsFaces"], $_GET["optionsHairs"], $_GET["optionsHairColors"], $_GET["scarf"], $_GET["letter"]);
$haveGlass = "no";
$shirt = rand(1, 6); //choose random shirt
//define the width and height of our images
if ($isDownload == "no") { //If not downloading, use small image
    define("WIDTH", 500);
    define("HEIGHT", 500);
} else {
    define("WIDTH", 1000);
    define("HEIGHT", 1000);
}
$dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

//make sure the transparency information is saved
imagesavealpha($dest_image, true);

//create a fully transparent background (127 means fully transparent)
$trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);

//fill the image with a transparent background
imagefill($dest_image, 0, 0, $trans_background);

//take create image resources out of the 3 pngs we want to merge into destination image
if ($isDownload == "no") {
    $bgPath = 'images/background-min/' . $bg . '.jpg';
    $skinPath = 'images/skin-min/' . $skin . '.png';
    $letterPath = 'images/letter-min/' . $letter . '.png';
    $facePath = 'images/face-min/' . $face . '.png';
    $hairPath = 'images/hair-min/' . $hair . '.png';
    $shirtPath = 'images/shirt-min/' . $shirt . '.png';
    $scarfPath = 'images/scarf-min/' . $scarf . '.png';
} else {
    $bgPath = 'images/background/' . $bg . '.jpg';
    $skinPath = 'images/skin/' . $skin . '.png';
    $letterPath = 'images/letter/' . $letter . '.png';
    $facePath = 'images/face/' . $face . '.png';
    $hairPath = 'images/hair/' . $hair . '.png';
    $shirtPath = 'images/shirt/' . $shirt . '.png';
    $scarfPath = 'images/scarf/' . $scarf . '.png';
}

switch ($color) {
    case 'blonde':
        $rgb = array(255 - 250, 255 - 246, 255 - 189);
        //   $rgb = array(250, 246, 189);
        break;
    case 'red':
        $rgb = array(255 - 228, 255 - 77, 255 - 46);
        // $rgb = array(228, 77, 46);
        break;
    case 'pink':
        $rgb = array(255 - 211, 255 - 3, 255 - 111);
        // $rgb = array(212, 71,153);
        break;
    case 'cyan':
        $rgb = array(255 - 101, 255 - 199, 255 - 198);
        // $rgb = array(101, 199,198);
        break;
    case 'black':
        $rgb = array(255 - 30, 255 - 30, 255 - 30);
        break;
     case 'brown':
        $rgb = array(255 - 119, 255 - 59, 255 - 50);
        break;
     case 'purple':
        $rgb = array(255 - 111, 255 - 43, 255 - 144);
        break;
    default:
        $rgb = array(255 - 250, 255 - 246, 255 - 189);
        break;
}

//create image
$bgImg = imagecreatefromjpeg($bgPath);
$shirtImg = imagecreatefrompng($shirtPath);
$skinImg = imagecreatefrompng($skinPath);
$letterImg = imagecreatefrompng($letterPath);
$faceImg = imagecreatefrompng($facePath);
$scarfImg = imagecreatefrompng($scarfPath);
$hairImg = imagecreatefrompng($hairPath);

//change hair color
//$rgb = array(255-$rgb[0],255-$rgb[1],255-$rgb[2]);
imagefilter($hairImg, IMG_FILTER_NEGATE);
imagefilter($hairImg, IMG_FILTER_COLORIZE, $rgb[0], $rgb[1], $rgb[2]);
imagefilter($hairImg, IMG_FILTER_NEGATE);
imagealphablending($hairImg, false);
imagesavealpha($hairImg, true);

//copy each png file on top of the destination (result) png
imagecopy($dest_image, $bgImg, 0, 0, 0, 0, WIDTH, HEIGHT);
imagecopy($dest_image, $shirtImg, 0, 0, 0, 0, WIDTH, HEIGHT);
imagecopy($dest_image, $skinImg, 0, 0, 0, 0, WIDTH, HEIGHT);
imagecopy($dest_image, $letterImg, 0, 0, 0, 0, WIDTH, HEIGHT);
imagecopy($dest_image, $faceImg, 0, 0, 0, 0, WIDTH, HEIGHT);
imagecopy($dest_image, $scarfImg, 0, 0, 0, 0, WIDTH, HEIGHT);

//Have glass
// if ($haveGlass == "yes") {
//     $glassPath = 'images/glass/glass.png';
//     $glassImg = imagecreatefrompng($glassPath);
//     imagecopy($dest_image, $glassImg, 0, 0, 0, 0, WIDTH, HEIGHT);
// }

imagecopy($dest_image, $hairImg, 0, 0, 0, 0, WIDTH, HEIGHT);

$datetime = new DateTime();
$result = $datetime->format('Y-m-d H:i:s');
$result = str_replace(":", "", $result);
$result = str_replace(" ", "_", $result);

$path = "avas/" . $result . ".png";

//send the appropriate headers and output the image in the browser
header('Content-Type: image/png');

imagepng($dest_image, $path);
//imagedestroy($im);
//destroy all the image resources to free up memory
imagedestroy($bgImg);
imagedestroy($skinImg);
imagedestroy($faceImg);
imagedestroy($hairImg);
imagedestroy($shirtImg);
imagedestroy($scarfImg);
imagedestroy($dest_image);

//      $image = new PHPImage();
//     $image->draw($path);
//    $image->save($path, false, true);

echo $path;
?>
