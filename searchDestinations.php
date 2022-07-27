<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<title>Search Destinations with deVoyage</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Allura&family=Chakra+Petch:wght@300&family=Kanit:wght@100&family=Merienda&family=Merriweather+Sans:wght@300&family=Open+Sans:wght@300&display=swap"
                rel="stylesheet">
<link href="style.css" rel="stylesheet" type="text/css" />

<link href="./css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="./css/searchDestinationsCSS.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
</head>

<body>


<!--form-->

<div class="col-sm-9">




<form method="post">
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd" style="font-size:40px; padding:8px; font-family: 'Merriweather Sans', sans-serif; font-weight:900; text-align: center; padding:5rem; width:100px;">Search Destination</td></tr>
<tr><td style="font-size:20px;" class="lefttxt">Trip Type</td><td><select style="font-family: 'Merriweather Sans', sans-serif; width:28rem; height:6rem; margin:2rem; text-align: center; outline:none; background-color:#F1F1F1; border:none; border-radius:40px; font-size:20px;" name="s1" required><option value="">Select</option><option value="Family Tours">Family Tours</option><option value="Religious Tours">Religious Tours</option><option value="Adventure Tours">Adventure Tours</option><option value="Special Event Tours">Special Event Tours</option><option value="National Parks">National Parks</option><option value="Themed Vacations">Themed Vacations</option><option value="Small Group Tours">Small Group Tours</option></select></td></tr>
<tr><td style="font-size:20px;" class="lefttxt">Budget</td><td><input style="font-family: 'Merriweather Sans', sans-serif; width:28rem; height:6rem; margin:2rem; text-align: center; outline:none; background-color:#F1F1F1; border:none; border-radius:40px; font-size:20px;" type="number" name="t2" required title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Search" name="sbmt" style="font-family: 'Merriweather Sans', sans-serif; width:18rem; height:6rem; margin:2rem; background-color:#49e9b9; border:none; border-radius:40px; font-size:20px;font-weight:700;" /></td></tr>




</table>
</form>



</div>

<!--output-->

<?php include('function.php'); ?>

<table border="1px" width="90%" height="300px" align="center" class="tableshadow">
<tr><td class="toptd" style="font-size:40px; padding:8px;background-color: #A6D1E6; font-weight:900; text-align: center; width:25px;">Results</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="1px" align="center" width="95%" >
<tr>
<td class="throw" style="font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; font-weight:bold; width:16px;">Package Name</td>
<td class="throw" style="font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; font-weight:bold; width:16px;">Price</td>
<td class="throw" style="font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; font-weight:bold; width:100px;">Description</td></tr>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
        $s="select * from category";
        $result=mysqli_query($cn,$s);
        $r=mysqli_num_rows($result);
        //echo $r;

        while($data=mysqli_fetch_array($result))
        {
        	if(isset($_POST["sbmt"]))
        	{
        	if($data[1]==$_POST["s1"])
        	{
        		$catId = $data[0];
                        // echo $catId;
        	}
        	}
        }

        $s2="select * from package";
        $result2 = mysqli_query($cn, $s2);
        $r2=mysqli_num_rows($result2);

        while($data2=mysqli_fetch_array($result2)){
                if(isset($_POST["sbmt"]))
                {
                        if($data2[2]==$catId && $data2[3]<=$_POST["t2"])
                        {
                                echo "<tr><td style='font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; right:3rem; width:25px;'>$data2[1]</td>
		                <td style='font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; width:25px;'>$data2[3]</td>
                                <td style='font-family: 'Merriweather Sans', sans-serif; font-size:25px; padding:5px; width:100px;'>$data2[7]</td></tr>";
                        }
                }
        }
}
?>

</body>