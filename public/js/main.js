"use strict";

let listToDo = [];

const saveButton = document.getElementById("btn-submit");

if (saveButton) { saveButton.addEventListener("click", addItemToList) };


function addItemToList() {
    let user_input = document.getElementById("user-input");
    listToDo.push(user_input.value);
    addItemToPage(user_input.value);
}

function addItemToPage(lastItem) {
    let newLi = document.createElement('li');
    newLi.innerHTML = `<input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        ${lastItem}
                        <button id="btn-delete" class="btn"><i class="fa fa-trash-o" style="font-size:1pem"></i></button>`
    document.getElementById('list-will-to-do').appendChild(newLi);

    // const deleteButton = document.getElementById("btn-delete");
    // if (newLi) { newLi.addEventListener("click", deleteItem) };
    newLi.addEventListener("click", deleteItem);
}


function deleteItem() {
    let deleteBtn = document.getElementById("btn-delete");
    deleteBtn.parentElement.remove();
    // deleteBtn.closest('li').remove();
}
