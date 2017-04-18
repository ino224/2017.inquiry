--comment
drop table if exists inquirys;
CREATE Table inquirys(

 inquiry_id  INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ゆにーくなID' ,
 email varchar (320)  NOT NULL COMMENT 'お問い合わせ者のメアド',
 inquiry_body TEXT NOT NULL COMMENT '内容',
 name varchar (620) NOT NULL COMMENT '名前',
 birthday DATE COMMENT '誕生日',

PRIMARY KEY(`inquiry_id`))
CHARACTER SET 'utf8mb4', ENGINE=innoDB,COMMENT='1レコードが「一件のお問い合わせ」を意味するテーブル';