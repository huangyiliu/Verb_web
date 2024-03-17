package com.example.demo.domain.entity;

import java.util.Map;

import lombok.Data;

@Data
public class Jp_entity {
	private Map<String, String> properties;
	private String dictionaryForm;
	private String masuForm;
	private String teForm;
	private String taForm;
	private String naiForm;
}
