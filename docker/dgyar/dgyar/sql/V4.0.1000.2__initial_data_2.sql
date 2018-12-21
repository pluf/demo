
INSERT INTO `monitor_metric_monitor_tag_assoc` (`monitor_tag_id`, `monitor_metric_id`)
VALUES 
(1,1),(2,2),(2,5),(2,6),(2,7),(2,8),(3,3),(4,4);

INSERT INTO `tenant_configurations` (`id`, `key`, `value`, `description`, `creation_dtime`, `modif_dtime`, `tenant`) 
VALUES 
(1,'module.SuperTenant.enable','','','2018-11-24 13:35:43','2018-11-24 13:35:43',1);

INSERT INTO `user_account_user_role_assoc` (`user_account_id`, `user_role_id`) 
VALUES 
(1,1);
