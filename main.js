const signInButton = document.querySelector('#signInButton');
const signUpButton = document.querySelector('#signUpButton');
const overlay_container = document.querySelector('.sign-container .overlay-container');
const overlay = document.querySelector('.sign-container .overlay-container .overlay');
const signInForm =document.querySelector('.sign-container .sign-in-form')
const signUpForm =document.querySelector('.sign-container .sign-up-form')

signInButton.addEventListener('click', ()=>{
    overlay_container.style.transform = 'translateX(100%)';
    overlay.style.transform = 'translateX(-50%)';
    signInForm.classList.add('active')
    signUpForm.classList.remove('active')
});
signUpButton.addEventListener('click', ()=>{
    overlay_container.style.transform = 'translateX(0)';
    overlay.style.transform = 'translateX(0)';
    signUpForm.classList.add('active')
    signInForm.classList.remove('active')
});