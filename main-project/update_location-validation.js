function isValidUpdateLocationForm() {
    console.log('Function is called');
    const locationId = document.getElementById('location_id').value;
    const startingPoint = document.getElementById('starting_point').value;
    const destination = document.getElementById('destination').value;

    const errorContainer = document.getElementById('error-container');  

    const locationIdError = document.getElementById('location_id-error');
    const startingPointError = document.getElementById('starting_point-error');
    const destinationError = document.getElementById('destination-error');

    errorContainer.innerHTML = '';

    let isValid = true;

    if (locationId.trim() === '') {
        locationIdError.innerHTML = 'Location ID is required';
        locationIdError.style.color = '#880808';  
        isValid = false;
    } 

    if (startingPoint.trim() === '') {
        startingPointError.innerHTML = 'Starting Point is required';
        startingPointError.style.color = '#880808';  
        isValid = false;
    } 

    if (destination.trim() === '') {
        destinationError.innerHTML = 'Destination is required';
        destinationError.style.color = '#880808';  
        isValid = false;
    } 

    return isValid;
}

