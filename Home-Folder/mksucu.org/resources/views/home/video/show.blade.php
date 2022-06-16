
<x-app-layout>

      <link rel="stylesheet" href="{{ asset('css/video-player.css') }}">
<style>


/*-----------------Play Video Page --------------*/

.play-container {
    margin-top: 1px;
}

.play-video {
    flex-basis: 69%;
    padding-inline: 5px;
}

.play-video video {
    width: 100%;
    max-height: 100vh;
}

.side-video-list {
  --_size:var(--size,200px);
    display: flex;
    margin-bottom: 8px;
    padding-inline:8px;
}
.side-video-list >*:first-child{
  margin-right:2%;
  padding:5px;
  max-height:var(--_size);
  max-width:var(--_size);
  min-width:var(--_size);
  overflow:hidden;
}
@media (max-width:480px){
  .side-video-list{
    --size:100%;
    display:block;
  }
  .vid-list {
    width: 100%;
    display:block;
}
 .vid-list .thumnail {
    height:400px;
    max-height:500px;
}
}
.side-video-list >*:last-child{
  margin-left:1%;
  padding:5px;
}
.side-video-list:hover {
    background-color: #eee;
}

.side-video-list img {
    width: 100%;
    max-height:300px
}

.side-video-list .small-thumnail {
    flex-basis: 49%;
}

.side-video-list .vid-info {
    flex-basis: 49%;
}

.play-video .tags a {
    color: #0000ff;
    font-size: 14px;
}

.play-video h3 {
    font-size: 18px;
    font-weight: 600;
}

.play-video .play-video-info {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    flex-wrap: wrap;
    font-size: 14px;
    color: #5a5a5a;
    padding-bottom: 10px;
    align-items:center;
}

.play-video .play-video-info a svg {
    width: 20px;
    margin-right: 8px;
}

.play-video .play-video-info a {
    display: inline-flex;
    align-items: center;
    margin-left: 15px;
}

.play-video hr {
    border: 0;
    height: 1px;
    background: #ccc;
    margin: 10px 0;
}

.publisher {
    display: inline-flex;
    align-items: center;
    margin-top: 20px;
}

.publisher div {
    flex: 1;
    line-height: 18px;
}

.publisher img {
    width: 40px;
    border-radius: 50%;
    margin-right: 15px;
}

.publisher div p {
    color: #000;
    font-weight: 600;
    font-size: 18px;
}

.publisher div span {
    font-size: 13px;
    color: #5a5a5a;
}

.publisher button {
    background: red;
    color: #fff;
    padding: 8px 30px;
    border: 0;
    outline: 0;
    border-radius: 4px;
    cursor: pointer;
}

.vid-description {
    padding-left: 55px;
    margin: 15px 0;
}

.vid-description p {
    color: #5a5a5a;
    font-size: 14px;
    margin-bottom: 5px;
}

.vid-description h4 {
    color: #5a5a5a;
    font-size: 14px;
    margin-top: 15px;
}

.add-comment {
    display: flex;
    align-items: center;
    margin: 30px 0;
}

.add-comment img {
    width: 35px;
    border-radius: 50%;
    margin-right: 15px;
}

.add-comment input {
    border: 0;
    outline: 0;
    border-bottom: 1px solid #ccc;
    width: 100%;
    padding-top: 10px;
    background: transparent;
}

.old-comment {
    display: flex;
    align-items: center;
    margin: 20px 0;
}

.old-comment img {
    width: 35px;
    border-radius: 50%;
    margin-right: 15px;
}

.old-comment h3 {
    font-size: 14px;
    margin-bottom: 2px;
}

.old-comment h3 span {
    font-size: 12px;
    color: #5a5a5a;
    font-weight: 500;
    margin-left: 8px;
}

.old-comment .comment-action {
    display: flex;
    align-items: center;
    margin: 8px 0;
    font-size: 14px;
}

.old-comment .comment-action svg {
    border-radius: 0;
    width: 20px;
    margin-right: 5px;
}

.old-comment .comment-action span {
    margin-right: 20px;
    color: #5a5a5a;
}

.old-comment .comment-action a {
    color: #0000ff;
}


@media (max-width:900px) {
      .banner img {
        border-radius: 0px;
    }
   
    .play-video {
        flex-basis: 100%;
    }
    .play-video:hover {
        background-color: #eee;
    }
    .right-sidebar {
        flex-basis: 100%;
    }
   
    .vid-description {
        padding-left: 0;
    }
    .play-video .play-video-info a {
        margin-left: 0;
        margin-right: 15px;
        margin-top: 15px;
    }
    .no-data {
        font-size: small;
    }
}

</style>
<!--    SEO Optimization   -->
<x-slot name="image">
{{asset('../img/'.$data2->poster)}}
</x-slot>

<x-slot name="title">
{{$data2->subject}}
</x-slot>

<x-slot name="description">
{{$data2->description}}
</x-slot>

<x-slot name="url">
{{route('videos.show',['video'=>$data2])}}
</x-slot>

<section class="play-container">
  <section class="play-video">
        <x-video source="{{ asset('../img/'.$data2->url) }}" poster="{{ asset('../img/'.$data2->poster) }}"/>

       <div class="tags">
        <a href="">#Pray #Pray and Pray</a>
        </div>

        <h3>{{$data2->subject}}</h3>

        <div class="play-video-info">
        <p>{{$data2->description}}</p>
        <p>1225 Views &bull; 2 days Ago</p>
        <div style="display:block">
            <x-share></x-share>
        </div>
        <div class="">
            <!-- Action Button -->
            <x-action-button view-link="{{route('videos.show',['video'=>$data2])}}" edit-link="{{route('videos.edit',['video'=>$data2])}}" delete-link="{{route('videos.destroy',['video'=>$data2])}}"></x-action-button>
            <!-- End of Action Button -->
        </div>
      </div>
  </section>
  <hr>
  
@auth
  <div class="publisher">
    <img src="{{asset('/img/'.$user->picture)}}" alt="" class="user-icon"/>
    <div>
      <p>{{$data2->ministry_name}}</p>
      <span>500k Members</span>
      </div>
      <button type="button">Join Ministry</button>
  </div>

  <div class="vid-description">
    <p>{{$data2->ministry_description}}</p>
    <p>Subscribe Today</p>
    <hr>
    <h4>130 Comments</h4>
    <div class="add-comment">
      <img src="{{asset('/img/'.$user->picture)}}" alt=""/>
      <input type="text" placeholder="Write Comments...">
    </div>
    <div class="old-comment">
      <img src="{{asset('/img/'.$user->picture)}}" alt=""/>
      <div>
        <h3>{{$user->firstname}} {{$user->lastname}} <span>2 Days Ago</span></h3>
        <p>
          I am Happy to be a Member Cheers ...
        </p>
        <div class="comment-action">
          <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
          </svg>
          <span>200</span>
          <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"></path></svg>
          <span>2</span>
          <span>REPLY</span>
          <a href="">
            All Replies
          </a>
        </div>
    </div>
    </div>
  </div>

    </div>
    @endauth
    <div class="right-sidebar">
@foreach($data as $video)
      <div class="side-video-list">
        <a href="{{route('videos.show',['video'=>$video])}}" class="small-thumnail">
          <img src="{{asset('/img/'.$video->poster)}}" alt="" class="user-icon"/>
        </a>
          <div class="video-info">
            <a href="{{route('ministries.show',$video->ministry_id)}}">By {{$video->ministry_name}}</a>
            <p>{{$video->description}}</p>
            <p>15k Views</p>
          </div>
      </div>
@endforeach

    </div>

  </div>
</section>

 <script src="{{ asset('js/video-player.js') }}" defer></script>
</x-app-layout>
