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

<x-guest-layout>
    
    <x-loader/>

  <section class="center">

  <form method="POST" action="{{ route('users.store') }}" enctype="application/x-www-form-urlencoded" id="formRegister">
          @csrf
    <h1>
      <a>
          <x-application-logo/>
      </a>
    </h1>

  <!-- Validation Errors -->

  <x-auth-validation-errors class="alert alert-danger" role="alert" :errors="$errors" />
<p style="color:gray;font-style:italic;font-size:12px;text-align:center">{{config('app.name')}} Member Registration Page</p>
<section id="first-section">
   <section class="text_field">
 <input name="firstname" type="text" id="firstname" required autofocus autocomplete="off">
   
 <label for="firstname">First Name</label>
   </section>

   <section class="text_field">
   <input name="lastname" type="text" id="lastname" required autocomplete="off">
    
 <label for="lastname">Last Name</label>
   </section>

   <section class="text_field">
 <input name="mobile" type="tel" id="mobile" required autocomplete="off"/>
  
 <label for="mobile">Mobile Number</label>
   </section>

   <section class="text_field">
    <input type="email" name="email" :value="old('email')" id="email" autocomplete="off" required spellCheck="off"/>
    <span></span>
    <label for="email">Enter your email</label>
  </section>
<button id="continue">Continue 
  <svg xmlns="http://www.w3.org/2000/svg" fill="var(--color)" width="30" height="30" viewBox="0 0 512 512">
  <path d="M322.2 349.7c-3.1-3.1-3-8 0-11.3l66.4-74.4H104c-4.4 0-8-3.6-8-8s3.6-8 8-8h284.6l-66.3-74.4c-2.9-3.4-3.2-8.1-.1-11.2 3.1-3.1 8.5-3.3 11.4-.1 0 0 79.2 87 80 88s2.4 2.8 2.4 5.7-1.6 4.9-2.4 5.7-80 88-80 88c-1.5 1.5-3.6 2.3-5.7 2.3s-4.1-.8-5.7-2.3z"/>
  </svg>
</button>
</section>
<section id="last-section">
 
    <button style="outline:0;border:0;background:transparent;font-size:16px;margin:1px;color:var(--first-color);align-items:center;display:flex" id="previous">
  <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="var(--first-color)" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="arrowhead-left"><rect width="24" height="24" opacity="0" transform="rotate(90 12 12)"/><path d="M11.64 5.23a1 1 0 0 0-1.41.13l-5 6a1 1 0 0 0 0 1.27l4.83 6a1 1 0 0 0 .78.37 1 1 0 0 0 .78-1.63L7.29 12l4.48-5.37a1 1 0 0 0-.13-1.4z"/><path d="M14.29 12l4.48-5.37a1 1 0 0 0-1.54-1.28l-5 6a1 1 0 0 0 0 1.27l4.83 6a1 1 0 0 0 .78.37 1 1 0 0 0 .78-1.63z"/></g></g></svg>
  Previous</button>
   
   <section class="text_field">
   <select name="gender" required id="gender">
      <option :active>Select Your Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
  </section>
   <section class="text_field">
      <input name="bio" type="text" id="bio" autocomplete="off" required/>
       
        <label for="bio">Write Something about yourself</label> 
  </section>

   <section class="text_field">
       <input name="password" type="password" autocomplete="off" required/>
            
         <label for="password">Set your password</label>  
  </section>

   <section class="text_field">
     <input name="password_confirmation" type="password" required autocomplete="off"/>
     
     <label for="password_confirmation">Confirm your password</label>
  </section>
      

<!--Buttons Section-->
       
        <button type="submit" >Create Account</button>
</section>
<section class="signup_link">
         <a href="{{ route('login') }}" >I'm a Member. Login</a>
</section>
<!--End Of Buttons Section-->

</form>
  <x-developer-card/>
</section>

<script>
const user = {
  firstname:document.getElementById('firstname'),
  lastname:document.getElementById('lastname'),
  email:document.getElementById('email'),
  mobile:document.getElementById('mobile'),
  gender:document.getElementById('gender'),
  bio:document.getElementById('bio'),
  password:document.getElementById('password'),
  password_confirmation:document.getElementById('password_confirmation')
};


user.mobile.addEventListener('keyup', ()=>{
 let mobileNumber = user.mobile.value;
  // check mobile field is not empty
  if(mobileNumber != '\0')
  {
    if(mobileNumber.length == 10){
      validationRequest("GET","{{route('mobile')}}?mobile="+mobileNumber);
       user.mobile.style="border-bottom:2px solid var(--success-color)";
    }
    user.mobile.style="border-bottom:2px solid var(--first-color)";
  }
});
user.email.addEventListener('keyup', ()=>{
    let EmailAddress = user.email.value;
if(EmailAddress.length > 8){
    validationRequest("GET","{{route('email')}}?email="+EmailAddress);
      user.email.style="border-bottom:2px solid var(--success-color)";
  }
   user.email.style="border-bottom:2px solid var(--first-color)";
});
user.firstname.addEventListener('keyup', ()=>{
 if(user.firstname.value !=''){
    user.firstname.style="border-bottom:2px solid var(--success-color)";
 }
    user.firstname.style="border-bottom:2px solid var(--first-color)";
});

user.lastname.addEventListener('keyup', ()=>{
  if(user.lastname.value !=''){
    user.lastname.style="border-bottom:2px solid var(--success-color)";
 }
 user.lastname.style="border-bottom:2px solid var(--first-color)";
});

document.addEventListener('keyup', ()=>{
  if(user.firstname.value !='' && user.lastname.value !='' && user.email.value !='' && user.mobile.value !='' )
{
  const next = document.getElementById('continue');
  const previous = document.getElementById('previous');
  const firstSection = document.getElementById('first-section');
  const lastSection = document.getElementById('last-section');

  next.style="cursor:pointer;pointer-events: initial;border-color:var(--first-color);background-color:var(--first-color);--color:#fff";

  previous.addEventListener('click', ()=>{
      firstSection.style="display:block";
      lastSection.style="display:none";
  });
  next.addEventListener('click', ()=>{
      firstSection.style="display:none";
      lastSection.style="display:block";
  });
}
if(user.gender.value !='' && user.bio.value !='')
{
   const submit = document.querySelector('button[type="submit"]'); 
   submit.style="cursor:pointer;pointer-events: initial;border-color:var(--first-color);background-color:var(--first-color);--color:#fff";
}

});


handleRequest = (request)=>{
     flash(request.type, request.message);
};

validationRequest = (method,url)=>{
  var request = new XMLHttpRequest();
  request.onload = function(e) {
    responseObject = null;
    try{
        responseObject = JSON.parse(request.responseText);

       if (request.readyState == 4 && request.status == 200) {
          handleRequest(responseObject);
       }
    }
    catch(e){
        console.log("Could not Parse Json");
    }
  }
  request.open(method, url,true);   
  request.send();
};


formRegister.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{ route('register') }}", {
      method: 'POST',
      body: new FormData(formRegister)
    });

      location.href="{{route('dashboard')}}";
  };

</script>

</x-guest-layout>
