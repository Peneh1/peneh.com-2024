
/*cant save*/
document.addEventListener("keydown", function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
    e.preventDefault();
    alert('This is only a preview and can not be saved');
  }
}, false);
	
	/*cant print*/
	document.addEventListener("keydown", function(e) {
  if (e.keyCode == 80 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
    e.preventDefault();
    alert('This is only a preview and can not be print');
  }
}, false);
/*cant right click*/
if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("This is only a preview and can not be saved"); //here you draw your own menu
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("This is only a preview and can not be saved");
    window.event.returnValue = false;
  });
}




