
/*

Toggles

*/


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