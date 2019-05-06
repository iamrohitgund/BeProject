<html>
<head>
<title>lsofmapped</title>

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
hr {
	color: black;
	background-color: black;
}
</style>

</head>
<body bgcolor="skyblue">

<center><h2>Process-File Mappings</h2></center>	
<hr align="center" noshade size="4px" width="100%"></hr>
</br>
	
	<?php
		
		$client=$_POST['client'];
		$vm=$_POST['vm'];
		$timestamp=$_POST['timestamp'];	
		$timestamp=str_replace("_", " ", $timestamp);
		
		
		function display($client1,$vm1,$timestamp1)
		{
			
			$conn = new MongoClient("mongodb://localhost");
			$db=getdb($vm1);	
			
			$database=$conn->$db;
			$cursor1=$database->lsofmapped->find();
			
			echo "<table><tr>
                      <th align='center'>TimeStamp</th>
                      <th align='center'>PID</th>
                      <th align='center'>Number of Files Modifed</th>
   						 </tr>";
   
	   	foreach ($cursor1 as $doc)
	     	{
	     	 	$link="process.php?db=$db&pid=";
	      	if(strcmp($doc['TIMESTAMP'],$timestamp1)===0)
	      	{
	      		$time=str_replace(" ", "_", $timestamp1);
					$link=$link.$doc["PID"]."&timestamp=".$time;
		      	echo "<tr>
		               <td align='center'>".$doc["TIMESTAMP"]."</td>
		               <td align='center'><a href=$link target=\"_blank\"/>".$doc["PID"]."</td>
		               <td align='center'>".sizeof($doc["FILES"])."</td>
		               </tr>";
	      	}
	   	}
	    	echo "</table>";
  		}
		
		function getdb($vm2)
		{
			$conn = new MongoClient("mongodb://localhost");
			$db = $conn->VMinfo;
			$table = $db->basic; 
			
			$arr=$table->find();
			$mac="";
			foreach ($arr as $key ) 
			{
				$nm=$key['VmName'];
				#print $nm;
				if(strcmp($nm,$vm2)==0)
				{
					$mac=$key['MAC'];
				}	
			}
			
			$n_mac = str_replace(":", "", $mac);			
			
			$dbases = $conn->listDBs(); 
			$name="";
			foreach ($dbases['databases'] as $dbs) 
			{
				#print_r($dbs);
			   $nm=$dbs['name'];
			 	if(strpos($nm,$n_mac)!==FALSE)
			   {
			   	if(strpos($nm,"processed") !== FALSE)
			    		$name=$nm;
			   }
			    
			}
			return $name;
		}
		
		display($client,$vm,$timestamp);

	?>
	
</body>
</html>