--指定时间段内不同顾客来消费的次数
USE [CarCare]
GO
CREATE or ALTER PROCEDURE uspyycus
@data1 DATETIME,
@data2 DATETIME
--@cus  INT
AS
BEGIN
	 SELECT cusid, cusname, cusphone, NUM  FROM [customer] as P
	 RIGHT JOIN 
	 (
		SELECT ocusid, COUNT(*) AS NUM FROM [owner] as C
		RIGHT JOIN
		(
			SELECT ownerid 
			FROM [order] WHERE paystate=1 AND 
			ordertime BETWEEN @data1 AND @data2 
		) AS O ON O.ownerid = C.ownerid GROUP BY ocusid
	 )AS Q ON Q.ocusid = P.cusid


END
