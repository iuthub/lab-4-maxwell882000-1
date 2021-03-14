<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="viewer.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">
        <?php
        if (isset($_REQUEST ["playlist"])) {
            $query = $_REQUEST ["playlist"];
            $path = 'songs/' . $query;

            $file = file_get_contents($path,true);
            echo $file;
            $content = explode(" " ,$file);
            foreach ($content as $filename) {
                $url = 'songs/' . $filename;
                echo "<li class='mp3item'> <a href= '$url'>$filename  </a> </li>";
            }
        }
         else {
             foreach (glob("songs/*.mp3") as $filename) {
                 $name = basename($filename);
                 echo $filename;
                 $size = filesize($filename . "");
                 echo "<li class='mp3item'> <a href= '$filename'>$name  b($size)</a> </li>";
             }
             foreach (glob("songs/*.txt") as $filename) {
                 $name = basename($filename);
                 $size = filesize($filename . "");
                 echo "<li class='mp3item'> <a href= '$filename'>$name  b($size)</a> </li>";
             }
         }

        ?>
    </ul>
</div>
</body>
</html>
