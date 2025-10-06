(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})();


  $(document).ready(function() {
      setTimeout(function() {
        $(".alert").alert('close');
      }, 2000);
    });



const phoneInput = document.querySelector("#phone");
const iti = intlTelInput(phoneInput, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("us"));
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    separateDialCode: false, // Le code pays fait partie du numéro
    nationalMode: false, // Force le format international
    autoFormat: true, // Formatage automatique
});