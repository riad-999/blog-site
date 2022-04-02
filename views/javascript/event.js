// toggle sidebar
const sidebar = document.querySelector(
    '.sidebar'
);
const toggleBtn = 
document.querySelector(".toggle-sidebar");
toggleBtn.addEventListener(
    'click',() => {
        sidebar.classList
        .toggle('hide');
        sidebar.classList
        .toggle('show');
    }
)

// alert
window.addEventListener('load',() => {
    const alert = document.querySelector(".alert");
    if(alert){
        setTimeout(() => {
            alert.classList.add('no-opacity');
        },3000);
        setTimeout(() => {
            alert.remove();
        },4000);
    }
});
// confirm
const cancelBtn = document.getElementById('cancel-btn');
const confirm = document.querySelector('.confirm__wrapper');
// check if i am the page have confirmation card 
// to do so i just need to check if there is one of confirmation buttons 
if(cancelBtn) {
    // add an event to delete btns of each card
    // i using event delegation
    const articlesWrapper = document.querySelector('.blogs-wrapper');
    articlesWrapper.addEventListener('click',(event) => {
        if(event.target.classList.contains('delete')){
            const id = event.target.dataset.id;
            confirm.classList.remove('hidden');
            const yesBtn = document.getElementById('yes-btn');
            const href = yesBtn.getAttribute('href');
            console.log(href);
            console.log(id);
            yesBtn.setAttribute('href',href + id);
        }
    });
}
cancelBtn.addEventListener('click',() => confirm.classList.add('hidden'));