/**
 * 
 */

$(document).ready(function() {
	$('#postDataBtn').click(function() {
		$.ajax({
			url: '/home/data',
			type: 'POST',
			contentType: 'application/json',
			success: function(responseData) {
				// 處理成功響應
				console.log(responseData);

				// 遍歷返回的數據，並顯示在網頁上
				let itemListElement = document.getElementById('itemList');
				itemListElement.innerHTML = ''; // 清空原有的內容

				responseData.forEach(function(item) {
					let li = document.createElement('li');
					li.textContent =
						item.ITEM_CODE + ' - ' +  // 根據返回的JSON鍵名修改
						item.CATEGORY_CODE + ' - ' + // 根據返回的JSON鍵名修改
						item.ITEM_NAME + ' - ' + // 根據返回的JSON鍵名修改
						item.ITEM_PRICE; // 根據返回的JSON鍵名修改
					// 假設每個項目包含名稱和價格屬性
					itemListElement.appendChild(li);
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// 處理錯誤響應
				console.error('Error: ' + textStatus);
			}
		});
	});
});
