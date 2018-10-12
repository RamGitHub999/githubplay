<!DOCTYPE html>
<html>
<head>
	<title>Thank You</title>
 <link rel="shortcut icon" type="image/x-icon" href="img/logoo.png" />
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<style type="text/css">
	
a
{
	color: white
	text-decoration: none;
}

a:hover
{
	color: white;
	text-decoration: none;
}

.btn-btn-default
{
  border-color: #F05F40;
  border-radius: 0px;
  background: #F05F40 ;
  color: white;
  border-width: 0.5px;
  width: 250px;
  height: 60px;
  font-family: 'Open Sans', sans-serif;
  font-size: 22px;
  -webkit-transition: all 1s ease;

}

.btn-btn-default:hover
{
  border-radius: 0px;
  background: #F05F40;
  color: white;
  border-width: 2px;
  width: 250px;
  height: 60px;
  font-family: 'Open Sans', sans-serif;
  font-size: 22px;
  -webkit-transition: all 1s ease;
  box-shadow: 0px 8px 14px 0px gray;

  
}



</style>

</head>
<body>




<?php
$name=@$_POST["username"];
$bloodgrp=@$_POST["bloodgroup"];
$phnno=@$_POST["phonenumber"];
$gender=@$_POST["gender"];
$year=@$_POST["year"];
$state=@$_POST["state"];
$city=@$_POST["city"];
$area=@$_POST["area"];
$namepatt='/^[a-z A-z]*$/';
$phnnopatt='/^[7-9][0-9]*/';
$a=strlen(@$_POST["username"]);
$b=strlen(@$_POST["phonenumber"]);

$conn = mysqli_connect("localhost","id2330067_lifesaver","lifesaver1","id2330067_bloodspace")or die(mysql_error());

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//mysqli_select_db($conn,"bloodspace")or die("no database selected");

if((preg_match($namepatt,$name))&&(preg_match($phnnopatt,$phnno)))
{
	if(($a>=7)&&($b==10)&&($year>1965))
	{

			
		$insert = "INSERT INTO info values(' ','".$name."','".$bloodgrp."','".$phnno."','".$year."','".$state."','".$city."','".$area."')";

			$exec = mysqli_query($conn, $insert);

			if($exec)	
			{
				?>

				<div class="fluid-container">
					<img src="img/thanq.jpg" class="img-responsive">
					<br>
					<div align="center">
					<button class="btn-btn-default btn-lg">
						<a href="http://www.findlifesavers.com/">Explore More</a>
					</button>
                                        <br><br><br>
					<p>
							Please keep your mobile number available because you may save a life.All Voluntary Donors are warned of likely misuse of blood donated by them at the hospital with or without the knowledge of the hospital management. At some places the hospital staff have taken the blood and sold it to others for a price. As a responsible citizen/voluntary blood donor, we request you to keep a watch on such people and hospitals.We collect the information about blood donors and their blood group to facilitate other people with blood when required.
					</p>
					</div>
				</div>

		        <?php 
			}
			else
				mysql_error();


		
	}
	else if($a<7)
	{

		echo '<script language="javascript">';
		echo 'alert("minimum 7 letters")';
		echo '</script>';
		echo "Please go back and Enter correct format";
		
	}
	else if($b!=10)
	{
		echo '<script language="javascript">';
		echo 'alert("10 digits allowed")';
		echo '</script>';		
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("birth year greater than 1965")';
		echo '</script>';
		
	}
}
else if(!(preg_match($namepatt,$name)))
{
	echo '<script language="javascript">';
		echo 'alert("enter correct format")';
		echo '</script>';
		
}
else
{
	echo '<script language="javascript">';
		echo 'alert("enter only digits")';
		echo '</script>';
		
}

?>




</body>
</html>