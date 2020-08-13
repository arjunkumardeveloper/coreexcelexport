<?php
	$con = mysqli_connect("localhost", "root", "" , "db2" ) or die("not connected");
	$q  = "select * from registration";
	$res = mysqli_query($con,$q);
	
?>

<html>
	<head>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<title>..........</title>
    </head>
    <body>
    <a href="generatedata.php?export=true" class="btn btn-success mr-5" >Export</a>
    	<table class="table table-bordered table-striped table-hover">
        	<tr class="text-center">
            	<th>Eamil</th>
                <th>Password</th>
                <th>Mobile</th>
            </tr>
            <?php 
				while($data = mysqli_fetch_array($res)){;
			?>
            <tr class="text-center">
            	<td><?php echo $data['email']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['mobile']; ?></td>
            </tr>
            <?php
				}
			?>
        </table>
        <!--<a href="generatedata.php?export = true" class="btn btn-success mr-5" >Export</a>-->
    </body>
</html>





