


--���������ݿ�CarCare
IF NOT EXISTS (
   SELECT name
   FROM sys.databases
   WHERE name = N'CarCare'
)
CREATE DATABASE [CarCare]
GO

--ɾ����
USE [CarCare]
GO
print '��ʼɾ��:'
IF OBJECT_ID('dbo.order', 'U') IS NOT NULL
DROP TABLE dbo.[order]
GO

IF OBJECT_ID('dbo.owner', 'U') IS NOT NULL
DROP TABLE dbo.[owner]
GO

IF OBJECT_ID('dbo.', 'U') IS NOT NULL
DROP TABLE dbo.[project]
GO

IF OBJECT_ID('dbo.staff', 'U') IS NOT NULL
DROP TABLE dbo.[staff]
GO

IF OBJECT_ID('dbo.vehicle', 'U') IS NOT NULL
DROP TABLE dbo.[vehicle]
GO

IF OBJECT_ID('dbo.customer', 'U') IS NOT NULL
DROP TABLE dbo.[customer]
GO

IF OBJECT_ID('dbo.user', 'U') IS NOT NULL
DROP TABLE dbo.[user]
GO

IF OBJECT_ID('dbo.cate', 'U') IS NOT NULL
DROP TABLE dbo.[cate]
GO



print '������staff:'
USE [CarCare]
IF OBJECT_ID('dbo.staff', 'U') IS NOT NULL
DROP TABLE dbo.[staff]
GO
CREATE TABLE dbo.[staff]
(
	staffid		[INT]IDENTITY(1,1)	NOT NULL PRIMARY KEY,
	staffname	[NVARCHAR](50)	NOT NULL,
	staffgender	BIT				NOT NULL,
	staffrole	INT DEFAULT(0)		NOT NULL,
	staffaccount	[NVARCHAR](50)	NOT NULL UNIQUE,
	--StaffJob	INT				NOT NULL,
	staffphone	[NVARCHAR](50)	NOT NULL,
	staffpsw	[NVARCHAR](50)	NOT NULL,
	stafftime	[DATETIME]DEFAULT (CONVERT(DATETIME,GETDATE(),121))		NOT NULL,
	--StaffShow	BIT	DEFAULT'1'	NOT NULL,  --�Ƿ���ʾ
	--StaffStop	BIT DEFAULT'0'	NOT NULL   --�Ƿ�ͣ��
);
GO


print '������project:'
USE [CarCare]
IF OBJECT_ID('dbo.project','U')IS NOT NULL
DROP TABLE dbo.[project]
GO
CREATE TABLE dbo.[project]
(
	proid			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,
	proname			[NVARCHAR](30)			NOT NULL	UNIQUE,
	--preid			[INT]					NOT NULL,
	--sort			[INT]DEFAULT(50)		NOT NULL,
	--show			BIT DEFAULT'1',
	price			SMALLMONEY DEFAULT(-1)	NOT NULL,
);
GO

print '������customer:'
USE [CarCare]
IF OBJECT_ID('dbo.customer','U') IS NOT NULL
DROP TABLE dbo.[customer]
GO
CREATE TABLE dbo.[customer]
(
	cusid			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,
	cusname			[NVARCHAR](30)			NOT NULL,
	cusgender		BIT						NOT NULL,
	cusphone		[NVARCHAR](30)			NOT NULL	UNIQUE,
);
GO

print '������vehicle:'
USE [CarCare]
IF OBJECT_ID('dbo.vehicle','U') IS NOT NULL
DROP TABLE dbo.[vehicle]
GO
CREATE TABLE dbo.[vehicle]
(
	carid			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,
	carname			[NVARCHAR](50)			NOT NULL,
	carnum			[NVARCHAR](50)			NOT NULL	UNIQUE,
);
GO

print '������owner:'
USE[CarCare]
IF OBJECT_ID('dbo.owner') IS NOT NULL
DROP TABLE dbo.[owner]
GO
CREATE TABLE dbo.[owner]
(
	ownerid			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,
	ocarid			[INT]					NOT NULL	FOREIGN KEY REFERENCES vehicle(carid),
	ocusid			[INT]					NOT NULL	FOREIGN KEY REFERENCES customer(cusid),
	
)
GO

print '������order:'
USE [CarCare]
IF OBJECT_ID('dbo.order', 'U') IS NOT NULL
DROP TABLE dbo.[order]
GO
CREATE TABLE dbo.[order]
(
	orderid			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,
	oproid			[INT]					NOT NULL	FOREIGN KEY REFERENCES project(proid),
	ownerid			[INT]					NOT NULL	FOREIGN KEY REFERENCES [owner](ownerid),
	paystate		BIT DEFAULT'0'			NOT NULL,
	price			SMALLMONEY				NOT NULL,
	ordertime	[DATETIME]DEFAULT (CONVERT(DATETIME,GETDATE(),121))		NOT NULL,
)
GO






























USE [CarCare]
IF OBJECT_ID('dbo.cate', 'U') IS NOT NULL
DROP TABLE dbo.[cate]
GO
CREATE TABLE dbo.[cate]
(
   id			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,	--��Ŀid
   catename		[NVARCHAR](30)			NOT NULL,					--��Ŀ����
   pid			[INT]DEFAULT(0)			NOT NULL,					--�ϼ���Ŀid,
   sort			[INT]DEFAULT(50)		NOT NULL,					--����,
   show			BIT DEFAULT'1'			NOT NULL,					--��ʾ
);
GO

USE [CarCare]
IF OBJECT_ID('dbo.user', 'U')IS NOT NULL
DROP TABLE dbo.[user]
GO
CREATE TABLE dbo.[user]
(
   id			[INT]IDENTITY(1,1)		NOT NULL	PRIMARY KEY,	--��Ŀid
   username		[NVARCHAR](30)			NOT NULL,					--��Ŀ����
   [password]		[NVARCHAR](50)			NOT NULL,					--�ϼ���Ŀid,
   salt			[NVARCHAR](255)			NOT NULL,					--����,
);
GO







----�������ݼ��۸���Ϣ�����
--USE [CarCare]
--IF OBJECT_ID('dbo.project', 'U') IS NOT NULL
--DROP TABLE dbo.[project]
--GO
--CREATE TABLE dbo.[project]
--(
--   pro_id        INT    NOT NULL   PRIMARY KEY, -- primary key column
--   pro_first     [NVARCHAR](50)  NOT NULL,
--   pro_second	 [NVARCHAR](50)  NOT NULL,
--   pro_price     SMALLMONEY  NOT NULL
--);
--GO

----�����ͻ���Ϣ��
--USE CarCare
--IF OBJECT_ID('dbo.customer', 'U') IS NOT NULL
--DROP TABLE dbo.[customer]
--GO
--CREATE TABLE dbo.[customer]
--(
--   cus_id        INT    NOT NULL   PRIMARY KEY, -- primary key column
--   cus_name      [NVARCHAR](50)  NOT NULL,
--   cus_phone	 [NVARCHAR](50)  NOT NULL,
--   cus_gender    BIT  NOT NULL
--);
--GO

----����������Ϣ��
--USE CarCare
--IF OBJECT_ID('dbo.vehicle', 'U') IS NOT NULL
--DROP TABLE dbo.[vehicle]
--GO
--CREATE TABLE dbo.[vehicle]
--(
--   car_id		INT    NOT NULL   PRIMARY KEY, -- primary key column
--   car_brand	[NVARCHAR](200)    NOT NULL,
--   car_model	[NVARCHAR](200)  NOT NULL,
--   car_price    SMALLMONEY  NOT NULL,
--   car_img      [NVARCHAR](200),
--   car_other	[NVARCHAR](200)
--);
--GO

----�����ͻ�������Ϣ��
--USE CarCare
--IF OBJECT_ID('dbo.holdcar', 'U') IS NOT NULL
--DROP TABLE dbo.[holdcar]
--GO
--CREATE TABLE dbo.[holdcar]
--(
--   hold_id       INT    NOT NULL   PRIMARY KEY, -- primary key column
--   cus_id        [NVARCHAR](50)  NOT NULL,
--   car_id	     [NVARCHAR](50)  NOT NULL,
--   car_plate     [NVARCHAR](30) NOT NULL,
--   is_owner      BIT NOT NULL
--);
--GO

----�������ݵǼǶ�����
--USE CarCare
--IF OBJECT_ID('dbo.order', 'U') IS NOT NULL
--DROP TABLE dbo.[order]
--GO
--CREATE TABLE dbo.[order]
--(
--   order_id   INT    NOT NULL   PRIMARY KEY, -- primary key column
--   pro_id     INT  NOT NULL,
--   cus_id	  INT  NOT NULL,
--   pay        SMALLMONEY  NOT NULL,
--   paytime    DATETIME
--);
--GO