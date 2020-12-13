TYPE=VIEW
query=select avg(`vt_ptr`.`tb_hour_production`.`target`) AS `target`,sum(`vt_ptr`.`tb_hour_production`.`actual`) AS `actual`,`vt_ptr`.`tb_hour_production`.`line` AS `line`,`vt_ptr`.`tb_hour_production`.`floor` AS `floor`,`vt_ptr`.`tb_hour_production`.`unit` AS `unit`,`vt_ptr`.`tb_hour_production`.`buyer` AS `buyer`,`vt_ptr`.`tb_hour_production`.`style` AS `style`,`vt_ptr`.`tb_hour_production`.`color` AS `color`,`vt_ptr`.`tb_hour_production`.`category` AS `category`,`vt_ptr`.`tb_hour_production`.`item` AS `item`,`vt_ptr`.`tb_hour_production`.`date` AS `date`,`vt_ptr`.`tb_hour_production`.`hour` AS `hour` from `vt_ptr`.`tb_hour_production` where (`vt_ptr`.`tb_hour_production`.`target` <> 0) group by `vt_ptr`.`tb_hour_production`.`date`,`vt_ptr`.`tb_hour_production`.`line`,`vt_ptr`.`tb_hour_production`.`hour` order by `vt_ptr`.`tb_hour_production`.`line`
md5=5fcf8c5b8ce305e88932b02892f755f4
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-08-24 05:53:15
create-version=1
source=SELECT AVG( `target` ) AS \'target\',sum(actual) as actual, line,floor,unit,buyer,style,color,category,item, `date` , `hour` \nFROM `tb_hour_production` WHERE target != 0 GROUP BY `date` , `line` , `hour` \nORDER BY `tb_hour_production`.`line` ASC
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select avg(`vt_ptr`.`tb_hour_production`.`target`) AS `target`,sum(`vt_ptr`.`tb_hour_production`.`actual`) AS `actual`,`vt_ptr`.`tb_hour_production`.`line` AS `line`,`vt_ptr`.`tb_hour_production`.`floor` AS `floor`,`vt_ptr`.`tb_hour_production`.`unit` AS `unit`,`vt_ptr`.`tb_hour_production`.`buyer` AS `buyer`,`vt_ptr`.`tb_hour_production`.`style` AS `style`,`vt_ptr`.`tb_hour_production`.`color` AS `color`,`vt_ptr`.`tb_hour_production`.`category` AS `category`,`vt_ptr`.`tb_hour_production`.`item` AS `item`,`vt_ptr`.`tb_hour_production`.`date` AS `date`,`vt_ptr`.`tb_hour_production`.`hour` AS `hour` from `vt_ptr`.`tb_hour_production` where (`vt_ptr`.`tb_hour_production`.`target` <> 0) group by `vt_ptr`.`tb_hour_production`.`date`,`vt_ptr`.`tb_hour_production`.`line`,`vt_ptr`.`tb_hour_production`.`hour` order by `vt_ptr`.`tb_hour_production`.`line`
