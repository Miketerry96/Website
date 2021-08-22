const splash = document.querySelector('.splash');
const pic = document.querySelector('.pic');

document.addEventListener('DOMContentLoaded', (e) => {
    setTimeout(() => {
       splash.classList.add('display-none'); 
       pic.classList.add('animate-pic');
    }, 2000);
})