create table words (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  word VARCHAR(255) UNIQUE,
  part_of_speach TINYINT UNSIGNED, /*品詞*/
  japanese TEXT,
  category TINYINT UNSIGNED, /* -128 から 127 unsigned で 0 から 255 */
  memo TEXT,
  next_date DATE, /* フォーマット ： 'YYYY-MM-DD' */
  correct TINYINT UNSIGNED
);

ALTER TABLE words ADD updated DATE;

ALTER TABLE words ADD part_of_speach2 TINYINT UNSIGNED AFTER japanese;
ALTER TABLE words ADD japanese2 TEXT AFTER part_of_speach2;

insert into words (word, part_of_speach, japanese, category, memo, next_date, correct) values
-- part_of_speach　１：名詞　２：動詞　３：形容詞　４：副詞　５：句動詞　９：他
-- category　１：Daily　２：Conversation　３：Academic　４：Writing　５：Economy　６：Tech

('whatsoever', 4, '[否定を表す名刺の前で]まったく（〜ない）', 3, 'book girl', '2020-09-15', 0); 