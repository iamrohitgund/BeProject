<html>
<head>
	This is test page

<style>
table {
  border: 3px solid #000000;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
table td, table th {
  border: 1px solid #000000;
  padding: 5px 4px;
}
table tbody td {
  font-size: 13px;
}
table thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 3px solid #000000;
}
table thead th {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  text-align: center;
}
table tfoot td {
  font-size: 14px;
}
</style>

</head>
<body>
	<?php
	$db=$_GET['db'];
	$timestamp=$_GET['timestamp'];
	$timestamp=str_replace("_", " ", $timestamp);
	
	
	$pid=$_GET['pid'];

	$mongoclient=new mongoclient("mongodb://localhost");
	$database=$mongoclient->$db;
	$coll=$database->lsofmapped;
	$array=array('TIMESTAMP'=> $timestamp);
	$cursor=$coll->find($array);
	
	echo "<table><tr>
     <th align='center'>TimeStamp</th>
     <th align='center'>PID</th>
     <th align='center'>USER</th>
     <th align='center'>NAME</th>
     <th align='center'>SIZE_OFF</th>
     <th align='center'>TYPE</th>
   
     </tr>";
	foreach ($cursor as $line) 
	{
		if($line['PID']===$pid)
		{
			$arr=$line['FILES'];

			foreach ($arr as $a) 
			{
				echo "<tr>
			                <td align='center'>".$line["TIMESTAMP"]."</td>
			                <td align='center'>".$line["PID"]."</td>
			                <td align='center'>".$a['USER']."</td>
			                <td align='center'>".$a['NAME']."</td>
			                <td align='center'>".$a['COMMAND']."</td>
			                <td align='center'>".$a['SIZE_OFF']."</td>
			                <td align='center'>".$a['TYPE']."</td>
			                
			            
			            </tr>";
			}
		}
	}

	
	?>
</body>
</html>