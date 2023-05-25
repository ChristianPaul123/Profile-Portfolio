let menu = document.querySelector('#menu-bars');
let header = document.querySelector('header');
const img = document.querySelector("img");

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  header.classList.toggle('active');
}

window.onscroll = () =>{
  menu.classList.remove('fa-times');
  header.classList.remove('active');
}


img.onclick = function(){
  this.classList.toggle("active");
}

//responsive gallery

const allImages = document.querySelectorAll(".images .img");
const lightbox = document.querySelector(".cover");
const closeImgBtn = lightbox.querySelector(".close-icon");

allImages.forEach(img => {
    //  showLightBox function  passing clicked img src as argument
    img.addEventListener("click", () => showLightbox(img.querySelector("img").src));
});

const showLightbox = (img) => {
    // Showing lightbox and updating
    lightbox.querySelector("img").src = img;
    lightbox.classList.add("show");
    document.body.style.overflow = "hidden";
}

closeImgBtn.addEventListener("click", () => {
    // Hiding lightbox on close 
    lightbox.classList.remove("show");
    document.body.style.overflow = "auto";
});

//responsive video gallery

const row2 = document.querySelector(".row-2"),
mainVideo = document.querySelector(".main-video video"),
 videos = document.querySelectorAll(".videos"),
 close = document.querySelector(".close");

 for (var i = 0; i < videos.length; i++) {
   videos[i].addEventListener("click", (e)=>{
     const target = e.target;
     row2.classList.add("active");
     target.classList.add("active");
     let src = document.querySelector(".videos.active video").src;
     mainVideo.src = src;

     close.addEventListener("click", ()=>{
       row2.classList.remove("active");
       target.classList.remove("active");
       mainVideo.src = "";
     });
   });
 };
