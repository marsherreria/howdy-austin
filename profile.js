var user = '';
var password = '';
var repeatPassword = '';

var pwDigit = false;
var pwUpper = false;
var pwLower = false;

var userValidated = false;
var passwordValidated = false;


register = document.getElementById("register");
register.addEventListener("click", registerAlert);

clear = document.getElementById("clear");
clear.addEventListener("click", clear_page);


function clear_page() {
	location.reload();
}


function getInfo() {
	user = document.getElementById("username").value;
	password = document.getElementById("password").value;
	repeatPassword = document.getElementById("repeat").value;
}

// username must be 6-20 digits
// username can only have letters & digits
// user cannot begin with a digit
// password and repeat password must match
// password must be 8-20 digits
// password must only have letters & digits
// password must have one lowercase, one uppercase and one digit


function registerAlert() {
	validated = validateForm();

	if (validated == "user") {
		alert("Username does not meet requirements");
		location.reload();
	} else if (validated == "pass") {
		alert("Password does not meet requirements");
		location.reload();
	} else if (validated == "repeat") {
		alert("Passwords do not match");
		location.reload();
	} else if (validated == "true") {		
		register.type = "submit";
	}
}


function validateForm() {
	getInfo();

	if (validateUser() && validatePass() && validateRepeat()) {
		validated = "true";
		return validated;
	} else if (!validateUser()) {
		validated = "user";
		return validated;
	} else if (!validatePass()) {
		validated = "pass";
		return validated;
	} else if (!validateRepeat()) {
		validated = "repeat";
		return validated;
	}

}

function validateUser() {
	// check length of username
	if ((user.length < 6) || (user.length > 20)) {
		return false;
	}

	// check if only letters & digits
	for (var i = 0; i < user.length; i++) {
		charCode = user.charCodeAt(i);

		// checks if character is number
		if ((charCode < 57) && (charCode > 48)) {
			// check first character of user
			if (i == 0) {
				console.log('first digit')
				return false;
			} else {
				console.log('continue')
			}
		}
		// checks if character is uppercase
		else if ((charCode < 90) && (charCode > 65)) {
			console.log('continue')
		}
		// checks if character is lowercase
		else if ((charCode < 122) && (charCode > 96)) {
			console.log('continue')
		} 
		// the character is a symbol
		else {
			symbol = true;
			return false;
		}
	}

	return true;
}


function validatePass() {
	// check length of pass
	if ((password.length < 8) || (password.length > 20)) {
		return false;
	}

	// check if only letters & digits
	for (var i = 0; i < password.length; i++) {
		charCode = password.charCodeAt(i);

		// checks if character is number
		if ((charCode < 57) && (charCode > 48)) {
			pwDigit = true
		}
		// checks if character is uppercase
		else if ((charCode < 90) && (charCode > 64)) {
			pwUpper = true
		}
		// checks if character is lowercase
		else if ((charCode < 122) && (charCode > 96)) {
			pwLower = true
		} 
		// the character is a symbol
		else {
			symbol = true
			return false;
		}
	}

	if (pwDigit && pwLower && pwUpper) {
		return true;
	} else {
		return false;
	}
}

function validateRepeat() {
	if (password == repeatPassword) {
		return true
	} else {
		return false
	}
}
