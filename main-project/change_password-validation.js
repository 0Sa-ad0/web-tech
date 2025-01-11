function isValidForm (event) {
  event.preventDefault() // Prevent the default form submission behavior

  console.log(event.target.value)

  console.log('isValid or JS Validation function is called')
  const currentPassword = document.getElementById('currentPassword').value
  const newPassword = document.getElementById('newPassword').value
  const confirmPassword = document.getElementById('confirmPassword').value

  const errorElement = document.getElementById('passwordChangeError')
  errorElement.innerHTML = ''

  let isValid = true

  if (
    currentPassword.trim() === '' ||
    newPassword.trim() === '' ||
    confirmPassword.trim() === ''
  ) {
    errorElement.innerHTML = 'Please fill out all fields.'
    errorElement.style.color = '#880808'
    console.log('valid' + isValid)

    isValid = false
  } else {
    // Make AJAX request
    console.log('valid')
    updatePasswordAjax(currentPassword, newPassword, confirmPassword)
  }

  return isValid
}

function updatePasswordAjax (currentPassword, newPassword, confirmPassword) {
  const xhr = new XMLHttpRequest()
  const form = new FormData(document.getElementById('changePasswordForm'))

  xhr.open('POST', 'change_password.php', true) 
  xhr.onreadystatechange = function () {
    // console.log('ReadyState:', xhr.readyState)
    // console.log('Status:', xhr.status)

    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response here, if needed
      console.log('Password update successful!')
    }
  }

  xhr.send(form)
}