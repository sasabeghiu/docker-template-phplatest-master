function addItem() {
  const textarea = document.getElementById("todoText");

  // write your solution here
  const colDiv = document.createElement("div");
  colDiv.className = "col-md-6 col-xxl-4";

  const cardDiv = document.createElement("div");
  cardDiv.className = "card";

  const bodyDiv = document.createElement("div");
  bodyDiv.className = "card-body";

  const buttonDelete = document.createElement("button");
  buttonDelete.className = "btn btn-secondary";
  buttonDelete.innerHTML = "Delete";
  buttonDelete.style.width = "72px";
  buttonDelete.style.height = "38px";
  buttonDelete.addEventListener("click", () => {
    itemList.removeChild(colDiv);
  });

  var itemList = document.getElementById("itemList");
  itemList.appendChild(colDiv);

  var card = document.getElementById("card");
  colDiv.appendChild(cardDiv);

  var body = document.getElementById("card-body");
  cardDiv.appendChild(bodyDiv);

  const p = document.createElement("p");
  bodyDiv.appendChild(p);
  bodyDiv.appendChild(buttonDelete);

  const text = document.createTextNode(textarea.value);
  p.appendChild(text);

  const current = document.getElementById("card-body");

  textarea.value = "";
}

function deleteItem() {
  document.removeChild(card);
}
