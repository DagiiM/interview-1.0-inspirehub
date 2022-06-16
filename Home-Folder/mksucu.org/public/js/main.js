window.onload = () => {
    let menuIcon = document.querySelector(".menu-icon");
    let sidebar = document.querySelector(".sidebar-dagii");
    let containerVideo = document.querySelector(".container-video");
    let vidList = document.querySelector(".vid-list");
    let moreIcon = document.querySelector(".more-icon");
    let searchIcon = document.querySelector(".search-icon");
    const searchInput = document.querySelector('.search-input');
    const searchBox = document.querySelector('.dagii-search-box');

    let userIcon = document.querySelector(".dagii-user-icon");

    let userOption = document.querySelector(".dagii-user-option");

    let showMore = document.querySelector(".show-more");
    let showMoreDropdown = document.querySelector(".show-more-dropdown");

    if(searchIcon){
        searchIcon.onclick = function() {
            searchBox.classList.toggle("dagii-search-box-show");
            searchInput.classList.toggle("search-input-show");
        }
    }
   if(menuIcon){
        menuIcon.onclick = function() {
            sidebar.classList.toggle("small-sidebar-dagii");
            sidebar.classList.toggle("small-sidebar-screen");
            containerVideo.classList.toggle("large-container-video");
        }
   }

  if(userIcon){
    userIcon.onclick = function() {
        userOption.classList.toggle("dagii-user-option-show");
    }
  }
    if(showMore){
        showMore.onclick = function() {
            showMoreDropdown.classList.toggle("show-more-dropdown-screen");
        }
    }
        
    if(vidList){
        vidList.onmouseover = function() {
            moreIcon.classList.toggle("show-more-icon");
        }
    }
  
}