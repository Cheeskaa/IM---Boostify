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

/*----------------------------FOR NOTIFICATIONS---------------------------------*/
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


    // Close dropdowns when clicking outside
    document.addEventListener('click', (event) => {
        if (!bellIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.style.display = 'none';
            bellIcon.classList.remove('active');
        }
    });
});

/*----------------------------SA ADD ORDER PAGE - FILTER BOOSTER---------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".filter-games button");
    const boostersContainer = document.querySelector(".avail-boosters");

    // Fetch boosters data from the server
    fetch('fetch_boosters.php')
        .then(response => response.json())
        .then(data => {
            // Generate the HTML for each booster
            data.forEach(booster => {
                const boosterDiv = document.createElement('div');
                boosterDiv.classList.add('booster-1');
                boosterDiv.dataset.games = booster.expertise.toLowerCase(); // Store expertise in lowercase for easier comparison
                boosterDiv.innerHTML = `
                    <a href="#">
                        <div class="star1-rating">
                            <i class='bx bxs-star'></i><p>${booster.rating}</p>
                        </div>
                        <img src="Images/profile2.svg" alt="">
                        <p>${booster.username}</p>
                        <p>${booster.expertise}</p>
                    </a>
                `;
                boostersContainer.appendChild(boosterDiv);
            });

            // Add event listeners for filtering
            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const game = button.dataset.game.toLowerCase(); // Convert game to lowercase for comparison
                    const boosters = document.querySelectorAll(".booster-1");

                    boosters.forEach(booster => {
                        if (booster.dataset.games.includes(game)) {
                            booster.style.display = "block";
                        } else {
                            booster.style.display = "none";
                        }
                    });
                });
            });
        })
        .catch(error => console.error('Error fetching boosters:', error));
});



/*----------------------------SA BOOSTER PROFILE - ADD OG REVIEW---------------------------------*/
function toggleReviewForm() {
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm.style.display === 'none') {
        reviewForm.style.display = 'block';
    } else {
        reviewForm.style.display = 'none';
    }
}

function addReview(event) {
    event.preventDefault();

    const rating = document.getElementById('rating').value;
    const comment = document.getElementById('comment').value || 'No comment';
    const reviewList = document.getElementById('reviewList');

    const reviewDiv = document.createElement('div');
    reviewDiv.classList.add('review');

    const ratingP = document.createElement('p');
    ratingP.textContent = `Rating: ${rating} stars`;
    reviewDiv.appendChild(ratingP);

    const commentP = document.createElement('p');
    commentP.textContent = comment;
    reviewDiv.appendChild(commentP);

    reviewList.appendChild(reviewDiv);

    document.getElementById('addReviewForm').reset();
    toggleReviewForm();
}
