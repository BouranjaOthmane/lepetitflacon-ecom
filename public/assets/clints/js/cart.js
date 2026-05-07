/* ==========================================
   cart.js — Render cart table, update totals
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    renderCartPage();
});

function renderCartPage() {
    const cartBody = document.getElementById("cartBody");
    const cartEmpty = document.getElementById("cartEmpty");
    const cartLayout = document.getElementById("cartLayout");
    const summarySubtotal = document.getElementById("summarySubtotal");
    // const summaryTax = document.getElementById('summaryTax');
    const summaryTotal = document.getElementById("summaryTotal");

    if (!cartBody) return;

    const items = CartManager.items;

    if (items.length === 0) {
        if (cartEmpty) cartEmpty.style.display = "block";
        if (cartLayout) cartLayout.style.display = "none";
        return;
    }

    if (cartEmpty) cartEmpty.style.display = "none";
    if (cartLayout) cartLayout.style.display = "grid";

    cartBody.innerHTML = "";
    console.log(items, "items items");

    items.forEach((item) => {
        const tr = document.createElement("tr");

        tr.innerHTML = `
        <td>
          <div class="cart-product">
            <div class="cart-product__img"><img src="${item.img}" alt="${item.name}"></div>
            <div>
              <p class="cart-product__name">${item.name}</p>
              ${item.size ? `<p class="cart-product__size">Taille : ${item.size}</p>` : ""}
              <p class="cart-product__brand">Lepetitflacon</p>
            </div>
          </div>
        </td>
        <td class="cart-price">${item.price.toFixed(2)} DH</td>
        <td>
          <div class="qty-selector">
            <button onclick="updateCartQty('${item.id}', ${item.qty - 1})">−</button>
            <input type="number" value="${item.qty}" readonly>
            <button onclick="updateCartQty('${item.id}', ${item.qty + 1})">+</button>
          </div>
        </td>
        <td class="cart-total">${(item.price * item.qty).toFixed(2)} DH</td>
        <td><button class="cart-remove" onclick="removeCartItem('${item.id}')"><i class="fas fa-trash-alt"></i></button></td>
  `;

        cartBody.appendChild(tr);
    });

    // Update summary
    const subtotal = CartManager.getTotal();

    const shipping = subtotal >= 600 ? 0 : 35;
    const total = subtotal + shipping;

    if (summarySubtotal) {
        summarySubtotal.textContent = `${subtotal.toFixed(2)} DH`;
    }

    const summaryShipping = document.getElementById("summaryShipping");

    if (summaryShipping) {
        summaryShipping.textContent =
            shipping === 0
                ? "0 DH"
                : `${shipping.toFixed(2)} DH`;
    }

    if (summaryTotal) {
        summaryTotal.textContent = `${total.toFixed(2)} DH`;
    }
}

function updateCartQty(id, qty) {
    if (qty < 1) {
        removeCartItem(id);
        return;
    }
    CartManager.updateQty(id, qty);
    renderCartPage();
}

function removeCartItem(id) {
    CartManager.removeItem(id);
    renderCartPage();
    showToast("Le produit a été supprimé du panier");
}
