const connexForm = document.querySelector('#connexion');
const inscriForm = document.querySelector('#inscription');
const changeBtn = document.querySelector('.change-btn');
const connexPara = document.querySelector('.connexion-para');
const connexSubtitle = document.querySelector('.connexion-subtitle');

//show and hide password text
const psdBtns = document.querySelectorAll('.psd-btn');
const psdInput = document.querySelector('#password-connexion');
const showPsd = document.querySelector('#show-psd');
const hidePsd = document.querySelector('#hide-psd');

psdBtns.forEach(psdBtn => {
    psdBtn.addEventListener('click', psdVisibility = () => {
        if (psdInput.type === 'password') {
            psdInput.type = 'text';
            hidePsd.style.display = 'none';
            showPsd.style.display = 'block';
        } else {
            psdInput.type = 'password';
            hidePsd.style.display = 'block'; 
            showPsd.style.display = 'none';
        }
    });
});

// show and hide service para
let aboutServiceBtn = document.querySelectorAll('.about-service-item-title');

for (i = 0; i < aboutServiceBtn.length; i++) {
    aboutServiceBtn[i].addEventListener("click", function() {
        this.classList.toggle("active");
        let aboutServicePara = this.nextElementSibling;
        if (aboutServicePara.style.maxHeight) {
            aboutServicePara.style.maxHeight = null;
        } else {
          aboutServicePara.style.maxHeight = aboutServicePara.scrollHeight + 'px';
        }
    });
}

// SHOW AND HIDE NAVBAR ON RESPONSIVE
const navBarItem = document.querySelector('#navbar-item');
const barBtn = document.querySelector('.bar');
const hideBtn = document.querySelector('.hide');

barBtn.addEventListener('click', showNav = () => {
    navBarItem.style.top = '0';
    navBarItem.style.opacity = 1;
});
hideBtn.addEventListener('click', hideNav = () => {
    navBarItem.style.top = '-20rem';
    navBarItem.style.opacity = 0;
});
