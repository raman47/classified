document.addEventListener('DOMContentLoaded', () => {
// Elements
const previewButton = document.getElementById('previewButton');
const previewModal = document.getElementById('previewModal');
const closeModal = document.getElementById('closeModal');
const submitForm = document.getElementById('submitForm');

// Preview Fields
const previewCountry = document.getElementById('previewCountry');
const previewState = document.getElementById('previewState');
const previewCity = document.getElementById('previewCity');
const previewName = document.getElementById('previewName');
const previewEmail = document.getElementById('previewEmail');
const previewPhone = document.getElementById('previewPhone');
const previewAddress = document.getElementById('previewAddress');
const previewPostalCode = document.getElementById('previewPostalCode');
const previewPrice = document.getElementById('previewPrice');
const fileInput = document.getElementById('file_input');
const previewPhoto = document.getElementById('previewPhoto');
const previewYoutubeLink = document.getElementById('previewYoutubeLink');
const previewPlaceOfAd = document.getElementById('previewPlaceOfAd');
const previewPricePlan = document.getElementById('previewPricePlan');

// Initialize Quill Editor
const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ script: 'sub' }, { script: 'super' }],
            [{ indent: '-1' }, { indent: '+1' }],
            [{ direction: 'rtl' }],
            [{ size: ['small', false, 'large', 'huge'] }],
            [{ color: [] }, { background: [] }],
            [{ font: [] }],
            [{ align: [] }],
            ['link', 'image', 'video'],
            ['clean']
        ]
    }
});

// File input change event (for image preview)
fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (event) => {
            previewPhoto.src = event.target.result;
            previewPhoto.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        previewPhoto.src = '';
        previewPhoto.classList.add('hidden');
    }
});

// Show Preview Modal
previewButton.addEventListener('click', () => {
    

        const countrySelect = document.getElementById('country');
        previewCountry.textContent = countrySelect.options[countrySelect.selectedIndex]?.text || 'No Country Selected';

        const stateSelect = document.getElementById('state');
        previewState.textContent = stateSelect.options[stateSelect.selectedIndex]?.text || 'No State Selected';

        const citySelect = document.getElementById('city');
        previewCity.textContent = citySelect.options[citySelect.selectedIndex]?.text || 'No City Selected';

        previewName.textContent = document.getElementById('contact_name').value || 'No Name Provided';
        previewEmail.textContent = document.getElementById('email').value || 'No Email Provided';
        previewPhone.textContent = document.getElementById('phone').value || 'No Phone Number Provided';
        previewAddress.textContent = document.getElementById('address').value || 'No Address Provided';
        previewPostalCode.textContent = document.getElementById('postal_code').value || 'No Postal Code Provided';
        document.getElementById('previewDescription').innerHTML = quill.root.innerHTML || 'No Description Provided'; // Set Quill editor content
        previewPrice.textContent = document.getElementById('price').value || 'No Price Provided';
        previewYoutubeLink.textContent = document.getElementById('youtube').value || 'No YouTube Link Provided';

        const selectedPlaceOfAd = document.querySelector('input[name="ad_position"]:checked');
        previewPlaceOfAd.textContent = selectedPlaceOfAd ? selectedPlaceOfAd.value : 'No Position Selected';

        const selectedPricePlan = document.querySelector('input[name="price_plan"]:checked');
        previewPricePlan.textContent = selectedPricePlan ? selectedPricePlan.value : 'No Price Plan Selected';

        previewModal.classList.remove('hidden');

});

// Close Modal
closeModal.addEventListener('click', () => {
    previewModal.classList.add('hidden');
});

// Form Submission
  const form = document.getElementById('form');
  form.addEventListener('submit', (event) => {
      event.preventDefault(); // Prevent default form submission
      const content = document.querySelector('input[name="description"]');
      content.value = quill.root.innerHTML; // Save editor content to hidden input

      // Submit the form after setting the content
      form.submit();
  });
});



    $(document).ready(function () {
        $('#country').on('change', function () {
            var country_id = $(this).val();
            $('#state').html('<option value="">Select State</option>');
            $('#city').html('<option value="">Select City</option>');

            if (country_id) {
                $.ajax({
                    url: "{{ route('getStates', '') }}/" + country_id,
                    type: 'GET',
                    success: function (states) {
                        $.each(states, function (key, state) {
                            $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                        });
                    }
                });
            }
        });

        $('#state').on('change', function () {
            var state_id = $(this).val();
            $('#city').html('<option value="">Select City</option>');

            if (state_id) {
                $.ajax({
                    url: "{{ route('getCities', '') }}/" + state_id,
                    type: 'GET',
                    success: function (cities) {
                        $.each(cities, function (key, city) {
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    }
                });
            }
        });
    });

