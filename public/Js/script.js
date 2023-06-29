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
    let addedRoles = [];
    for (let key in staffArray) {
        let role = staffArray[key].role;
        if (!addedRoles.includes(role)) {
            let newListRole = d.createElement("li")
            newListRole.classList.add("list-group-item")
            newListRole.textContent = role;
            newListRole.addEventListener("click", ev => {
                fetch('/projets/Star_island/public/', {
                    method: 'POST', body: JSON.stringify({role: newListRole.textContent})
                })
                    .then(response => response.json())
                    .then(data => {
                        // Traitement des données JSON
                        displayTeam(data.content);
                    })
            });
            listRoles.appendChild(newListRole)
            addedRoles.push(role)
        }
    }
    displayTeam(staffArray)
}
function displayTeam(Array) {
    if (!Array){
        Array = staffArray;
    }
    staffDisplay.innerHTML =""
    nbr = 0;
    console.log(Array)
    for (let key in Array) {
        const member = Array[key];
        nbr++;
        if (nbr === 1 || nbr === 6) {
            emptyDiv()
        }
        addMember(member)
        if (nbr === 11) {
            nbr = 0
        }
    }
    emptyDiv()
}

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
    newMemberDiv.appendChild(newMemberPicture)
    newMemberDiv.appendChild(newMemberName);
    staffDisplay.appendChild(newMemberDiv)
}

function emptyDiv() {
    let emptyDiv = d.createElement("div");
    emptyDiv.classList.add('col-1')
    staffDisplay.appendChild(emptyDiv)
}

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










