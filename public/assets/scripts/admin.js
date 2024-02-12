const btn2 = document.getElementById('photoButton');
const btn = document.getElementById('buildingButton');
const buildingForm = document.getElementById('buildingForm');
const photoForm = document.getElementById('photoForm');
buildingForm.style.display = 'none';
photoForm.style.display = 'none';
const formArray=[]
btn.addEventListener('click', () => {

    if (buildingForm.style.display === 'none') {
        // 👇️ this SHOWS the form
        buildingForm.style.display = 'block';
        photoForm.style.display = 'none';
    } else {
        // 👇️ this HIDES the form
        buildingForm.style.display = 'none';
    }
});
btn2.addEventListener('click', () => {

    if (photoForm.style.display === 'none') {
        // 👇️ this SHOWS the form
        photoForm.style.display = 'block';
        buildingForm.style.display = 'none';
    } else {
        // 👇️ this HIDES the form
        photoForm.style.display = 'none';
    }
});
