function isValidBookingForm() {
    console.log('JS Validation function is called')
    const transportation = document.getElementById('transportation').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const guests = document.getElementById('guests').value;
    const startingPoint = document.getElementById('starting_point').value;
    const destination = document.getElementById('destination').value;

    const errors = document.getElementById('error-container');
    errors.innerHTML = '';
    errors.style.color = '#880808';  

    let isValid = true;

    const currentDateTime = new Date();
    const inputDateTime = new Date(`${date} ${time}`);

    if (inputDateTime <= currentDateTime) {
        errors.innerHTML += '<li>Selected date and time must be in the future</li>';
        isValid = false;
    }

    if (!transportation) {
        errors.innerHTML += '<li>Service/Location is required</li>';
        isValid = false;
    }
    if (!date) {
        errors.innerHTML += '<li>Date is required</li>';
        isValid = false;
    }
    if (!time) {
        errors.innerHTML += '<li>Time is required</li>';
        isValid = false;
    }
    if (!name) {
        errors.innerHTML += '<li>Name is required</li>';
        isValid = false;
    }
    if (!phone) {
        errors.innerHTML += '<li>Phone Number is required</li>';
        isValid = false;
    }
    if (isNaN(guests) || guests < 1) {
        errors.innerHTML += '<li>Number of Guests/Participants must be at least 1</li>';
        isValid = false;
    }
    if (!startingPoint) {
        errors.innerHTML += '<li>Starting Point is required</li>';
        isValid = false;
    }
    if (!destination) {
        errors.innerHTML += '<li>Destination is required</li>';
        isValid = false;
    }

    return isValid;
}
