--返回让人读起来更能接收的关系表
CREATE or ALTER PROCEDURE uspor
AS
BEGIN

	 SELECT [ownerid], [cusname], [cusphone], [carname], [carnum] FROM [owner] as P
	 LEFT JOIN
	 (	
	 SELECT [cusid], [cusname], [cusphone] FROM [customer] 
	 )AS Q ON Q.[cusid] = P.[ocusid]
	 LEFT JOIN
	 (
	 SELECT [carid], [carname], [carnum] FROM [vehicle]
	 )AS R ON R.[carid] = P.[ocarid]

END
