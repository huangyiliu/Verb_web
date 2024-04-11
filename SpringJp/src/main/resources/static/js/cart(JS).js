/**
 * 購物車
 * 放在</body>上方
 */
 function addToCart(price,product) {
    product.num++;
    cart.productNum++;
    cart.totalPrice += price;
    showCart();
}
let cart = {
		productNum: 0,
		product1: {
			num: 0,
			name: "大家的日本語 初級I",
			price: 800
		},
		product2: {
			num: 0,
			name: "大家的日本語 初級II",
			price: 2400
		},
		product3: {
			num: 0,
			name: "【DVD】大家的日本語 初級I",
			price: 4800
		},
		product4: {
			num: 0,
			name: "【DVD】大家的日本語 初級II",
			price: 5800
		},
		totalPrice: 0,
		showCart: function() {
		console.log(`目前商品數 : ${cart.productNum}`);
		console.log(`${cart.product1.name} : ${cart.product1.num}`);
		console.log(`${cart.product2.name} : ${cart.product2.num}`);
		console.log(`${cart.product3.name} : ${cart.product3.num}`);
		console.log(`${cart.product4.name} : ${cart.product4.num}`);
		console.log(`目前購物車總額 : ${cart.totalPrice}`);
		}
	};
	 function showCart() {
		console.log(`目前商品數 : ${cart.productNum}`);
		console.log(`${cart.product1.name} : ${cart.product1.num}`);
		console.log(`${cart.product2.name} : ${cart.product2.num}`);
		console.log(`${cart.product3.name} : ${cart.product3.num}`);
		console.log(`${cart.product4.name} : ${cart.product4.num}`);
		console.log(`目前購物車總額 : ${cart.totalPrice}`);
	}
	function clearCart() {
		cart.productNum = 0;
		cart.product1.num = 0;
		cart.product2.num = 0;
		cart.product3.num = 0;
		cart.product4.num = 0;
		cart.totalPrice = 0;
		console.log('已清空購物車');
		cart.showCart();
	}
	
/**
 * 購物車數字輸出到前端
 
	// 获取对应的元素
const product1NumElement = document.getElementById('productNum');

// 在页面加载时显示购物车内容
window.onload = function() {
    // 初始显示产品数量
    showProductNum();
};

// 產品數量與總額
function showProductNum() {
    product1NumElement.textContent = 
    `大家的日本語 初級I :  ${cart.product1.num}`+
    `大家的日本語 初級II:  ${cart.product2.num}`+
    `【DVD】大家的日本語 初級I  :  ${cart.product3.num}`+
    `【DVD】大家的日本語 初級II :  ${cart.product4.num}`;
};

// 初始化产品数量
let product1Num = 0;

// 更新产品1的数量
function updateProduct1Num() {
    product1Num++; // 点击一次，数量加一
    product1NumElement.textContent = product1Num; // 更新页面上的显示
}
*/	