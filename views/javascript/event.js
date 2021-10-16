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
    }
});
window.addEventListener('load',() => {
    const alert = document.querySelector(".alert");
        if(alert){
        setTimeout(() => {
            alert.remove();
        },4000);
    }
});