"use strict";

let listToDo = [];

window.onload = function () {
    const saveButton = document.getElementById("btn-submit");

    if (saveButton) { saveButton.addEventListener("click", addItemToList) };
}

function addItemToList() {
    let user_input = document.getElementById("user-input");
    listToDo.push(user_input.value);
    addItemToPage(user_input.value);
}

function addItemToPage(lastItem) {
    let listInPage = document.getElementsByClassName('list-will-to-do');
    let newLi = document.createElement('div');
    newLi.innerHTML = `<li>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        ${lastItem}
                        <button id="btn-delete"><i class="fa fa-trash-o" style="font-size:1pem"></i></button>
                        </li>`;
    listInPage[0].appendChild(newLi);

    // const deleteButton =document.getElementById("btn-delete");
    if (newLi) { newLi.addEventListener("click", deleteItem) };
}

function deleteItem() {
    let deleteBtn = document.getElementById("btn-delete");
    deleteBtn.parentElement.remove();
}

