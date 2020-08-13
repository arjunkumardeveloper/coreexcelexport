<?php 

	$con = mysqli_connect("localhost", "root", "" , "db2" ) or die("not connected");



if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
//$query = mysqli_query($con, 'select * from registration'); // Get data from Database from demo table
	$q  = "select * from registration";
	$res = mysqli_query($con,$q);
 
 
    $delimiter = ",";
    $filename = "significant_" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('ID', 'Email', 'Password', 'Mobile');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($data = mysqli_fetch_array($res)){
        
        $lineData = array($data['id'], $data['email'], $data['password'], $data['mobile']);
        fputcsv($f, $lineData, $delimiter);
    }
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
 }
}
?>