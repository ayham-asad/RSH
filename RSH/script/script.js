function validateLoginForm() {
  // Get the email and password fields
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  // Check if any field is empty
  if (email == "" || password == "") {
    // Show a popup window with an error message
    alert("Please fill in all fields.");
    return false; // Prevent form submission
  }

  return true; // Allow form submission
}
