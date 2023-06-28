// & SAVE PRODCUT ACTION
const save_button_action = document.getElementById('save-button-action');

save_button_action.addEventListener('click', () => {
    console.log('test');
    const rawFormData = document.getElementById('product_form');
    const formData = new FormData(rawFormData);
    const formDataArray = Array.from(formData);
    const simplifiedFormData = {};

    for (let [key, value] of formData.entries()) {
        simplifiedFormData[key] = value;
    }
    
    fetch('test-task-php2.0/api/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(simplifiedFormData) 
    })
    .then(response => {
        if (response.ok) {
            console.log('POST request successful');
        } else {
            throw new Error('Error making the POST request');
        }
    })
    .catch(error => {
        console.error(error);
    });
});