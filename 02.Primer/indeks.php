<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Izbor države</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $("#txt").keyup(function(){
            var vrednost = $("#txt").val();
            $.get("suggest.php", { unos: vrednost },
            function(data){
                $("#livesearch").show();
                $("#livesearch").html (data);
            });
        });
        $("#sub").click(function(){
            var vrednost = $("#txt").val();
            $.get("pronadjiponazivu.php", { naziv: vrednost },
            function(data){
                $("#prikaz_rezultata").html (data);
            });
        });
    });
    function place(ele){
        $("#txt").val(ele.innerHTML);
        $("#livesearch").hide();
        }
</script>
<style type="text/css"> 
#livesearch{ 
  margin:5px;
  width:220px;
  border: 1px solid;
  display: none;
  }
#txt{
  border: solid #A5ACB2;
  margin:5px;
  } 
</style>
</head>
<body>
<form>
<input type="text" id="txt" size="32"> 
<div id="livesearch"></div><br/>
<div id="prikaz_rezultata"></div>
<input type="button" id="sub" value="Pronadji" >

</form>

</body>
</html>