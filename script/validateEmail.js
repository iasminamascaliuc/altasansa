function submitForm(event) {
  event.preventDefault();
  let email = document.getElementsByName("email")[0].value;
  let password = document.getElementsByName("password")[0].value;
  let status = document.getElementById("status");
  if (/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/.test(email)) {
    window.location.href =
      "login.php?email=" +
      encodeURIComponent(email) +
      "&password=" +
      encodeURIComponent(password);
  } else {
    status.value += "Email invalid.";
  }
}
