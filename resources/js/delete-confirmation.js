const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const name = form.getAttribute('data-name');
    const confirm = window.confirm(`Sei sicuro di voler eliminare la squadra ${name} ?`);
    if (confirm) form.submit();
  });
});