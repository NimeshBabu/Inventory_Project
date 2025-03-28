const inputs = document.querySelectorAll(".input-field");

// Add active class on focus
inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value !== "") return;
    inp.classList.remove("active");
  });
});

// Password Eye Toggle Feature
const passwordFields = document.querySelectorAll(".password-wrap");

passwordFields.forEach((wrap) => {
  const input = wrap.querySelector(".input-field");
  const eyeBtn = wrap.querySelector(".ri-eye-off-line");

  eyeBtn.addEventListener("click", () => {
    if (input.type === "password") {
      input.type = "text";
      eyeBtn.classList.remove("ri-eye-off-line");
      eyeBtn.classList.add("ri-eye-line");
    } else {
      input.type = "password";
      eyeBtn.classList.remove("ri-eye-line");
      eyeBtn.classList.add("ri-eye-off-line");
    }
  });
});


// Added by me
console.log("JS Loaded!"); // Check if JS is running


document.addEventListener("DOMContentLoaded", () => {
  // Fetch stored session messages
  fetch("session_handler.php")
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              showAlert(data.success, "success");
          }
          if (data.error) {
              showAlert(data.error, "error");
          }
      });
});



// Function to show alerts
function showAlert(message, type) {
  const alertContainer = document.getElementById("alert-container");
  if (!alertContainer) return;

  const alertDiv = document.createElement("div");
  alertDiv.className = `alert ${type === 'success' ? 'alert-success' : 'alert-error'}`;
  alertDiv.innerHTML = `<strong>${type === 'success' ? '' : ''}</strong> ${message}`;

  alertContainer.appendChild(alertDiv);

  // Remove alert after 3 seconds
  setTimeout(() => {
      alertDiv.classList.add("fade-out");
      setTimeout(() => alertDiv.remove(), 1000);
  }, 3000);
}


