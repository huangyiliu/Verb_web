package com.example.demo.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.domain.entity.Item;

public interface ItemRepository extends JpaRepository<Item, String> {
    // 可以在這裡添加額外的查詢方法，Spring Data JPA 將自動生成實現
}
