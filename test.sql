select * from userdata a join order_qa b on a.user_id=b.user_id where order_id="12"; 
use tool;
select * from userdata where user_id=1;
use tool;
select * from userdata a join orderdata b on a.user_id=b.order_lendid where user_id=1; 
select * from orderdata;
SELECT * FROM `tool`.`orderdata` LIMIT 1000;
SELECT * FROM `tool`.`order_qa` LIMIT 1000;
SELECT * FROM `tool`.`news` LIMIT 1000;
SELECT * FROM `tool`.`userdata` LIMIT 1000;

SELECT * FROM `tool`.`orderdata` WHERE order_title LIKE '%木工%';