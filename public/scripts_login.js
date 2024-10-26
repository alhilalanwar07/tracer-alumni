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


$(window).scroll(function () {
    if ($(window).scrollTop() > 50) {
      $(".navbar").addClass("scrolled");
    } else {
      $(".navbar").removeClass("scrolled");
    }
  });

  // Intersection Observer for animate-in-out elements
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible");
      }
    });
  });

  document.querySelectorAll(".animate-in-out").forEach((element) => {
    observer.observe(element);
  });
