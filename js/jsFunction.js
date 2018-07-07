//Collect element to create variable from the DOM
var userForm = document.getElementById('userForm');
var firstName = document.getElementById('firstName');
var lastName = document.getElementById('lastName');
var email = document.getElementById('email');
var users = document.getElementsByTagName('li');
var submitBtn = document.getElementById('submit');
var deleteAllBtn = document.getElementById('reset');

users = Array.from(users);


//Submit data on click
submitBtn.addEventListener('click', createUser, false);

//Delete all users
deleteAllBtn.addEventListener('click', deleteUsers, false);

//Get Users
getUsers();

//Create new user in database
function createUser(e){

	//Prevent Default Action
	e.preventDefault();

	//Get value of first name input
	firstName = userForm.firstName.value;
	
	//Get value of last name input
	lastName = userForm.lastName.value;

	//Get value of email input
	email = userForm.email.value;


	var xhr = new XMLHttpRequest(); // create new xhr object
	xhr.open('POST', 'scripts/create.php', false);//Open http protocol path to script

	//Set Content-Type expection for server
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


	//Send form data to the server
	xhr.send('firstName=' + firstName + '&lastName=' + lastName + '&email=' + email);

	clearForm();
	getUsers();
}

function deleteUsers(e){

	//Prevent Default Action
	e.preventDefault();

	var xhr = new XMLHttpRequest(); // create new xhr object
	xhr.open('POST', 'scripts/delete.php', false);//Open http protocol path to script

	//Send form data to the server
	xhr.send();
	getUsers();
}



function clearForm(){
	userForm.firstName.value = '';
	userForm.lastName.value = '';
	userForm.email.value = '';
}

function deleteUser(liIndex){

	var dlt = document.querySelectorAll('button.dl');
	var user = dlt[liIndex].parentNode.getAttribute('id');

	var xhr = new XMLHttpRequest();

	xhr.open('GET', 'scripts/delete.php?id=' + user, false);
	xhr.send();
	getUsers();
		
}

function getUsers(){
	
	var xhr = new XMLHttpRequest();
	var liIndex = 0;

	xhr.onload = function(response){
		var userResults = this.response;
		userResults = JSON.parse(userResults);
		var userInfo = "";

		if (xhr.status === 200){
			for(user in userResults){
				userInfo += "<li id='" + userResults[user].N_ID + "'>" + userResults[user].S_FIRSTNAME + " " + userResults[user].S_LASTNAME + " " + userResults[user].S_EMAIL + " - <button class='dl' style='background-color: #c00;' onclick=deleteUser(" + liIndex + ")>delete</button></li>";
				liIndex++;
			}
		}

		document.getElementById('userList').innerHTML = userInfo;

	};

	xhr.open('GET', 'scripts/read.php', true);
	xhr.send();
}
