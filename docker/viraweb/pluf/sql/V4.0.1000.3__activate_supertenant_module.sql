SELECT `id` FROM `tenants` WHERE `subdomain`='www' INTO @main_tenant_id;

INSERT INTO `tenant_configurations` (`key`, `value`, `description`, `creation_dtime`, `modif_dtime`, `tenant`) 
VALUES 
('module.SuperTenant.enable', 1, '', NOW(), NOW(), @main_tenant_id)
ON DUPLICATE KEY UPDATE 
`value`=1, `modif_dtime`=NOW();
