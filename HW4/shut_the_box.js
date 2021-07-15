let box_score = 45; // 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9
let dice_roll = null;
let boxes = document.getElementsByClassName("boxes")
let rollresult = document.getElementById("rollresult");
let rollbutton = document.getElementById("diceroll");
let submitbutton = document.getElementById("submit");
let checkbox_headers = document.getElementsByClassName("boxheader")


window.onload = function () {
    submitbutton.disabled = true;

    for (let i = 0; i < checkbox_headers.length; i++) {
        checkbox_headers[i].addEventListener("click", e=> {
            if(!boxes[i].disabled) {
                boxes[i].click();
            }
        });
    }
};



function sum_checked_values() {
    let sum = 0;
    for (let i = 0; i < boxes.length; i++) {
        if (boxes[i].checked)
            // zero indexed, so we need to add 1 to the index
            // to get the box number the checkbox represents
            sum += (i + 1);
    }
    return sum;
}

function check_submission() {
    let sum = sum_checked_values();
    if (sum !== dice_roll) {
        alert("The total of the boxes you selected does not match the dice roll. Please make another selection and try again.");
    } else {
        for (let i = 0; i < boxes.length; i++) {
            if (boxes[i].checked) {
                boxes[i].disabled = true;
                boxes[i].checked = false;
            }
        }
        rollbutton.disabled = false;
        submitbutton.disabled = true;

        dice_roll = null;
        rollresult.innerHTML = "";
    }
}

function roll() {
    let sum = sum_checked_values();
    let result_string;
    if (sum >= box_score - 6) {
        result_string = roll_die();
    } else {
        result_string = roll_dice();
    }
    rollresult.innerHTML = result_string;

    rollbutton.disabled = true;
    submitbutton.disabled = false;
}

function roll_dice() {
    let first = Math.floor(Math.random() * 6) + 1;
    let second = Math.floor(Math.random() * 6) + 1;
    dice_roll = first+second;
    return `${first} + ${second} = ${first+second}`;
}

function roll_die() {
    let first = Math.floor(Math.random() * 6) + 1;
    dice_roll = first;
    return `${first}`;
}

function finish() {
    let sum = 0;
    for (let i = 0; i < boxes.length; i++) {
        if (!boxes[i].disabled) {
            sum += (i+1);
        }
    }
    alert(`Your final score is ${sum}.`);
}