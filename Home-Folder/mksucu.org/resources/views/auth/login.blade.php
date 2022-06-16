
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
  <form method="POST" action="{{ route('login') }}" id="formLogin">
      @csrf
 <h1>
   <a><x-application-logo/></a>
  </h1>  
<!-- Validation Errors -->
<x-auth-validation-errors class="alert alert-danger" :errors="$errors" />
<p style="color:gray;font-style:italic;font-size:12px;text-align:center">{{config('app.name')}} Member Login Page</p>
<section class="text_field">
    <input type="email" name="email" :value="old('email')" required autofocus autocomplete="off" id="email">
  
    <label for="email">Enter your email</label>
  </section>
  <section class="text_field">
    <input type="password" name="password" required autocomplete=off" id="password">

    <label for="password">Enter your password</label>
   </section>

    <!-- Remember Me -->

    <input id="remember_me" type="checkbox" name="remember">
    <span style="margin-left:2px"for="remember_me">{{ __('Remember me') }}</span>

    <button type="submit" id="button">Login</button>

      @if (Route::has('password.request'))
          <a  href="{{ route('password.request') }}" class="pass" style="">
              {{ __('Forgot your password?') }}
          </a>
      @endif
      <div class="signup_link">
      <a href="{{route('register')}}">I am a new Member?</a>
      </div>
  </form>

  <x-developer-card/>

</section>
  <script>
  
  const form ={
    email:document.getElementById('email'),
    password:document.getElementById("password"),
    button:document.getElementById('button')
  }

document.addEventListener('keydown', ()=>{
   if(form.email.value !=''){
    form.button.style="color:#e9f4fb;--btn-bg-color:var(--first-color)";
  }
});

 
 formLogin.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{ route('login') }}", {
      method: 'POST',
      body: new FormData(formLogin)
    });

     location.href = "{{route('dashboard')}}";

  };


</script>

</x-guest-layout>
