console.log('First, you should see "mjandr" printed twice followed by the empty string...');

console.log(extract_username("first_name=Michael; last_name=Andrews; username=mjandr"));
console.log(extract_username("username=mjandr; first_name=Michael; last_name=Andrews"));

console.log(extract_username("common_error=Micheal; " +
                             "another_one=Andrew; another=Andrew_Michaels"));




console.log('Second, you should the result of rolling two dice 12 times...');

for (let i = 0; i < 12; ++i) {
  console.log(roll_dice());
}




console.log('\nFinally, you should see the integer 8...');
console.log(sum_checked_indices([false, true, false, true, true]));
