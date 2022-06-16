<x-guest-layout>
<style>
.reset-password-form-container{
    background: #edf2f7;
    padding:5% 20%;
    height:100vh;
    overflow: hidden;
}
.reset-password-form center{
  width:250px;
  height:250px;
  margin-bottom: -95px;
}
.reset-password-form{
  background: #fff;
  width:65%;
  padding: 1%;
  margin: 2%;
}

.reset-password-form p{
  font-style: italic;
  text-align: left;
  font-size: 12px;
}
.reset-password-form input{
  border: 0;
  outline: 0;
  background: #edf2f7;
  width:100%;
  margin: 2% 0;
  padding: 5px;
  border-radius: 5px;
  text-align: center;
}
.reset-password-form button{
  width:100%;
  margin: 2% 0;
  background: skyblue;
  border-radius: 5px;
  padding: 8px;
}
@media(max-width:900px){
  .reset-password-form-container{
      padding:5% 18%;
  }
  .reset-password-form{
    width:75%;
    margin: 2% 0;
  }
}
@media(max-width:800px){
  .reset-password-form-container{
      padding:5% 16%;
  }
  .reset-password-form{
    width:85%;
    margin: 3% 0;
  }
}
@media(max-width:700px){
  .reset-password-form-container{
      padding:5% 13%;
  }
  .reset-password-form{
    width:90%;
  }
}
@media(max-width:600px){
  .reset-password-form-container{
      padding:5% 8%;
  }
  .reset-password-form{
    width:95%;
  }
}
@media(max-width:500px){
  .reset-password-form-container{
      background: 0;
      padding:10% 0;
  }
  .reset-password-form{
    width:97%;
  }
}

</style>

<section class="reset-password-form-container">
<center>
        <form method="POST" action="{{ route('password.confirm') }}">
          <div class="reset-password-form">
          <center>
            <a href="/">
                <x-application-logo/>
            </a>
          </center>
          <!-- Validation Errors -->
            <x-auth-validation-errors class="alert-danger alert" :errors="$errors" />
            <p>This is a secure area of the application. Please confirm your password before continuing.</p>
            @csrf
            <!-- Password -->

                <input id="password" class="block mt-1 w-full"type="password"  name="password" placeholder="Enter Your Password" required autocomplete="current-password" />

                <button type="submit"> Confirm</button>
          </div>
        </form>
      </center>
    </section>
</x-guest-layout>
