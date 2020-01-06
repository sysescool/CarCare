--指定时间段内收入情况
CREATE or ALTER PROCEDURE uspmminc
@data1 DATETIME,
@data2 DATETIME
--@cus  INT
AS
BEGIN
	SELECT SUM(price) FROM [order] 
	WHERE paystate=1 AND ordertime BETWEEN @data1 AND @data2 
END