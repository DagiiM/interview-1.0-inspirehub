<x-guest-layout>

  <style>
  body{
      margin:0;
      padding:0;
      font-family:montserrat;
      background-color:var(--first-color);
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

   .center form{
      padding:10px 20px;
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

div  p{
    font-style:italic;
    text-align: left;
    font-size: 15px;
  }
  input{
    border: 0;
    outline: 0;
    background: #edf2f7;
    width:100%;
    margin: 2% 0;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
  }
 form button[type="submit"]{
    width:100%;
    margin: 2% 0;
    border-radius: 25px;
    padding: 8px;
    border: transparent;
    outline: 0;
    color:#fff;
    font-size:16px;
  }
  form .resend-btn{
      background-color: var(--first-color);
  }
  form .resend-btn:hover, form .resend-btn:focus{
      background-color: var(--first-color);
  }
  form .logout-btn{
      background-color: hsl(341deg 78% 35%);
  }
  form button:hover, form button:focus{
    outline:var(--first-color);
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
  
  </style>


        <section class="center">

            <form method="POST" action="{{ route('verification.send') }}">
                <h1>
                <a href="/" >
                    <x-application-logo  />
                </a>
              </h1>
                <div>
                  @if (session('status') == 'verification-link-sent')
                  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                      <x-icon type="success" icon="success"></x-icon>
                      <div>
                        A new verification link has been sent to the email address you provided during registration.
                      </div>
                  </div>

                  @endif

                <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. </p>

                @csrf
                    <button type="submit" class="resend-btn">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" style="width:100%;margin:0;padding:0">
                @csrf
                <button type="submit" style="outline:none !important;" class="logout-btn">Log me out </button>
            </form>
          
        </section>


</x-guest-layout>
