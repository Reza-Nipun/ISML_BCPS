TYPE=VIEW
query=select sum(`vt_ptr`.`tb_hour_production`.`target`) AS `target`,sum(`vt_ptr`.`tb_hour_production`.`actual`) AS `actual`,`vt_ptr`.`tb_hour_production`.`unit` AS `unit`,`vt_ptr`.`tb_hour_production`.`date` AS `date` from `vt_ptr`.`tb_hour_production` where (`vt_ptr`.`tb_hour_production`.`target` <> 0) group by `vt_ptr`.`tb_hour_production`.`date`,`vt_ptr`.`tb_hour_production`.`unit` order by `vt_ptr`.`tb_hour_production`.`unit`
md5=05173c44f823096ff00186f6050e06c8
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-08-27 03:19:34
create-version=1
source=SELECT sum( `target` ) AS \'target\', sum(actual) as actual,unit,`date`\nFROM `tb_hour_production` WHERE target != 0 GROUP BY `date`, unit\nORDER BY unit ASC
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select sum(`vt_ptr`.`tb_hour_production`.`target`) AS `target`,sum(`vt_ptr`.`tb_hour_production`.`actual`) AS `actual`,`vt_ptr`.`tb_hour_production`.`unit` AS `unit`,`vt_ptr`.`tb_hour_production`.`date` AS `date` from `vt_ptr`.`tb_hour_production` where (`vt_ptr`.`tb_hour_production`.`target` <> 0) group by `vt_ptr`.`tb_hour_production`.`date`,`vt_ptr`.`tb_hour_production`.`unit` order by `vt_ptr`.`tb_hour_production`.`unit`
