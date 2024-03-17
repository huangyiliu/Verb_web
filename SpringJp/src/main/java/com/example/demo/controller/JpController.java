package com.example.demo.controller;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.domain.entity.Item;
import com.example.demo.domain.entity.Jp_entity;
import com.example.demo.service.ItemService;
import com.example.demo.service.JpService;

@Controller
public class JpController {

	@Autowired
	private JpService jpService;

	@Autowired
	private ItemService itemService;

	@Autowired
	public JpController(JpService jpService, ItemService itemService) {
	    this.jpService = jpService;
	    this.itemService = itemService;
	}
	@GetMapping("/home")
    public String home(Model model) {
        List<Item> itemList = itemService.getAllItems();
        model.addAttribute("items", itemList);
        return "home";
    }

//	@GetMapping("/home/data")
//    public ResponseEntity<Map<String, Object>> homeData() {
//        List<Item> itemList = itemService.getAllItems();
//        
//        Map<String, String> properties = new LinkedHashMap<>();
//        properties.put("key1", "value1");
//        properties.put("key2", "value2");
//
//        Map<String, Object> responseData = new LinkedHashMap<>();
//        responseData.put("items", itemList);
//        responseData.put("properties", properties);
//
//        return ResponseEntity.ok().body(responseData);
//    }
	
	@PostMapping("/home/data")
	@ResponseBody
	public ResponseEntity<List<Map<String, Object>>> homeData() {
	    List<Map<String, Object>> itemList = new ArrayList<>();
	    
	    // 获取数据库中的所有项目数据
	    List<Item> items = itemService.getAllItems();
	    for (Item item : items) {
	        Map<String, Object> itemMap = new LinkedHashMap<>();
	        itemMap.put("ITEM_CODE", item.getItem_code());
	        itemMap.put("CATEGORY_CODE", item.getCategory_code());
	        itemMap.put("ITEM_NAME", item.getItem_name());
	        itemMap.put("ITEM_PRICE", item.getItem_price());
	        itemList.add(itemMap);
	    }
	    
	    return ResponseEntity.ok()
                .contentType(MediaType.APPLICATION_JSON)
                .body(itemList);
	}

	@PostMapping("/home")
	public String postTomasu(@RequestParam("word") String str, Model model) {
		List<Item> itemList = itemService.getAllItems();
		model.addAttribute("items", itemList);
		String v = jpService.Tomasu(str);
		String v1 = jpService.Tote(str);
		String v2 = jpService.Tota(str);
		String v3 = jpService.Tonai(str);
		Jp_entity result = new Jp_entity();
		Map<String, String> properties = new LinkedHashMap<>();
		properties.put("辭書變化", str);
		properties.put("ます變化", v);
		properties.put("て形變化", v1);
		properties.put("た形變化", v2);
		properties.put("ない變化", v3);
		result.setProperties(properties);
		result.setDictionaryForm(str);
		result.setMasuForm(v);
		result.setTeForm(v1);
		result.setTaForm(v2);
		result.setNaiForm(v3);
		model.addAttribute("result", result);
		// 傳送到動詞顯示頁面
		return "home";
	}


//	@GetMapping("/print-item-data")
//	public String printItemData() {
//	    // 從資料庫中獲取 Item 物件列表
//	    List<Item> itemList = itemService.getAllUsers();
//
//	    // 输出 itemList 的大小
//	    System.out.println("Number of items retrieved from the database: " + itemList.size());
//
//	    // 檢查列表是否為空
//	    if (!itemList.isEmpty()) {
//	        // 選擇列表中的第一個 Item 物件
//	        Item item = itemList.get(0);
//
//	        // 打印 Item 對象的信息
//	        System.out.println("Item Code: " + item.getItem_code());
//	        System.out.println("Category Code: " + item.getCategory_code());
//	        System.out.println("Item Name: " + item.getItem_name());
//	        System.out.println("Item Price: " + item.getItem_price());
//
//	        // 調用 ItemService 的 printItemData 方法
//	        itemService.printItemData(item);
//
//	    } else {
//	        System.out.println("No items retrieved from the database.");
//	    }
//
//	    // 返回視圖或重定向到其他頁面
//	    return "home";
//	}

}