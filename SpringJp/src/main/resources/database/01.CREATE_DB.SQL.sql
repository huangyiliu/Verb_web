-====================
-- テーブル生成
--====================

-- 商品マスタ
CREATE TABLE IF NOT EXISTS item (
item_code VARCHAR(13) NOT NULL, -- 商品コード
category_code VARCHAR(6) NOT NULL, -- カテゴリコード
item_name VARCHAR(40) NOT NULL, -- 商品名
item_price INTEGER NOT NULL, -- 単価
PRIMARY KEY (item_code)
);