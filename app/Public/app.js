function addItem() {
  const textarea = document.getElementById("todoText");
  
  const colDiv = document.createElement("div");
  colDiv.className = "col-md-6 col-xxl-4";

  const cardDiv = document.createElement("div");
  cardDiv.className = "card";

  const bodyDiv = document.createElement("div");
  bodyDiv.className = "card-body";

  const buttonDelete = document.createElement("button");
  buttonDelete.className = "btn btn-danger";
  buttonDelete.innerHTML = "Delete";
  buttonDelete.style.width = "72px";
  buttonDelete.style.height = "38px";
  buttonDelete.addEventListener("click", () => {
    itemList.removeChild(colDiv);
  });

  var itemList = document.getElementById("itemList");
  itemList.appendChild(colDiv);
  colDiv.appendChild(cardDiv);
  cardDiv.appendChild(bodyDiv);

  const p = document.createElement("p");
  bodyDiv.appendChild(p);
  bodyDiv.appendChild(buttonDelete);

  const text = document.createTextNode(textarea.value);
  p.appendChild(text);

  textarea.value = "";
}

function deleteItem() {
  document.removeChild(card);
}
