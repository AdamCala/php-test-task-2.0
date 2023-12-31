// & MASS DELETE ACTION
const delete_button_action = document.getElementById('delete-product-btn');

delete_button_action.addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked'); 
    const checkedIds = Array.from(checkboxes).map(checkbox => checkbox.name);

    fetch('https:/api/del', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ SKU: checkedIds })
    })
    .then(response => {
        if (response.ok) {
            console.log('POST request successful');
            window.location.href = '/';
        } else {
            throw new Error('Error making the POST request');
        }
    })
    .catch(error => {
        console.error(error);
    });
});