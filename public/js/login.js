window.onload = () => {
    const sendBtn = document.getElementById('login');
    sendBtn.addEventListener('click', event => {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        console.log(email, password);
    })
};