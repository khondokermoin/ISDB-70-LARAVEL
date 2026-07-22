document.getElementById("loginForm").addEventListener("submit", function(event) {
    // 1. ALWAYS prevent the default form submission/page reload first
    event.preventDefault(); 
    
    // Get the raw text values from the input fields without trim
    const emailValue = document.getElementById("email").value;
    const passwordValue = document.getElementById("password").value;

    // Check if the email field is empty using !
    if (!emailValue) {
        alert("Please enter your email address."); 
        return false;                             
    }

    // Check if the password field is empty using !
    if (!passwordValue) {
        alert("Please enter your password.");      
        return false;                             
    }

    // 2. When the user fills both fields, show them in the console
    console.log("Form Submitted successfully!");
    console.log("Email:", emailValue);
    console.log("Password:", passwordValue);
});
