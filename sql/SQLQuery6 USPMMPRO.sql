CREATE or ALTER PROCEDURE uspmmpro
@data1 DATETIME,
@data2 DATETIME
AS
BEGIN
	 SELECT proname, O.NUM 
	 FROM [project] as P
	 RIGHT JOIN 
	 ( SELECT oproid, COUNT(*) AS NUM 
	 FROM [order] WHERE ordertime  
	 BETWEEN @data1 AND @data2 
	 GROUP BY oproid) as O 
	 ON O.oproid = P.proid
END
