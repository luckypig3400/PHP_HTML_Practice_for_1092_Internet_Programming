-- Q1
SELECT *
FROM personal
WHERE personal.NL1 = '02601'

--Q2
SELECT P.Nickname, P.Country
FROM personal AS P
WHERE P.Country = 198

--Q3
SELECT P.Nickname, P.Live1
FROM personal AS P
WHERE P.Live1 LIKE '198%'

--Q4 (要接續第三題的條件)
SELECT P.Nickname, D.C_B5
FROM db_localcode AS D, personal AS P
WHERE D.C_ID = P.Live1 AND P.Live1 LIKE '198%'

--Q5 (要接續三、四題的條件)
SELECT P.Nickname, D.C_B5
FROM db_localcode AS D, personal AS P
WHERE D.C_ID = P.Live1 AND P.Live1 LIKE '198%'
GROUP BY P.Nickname

--Q6 (要接續第五題的條件)
SELECT P.Nickname, D.C_B5
FROM db_localcode AS D, personal AS P
WHERE D.C_ID = P.Live1 AND P.Live1 LIKE '198%'
GROUP BY P.Nickname
ORDER BY P.Nickname DESC
-- ref: https://www.w3schools.com/sql/sql_ref_desc.asp