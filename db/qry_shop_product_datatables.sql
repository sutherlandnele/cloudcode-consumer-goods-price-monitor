SELECT sp.id, p.name product, s.name shop, concat("K",format(sp.discount_price,2)) discount_price, concat("K",format(sp.current_price,2)) current_price, date_format(sp.price_date,"%d/%m/%Y") price_date,sp.description
FROM ictr_shop_product sp left outer join ictr_product p
on sp.product_id = p.id
left outer join ictr_shop s
on sp.shop_id = s.id
left outer join ictr_shop_product sp2
on sp2.product_id = sp.product_id and sp2.shop_id = sp.shop_id
where sp.price_date = (select max(price_date) from  ictr_shop_product sp2 where sp2.product_id = sp.product_id and sp2.shop_id = sp.shop_id)
