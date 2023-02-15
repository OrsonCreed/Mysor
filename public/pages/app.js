// SELECT ELEMENTS
const productsEl = document.querySelector("#products");
const cartItemsEl = document.querySelector("#cart-items");


function renderProducts(){
    products.forEach((product)=>{
        productsEl.innerHTML += `
        <tr><td>-</td><td>${product.name}</td><td>${product.description}</td><td>${product.price}</td><td><button class="plus" onclick = "addToCart(${product.id})">+</button></td></tr>
        `
    })
}

renderProducts();


// ADD TO CART
function addToCart(id) {
     // check if prodcut already exist in cart
     if (cart.some((item) => item.id === id)) {
        //changeNumberOfUnits("plus", id);
        alert("product arleady exists");
      } else {
          const item = products.find((product) => product.id === id);
          cart.push({
              ...item,
              numberOfUnits : 1,
          });
          updateCart();
      }
    
}


// update cart
function updateCart() {
    renderCartItems();
    renderSubtotal();
    // save cart to local storage
    //localStorage.setItem("CART", JSON.stringify(cart));
  }


  //rendering cart items
  function renderCartItems() {
    cartItemsEl.innerHTML = `
    <tr>
                            <td colspan="4" class="title">Cart</td>
                        </tr>
                        <tr><td>Pr. name</td><td>items</td><td>Amount</td><td>Actions</td></tr>
    `
    ; // clear cart element
    cart.forEach((item) => {
      cartItemsEl.innerHTML += `
      <tr><td>${item.name}</td><td>${item.numberOfUnits}</td><td>${item.price * item.numberOfUnits}</td><td class="act_btns"><button class="plus" onclick = "changeNumberOfUnits('plus',${item.id})">+</button><button class="plus" onclick = " changeNumberOfUnits('minus',${item.id})">-</button></td><button class="plus" onclick = "changeNumberOfUnits('delete',${item.id})">x</button></tr>
        `;
    });
  }


// calculate and render subtotal
function renderSubtotal() {
    let totalPrice = 0,
      totalItems = 0;
  
    cart.forEach((item) => {
      totalPrice += item.price * item.numberOfUnits;
      totalItems += item.numberOfUnits;
    });

    const subtotalEl = document.createElement('span');
    const totalItemsInCartEl = document.createElement('span');
    subtotalEl.setAttribute('id','o_total');
    row = document.createElement('tr');
    col= document.createElement('td');
    col.setAttribute('colspan','4');
    col.setAttribute('class','title');
    row.append(col);
    cartItemsEl.append(row);
    col.innerHTML = `Subtotal (${totalItems} items):${totalPrice.toFixed(0)} RWF`;
    totalItemsInCartEl.innerHTML = totalItems;
  }



// change number of units for an item
function changeNumberOfUnits(action, id) {
  if (action === "delete") {
    cart = cart.filter((item) => item.id !== id);
    updateCart();
    return true;
  }

  cart = cart.map((item) => {
    let numberOfUnits = item.numberOfUnits;
    if (item.id === id) {
      if (action === "minus" && numberOfUnits > 1) {
        numberOfUnits--;
      } else if (action === "plus" && numberOfUnits < item.instock) {
        numberOfUnits++;
      }
    }

    return {
      ...item,
      numberOfUnits,
    };
  });

  updateCart();
}


  let cart = [];
