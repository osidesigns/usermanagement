<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		input[type="text"]{
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-top: 0;
			outline: none;
			padding: 0 3px;
		}
		div{
			width: 550px;
			margin: 0 auto;
		}

		button{
			background-color: green;
			color: #efefef;
			border: 0;
			outline: none;
			border-radius: 3px;
			padding: 5px 8px;
			margin-bottom: 10px;
		}

		button#reset{
			background-color: lightgray;
			color: #2d2d2d;
		}

	</style>
	<title>User Entry Form</title>
</head>
<body>

	<div>
		<h1>User Management Form</h1>
		<form id="userForm">
			<input type="text" name="firstName" placeholder="First Name" id="firstName" required /> <br />
			<input type="text" name="lastName" placeholder="Last Name" id="lastName" required /> <br />
			<input type="text" name="email" placeholder="Email Address" id="email" required /> <br />
			<button id="submit">Add User</button> 
			<button id="reset">Delete All Users</button>
		</form>
	</div>
	<div>
		<h1></h1>
		<ol id='userList'>
			
		</ol>
	</div>
	
	<script src="js/jsFunction.js"></script>

</body>
</html>

	