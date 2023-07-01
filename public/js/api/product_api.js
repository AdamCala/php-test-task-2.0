// & SAVE PRODCUT ACTION
const save_button_action = document.getElementById('save-button-action');

save_button_action.addEventListener('click', () => {
    
    // * Get form data
    const rawFormData = document.getElementById('product_form');
    const formData = new FormData(rawFormData);

    // ! Grab an error container and craete variable that checks if there are any errors
    const errorContainer = document.getElementById('error-container');
    errorContainer.textContent = '';

    // ! Clear error container
    let error = false;

    // ^ Array of input values that have to be a number
    const numberElements = document.getElementsByClassName('number-input');
    const numberElementsArray = [];
    for (let element of numberElements) {
        const id = element.id;
        const firstPart = id.split('-')[0];
        numberElementsArray.push(firstPart);
    }

    // ^ Itarate over the input values and if the value has to be a number check if it is a number
    for (let entry of formData.entries()) {
        if (numberElementsArray.includes(entry[0])) {
        if (isNaN(Number(entry[1]))) {
                error = true;
            }
        }
    }
    console.log(error);

    const simplifiedFormData = Object.fromEntries(formData);
    console.log(simplifiedFormData);
    
    // * If there an error has not occurred send an api call, otherwise display an error
    if(!error){
        fetch('test-task-php2.0/api/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(simplifiedFormData) 
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Assuming the response contains JSON data
            } else {
                throw new Error('Error making the POST request');
            }
        })
        .then(data => {
            // Handle the response data
            if (data === null) {
                // Redirect to test-task-php2.0/ route
                window.location.href = '/test-task-php2.0/';
            } else {
                // Display the array contents in errorContainer
                errorContainer.innerHTML = ''; // Clear previous content

                data.forEach(item => {
                    const p = document.createElement('p');
                    p.textContent = item;
                    errorContainer.appendChild(p);
                });
            }
        })
        .catch(error => {
            console.error(error);
        });
    }else{
        errorContainer.textContent = 'Please, provide the data of indicated type';
    }

    
});

