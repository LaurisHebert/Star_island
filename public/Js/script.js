let d = document;
let countDown = d.querySelector('#countDown');

if (countDown) {
    let x = setInterval(function () {

        let now = new Date().getTime();

        let timeLeft = countDownDate - now;

        let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        countDown.innerHTML = days + 'J ' + hours + 'H ' + minutes + 'M ' + seconds + 'S ';
    }, 1000);
}

