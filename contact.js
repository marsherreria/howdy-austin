submit = document.getElementById("submit");
submit.addEventListener("click", registerAlert);

function getInfo() {
    username = document.getElementById("name").value;
    email = document.getElementById("email").value;
    comments = document.getElementById("comments").value;
    connection = document.getElementsByName("connection")

    return;
}

// all fields must be filled out
// email must be valid 


function registerAlert() {
    if (validateForm()) {
        submit.type = "submit";
        return;
    } else {
        alert("Please fill out all fields to continue");
        return;
        }
}


function validateForm() {
    getInfo();

    if (validateName() && validateEmail() && validateComments() && validateConnection()){
        return true;
    } else {
    	return false;
    }

}

function validateName() {
    // check that name is filled out
    if (username == "") {
        return false;
    }
    return true;
}


function validateEmail() {
    // check that email is valid 
    if (email == "") {
        return false;
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        return (true)
    }
        alert("You have entered an invalid email address!")
        return (false)
}

function validateComments() {
    // check that comments have been filled out 
    if (comments == "") {
        return false
    } else {
        return true
	}
}

function validateConnection(){
    // check that radio button has been selected 

    for (var i = 0, len = connection.length; i < len; i++) {
         if (connection[i].checked) {
             return true;
         }
    }

    return false;
}

