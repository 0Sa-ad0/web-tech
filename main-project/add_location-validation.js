function isValidLocationForm() {
    console.log('JS Validation function is called');
    const startingPoint = document.getElementById('starting_point').value;
    const destination = document.getElementById('destination').value;

    const startingPointError = document.getElementById('startingPointError');
    const destinationError = document.getElementById('destinationError');

    startingPointError.innerHTML = '';
    destinationError.innerHTML = '';

    let isValid = true;

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
