document.getElementById("username_input").value = get_username();

function process_username() {

    const username = document.getElementById("username_input").value
    let message = '';
    if (username.length < 5) {
        message += "Username must be 5 characters or longer.\n";
    }

    if (username.length > 40) {
        alert("Username must be 40 characters or shorter.\n")
        return;
    }

    // Illegal characters
    const illegal = {
        ' ': 'spaces',
        ',': 'commas',
        ';': 'semicolons'
    };

    for (const [character, name] of Object.entries(illegal)) {
        if (username.includes(character)) {
            message += `Username cannot contain ${name}.\n`;
        }
    }

    // if you tripped up at any of the basic errors,
    // alert and don't even bother with the regex legal characters
    // Returning here ensures that you recieve at most 1 error message
    if (message !== '') {
        alert(message);
        return;
    }

    const regex = /^[\da-zA-Z!@#$%^&*()\-_=+\[\]{}:'\|`~<.>/?]*$/;
    const found = username.match(regex);
    if (found === null) {
        const alphabet = 'abcdefghijklmnopqrstuvwxyz'
        alert(`Username can only use characters from the following string; ${alphabet + alphabet.toUpperCase()+"0123456789"+'!@#$%^&*()-_=+[]{}:\'|`~<.>/?'}`)
        return;
    }

    // if you made it here, you're username is fine.
    let expire = new Date();
    expire.setHours(expire.getHours() + 1);
    // expire.setMinutes(expire.getMinutes() + 1);
    document.cookie = `username=${username}; expires=${expire.toUTCString()};`;
    console.log(`username=${username}; expires=${expire.toUTCString()};`);
    window.location.href = './shut_the_box.html';

}