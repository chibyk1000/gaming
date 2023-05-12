let firstname = document.getElementById('firstname');
let lastname = document.getElementById('lastname');
let username = document.getElementById('username');
let password = document.getElementById('password');
let email = document.getElementById('email');
let password_confirmation = document.getElementById('password_confirmation');
let signupfrm = document.getElementById('signupfrm');

 signupfrm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const request = await fetch("./includes/signup.inc.php", {
        method: "POST",
        body: JSON.stringify({firstname:firstname.value, lastname:lastname.value, email:email.value, password:password.value, username:username.value, password_confirm:password_confirmation.value}),
        headers:{"Content-Type": "application/json"}
    })
    
     const data = await request.text();
     if (data === 'success') {
         
         alert(data);
         location.href="./login.php"
     } else {
         alert(data);

     }
})