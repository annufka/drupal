"use strict";

const saveButton = document.getElementById("btn-submit");
const listUl = document.getElementById("list-will-do");
const listUlDone = document.getElementById("list-done");
const checkButton = document.getElementsByClassName("done");
const deleteButton = document.getElementsByClassName("btn-delete");

// вместо localStorage
let listToDo = [];
// это список всех li
let listUlForPage = [];

class Task {
    constructor(description) {
        this.description = description;
        this.done = false;
    }
}

if (saveButton) { saveButton.addEventListener("click", addItemToList) };

function addItemToList() {
    let user_input = document.getElementById("user-input");
    let newItem = new Task(user_input.value);
    listToDo.push(newItem);
    refreshPage();
    user_input.value = "";
}

function refreshPage() {
    listUl.innerHTML = "";
    listUlDone.innerHTML = "";
    for (let item in listToDo) {
        if (listToDo[item].done) {
            listUlDone.innerHTML += generateHTML(listToDo[item], item);
        } else {
            listUl.innerHTML += generateHTML(listToDo[item], item);
        }
    }
    listUlForPage = document.querySelectorAll('.todo-item');
}

function generateHTML(task, index) {
    let HTML = `<div class="todo-item">
                    <li>
                        <input id="${index}" class="form-check-input done" type="checkbox" value="" ${task.done ? "checked" : ""}>
                        ${task.description}
                        <button id="${index}" class="btn btn-delete"><i id="${index}" class="fa fa-trash-o" style="font-size:1pem"></i></button>
                    </li>
                </div>`;
    return HTML
}

document.getElementById("list-will-do").addEventListener("click", function (event) {
    actionWithItem(event);
});

document.getElementById("list-done").addEventListener("click", function (event) {
    actionWithItem(event);

});

function actionWithItem(event) {
    if (event.target.tagName == "INPUT") {
        listToDo[event.target.id].done = !listToDo[event.target.id].done;
    }
    if (event.target.tagName == "I" || event.target.tagName == "BUTTON") {
        listToDo.splice(event.target.id, 1);
    }
    refreshPage();
}