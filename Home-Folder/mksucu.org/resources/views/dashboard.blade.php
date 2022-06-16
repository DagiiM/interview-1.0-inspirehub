
<x-app-layout>
   <h2 class="app-center">Welcome <b>{{Auth::user()->firstname}},</b></h2>

    <section class="custom-card">
      <!-- All Members -->
      @can('ability-list')
        
  <article class="custom-card-item">
    <a href="{{route('users.index')}}">All Members</a>
<div>{{$users}}</div>

</article>

 <!-- All Verified Members -->
<article class="custom-card-item">
<div>Verified Members</div>
<div >{{$verified}}</div>
</article>

<!-- All UnVerified Members -->
<article class="custom-card-item">
<div>{{$unverified}} Unverified Members</div>
  @can('ability-create')
            @if($unverified>0)
            <form method="post" action="{{route('reminder')}}">
              @csrf
            <x-button style="border:0;outline:0;background-color:transparent;font-weight: 900;">
              Remind Us By Email?
            </x-button>
          </form>
          @endif
      @endcan
  </article>

      @endcan
      
 <!-- All Ministries -->
      <article class="custom-card-item">
                  <a href="{{route('ministries.index')}}">Number of Ministries</a>
              <div>{{$ministry}}</div>
      </article>

      <!-- All Videos -->
          <article class="custom-card-item">
            <a href="{{route('videos.index')}}">Videos</a>
              <div>{{$videos}}</div>
          </article>

      <!-- All Ebooks -->
      <article class="custom-card-item">
        <a href="{{route('ebooks.index')}}">Ebooks</a>
          <div>{{$ebooks}}</div>
    </article>
  </section>

</x-app-layout>





