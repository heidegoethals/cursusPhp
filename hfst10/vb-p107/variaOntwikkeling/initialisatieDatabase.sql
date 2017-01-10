
-- DROP TABLE IF EXISTS mvc_boeken;
-- CREATE TABLE mvc_boeken (
--   id int(10) unsigned NOT NULL AUTO_INCREMENT,
--   titel varchar(150) NOT NULL,
--   genre_id int(10) unsigned NOT NULL,
--   PRIMARY KEY (id)
-- );
-- 
-- 
-- DROP TABLE IF EXISTS mvc_genres;
-- CREATE TABLE mvc_genres (
--   id int(10) unsigned NOT NULL AUTO_INCREMENT,
--   genre varchar(150) NOT NULL,
--   PRIMARY KEY (id)
-- );

select * 
from mvc_boeken
inner join mvc_genres
on mvc_boeken.genre_id = mvc_genres.id; 