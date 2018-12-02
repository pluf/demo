
INSERT INTO `monitor_metrics` (`id`, `name`, `description`, `value`, `unit`, `function`, `interval`, `cacheable`, `modif_dtime`, `tenant`) 
VALUES 
(1,'message.count','Number of messages from the server.',0.00000000,'','Message_Monitor::count',0,0,'2018-11-24 13:35:37',1),
(2,'tenant.storage','Storage size of the tenant.',0.00000000,'','Tenant_Monitor::storage',86400,1,'2018-11-24 13:35:37',1),
(3,'owner','User ownership monitor',0.00000000,'','Tenant_Monitor::permission',0,0,'2018-11-24 13:35:37',1),
(4,'paid_amount','Total amount of paid receipts.',0.00000000,'','Bank_Monitor::paidAmount',0,0,'2018-11-24 13:35:38',1),
(5,'tenant.requests','Number of received requests to current tenant',0.00000000,'','RestLog_Monitor::requestCount',3600,1,'2018-11-24 13:35:39',1),
(6,'tenant.bandwidth','Bandwidth usage of requests/responses of current tenant',0.00000000,'','RestLog_Monitor::bandwidth',3600,1,'2018-11-24 13:35:39',1),
(7,'tenant.send_bandwidth','Bandwidth usage of responses of current tenant',0.00000000,'','RestLog_Monitor::sentBandwidth',3600,1,'2018-11-24 13:35:39',1),
(8,'tenant.receive_bandwidth','Bandwidth usage of requests of current tenant',0.00000000,'','RestLog_Monitor::receivedBandwidth',3600,1,'2018-11-24 13:35:39',1),
(9,'shop.order.count','Number of orders.',0.00000000,'','Shop_Monitor_Order::count',0,0,'2018-11-24 13:35:40',1),
(10,'shop.order.amount','Total amount of orders.',0.00000000,'','Shop_Monitor_Order::amount',0,0,'2018-11-24 13:35:40',1),
(11,'shop.order.item.count','Total number of order items.',0.00000000,'','Shop_Monitor_OrderItem::count',0,0,'2018-11-24 13:35:41',1),
(12,'shop.service.count','Total number of services.',0.00000000,'','Shop_Monitor_OrderItem::serviceCount',0,0,'2018-11-24 13:35:41',1),
(13,'shop.product.count','Total number of products.',0.00000000,'','Shop_Monitor_OrderItem::productCount',0,0,'2018-11-24 13:35:41',1);



INSERT INTO `monitor_tags` (`id`, `name`, `description`, `creation_dtime`, `modif_dtime`, `tenant`) 
VALUES 
(1,'message','Tag for monitors on user messages','2018-11-24 13:35:36','2018-11-24 13:35:36',1),
(2,'tenant','Tag for monitors on tenant metrics','2018-11-24 13:35:37','2018-11-24 13:35:37',1),
(3,'user','Tag for monitors on user metrics','2018-11-24 13:35:37','2018-11-24 13:35:37',1),
(4,'receipt','Tag for monitors on receipt metrics','2018-11-24 13:35:38','2018-11-24 13:35:38',1);



INSERT INTO `tenants` (`id`, `level`, `title`, `description`, `domain`, `subdomain`, `validate`, `email`, `phone`, `creation_dtime`, `modif_dtime`) 
VALUES 
(1,0,'Main tenant','Description of the main tenant','pluf.ir','www',0,'','','2018-11-24 13:35:34','2018-11-24 13:35:34');



INSERT INTO `user_accounts` (`id`, `login`, `date_joined`, `last_login`, `is_active`, `is_deleted`, `tenant`) 
VALUES 
(1,'admin','2018-11-24 13:35:36','2018-11-24 13:39:52',1,0,1);



INSERT INTO `user_credentials` (`id`, `password`, `expiry_count`, `expiry_dtime`, `creation_dtime`, `is_deleted`, `account_id`, `tenant`) 
VALUES 
(1,'sha1:Fw+PU:dc883ec61ea33abe1001027f03a2fd9789741015',0,'2018-11-25 13:35:41','2018-11-24 13:35:41',0,1,1);



INSERT INTO `user_roles` (`id`, `name`, `description`, `application`, `code_name`, `tenant`) 
VALUES 
(1,'ownership','Permission given to software owners.','tenant','owner',1),
(2,'membership','Permission given to software members.','tenant','member',1),
(3,'authorized users','Permission given to users allowed to access a tenant.','tenant','authorized',1),
(4,'user mamanger','Permission given to users allowed to manager users of a tenant.','user','manager',1),
(5,'zone ownership','Permission given to zone owners.','shop','zoneOwner',1),
(6,'Agency ownership','Permission given to agency owner.','shop','agencyOwner',1);

