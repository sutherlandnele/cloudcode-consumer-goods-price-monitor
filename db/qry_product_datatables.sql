SELECT p.id, p.name, s.name shop, pc.name category, concat("K",format(p.discount_price,2)) discount_price, concat("K",format(p.current_price,2)) current_price, date_format(p.price_date,"%d/%m/%Y") price_date
FROM iccc.ictr_product p left outer join ictr_shop s
on p.shop_id = s.id
left outer join ictr_product_category pc
on p.product_category_id = pc.id
