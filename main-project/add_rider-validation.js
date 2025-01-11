function isValidRiderForm () {
  console.log('JS Validation function is called')
  const name = document.getElementById('name').value
  const email = document.getElementById('email').value
  const phone = document.getElementById('phone').value
  const dob = document.getElementById('dob').value
  const gender = document.getElementById('gender').value
  const address = document.getElementById('address').value

  const nameError = document.getElementById('nameError')
  const emailError = document.getElementById('emailError')
  const phoneError = document.getElementById('phoneError')
  const dobError = document.getElementById('dobError')
  const genderError = document.getElementById('genderError')
  const addressError = document.getElementById('addressError')
  var errorElement = document.getElementById('errorElement')

  nameError.innerHTML = ''
  emailError.innerHTML = ''
  phoneError.innerHTML = ''
  dobError.innerHTML = ''
  genderError.innerHTML = ''
  addressError.innerHTML = ''
  if (errorElement) {
    errorElement.style.color = '#880808'
  }

  let isValid = true

  if (name.trim() === '') {
    nameError.innerHTML = 'Name is required'
    isValid = false
  }

  if (email.trim() === '') {
    emailError.innerHTML = 'Email is required'
    isValid = false
  } else if (!/^\S+@\S+\.\S+$/.test(email)) {
    emailError.innerHTML = 'Invalid email format'
    isValid = false
  }

  if (phone.trim() === '') {
    phoneError.innerHTML = 'Phone is required'
    isValid = false
  }

  if (dob.trim() === '') {
    dobError.innerHTML = 'Date of Birth is required'
    isValid = false
  }

  if (gender.trim() === '') {
    genderError.innerHTML = 'Gender is required'
    isValid = false
  }

  if (address.trim() === '') {
    addressError.innerHTML = 'Present Address is required'
    isValid = false
  }

  return isValid
}
