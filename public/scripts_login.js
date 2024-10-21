// Optional: Add animations to form elements on focus
document.querySelectorAll(".login-form input").forEach(input => {
    input.addEventListener("focus", function() {
        this.style.borderColor = "#ff8e61";
    });
    input.addEventListener("blur", function() {
        this.style.borderColor = "#ccc";
    });
});

document.querySelectorAll(".login-form input").forEach(input => {
    input.addEventListener("invalid", function() {
        const invalidFeedback = document.createElement("span");
        invalidFeedback.className = "invalid-feedback";
        invalidFeedback.role = "alert";
        invalidFeedback.textContent = "This field is required.";
        if (!this.nextElementSibling || !this.nextElementSibling.classList.contains("invalid-feedback")) {
            this.parentNode.insertBefore(invalidFeedback, this.nextSibling);
        }
    });

    input.addEventListener("input", function() {
        if (this.validity.valid) {
            const feedback = this.nextElementSibling;
            if (feedback && feedback.classList.contains("invalid-feedback")) {
                feedback.remove();
            }
        }
    });
});
