
error=false;
function myfun()
{


		if(checkInputs() == false)
			event.preventDefault();
			else{
				window.location.href="thankyou.html";
			}

	}


function setErrorFor(input, message)
  {
	const formControl = input.parentElement;
	const small = formControl.querySelector("small");
	formControl.className = "form-control error";
	small.innerText = message;
	error=true;
  }

function setSuccessFor(input)
  {
	const formControl = input.parentElement;
	formControl.className = "form-control success";
  }



function checkInputs()
{
	const form = document.getElementById("form");
	const name = document.getElementById("name");
	const username = document.getElementById("username");
	const email = document.getElementById("email_id");
	const phone = document.getElementById("phone_number");
	const password = document.getElementById("password");
	const password2 = document.getElementById("password2");
	const dob = document.getElementById("DoB");


const nameValue= name.value.trim();
const usernameValue= username.value.trim();
const emailValue= email.value.trim();
const phoneValue= phone.value.trim();
const passwordValue= password.value.trim();
const password2Value= password2.value.trim();
const dobValue= dob.value.trim();

  if(nameValue=== "")
  {
    setErrorFor(name, "Name cannot be blank");
  }
	else if (!/^[a-zA-Z]+(([",. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(nameValue)) {
				setErrorFor(name, "Name cannot contain digits or special characters");

		}
		else {
			setSuccessFor(name);
		}
	if(usernameValue === "") {
  		setErrorFor(username, "Username cannot be blank");
  	}
	else if (!/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/.test(usernameValue )) {
        setErrorFor(username, "Username cannot contain special characters");
    }
		else {
  		setSuccessFor(username);
  	}

  	if(emailValue  ==="") {
  		setErrorFor(email, "Email cannot be blank");
  	}
  else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(emailValue))
  {
  		setErrorFor(email, "Not a valid email");
  	}
  else
  {
  		setSuccessFor(email);
  	}

  	if(passwordValue  === "") {
  		setErrorFor(password, "Password cannot be blank");
  	}
		else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/.test(passwordValue )) {
      setErrorFor(password, "Password must be between 8 and 32 characters. \nAtleast 1 lowercase letter, 1 uppercase letter,\n1 digit and 1 special character");
  	}

		else {
  		setSuccessFor(password);
  	}
  	if(password2Value  === "") {
  		setErrorFor(password2, "Password2 cannot be blank");
  	}
		else if(passwordValue  !== password2Value ) {
  		setErrorFor(password2, "Passwords do not match");
  	}
		else{
  		setSuccessFor(password2);
  	}

    if (!/\d{10}/.test(phoneValue ))
		{
      setErrorFor(phone_number, "Phone Number must be 10 digits");
		}
    else
		{
		setSuccessFor(phone_number);
		}
		return !error;

  }
