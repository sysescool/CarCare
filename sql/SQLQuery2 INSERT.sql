USE [CarCare]
GO
print '��ʼ����staff:'
IF OBJECT_ID('dbo.staff', 'U') IS NOT NULL
INSERT dbo.staff (StaffName, StaffGender, StaffRole, StaffAccount, StaffPhone, StaffPsw)
	VALUES
		('admin', 1, 1, '17812345678', '17812345678', 'password'),
		('syc', 1, 0, '17800000000','17800000000', 'password'),
		('adminJM',1, 1, 'adminJM','18888888888', 'e10adc3949ba59abbe56e057f20f883e')
GO



USE [CarCare]
GO
print '��ʼ����project:'
IF OBJECT_ID('dbo.project', 'U')IS NOT NULL
INSERT dbo.project(proname, price)
	VALUES
		('ϴ��', 25),
		('��ϴ', 50),
		('����', 80),
		('��Ĥ',100),
		('�ƾ�',150),
		('��Ĥ',130),
		('����',100),
		('����',50),
		('ά��',-1),
		('��̥',-1),
		('�����޸�',-1)
GO



USE [CarCare]
GO
print '��ʼ����customer:'
IF OBJECT_ID('dbo.customer', 'U')IS NOT NULL
INSERT dbo.customer(cusname, cusgender, cusphone)
	VALUES
		('����', 1, '16600000000'),
		('����', 0, '11900000000'),
		('����', 0, '11000000000')
GO


USE [CarCare]
GO
print '��ʼ����vehicle:'
IF OBJECT_ID('dbo.vehicle', 'U')IS NOT NULL
INSERT dbo.vehicle(carname, carnum)
	VALUES
		('�µ�A6', '³N12345'),
		('����2000', '³Q34567'),
		('����3000', '³Q34568'),
		('����5000', '³Q34569')
GO

USE [CarCare]
GO
print '��ʼ����owner:'
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
print '��ʼ����order:'
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
	( 'ǰ�˼���1', 0, 52),
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

