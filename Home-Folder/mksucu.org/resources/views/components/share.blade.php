<section style="position:relative">
    <x-icon type="share-alt action-icon" icon="share-alt"></x-icon>
       <div class="share-box">
        <x-icon type="whatsapp" icon="whatsapp"></x-icon>
         <x-icon type="facebook" icon="facebook"></x-icon>
          <x-icon type="twitter" icon="twitter"></x-icon>
</div>
</section>


<script>  

    const shareButton = document.querySelector(".share-alt");
    const shareBox = document.querySelector(".share-box");
    const whatsapp = document.querySelector(".whatsapp");
    const facebook = document.querySelector(".facebook");
    const twitter = document.querySelector(".twitter");

if(shareButton){
    shareButton.onclick = ()=>{
            shareBox.classList.toggle("show");
        }
}
if(whatsapp){
    whatsapp.onclick = ()=>{
           window.open('whatsapp://send?text='+window.location.href); 
        }
} 
if(facebook){
    facebook.onclick = ()=>{
           window.open('https://www.facebook.com/sharer/sharer.php?u='+window.location.href); 
        }
}
if(twitter){
    twitter.onclick = ()=>{
           window.open('https://twitter.com/intent/tweet?text='+window.location.href); 
        }
}

</script>  

<style>

.icon + .whatsapp,.icon + .facebook,.icon + .twitter{
    --icon-size:1.4rem;
    --icon-color:var(--first-color);
     border:1px solid #fff;
}
.icon + .whatsapp:hover,.icon + .facebook:hover,.icon + .twitter:hover{
    cursor:pointer;
    border:1px solid var(--first-color);
    border-radius:100%;
}

.share-alt{
    color:var(--first-color);
    fill:var(--first-color);
    background-color:#fff;
    border-radius:100%;
    padding:8px;
    box-shadow:var(--app-box-shadow);
}
.share-box{
    display:none;
    position:absolute;
    box-shadow:var(--app-box-shadow);
    background-color:white;
    max-width:150px;
    top:0px;
    left:44px;
    padding:4%;
    z-index:100;
}
.share-alt:hover{
    cursor:pointer;
    fill:var(--first-color);
}
.show{
    display:block;
}

</style>