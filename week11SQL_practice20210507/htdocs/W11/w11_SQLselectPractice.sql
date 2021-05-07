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