const loginfrm = document.getElementById("loginfrm");

let email = document.getElementById("email");
let password = document.getElementById("password");

// let error = document.getElementById("error");
loginfrm.addEventListener("submit", async (event) => {
  event.preventDefault();

  const request = await fetch("./includes/login.inc.php", {
    method: "POST",
    body: JSON.stringify({
      email: email.value,
      password: password.value,
    }),
    // headers: { "Content-Type": "application/json" },
  });

  const response = await request.text();
console.log(response);
  if (response === "success") {
    alert("Login successful");
    error.textContent = "";
    location.href = "./product.php";
  } else {
    error.textContent = response;
  }
});
