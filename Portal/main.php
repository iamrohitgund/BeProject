<html>

<head>
<title></title>

<style>

input[type=submit]
{
	

  color:#fff;
  background-color:black;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 12px;
  padding: 5px 10px;
  border-radius: 5px;
  width:80%;
  height:40px	

}
</style>


</head>

<body bgcolor="grey">
<?php
		$client=$_POST['client'];
		$vm=$_POST['vm'];
		$timestamp=$_POST['timestamp'];	
		$timestamp=str_replace(" ","_",$timestamp);
		
#---------------------------------------------------------------------------------------------------------------------------------
		
#---------------------------------------------------------------------------------------------------------------------------------		
		
echo"<form method='POST' action='processedpsaux.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
    echo"<br><br>";
    echo"<CENTER><input type='submit' value='Process Details' OnClick='processedpsaux.php' target='frame3'> </CENTER>";
echo"</form>";

echo"<form method='POST' action='processedopenport.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
    
	 echo"<br>";    
    echo"<CENTER><input type='submit' value='Port Status' OnClick='processedopenport.php' target='frame3'> </CENTER>";
echo"</form>";

echo"<form method='POST' action='processednetstatpntu.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
	 echo"<br>";    
    echo"<CENTER><input type='submit' value='Network Details' OnClick='processednetstatpntu.php' target='frame3'> </CENTER>";
echo"</form>";

echo"<form method='POST' action='processedfilestat.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
	 echo"<br>";   
    echo"<CENTER><input type='submit' value='Modified File Details' OnClick='processedfilestat.php' target='frame3'> </CENTER>";
echo"</form>";

echo"<form method='POST' action='files.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
	 echo"<br>";    
    echo"<CENTER><input type='submit' value='Modified Files' OnClick='files.php' target='frame3'> </CENTER>";
echo"</form>";

echo"<form method='POST' action='processedlsof.php' target='frame3'>";
    echo"<input type='hidden' name='client' value=$client>";
    echo"<input type='hidden' name='vm' value=$vm>";
    echo"<input type='hidden' name='timestamp' value=$timestamp>";
	 echo"<br>";    
    echo"<CENTER><input type='submit' value='Process-File Mappings' OnClick='processedlsof.php' target='frame3'> </CENTER>";
echo"</form>";




?>
<br><br>
</body>
</html>