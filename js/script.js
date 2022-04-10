function mySubmit() {
  document.querySelector(".save-images").submit.click();
}
function clickInputFile() {
  document.querySelector(".upload").click();
}
function setQuantity(form) {
  const quantity = parseInt(prompt("How many images do you want to generate?"));
  const quantityInput = document.querySelector(".quantity");
  quantityInput.value = quantity;
  form.submit();
}

const generateBtn = document.querySelector(".btn-generate");

if (
  window.location.href.endsWith("?uploaded") ||
  window.location.href.endsWith("?success")
) {
  generateBtn.classList.remove("d-none");
}
