<x-guest-layout>
   <style>
  :root{
    --first-color:#2691d9;
    --first-color-alt:#2691d9;
  }
  body{
    margin:0;
    padding:0;
    font-family:montserrat;
    background:linear-gradient(120deg,#2980b9,#8e44ad);
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
  outline:none;
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

#last-section{
  display:none;
}

  </style>
    <section class="center">
        <form method="POST" action="{{ route('password.update') }}">
          <div class="reset-password-form">
         <h1>
   <a><x-application-logo/></a>
  </h1> 
          <!-- Validation Errors -->
          <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
         
            <section class="text_field">
           <!-- Email Address -->
                <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </section>

            <!-- Password -->
             <section class="text_field">
                <input id="password" type="password" name="password" placeholder="Set your password"required />
            </section>
            <!-- Confirm Password -->
             <section class="text_field">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your Password"required />
                <button type="submit">Reset Password</button>
              </section>
        </form>
  <x-developer-card/>
</section>
</x-guest-layout>
