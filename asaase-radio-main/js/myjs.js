//Hide message
function hideMsg(){
  var msg = document.getElementById('msg');
  if (msg.style.right === '-100%') {
    msg.style.right = '2%';
  }else {
    msg.style.right = '-100%';
  }
}
