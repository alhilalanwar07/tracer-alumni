// Optional: Add animations to form elements on focus
document.querySelectorAll(".login-form input").forEach(input => {
    input.addEventListener("focus", function() {
        this.style.borderColor = "#ff8e61";
    });
    input.addEventListener("blur", function() {
        this.style.borderColor = "#ccc";
    });
});
