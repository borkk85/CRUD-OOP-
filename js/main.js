
// Go to Add page 

document.getElementById('addBtn').onclick = function () {
    location.href = 'product-add.php'
}

document.getElementById('cancelBtn').onclick = function () {
    location.href = 'index.php'
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

  