    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
<style>
.user-card{
  display: flex;
  padding-top: 0 !important;
}
.cover-photo{
  position: relative;
}

.details{
  width:100%;
  border: 1px solid #eee;
  justify-content: space-between;
  padding: 10px;
}
.profile-dagii-detail{
  width:35%;
}
.profile-dagii-detail-card{
    width:65%;
    border: 1px solid #eee;
    justify-content: space-between;
}
.user-cover{
  max-height:250px;
  width:100%;
  padding-left: 0;
  padding-right: 0;
}
.user-avatar-dagii{
  height:100px;
  width:100px;
  border-radius: 100%;
  border: 2px solid green;
}
.author-dagii{
  background-color: #fff;
  position: absolute;
  top:32%;
  right:40%;
  height:100px;
  border-radius: 100%;
  border: 2px solid green;
  overflow: hidden;
}

.author-dagii-detail h5{
  color:blue;
  border: 1px solid #eee;
  padding: 2%;
  margin: 1%;
  border-radius: 10px;
  background-color: #eee;
  font-weight: bold;
  text-align: center;
}

.author-dagii-detail a:hover{
  text-decoration: none;
  cursor: pointer;
}
.author-dagii-detail p{
  display: flex;
  justify-content: space-around;
  text-transform: lowercase;
}
.author-dagii-detail p::first-letter{
  text-transform: uppercase;
}
.author-dagii-change-profile-photo{
  border: 1px solid #fff;
  display: flex;
  justify-content: space-between;
  padding: 3%;
  background-color: #eee;
}
.author-dagii-change-profile-photo input{
  border:0;
  outline: 0;
  width:20%;
}
.author-dagii-change-profile-photo button{
  border:0;
  outline: 0;
  width:60%;
  border-radius: 5px;
  padding: 5px;
  text-align: center;
  background-color: skyblue;
  font-weight: 800;
}
.author-dagii-change-profile-photo button:hover{
  background-color: #2d6880;
  color:white;
}
.details input{
  border:0;
  outline: 0;
  width:80%;
  border-radius: 5px;
  margin: 8px 4px;
  padding: 5px;
}
.details button{
  border:0;
  outline: 0;
  width:80%;
  border-radius: 5px;
  margin: 8px 4px;
  padding: 5px;
  text-align: center;
  background-color: skyblue;
  font-weight: 800;
}
.details button:hover{
  background-color: #2d6880;
  color:white;
}
@media(max-width:900px)
{
  .author-dagii-change-profile-photo{
    padding-top: 5%;
    display: flex;
    justify-content:flex-end;
    width:100%;
  }

  .user-card{
    display: block;
  }
  .profile-dagii-detail-card{
    display: block;
  }
  .profile-dagii-detail{
    width:100%;
  }
  .profile-dagii-detail-card{
      width:100%;
  }
  .details input{
    width:99%;
  }
  .details button{
    width:99%;
    margin: 8px 1px;
    padding: 2%;
  }
  .details{
    width:100%;
    padding-inline:10px;
  }

}
@media(max-width:750px){
  .details input{
    width:98%;
  }
  .details{
    width:100%;
  }
}

@media(max-width:600px){
  .author-dagii{
    top:32%;
    right:40%;
  }
  .details input{
    width:98%;
    margin: 8px 1px;
    padding: 2%;
    text-align: left;
  }
  .details{
    flex-basis: 100%;
    display: block;
  }

}
</style>

<x-app-layout>
<?php $data=$user ?>
  <div class="user-card">
    <section class="profile-dagii-detail-card">
      <div class="cover-photo">
                <a href="{{asset('./img/'.$data->cover_image)}}" data-lightbox="mygallary">
                     <img class="user-cover" src="{{asset('./img/'.$data->cover_image)}}" alt="{{$data->firstname}}">
                </a>

                <div class="author-dagii">
                  <a href="{{asset('./img/'.$data->picture)}}" data-lightbox="mygallary">
                    <img class="user-avatar-dagii" src="{{asset('./img/'.$data->picture)}}" alt="{{ $data->firstname}}">
                  </a>
                </div>
                <div class="author-dagii-change-profile-photo">
                  <form method="post" enctype="multipart/form-data" action="{{route('users.update',['user'=>$user])}})}}">
                    @csrf
                    @method('PUT')
                    <input name="picture" type="file" placeholder="Profile Image" value="{{$data->picture}}" required>
                    <button type="submit">Change Photo</button>
                </form>
                </div>
            <div class="author-dagii-detail">
                <h5>MY MINISTRIES</h5>
                @foreach($ministries as $ministry)
                <a href="{{route('ministries.show',['ministry'=>$ministry])}}">
                    <p>{{$ministry->name}}</p>
                </a>
                @endforeach
                <h5>MY ROLES</h5>
                @foreach($roles as $role)
                <a href="{{route('roles.show',['role'=>$role])}}">
                    <p>{{$role->name}}</p>
                </a>
                @endforeach
            </div>
            </div>
    </section>

        <section class="profile-dagii-detail">
          <h2>Edit Profile Details</h2>
                  <div class="details">
                      <form method="POST" action="{{route('users.update',['user'=>$user])}})}}">
                        @csrf
                        @method('PUT')
                        <div>
                        <label for="firstname">First Name</label>
                          <input name="firstname" type="text" placeholder="First Name" value="{{ $data->firstname}}">
                      </div>

                      <div>
                          <label for="lastname">Last Name</label>
                          <input name="lastname" type="text" placeholder="Last Name" value="{{ $data->lastname}}">
                      </div>
                    
                      <div>
                        <label for="email">Email Address</label>
                        <input name="email" type="email" placeholder="Email" value="{{ $data->email}}">
                      </div>

                      <div>
                        <label for="mobile">Mobile Number</label>
                        <input name="mobile" type="tel" placeholder="Mobile Number" minlength="10" maxlength="12" value="{{$data->mobile}}">
                      </div>

                      <div>
                        <label for="city">City of Residence</label>
                        <input name="city" type="text" placeholder="City" value="{{$data->city}}">
                      </div>

                      <div>
                        <label for="country">Country of Residence</label>
                        <input name="country" type="text" placeholder="Country" value="{{$data->country}}">
                      </div>

                      <div>
                        <label for="reg_number">Registration Number</label>
                        <input name="reg_number" type="text" placeholder="Registration Number" minlength="10" maxlength="20" value="{{$data->reg_number}}">
                      </div>

                      <div>
                        <label for="address">Home Address</label>
                        <input name="address" type="number" placeholder="Home Address" minlength="1" maxlength="6" value="{{$data->address}}">
                      </div>

                      <div>
                        <label for="postal_code">Enter Postal Code</label>
                        <input name="postal_code" type="number" placeholder="Enter Postal Code" minlength="1" maxlength="6" value="{{$data->postal_code}}">
                      </div>

                      <div>
                        <label for="bio">Bio Description</label>
                        <input name="bio" type="text" placeholder="Tell us something about yourself" value="{{$data->bio}}">
                      </div>
                        
                          <x-button>Update Profile</x-button>
                        </form>
                      </div>

        </section>

      </div>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>

</x-app-layout>
