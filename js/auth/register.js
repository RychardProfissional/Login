window.addEventListener("load", () => {
  const passInput = document.querySelector("#password");
  const passInputTwo = document.querySelector("#password_repeat");
  const label = passInputTwo.parentElement;

  const handleBlur = () => {
    if (passInput.value != passInputTwo.value) {
      label.classList.add("error");
    } else if (label.classList.contains("error")) {
      label.classList.remove("error");
    }
  };

  passInput.addEventListener("blur", handleBlur);
  passInputTwo.addEventListener("blur", handleBlur);
});
