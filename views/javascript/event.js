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