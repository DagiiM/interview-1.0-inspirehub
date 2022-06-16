<style>
nav{
  /*
    background-image:  var(--main-gradient);
    background-color:transparent;
    */
}
.sidebar{
  display:none;
}
.sidebar-show{
  display:flex !important;
}
main{
  --width:100%;
  --sidebar-width:0;
  margin-top: var(--nav-height) !important;
  padding: 0 !important;
}

@media (max-width:992px){
 main{
  margin-top: 0 !important;
 }
}

article{
  --bg-color:transparent;
}

main > *:first-child {
    padding: 0 !important;
}
.footer{
  margin-left:0
}
#carousel-container,
#event-container,
#ministries-container,
#about-us-container,
#leadership-container,
#libraries-container{
  padding:10px;
  margin:5px 0;
}
#carousel-container > h2,
#event-container > h2,
#ministries-container > h2,
#about-us-container > h2,
#leadership-container > h2,
#libraries-container > h2{
  text-align:center;
  border-bottom:2px solid transparent;
  padding-bottom:5px;
  transition: 1000ms ease-in-out;
}

#carousel-container > h2:hover,
#event-container > h2:hover,
#ministries-container > h2:hover,
#about-us-container > h2:hover,
#leadership-container > h2:hover,
#libraries-container > h2:hover{
  cursor:pointer;
  border-bottom:2px solid var(--first-color);
}

#about-us-container,#leadership-container,#libraries-container{
  background-color:#f2f2f2;
}
#aboutUs,#libraries{
  display:flex;
}
#aboutUs .aboutUs-item-1,#aboutUs .aboutUs-item-2,#aboutUs .aboutUs-item-3{
  padding:5px;
  box-shadow:var(--app-box-shadow);
  border-radius:var(--app-br);
  margin:10px;
  border:1px solid #fff;
}
#aboutUs .aboutUs-item-1 p,#aboutUs .aboutUs-item-2 p,#aboutUs .aboutUs-item-3 p{
  color:rgb(62 59 59);
}
.card__library{
  background-color:#fff;
  box-shadow:var(--app-box-shadow);
  padding:5px;
  border-radius:var(--app-br);
}
.card__library--h3,.card__library--description{
  text-align:center;
}

@media (max-width:767px){
  #aboutUs,#libraries{
  display:block;
}
}
.app-content {
    display: block;
}

.welcome__preamble,#event-container,#leadership-container,#ministries-container{
  padding-bottom:40px;
}

.welcome__preamble{
  display:flex;
  width: 100%;
}

/*  Carousel style */

.slider-icon{
    --icon-color:#fff;
    background-color: var(--first-color);
    border-radius: 100%;
    padding:5px;
}


.carousel__indicator.current-slide{
    background: var(--first-color);
}

.is-hidden {display: none;}


@media (max-width:560px){
    .user_card{
        max-width:100%;
    }
}


.card__library{
    width: 200px;
    padding:15px 5px; 
}
.card__libraries{
  display:flex;
  overflow: hidden;
  padding:15px;
  text-transform: lowercase;
}
.card__library::first-letter{
    text-transform: capitalize;
}
</style>

<x-app-layout>

  @section('navigation')

    @include('layouts.welcome-nav')

  @endsection

   <section class="welcome__preamble">
  
   <!--Welcome Content -->
   </section>

<section id="about-us-container">
<h2>About Us<h2>
  <article id="aboutUs">
    <div class="aboutUs-item-1">
     <h3>Our Vision<h3>
      <p>{{$system->vision}}<p>
    </div>
 
    <div class="aboutUs-item-2">
      <h3>Our Mission<h3>
       <p> {{$system->mission}}</p>
    </div>
 
    <div class="aboutUs-item-3">
    <h3>Our Values<h3>
         <p> {{$system->values}}</p>
    </div>

  </article>
</section>

<section class="event-container" id="event-container">
<h2>Stay up to date on the latest news and events</h2>

</section>

<section class="leadership-container" id="leadership-container">
<h2>Leadership</h2>
   
</section>

<section class="ministries-container" id="ministries-container">
<h2>Our Ministries</h2>
</section>

<section id="libraries-container" style="display:grid">
<h2>Our Libraries</h2>
  <article class="card__libraries grid-auto">
  </article>
</section>


<footer class="footer grid row-3-col-1-4-1" style="display: grid">    
      <section class="outer-footer grid row-1-col-3" style="background-image: linear-gradient(to right bottom, #2b5876 0%, #4e4376 74%);display:none" >
            <article style="display:grid;place-content: center;background:transparent">
                  <x-application-logo></x-application-logo>
            </article>
            <article style="color:#fff;background:transparent;">
                  <h5 class="uppercase" style="font-size:12px">New to {{ config('app.name') }} ?</h5>
                  <p style="color:#fff;padding:2px 0;font-size:10px;">Subscribe to Our Newsletter to get updates on our latest offers!<p>
                   <section style="display:flex;place-content: center;">
                      <input type="email" name="email" id="" placeholder="Enter your Email" style="padding:5px 0;margin:5px 0;width:300px" required>
                      <x-button>Subscribe</x-button>
                  </section>
              </article>
            <article class="outer-footer-grid" style="background:transparent;color:#fff;text-align:center;padding-inline:5%;display:">
                  <h5 class="uppercase" style="font-size:12px">Download {{ config('app.name') }} free app</h5>
                  <p style="color:#fff;padding:5px 0;font-size:10px">Get access to exclusive offers!</p>
                  <section style="display:flex;padding:1%;place-content: center;">
                        <div style="padding:1%;border:1px solid #f3f3f3;border-radius:5px;margin:1%">Google Play</div>
                        <div style="padding:1%;border:1px solid #f3f3f3;border-radius:5px;margin:1%">Apple Store</div>
                  </section>
            </article>
      </section>
      
      <div class="section"  style="display: flex;flex-direction:column;">
            <h3 style="color:#fff">Company</h3>
            <a href="">About Us</a>
            <a href="">Scholarships</a>
            <a href="">Sitemap</a>
            <a href="">Q&A Archive</a>
      </div>

      <div class="section card__services" style="display: flex;flex-direction:column;">
            <h3 style="color:#fff">Church Services</h3>
            
      </div>

      <div class="section card__contacts" style="display: flex;flex-direction:column;">
            <h3 style="color:#fff">Support</h3>
            <a href="">Contact Us</a>
      </div>

      <div class="section card__socials" style="display: flex;flex-direction:column;">
            <h3 style="color:#fff">Connect with Us</h3>
      </div>

     <section class="inner-footer">
           <div>Copyright © 2021.{{ config('app.name') }}</div>
           <div> {{ config('app.name') }} is a students' program in Machakos university.</div>
      </section>
</footer>

<script>



loadLibrary = (data) => {
      var cardLibraries = document.querySelector('.card__libraries');
  data.forEach((item)=>{
    let cardLibrary = document.createElement('div');
    cardLibrary.className = 'card__library';
    let infoDetail = document.createElement('div');
    infoDetail.className = 'card__library--info';
    let h3 = document.createElement('h3');
    h3.className='card__library--h3';
    let cardDescription = document.createElement('div');
    cardDescription.className = 'card__library--description';
    h3.innerText = item.name;
    cardDescription.innerText = item.description;
    cardLibraries.append(cardLibrary);
    cardLibrary.appendChild(infoDetail);

    infoDetail.append(h3,cardDescription);
  });
};

loadContact = (data)=>{
var cardContacts = document.querySelector('.card__contacts');
  data.forEach((item)=>{
   let contact = document.createElement('a');
   contact.setAttribute('href',`tel:${item.mobile}`);
   contact.innerText = item.name + ' ' + item.mobile;
   cardContacts.appendChild(contact);
  });
};

loadSocial = (data)=>{
var cardSocials = document.querySelector('.card__socials');
  data.forEach((item)=>{
   let social = document.createElement('a');
   social.setAttribute('href',`${item.url}`);
   social.setAttribute('target','_blank');
   social.innerText = item.name;
   cardSocials.appendChild(social);
  });
};

loadService = (data)=>{
var cardServices = document.querySelector('.card__services');
  data.forEach((item)=>{
   let service = document.createElement('a');
   service.setAttribute('href',`#`);
   service.innerText = item.subject + ' - ' + item.time;
   cardServices.appendChild(service);
  });
};

loadTheme = (data)=>{
var cardTheme = document.querySelector('.card__theme');
  data.forEach((item)=>{
   let theme = document.createElement('div');
   theme.classList='flex align-items-center justify-space-between';
   theme.innerHTML =`Theme : ` + item.subject + ' - ' + item.semester + ``;
   cardTheme.appendChild(theme);
  });
};

loadImage = (data)=>{
  var welcomePreamble = document.querySelector('.welcome__preamble');

  var carousel = document.createElement('section');
  carousel.classList.add('carousel');

  welcomePreamble.appendChild(carousel);

  var buttonLeft = document.createElement('button');
  buttonLeft.className='carousel__button carousel__button--left is-hidden';
  buttonLeft.innerHTML=`<svg class="icon angle-left slider-icon">
      <use xlink:href="#angle-left"></use>
    </svg>`;
  var buttonRight =  document.createElement('button');
  buttonRight.className = 'carousel__button carousel__button--right';
  buttonRight.innerHTML=`<svg class="icon angle-right slider-icon">
      <use xlink:href="#angle-right"></use>
    </svg>`;
  var carouselTrackContainer = document.createElement('section');
  carouselTrackContainer.classList.add('carousel__track-container');
  var track = document.createElement('ul');
  track.classList.add('carousel__track');

  carouselTrackContainer.appendChild(track);
  var carouselNav = document.createElement('section');
  carouselNav.classList.add('carousel__nav');

  carousel.append(buttonLeft,carouselTrackContainer,buttonRight,carouselNav);

  data.forEach((item,index)=>{
    let li = document.createElement('li');
    li.classList.add('carousel-slide');
      let carouselIndicator = document.createElement('button');
    carouselIndicator.classList.add('carousel__indicator');
   if(index === 0){
     li.classList.add('current-slide');
     carouselIndicator.classList.add('current-slide');
   }
  
   let image = document.createElement('img');
   image.className = 'carousel__image';
   image.src = "{{asset('img')}}/"+item.image;
   image.setAttribute('alt','#');
   image.innerText = item.subject;
   li.appendChild(image);

    carouselNav.appendChild(carouselIndicator);
   track.append(li);
  });
  const slides = Array.from(track.children);

 const nextButton =  buttonRight;
 const prevButton =  buttonLeft;
 const dotsNav = carouselNav;
 const dots = Array.from(dotsNav.children);
  
 const slideWidth = slides[0].getBoundingClientRect().width;

 // arrange the slides next to one another
 const setSlidePosition = (slide,index) =>{
   slide.style.left = slideWidth * index + 'px';
 };
 slides.forEach(setSlidePosition);
  //console.log(dots)
   const moveToSlide = (track, currentSlide, targetSlide) => {
   track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
   currentSlide.classList.remove('current-slide');
   targetSlide.classList.add('current-slide');
 }
 
 const updateDots = (currentDot,targetDot) => {
   currentDot.classList.remove('current-slide');
   targetDot.classList.add('current-slide');
 };
 
 const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
   if (targetIndex === 0) {
     prevButton.classList.add('is-hidden');
     nextButton.classList.remove('is-hidden');
   } else if(targetIndex === slides.length - 1){
     prevButton.classList.remove('is-hidden');
     nextButton.classList.add('is-hidden');
   } else{
     prevButton.classList.remove('is-hidden');
     nextButton.classList.remove('is-hidden');
   }
 }
 // When I click left, move slides to the left
 prevButton.addEventListener('click',(event) => {
   const currentSlide = track.querySelector('.current-slide');
   const prevSlide = currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const previousDot = currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide => slide === prevSlide);
   
   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot,previousDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
 });
 
 // When I click right, move slides to the right
 nextButton.addEventListener('click',(event)=>{
   const currentSlide = track.querySelector('.current-slide');
   const nextSlide = currentSlide.nextElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const nextDot = currentDot.nextElementSibling;
   const nextIndex = slides.findIndex(slide => slide === nextSlide);
 
   moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot,nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);
 });
 
 // When I click the nav indicators, move to that slide
 dotsNav.addEventListener('click',(event)=>{
     // what indicator was clicked on?
     const targetDot = event.closest('button');
   
     if(!targetDot) return;
 
     const currentSlide = track.querySelector('.current-slide');
     const currentDot = dotsNav.querySelector('.current-slide');
     const targetIndex = dots.findIndex(dot => dot === targetDot);
     const targetSlide = slides[targetIndex];
 
     moveToSlide(track,currentSlide,targetSlide);
 
     updateDots(currentDot,targetDot);
     hideShowArrows(slides, prevButton, nextButton, targetIndex);
 });
  
};

loadEvent = (data)=>{
var eventContainer = document.querySelector('.event-container');

  var carousel = document.createElement('section');
  carousel.classList.add('carousel');
   carousel.style='--height:250px';
  eventContainer.appendChild(carousel);

  var buttonLeft = document.createElement('button');
  buttonLeft.className='carousel__button carousel__button--left is-hidden';
  buttonLeft.innerHTML=`<svg class="icon angle-left slider-icon">
      <use xlink:href="#angle-left"></use></svg>`;
  var buttonRight =  document.createElement('button');
  buttonRight.className = 'carousel__button carousel__button--right';
  buttonRight.innerHTML=`<svg class="icon angle-right slider-icon">
      <use xlink:href="#angle-right"></use></svg>`;
  var carouselTrackContainer = document.createElement('section');
  carouselTrackContainer.classList.add('carousel__track-container');
  var track = document.createElement('ul');
  track.classList.add('carousel__track');

  carouselTrackContainer.appendChild(track);
  var carouselNav = document.createElement('section');
  carouselNav.classList.add('carousel__nav');

  carousel.append(buttonLeft,carouselTrackContainer,buttonRight,carouselNav);

  data.forEach((item,index)=>{
      let li = document.createElement('li');
      li.className='carousel-slide event__card';
      let carouselIndicator = document.createElement('button');
      carouselIndicator.classList.add('carousel__indicator');
          
      if(index === 0){
        li.classList.add('current-slide');
        carouselIndicator.classList.add('current-slide');
      }

      let image = document.createElement('img');
      image.className = 'carousel__image';
      image.src = "{{asset('img')}}/"+item.url;
      image.setAttribute('alt','#');
      image.innerText = item.subject;
      let eventInfo = document.createElement('div');
      eventInfo.className = 'event__description';
      let h3 =  document.createElement('h3');
      h3.innerText = item.subject;
      eventInfo.innerText = item.description;
      li.append(h3,image,eventInfo);
   
      carouselNav.appendChild(carouselIndicator);
      track.append(li);
  });
    const slides = Array.from(track.children);

 const nextButton =  buttonRight;
 const prevButton =  buttonLeft;
 const dotsNav = carouselNav;
 const dots = Array.from(dotsNav.children);
  
 const slideWidth = slides[0].getBoundingClientRect().width;

 // arrange the slides next to one another
 const setSlidePosition = (slide,index) =>{
   slide.style.left = slideWidth * index + 'px';
 };
 slides.forEach(setSlidePosition);
  //console.log(dots)
   const moveToSlide = (track, currentSlide, targetSlide) => {
   track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
   currentSlide.classList.remove('current-slide');
   targetSlide.classList.add('current-slide');
 }
 
 const updateDots = (currentDot,targetDot) => {
   currentDot.classList.remove('current-slide');
   targetDot.classList.add('current-slide');
 };
 
 const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
   if (targetIndex === 0) {
     prevButton.classList.add('is-hidden');
     nextButton.classList.remove('is-hidden');
   } else if(targetIndex === slides.length - 1){
     prevButton.classList.remove('is-hidden');
     nextButton.classList.add('is-hidden');
   } else{
     prevButton.classList.remove('is-hidden');
     nextButton.classList.remove('is-hidden');
   }
 }
 // When I click left, move slides to the left
 prevButton.addEventListener('click',(event) => {
   const currentSlide = track.querySelector('.current-slide');
   const prevSlide = currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const previousDot = currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide => slide === prevSlide);
   
   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot,previousDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
 });
 
 // When I click right, move slides to the right
 nextButton.addEventListener('click',(event)=>{
   const currentSlide = track.querySelector('.current-slide');
   const nextSlide = currentSlide.nextElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const nextDot = currentDot.nextElementSibling;
   const nextIndex = slides.findIndex(slide => slide === nextSlide);
 
   moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot,nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);
 });
 
 // When I click the nav indicators, move to that slide
 dotsNav.addEventListener('click',(event)=>{
     // what indicator was clicked on?
     const targetDot = event.closest('button');
   
     if(!targetDot) return;
 
     const currentSlide = track.querySelector('.current-slide');
     const currentDot = dotsNav.querySelector('.current-slide');
     const targetIndex = dots.findIndex(dot => dot === targetDot);
     const targetSlide = slides[targetIndex];
 
     moveToSlide(track,currentSlide,targetSlide);
 
     updateDots(currentDot,targetDot);
     hideShowArrows(slides, prevButton, nextButton, targetIndex);
 });
};

loadMinistry = (data)=>{
var targetContainer = document.querySelector('.ministries-container');

  var carousel = document.createElement('section');
  carousel.classList.add('carousel');
   carousel.style='--height:250px';
  targetContainer.appendChild(carousel);

  var buttonLeft = document.createElement('button');
  buttonLeft.className='carousel__button carousel__button--left is-hidden';
  buttonLeft.innerHTML=`<svg class="icon angle-left slider-icon">
      <use xlink:href="#angle-left"></use></svg>`;
  var buttonRight =  document.createElement('button');
  buttonRight.className = 'carousel__button carousel__button--right';
  buttonRight.innerHTML=`<svg class="icon angle-right slider-icon">
      <use xlink:href="#angle-right"></use></svg>`;
  var carouselTrackContainer = document.createElement('section');
  carouselTrackContainer.classList.add('carousel__track-container');
  var track = document.createElement('ul');
  track.classList.add('carousel__track');

  carouselTrackContainer.appendChild(track);
  var carouselNav = document.createElement('section');
  carouselNav.classList.add('carousel__nav');

  carousel.append(buttonLeft,carouselTrackContainer,buttonRight,carouselNav);

  data.forEach((item,index)=>{
    let li = document.createElement('li');
    li.className = 'carousel__slide ministry__card';

    let carouselIndicator = document.createElement('button');
    carouselIndicator.classList.add('carousel__indicator');

    if(index === 0){
    li.classList.add('current-slide');
    carouselIndicator.classList.add('current-slide');
    }

   let image = document.createElement('img');
   image.className = 'carousel__image';
   image.src = "{{asset('img')}}/"+item.image;
   image.setAttribute('alt','#');
   image.innerText = item.name;
   let eventInfo = document.createElement('div');
   eventInfo.className = 'ministry__description';
   let h3 =  document.createElement('h3');
   h3.innerText = item.name;
   eventInfo.innerText = item.description;
   li.append(image,eventInfo);
   
    carouselNav.appendChild(carouselIndicator);
      track.append(li);
  });


 const slides = Array.from(track.children);

 const nextButton =  buttonRight;
 const prevButton =  buttonLeft;
 const dotsNav = carouselNav;
 const dots = Array.from(dotsNav.children);

 const slideWidth = slides[0].getBoundingClientRect().width;
 
 // arrange the slides next to one another
 const setSlidePosition = (slide,index) =>{
   slide.style.left = slideWidth * index + 'px';
 };
 slides.forEach(setSlidePosition);
 
 const moveToSlide = (track, currentSlide, targetSlide) => {
   track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
   currentSlide.classList.remove('current-slide');
   targetSlide.classList.add('current-slide');
 }
 
 const updateDots = (currentDot,targetDot) => {
   currentDot.classList.remove('current-slide');
   targetDot.classList.add('current-slide');
 };
 
 const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
   if (targetIndex === 0) {
     prevButton.classList.add('is-hidden');
     nextButton.classList.remove('is-hidden');
   } else if(targetIndex === slides.length - 1){
     prevButton.classList.remove('is-hidden');
     nextButton.classList.add('is-hidden');
   } else{
     prevButton.classList.remove('is-hidden');
     nextButton.classList.remove('is-hidden');
   }
 }
 // When I click left, move slides to the left
 prevButton.addEventListener('click',(event) => {
   const currentSlide = track.querySelector('.current-slide');
   const prevSlide = currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const previousDot = currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide => slide === prevSlide);
   
   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot,previousDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
 });
 
 // When I click right, move slides to the right
 nextButton.addEventListener('click',(event)=>{
   const currentSlide = track.querySelector('.current-slide');
   const nextSlide = currentSlide.nextElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const nextDot = currentDot.nextElementSibling;
   const nextIndex = slides.findIndex(slide => slide === nextSlide);
 
   moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot,nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);
 });
 
 // When I click the nav indicators, move to that slide
 dotsNav.addEventListener('click',(event)=>{
     // what indicator was clicked on?
     const targetDot = event.closest('button');
   
     if(!targetDot) return;
 
     const currentSlide = track.querySelector('.current-slide');
     const currentDot = dotsNav.querySelector('.current-slide');
     const targetIndex = dots.findIndex(dot => dot === targetDot);
     const targetSlide = slides[targetIndex];
 
     moveToSlide(track,currentSlide,targetSlide);
 
     updateDots(currentDot,targetDot);
     hideShowArrows(slides, prevButton, nextButton, targetIndex);
 });

};

loadExecutive = (data)=>{
var leadershipContainer = document.querySelector('.leadership-container');

  var carousel = document.createElement('section');
  carousel.classList.add('carousel');
  carousel.style='--height:250px';
  leadershipContainer.appendChild(carousel);

  var buttonLeft = document.createElement('button');
  buttonLeft.className = 'carousel__button carousel__button--left is-hidden';
  buttonLeft.innerHTML = `<svg class="icon angle-left slider-icon">
      <use xlink:href="#angle-left"></use></svg>`;
  var buttonRight =  document.createElement('button');
  buttonRight.className = 'carousel__button carousel__button--right';
  buttonRight.innerHTML = `<svg class="icon angle-right slider-icon">
      <use xlink:href="#angle-right"></use></svg>`;
  var carouselTrackContainer = document.createElement('section');
  carouselTrackContainer.classList.add('carousel__track-container');
  var track = document.createElement('ul');
  track.classList.add('carousel__track');

  carouselTrackContainer.appendChild(track);
  var carouselNav = document.createElement('section');
  carouselNav.classList.add('carousel__nav');

  carousel.append(buttonLeft,carouselTrackContainer,buttonRight,carouselNav);

  data.forEach((item,index)=>{
    let li = document.createElement('li');
    li.className = 'carousel__slide user_card';

    let carouselIndicator = document.createElement('button');
    carouselIndicator.classList.add('carousel__indicator');
      
    if(index === 0){
      li.classList.add('current-slide');
      carouselIndicator.classList.add('current-slide');
    }

   let image = document.createElement('img');
   image.className = 'carousel__image';
   image.src = "{{asset('img')}}/"+item.picture;
   image.setAttribute('alt','#');
   image.innerText = item.firstname;
   let userDetails = document.createElement('div');
   userDetails.className = 'user_details';
      let h4 = document.createElement('h4');
      h4.innerText = item.firstname + ' ' + item.lastname;
    let p = document.createElement('p');
    p.innerText = item.bio;
    userDetails.append(h4,p);
   li.append(image,userDetails);

   carouselNav.appendChild(carouselIndicator);
   track.appendChild(li);
  });
   const slides = Array.from(track.children);

 const nextButton =  buttonRight;
 const prevButton =  buttonLeft;
 const dotsNav = carouselNav;
 const dots = Array.from(dotsNav.children);
  
 const slideWidth = slides[0].getBoundingClientRect().width;

 // arrange the slides next to one another
 const setSlidePosition = (slide,index) =>{
   slide.style.left = slideWidth * index + 'px';
 };
 slides.forEach(setSlidePosition);
  //console.log(dots)
   const moveToSlide = (track, currentSlide, targetSlide) => {
   track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
   currentSlide.classList.remove('current-slide');
   targetSlide.classList.add('current-slide');
 }
 
 const updateDots = (currentDot,targetDot) => {
   currentDot.classList.remove('current-slide');
   targetDot.classList.add('current-slide');
 };
 
 const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
   if (targetIndex === 0) {
     prevButton.classList.add('is-hidden');
     nextButton.classList.remove('is-hidden');
   } else if(targetIndex === slides.length - 1){
     prevButton.classList.remove('is-hidden');
     nextButton.classList.add('is-hidden');
   } else{
     prevButton.classList.remove('is-hidden');
     nextButton.classList.remove('is-hidden');
   }
 }
 // When I click left, move slides to the left
 prevButton.addEventListener('click',(event) => {
   const currentSlide = track.querySelector('.current-slide');
   const prevSlide = currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const previousDot = currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide => slide === prevSlide);
   
   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot,previousDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
 });
 
 // When I click right, move slides to the right
 nextButton.addEventListener('click',(event)=>{
   const currentSlide = track.querySelector('.current-slide');
   const nextSlide = currentSlide.nextElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const nextDot = currentDot.nextElementSibling;
   const nextIndex = slides.findIndex(slide => slide === nextSlide);
 
   moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot,nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);
 });
 
 // When I click the nav indicators, move to that slide
 dotsNav.addEventListener('click',(event)=>{
     // what indicator was clicked on?
     const targetDot = event.closest('button');
   
     if(!targetDot) return;
 
     const currentSlide = track.querySelector('.current-slide');
     const currentDot = dotsNav.querySelector('.current-slide');
     const targetIndex = dots.findIndex(dot => dot === targetDot);
     const targetSlide = slides[targetIndex];
 
     moveToSlide(track,currentSlide,targetSlide);
 
     updateDots(currentDot,targetDot);
     hideShowArrows(slides, prevButton, nextButton, targetIndex);
 });
};

loadData = (method,url,handleResponse)=>{
const request = new XMLHttpRequest();
    try {
      request.open(method, url);

      request.responseType = 'json';

      request.addEventListener('load', () => {
          handleResponse(request.response);   
      });
      request.addEventListener('error', () => console.error('XHR error'));

      request.send();

    } catch(error) {
      console.error(`XHR error ${request.status}`);
    }
};

loadData("GET","{{route('images')}}",loadImage);

loadData("GET","{{route('events')}}",loadEvent);

loadData("GET","{{route('ministries')}}",loadMinistry);

loadData("GET","{{route('libraries')}}",loadLibrary);

loadData("GET","{{route('contacts')}}",loadContact);

loadData("GET","{{route('socials')}}",loadSocial);

loadData("GET","{{route('services')}}",loadService);

loadData("GET","{{route('themes')}}",loadTheme);

loadData("GET","{{route('executives')}}",loadExecutive);



</script>

</x-app-layout>