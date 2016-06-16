    create table `liuyan`(
        `id` int unsigned not null primary key auto_increment,
        `name` varchar(45) not null default '匿名',
        `topic` varchar(120) not null default '',
        `content` varchar(255) not null default '',
        `addtime` int not null default 0
    )engine=InnoDB charset=utf8;

    insert into liuyan values (null,'逗逼二楼','步子太大，容易扯着蛋','哎吆，我去...大哥，我蛋疼的不行，菊花还痒，你行行好，带我一段呗。',unix_timestamp());

