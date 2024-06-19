SELECT  concat('''',s.name,'<br>\<a href="''+ g_base_url + ''Shop/view/',s.id,'" target="_blank">View Shop</a>','''') shop, s.location_latitude lattitude, s.location_longtitude longtitude
FROM ictr_shop_product sp 
left outer join ictr_shop s
on sp.shop_id = s.id
where sp.product_id = 26