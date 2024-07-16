let signUpBtn = document.getElementById("signUpBtn");
let logInBtn = document.getElementById("logInBtn");
let nameField = document.getElementById("nameField");
let title = document.getElementById("title");
let signUpBtn2 = document.getElementById("signUpBtnTwo");
let signUpClr = document.getElementById("signUpClr");
let loginBtn = document.getElementById("loginBtn");
let signupbtn = document.getElementById("signupbtn");


// function change() // no ';' here
// {
//     let signUpBtn = document.getElementById("signUpBtn");
//     if (signUpBtn.value=="Sign Up") signUpBtn.value = "Log In";
//     else signUpBtn.value = "Sign Up";
// }


// logInBtn.onclick = function(){
//   nameField.style.maxHeight = "0";
//   title.innerHTML = "Welcome Back <br> Enter your credentials to login";
//   signUpBtn.classList.add("disable");
//   logInBtn.classList.remove("disable");
//   // signUpBtn.classList.add("dltBtn");
//   signUpBtnTwo.classList.add("dltBtn");
// }

signUpBtnTwo.onclick = function(){
  // nameField.style.maxHeight = "0";
  // title.innerHTML = "Welcome <br> Enter your credentials to login";
  // signUpBtn.classList.add("disable");
  // logInBtn.classList.add("disable");
  // logInBtn.classList.add("dltBtn");
  // signUpBtn.classList.remove("dltBtn");
  // signUpBtnTwo.classList.remove("disable");
  
}

signUpBtn.onclick = function(){
  nameField.style.maxHeight = "65px";
  title.innerHTML = "Sign Up";
  signUpBtnTwo.classList.remove("dltBtn");
 logInBtn.classList.add("disable");
  signUpBtn.classList.remove("disable");
  logInBtn.classList.remove("dltBtn");
  signUpBtn.classList.add("dltBtn");
  logInBtnTwo.classList.remove("dltBtn");
  logInBtn.classList.add("dltBtn");
}


logInBtnTwo.onclick = function(){
  nameField.style.maxHeight = "0";
  title.innerHTML = "Welcome Back";
  signUpBtnTwo.classList.add("dltBtn");
  signUpBtn.classList.add("disable");
  logInBtn.classList.remove("dltBtn");
  signUpBtn.classList.remove("dltBtn");
  logInBtnTwo.classList.add("dltBtn");
  signupbtn.classList.remove("signupbtn");
  signUpClr.classList.add("signUpClr");
}

