function isValidRegistrationForm () {
  console.log('Validation function is running')

  const firstname = document.getElementById('firstname').value
  const lastname = document.getElementById('lastname').value
  const securityquestion = document.getElementById('securityquestion').value
  const securityanswer = document.getElementById('securityanswer').value
  const email = document.getElementById('Email').value
  const username = document.getElementById('username').value
  const password = document.getElementById('password').value
  const confirmpassword = document.getElementById('confirmpassword').value

  const firstnameErrMsg = document.getElementById('firstnameErrMsg')
  const lastnameErrMsg = document.getElementById('lastnameErrMsg')
  const securityquestionErrMsg = document.getElementById(
    'securityquestionErrMsg'
  )
  const securityanswerErrMsg = document.getElementById('securityanswerErrMsg')
  const emailErrMsg = document.getElementById('emailErrMsg')
  const usernameErrMsg = document.getElementById('usernameErrMsg')
  const passwordErrMsg = document.getElementById('passwordErrMsg')
  const confirmpasswordErrMsg = document.getElementById('confirmpasswordErrMsg')

  const errorContainer = document.querySelector('.error-container')
  // errorContainer.innerHTML = ''
  // errorContainer.style.color = '#880808'

  let isValid = true

  if (firstname.trim() === '') {
    firstnameErrMsg.innerHTML = 'First Name is required'
    isValid = false
  }

  if (lastname.trim() === '') {
    lastnameErrMsg.innerHTML = 'Last Name is required'
    isValid = false
  }

  if (securityquestion.trim() === '') {
    securityquestionErrMsg.innerHTML = 'Security Question is required'
    isValid = false
  }

  if (securityanswer.trim() === '') {
    securityanswerErrMsg.innerHTML = 'Security Answer is required'
    isValid = false
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!email.match(emailPattern)) {
    emailErrMsg.innerHTML = 'Please provide a valid email address'
    isValid = false
  }

  const usernamePattern = /^[a-zA-Z0-9]+$/
  if (!username.match(usernamePattern)) {
    usernameErrMsg.innerHTML = 'Username must contain only letters and digits'
    isValid = false
  }

  if (password.length < 5) {
    passwordErrMsg.innerHTML = 'Password must be at least 5 characters long'
    isValid = false
  }

  if (confirmpassword !== password) {
    confirmpasswordErrMsg.innerHTML =
      'Password and Confirm Password do not match'
    isValid = false
  }

  return isValid
}
