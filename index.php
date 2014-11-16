<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h1>Register here!</h1>
<p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
<form method="post" action="index.php" enctype="multipart/form-data" >
      Name  <input type="text" name="name" id="name"/></br>
      Email <input type="text" name="email" id="email"/></br>
      <input type="submit" name="submit" value="Submit" />
</form>
<?php

	//SQL Database
	$server = "a826dspucn.database.windows.net,1433";
	$user = "kesdeband@a826dspucn";
	$pwd = "Google25";
	$db = "testsqldb";

	$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

	if($conn === false){
		die(print_r(sqlsrv_errors()));
	}
	
	$query = "select * from users";
	$stmt = sqlsrv_query( $conn, $query);
	/*$count = sqlsrv_num_rows($stmt);
		echo $count;*/
	
	
	/* Retrieve each row as an associative array and display the results.*/
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
	{
      echo $row['Last Name'].", ".$row['First Name']."\n";
	}
	
	/* Free statement and connection resources. */
	sqlsrv_free_stmt( $stmt);
	sqlsrv_close( $conn);
	

	//Azure Table Storage example
	//require_once 'vendor\autoload.php';

	//use WindowsAzure\Common\ServicesBuilder;
	//use WindowsAzure\Common\ServiceException;

	
	// Create table REST proxy.
	/*$connectionString = "DefaultEndpointsProtocol=https;AccountName=bitnamieastus5213449027;AccountKey=6B6j0Nw7g/cMNNWhjwUrVNVJU3jwzI2t9twlrMtArNBstn9ofpzGVq+hKLn0jE7T6Ntq+kPwaOVqpkPD9aLuOQ==";
	$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

	try {
		// Create table.
		$tableRestProxy->createTable("test");
	}
	catch(ServiceException $e){
		$code = $e->getCode();
		$error_message = $e->getMessage();
		// Handle exception based on error codes and messages.
		// Error codes and messages can be found here: 
		// http://msdn.microsoft.com/en-us/library/windowsazure/dd179438.aspx
	}*/


    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    //$host = "us-cdbr-azure-southcentral-e.cloudapp.net";
    //$user = "bad9085a3f42e4";
    //$pwd = "312ad887";
    //$db = "kestestAZuOZD6wb";
    // Connect to database.
    /*try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(var_dump($e));
    }
    // Insert registration info
    if(!empty($_POST)) {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = date("Y-m-d");
        // Insert data
        $sql_insert = "INSERT INTO registration_tbl (name, email, date) 
                   VALUES (?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $date);
        $stmt->execute();
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
    echo "<h3>Your're registered!</h3>";
    }
    // Retrieve data
    $sql_select = "SELECT * FROM registration_tbl";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Date</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['name']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['date']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }*/
?>
</body>
</html>