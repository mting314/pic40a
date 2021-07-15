/**
This function extracts from a given cookie
the 'value' corresponding to the 'name' "username".
For example, both of the following function calls return "mjandr":
. extract_username("first_name=Michael; last_name=Andrews; username=mjandr");
. extract_username("username=mjandr; first_name=Michael; last_name=Andrews");
If the given cookie has no 'name' called "username",
then the function returns the empty string.
For example, we have
. extract_username("common_error=Micheal; " +
"another_one=Andrew; another=Andrew_Michaels") === ""
@param {string} cookie : the cookie to extract information from
@return {string} the 'value' corresponding to the 'name' "username"
the empty string if "username" is not a 'name'
*/
function extract_username(cookie) {
    let parts = cookie.split("username=");
    if (parts.length === 2) {
        return parts[1].split(';')[0];
    } else {
        return "";
    }
}

/**
Returns the result of rolling two dice.
Here are some possible return values.
. '1 + 2 = 3'
. '6 + 4 = 10'
. '3 + 5 = 8'
. '2 + 2 = 4'
The probability distribution of the return values
is the same as rolling two dice in real life.
@return {string} the result of rolling two dice
*/
function roll_dice() {
    let first = Math.floor(Math.random() * 6) + 1;
    let second = Math.floor(Math.random() * 6) + 1;

    return `${first} + ${second} = ${first+second}`
}

/**
For a specified array of booleans,
the function returns the sum of the indices for which
the corresponding value in the array is true.
For example,
sum_checked_indices([false, true, false, true, true]) === 1 + 3 + 4 === 8.
@param {Array} arr : an array consisting of booleans
(whenever 0 <= i < arr.length, arr[i] !== undefined)
@return {number} the sum of the indices i for which arr[i] === true
*/
function sum_checked_indices(test) {
    let sum = 0;
    for (let i = 0; i < test.length; i++) {
        if (test[i] === true)
            sum += i;
    }
    return sum;
}