let desc = document.getElementById("description");
let title = document.getElementById("title");

let price = document.getElementById("price");
let file = document.getElementById("file");
let addfrm = document.getElementById("addfrm");
let error = document.getElementById("error");
addfrm.addEventListener("submit", async (event) => {
  event.preventDefault();

    const formdata = new FormData();

  formdata.append("title", title.value);
  formdata.append("price", price.value);
  formdata.append("description", desc.value);
  formdata.append("file", file.files[0]);
  const request = await fetch("../includes/addproduct.php", {
    method: "POST",
    body: formdata,
  });

  const response = await request.text();
    console.log(response);
  if (response === "success") {
    alert("Success");
    error.textContent = "";
    location.href = "./dashboard.php";
  } else {
    error.textContent = response;
  }
});
