"use strict";

window.onload = function () {
    const saveButton = document.getElementById("btn-submit");
    // const clearButton = document.getElementById("btn-reset");

    let listToDo = [];

    if (saveButton) { saveButton.addEventListener("click", addItemToList) };
}

function addItemToList() {
    let user_input = document.getElementById("user-input");
    console.log(user_input.value);
}

// function resetItemToList(){

// }

// if (clearButton){clearButton.addEventListener( "click" , resetItemToList)};

// let item = prompt();

// if (item){
//     listToDo.push(item);
// }

// console.log(listToDo);