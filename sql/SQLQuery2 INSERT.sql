USE [CarCare]
GO
print '开始插入staff:'
IF OBJECT_ID('dbo.staff', 'U') IS NOT NULL
INSERT dbo.staff (StaffName, StaffGender, StaffRole, StaffAccount, StaffPhone, StaffPsw)
	VALUES
		('admin', 1, 1, '17812345678', '17812345678', 'password'),
		('syc', 1, 0, '17800000000','17800000000', 'password'),
		('adminJM',1, 1, 'adminJM','18888888888', 'e10adc3949ba59abbe56e057f20f883e')
GO



USE [CarCare]
GO
print '开始插入project:'
IF OBJECT_ID('dbo.project', 'U')IS NOT NULL
INSERT dbo.project(proname, price)
	VALUES
		('洗车', 25),
		('精洗', 50),
		('美容', 80),
		('贴膜',100),
		('镀晶',150),
		('镀膜',130),
		('封釉',100),
		('打蜡',50),
		('维修',-1),
		('补胎',-1),
		('漆面修复',-1)
GO



USE [CarCare]
GO
print '开始插入customer:'
IF OBJECT_ID('dbo.customer', 'U')IS NOT NULL
INSERT dbo.customer(cusname, cusgender, cusphone)
	VALUES
		('张三', 1, '16600000000'),
		('李四', 0, '11900000000'),
		('王五', 0, '11000000000')
GO


USE [CarCare]
GO
print '开始插入vehicle:'
IF OBJECT_ID('dbo.vehicle', 'U')IS NOT NULL
INSERT dbo.vehicle(carname, carnum)
	VALUES
		('奥迪A6', '鲁N12345'),
		('宝马2000', '鲁Q34567'),
		('宝马3000', '鲁Q34568'),
		('宝马5000', '鲁Q34569')
GO

USE [CarCare]
GO
print '开始插入owner:'
IF OBJECT_ID('dbo.owner', 'U')IS NOT NULL
INSERT dbo.[owner](ocusid, ocarid)
	VALUES
		(1,1),
		(2,2),
		(2,3),
		(2,4)
GO

USE [CarCare]
GO
print '开始插入order:'
IF OBJECT_ID('dbo.order', 'U') IS NOT NULL
INSERT dbo.[order](oproid, ownerid, paystate, price, ordertime)
	VALUES
		(1, 1, 1, 25, '2019-01-01 10:30:00'),
		(1, 2, 1, 25, '2019-02-01 10:30:00'),
		(2, 2, 1, 50, '2019-03-01 10:30:00'),
		(7, 2, 0, 100, '2019-03-02 10:30:00'),
		(7, 3, 1, 100, '2019-03-03 10:30:00')
GO









USE [CarCare]
GO
INSERT dbo.cate ( catename, pid, sort)
	VALUES 
	( '前端技术1', 0, 52),
	( 'SSS', 0, 50)
GO

USE [CarCare]
GO
INSERT dbo.[user] ( username, password, salt)
	VALUES 
( 'admin', '9a8d433e2aaff89fae34c4c6113bcfa0', '018ac0891baa814af14a11f4c6c4316c'),
( 'roa111', 'password', '$2y$10$ZYO4OMveMNyvrH5Pd0Tzd.A/Fh7H0sHUY5VLZhhFl/P24RykMJAP2'),
( 'admin', '12345', '$2y$10$5rIwnM/q2/hMRy2sA.Ffc.P/l5SXsKLyOCbphu4X4vEetIAh1.ZMq'),
( 'admin', '45678', '$2y$10$uR/KZ6AJ4xmLqQB969PbC.j12xlyvNA65VDdCO0X2Zr2QNEsMHa0u'),
( 'admin', '56789', '$2y$10$u7aj.dNfLdsqjyQuRJ/L4.eiK0PD0uRNUgSxl8ik0VLOfeOc9OLUS'),
( 'admin', '67890', '$2y$10$KeygdwQzqe8JTdTG2jvwcOMRkDi4nvW1HYKBgY2w/i41H3DOfNHE.')
GO

