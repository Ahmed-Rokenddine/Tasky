

//Statistique count

var todo = document.getElementsByName("todo").length;
 document.getElementById("todo").innerHTML=todo;  

 var doing = document.getElementsByName("doing").length;
 document.getElementById("doing").innerHTML=doing;  
 
  var done = document.getElementsByName("done").length;
 document.getElementById("done").innerHTML=done; 

 var archive = document.getElementsByName("archive").length;
 document.getElementById("archive").innerHTML=archive;  
    
//search
const searchInput = document.querySelector("#search-input");
const cards = document.querySelectorAll(".card");

searchInput.addEventListener("input", (event) => {
    const searchText = event.target.value.toLowerCase();

    cards.forEach((card) => {
        const cardText = card.textContent.toLowerCase();
        if (cardText.indexOf(searchText) !== -1) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});



//Page refresh keep same scroll

document.addEventListener("DOMContentLoaded", function(event) { 
  var scrollpos = localStorage.getItem('scrollpos');
  if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
  localStorage.setItem('scrollpos', window.scrollY);
};

//responsive table
     
      function addRows() {
        var select = document.getElementById("taskss");
        var number = select.options[select.selectedIndex].value;
        var table = document.getElementById("table22");
        
        // Remove existing rows
        while (table.rows.length > 2) {
          table.deleteRow(2);
        }
        
        // Add new rows
        for (var i = 2; i <= number; i++) {
          var row = table.insertRow();
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          cell1.innerHTML = i;
          cell2.innerHTML = '<input type="text"  pattern="^[a-zA-Z0-9\s]+$" name="title[]" class="form-control form-control-lg text-center " required>';
          cell3.innerHTML = '<input type="text"  pattern="^[a-zA-Z0-9\s]+$" name="description[]" class="form-control form-control-lg " required>';
          cell4.innerHTML = '<input type="datetime-local" class="form-control form-control-lg text-center" name="time[]" required>';
          cell5.innerHTML = '<select   name="status[]" class="form-control form-control-lg text-center" ><option value="todo" selected>To Do</option><option value="doing">Doing</option><option value="done">Done</option><select>';
          
        }
      }
      //alert messages 
  let div = document.getElementById("alertt");
  div.style.transition = "opacity 6s";
  div.addEventListener("transitionend", function(event) {
    if (event.propertyName === "opacity" && parseFloat(event.srcElement.style.opacity) === 0) {
        div.style.display = "none";
    }
});
  setTimeout(() => {
      div.style.opacity = 0;
  }, 100) 
  






      
      
   
          
      
      