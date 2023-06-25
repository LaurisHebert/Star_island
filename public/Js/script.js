const d = document;
const countDown = d.querySelector('#countDown');
const listRoles = d.querySelector("#listRoles")

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
if (listRoles){
    for (let role in staff) {
        let newListRole = d.createElement("li")
        newListRole.classList.add("list-group-item")
        newListRole.textContent = role
        listRoles.appendChild(newListRole)
    }
}
