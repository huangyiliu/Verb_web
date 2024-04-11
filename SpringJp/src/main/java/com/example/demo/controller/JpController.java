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
public class JpController extends AbstractController {

	@Autowired
	private JpService jpService;

	@Autowired
	private ItemService itemService;

	public JpController(JpService jpService, ItemService itemService) {
		this.jpService = jpService;
		this.itemService = itemService;
	}

	//後端資料傳送至前端 itemList
	@GetMapping("/home")
	public String home(Model model, String template, String fragment) {
		List<Item> itemList = itemService.getAllItems();
		model.addAttribute("items", itemList);
//		return "home";
		return forwardBusinessLayout(model, "fragments/home", "home_contents");
	}

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

//將資料庫資料輸出在控制台
//	    for (Map<String, Object> item : itemList) {
//	        System.out.println(item);
//	    }

		return ResponseEntity.ok().contentType(MediaType.APPLICATION_JSON).body(itemList);
	}

	/**
	 * 動詞變化處理
	 * @param word,str,model
	 * @return home
	 */
	@PostMapping("/show_verb")
	public String postTomasu(@RequestParam("word") String str, Model model) {

		// 動詞變化回傳
		String v = jpService.Tomasu(str);
		String v1 = jpService.Tote(str);
		String v2 = jpService.Tota(str);
		String v3 = jpService.Tonai(str);
		Map<String, String> properties = new LinkedHashMap<>();
		properties.put("辭書變化", str);
		properties.put("ます變化", v);
		properties.put("て形變化", v1);
		properties.put("た形變化", v2);
		properties.put("ない變化", v3);

		// 動詞變化
		Jp_entity result = new Jp_entity();
		result.setProperties(properties);
		model.addAttribute("result", result);
		// 傳送到動詞顯示頁面
		return forwardBusinessLayout(model, "show_verb", "show_verb_contents");
		
	}

	
	
	@GetMapping("/cart")
	public String cart(Model model, String template, String fragment) {
		return forwardBusinessLayout(model, "cart", "cart_contents");
	}
	
	@GetMapping("/show_verb")
	public String show_verb(Model model, String template, String fragment) {
		return forwardBusinessLayout(model, "show_verb", "show_verb_contents");
	}
	
	@GetMapping("/cart_list")
	public String cart_list(Model model, String template, String fragment) {
		List<Item> itemList = itemService.getAllItems();
		model.addAttribute("items", itemList);
		return forwardBusinessLayout(model, "cart_list", "cart_list_contents");
	}
	
	@GetMapping("/ajax_db")
	public String ajax(Model model, String template, String fragment) {
		List<Item> itemList = itemService.getAllItems();
		model.addAttribute("items", itemList);
		return forwardBusinessLayout(model, "ajax_db", "ajax_contents");
	}
}