SELECT s.id, s.name, c.name city, r.name region, s.location_latitude latitude, s.location_longtitude longtitude
FROM iccc.ictr_shop s left outer join ictr_city c
on s.city_id = c.id
left outer join ictr_region r
on c.region_id = r.id
