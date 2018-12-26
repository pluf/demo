SELECT `id` FROM `tenants` WHERE `subdomain`='www' INTO @main_tenant_id;

SELECT `id` FROM `monitor_tags` WHERE `name`='message' AND `tenant`=@main_tenant_id INTO @message_monitor_id;
SELECT `id` FROM `monitor_tags` WHERE `name`='tenant' AND `tenant`=@main_tenant_id INTO @tenant_monitor_id;
SELECT `id` FROM `monitor_tags` WHERE `name`='user' AND `tenant`=@main_tenant_id INTO @user_monitor_id;
SELECT `id` FROM `monitor_tags` WHERE `name`='receipt' AND `tenant`=@main_tenant_id INTO @receipt_monitor_id;

SELECT `id` FROM `monitor_metrics` WHERE `name`='message.count' AND `tenant`=@main_tenant_id INTO @message_count_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='owner' AND `tenant`=@main_tenant_id INTO @owner_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='paid_amount' AND `tenant`=@main_tenant_id INTO @paid_amount_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='tenant.storage' AND `tenant`=@main_tenant_id INTO @tenant_storage_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='tenant.requests' AND `tenant`=@main_tenant_id INTO @tenant_requests_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='tenant.bandwidth' AND `tenant`=@main_tenant_id INTO @tenant_bandwidth_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='tenant.send_bandwidth' AND `tenant`=@main_tenant_id INTO @tenant_send_bandwidth_metric_id;
SELECT `id` FROM `monitor_metrics` WHERE `name`='tenant.receive_bandwidth' AND `tenant`=@main_tenant_id INTO @tenant_receive_bandwidth_metric_id;

SELECT `id` FROM `user_accounts` WHERE `login`='admin' AND `tenant`=@main_tenant_id INTO @admin_id;
SELECT `id` FROM `user_roles` WHERE `application`='tenant' AND `code_name`='owner' AND `tenant`=@main_tenant_id INTO @owner_role_id;
SELECT `id` FROM `user_roles` WHERE `application`='user' AND `code_name`='manager' AND `tenant`=@main_tenant_id INTO @user_manager_role_id;




INSERT INTO `monitor_metric_monitor_tag_assoc` (`monitor_tag_id`, `monitor_metric_id`)
VALUES 
(@message_monitor_id, @message_count_metric_id),
(@user_monitor_id, @owner_metric_id),
(@tenant_monitor_id, @tenant_storage_metric_id),
(@tenant_monitor_id, @tenant_requests_metric_id),
(@tenant_monitor_id, @tenant_bandwidth_metric_id),
(@tenant_monitor_id, @tenant_send_bandwidth_metric_id),
(@tenant_monitor_id, @tenant_receive_bandwidth_metric_id),
(@receipt_monitor_id, @paid_amount_metric_id);

INSERT INTO `tenant_configurations` (`key`, `value`, `description`, `creation_dtime`, `modif_dtime`, `tenant`) 
VALUES 
('module.SuperTenant.enable', 1, '', NOW(), NOW(), @main_tenant_id)
ON DUPLICATE KEY UPDATE 
`value`=1, `modif_dtime`=NOW();

INSERT INTO `user_account_user_role_assoc` (`user_account_id`, `user_role_id`) 
VALUES 
(@admin_id, @owner_role_id),
(@admin_id, @user_manager_role_id);
