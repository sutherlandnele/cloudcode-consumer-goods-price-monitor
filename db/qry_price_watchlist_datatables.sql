SELECT sp.id, p.name product, pc.name category, pc.id category_id, s.name shop, c.name city, r.name region, r.id region_id, concat("K",format(sp.current_price,2)) current_price, concat("K",format(sp.discount_price,2)) discount_price, date_format(sp.price_date,"%d/%m/%Y") price_date
FROM ictr_shop_product sp left outer join ictr_product p
on sp.product_id = p.id
left outer join ictr_shop s
on sp.shop_id = s.id
left outer join ictr_product_category pc
on p.product_category_id = pc.id
left outer join ictr_city c
on s.city_id = c.id
left outer join ictr_region r
on c.region_id = r.id
