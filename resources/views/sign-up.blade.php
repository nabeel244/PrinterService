<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../user/style.css">
  </head>
  <body style="background-color: #FAFBFE;">
    <div class="container Login_countainer" id="myButtonContainer">
      <div class="row mt-5">
        <div class="col-12 text-center px-0">
          <a href="#" class="Register_button" onclick="loginOrCreateAccount('myCreateAccountContainer')">Create Account</a>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center px-0">
          <a href="#" class="Register_button Register_button--secondary" onclick="loginOrCreateAccount('myLoginContainer')">Login</a>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <img class="Login_img" src="../images/image-removebg-preview.svg" alt="">
        </div>
      </div>
  </div>
  <div class="container CreateAccountContainer hide-container" id="myCreateAccountContainer">
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
        <h1 class="CreateAccountContainer__Heading">Create Account</h1>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center">
        <img class="Login_img" src="../images/image-removebg-preview.svg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <form action="/action_page.php">
          <select class="CreateAccountContainer__Select" name="cars" id="selection" onchange="toggleInputField()">
        <option value="volvo">Register as user</option>
            <option value="opel">Register as printer shop</option>
          </select>
        </form>

      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" class="form-control CreateAccountContainer__Input1" placeholder="Name">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" class="form-control CreateAccountContainer__Input2" placeholder="Surname">
      </div>
    </div>
    <div class="row printerShopAddress d-none">
      <div class="col-12 text-center px-0">
        <input type="text" class="form-control CreateAccountContainer__Input2" placeholder="Address">
      </div>
    </div>
    <div class="row">
      <div class="col-12 px-0 CreateAccountContainer__Colphonecode">
      <form action="/action_page.php">
      <select class="CreateAccountContainer__Selectphonecode" name="phonecode" id="phonecode">
          <option value="pak">+92</option>
          <option value="ind">+91</option>
          <option value="ksa">+96</option>
        </select>
      </form>
      <input type="text" class="form-control CreateAccountContainer__Inputphonecode" placeholder="Whats app">
    </div>
  </div>
    <div class="row">
        <div class="col-12 px-0 CreateAccountContainer__Colphonecode">
        <form action="/action_page.php">
        <select class="CreateAccountContainer__Selectphonecode" name="phonecode" id="phonecode">
            <option value="pak">+92</option>
            <option value="ind">+91</option>
            <option value="ksa">+96</option>
          </select>
        </form>
        <input type="text" class="form-control CreateAccountContainer__Inputphonecode" placeholder="Mobile">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="email" class="form-control CreateAccountContainer__Input2" placeholder="Email">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" class="form-control CreateAccountContainer__Input2" placeholder="Password">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" class="form-control CreateAccountContainer__Input2" placeholder="Confirm You Password">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
    <div class="form-check d-inline-flex align-items-center">
      <input style="width: 2rem; height: 2rem;" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" style="display: inline-flex;
      align-items: center; margin-left: 1rem; font-size: 1.5rem;" for="flexCheckDefault">
        Accept  <a href="" class="ms-2">Terms and Conditions</a>
      </label>
    </div>
  </div>
</div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0 mt-5">
        <a href="#" class="Register_button Register_button--CreateAccountContainer" onclick="loginOrCreateAccount('myButtonContainer')">Create Account</a>
      </div>
    </div>
  </div>
  <script>
    const toggleInputField = () => {
      let printerShopAddress = document.querySelector('.printerShopAddress');
      let selection = document.querySelector('#selection');
      console.log(selection.value);
      selection.value === 'opel' && printerShopAddress.classList.remove('d-none');
      selection.value === 'volvo' && printerShopAddress.classList.add('d-none');
    }
  </script>
  <div class="container LoginContainer hide-container" id="myLoginContainer">
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
        <h1 class="LoginContainer__Heading">Login Into Software</h1>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center">
        <img class="Login_img" src="../images/image-removebg-preview.svg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" class="form-control LoginContainer__Input1" placeholder="Email or Phone Number">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" class="form-control LoginContainer__Input2" placeholder="Password">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
       <a class="fs-3" style="text-decoration-color: #7C5CC4; color: #7C5CC4;" href="">Forgotten Password ?</a>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0 mt-3">
        <a href="homepage.html" class="Register_button Register_button--LoginContainer">Login</a>
      </div>
    </div>
  </div>
  <script>
    const loginOrCreateAccount = (id) => {
      let containers = document.querySelectorAll('.container');
      containers.forEach((container)=>{
        container.classList.add('hide-container');
      })
      let showContainer = document.querySelector(`#${id}`);
      showContainer.classList.remove('hide-container');
    }
  </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
