const d = document;
const countDown = d.querySelector('#countDown');
const listRoles = d.querySelector("#listRoles")
const comments = d.querySelectorAll(".comment")
const staffDisplay = d.querySelector("#staffDisplay")
let nbr = 0;


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
if (listRoles && staffArray) {
    for (let role in staffArray) {
        let newListRole = d.createElement("li")
        newListRole.classList.add("list-group-item")
        newListRole.textContent = role;
        newListRole.addEventListener("click", ev => {
            console.log(newListRole.textContent)
        })
        listRoles.appendChild(newListRole)
    }
}
if (staffDisplay) {
    console.log(staffArray)

    function displayTeam(preciseRole = null) {
        for (let role in staffArray) {
            for (let member in staffArray[role]) {
                nbr++;
                if (preciseRole === null) {
                    if (nbr === 1 || nbr === 6) {
                        emptyDiv()
                    }
                    addMember(staffArray[role][member])
                } else if (preciseRole === role) {
                    console.log(nbr)
                    if (nbr === 1 || nbr === 6) {
                        console.log('emptydiv')
                        emptyDiv()
                    }
                    addMember(staffArray[role][member])
                }
                if (nbr === 11) {
                    nbr = 0
                }
            }

        }
        emptyDiv()

    }

    displayTeam()

    function addMember(member) {
        let newMemberDiv = d.createElement('div')
        newMemberDiv.classList.add('col-2')
        let newMemberPicture = d.createElement('img');
        newMemberPicture.classList.add("img-thumbnail", "rounded-circle")
        newMemberPicture.src = "https://www.w3schools.com/w3css/img_avatar.png";
        newMemberPicture.style = "height: 120px; width: 120px"
        let newMemberName = d.createElement('p');
        let name = d.createTextNode(member.nickname);
        newMemberName.appendChild(name);
        let newMemberRole = d.createElement('p');
        let role = d.createTextNode(member.role);
        newMemberRole.appendChild(role)
        newMemberDiv.appendChild(newMemberPicture)
        newMemberDiv.appendChild(newMemberName);
        newMemberDiv.appendChild(newMemberRole)
        staffDisplay.appendChild(newMemberDiv)
    }

    function emptyDiv() {
        let emptyDiv = d.createElement("div");
        emptyDiv.classList.add('col-1')
        staffDisplay.appendChild(emptyDiv)
    }
}

//<div className="col-2">
//  <img src="https://www.w3schools.com/w3css/img_avatar.png" alt="Avatar"
//  class="img-thumbnail rounded-circle" style="height: 120px; width: 120px">
//  <p>role</p>
//  <p>nickname</p>
//  <p>overlay</p>
//</div>

if (comments) {
    comments.forEach(comment => {
        comment.addEventListener('click', e => {
            const commentText = comment.querySelector('#comment')
            const commentProfilPicture = comment.querySelector('#profilPicture')
            const commentDate = comment.querySelector('#date')
            const commentStars = comment.querySelector('#stars')
            alert(commentText.textContent)
        })
    })
}










