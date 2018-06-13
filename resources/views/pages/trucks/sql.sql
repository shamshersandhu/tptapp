select concat("
<div class='col'>\r\n
    <div class='input-group input-group-sm mb-3'>\r\n
        <div class='input-group-prepend'>\r\n<span class='nput-group-text'>" , a.COLUMN_COMMENT , "</span>\r\n</div>\r\n<input class='form-control form-control-sm'
            id='e" ,a.COLUMN_NAME,"' style='background-color: #fff;>' \r\n</div>\r\n</div>\t\n") from COLUMNS a where a.TABLE_SCHEMA='tptdb'
    and a.TABLE_NAME='trucks'


create or replace view trucks_view2 as
select `a`.`id` AS `id`,`a`.`regnum` AS `regnum`,`a`.`owner` AS `owner`,DATE_FORMAT(`a`.`purch_date`, "%d-%m-%Y") AS `purch_date`,
DATE_FORMAT(`a`.`sold_date`, "%d-%m-%Y") AS `sold_date`,`a`.`status` AS `status`,`a`.`make` AS `make`,`a`.`wheels` AS `wheels`,
`a`.`engine_num` AS `engine_num`,`a`.`ch_num` AS `ch_num`,`a`.`GWT` AS `GWT`,`a`.`NWT` AS `NWT`,`a`.`fyrpermit` AS `fyrpermit`,
DATE_FORMAT(`a`.`fyrpermitexp`, "%d-%m-%Y") AS `fyrpermitexp`,`a`.`npnum` AS `npnum`,DATE_FORMAT(`a`.`npexp`, "%d-%m-%Y") AS `npexp`,
DATE_FORMAT(`a`.`fitexp`, "%d-%m-%Y") AS `fitexp`,DATE_FORMAT(`a`.`pucexp`, "%d-%m-%Y") AS `pucexp`,`a`.`tank_desc` AS `tank_desc`,
`a`.`tanknum` AS `tanknum`,DATE_FORMAT(`a`.`tankconsdate`, "%d-%m-%Y") AS `tankconsdate`,`a`.`tanktype` AS `tanktype`,`a`.`tankmoc` AS `tankmoc`,
`a`.`watercap` AS `watercap`,`a`.`liccap` AS `liccap`,DATE_FORMAT(`a`.`rule18exp`, "%d-%m-%Y") AS `rule18exp`,
DATE_FORMAT(`a`.`rule19exp`, "%d-%m-%Y") AS `rule19exp`,DATE_FORMAT(`a`.`rule44exp`, "%d-%m-%Y") AS `rule44exp`,
DATE_FORMAT(`a`.`tankcalexp`, "%d-%m-%Y") AS `tankcalexp`,DATE_FORMAT(`a`.`airtestdt`, "%d-%m-%Y") AS `airtestdt`,`a`.`rule43desc` AS `rule43desc`,
`a`.`shellthk` AS `shellthk`,`a`.`diskthk` AS `diskthk`,`a`.`inspolnum` AS `inspolnum`,`a`.`inspolpro` AS `inspolpro`,
DATE_FORMAT(`a`.`insexp`, "%d-%m-%Y") AS `insexp`,`a`.`notes` AS `notes`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,
`b`.`name` AS `ownname` from `tptdb`.`trucks` `a` join `tptdb`.`contacts` `b` where `a`.`owner` = `b`.`id`