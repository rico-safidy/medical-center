// DASHBOARD
// SHOW AND HIDE LEFT NAV
const dashMenu = document.querySelector('.dash-menu');
const dashX = document.querySelector('.dash-x');
const dashLeftNav = document.querySelector('.dash-left-nav');

dashMenu.addEventListener('click', openMenu = () => {
    dashLeftNav.style.left = '1rem'; 
    dashLeftNav.style.opacity = 1;
});
dashX.addEventListener('click', closeMenu = () => {
    dashLeftNav.style.left = '-20rem';
    dashLeftNav.style.opacity = 0;
});

// Dropdown btn left nav
const dashDropdown = document.querySelector('.dash-left-nav-menu-link-btn');
const dashDropdownItem = document.querySelector('#dash-dropdown');
const dashArrow = document.querySelector('.dash-left-nav-menu-arrow');

dashDropdown.addEventListener('click', showBtns = () => {
    if (dashDropdownItem.style.display === 'block') {
        dashDropdownItem.style.display = 'none';
        dashArrow.style.transform = 'rotate(0deg)';
    } else {
        dashDropdownItem.style.display = 'block';
        dashArrow.style.transform = 'rotate(-180deg)';
    }
});