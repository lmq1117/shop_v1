create table if not exists `shop_msg`(
    id int unsigned not null primary key auto_increment,
    `senderid` int unsigned not null,
    `receid` int unsigned not null,
    `title` varchar(255) not null,
    `content` varchar(255) not null,
    `status` tinyint unsigned not null comment '0:未读1:已读2:已删'
)engine=innodb charset=utf8;
