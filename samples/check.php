<?php
$query=$_POST['query'];
$query_number=$_POST['query_no'];
//echo "my query" . $que;
//$pw=$_POST['password'];
//connect to the db
$user = 'root';
$pswd = 'root';
$db = 'workshop';

//IMP: IN QUERY2 CHANGE DB NAME FROM 'cdeep' to 'CDEEP'

//$query = "SELECT wr.cfm_wkshop_date, wr.foss_category, ac.id, ac.institution_name, ac.state_code, ac.city FROM workshop_requests wr, academic_center ac WHERE wr.cfm_wkshop_date > '".DATE("Y-m-d")."' and wr.status=1 and ac.academic_code=wr.academic_code ORDER BY wr.cfm_wkshop_date, wr.cfm_wkshop_time ASC";
//echo $query;

$con=mysqli_connect("127.0.0.1",$user,$pswd,$db);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
  switch ($query_number) {
    case "1":
        echo "[" . $row['cfm_wkshop_date'] . "-" . $row['foss_category'] . "@" . $row['institution_name'] . "," . $row['city'] . "]";
	echo "<br>";
        break;
    case "2":
        echo "[" . "(" . $row['name'] . ")" . "(" . $row['rp_fname'] . ")" . "(" . $row['phone'] . ")" . "(" . $row['mail'] . ")" . "]";
	echo "<br>";
        break;
  }
  }
//echo $array[0];

mysqli_close($con);
?>
