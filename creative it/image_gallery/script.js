// পপআপ এলিমেন্টগুলো সিলেক্ট করা
const popup = document.getElementById('imagePopup');
const popupImg = document.getElementById('popupImg');
const closeBtn = document.getElementById('closePopup');
const galleryImages = document.querySelectorAll('.gallery-img');


galleryImages.forEach(image => {
    image.addEventListener('click', function() {
        const clickedImgSrc = this.getAttribute('src');
        popupImg.setAttribute('src', clickedImgSrc);
        popup.style.display = 'flex';
    });
});

closeBtn.addEventListener('click', function() {
    popup.style.display = 'none';
});


popup.addEventListener('click', function(event) {
    if (event.target === popup || event.target === closeBtn) {
        popup.style.display = 'none';
    }
});
