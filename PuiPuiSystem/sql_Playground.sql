INSERT INTO `userquestions` (`QID`, `ownerID`, `EditorID`, `Subject`, `Title`, `Chapter`, `Correct_Ans`, `Question`, `Answer1`, `Answer2`, `Answer3`, `Answer4`, `Detailed1`, `Detailed2`, `Detailed3`, `Detailed4`, `CreatedTime`, `LastUPDtime`, `PublishStatus`) 
VALUES (NULL, 'adminPuiPui', 'adminPuiPui', '數學', '1090322三下數學題目卷_210421115939.pdf', '109 學年度第二學期第二次定期評量三年級數學領域評量試卷', '3', '3. 有18根香腸，每根切成6塊，每9塊裝成1盤，至少需要幾個盤子才能將所有的香腸裝完？','10個','11個','12個','13個' , NULL, NULL, NULL, NULL, current_timestamp(), current_timestamp(), 'N')

--使用者瀏覽自己的題庫
SELECT * FROM `userquestions` WHERE ownerID = 'adminPuiPui'

--瀏覽公開題庫
SELECT * FROM `userquestions` WHERE PublishStatus = 'Y'