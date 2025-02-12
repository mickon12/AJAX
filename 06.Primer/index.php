<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#kombo_feed").change(function(){
                var vrednost = $("#kombo_feed").val();
                $.get("getrss.php", {feed: vrednost}, function(data){
                    $("#rssOutput").html(data);
                });
            });
        });
    </script>
</head>
<body>
    <form> 
        Odaberi RSS-Feed:
        <select onchange="showRSS(this.value)">
            <option value="B92">B92</option>
            <option value="RTS">RTS</option>
        </select>
    </form>
    <p><div id="rssOutput">
        <b>RSS Feed će biti prikazan u ovom delu.</b>
    </div></p>

</body>
</html>