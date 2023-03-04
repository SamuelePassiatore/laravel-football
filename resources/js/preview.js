const placeholder = "https://marcolanci.it/utils/placeholder.jpg";
const logo = document.getElementById('logo');
const preview = document.getElementById('preview');

logo.addEventListener('input', () => {
  preview.src = logo.value || placeholder;
})