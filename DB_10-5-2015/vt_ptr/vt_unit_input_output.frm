TYPE=VIEW
query=select sum(`b`.`input_mins`) AS `input_min`,sum(`b`.`output_mins`) AS `output_min`,`b`.`unit` AS `unit`,`b`.`date` AS `date` from `vt_ptr`.`tb_inp_output_mins` `b` group by `b`.`unit`,`b`.`date` order by `b`.`date`
md5=6a6cb3b2de06f23a570f665ff4b20cbf
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-09-15 04:44:44
create-version=1
source=SELECT sum(b.input_mins) as input_min,sum(b.output_mins) as output_min,b.unit,b.date FROM tb_inp_output_mins b  GROUP BY b.unit,b.date ORDER BY b.date ASC
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select sum(`b`.`input_mins`) AS `input_min`,sum(`b`.`output_mins`) AS `output_min`,`b`.`unit` AS `unit`,`b`.`date` AS `date` from `vt_ptr`.`tb_inp_output_mins` `b` group by `b`.`unit`,`b`.`date` order by `b`.`date`
