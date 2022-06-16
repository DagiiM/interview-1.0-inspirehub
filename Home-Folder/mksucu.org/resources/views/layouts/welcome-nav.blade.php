<style>
svg.dagii-logo{
    width: var(--nav-height);
    height: var(--nav-height);
    padding-inline: 10px;
}
nav{
    background-color: #fff;
}
.nav-middle {
    --width: calc(var(--max-width)*0.60);
}
.nav-right{
  --width:15%;
}
.small-icon{
    display: none;
    font-size:24px;
  }
@media(max-width:992px){
  .small-icon{
    display: block;
  }
 .nav-left, .nav-right{
  --width:50%;
}
}
    </style>
<nav>
    <!--  Nav left Section -->
      <section class="nav-left">
        <i class="small-icon sidebar-menu-icon menu-icon icon icon-align-left"></i>
      <x-nav-link class="sidebar-menu-icon flex align-items-center" style="font-size: 15px">
         <x-application-logo></x-application-logo>
         <div class="app-name">{{ config('app.name') }}</div>
      </x-nav-link>
                            
      </section>
  
   <!--  Nav Middle Section -->
      <section class="nav-middle">    
             <x-nav-link href="{{route('gallaries.index')}}">About Us</x-nav-link>

            <x-nav-link href="{{route('ministries.index')}}"> Ministries</x-nav-link>
    
            <x-nav-link href="{{route('libraries.index')}}">Libraries</x-nav-link>

            <x-nav-link href="{{route('videos.index')}}">Videos</x-nav-link>

            <x-nav-link href="{{route('ebooks.index')}}">Ebooks</x-nav-link>
        
            <x-nav-link href="{{route('gallaries.index')}}">Gallery</x-nav-link>

            <x-nav-link href="{{route('gallaries.index')}}">Contact Us</x-nav-link>
           
        </section>

  
        @guest
            <section class="nav-right-custom-login underline-indicators">
              <x-nav-link href="{{route('login')}}">Login</x-nav-link>
              <x-nav-link href="{{route('register')}}">Become a Member</x-nav-link>
            </section>
        @endguest
  
      @auth
      <!--  Nav Right Section -->
      <section class="nav-right">
  
        @auth
        <x-nav-link>
            <x-nav-link href="{{route('dashboard')}}">Dashboard</x-nav-link>

         </x-nav-link>
        @endauth
             
        <x-nav-link>
         <x-icon type="app-user-icon user" icon="user"></x-icon>
      </x-nav-link>


  <!--  User Navigation Menu-->
        <section class="user-nav">
            <a href="{{ route('users.show',Auth::user()->id) }}"> My Profile</a>
            <a href="" class="nav-link-extra" style="padding:0">
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button style="background-image:linear-gradient(241deg, transparent,transparent) !important;color:red;border:0;outline:0;border-radius:0;display:block;margin:0;width:100%"> Log Out</x-button>
                </form>
            </a>
      </section>
        </section>
              @endauth
  
    </nav>
  
  