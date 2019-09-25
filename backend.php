<? php
	
	//defining variables
	define('server', 'sql1.njit.edu');
	define('user', 'mmr44');
	define('pass', 'nJPQHNxd');
	define('database', 'mmr44');
	
	//checking if var contains null value or not!
	if (isset($_POST['username'], $_POST['password'])) {
	
		//creating connection to database
		$conn = new mysqli(server,user,pass,database);
		$username = mysqli_real_escape_string($conn,$_POST['username']); //escape chars
		$password = mysqli_real_escape_string($conn,$_POST['password']); //escape chars
  
		//checking connection 
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}	
	
		//Using quary
		$quary = "SELECT id FROM cs490db WHERE username='$username' and password='$password'";
  
		$result = mysqli_query($conn, $quary);
	
		//counting number of rows matched by username and password given
		$count = mysqli_num_rows($result);
	
		//if matches echo success else failure string
		$sucess = "Login successful for backend";
		$failure = "Login Failed for backend";
	
		if($count == 1) {
			$reply=json_encode($success);
			echo $reply;
		}
		else {
			$reply=json_encode($failure);
			echo $reply;
		}
	}
?>