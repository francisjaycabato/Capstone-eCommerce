// Get the modal
var modal = document.getElementById("img-modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("img-modal-trigger");
var modalImg = document.getElementById("img01");
var productText = document.getElementById("product-content");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  productText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-img-modal")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}