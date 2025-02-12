<?php 
if (!isset($_GET["feed"])) {
    echo "Parametar Feed nije prosleđen";
} else {
    $feed = $_GET["feed"];

    switch ($feed) {
        case "B92":
            $xmlUrl = "http://www.b92.net/info/rss/sport.xml";
            break;
        case "RTS":
            $xmlUrl = "http://www.rts.rs/page/stories/sr/rss.html";
            break;
        default:
            echo "Nepostojeći feed!";
            die();
    }

    $xmlDoc = new DOMDocument();
    
    // Učitaj RSS feed sa URL-a
    if (!@$xmlDoc->load($xmlUrl)) {
        echo "Neuspešno učitavanje RSS feed-a.";
        die();
    }

    $x = $xmlDoc->getElementsByTagName('item');
    
    for ($i = 0; $i < min(3, $x->length); $i++) {
        $item = $x->item($i);
        
        if ($item) {
            $item_title = $item->getElementsByTagName('title')->item(0)->nodeValue ?? "Bez naslova";
            $item_link = $item->getElementsByTagName('link')->item(0)->nodeValue ?? "#";
            $item_desc = $item->getElementsByTagName('description')->item(0)->nodeValue ?? "Bez opisa";

            echo "<p><a href='$item_link'>$item_title</a><br>$item_desc</p>";
        }
    }
}
?>