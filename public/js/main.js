"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const saveButton = document.getElementById("btn-submit");
    saveButton.addEventListener("click", function () {
        var oReq = new XMLHttpRequest();
        let user_input = document.getElementById("user-input");
        oReq.addEventListener("load", function () {
            let responce = JSON.parse(this.responseText);
            document.getElementById("list-will-do").innerHTML = generatePage(responce, false);
            document.getElementById("list-done").innerHTML = generatePage(responce, true);
        });
        let newItem = user_input.value;
        user_input.value = "";
        let data = new FormData();
        data.append('new_task', newItem);
        oReq.open("POST", "add.php", true);
        oReq.send(data);
    });
    document.getElementById("list-will-do").addEventListener("click", function (event) {
        actionWithItem(event);
    });

    document.getElementById("list-done").addEventListener("click", function (event) {
        actionWithItem(event);

    });
})


function generatePage(responceArray, bool) {
    let listUl = "";
    for (let item in responceArray) {
        if (responceArray[item][1] === bool) {
            listUl += generateHTML(responceArray[item], item);
        }
    }
    return listUl
}

function generateHTML(task, index) {
    let HTML = `<div class="todo-item">
                    <li class="d-flex justify-content-start align-items-center">
                        <input id="${index}" class="form-check-input done" type="checkbox" value="" ${task[1] ? "checked" : ""}>
                        ${task[0]}
                        <button id="${index}" class="btn btn-delete"><i id="${index}" class="fa fa-trash-o" style="font-size:1pem"></i></button>
                    </li>
                </div>`;
    return HTML
}


function actionWithItem(event) {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", function () {
        let responce = JSON.parse(this.responseText);
        document.getElementById("list-will-do").innerHTML = generatePage(responce, false);
        document.getElementById("list-done").innerHTML = generatePage(responce, true);
    });
    let data = new FormData();
    data.append('task_id', event.target.id);
    if (event.target.tagName == "INPUT") {
        oReq.open("POST", "change.php", true);
    }
    if (event.target.tagName == "I" || event.target.tagName == "BUTTON") {
        oReq.open("POST", "delete.php", true);
    }
    oReq.send(data);
}