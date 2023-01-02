
// Go to Add page 

document.getElementById('addBtn').onclick = function () {
    location.href = 'product-add.php'
}

// Dissapearing boxes


// function removeCheckedCheckboxes() {
    
//     let boxes = document.querySelectorAll('.div-box');

//     boxes.forEach((box) => {
//         const checkBox = box.querySelector('.delete-checkbox');
//         if (checkBox.checked == true) {
//             box.style.display = 'none';
//         }
//     })
// }



function selectChanged() {
    var sel = document.getElementById("productType");
    let dvd = document.getElementById("dvd");
    let book = document.getElementById("book");
    let furniture = document.getElementById("furniture");
    for (var i = 1; i < 4; i++) {
      dvd.style.display = sel.value == "dvd" ? "block" : "none";
      book.style.display = sel.value == "book" ? "block" : "none";
      furniture.style.display = sel.value == "furniture" ? "block" : "none";
    }
  }

  const cells = document.querySelectorAll('table tbody .content');

cells.forEach(cell => {
  cell.addEventListener('click', event => {
    const checkbox = cell.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;
  });
});
  
function checkSelected() {
  var checkbox = document.querySelectorAll('input[type=checkbox]:checked');
  if (checkbox.length == 0) {
    alert('Please select one or more items');
    return false;
  } else {
    document.getElementById('delete_form').submit();
  }
}