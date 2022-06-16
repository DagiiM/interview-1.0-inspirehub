<style>
.forgot-password-form-container{
    background: #edf2f7;
    padding:5% 20%;
    height:100vh;
    overflow: hidden;
}
.forgot-password-form center{
  width:250px;
  height:250px;
  margin-bottom: -95px;
}
.forgot-password-form{
  background: #fff;
  width:65%;
  padding: 1%;
  margin: 2%;
}

.forgot-password-form p{
  font-style: italic;
  text-align: left;
  font-size: 12px;
}
.forgot-password-form input{
  border: 0;
  outline: 0;
  background: #edf2f7;
  width:100%;
  margin: 2% 0;
  padding: 5px;
  border-radius: 5px;
  text-align: center;
}
.forgot-password-form button{
  width:100%;
  margin: 2% 0;
  background: skyblue;
  border-radius: 5px;
  padding: 8px;
}
@media(max-width:900px){
  .forgot-password-form-container{
      padding:5% 18%;
  }
  .forgot-password-form{
    width:75%;
    margin: 2% 0;
  }
}
@media(max-width:800px){
  .forgot-password-form-container{
      padding:5% 16%;
  }
  .forgot-password-form{
    width:85%;
    margin: 3% 0;
  }
}
@media(max-width:700px){
  .forgot-password-form-container{
      padding:5% 13%;
  }
  .forgot-password-form{
    width:90%;
  }
}
@media(max-width:600px){
  .forgot-password-form-container{
      padding:5% 8%;
  }
  .forgot-password-form{
    width:95%;
  }
}
@media(max-width:500px){
  .forgot-password-form-container{
      background: 0;
      padding:10% 0;
  }
  .forgot-password-form{
    width:97%;
  }
}

</style>


<style>
  :root{
    --first-color:#2691d9;
    --first-color-alt:#2691d9;
  }
  body{
    margin:0;
    padding:0;
    font-family:montserrat;
    height:100%;
    overflow-x:hidden;
    overflow-y:auto;
  }
  .center{
    position: absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    width:var(--width,400px);
    background:#fff;
    border-radius:10px;
  }
@media (max-width:480px){
  body{
    background:#fff;
  }
  .center{
    --width:100%;
  }
   .center form{
      padding:10px 20px;
  }
}
  .center h1{
    text-align:center;
  }
  
  .center form{
    padding:10px 30px;
    box-sizing:border-box;
  }
.dagii-logo{
  height:100px
}
  form .text_field{
    position: relative;
  /*  border-bottom:2px solid #adadad; */
    margin:20px 0;
  }
  .text_field input,.text_field select{
    width:100%;
    padding:0 5px;
    height:40px;
    font-size:16px;
    border:none;
    background:none;
    outline:none;
    margin:0;
    border-radius:0;
    text-align:left;
    border-bottom:2px solid #adadad;
  }
  .text_field input:focus,.text_field select:focus{
    border-bottom:2px solid var(--first-color);
  }
    .text_field label{
      position:absolute;
      top:50%;
      left:5px;
      color:#adadad;
      transform:translateY(-50%);
      font-size:16px;
      pointer-events: none;
      transition: 0.5s;
    }
 

    .text_field input:focus ~ label,
     .text_field input:valid ~ label{
       top:-5px;
       color:var(--first-color);
     }

.pass{
  margin:-5px 0 20px 5px;
  color:#a6a6a6;
  cursor:pointer;
}
.pass:hover{
  text-decoration:underline;
}

button[type="submit"],#continue{
  --_btn-bg-color:var(--btn-bg-color,#f3f3f3);
  --_color:var(--color,silver);
  width:100%;
  height:40px;
  border:1px solid var(--_btn-bg-color);
  background:var(--_btn-bg-color);
  border-radius:25px;
  color:var(--_color);
  font-weight:700;
  cursor: var(--cursor,not-allowed);
  pointer-events: all;
  outline:none !important;
  margin:10px 0;
}
#continue > svg{
  --_color:var(--color,silver);
  fill:var(--_color);
}

button[type="submit"]:hover,button[type="submit"]:focus,#continue:hover,#continue:focus{
  border-color:#f3f3f3;
  transition:0.5s;
}

.signup_link{
  margin:5px 0;
  font-size:16px;
  color:#666666;
  text-align:center;
}

.signup_link a{
  color:color;
  text-decoration:none;
}
.signup_link a:hover{
  text-decoration:underline;
}


  </style>

<x-guest-layout>
  <section class="center">

        <form method="POST" action="{{ route('password.email') }}">

          <h1>
            <a>
                <x-application-logo/>
            </a>
          </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

        <p style="color:gray;font-style:italic;font-size:13px;text-align:center;padding-top:5px;">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>
            @csrf

            <!-- Email Address -->
            <section class="text_field">
              <input type="email" name="email" :value="old('email')" id="email" autocomplete="off" required spellCheck="off"/>
              <span></span>
              <label for="email">Enter your email</label>
            </section>
            <button id="continue">Email Password Reset Link 
              <svg xmlns="http://www.w3.org/2000/svg" fill="var(--color)" width="30" height="30" viewBox="0 0 512 512">
              <path d="M322.2 349.7c-3.1-3.1-3-8 0-11.3l66.4-74.4H104c-4.4 0-8-3.6-8-8s3.6-8 8-8h284.6l-66.3-74.4c-2.9-3.4-3.2-8.1-.1-11.2 3.1-3.1 8.5-3.3 11.4-.1 0 0 79.2 87 80 88s2.4 2.8 2.4 5.7-1.6 4.9-2.4 5.7-80 88-80 88c-1.5 1.5-3.6 2.3-5.7 2.3s-4.1-.8-5.7-2.3z"/>
              </svg>
            </button>
        </form>
          <x-developer-card/>
      </section>
<script>
  const user = {
  email:document.getElementById('email'),
};
user.email.addEventListener('keyup', ()=>{
    let EmailAddress = user.email.value;
if(EmailAddress.length > 8){
  
  const next = document.getElementById('continue');
  next.style="cursor:pointer;pointer-events: initial;border-color:var(--first-color);background-color:var(--first-color);--color:#fff";

    validationRequest("GET","{{route('email')}}?email="+EmailAddress);
      user.email.style="border-bottom:2px solid var(--success-color)";
  }
   user.email.style="border-bottom:2px solid var(--first-color)";
});
</script>

</x-guest-layout>
