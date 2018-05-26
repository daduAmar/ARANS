SELECT COUNT(*) FROM attendance WHERE status='1' AND subid IN (SELECT subid FROM subject WHERE subid=18 AND sem = (SELECT sem from students WHERE stdid=36))


-- No of classes 
-- use mysqli_num_rows()

SELECT count(DISTINCT subid) FROM attendance WHERE subid=19
AND date BETWEEN '2018-05-14' AND '2018-05-21'
GROUP BY date


-- no of presents
SELECT COUNT(*) FROM attendance
WHERE subid=18 AND stdid=36 AND status=1
AND date BETWEEN '2018-05-14' AND '2018-05-21'


