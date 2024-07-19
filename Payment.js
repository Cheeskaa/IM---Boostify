function showPopup() {
  document.querySelector('.popup').style.display = 'block';
  document.querySelector('.overlay').style.display = 'block';
}

function hidePopup() {
  document.querySelector('.popup').style.display = 'none';
  document.querySelector('.overlay').style.display = 'none';
}

function handleGCashPayment(event) {
  event.preventDefault();
  showPopup();
}

function handleSubmit(event) {
  event.preventDefault();
  alert('Payment Submitted Successfully!');
}

function goBack() {
  window.location.href = 'ClientOrders.html';
}