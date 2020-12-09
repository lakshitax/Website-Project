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
  const username = document.getElementById("username");
  const password = document.getElementById("password");

  const usernameValue= username.value.trim();
  const passwordValue= password.value.trim();

  if(usernameValue === "") {
      setErrorFor(username, "Username cannot be blank");
    }
  else if (!/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/.test(usernameValue )) {
        setErrorFor(username, "Invalid Username ");
    }
    else {
      setSuccessFor(username);
    }
  if(passwordValue  === "") {
    setErrorFor(password, "Password cannot be blank");
  }
  else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/.test(passwordValue )) {
    setErrorFor(password, "Invalid Password");
  }
  else {
    setSuccessFor(password);
  }
  return !error;
}
