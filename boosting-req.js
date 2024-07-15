/*ANG JS SA content02 kay naas line 135*/

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

  // Toggle menu dropdown
  // menuIcon.addEventListener('click', (e) => {
  //     e.stopPropagation();
  //     if (menuDropdown.style.display === 'none' || menuDropdown.style.display === '') {
  //         menuDropdown.style.display = 'block';
  //         menuIcon.classList.add('active');
  //     } else {
  //         menuDropdown.style.display = 'none';
  //         menuIcon.classList.remove('active');
  //     }
  //     notificationDropdown.style.display = 'none';
  //     bellIcon.classList.remove('active');
  // });

  // Close dropdowns when clicking outside
  document.addEventListener('click', (event) => {
      if (!bellIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
          notificationDropdown.style.display = 'none';
          bellIcon.classList.remove('active');
      }
      // if (!menuIcon.contains(event.target) && !menuDropdown.contains(event.target)) {
      //     menuDropdown.style.display = 'none';
      //     menuIcon.classList.remove('active');
      // }
  });
});

/*----------------------------SA ADD ORDER PAGE - FILTER BOOSTER---------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".filter-games button");
  const boosters = document.querySelectorAll(".booster-1");

  buttons.forEach(button => {
      button.addEventListener("click", () => {
          const game = button.dataset.game;
          
          boosters.forEach(booster => {
              if (booster.dataset.games.includes(game)) {
                  booster.style.display = "block";
              } else {
                  booster.style.display = "none";
              }
          });
      });
  });
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


function changeContent() {
  var contentSelect = document.getElementById('serviceType');
  var content02 = document.getElementById('content02');
  var contentTitle = document.getElementById('contentTtl');
  var selectedValue = contentSelect.value;

  content02.classList.remove('visible', 'content1', 'content2', 'content3'); // Remove all classes

  setTimeout(function() {
      switch(selectedValue) {
          case 'content1':
            contentTitle.innerHTML = '<p>RANKING GAME1</p>';
            content02.innerHTML = 
            `<div id="content02" class="content-02" style="width: 300px; position: absolute; left: -60px; top: -3px;"> 
                <p for="serviceType" style="padding-top: 0%; margin-top: 7px; margin-bottom: 6px;" class="ServiceTypeText">2. Desired Goal</p>    
                <label style="font-size:18px; font-weight: 300;" for="currRank" class="forRank">Current Rank </label>
                <input class="inputRank"><br>
                <label style="font-size:18px; font-weight: 300;" for="desRank" class="forRank">Desired Rank </label>
                <input class="inputRank"><br>
                <label style="font-size:18px; font-weight: 300;" for="priceRank" class="forRank">Price: </label>
                <input required class="input-p-Rank"><br>
 
                <p class="ServiceTypeText" style="margin-bottom: 0px;">4. All Set <br> <p style="color: white; font-size: 15px; margin-top: 0px; padding-left: 35px;">You may submit.</p></p><br>
            </div>`;
            content02.classList.add('ServiceTypeText');
            content02.classList.add('inputRank');
            content02.classList.add("forRank");
            content02.classList.add('input-p-Rank');
              break;
          case 'content2':
            contentTitle.innerHTML = '<p>COMMISSION</p>';
            content02.innerHTML = `<div id="content02" class="content-02" style=" width: 300px;  position: absolute; left: -60px; top: -3px;"> 
                <p for="serviceType" style="padding-top: 0%; margin-top: 7px; margin-bottom: 6px;" class="ServiceTypeText">2. Desired Goal</p>    
                <label style="font-size:18px; font-weight: 300;" for="currRank" class="forRank">Duration</label>
                <input class="inputRank"><br>
               <label style="font-size:18px; font-weight: 300;" for="priceRank" class="forRank">Price: </label>
                <input required class="input-p-Rank"><br><p class="ServiceTypeText" style="margin-bottom: 0px;">4. All Set <br> <p style="color: white; font-size: 15px; margin-top: 0px; padding-left: 35px;">You may submit.</p></p><br>
            </div>`;
            content02.classList.add('ServiceTypeText');
            content02.classList.add('inputRank');
            content02.classList.add("forRank");
            content02.classList.add('input-p-Rank');
              break;
          default:
            content02.innerHTML = '<p>Select an option from the dropdown to see the content.</p>';
      }

      content02.classList.add('visible'); // Show the content box with animation
  }, 500); // Delay the content change to match the transition duration
}

// Ensure the initial content is visible on page load
document.addEventListener("DOMContentLoaded", function() {
  var content002 = document.getElementById('ccontent02');
  content002.classList.add('visible');
});

