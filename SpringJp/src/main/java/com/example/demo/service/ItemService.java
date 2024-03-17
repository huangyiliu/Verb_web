package com.example.demo.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.domain.entity.Item;
import com.example.demo.domain.repository.ItemRepository;

@Service
public class ItemService {
    private final ItemRepository itemRepository;

    @Autowired
    public ItemService(ItemRepository itemRepository) {
        this.itemRepository = itemRepository;
    }

    public Item createItem(Item item_code) {
        return itemRepository.save(item_code);
    }

    public List<Item> getAllItems() {
        return itemRepository.findAll();
    }

    public Item getItemById(String item_code) {
        return itemRepository.findById(item_code).orElse(null);
    }

    public void deleteItemById(String item_code) {
    	itemRepository.deleteById(item_code);
    }
    
    
//    //Datacheck
//    private final Logger logger = LoggerFactory.getLogger(ItemService.class);
//
//    public void printItemData(Item item) {
//        logger.info("Printing item data: Item code = {}, Category code = {}, Item name = {}, Item price = {}", 
//            item.getItem_code(), item.getCategory_code(), item.getItem_name(), item.getItem_price());
//    }
}
