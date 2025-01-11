function isValidUpdateRiderForm () {
  console.log('JS Validation function is called')
  const name = document.getElementById('name').value
  const email = document.getElementById('email').value
  const phone = document.getElementById('phone').value
  const dob = document.getElementById('dob').value
  const gender = document.getElementById('gender').value
  const address = document.getElementById('address').value

  const nameError = document.getElementById('name-error')
  const emailError = document.getElementById('email-error')
  const phoneError = document.getElementById('phone-error')
  const dobError = document.getElementById('dob-error')
  const genderError = document.getElementById('gender-error')
  const addressError = document.getElementById('address-error')

  const errorContainer = document.getElementById('error-container')
  errorContainer.innerHTML = ''


  let isValid = true

  if (name.trim() === '') {
    nameError.innerHTML = 'Name is required'
    nameError.style.color = '#880808'
    isValid = false
  }

  if (email.trim() === '') {
    emailError.innerHTML = 'Email is required'
    emailError.style.color = '#880808'
    isValid = false
  }

  if (phone.trim() === '') {
    phoneError.innerHTML = 'Phone is required'
    phoneError.style.color = '#880808'
    isValid = false
  }

  if (dob.trim() === '') {
    dobError.innerHTML = 'Date of Birth is required'
    dobError.style.color = '#880808'
    isValid = false
  }

  if (gender.trim() === '') {
    genderError.innerHTML = 'Gender is required'
    genderError.style.color = '#880808'
    isValid = false
  }

  if (address.trim() === '') {
    addressError.innerHTML = 'Address is required'
    addressError.style.color = '#880808'
    isValid = false
  }

  return isValid
}
