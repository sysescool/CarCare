--返回让人读起来更能接收的订单表
USE [CarCare]
GO
CREATE or ALTER PROCEDURE usporder
AS
BEGIN
	 SELECT [orderid], [cusname], [carname], [carnum], [proname], [paystate], S.[price], [ordertime] FROM [order] as S
	 LEFT JOIN
	 (
		SELECT [proid], [proname], [price] FROM [project] 
	 )AS P ON P.[proid] = S.[oproid]
	 LEFT JOIN 
	 (
					 SELECT [ownerid], [cusname], [cusphone], [carname], [carnum] FROM [owner] as P
					 LEFT JOIN
					 (	
					 SELECT [cusid], [cusname], [cusphone] FROM [customer] 
					 )AS Q ON Q.[cusid] = P.[ocusid]
					 LEFT JOIN
					 (
					 SELECT [carid], [carname], [carnum] FROM [vehicle]
					 )AS R ON R.[carid] = P.[ocarid]
	 )AS Q ON Q.[ownerid] = S.[ownerid]
	 
	 
	 --LEFT JOIN 
	 --(
	 --SELECT [proid], [proname], [price] FROM [project]
	 --)AS T ON T.[proid] = S.[oproid] 



END
