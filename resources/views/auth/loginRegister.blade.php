<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body style="background-color: #FAFBFE;">
    @include('partials.sessionMessage')
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
          <img class="Login_img" src="{{ asset('images/image-removebg-preview.svg') }}" alt="">
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
        <img class="Login_img" src="{{ asset('images/image-removebg-preview.svg') }}" alt="">
      </div>
    </div>
    <form id="createUser">

    <div class="row">
      <div class="col-12 text-center px-0">
          <select class="CreateAccountContainer__Select" name="user_type" id="selection" onchange="toggleInputField()">
        <option value="user">Register as user</option>
            <option value="shopOwner">Register as printer shop</option>
          </select>
      </div>
      <span class="text-danger text-center" id="user-type-error"></span>
    </div>

    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" name="name" class="form-control CreateAccountContainer__Input1" placeholder="Name">
      </div>
      <span class="text-danger text-center" id="name-error"></span>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" name="surname" class="form-control CreateAccountContainer__Input2" placeholder="Surname">
      </div>

    </div>
    <div class="row printerShopAddress d-none">
      <div class="col-12 text-center px-0">
        {{-- <input type="text" name="address" class="form-control CreateAccountContainer__Input2" placeholder="Address"> --}}
        <input type="text" name="address" id="autocomplete" class="form-control CreateAccountContainer__Input2" placeholder="Choose Location">
      </div>
      <span class="text-danger text-center" id="address-error"></span>
    </div>
    <div class="row">
      <div class="col-12 px-0 CreateAccountContainer__Colphonecode">

      <select class="CreateAccountContainer__Selectphonecode" name="phonecode_whatsapp" id="phonecoded">
          <option value="+92">+92</option>
          <option value="+91">+91</option>
          <option value="+96">+96</option>
        </select>

      <input type="text" name="whatsapp_number" class="form-control CreateAccountContainer__Inputphonecode" placeholder="Whats app">
    </div>
  </div>
    <div class="row">
        <div class="col-12 px-0 CreateAccountContainer__Colphonecode">

        <select class="CreateAccountContainer__Selectphonecode" name="phonecode_mobile" id="phonecode">
            <option value="+92">+92</option>
            <option value="+91">+91</option>
            <option value="+96">+96</option>
          </select>

        <input type="text" name="mobile" class="form-control CreateAccountContainer__Inputphonecode" placeholder="Mobile">
      </div>
      <span class="text-danger text-center" id="mobile-error"></span>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="email" name="email" class="form-control CreateAccountContainer__Input2" placeholder="Email">
      </div>
      <span class="text-danger text-center" id="email-error"></span>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" name="password" class="form-control CreateAccountContainer__Input2" placeholder="Password">
      </div>
      <span class="text-danger text-center" id="password-error"></span>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" name="password_confirmation"  class="form-control CreateAccountContainer__Input2" placeholder="Confirm You Password">
      </div>
      <span class="text-danger text-center" id="confirm-password-error"></span>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
    <div class="form-check d-inline-flex align-items-center">
      <input style="width: 2rem; height: 2rem;" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" style="display: inline-flex;
      align-items: center; margin-left: 1rem; font-size: 1.5rem;" for="flexCheckDefault">
        Accept  <a href="#" class="ms-2">Terms and Conditions</a>
      </label>

    </div>

  </div>
  <span class="text-danger text-center" id="checkbox-error"></span>
</div>
<input type="text" id="latitude" name="latitude" class="form-control d-none">
<input type="text" name="longitude" id="longitude" class="form-control d-none">

    <div class="row">
      <div class="col-12 text-center px-0">
          <button class="Register_button Register_button--CreateAccountContainer" style="margin-top: 2% !important">Create Account</button>
      </div>
    </div>
    <div class="row">
        <div class="col-12 text-center px-0 mt-5">
          <a href="#" class="Register_button"  onclick="loginOrCreateAccount('myLoginContainer')">Already Have Account</a>
        </div>
      </div>


    <form>

  </div>

  <script>
    const toggleInputField = () => {
      let printerShopAddress = document.querySelector('.printerShopAddress');

      let selection = document.querySelector('#selection');
      selection.value === 'shopOwner' && printerShopAddress.classList.remove('d-none');
      selection.value === 'user' && printerShopAddress.classList.add('d-none');
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
        <img class="Login_img" src="{{ asset('images/image-removebg-preview.svg') }}" alt="">
      </div>
    </div>

        <div class="row success-message d-none" style="width: 50%; margin-left: 25%">
            <span class="col-12 text-center px-0 alert alert-success text-center span-text"></span>
        </div>

    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="text" class="form-control LoginContainer__Input1" id="email-or-phone" name="email_phone" placeholder="Email or Phone Number">
      </div>
      <span class="text-danger text-center" id="login-email-error"></span>
    </div>
    <div class="row">
      <div class="col-12 text-center px-0">
        <input type="password" class="form-control LoginContainer__Input2" id="login_password" name="login_password" placeholder="Password">
      </div>
      <span class="text-danger text-center" id="login-password-error"></span>
    </div>
    <div class="row mt-5">

      <div class="col-12 text-center px-0">
        @if (Route::has('password.request'))
       <a class="fs-3" style="text-decoration-color: #7C5CC4; color: #7C5CC4;" href="{{ route('password.request') }}">Forgotten Password ?</a>
       @endif
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center px-0">
        <button type="submit" id="loginUser" class="Register_button Register_button--LoginContainer" style="margin-top: 2% !important">Login</button>
      </div>
    </div>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script type="text/javascript"
  src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
 <script type="text/javascript">
   google.maps.event.addDomListenerOnce(window, 'load', initialize);

function initialize() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        $('#latitude').val(place.geometry['location'].lat());
        $('#longitude').val(place.geometry['location'].lng());
    });
}

 </script>
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

     <script type="text/javascript">

$("#createUser").submit(function(e){
   var checkbox = $('#flexCheckDefault').is(":checked");
   if(checkbox == false){
    $('#checkbox-error').text('Accept Terms And Conditions');
    return false;
   } else {
    $('#checkbox-error').addClass('d-none');
   }
   var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});
    $.ajax({
        type: 'POST',
        url: "{{ route('register') }}",
        data: formdata,   // here $(this) refers to the ajax object not form

        success:function(response){
              if (response) {
                $('.success-message').removeClass('d-none');
                $('.span-text').text('Created Successfully');
                $("#createUser")[0].reset();
                loginOrCreateAccount('myLoginContainer');
              }
            },
            error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#password-error').text(response.responseJSON.errors.password);
              $('#mobile-error').text(response.responseJSON.errors.mobile);
              $('#address-error').text(response.responseJSON.errors.address);
             }
    });
    e.preventDefault();
});

$("#loginUser").on('click',function(e){
    $('.success-message').addClass('d-none');
    var email_or_phone = $('#email-or-phone').val();
    if(email_or_phone == ''){
        $('#login-email-error').text('Email Or Phone is required');
        return false;
    }else{
        $('#login-email-error').addClass('d-none');
    }
    var password = $('#login_password').val();

    $.ajax({
        type: 'POST',
        url: "{{ route('login.form') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            email_or_phone : email_or_phone,
            password: password
        },
        success:function(response){
                if(response.error == true){
                $('.success-message').removeClass('d-none');
                $('.span-text').text(response.message);
              }else if(response.success == true){
                window.location=response.redirect_url;
              }
            },
            error: function(response) {
              $('#login-email-error').text(response.responseJSON.errors.email);
              $('#login-email-error').text(response.responseJSON.errors.mobile);
              $('#login-password-error').text(response.responseJSON.errors.password);

             }
});
    e.preventDefault();
});

        </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
