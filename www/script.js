$(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });

$(document).ready(function() {
  $("#priorityCheck").change(function() {
    if($(this).is(":checked")) {
        window.location.href = '?p=1';
    }
    else {
        window.location.href = window.location.href.split('?')[0];
    }
  })
});