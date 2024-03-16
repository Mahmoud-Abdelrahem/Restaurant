// Get the modal
var modal = document.getElementById("orderModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the cart icon, open the modal
$(document).on('click', '.order-btn', function(e) {
  e.preventDefault();
  var mealId = $(this).data('meal-id');
  var mealName = $(this).data('meal-name');
  var mealPrice = $(this).data('meal-price');
  var meal_des = $(this).data('meal_des');

  $('#meal_id').val(mealId);
  $('#selected_meal').val(' ' + mealName + ' - ' + mealPrice + ' L.E');

  $('#meal_des').val(meal_des);
  $('#meal').val(mealId);
  modal.style.display = "block";
  
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}