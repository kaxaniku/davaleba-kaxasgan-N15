//AJAX request for background
function changeBG(btn) {
let mode = btn.getAttribute('data-mode');
var Data = new FormData();
Data.append('mode',mode);
Data.append('action','change-mode');

var xhttp = new XMLHttpRequest();

xhttp.open('POST', 'actions.php');

xhttp.send(Data)

xhttp.onload = function(){
    if (xhttp.status == 200 && xhttp.response == "OK") {
        if (mode == 'light') {
            document.body.classList.add('light');
            document.body.classList.remove('dark');
            btn.innerText = "Dark mode";
            btn.setAttribute('data-mode','dark')
        }  else {
            document.body.classList.add('dark');
            document.body.classList.remove('light');
            btn.innerText = "Light mode";
            btn.setAttribute('data-mode','light')
        }
    }
}
}

//subscribe
function ToSubscribe() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    if(!name || !email || !phone) {
        alert('Invalid user');
        return false;
    }

    var data = new FormData();
    data.append('action', 'subscribe');
    data.append('name', name);
    data.append('email', email);
    data.append('phone', phone);

    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', 'actions.php');
    xhttp.send(data);
    xhttp.onload = function(){
        if (xhttp.status == 200 && xhttp.response == "OK") {
            document.getElementById('SubForm').classList.add('successful')
        } else {
            alert('something went wrong, please try again later.');
        }
    }
}

function Return() {
    document.getElementById('SubForm').classList.remove('successful');
    document.getElementById('SubForm').firstElementChild.reset();
}