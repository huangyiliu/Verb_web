package com.example.demo.domain.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.Data;

@Data
@Entity
public class Item {
	@Id
	private String item_code;
	private String category_code;
	private String img_code;
	private String item_name;
	private Integer item_price;
	
}