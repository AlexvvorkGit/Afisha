CREATE DATABASE afisha;
USE afisha;
CREATE TABLE IF NOT EXISTS `users` (uid int PRIMARY KEY AUTO_INCREMENT,
              password varchar(200) NOT NULL, name varchar(60) NOT NULL,
              date_of_reg datetime, email varchar(60) NOT NULL, phone varchar(60),
              kind_of_user int NOT NULL, photo varchar(200));


CREATE TABLE IF NOT EXISTS `card` (cid int PRIMARY KEY AUTO_INCREMENT, name varchar(200) NOT NULL,
                    owner_id int NOT NULL, description varchar(1200),
                    location varchar(60) NOT NULL, phones varchar(200), category varchar(60), photos varchar(5000),
                    video varchar(5000));


CREATE TABLE IF NOT EXISTS `event` (eventid int PRIMARY KEY AUTO_INCREMENT, name varchar(200),
                    card_id int NOT NULL, description varchar(1200),
                    phones varchar(200), category varchar(60), photos varchar(5000),
                    video varchar(5000));

CREATE TABLE IF NOT EXISTS ratings (
 id varchar(11) NOT NULL,
 total_votes int(11) NOT NULL default 0,
 total_value int(11) NOT NULL default 0,
 used_ips longtext,
 PRIMARY KEY (id)
)AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `review` (
 `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
 `email` varchar(50) NOT NULL,
 `name` varchar (50) NOT NULL,
 `review_post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
 `location` varchar(255) NOT NULL DEFAULT '',
 `rating_1` int(3) NOT NULL DEFAULT '0',
 `rating_2` int(3) NOT NULL DEFAULT '0',
 `rating_3` int(3) NOT NULL DEFAULT '0',
 `rating_4` int(3) NOT NULL DEFAULT '0',
 `review_video` varchar(255) NOT NULL DEFAULT '',
 `review_foto` varchar(255) NOT NULL DEFAULT '',
 `review_comment` longtext NOT NULL DEFAULT '',
 `location_id` int(11) NOT NULL,
 PRIMARY KEY (`review_id`),
 FOREIGN KEY (`location_id`) REFERENCES card (cid)
)AUTO_INCREMENT=1;




INSERT INTO users (name, password, date_of_reg, email, phone, kind_of_user, photo)  values ('$name', '$password', '$date', '$email', '$phone', '$kind_of_user','$destination_dir')
INSERT INTO card (name, owner_id, description, location, phones, category, photos, video) values("Бар Труба", 1, '/var/www/html/afisha/Описание1.txt', 'Красный проспект, 1', '$222-22-22 333-33-33', 'Живая музыка', '/var/www/html/afisha/images/bar-nochnoy-klub-truba-v-eroshevskoge_cdd9f_full-36231.jpeg /var/www/html/afisha/images/114530262781.jpg /var/www/html/afisha/images/bar-nochnoy-klub-truba-v-eroshevskoge_e04d5_full-36229.jpeg', '$video');
INSERT INTO card (name, description, location, phones, category, photos, video) values('$name', '$description', '$location', '$phones', '$category', '$photos', '$video');