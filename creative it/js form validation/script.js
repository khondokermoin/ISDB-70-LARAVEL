document.getElementById("loginForm").addEventListener("submit", function(event) {
    // 1. ALWAYS prevent the default form submission/page reload first
    event.preventDefault(); 
    
    // Get the text values from the input fields and remove whitespace
    const emailValue = document.getElementById("email").value.trim();
    const passwordValue = document.getElementById("password").value.trim();

    // Check if the email field is empty
    if (emailValue === "") {
        alert("Please enter your email address."); 
        return false;                             
    }

    // Check if the password field is empty
    if (passwordValue === "") {
        alert("Please enter your password.");      
        return false;                             
    }

    // 2. When the user fills both fields, show them in the console
    console.log("Form Submitted successfully!");
    console.log("Email:", emailValue);
    console.log("Password:", passwordValue);
});
