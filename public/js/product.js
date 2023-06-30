// & LINK TO THE PRODUCT LIST PAGE
const add_button_link = document.getElementById('cancel-button-link');

add_button_link.addEventListener('click', () => {
  window.location.href = '/test-task-php2.0/';
});

// & SWITCH FORM INPUTS
// Select option element
const productType_input = document.getElementById('productType-input');

// Default 1st option selected at the start
const defaultValue = productType_input.options[0].value;

// Get the category specific divs
const categoryDivs = document.getElementsByClassName('input-spec');

// Function to disable the form inputs inside the specified div
const disableFormInputs = (div) => {
    const inputs = div.getElementsByTagName('input');
    for (let i = 0; i < inputs.length; i++) {
      if (!inputs[i].classList.contains('unit')) {
        inputs[i].value = ''; // Clear input value
      }
      inputs[i].disabled = true; // Disable input
    }
  };

// Function to enable the form inputs inside the specified div
const enableFormInputs = (div) => {
  const inputs = div.getElementsByTagName('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false; // Enable input
  }
};

// Function to toggle visibility based on selected value
const toggleVisibility = (selectedValue) => {
  for (let i = 0; i < categoryDivs.length; i++) {
    if (categoryDivs[i].id === `${selectedValue}-input-spec`) {
      categoryDivs[i].classList.remove('hidden'); // Show the selected category div
      enableFormInputs(categoryDivs[i]); // Enable inputs inside the selected category div
    } else {
      categoryDivs[i].classList.add('hidden'); // Hide other category divs
      disableFormInputs(categoryDivs[i]); // Disable inputs inside other category divs
    }
  }
};

// On change of the select element
productType_input.addEventListener('change', () => {
  const selectedValue = productType_input.value;

  toggleVisibility(selectedValue);
});

// On page load, apply the same behavior to the default value
toggleVisibility(defaultValue);
