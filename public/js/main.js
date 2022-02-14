"use strict";

// пусть будет
let listToDo = [];

const saveButton = document.getElementById("btn-submit");

if (saveButton) { saveButton.addEventListener("click", addItemToList) };

function addItemToList() {
    let user_input = document.getElementById("user-input");
    listToDo.push(String(user_input.value));
    addItemToPage(user_input.value);
    user_input.value = "";
}

function addItemToPage(lastItem) {
    let newLi = document.createElement('li');
    newLi.innerHTML = `<input class="form-check-input done" type="checkbox" value="" id="done${lastItem}">
                        ${lastItem}
                        <button id="delete${lastItem}" class="btn btn-delete"><i class="fa fa-trash-o" style="font-size:1pem"></i></button>`
    document.getElementById('list-will-do').appendChild(newLi);

    document.getElementById(`delete${lastItem}`).addEventListener("click", deleteItem);
    document.getElementById(`done${lastItem}`).addEventListener("click", doneItem);
}

function deleteItem(clickedBtn) {
    let textOfLi = clickedBtn.srcElement.closest('li').innerText;
}

function doneItem(clickedCheckBox) {
    let newLi = document.createElement('li');
    let lastItem = clickedCheckBox.srcElement.closest('li').innerText;
    newLi.innerHTML = `<input class="form-check-input done" type="checkbox" value="" id="done${lastItem}" checked disabled>
                        ${lastItem}`
    document.getElementById('list-done').appendChild(newLi);
    document.getElementById('list-will-do').removeChild(clickedCheckBox.srcElement.closest('li'));
}