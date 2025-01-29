///load function
function loadPage (url) {
    fetch(url)
       // RETURN THE RESULT AS TEXT
    .then((result) => {
      if (result.status != 200) { throw new Error("Bad Server Response"); }
      return result.text();
    })
       //PUT LOADED CONTENT INTO <DIV>
    .then((content) => {
      document.querySelector("body").innerHTML = content;
    })
       //HANDLE ERRORS - OPTIONAL
    .catch((error) => { console.log(error); });
      }
  
//end function
