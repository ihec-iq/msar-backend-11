drop view item_store_views;
create  view item_store_views as
        select
        `input_voucher_items`.`id` as `id`,
        `items`.`name` as `itemName`,
        `items`.`id` as `itemId`,
        `items`.`code` as `code`,
        `items`.`description`as `itemDescription`,
        `input_voucher_items`.`description` as `description`,
        `input_voucher_items`.`notes` as `notes`,
        `input_voucher_items`.`price` as `price`,
        `item_categories`.`id` as `itemCategoryId`,
        `item_categories`.`name` as `itemCategoryName`,
        `stocks`.`id` as `stockId`,
        `stocks`.`name` as `stockName`,
        IFNULL(SUM(input_voucher_items.count),0) as inValue,
        IFNULL(SUM(output_voucher_items.count),0) as outValue
        from `input_voucher_items`
        inner join `items` on `input_voucher_items`.`item_id` = `items`.`id`
        inner join `item_categories` on `items`.`item_category_id` = `item_categories`.`id`
        inner join `stocks` on `input_voucher_items`.`stock_id` = `stocks`.`id`
        left join `output_voucher_items` on `input_voucher_items`.`id` =`output_voucher_items`.`input_voucher_item_id`
        group by
        `input_voucher_items`.`id`,
        `items`.`name`,`items`.`id`,
        `items`.`code`,
        `items`.`description`,
        `input_voucher_items`.`description`,
        `input_voucher_items`.`notes`,
        `input_voucher_items`.`price`,
        `item_categories`.`id`,
        `item_categories`.`name`,
        `stocks`.`id`,
        `stocks`.`name`;
