function isValidUpdateDriverForm () {
  console.log('JS Validation function is called')
  const name = document.getElementById('name').value
  const email = document.getElementById('email').value
  const license = document.getElementById('license').value
  const driver_id = document.getElementById('driver_id').value; 

  const errors = document.getElementById('error-container')
  errors.innerHTML = ''

  if (errors) {
    errors.style.color = '#880808'
  } else {
    console.error('ErrorElement not found in the document.')
  }

  let isValid = true

  if (name.trim() === '') {
    errors.innerHTML += '<li>Name is required</li>'
    isValid = false
  }

  if (email.trim() === '') {
    errors.innerHTML += '<li>Email is required</li>'
    isValid = false
  }

  if (license.trim() === '') {
    errors.innerHTML += '<li>License Number is required</li>'
    isValid = false
  }

  if (isValid) {
    let xhttp = new XMLHttpRequest()

    xhttp.open('POST', 'update_driver.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('demo').innerHTML = this.responseText
      }
    }

    let params = 'name=' + name + '&email=' + email + '&license=' + license + '&driver_id=' + driver_id;
    console.log(params);
    xhttp.send(params)
  }

  return true
}
