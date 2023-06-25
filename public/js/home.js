// & LINK TO THE PRODUCT ADD PAGE
const add_button_link = document.getElementById('add-button-link');

add_button_link.addEventListener('click',()=>{
    window.location.href = '/test-task-php2.0/add-product';
});

// & MASS DELETE ACTION
const delete_button_action = document.getElementById('delete-button-action');

delete_button_action.addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked'); 
    const checkedIds = Array.from(checkboxes).map(checkbox => checkbox.name);

    fetch('test-task-php2.0/api/del', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ SKU: checkedIds })
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