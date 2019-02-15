
/*

Toggles

*/
function edit_profile() {
  //$('#Button').attr('disabled','disabled');
  //removing the disabled value for editing the info
  $('#first_name').removeAttr('disabled');
  $('#last_name').removeAttr('disabled');
  $('#email').removeAttr('disabled');
  $('#phone').removeAttr('disabled');
  $('#birthday_date').removeAttr('disabled');
  $('#password').removeAttr('disabled');
  $('#password-confirm').removeAttr('disabled');

  // removing the disabled button
  $('#save_info_button').removeAttr('disabled');

}

$(document).ready(() => {
    $('#get_reviews').click(()=> {
      $('#personal').fadeToggle('fast');
      $('#comments_all').fadeToggle('fast');
    });
})

$(document).ready(() => {
  $('#user_actions').click(()=> {
    $('#display_actions').fadeToggle('fast');
    $('#actions_for_user').fadeToggle('slow');
  });
})