--comment
drop table if exists inquirys;
CREATE Table inquirys(

 inquiry_id  INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '��Ɂ[����ID' ,
 email varchar (320)  NOT NULL COMMENT '���₢���킹�҂̃��A�h',
 inquiry_body TEXT NOT NULL COMMENT '���e',
 name varchar (620) NOT NULL COMMENT '���O',
 birthday DATE COMMENT '�a����',

PRIMARY KEY(`inquiry_id`))
CHARACTER SET 'utf8mb4', ENGINE=innoDB,COMMENT='1���R�[�h���u�ꌏ�̂��₢���킹�v���Ӗ�����e�[�u��';