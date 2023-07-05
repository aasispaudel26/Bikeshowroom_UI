function sendMail() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  console.log(name);
  if (name == "") {
    alert("please enter a name");
    return;
  } else if (email == "") {
    alert("please enter a email");
    return;
  } else if (message == "") {
    alert("please enter a message");
    return;
  }

  var params = {
    name: name,
    email: email,
    message: message,
  };
  const serviceID = "service_d9zjm5j";
  const templateID = "template_7qf0pqj";

  emailjs
    .send(serviceID, templateID, params)
    .then((res) => {
      document.getElementById("name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("message").value = "";
      console.log(res);
      alert("your message sent successfully");
    })
    .catch((err) => console.log(err));
}

function registration() {
  var Name = document.getElementById("Name").value;
  var Address = document.getElementById("Address").value;
  var phoneNumber = document.getElementById("phoneNumber").value;
  var Email = document.getElementById("Email").value;
  var userName = document.getElementById("userName").value;
  var Password = document.getElementById("Password").value;

  if (userName && Password) {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    let existingUser = users.find((user) => user.userName === userName);

    if (existingUser) {
      document.getElementById("error").innerText = "User already exists";
    } else {
      let user = {
        Name: Name,
        Address: Address,
        phoneNumber: phoneNumber,
        Email: Email,
        username: userName,
        Password: Password,
      };
      users.push(user);
      localStorage.setItem("users", JSON.stringify(users));
      window.location.href = "login.html";
      alert("Registration successfull");
    }
  }
}

function login() {
  let username = document.getElementById("userName").value;
  let password = document.getElementById("Password").value;

  if (username && password) {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    let authuser = users.find(
      (user) => user.username === username && user.password === password
    );

    if (authuser) {
      localStorage.setItem("isLoggedIn", true);
      window.location.replace("seller.html");
    } else {
      document.getElementById("error").innerText = "Invalid login";
      // console.log("Invalid login");
    }
  } else {
    document.getElementById("error").innerText = "fill all details";
    // console.log("Fill all details");

    // window.alert("hello");
  }
}
