-- MySQL dump 10.13  Distrib 5.6.29, for Win64 (x86_64)
--
-- Host: localhost    Database: g14_shop
-- ------------------------------------------------------
-- Server version	5.6.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (1,0,'服装','0,',1460553490),(2,0,'数码','0,',1460553504),(4,0,'电脑','0,',1460553523),(5,1,'男装','0,1,',1460553539),(6,1,'女装','0,1,',1460553556),(7,2,'相机','0,2,',1460553585),(8,4,'笔记本','0,4,',1460553599),(9,4,'台式机','0,4,',1460553631),(10,8,'商务本','0,4,8,',1460553651),(11,8,'游戏本','0,4,8,',1460553695),(12,11,'发烧级','0,4,8,11,',1460554438),(13,0,'家电','0,',1460598375),(14,13,'大家电','0,13,',1460598394),(15,13,'厨房电器','0,13,',1460598424),(16,5,'衬衫','0,1,5,',1460602554),(17,5,'T恤','0,1,5,',1460602573),(18,11,'入门级','0,4,8,11,',1460614616),(19,12,'骨灰级','0,4,8,11,12,',1460614648);
/*!40000 ALTER TABLE `shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_comment`
--

DROP TABLE IF EXISTS `shop_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned DEFAULT NULL,
  `cid` int(10) unsigned DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_comment`
--

LOCK TABLES `shop_comment` WRITE;
/*!40000 ALTER TABLE `shop_comment` DISABLE KEYS */;
INSERT INTO `shop_comment` VALUES (1,13,2,'短袖不错。看到很多人调戏客服，太单纯啦，客服肯定是抠脚大汉，女神一般都很忙，才不会搭理呢。 '),(2,17,2,'大家好。我是岳灵珊，这是我买的第二个宝贝哦'),(3,13,10,'这个路由器好啊，我跟少林寺的方正小和尚聊天时，居然还能连得上');
/*!40000 ALTER TABLE `shop_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_commentanswer`
--

DROP TABLE IF EXISTS `shop_commentanswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_commentanswer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `words` varchar(255) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_commentanswer`
--

LOCK TABLES `shop_commentanswer` WRITE;
/*!40000 ALTER TABLE `shop_commentanswer` DISABLE KEYS */;
INSERT INTO `shop_commentanswer` VALUES (1,1,'我穿不大啊',35),(2,1,'大家好，我是李双江',36),(3,2,'刚才小儿子在这里瞎说，大家不要相信',36),(4,3,'这样啊，华山用的也是这款，上次取福建避难，信号弱得不行，唉...害得我都不能跟平之聊微信了',35),(5,3,'对了，风太师叔，说说你年轻时候的故事呗',35),(6,1,'大家好，我是王大锤',33),(7,1,'小伙子们，多读书，少吹牛',34),(8,1,'葛优表型很到位啊',37);
/*!40000 ALTER TABLE `shop_commentanswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_commodity`
--

DROP TABLE IF EXISTS `shop_commodity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id自增',
  `cateid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'nopicture.jpg',
  `price` float(8,2) NOT NULL,
  `store` int(10) unsigned DEFAULT '0',
  `views` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `buy` int(10) unsigned DEFAULT '0' COMMENT '已经卖出的数量',
  `describe` text NOT NULL,
  `display` tinyint(1) DEFAULT '1' COMMENT '0:下架,1:上架',
  `status` tinyint(1) DEFAULT '1' COMMENT '0:热销,1:新品,2:猜你喜欢',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_commodity`
--

LOCK TABLES `shop_commodity` WRITE;
/*!40000 ALTER TABLE `shop_commodity` DISABLE KEYS */;
INSERT INTO `shop_commodity` VALUES (1,8,'时间一秒','306fd6211674e220e416c5951203e418.jpg',999.00,5,0,0,'时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒时间一秒',1,1,1461032258),(2,5,'SD2','485cad50d990d0d5ff534334e7413335.jpg',11.00,11,0,0,'DF',1,0,1460827396),(3,5,'S3232','2550843692d44ab751599ad0f1252f92.jpg',11.00,11,0,0,'DF',1,0,1460647707),(5,6,'sfds','8a59c3820dbdce107b255653527f2607.jpg',19.00,20,0,0,'19',1,0,1461140726),(6,6,'小鸟依人装','02652c456125efa2528acc9d54cce96c.jpg',19.00,19,0,0,'19',1,0,1461140722),(7,16,'体重秤','daaccf2b9f3f5e7d585d006ec3b69e78.jpg',111.00,1,0,0,'买了这个秤，本来51，现在47，好开心',1,0,1461149393),(8,8,'Y470','c7061564db34527ea818855f8c6c1edd.jpg',5299.00,1,0,0,'过时的本本，不要买啊，千万',1,1,1460645961),(9,9,'家悦4000','485cad50d990d0d5ff534334e7413335.jpg',11.00,11,0,0,'DF',1,0,1460645883),(10,16,'小米路由器','7bcfec267bf3158eaad87d892d0f1360.jpg',721.00,1,0,0,'1小米路由器',1,0,1461149307),(11,6,'以纯','33c72270166a2f36df0113c1e53c3f84.jpg',169.00,1,0,0,'小李专属',1,2,1461140511),(12,16,'真维斯2','a2b99c6974cf8b26f36b70cde58961c0.png',13.00,12,0,0,'121212',1,0,1460827485),(13,14,'小米电视','15c0c76b389cfd5b3a1ad93f40caf96d.jpg',3999.00,10,0,0,'安装200没货要等',1,3,1461036835),(14,5,'空调衫','be1dd84afa8a5497592a48937f945776.jpg',299.00,299,0,0,'比空调便宜，比空调凉快',1,3,1461151109);
/*!40000 ALTER TABLE `shop_commodity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_detail`
--

DROP TABLE IF EXISTS `shop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '来自哪个订单',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '买了啥商品名称',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '买的东西每个多少钱 单价',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '买了几件',
  `is_comment` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_detail`
--

LOCK TABLES `shop_detail` WRITE;
/*!40000 ALTER TABLE `shop_detail` DISABLE KEYS */;
INSERT INTO `shop_detail` VALUES (1,2,8,'Y470',5299.00,2,0),(2,4,8,'Y470',5299.00,1,0),(3,4,11,'以纯',169.00,1,0),(4,4,9,'家悦4000',11.00,1,0),(5,5,2,'SD2',11.00,1,0),(6,5,9,'家悦4000',11.00,1,0),(7,5,12,'真维斯2',13.00,1,0),(8,5,11,'以纯',169.00,1,0),(9,5,5,'sfds',19.00,1,0),(10,5,6,'小鸟依人装',19.00,1,0),(11,6,7,'奇怪了',1.00,1,0),(12,6,8,'Y470',5299.00,1,0),(13,6,9,'家悦4000',11.00,1,0),(14,6,10,'奇怪了',1.00,1,0),(15,6,12,'真维斯2',13.00,1,0),(16,6,11,'以纯',169.00,1,0),(17,6,1,'时间一秒',999.00,1,0),(18,6,2,'SD2',11.00,1,0),(19,6,5,'sfds',19.00,1,0),(20,6,6,'小鸟依人装',19.00,1,0),(21,8,8,'Y470',5299.00,2,0),(22,8,6,'小鸟依人装',19.00,1,0),(23,8,5,'sfds',19.00,1,0),(24,8,2,'SD2',11.00,1,0),(25,8,1,'时间一秒',999.00,1,0),(26,8,7,'奇怪了',1.00,1,0),(27,8,9,'家悦4000',11.00,1,0),(28,8,10,'奇怪了',1.00,1,0),(29,8,11,'以纯',169.00,1,0),(30,8,12,'真维斯2',13.00,1,0),(31,9,13,'小米电视',3999.00,1,0),(32,10,10,'奇怪了',1.00,1,0),(33,10,11,'以纯',169.00,1,0),(34,11,13,'小米电视',3999.00,1,0),(35,12,11,'以纯',169.00,1,0),(36,12,13,'小米电视',3999.00,1,0),(37,13,2,'SD2',11.00,1,1),(38,13,1,'时间一秒',999.00,1,0),(39,13,5,'sfds',19.00,1,0),(40,13,6,'小鸟依人装',19.00,1,0),(41,13,7,'奇怪了',1.00,1,0),(42,13,8,'Y470',5299.00,1,0),(43,13,9,'家悦4000',11.00,1,0),(44,13,10,'奇怪了',1.00,1,1),(45,13,12,'真维斯2',13.00,1,0),(46,13,13,'小米电视',3999.00,1,0),(47,13,11,'以纯',169.00,1,0),(48,14,13,'小米电视',3999.00,1,0),(49,15,12,'真维斯2',13.00,1,0),(50,15,9,'家悦4000',11.00,2,0),(51,17,9,'家悦4000',11.00,1,0),(52,17,2,'SD2',11.00,1,1),(53,18,3,'S3232',11.00,3,0),(54,18,5,'sfds',19.00,4,0),(55,19,7,'体重秤',111.00,1,0),(56,20,1,'时间一秒',999.00,4,0),(57,20,11,'以纯',169.00,3,0),(58,21,10,'小米路由器',721.00,9,0);
/*!40000 ALTER TABLE `shop_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_flinks`
--

DROP TABLE IF EXISTS `shop_flinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_flinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_flinks`
--

LOCK TABLES `shop_flinks` WRITE;
/*!40000 ALTER TABLE `shop_flinks` DISABLE KEYS */;
INSERT INTO `shop_flinks` VALUES (1,'淘宝','http://www.taobao.com',1),(2,'京东','http://www.jd.com',1),(3,'大米','http://www.dami.com',0),(4,'苹果','http://www.apple.com',1),(5,'易迅','http://www.51buy.com',1);
/*!40000 ALTER TABLE `shop_flinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_liuyan`
--

DROP TABLE IF EXISTS `shop_liuyan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_liuyan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '匿名',
  `topic` varchar(120) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_liuyan`
--

LOCK TABLES `shop_liuyan` WRITE;
/*!40000 ALTER TABLE `shop_liuyan` DISABLE KEYS */;
INSERT INTO `shop_liuyan` VALUES (2,'唐小黄','姻缘','一如既往的好，佛祖说，求得此绳，姻缘便来，果真',1461148541),(3,'于xxx','不错1','这线充电太快了，而且耐狗咬……',1461148582),(4,'蜀黍酱','喜新厌旧','对于喜新厌旧的1人我要说句话：请继续下去~我是新来的客服蜀黍酱，喜欢请叩1，超爱请叩2，么么哒请叩3~感谢您对小米的支持^ ^',1461148779),(5,'admin','捉妖记','不错的小电影',1461217607),(6,'admins','bugs测试','前台的readonly不靠谱啊',1461217749);
/*!40000 ALTER TABLE `shop_liuyan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_msg`
--

DROP TABLE IF EXISTS `shop_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `senderid` int(10) unsigned NOT NULL,
  `receid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '0:未读1:已读2:已删',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_msg`
--

LOCK TABLES `shop_msg` WRITE;
/*!40000 ALTER TABLE `shop_msg` DISABLE KEYS */;
INSERT INTO `shop_msg` VALUES (1,1,1,'未读消息测试','未读',1),(2,1,1,'已读消息测试','已读',1),(3,1,1,'已读消息测试2','已读',1),(4,1,1,'未读消息测试2','未读',1),(5,16,1,'申请开通权限','因工作需要，开通以下权限：1上班不打卡，2下班可以提前9小时回去，3年终奖3翻倍',1),(6,1,16,'想得美','别瞎想了，好好干活',1),(7,16,1,'切','100块都不给我',1),(8,1,16,'你说啥','我没听见',1),(9,16,1,'admin，晚上请吃饭不？','我饿了',1),(10,1,16,'不请','自己去吃',1),(11,1,16,'小哥，晚上请洗脚么？','时间长没洗了，有点臭啊',1);
/*!40000 ALTER TABLE `shop_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_orders`
--

DROP TABLE IF EXISTS `shop_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `linkman` varchar(255) NOT NULL DEFAULT '' COMMENT '联系人',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '收货地址',
  `code` char(6) NOT NULL DEFAULT '' COMMENT '邮编',
  `phone` varchar(11) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `total` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:新订单1:已发货2:已收货3:无效订单',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_orders`
--

LOCK TABLES `shop_orders` WRITE;
/*!40000 ALTER TABLE `shop_orders` DISABLE KEYS */;
INSERT INTO `shop_orders` VALUES (1,32,'要啥自行车啊','前进街道','111111','110',1460993203,0.00,4),(2,32,'要啥自行车啊','前进街道','111111','110',1460993211,10598.00,0),(3,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461031619,0.00,4),(4,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461032125,5479.00,0),(5,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461032349,242.00,1),(6,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461032568,6542.00,1),(7,34,'封小童','山东','111111','110',1461034649,0.00,4),(8,34,'封小童','山东','111111','110',1461034657,11841.00,1),(9,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461037007,3999.00,2),(10,1,'张三丰','东圃万福商业大厦','474150','18129931017',1461043045,170.00,0),(11,34,'封小童','山东','111111','110',1461060235,3999.00,2),(12,34,'封小童','山东','111111','110',1461060438,4168.00,0),(13,34,'封小童','山东','111111','110',1461060478,10541.00,2),(14,34,'封小童','山东','111111','110',1461063826,3999.00,1),(15,34,'封小童','山东','111111','110',1461070157,35.00,0),(16,35,'岳灵珊','华山','111111','11-',1461127820,0.00,4),(17,35,'岳灵珊','华山','111111','11-',1461127823,22.00,2),(18,35,'岳灵珊','华山','111111','11-',1461139780,109.00,0),(19,35,'岳灵珊','华山','111111','11-',1461149476,111.00,0),(20,35,'岳灵珊','华山','111111','11-',1461150239,4503.00,2),(21,35,'岳灵珊','华山','111111','11-',1461158653,6489.00,0);
/*!40000 ALTER TABLE `shop_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_users`
--

DROP TABLE IF EXISTS `shop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `sex` enum('0','1','2') DEFAULT NULL,
  `tel` char(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'default.jpg',
  `grade` tinyint(3) unsigned DEFAULT '3',
  `status` tinyint(3) unsigned DEFAULT '1',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_users`
--

LOCK TABLES `shop_users` WRITE;
/*!40000 ALTER TABLE `shop_users` DISABLE KEYS */;
INSERT INTO `shop_users` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','1','13888888888','8888@qq.com','default.jpg',0,1,1460356697),(16,'小仓娃','e10adc3949ba59abbe56e057f20f883e','1','13199899899','xiaocangwa@dengfeng.com','a85257aa680631febf804a3b1c38f21d.jpg',1,1,1461235138),(17,'严守一','e10adc3949ba59abbe56e057f20f883e','1','111111','yanshouyi@shouji.com','2be65491b936bf6291c1686e6118fbfa.jpeg',2,1,1460533654),(18,'4444','e10adc3949ba59abbe56e057f20f883e','2','444','4444','5d2be9a570660c84afdf83053590adfc.jpeg',3,1,1460465558),(19,'abc$','e10adc3949ba59abbe56e057f20f883e','0','1599999999','sam@123.com','56933c23b7f74623cd6a22d4776546a1.jpg',2,0,1460826507),(20,'abc^','e10adc3949ba59abbe56e057f20f883e','0','13526532135','sam@123.com','d51a9fecf0f8dc5cf10fdba6afc929e3.jpeg',2,1,1460464024),(21,'sfsdfds','e10adc3949ba59abbe56e057f20f883e','0','sfdsfd','sdf','default.jpg',2,1,1460465381),(22,'1111111','e10adc3949ba59abbe56e057f20f883e','1','','','ded12bc30f8973b9bdfd8d81966ba22b.jpg',2,1,1460640131),(23,'王小二','e10adc3949ba59abbe56e057f20f883e','1','13526532135','111@111.com','default.jpg',3,1,1460507382),(24,'葛优','e10adc3949ba59abbe56e057f20f883e','0','','','default.jpg',1,0,1461235190),(25,'赛西施','e10adc3949ba59abbe56e057f20f883e','0','','','default.jpg',3,0,1460465911),(26,'ushuda','e10adc3949ba59abbe56e057f20f883e','0','asdkfa','afajkfa','17f5d31876e58f611a95b64f5a2eb58b.jpeg',3,1,1460469942),(27,'sam_pt1','e10adc3949ba59abbe56e057f20f883e','0','123','SFD','default.jpg',3,0,1460471036),(28,'E阿7d','e10adc3949ba59abbe56e057f20f883e','0','','','default.jpg',3,0,1460527089),(29,'王小五','e10adc3949ba59abbe56e057f20f883e','0','13526532135','sam@123.com','979131a676a80057394b53877bcc2eb1.jpg',3,1,1460826407),(30,'id30id','e10adc3949ba59abbe56e057f20f883e','0','13526532135','sam@123.com','3b7d7db5ba17964e4464400ab847bb49.jpg',3,1,1460826891),(31,'admin2','e10adc3949ba59abbe56e057f20f883e','2',NULL,NULL,'default.jpg',3,1,1460991455),(32,'要啥自行车啊','e10adc3949ba59abbe56e057f20f883e','2',NULL,NULL,'default.jpg',3,1,1460991530),(33,'王大锤','e10adc3949ba59abbe56e057f20f883e','2',NULL,NULL,'default.jpg',3,1,1461032792),(34,'风清扬','a03e39c68fe243014ab66bda8473cb72','2','','','e26b9ab0929cc1bf25ee20099a705e79.jpg',1,1,1461235156),(35,'岳灵珊','9ae07b2ba6e8a47a5cb4448142e7195e','2','','','a299400163106b311cc2ce01107ce9a1.jpg',3,1,1461203159),(36,'银枪小霸王','e10adc3949ba59abbe56e057f20f883e','2',NULL,NULL,'default.jpg',3,1,1461156744),(37,'岳不群','e10d923c140a6fcf2d9ec61acb2121ca','2','13939393939','yuebyqun@huashan.com','680f064f9579a7c6031e1b1ffaedee9b.jpg',3,1,1461217063);
/*!40000 ALTER TABLE `shop_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-21 19:12:24
