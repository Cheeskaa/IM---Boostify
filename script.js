const showPopup = document.querySelector('.profile');
const popupContainer = document.querySelector('.popup-container');
const closePopup = document.querySelector('.bx-arrow-back');

showPopup.onclick = () => {
    popupContainer.classList.add('active');
    document.body.classList.add('noscroll');
};

closePopup.onclick = () => {
    popupContainer.classList.remove('active');
    document.body.classList.remove('noscroll');
};
/* -----------------------END SA POPUP------------------------- */

/*----------------------------CHANGING OF TAB SA POPUP PROFILE---------------------------------*/
const tabs = document.querySelectorAll('.tab_btn');
const allContent = document.querySelectorAll('.profile-content');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(tab => tab.classList.remove('active'));
        allContent.forEach(content => content.classList.remove('active'));

        tab.classList.add('active');
        allContent[index].classList.add('active');
    });
});


document.addEventListener('DOMContentLoaded', (event) => {
    const bellIcon = document.getElementById('bell-icon');
    const notificationDropdown = document.getElementById('notification_dd');
    const menuIcon = document.getElementById('menu-icon');
    const menuDropdown = document.getElementById('menu_dd');

    // Toggle notification dropdown
    bellIcon.addEventListener('click', (e) => {
        e.stopPropagation();
        if (notificationDropdown.style.display === 'none' || notificationDropdown.style.display === '') {
            notificationDropdown.style.display = 'block';
            bellIcon.classList.add('active');
        } else {
            notificationDropdown.style.display = 'none';
            bellIcon.classList.remove('active');
        }
        menuDropdown.style.display = 'none';
        menuIcon.classList.remove('active');
    });

    // Toggle menu dropdown
    menuIcon.addEventListener('click', (e) => {
        e.stopPropagation();
        if (menuDropdown.style.display === 'none' || menuDropdown.style.display === '') {
            menuDropdown.style.display = 'block';
            menuIcon.classList.add('active');
        } else {
            menuDropdown.style.display = 'none';
            menuIcon.classList.remove('active');
        }
        notificationDropdown.style.display = 'none';
        bellIcon.classList.remove('active');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (event) => {
        if (!bellIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.style.display = 'none';
            bellIcon.classList.remove('active');
        }
        if (!menuIcon.contains(event.target) && !menuDropdown.contains(event.target)) {
            menuDropdown.style.display = 'none';
            menuIcon.classList.remove('active');
        }
    });
});


