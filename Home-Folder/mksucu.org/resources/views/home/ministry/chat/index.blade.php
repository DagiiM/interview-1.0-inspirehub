 <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300;1,400&display=swap');
* {
    margin: 0;
    padding: 0;
}

:root{
  --footerx-height:50px;
}

body {
    font-family: Roboto, sans-serif;
    box-sizing: border-box;
}
main{
  max-width: 100% !important;
  padding: 0 !important;
  max-height: calc(100vh - var(--nav-height));
  margin-top: var(--nav-height) !important;
  margin-left: var(--sidebar-width) !important;
}

main > *:first-child{
  padding:0 !important;
  overflow-x: hidden;
}

.content-container {
    margin-top:0;
    position: relative;
    border: 1px solid #eee;
    background: #efe7dd url("https://cloud.githubusercontent.com/assets/398893/15136779/4e765036-1639-11e6-9201-67e728e86f39.jpg") repeat;
    height: calc(99vh - var(--nav-height) - var(--footerx-height));
    overflow-y: auto;
    scroll-behavior: smooth;
    scrollbar-width: thin;
    margin-bottom: var(--footerx-height);
}

.footerx {
    height: var(--footerx-height);
    width: calc(var(--max-width)*0.98);
    position: fixed;
    padding: 0 1%!important;
    bottom: 1px;
    background: transparent;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 0;
    outline: 0;
    white-space:nowrap;
    background: #efe7dd url("https://cloud.githubusercontent.com/assets/398893/15136779/4e765036-1639-11e6-9201-67e728e86f39.jpg") repeat;
}

.app-content{
  margin:0;
  padding:0;
}
@media(max-width:992px){
  main{
    margin-top: 0 !important;
    margin-left:0 !important;
  }
    .content-container {
      width: var(--max-width);
      margin-left:0;
  }
    .footerx{
        width: calc(var(--max-width)*0.98);
        margin-left:0;
    }
}



/*---------------------Messages Message Received and Sent-----------------------*/
.content-container:after {
  content: "";
  display: table;
  clear: both;
}

.dagii-message-received,
.dagii-message-sent {
    outline: 0;
    border: 0;
    padding: 5px;
    width: fit-content;
    max-width: 80%;
    min-width:30%;
    position: relative;
    margin: 2px;
    clear: both;
    word-wrap: break-word;
}
.msg:after {
  position: absolute;
  content: "";
  width: 0;
  height: 0;
}

.dagii-message-received {
  float: left;
    background-color: #fff;
    border-radius: 0 15px 15px 15px;
}

.dagii-message-sent {
    float: right;
    background-color: rgb(144, 231, 151);
    border-radius: 15px 0 15px 15px;
}

.dagii-message-action {
    display: none;
    position: absolute;
    background-color: #fff;
    top: 20%;
    right: 1%;
    width: 20%;
    min-width: 100px;
    width: fit-content;
    padding: 5px;
    border-radius: 5px;
}

.message-action {
    stroke: #222;
}

.dagii-message-action-show {
    display: block;
}

.dagii-user {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: small;
    margin-bottom: 1px;
}

.dagii-user p {
    width: 80%;
    font-weight: 900;
}

.dagii-user .name {
    color: rgb(241, 7, 171);
    font-size: 10px;
    font-weight: 900;
}

.dagii-user-icon {
    width: 30px;
    height: 30px;
    border-radius: 100%;
}

.dagii-user-icon img {
    width: 30px;
    height: 30px;
    border-radius: 100%;
}

.dagii-message-action a {
    text-decoration: none;
    line-height: 26px;
    transition: 0.5s;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.dagii-message-action.active {
    display: block;
}

.dagii-message-meta-data {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 8px;
    color: slategray;
    padding-right: 2%;
}

.sidebar-dagii{
  border-right: 1px solid #edf2f7;
}

.menu-icon{
  stroke:black;
  width:22px;
  height:25px;
}

.sidebar-dagii a{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 5% 8%;
  margin-left: -4.8%;
}
.sidebar-dagii a:hover{
  background: #edf2f7;
  text-decoration: none;
}
.sidebar-dagii a img{
  height:60px;
  width:60px;
  border-radius:100%;
  border: 2px solid green;
}

.sidebar-dagii a p::first-letter{
  text-transform:uppercase;
}

.sidebar-dagii a p{
  width:80%;
  padding-left: 5px;
  text-transform:lowercase;
}
.sidebar-dagii a hr{
  width: 70%;
  margin-left: 30%;
}

.ministry-icon{
  padding: 0 0%;
}
.dagii-avatar a img{
height:25px;
width:25px;
border-radius:100%;
}
.dagii-nav-middle{
    display:flex;
    align-items:center;
}
.dagii-nav-middle > *{
  padding-left:5px;
}
.dagii-input-left {
    width: 92%;
    padding-top: 1px;
    padding-bottom: 1px;
    display: flex;
    justify-content: space-between;
    background-color: #fff;
    align-items: center;
    border-radius: 50px;
    border: 1px solid #fff;
    font-size: 15px;
    height:var(--footerx-height);
}

.dagii-input-left emoji {
    width: 6%;
}

.dagii-input-left input {
    margin:0;
    padding:3px;
    width:88%;
    outline: 0;
    border: 1px solid transparent;
    background-color: transparent;
    overflow-y: hidden;
    text-align:center;
    place-self:center;
}

.dagii-input-left photo {
    width: 6%;
}

.dagii-input-right {
    width: 8%;
    justify-content: flex-end;
}

.dagii-input-right button {
    margin-left: 0%;
    background-color: transparent;
    border: 0;
    outline: 0;
}

.dagii-input-right button{
    background-color: #005e54;
    height: var(--footerx-height);
    width: var(--footerx-height);
    border-radius: 100%;
    padding: 2px;
    color:#fff;
}
.container-video
{
padding:0 !important;
}
.dagii-message-meta-data{
  display: flex;
  justify-content: space-between;
  align-items: center;
  text-align: center;
}


.nav-right>*{
  padding-left:10%;
}
button > .icon{
  --icon-color:#fff;
}

.image__preview{
  position:absolute;
  bottom:calc(var(--nav-height) * 1.1);
  background-color:#fff;
  padding:5px;
  border-radius:var(--app-br);
  min-width:400px;
  height:50vh;
  max-width:85%;
  align-items:center;
  display:none;
}
#image__preview{
 width:100%;
 height:100%;
 object-fit:cover;
 border:1px solid transparent;
}
@media (max-width:480px){
  .image__preview{
    width:100%;
  }
}
</style>
@section('footer')
@endsection

@section('navigation')

<nav>
<div id="call" class="nav-left">
<a href="{{ route('chats.index') }}">
    <x-icon type="back-alt" icon="back-alt"></x-icon>
</a>
</div>

<div class="dagii-nav-middle flex">
  <div class="dagii-avatar">
<a href="{{asset('./img/'.$ministry->image)}}" data-lightbox="mygallery">
  <img src="{{asset('./img/'.$ministry->image)}}">
</a>
  </div>
  <div class="name" style="width:60%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
    <span id="name" style="color:black;">{{$ministry->name}}</span>
  </div>
</div>




<div class="nav-right">
  <!--Video upload icon-->
  @can('ability-create')
    <a href="{{route('videos.create')}}">
      <x-icon type="video" icon="video"/>
    </a>
    @endcan

  <svg class="icon menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>

</div>
</nav>
@endsection

@section('sidebar')
<!---Sidebar--------------->
  <aside class="sidebar">
<ul>
  @if($ministries->count()>0)
  @foreach($ministries as $ministry)
  <li>
      <x-nav-link class="ministry-icon" href="{{route('ministries.chats.index',['ministry'=>$ministry])}}"> <img src="{{asset('./img/'.$ministry->image)}}" style="width:30px;height:30px;border-radius:100%"/>
      <div class="name" style="width:70%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
    <span id="name" style="color:black;">{{$ministry->name}}</span>
  </div>
      </x-nav-link>
     </li>
  @endforeach
    <x-join-ministry-card/>
  @else
<x-join-ministry-card/>
  @endif
  </ul>
  </aside>
@endsection

<x-app-layout>


 <section class="content-container">
  @if($chats->count()>0)

   @foreach($chats as $chat)
   @if($chat->sender['id']==$user->id)
   <div class="dagii-message-sent msg">
     @if($chat->attachment!==null)
     <a href="{{asset('./img/'.$chat->attachment)}}" data-lightbox="mygallery">
       <img style="height:60%;width: 100%;max-width:800px" src="{{asset('./img/'.$chat->attachment)}}"/>
     </a>
     @endif

     @if($chat->message!==null)
         <div class="dagii-message">
           {{$chat->message}}
         </div>
     @endif
         <div class="dagii-message-meta-data">
           <div class="delete">
             <form method="post" enctype="multipart/form-data" action="{{route('ministries.chats.destroy',[$ministry,$chat])}}">
               @csrf
               @method('DELETE')
               <button type="submit" style="margin-right: 1px;background-color:transparent;border:0;outline:0;color:red;cursor:pointer;font-size:10px">
               Delete
             </button>
           </form>
           </div>
           <time class="time">
             {{$chat->created_at}}
         </time>
         </div>
     </div>
@endif
            @if($chat->sender['id']!=$user->id)
            <div class="dagii-message-received msg">
                <div class="dagii-user">
                    <div class="dagii-user-icon">
                        <img src="{{asset('./img/'.$chat->sender['picture'])}}">
                    </div>
                    <p class="name">{{$chat->sender['firstname']}} {{$chat->sender['lastname']}}</p>
                  </div>
                  @if($chat->attachment!==null)
                  <a href="{{asset('./img/'.$chat->attachment)}}" data-lightbox="mygallery">
                    <img style="height:60%;width: 100%;max-width:800px" src="{{asset('./img/'.$chat->attachment)}}"/>
                  </a>
                  @endif

                  @if($chat->message!==null)
                      <div class="dagii-message">
                        {{$chat->message}}
                      </div>
                  @endif
                <div class="dagii-message-meta-data">
                  <div class="action">
                    Tag
                  </div>
                  <time class="time">
                    {{$chat->created_at}}
                </time>
            </div>
            </div>
        @endif



  @endforeach
  @else
    <div class="text-center items-center" style="border-radius:2px 2px 2px 0px;background-color:wheat;">
    <p style="color: black;font-size:12px">
      There are No Recent Chats in this Ministry. Start Conversation ...
    </p>
    </div>
  @endif
        </section>
           <!--Footer section-->
           <!--Start of Conversation Compose form-->
     <form method="post" enctype="multipart/form-data" id="formEl">
           @csrf
       
      <section class="footerx">

         <section class="image__preview">
           <img id="image__preview">
         </section>

        <div class="dagii-input-left" style="padding-inline:1.5%">
            <div class="emoji">
                <x-icon type="emoji" icon="emoji"></x-icon>
            </div>
            <input name="input" placeholder="Type Something..." style="text-align:center;align-items:center" required spellCheck="true" autocomplete="off"/>
            
            <div class="photo">
              <label for="attachment"><x-icon type="camera" icon="camera"></x-icon></label>
                <span id="file-chosen" hidden></span>
                <input id="attachment" accept="image/*" hidden name="attachment" type="file"/>
            </div>
        </div>
        <div class="dagii-input-right" style="display:grid">
            <button type="submit" submit="place-self:center;">
                    <x-icon type="send" icon="send"></x-icon>
            </button>
        </div>
    </section>
  </form>
  <!--End of Conversation Compose form-->

<script>
  
const menuIcon=document.querySelector('.menu-icon');
const sidebar = document.querySelector(".sidebar-dagii");
let containerVideo = document.querySelector(".content-container");
let footer = document.querySelector(".footerx");


menuIcon.onclick=function(){
    sidebar.classList.toggle("small-sidebar-dagii");
    sidebar.classList.toggle("small-sidebar-screen");
    containerVideo.classList.toggle("content-container-large");
    footer.classList.toggle("footer-large");
}

 
 formEl.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{route('ministries.chats.store',$ministry)}}", {
      method: 'POST',
      body: new FormData(formEl)
    });

   // let result = await response.json();
   
   // flash(result.type, result.message);
  };

const request = new XMLHttpRequest();

try {
  request.open('GET', "http://178.79.157.159/ministries/12/chats");

  request.responseType = 'json';

  request.addEventListener('load', () => {
    console.log("success");
  });
  request.addEventListener('error', () => console.error('XHR error'));

  request.send();

} catch(error) {
  console.error(`XHR error ${request.status}`);
}


</script>



<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>


</x-app-layout>
