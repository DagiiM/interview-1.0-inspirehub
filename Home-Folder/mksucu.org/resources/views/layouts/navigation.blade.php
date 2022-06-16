  <style>
  .sidebar-settings{
    display: none;
  }
  .nav-middle-mobile-screen{
    display:block
  }
  .icon,.menu-icon{
    font-size:24px;
    padding-inline:5px;
  }

</style>

<nav>
  <!--  Nav left Section -->
    <section class="nav-left">
    <x-nav-link class="sidebar-menu-icon">
      <i class="menu-icon icon-align-justify"></i>
       <div class="app-name">{{ config('app.name') }}</div>
    </x-nav-link>
                          
    </section>

 <!--  Nav Middle Section -->
    <section class="nav-middle">
          <!--  Search button -->
         <x-nav-link style="display:non;display:flex;align-items:center">
          <i class="icon search-icon icon-search"></i> <div class="search-icon" style="border-bottom: 1px solid transparent;font-size:16px">Search</div>
        </x-nav-link>
         
      </section>
    <!--=====================    Search Box      =====================-->
        <section class="search-box" id="searchBox" style="display:one">
              <form class="search-form">
                <div class="flex">
                  <i class="icon search-icon icon-search search"></i> 
                <input type="search" placeholder="Type to start searching.." aria-label="Search" id="search" onkeyup="showHint(this.value)" autofocus>
              </div>
            </form>      

            <p>Top Search Results ... </p>

            <div class="search-result-box">
                <a href="#" id="txtHint"></a>
            </div>
        </section>
      <!--=====================    End of Search Box      =====================-->

      @guest
          <section class="nav-right-custom-login underline-indicators">
            <x-nav-link href="{{route('login')}}">Login</x-nav-link>
            <x-nav-link href="{{route('register')}}">Register</x-nav-link>
          </section>
      @endguest

    @auth
    <!--  Nav Right Section -->
    <section class="nav-right">

      <x-nav-link class="sidebar-settings-btn">
        <i class="icon setting icon-cog"></i>
    </x-nav-link>
 
         <x-nav-link class="">
          <i class="icon notification icon-bell"></i>
    </x-nav-link>
        
      <x-nav-link>
        <i class="icon app-user-icon user icon-user-check"></i>
    </x-nav-link>

        <!--       Settings    -->
 <section class="sidebar-settings" data-visible="false" aria-expanded="false" style="flex-direction: column;position:absolute;text-align:left;background-color:white;box-shadow:var(--app-box-shadow);padding:8px;top:var(--nav-height);right:1%;width:300px">
       
        @can('ability-list')
         <x-nav-link href="">System Configuration</x-nav-link>
        <x-nav-link href="{{route('roles.index')}}">Roles</x-nav-link>
          <x-nav-link href="{{route('abilities.index')}}">Abilities</x-nav-link>
        @endcan
          <x-nav-link href="{{route('events.index')}}">Events</x-nav-link>
          <x-nav-link href="{{route('themes.index')}}">Semester Themes</x-nav-link>
          <x-nav-link href="{{route('socials.index')}}">Social Links</x-nav-link>
          <x-nav-link href="{{route('services.index')}}">Church Services</x-nav-link>
          <x-nav-link href="{{route('images.index')}}">System images</x-nav-link>
          <x-nav-link href="{{route('contacts.index')}}">System Contacts</x-nav-link>   
      </section>

    <!--  Notification Navigation Menu-->
        <section class="notification-body"style="flex-direction: column;position:absolute;text-align:left;background-color:white;box-shadow:var(--app-box-shadow);padding:8px;top:var(--nav-height);right:1%;width:300px">
        <a href=""><x-icon type="success" icon="check"></x-icon> Notification 1</a>
        <a href=""><x-icon type="success" icon="check"></x-icon>Notification 2</a>
        <a href=""><x-icon type="fail" icon="times"></x-icon>Notification 3</a>
        <a href="">More <x-icon type="continue" icon="angle-right"></x-icon></a>
        </section>

<!--  User Navigation Menu-->
      <section class="user-nav">
          <a href="{{ route('users.show',Auth::user()->id) }}"> My Profile</a>
          <a href="" class="nav-link-extra" style="padding:0">
          <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-button style="border:0;outline:0;border-radius:0;display:block;margin:0;width:100%"> Log Out</x-button>
              </form>
          </a>
    </section>
      </section>
            @endauth

  </nav>

<script>
function showHint(str) {
  if (str.length < 1) { 
    document.getElementById("search").innerHTML = "";
    return "";
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "users?q="+str);
  
  xhttp.send(); 
}
</script>
