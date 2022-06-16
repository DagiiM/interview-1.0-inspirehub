/**
  * Eleso Main Script file
  *
  * By Douglas Mutethia
  */

 window.onload = () => {
    let menuIcon = document.querySelector(".sidebar-menu-icon");
    let sidebar = document.querySelector(".sidebar");
    let userIcon = document.querySelector(".app-user-icon");
    let userNav = document.querySelector(".user-nav");
    let notification = document.querySelector(".notification");
    let notificationBody = document.querySelector(".notification-body");
    let settingsMore = document.querySelector(".sidebar-settings-btn");
    let sidebarSettings = document.querySelector(".sidebar-settings");
    let commentBtn = document.querySelector(".comment-quiz");
    let commentBox = document.querySelector(".comment-box");
    let answerBtn = document.querySelector(".accept-quiz");
    let removeAnswerBtn = document.querySelector(".close-answer-box");
    let answerBox = document.querySelector(".answer-box");
    let searchIcon = document.querySelector(".search-icon");
    let searchIconMobile = document.querySelector(".search-icon-mobile-screen");
    let searchBox = document.querySelector(".search-box");
    let actionButtons = document.querySelectorAll('.action-button');
    let actionBoxes = document.querySelectorAll('.action-box');
    let show = document.querySelector('.show');


    if (menuIcon) {
        menuIcon.onclick = () => {
            sidebar.classList.toggle("sidebar-show");
        }
    }
    if (userIcon) {
        userIcon.onclick = () => {
            userNav.classList.toggle("user-nav-show");
        }
    }
    if (notification) {
        notification.onclick = () => {
            notificationBody.classList.toggle("notification-body-show");
        }
    }
    if (settingsMore) {
        settingsMore.onclick = () => {
            sidebarSettings.classList.toggle("sidebar-settings-show");
        }
    }
    if (commentBtn) {
        commentBtn.onclick = () => {
            commentBox.classList.toggle("show");
        }
    }
    if (answerBtn) {
        answerBtn.onclick = () => {
            answerBox.classList.add("show");
        }
    }
    /**
     * Search Icon
     */
 
    if (searchIcon) {
        searchIcon.onclick = () => {
            searchBox.classList.toggle("search-box-show");    
        }
    }
    if (searchIconMobile) {
        searchIconMobile.onclick = () => {
            searchBox.classList.toggle("search-box-show");    
        }
    }
     /**
     * Action Button
     */

     if (actionButtons) {
        actionButtons.forEach(button => {
            button.addEventListener('click',()=>{
                actionBoxes.forEach(actionBox => {
                    actionBox.classList.toggle("action-box-show");
                });   
            });
        });
    }

    if (removeAnswerBtn) {
        removeAnswerBtn.onclick = () => {
            answerBox.classList.remove("show");
        }
    }

    const tabs = document.querySelectorAll('[data-target]');
    const tabContents = document.querySelectorAll('[data-content]');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
         //   console.log(tabContents)
            const target = document.querySelector(tab.dataset.target)

            tabContents.forEach(tabContent => {
                tabContent.classList.remove('category_active')
            })
            target.classList.add('category_active')

            tabs.forEach(tab => {
                tab.classList.remove('category_active')
            })
            tab.classList.add('category_active')
        })
    })

   toggleCustom = (element,show) => {
       return `${element}`.classList.toggle(`${show}`);
    }
   
    replaceButtonText = (buttonId, text) => {
        if (document.getElementById)
        {
          var button=document.getElementById(buttonId);

          if (button)
          {
            if (button.childNodes[0])
            {
              button.childNodes[0].nodeValue=text;
            }
            else if (button.value)
            {
              button.value=text;
            }
            else
            {
              button.innerHTML=text;
            }
          }
        }
      }
  
      flash = (type,message,delay=5000) => {
            const flashCard = document.querySelector('.flash-card');
            const flashCardSvg = document.querySelector('.flash-card>svg');
            const flashCardSvgUse = document.querySelector('.flash-card>svg>use');
            const flashCardSvgUseLink = document.querySelector('.flash-card>svg>use');
            const buttonClose = document.querySelector('.button-close');
  
            flashCard.classList.add('alert-'+type);
            flashCardSvg.className = '';
            flashCard.classList.add('icon,'+type);
            flashCardSvgUseLink.setAttribute('xlink:href', '#'+type);
            flashCardSvgUse.classList.add('alert-'+type);
  
            replaceButtonText('flashMessage', message);
  
            flashCard.style.display="flex";
            
            setTimeout(function() {
              flashCard.classList.remove('alert-'+type);
              flashCardSvgUse.classList.remove('alert-'+type);
              flashCard.style.display = "none";
  
            }, delay);
  
            buttonClose.onclick = ()=>{
               flashCard.style.display = "none";
            }
      }

}

carousel = (targetContainer,track, slides, nextButton, prevButton, dotsNav, dots) => {
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

}

let attachment = document.getElementById('attachment');
if(attachment){
    attachment.addEventListener('change',(event) => {
      if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var previewContainer = document.querySelector(".image__preview");
      var preview = document.querySelector("#image__preview");
      preview.src = src;
      previewContainer.style.display = "block";
      preview.style.display = "block";
    }
    });
};

const videoPreview = document.querySelector(".video__preview");
const videoSrc = document.querySelector("#video-source");
const videoTag = document.querySelector("#video-tag");
const inputTag = document.querySelector("#input-tag");

if(inputTag){
  inputTag.addEventListener('change',  readVideo);
}
function readVideo(event) {
  if (event.target.files && event.target.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      videoSrc.src = e.target.result;
      videoPreview.style.display="block";
      videoTag.load();
    }.bind(this);
    reader.readAsDataURL(event.target.files[0]);
  }
}

/*End of Category */

/**
  * The function Takes
  * method | GET | POST | DELETE
  * requestUrl
  * redirectUrl
  */
/*
 formEleso = (method,requestUrl,redirectUrl)=>{
    formElem.addEventListener('submit', (e) => {
        e.preventDefault();
    
          data = new FormData(formElem);
    
          const request = new XMLHttpRequest();
    
          request.open(method,requestUrl,true);
    
          request.upload.onprogress = (event) =>{
                  if (event.lengthComputable) {
                      let loadedLength = Math.trunc((event.loaded/event.total)*100);
                      document.querySelector('.progress-bar').style='--rotate-scale:'+loadedLength;
                      document.querySelector('.progress').style='--width:'+loadedLength+'%';
                      replaceButtonText('progress',loadedLength+'%');
                  }
              };
    
              request.upload.addEventListener("error", (e)=>{
                flash("danger", "Upload Failed");
              });
              request.upload.addEventListener("abort", (e)=>{
                flash("danger", "Upload Cancelled");
              });
    
              request.onloadstart = (event) => {
                  document.querySelector('.progress-bar').style='display:grid';
                  document.querySelector('.loader-container').style="display:grid";
              }
              request.onloadend = (event) => {
                    let requestObject = null;
                   try{
                     requestObject = JSON.parse(request.responseText);
                      flash(requestObject.type, requestObject.message);
                      document.querySelector('.loader-container').style="display:none";
                      document.querySelector('.progress-bar').style='display:none';
                      location.href=redirectUrl;
                   }catch(e){
                     console.log('Could not parse Json');
                   }
               }      
    
          request.send(data);
      });
    };

*/



