<!---Sidebar--------------->
  <aside class="sidebar">
      <ul>
        @auth
        <li>
            <x-nav-link href="{{ route('dashboard') }}"> Dashboard</x-nav-link>
        </li>           

        <li>
            <x-nav-link href="{{route('chats.index')}}">Chats</x-nav-link>
        </li>
    @can('ability-list')    
    <li>
      <x-nav-link href="{{route('emails.index')}}"> Bulk Emails</x-nav-link>
    </li>
      <li>
          <x-nav-link href="{{route('ministries.index')}}"> Ministries</x-nav-link>
      </li>
    @endcan
  
 
    @endauth
    
       <li>
        <x-nav-link href="{{route('libraries.index')}}"> Libraries</x-nav-link>
    </li> 
      <li>
        <x-nav-link href="{{route('videos.index')}}"> Videos</x-nav-link>
    </li> 
     <li>
        <x-nav-link href="{{route('ebooks.index')}}"> Ebooks</x-nav-link>
    </li> 
       <li>
        <x-nav-link href="{{route('gallaries.index')}}"> Gallery</x-nav-link>
    </li> 
    <li>
        <x-nav-link href="{{route('welcome')}}">Homepage</x-nav-link>
    </li>
       @auth
       
    @can('ability-list')
    <li>
      <x-nav-link href="{{route('users.index')}}">All Members</x-nav-link>
  </li>  
    @endcan
 
 @endauth
 
</ul>
</aside>