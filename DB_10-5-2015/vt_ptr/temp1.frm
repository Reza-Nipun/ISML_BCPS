TYPE=VIEW
query=select `a`.`srl` AS `srl`,`b`.`style` AS `style`,`c`.`buyer` AS `buyer`,`c`.`item` AS `item`,`c`.`category` AS `category` from `vt_ptr`.`temp` `a` join `vt_ptr`.`tb_ie_target_assign` `b` join `vt_ptr`.`tb_style_sap` `c` where ((`b`.`sl` = `a`.`srl`) and (`c`.`style` = `b`.`style`)) group by `b`.`sl`
md5=397c30925d053153d6c891b496b9690e
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-06-18 05:58:38
create-version=1
source=SELECT a.srl, b.style, c.buyer, c.item, c.category\nFROM temp a,  `tb_ie_target_assign` b, tb_style_sap c\nWHERE b.sl = a.srl\nAND c.style = b.style\nGROUP BY b.sl
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `a`.`srl` AS `srl`,`b`.`style` AS `style`,`c`.`buyer` AS `buyer`,`c`.`item` AS `item`,`c`.`category` AS `category` from `vt_ptr`.`temp` `a` join `vt_ptr`.`tb_ie_target_assign` `b` join `vt_ptr`.`tb_style_sap` `c` where ((`b`.`sl` = `a`.`srl`) and (`c`.`style` = `b`.`style`)) group by `b`.`sl`
