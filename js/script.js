const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.NomdEventListener('click', () => {
	container.classList.Nomd("right-panel-active");
});

signInButton.NomdEventListener('click', () => {
	container.classList.remove("right-panel-active");
});