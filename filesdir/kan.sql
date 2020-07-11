DROP TABLE academics;

CREATE TABLE `academics` (
  `academics_id` int(11) NOT NULL AUTO_INCREMENT,
  `academics` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`academics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO academics VALUES("13","الشريعة والدراسات الإسلامية","1");



DROP TABLE account_movement;

CREATE TABLE `account_movement` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Ban_id` int(15) NOT NULL,
  `mov_date` date NOT NULL,
  `Outbound` int(30) NOT NULL,
  `Incoming` int(30) NOT NULL,
  `parem` varchar(30) NOT NULL,
  `note` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;




DROP TABLE allowancetype;

CREATE TABLE `allowancetype` (
  `allowancetype_id` int(11) NOT NULL AUTO_INCREMENT,
  `allowancetype` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`allowancetype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE ban_info;

CREATE TABLE `ban_info` (
  `Ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ban_name` varchar(100) NOT NULL,
  `Ban_num` int(60) NOT NULL,
  `Ban_date` date NOT NULL,
  `Ban_op_acc` int(30) NOT NULL,
  `Ban_active` int(3) NOT NULL,
  PRIMARY KEY (`Ban_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ban_info VALUES("2","Dahabshiil","0","2020-06-07","0","1");



DROP TABLE buyment;

CREATE TABLE `buyment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `stu_num` int(11) NOT NULL,
  `want` int(11) NOT NULL,
  `ammont` int(11) NOT NULL,
  `buy_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Department` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `stuGroup` int(11) NOT NULL,
  `StuLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE deductiontype;

CREATE TABLE `deductiontype` (
  `deductiontype_id` int(11) NOT NULL AUTO_INCREMENT,
  `deductiontype` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`deductiontype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




DROP TABLE department;

CREATE TABLE `department` (
  `dep_id` int(7) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

INSERT INTO department VALUES("42","المسائية","1");
INSERT INTO department VALUES("43","الليلية","1");



DROP TABLE edu_quali;

CREATE TABLE `edu_quali` (
  `Edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `Edu_quali` varchar(200) NOT NULL,
  `Edu_year` date NOT NULL,
  `Edu_lang` varchar(100) NOT NULL,
  `Edu_Issuer` varchar(100) NOT NULL,
  `Stu_id` int(11) NOT NULL,
  PRIMARY KEY (`Edu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO edu_quali VALUES("6","ثانوية علمية","2017-06-08","انجليزية","مدرسة شيخ إبراهيم","1302");



DROP TABLE edulevel;

CREATE TABLE `edulevel` (
  `edulev_id` int(11) NOT NULL AUTO_INCREMENT,
  `edulev_name` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`edulev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO edulevel VALUES("5","بكالريوس","1");



DROP TABLE em_lev;

CREATE TABLE `em_lev` (
  `em_lev_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_lev_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`em_lev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




DROP TABLE em_sections;

CREATE TABLE `em_sections` (
  `em_sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_sec_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`em_sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE emailset;

CREATE TABLE `emailset` (
  `em_Host` varchar(100) NOT NULL,
  `em_userName` varchar(100) NOT NULL,
  `em_userPass` varchar(100) NOT NULL,
  `em_SmtpSecure` varchar(100) NOT NULL,
  `em_Port` varchar(100) NOT NULL,
  `em_site` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO emailset VALUES("smtp.hostinger.com","info@gollis.xyz","Maxamuud12$%","TLS","587","info@gollis.xyz");



DROP TABLE emp_allowance;

CREATE TABLE `emp_allowance` (
  `emp_allowance_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `allowancetype_id` int(11) NOT NULL,
  `emp_allowance_date` date NOT NULL,
  `emp_allowance_amount` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_allowance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE emp_debt;

CREATE TABLE `emp_debt` (
  `emp_debt_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `emp_debt_date` date NOT NULL,
  `emp_debt_amount` int(11) NOT NULL,
  `emp_debt_amount_buy` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_debt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;




DROP TABLE emp_deductiont;

CREATE TABLE `emp_deductiont` (
  `emp_deductiont_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `deductiontype_id` int(11) NOT NULL,
  `emp_deductiont_date` date NOT NULL,
  `emp_deductiont_amount` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_deductiont_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE emp_file;

CREATE TABLE `emp_file` (
  `emp_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `emp_file_title` varchar(200) NOT NULL,
  `emp_file_type` varchar(11) NOT NULL,
  `emp_file_link` varchar(200) NOT NULL,
  `emp_file_date` date NOT NULL,
  PRIMARY KEY (`emp_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




DROP TABLE emp_level;

CREATE TABLE `emp_level` (
  `emp_lev_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_lev_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`emp_lev_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE emp_qual;

CREATE TABLE `emp_qual` (
  `emp_qual_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `emp_qual_type` varchar(100) NOT NULL,
  `emp_qual_degree` varchar(100) NOT NULL,
  `emp_qual_year` date NOT NULL,
  `emp_qual_hand` varchar(50) NOT NULL,
  `emp_qual_lang` varchar(50) NOT NULL,
  `emp_qual_note` longtext NOT NULL,
  PRIMARY KEY (`emp_qual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE emp_sellary;

CREATE TABLE `emp_sellary` (
  `empSellary_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `em_sec_id` int(11) NOT NULL,
  `em_lev_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `upDates` date NOT NULL,
  `emp_deductiont` int(200) NOT NULL,
  `emp_debt` int(200) NOT NULL,
  `emp_allowance` int(200) NOT NULL,
  `empSellary` int(11) NOT NULL,
  `empSellaryTake` int(200) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`empSellary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf32;




DROP TABLE emp_sellary_paid;

CREATE TABLE `emp_sellary_paid` (
  `emp_sellary_paid_id` int(30) NOT NULL AUTO_INCREMENT,
  `action_month` varchar(200) NOT NULL,
  `empSellary_id` int(30) NOT NULL,
  `emp_sellary_paid_ampount` int(30) NOT NULL,
  `emp_sellary_paid_date` date NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_sellary_paid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf32;




DROP TABLE empexpe;

CREATE TABLE `empexpe` (
  `empexpe_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(100) NOT NULL,
  `empexpe_est` varchar(100) NOT NULL,
  `empexpe_strdate` date NOT NULL,
  `empexpe_title` varchar(100) NOT NULL,
  `empexpe_degree` varchar(100) NOT NULL,
  `empexpe_levdate` date NOT NULL,
  `empexpe_note` longtext NOT NULL,
  PRIMARY KEY (`empexpe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE empinfo;

CREATE TABLE `empinfo` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(200) NOT NULL,
  `emp_gender` int(11) NOT NULL,
  `emp_DOB` date NOT NULL,
  `emp_POB` varchar(200) NOT NULL,
  `emp_nationality` varchar(200) NOT NULL,
  `emp_address` varchar(200) NOT NULL,
  `emp_phones` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_regDate` date NOT NULL,
  `emp_pic` varchar(100) NOT NULL,
  `emp_note` mediumtext NOT NULL,
  `emp_stustatus` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO empinfo VALUES("6","Maxamuud Xuseen","1","2020-02-08","dscsd","Somalia","26 june","634115346","gadhyare3@gmail.com","2020-02-01","","رؤلالالبي","1");
INSERT INTO empinfo VALUES("7","عبدالرزاق أحمد محمود","1","2020-02-07","هرجيسا","Somalia","26 june","634115346","gadhyare3@gmail.com","2020-02-01","FeeLogo.jpg","ؤسش يس سشي ؤيسشؤ","1");



DROP TABLE empjobs;

CREATE TABLE `empjobs` (
  `empjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(100) NOT NULL,
  `empjob_title` varchar(200) NOT NULL,
  `em_sec_id` int(11) NOT NULL,
  `em_lev_id` int(11) NOT NULL,
  `empjob_strdate` date NOT NULL,
  `empjob_sellary` int(100) NOT NULL,
  `empjob_levdate` date NOT NULL,
  `empjob_note` longtext NOT NULL,
  PRIMARY KEY (`empjob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE exams;

CREATE TABLE `exams` (
  `ex_id` int(6) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `prog_id` int(7) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sec_id` int(6) NOT NULL,
  `lev_id` int(6) NOT NULL,
  `grp_id` int(6) NOT NULL,
  `sub_id` int(6) NOT NULL,
  `ex_code` varchar(30) NOT NULL,
  `ex_crid` int(6) NOT NULL,
  `qu1` int(6) NOT NULL,
  `as1` int(6) NOT NULL,
  `ex1` int(6) NOT NULL,
  `qu2` int(6) NOT NULL,
  `as2` int(6) NOT NULL,
  `ex2` int(6) NOT NULL,
  `att` int(6) NOT NULL,
  `sub_gradPoint` int(11) NOT NULL,
  `sub_Point` int(11) NOT NULL,
  `ex_date` varchar(15) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8;




DROP TABLE expensess;

CREATE TABLE `expensess` (
  `expensess_id` int(11) NOT NULL AUTO_INCREMENT,
  `exptypeid` int(11) NOT NULL,
  `expensess_date` date NOT NULL,
  `expensess_amount` int(11) NOT NULL,
  `expensess_note` longtext NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`expensess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE exptype;

CREATE TABLE `exptype` (
  `exptypeid` int(11) NOT NULL AUTO_INCREMENT,
  `exptype` varchar(30) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`exptypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE faculty;

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO faculty VALUES("13","كلية الشريعة والدراسات الإسلامية","1");



DROP TABLE fee_trans;

CREATE TABLE `fee_trans` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `Invoice_id` int(11) NOT NULL,
  `payDate` date NOT NULL,
  `Discount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `statment_num` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




DROP TABLE feeinfo;

CREATE TABLE `feeinfo` (
  `feeinfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `Pay_Res_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`feeinfo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO feeinfo VALUES("7","7","47","125","1");
INSERT INTO feeinfo VALUES("11","8","47","15","1");
INSERT INTO feeinfo VALUES("12","9","47","5","1");
INSERT INTO feeinfo VALUES("13","10","47","5","1");
INSERT INTO feeinfo VALUES("14","11","47","25","1");



DROP TABLE groups;

CREATE TABLE `groups` (
  `grp_id` int(7) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL,
  `active` varchar(30) NOT NULL,
  PRIMARY KEY (`grp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO groups VALUES("10","الدفعة الأولى","1");
INSERT INTO groups VALUES("11","الدفعة الثانية","1");
INSERT INTO groups VALUES("12","الدفعة الثالثة","1");
INSERT INTO groups VALUES("13","الدفعة الرابعة","1");
INSERT INTO groups VALUES("14","الدفعة الخامسة","1");
INSERT INTO groups VALUES("15","الدفعة السادسة","1");
INSERT INTO groups VALUES("16","الدفعة السابعة","1");
INSERT INTO groups VALUES("17","الدفعة الثامنة","1");



DROP TABLE levels;

CREATE TABLE `levels` (
  `lev_id` int(7) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(20) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`lev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

INSERT INTO levels VALUES("83","المستوى الأول","1");
INSERT INTO levels VALUES("84","المستوى الثاني","1");
INSERT INTO levels VALUES("85","المستوى الثالث","1");
INSERT INTO levels VALUES("86","المستوى الرابع","1");
INSERT INTO levels VALUES("87","المستوى الخامس","1");
INSERT INTO levels VALUES("88","المستوى السادس","1");
INSERT INTO levels VALUES("89","المستوى السابع","1");
INSERT INTO levels VALUES("90","المستوى الثامن","1");
INSERT INTO levels VALUES("91","المستوى التاسع","1");



DROP TABLE links;

CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LinkEn` varchar(30) NOT NULL,
  `LinkAr` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `usrid` int(5) NOT NULL,
  `usridStatuse` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE oiop;

CREATE TABLE `oiop` (
  `active` int(11) DEFAULT NULL,
  `stupic` varchar(0) DEFAULT NULL,
  `stulevel` varchar(2) DEFAULT NULL,
  `stugroup` varchar(2) DEFAULT NULL,
  `section` varchar(2) DEFAULT NULL,
  `department` varchar(1) DEFAULT NULL,
  `clanguage` varchar(0) DEFAULT NULL,
  `school` varchar(0) DEFAULT NULL,
  `cyear` varchar(0) DEFAULT NULL,
  `ctype` varchar(0) DEFAULT NULL,
  `relphonese` varchar(0) DEFAULT NULL,
  `reldigree` varchar(0) DEFAULT NULL,
  `reltype` varchar(0) DEFAULT NULL,
  `relname` varchar(0) DEFAULT NULL,
  `phonese` varchar(0) DEFAULT NULL,
  `country` varchar(0) DEFAULT NULL,
  `city` varchar(0) DEFAULT NULL,
  `stuAdd` varchar(0) DEFAULT NULL,
  `nationality` varchar(0) DEFAULT NULL,
  `POB` varchar(0) DEFAULT NULL,
  `DOP` varchar(0) DEFAULT NULL,
  `mothername` varchar(0) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `stuname` varchar(33) DEFAULT NULL,
  `stunum` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE page;

CREATE TABLE `page` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(30) NOT NULL,
  `page_content` mediumtext NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE paymentinfo;

CREATE TABLE `paymentinfo` (
  `Invoice_id` int(100) NOT NULL AUTO_INCREMENT,
  `lev_id` int(100) NOT NULL,
  `grp_id` int(200) NOT NULL,
  `sec_id` int(100) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `prog_id` int(100) NOT NULL,
  `Pay_Res_id` int(100) NOT NULL,
  `stu_id` int(20) NOT NULL,
  `want` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `AccountStatuse` int(11) NOT NULL,
  `AccountClase` int(11) NOT NULL,
  `AccountOppDate` date NOT NULL,
  PRIMARY KEY (`Invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=893 DEFAULT CHARSET=utf8;

INSERT INTO paymentinfo VALUES("395","90","10","4","42","47","7","986","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("396","90","10","4","42","47","7","987","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("397","90","10","4","42","47","7","988","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("398","90","10","4","42","47","7","989","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("399","90","10","4","42","47","7","990","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("400","90","10","4","42","47","7","991","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("401","90","10","4","42","47","7","992","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("402","90","10","4","42","47","7","993","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("403","90","10","4","42","47","7","994","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("404","90","10","4","42","47","7","995","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("405","90","10","4","42","47","7","996","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("406","90","10","4","42","47","7","997","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("407","90","10","4","42","47","7","998","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("408","90","10","4","42","47","7","999","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("409","90","10","4","42","47","7","1000","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("410","90","10","4","42","47","7","1001","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("411","90","10","4","42","47","7","1002","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("412","90","10","4","42","47","7","1003","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("413","90","10","4","42","47","7","1004","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("414","90","10","4","42","47","7","1005","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("415","90","10","4","42","47","7","1006","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("416","90","10","4","42","47","7","1007","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("417","90","10","4","42","47","7","1008","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("418","90","10","4","42","47","7","1009","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("419","90","10","4","42","47","7","1010","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("420","83","10","4","42","47","7","1011","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("421","83","10","4","42","47","7","1012","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("422","83","10","4","42","47","7","1013","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("423","83","10","4","42","47","7","1014","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("424","83","10","4","42","47","7","1015","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("425","83","10","4","42","47","7","1016","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("426","83","10","4","42","47","7","1017","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("427","83","10","4","42","47","7","1018","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("428","83","10","4","42","47","7","1019","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("429","83","10","4","42","47","7","1020","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("430","83","10","4","42","47","7","1021","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("431","83","10","4","42","47","7","1022","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("432","83","10","4","42","47","7","1023","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("433","83","10","4","42","47","7","1024","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("434","83","10","4","42","47","7","1025","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("435","83","10","4","42","47","7","1026","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("436","83","10","4","42","47","7","1027","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("437","83","10","4","42","47","7","1028","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("438","83","10","4","42","47","7","1029","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("439","83","10","4","42","47","7","1030","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("440","83","10","4","42","47","7","1031","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("441","83","10","4","42","47","7","1032","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("442","83","10","4","42","47","7","1033","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("443","83","10","4","42","47","7","1034","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("444","83","10","4","42","47","7","1035","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("445","90","10","4","42","47","7","1036","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("446","90","10","4","42","47","7","1037","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("447","90","10","4","42","47","7","1038","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("448","90","10","4","42","47","7","1039","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("449","90","10","4","42","47","7","1040","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("450","90","10","4","42","47","7","1041","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("451","90","10","4","42","47","7","1042","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("452","90","10","4","42","47","7","1043","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("453","90","10","4","42","47","7","1044","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("454","90","10","4","42","47","7","1045","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("455","90","10","4","42","47","7","1046","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("456","90","10","4","42","47","7","1047","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("457","90","10","4","42","47","7","1048","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("458","90","10","4","42","47","7","1049","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("459","90","10","4","42","47","7","1050","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("460","90","10","4","42","47","7","1051","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("461","90","10","4","42","47","7","1052","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("462","90","10","4","42","47","7","1053","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("463","90","10","4","42","47","7","1054","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("464","90","10","4","42","47","7","1055","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("465","90","10","4","42","47","7","1056","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("466","90","10","4","42","47","7","1057","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("467","90","10","4","42","47","7","1058","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("468","90","10","4","42","47","7","1059","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("469","90","10","4","42","47","7","1060","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("470","90","10","5","42","47","7","1061","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("471","90","10","5","42","47","7","1062","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("472","90","10","5","42","47","7","1063","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("473","90","10","5","42","47","7","1064","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("474","90","10","5","42","47","7","1065","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("475","90","10","5","42","47","7","1066","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("476","90","10","5","42","47","7","1067","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("477","90","10","5","42","47","7","1068","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("478","90","10","5","42","47","7","1069","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("479","90","10","5","42","47","7","1070","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("480","90","10","5","42","47","7","1071","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("481","90","10","5","42","47","7","1072","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("482","90","10","5","42","47","7","1073","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("483","90","10","5","42","47","7","1074","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("484","90","10","5","42","47","7","1075","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("485","90","10","5","42","47","7","1076","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("486","90","10","5","42","47","7","1077","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("487","90","10","5","42","47","7","1078","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("488","90","11","4","42","47","7","1079","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("489","90","11","4","42","47","7","1080","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("490","90","11","4","42","47","7","1081","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("491","90","11","4","42","47","7","1082","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("492","90","11","4","42","47","7","1083","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("493","90","11","5","42","47","7","1084","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("494","90","11","5","42","47","7","1085","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("495","90","11","5","42","47","7","1086","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("496","90","11","5","42","47","7","1087","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("497","90","11","5","42","47","7","1088","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("498","90","11","5","42","47","7","1089","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("499","90","11","5","42","47","7","1090","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("500","90","11","5","42","47","7","1091","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("501","90","11","5","42","47","7","1092","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("502","90","11","5","42","47","7","1093","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("503","90","11","5","42","47","7","1094","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("504","90","11","5","42","47","7","1095","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("505","90","11","5","42","47","7","1096","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("506","90","11","5","42","47","7","1097","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("507","90","11","5","42","47","7","1098","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("508","90","12","4","43","47","7","1099","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("509","90","12","4","43","47","7","1100","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("510","90","12","4","43","47","7","1101","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("511","90","12","4","43","47","7","1102","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("512","90","12","4","43","47","7","1103","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("513","90","12","4","43","47","7","1104","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("514","90","12","4","43","47","7","1105","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("515","90","12","4","43","47","7","1106","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("516","90","12","4","43","47","7","1107","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("517","90","12","4","43","47","7","1108","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("518","90","12","4","43","47","7","1109","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("519","90","12","4","43","47","7","1110","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("520","90","12","4","43","47","7","1111","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("521","90","12","4","43","47","7","1112","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("522","90","12","4","43","47","7","1113","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("523","90","12","4","43","47","7","1114","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("524","90","12","4","43","47","7","1115","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("525","90","12","4","43","47","7","1116","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("526","90","12","4","43","47","7","1117","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("527","90","12","4","43","47","7","1118","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("528","90","12","4","43","47","7","1119","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("529","90","12","4","43","47","7","1120","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("530","90","12","4","43","47","7","1121","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("531","90","12","4","43","47","7","1122","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("532","90","12","4","43","47","7","1123","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("533","90","12","4","43","47","7","1124","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("534","90","12","4","43","47","7","1125","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("535","90","12","4","43","47","7","1126","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("536","90","12","4","43","47","7","1127","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("537","90","12","4","43","47","7","1128","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("538","90","12","4","43","47","7","1129","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("539","90","12","4","43","47","7","1130","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("540","90","12","4","43","47","7","1131","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("541","90","12","4","43","47","7","1132","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("542","90","12","4","43","47","7","1133","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("543","90","12","4","43","47","7","1134","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("544","90","12","4","43","47","7","1135","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("545","90","12","4","43","47","7","1136","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("546","90","12","4","43","47","7","1137","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("547","90","12","4","43","47","7","1138","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("548","90","12","5","42","47","7","1139","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("549","90","12","5","42","47","7","1140","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("550","90","12","5","42","47","7","1141","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("551","90","12","5","42","47","7","1142","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("552","90","12","5","42","47","7","1143","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("553","90","12","5","42","47","7","1144","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("554","90","12","5","42","47","7","1145","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("555","90","12","5","42","47","7","1146","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("556","90","12","5","42","47","7","1147","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("557","90","12","5","42","47","7","1148","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("558","90","12","5","42","47","7","1149","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("559","90","12","5","42","47","7","1150","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("560","90","12","5","42","47","7","1151","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("561","90","12","5","42","47","7","1152","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("562","90","13","4","43","47","7","1153","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("563","90","13","4","43","47","7","1154","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("564","90","13","4","43","47","7","1155","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("565","90","13","4","43","47","7","1156","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("566","90","13","4","43","47","7","1157","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("567","90","13","4","43","47","7","1158","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("568","90","13","4","43","47","7","1159","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("569","90","13","4","43","47","7","1160","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("570","90","13","4","43","47","7","1161","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("571","90","13","4","43","47","7","1162","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("572","90","13","4","43","47","7","1163","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("573","90","13","4","43","47","7","1164","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("574","90","13","4","43","47","7","1165","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("575","90","13","4","43","47","7","1166","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("576","90","13","4","43","47","7","1167","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("577","90","13","4","43","47","7","1168","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("578","90","13","4","43","47","7","1169","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("579","90","13","4","43","47","7","1170","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("580","90","13","4","43","47","7","1171","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("581","90","13","4","43","47","7","1172","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("582","90","13","4","43","47","7","1173","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("583","90","13","4","43","47","7","1174","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("584","90","13","4","43","47","7","1175","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("585","90","13","4","43","47","7","1176","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("586","90","13","4","43","47","7","1177","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("587","90","13","4","43","47","7","1178","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("588","90","13","4","43","47","7","1179","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("589","90","13","4","43","47","7","1180","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("590","90","13","4","43","47","7","1181","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("591","90","13","4","43","47","7","1182","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("592","90","13","4","43","47","7","1183","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("593","90","13","4","43","47","7","1184","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("594","90","13","4","43","47","7","1185","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("595","90","13","4","43","47","7","1186","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("596","90","13","4","43","47","7","1187","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("597","90","13","4","43","47","7","1188","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("598","90","13","4","43","47","7","1189","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("599","90","13","4","43","47","7","1190","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("600","90","13","4","43","47","7","1191","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("601","90","13","4","43","47","7","1192","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("602","90","13","4","43","47","7","1193","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("603","90","13","4","43","47","7","1194","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("604","90","13","4","43","47","7","1195","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("605","90","13","4","43","47","7","1196","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("606","90","13","4","43","47","7","1197","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("607","90","13","4","43","47","7","1198","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("608","90","13","5","43","47","7","1199","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("609","90","13","5","43","47","7","1200","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("610","90","13","5","43","47","7","1201","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("611","90","13","5","43","47","7","1202","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("612","90","13","5","43","47","7","1203","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("613","90","13","5","43","47","7","1204","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("614","90","13","5","43","47","7","1205","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("615","90","13","5","43","47","7","1206","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("616","90","13","5","43","47","7","1207","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("617","90","13","5","43","47","7","1208","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("618","90","13","5","43","47","7","1209","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("619","90","13","5","43","47","7","1210","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("620","90","13","5","43","47","7","1211","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("621","90","13","5","43","47","7","1212","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("622","90","13","5","43","47","7","1213","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("623","90","13","5","43","47","7","1214","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("624","90","13","5","43","47","7","1215","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("625","90","14","4","42","47","7","1216","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("626","90","14","4","42","47","7","1217","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("627","90","14","4","42","47","7","1218","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("628","90","14","4","42","47","7","1219","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("629","90","14","4","42","47","7","1220","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("630","90","14","4","42","47","7","1221","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("631","90","14","4","42","47","7","1222","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("632","90","14","4","42","47","7","1223","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("633","90","14","5","42","47","7","1224","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("634","90","14","5","42","47","7","1225","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("635","90","14","5","42","47","7","1226","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("636","90","14","5","42","47","7","1227","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("637","90","14","5","42","47","7","1228","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("638","90","14","5","42","47","7","1229","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("639","90","14","5","42","47","7","1230","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("640","90","14","5","42","47","7","1231","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("641","90","14","5","42","47","7","1232","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("642","90","14","5","42","47","7","1233","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("643","90","14","5","42","47","7","1234","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("644","90","14","5","42","47","7","1235","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("645","90","14","5","42","47","7","1236","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("646","90","14","5","42","47","7","1237","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("647","90","14","5","42","47","7","1238","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("648","90","14","5","42","47","7","1239","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("649","90","14","5","42","47","7","1240","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("650","90","14","5","42","47","7","1241","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("651","89","15","4","43","47","7","1242","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("652","89","15","4","43","47","7","1243","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("653","89","15","4","43","47","7","1244","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("654","89","15","4","43","47","7","1245","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("655","89","15","4","43","47","7","1246","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("656","89","15","4","43","47","7","1247","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("657","89","15","4","43","47","7","1248","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("658","89","15","4","43","47","7","1249","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("659","89","15","4","43","47","7","1250","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("660","89","15","4","43","47","7","1251","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("661","89","15","4","43","47","7","1252","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("662","89","15","4","43","47","7","1253","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("663","89","15","4","43","47","7","1254","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("664","89","15","4","43","47","7","1255","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("665","89","15","4","43","47","7","1256","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("666","89","15","4","43","47","7","1257","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("667","89","15","4","43","47","7","1258","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("668","89","15","4","43","47","7","1259","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("669","89","15","4","43","47","7","1260","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("670","89","15","4","43","47","7","1261","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("671","89","15","4","42","47","7","1262","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("672","89","15","4","42","47","7","1263","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("673","89","15","4","42","47","7","1264","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("674","89","15","4","42","47","7","1265","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("675","89","15","4","42","47","7","1266","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("676","89","15","4","42","47","7","1267","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("677","89","15","4","42","47","7","1268","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("678","89","15","4","42","47","7","1269","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("679","89","15","4","42","47","7","1270","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("680","89","15","4","42","47","7","1271","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("681","89","15","4","42","47","7","1272","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("682","89","15","5","42","47","7","1273","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("683","89","15","5","42","47","7","1274","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("684","89","15","5","42","47","7","1275","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("685","89","15","5","42","47","7","1276","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("686","89","15","5","42","47","7","1277","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("687","89","15","5","42","47","7","1278","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("688","89","15","5","42","47","7","1279","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("689","89","15","5","42","47","7","1280","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("690","89","15","5","42","47","7","1281","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("691","89","15","5","42","47","7","1282","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("692","89","15","5","42","47","7","1283","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("693","89","15","5","42","47","7","1284","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("694","89","15","5","42","47","7","1285","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("695","89","15","5","42","47","7","1286","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("696","89","15","5","42","47","7","1287","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("697","89","15","5","42","47","7","1288","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("698","89","15","5","42","47","7","1289","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("699","89","15","5","42","47","7","1290","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("700","89","15","5","42","47","7","1291","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("701","89","15","5","42","47","7","1292","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("702","89","15","5","42","47","7","1293","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("703","89","15","5","42","47","7","1294","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("704","89","15","5","42","47","7","1295","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("705","89","15","5","42","47","7","1296","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("706","89","15","5","42","47","7","1297","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("707","89","15","5","42","47","7","1298","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("708","89","15","5","42","47","7","1299","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("709","89","15","5","42","47","7","1300","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("710","89","15","5","42","47","7","1301","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("711","86","16","4","43","47","7","1302","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("712","86","16","4","43","47","7","1303","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("713","86","16","4","43","47","7","1304","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("714","86","16","4","43","47","7","1305","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("715","86","16","4","43","47","7","1306","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("716","86","16","4","43","47","7","1307","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("717","86","16","4","43","47","7","1308","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("718","86","16","4","43","47","7","1309","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("719","86","16","4","43","47","7","1310","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("720","86","16","4","43","47","7","1311","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("721","86","16","4","43","47","7","1312","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("722","86","16","4","43","47","7","1313","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("723","86","16","4","43","47","7","1314","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("724","86","16","4","43","47","7","1315","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("725","86","16","4","43","47","7","1316","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("726","86","16","4","43","47","7","1317","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("727","86","16","4","43","47","7","1318","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("728","86","16","4","43","47","7","1319","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("729","86","16","4","43","47","7","1320","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("730","86","16","4","43","47","7","1321","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("731","86","16","4","43","47","7","1322","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("732","86","16","4","43","47","7","1323","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("733","86","16","4","43","47","7","1324","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("734","86","16","4","43","47","7","1325","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("735","86","16","4","43","47","7","1326","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("736","86","16","4","43","47","7","1327","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("737","86","16","4","43","47","7","1328","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("738","86","16","4","43","47","7","1329","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("739","86","16","4","43","47","7","1330","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("740","86","16","4","43","47","7","1331","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("741","86","16","4","43","47","7","1332","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("742","86","16","4","43","47","7","1333","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("743","86","16","4","43","47","7","1334","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("744","86","16","4","43","47","7","1335","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("745","86","16","4","43","47","7","1336","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("746","86","16","4","43","47","7","1337","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("747","86","16","4","43","47","7","1338","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("748","86","16","4","43","47","7","1339","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("749","86","16","4","43","47","7","1340","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("750","86","16","4","43","47","7","1341","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("751","86","16","4","43","47","7","1342","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("752","86","16","4","43","47","7","1343","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("753","86","16","4","43","47","7","1344","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("754","86","16","4","42","47","7","1345","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("755","86","16","4","42","47","7","1346","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("756","86","16","4","42","47","7","1347","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("757","86","16","4","42","47","7","1348","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("758","86","16","4","42","47","7","1349","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("759","86","16","4","42","47","7","1350","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("760","86","16","5","42","47","7","1351","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("761","86","16","5","42","47","7","1352","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("762","86","16","5","42","47","7","1353","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("763","86","16","5","42","47","7","1354","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("764","86","16","5","42","47","7","1355","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("765","86","16","5","42","47","7","1356","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("766","86","16","5","42","47","7","1357","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("767","86","16","5","42","47","7","1358","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("768","86","16","5","42","47","7","1359","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("769","86","16","5","42","47","7","1360","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("770","86","16","5","42","47","7","1361","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("771","86","16","5","42","47","7","1362","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("772","86","16","5","42","47","7","1363","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("773","86","16","5","42","47","7","1364","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("774","86","16","5","42","47","7","1365","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("775","86","16","5","42","47","7","1366","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("776","86","16","5","42","47","7","1367","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("777","86","16","5","42","47","7","1368","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("778","86","16","5","42","47","7","1369","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("779","86","16","5","42","47","7","1370","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("780","86","16","5","42","47","7","1371","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("781","84","17","4","43","47","7","1372","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("782","84","17","4","43","47","7","1373","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("783","84","17","4","43","47","7","1374","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("784","84","17","4","43","47","7","1375","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("785","84","17","4","43","47","7","1376","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("786","84","17","4","43","47","7","1377","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("787","84","17","4","43","47","7","1378","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("788","84","17","4","43","47","7","1379","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("789","84","17","4","43","47","7","1380","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("790","84","17","4","43","47","7","1381","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("791","84","17","4","43","47","7","1382","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("792","84","17","4","43","47","7","1383","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("793","84","17","4","43","47","7","1384","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("794","84","17","4","43","47","7","1385","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("795","84","17","4","43","47","7","1386","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("796","84","17","4","43","47","7","1387","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("797","84","17","4","43","47","7","1388","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("798","84","17","4","43","47","7","1389","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("799","84","17","4","43","47","7","1390","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("800","84","17","4","43","47","7","1391","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("801","84","17","4","43","47","7","1392","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("802","84","17","4","43","47","7","1393","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("803","84","17","4","43","47","7","1394","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("804","84","17","4","43","47","7","1395","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("805","84","17","4","43","47","7","1396","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("806","84","17","4","43","47","7","1397","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("807","84","17","4","43","47","7","1398","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("808","84","17","4","43","47","7","1399","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("809","84","17","4","43","47","7","1400","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("810","84","17","4","43","47","7","1401","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("811","84","17","4","43","47","7","1402","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("812","84","17","4","43","47","7","1403","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("813","84","17","4","43","47","7","1404","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("814","84","17","4","43","47","7","1405","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("815","84","17","4","43","47","7","1406","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("816","84","17","4","43","47","7","1407","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("817","84","17","4","43","47","7","1408","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("818","84","17","4","43","47","7","1409","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("819","84","17","4","43","47","7","1410","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("820","84","17","4","43","47","7","1411","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("821","84","17","4","43","47","7","1412","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("822","84","17","4","43","47","7","1413","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("823","84","17","4","43","47","7","1414","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("824","84","17","4","43","47","7","1415","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("825","84","17","4","43","47","7","1416","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("826","84","17","4","43","47","7","1417","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("827","84","17","4","43","47","7","1418","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("828","84","17","4","43","47","7","1419","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("829","84","17","4","43","47","7","1420","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("830","84","17","4","43","47","7","1421","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("831","84","17","4","43","47","7","1422","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("832","84","17","4","43","47","7","1423","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("833","84","17","4","43","47","7","1424","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("834","84","17","4","43","47","7","1425","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("835","84","17","4","43","47","7","1426","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("836","84","17","4","43","47","7","1427","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("837","84","17","4","43","47","7","1428","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("838","84","17","4","43","47","7","1429","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("839","84","17","4","42","47","7","1430","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("840","84","17","4","42","47","7","1431","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("841","84","17","4","42","47","7","1432","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("842","84","17","4","42","47","7","1433","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("843","84","17","4","42","47","7","1434","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("844","84","17","4","42","47","7","1435","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("845","84","17","4","42","47","7","1436","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("846","84","17","4","42","47","7","1437","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("847","84","17","4","42","47","7","1438","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("848","84","17","4","42","47","7","1439","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("849","84","17","4","42","47","7","1440","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("850","84","17","5","42","47","7","1441","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("851","84","17","5","42","47","7","1442","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("852","84","17","5","42","47","7","1443","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("853","84","17","5","42","47","7","1444","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("854","84","17","5","42","47","7","1445","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("855","84","17","5","42","47","7","1446","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("856","84","17","5","42","47","7","1447","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("857","84","17","5","42","47","7","1448","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("858","84","17","5","42","47","7","1449","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("859","84","17","5","42","47","7","1450","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("860","84","17","5","42","47","7","1451","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("861","84","17","5","42","47","7","1452","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("862","84","17","5","42","47","7","1453","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("863","84","17","5","42","47","7","1454","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("864","84","17","5","42","47","7","1455","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("865","84","17","5","42","47","7","1456","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("866","84","17","5","42","47","7","1457","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("867","84","17","5","42","47","7","1458","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("868","84","17","5","42","47","7","1459","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("869","84","17","5","42","47","7","1460","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("870","84","17","5","42","47","7","1461","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("871","84","17","5","42","47","7","1462","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("872","84","17","5","42","47","7","1463","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("873","84","17","5","42","47","7","1464","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("874","84","17","5","42","47","7","1465","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("875","84","17","5","42","47","7","1466","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("876","84","17","5","42","47","7","1467","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("877","84","17","5","42","47","7","1468","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("878","84","17","5","42","47","7","1469","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("879","84","17","5","42","47","7","1470","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("880","84","17","5","42","47","7","1471","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("881","84","17","5","42","47","7","1472","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("882","84","17","5","42","47","7","1473","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("883","84","17","5","42","47","7","1474","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("884","84","17","5","42","47","7","1475","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("885","84","17","5","42","47","7","1476","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("886","84","17","5","42","47","7","1477","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("887","84","17","5","42","47","7","1478","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("888","84","17","5","42","47","7","1479","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("889","84","17","5","42","47","7","1480","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("890","84","17","5","42","47","7","1481","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("891","84","17","5","42","47","7","1482","125","0","1","1","0000-00-00");
INSERT INTO paymentinfo VALUES("892","86","16","4","43","47","7","1302","125","0","1","1","0000-00-00");



DROP TABLE paymentres;

CREATE TABLE `paymentres` (
  `Pay_Res_id` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentRes` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`Pay_Res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO paymentres VALUES("7","الرسوم الدراسية","1");
INSERT INTO paymentres VALUES("8","التسجيل","1");
INSERT INTO paymentres VALUES("9","البطاقة","1");
INSERT INTO paymentres VALUES("10","التظلم","1");
INSERT INTO paymentres VALUES("11","التحويل","1");



DROP TABLE pma__bookmark;

CREATE TABLE `pma__bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';




DROP TABLE pma__central_columns;

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`db_name`,`col_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';




DROP TABLE pma__column_info;

CREATE TABLE `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';




DROP TABLE pma__designer_settings;

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';




DROP TABLE pma__export_templates;

CREATE TABLE `pma__export_templates` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';




DROP TABLE pma__favorite;

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';




DROP TABLE pma__history;

CREATE TABLE `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';




DROP TABLE pma__navigationhiding;

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';




DROP TABLE pma__pdf_pages;

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';




DROP TABLE pma__recent;

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';




DROP TABLE pma__relation;

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';




DROP TABLE pma__savedsearches;

CREATE TABLE `pma__savedsearches` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';




DROP TABLE pma__table_coords;

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float unsigned NOT NULL DEFAULT 0,
  `y` float unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';




DROP TABLE pma__table_info;

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';




DROP TABLE pma__table_uiprefs;

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';




DROP TABLE pma__tracking;

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';




DROP TABLE pma__userconfig;

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';




DROP TABLE pma__usergroups;

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`,`tab`,`allowed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';




DROP TABLE pma__users;

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`,`usergroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';




DROP TABLE programs;

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `edulev_id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `academics_id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO programs VALUES("47","5","13","13","1");



DROP TABLE pwdrest;

CREATE TABLE `pwdrest` (
  `PwdRestId` int(11) NOT NULL AUTO_INCREMENT,
  `PwdRestEmail` varchar(100) NOT NULL,
  `PwdRestKey` longtext NOT NULL,
  `PwdRestExpirs` varchar(100) NOT NULL,
  PRIMARY KEY (`PwdRestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE rt;

CREATE TABLE `rt` (
  `id` int(11) NOT NULL,
  `hy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE section;

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO section VALUES("4","البنين","1");
INSERT INTO section VALUES("5","البنات","1");
INSERT INTO section VALUES("6","مشترك","1");



DROP TABLE settings;

CREATE TABLE `settings` (
  `siteName` varchar(200) NOT NULL,
  `siteDisc` varchar(200) NOT NULL,
  `siteAddr` varchar(200) NOT NULL,
  `sitePhones` varchar(200) NOT NULL,
  `siteEmail` varchar(100) NOT NULL,
  `siteUrl` varchar(200) NOT NULL,
  `siteLogo` text NOT NULL,
  `siteTags` mediumtext NOT NULL,
  `siteStatus` varchar(11) NOT NULL,
  `siteColsemsg` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES("جامعة جولس","كلية الشريعة - برعو","26 يوني- هروجيسا-مروديجيح- صوماليلاند","00252634420907-00252634115346","sethherzi@gmail.com","http://localhost/gollis/","Logo.jpg","university","2","عفوا، لكن الموقع مغلق للتحديث");



DROP TABLE socialmedia;

CREATE TABLE `socialmedia` (
  `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT,
  `socialmedia_name` varchar(200) NOT NULL,
  `socialmedia_link` varchar(200) NOT NULL,
  `socialmedia_logo` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`socialmedia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE strurel;

CREATE TABLE `strurel` (
  `Rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `rel_name` varchar(30) NOT NULL,
  `rel_type` varchar(30) NOT NULL,
  `rel_lev` varchar(30) NOT NULL,
  `rel_Address` mediumtext NOT NULL,
  `rel_email` varchar(50) NOT NULL,
  `rel_phones` varchar(50) NOT NULL,
  PRIMARY KEY (`Rel_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE stu_acadimi;

CREATE TABLE `stu_acadimi` (
  `stu_ac_pro` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(100) NOT NULL,
  `prog_id` varchar(100) NOT NULL,
  `lev_id` varchar(100) NOT NULL,
  `grp_id` varchar(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `Prog_Discount` varchar(11) NOT NULL,
  `statues` varchar(100) NOT NULL,
  PRIMARY KEY (`stu_ac_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=1307 DEFAULT CHARSET=utf8;

INSERT INTO stu_acadimi VALUES("805","982","47","90","6","42","4","0000-00-00","","");
INSERT INTO stu_acadimi VALUES("806","983","47","90","6","42","4","0000-00-00","","");
INSERT INTO stu_acadimi VALUES("807","984","47","90","6","42","4","0000-00-00","","");
INSERT INTO stu_acadimi VALUES("808","985","47","90","6","42","4","0000-00-00","","");
INSERT INTO stu_acadimi VALUES("809","986","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("810","987","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("811","988","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("812","989","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("813","990","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("814","991","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("815","992","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("816","993","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("817","994","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("818","995","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("819","996","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("820","997","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("821","998","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("822","999","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("823","1000","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("824","1001","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("825","1002","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("826","1003","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("827","1004","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("828","1005","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("829","1006","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("830","1007","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("831","1008","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("832","1009","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("833","1010","47","90","10","42","4","0000-00-00","","مستمر");
INSERT INTO stu_acadimi VALUES("834","1011","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("835","1012","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("836","1013","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("837","1014","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("838","1015","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("839","1016","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("840","1017","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("841","1018","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("842","1019","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("843","1020","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("844","1021","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("845","1022","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("846","1023","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("847","1024","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("848","1025","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("849","1026","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("850","1027","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("851","1028","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("852","1029","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("853","1030","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("854","1031","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("855","1032","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("856","1033","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("857","1034","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("858","1035","47","83","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("859","1036","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("860","1037","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("861","1038","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("862","1039","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("863","1040","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("864","1041","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("865","1042","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("866","1043","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("867","1044","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("868","1045","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("869","1046","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("870","1047","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("871","1048","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("872","1049","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("873","1050","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("874","1051","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("875","1052","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("876","1053","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("877","1054","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("878","1055","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("879","1056","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("880","1057","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("881","1058","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("882","1059","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("883","1060","47","90","10","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("884","1061","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("885","1062","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("886","1063","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("887","1064","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("888","1065","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("889","1066","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("890","1067","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("891","1068","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("892","1069","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("893","1070","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("894","1071","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("895","1072","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("896","1073","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("897","1074","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("898","1075","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("899","1076","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("900","1077","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("901","1078","47","90","10","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("902","1079","47","90","11","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("903","1080","47","90","11","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("904","1081","47","90","11","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("905","1082","47","90","11","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("906","1083","47","90","11","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("907","1084","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("908","1085","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("909","1086","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("910","1087","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("911","1088","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("912","1089","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("913","1090","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("914","1091","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("915","1092","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("916","1093","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("917","1094","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("918","1095","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("919","1096","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("920","1097","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("921","1098","47","90","11","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("922","1099","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("923","1100","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("924","1101","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("925","1102","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("926","1103","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("927","1104","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("928","1105","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("929","1106","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("930","1107","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("931","1108","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("932","1109","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("933","1110","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("934","1111","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("935","1112","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("936","1113","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("937","1114","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("938","1115","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("939","1116","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("940","1117","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("941","1118","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("942","1119","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("943","1120","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("944","1121","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("945","1122","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("946","1123","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("947","1124","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("948","1125","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("949","1126","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("950","1127","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("951","1128","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("952","1129","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("953","1130","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("954","1131","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("955","1132","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("956","1133","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("957","1134","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("958","1135","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("959","1136","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("960","1137","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("961","1138","47","90","12","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("962","1139","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("963","1140","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("964","1141","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("965","1142","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("966","1143","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("967","1144","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("968","1145","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("969","1146","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("970","1147","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("971","1148","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("972","1149","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("973","1150","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("974","1151","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("975","1152","47","90","12","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("976","1153","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("977","1154","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("978","1155","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("979","1156","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("980","1157","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("981","1158","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("982","1159","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("983","1160","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("984","1161","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("985","1162","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("986","1163","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("987","1164","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("988","1165","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("989","1166","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("990","1167","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("991","1168","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("992","1169","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("993","1170","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("994","1171","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("995","1172","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("996","1173","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("997","1174","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("998","1175","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("999","1176","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1000","1177","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1001","1178","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1002","1179","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1003","1180","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1004","1181","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1005","1182","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1006","1183","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1007","1184","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1008","1185","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1009","1186","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1010","1187","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1011","1188","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1012","1189","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1013","1190","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1014","1191","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1015","1192","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1016","1193","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1017","1194","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1018","1195","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1019","1196","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1020","1197","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1021","1198","47","90","13","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1022","1199","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1023","1200","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1024","1201","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1025","1202","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1026","1203","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1027","1204","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1028","1205","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1029","1206","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1030","1207","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1031","1208","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1032","1209","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1033","1210","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1034","1211","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1035","1212","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1036","1213","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1037","1214","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1038","1215","47","90","13","43","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1039","1216","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1040","1217","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1041","1218","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1042","1219","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1043","1220","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1044","1221","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1045","1222","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1046","1223","47","90","14","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1047","1224","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1048","1225","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1049","1226","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1050","1227","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1051","1228","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1052","1229","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1053","1230","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1054","1231","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1055","1232","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1056","1233","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1057","1234","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1058","1235","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1059","1236","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1060","1237","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1061","1238","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1062","1239","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1063","1240","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1064","1241","47","90","14","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1065","1242","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1066","1243","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1067","1244","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1068","1245","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1069","1246","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1070","1247","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1071","1248","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1072","1249","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1073","1250","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1074","1251","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1075","1252","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1076","1253","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1077","1254","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1078","1255","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1079","1256","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1080","1257","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1081","1258","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1082","1259","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1083","1260","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1084","1261","47","89","15","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1085","1262","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1086","1263","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1087","1264","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1088","1265","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1089","1266","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1090","1267","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1091","1268","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1092","1269","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1093","1270","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1094","1271","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1095","1272","47","89","15","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1096","1273","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1097","1274","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1098","1275","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1099","1276","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1100","1277","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1101","1278","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1102","1279","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1103","1280","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1104","1281","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1105","1282","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1106","1283","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1107","1284","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1108","1285","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1109","1286","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1110","1287","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1111","1288","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1112","1289","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1113","1290","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1114","1291","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1115","1292","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1116","1293","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1117","1294","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1118","1295","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1119","1296","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1120","1297","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1121","1298","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1122","1299","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1123","1300","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1124","1301","47","89","15","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1125","1302","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1126","1303","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1127","1304","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1128","1305","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1129","1306","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1130","1307","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1131","1308","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1132","1309","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1133","1310","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1134","1311","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1135","1312","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1136","1313","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1137","1314","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1138","1315","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1139","1316","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1140","1317","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1141","1318","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1142","1319","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1143","1320","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1144","1321","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1145","1322","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1146","1323","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1147","1324","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1148","1325","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1149","1326","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1150","1327","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1151","1328","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1152","1329","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1153","1330","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1154","1331","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1155","1332","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1156","1333","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1157","1334","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1158","1335","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1159","1336","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1160","1337","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1161","1338","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1162","1339","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1163","1340","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1164","1341","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1165","1342","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1166","1343","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1167","1344","47","86","16","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1168","1345","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1169","1346","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1170","1347","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1171","1348","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1172","1349","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1173","1350","47","86","16","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1174","1351","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1175","1352","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1176","1353","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1177","1354","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1178","1355","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1179","1356","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1180","1357","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1181","1358","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1182","1359","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1183","1360","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1184","1361","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1185","1362","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1186","1363","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1187","1364","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1188","1365","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1189","1366","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1190","1367","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1191","1368","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1192","1369","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1193","1370","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1194","1371","47","86","16","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1195","1372","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1196","1373","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1197","1374","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1198","1375","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1199","1376","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1200","1377","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1201","1378","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1202","1379","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1203","1380","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1204","1381","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1205","1382","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1206","1383","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1207","1384","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1208","1385","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1209","1386","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1210","1387","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1211","1388","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1212","1389","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1213","1390","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1214","1391","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1215","1392","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1216","1393","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1217","1394","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1218","1395","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1219","1396","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1220","1397","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1221","1398","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1222","1399","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1223","1400","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1224","1401","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1225","1402","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1226","1403","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1227","1404","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1228","1405","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1229","1406","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1230","1407","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1231","1408","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1232","1409","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1233","1410","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1234","1411","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1235","1412","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1236","1413","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1237","1414","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1238","1415","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1239","1416","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1240","1417","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1241","1418","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1242","1419","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1243","1420","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1244","1421","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1245","1422","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1246","1423","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1247","1424","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1248","1425","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1249","1426","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1250","1427","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1251","1428","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1252","1429","47","84","17","43","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1253","1430","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1254","1431","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1255","1432","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1256","1433","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1257","1434","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1258","1435","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1259","1436","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1260","1437","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1261","1438","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1262","1439","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1263","1440","47","84","17","42","4","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1264","1441","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1265","1442","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1266","1443","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1267","1444","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1268","1445","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1269","1446","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1270","1447","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1271","1448","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1272","1449","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1273","1450","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1274","1451","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1275","1452","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1276","1453","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1277","1454","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1278","1455","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1279","1456","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1280","1457","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1281","1458","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1282","1459","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1283","1460","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1284","1461","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1285","1462","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1286","1463","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1287","1464","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1288","1465","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1289","1466","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1290","1467","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1291","1468","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1292","1469","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1293","1470","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1294","1471","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1295","1472","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1296","1473","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1297","1474","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1298","1475","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1299","1476","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1300","1477","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1301","1478","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1302","1479","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1303","1480","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1304","1481","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1305","1482","47","84","17","42","5","0000-00-00","0","مستمر");
INSERT INTO stu_acadimi VALUES("1306","1302","47","86","16","43","4","2018-09-01","0","مستمر");



DROP TABLE stu_info;

CREATE TABLE `stu_info` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `StuName` varchar(300) NOT NULL,
  `stu_num` varchar(100) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `Natinality` varchar(100) NOT NULL,
  `StuAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contry` varchar(100) NOT NULL,
  `Phones` varchar(100) NOT NULL,
  `stu_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1483 DEFAULT CHARSET=utf8;

INSERT INTO stu_info VALUES("1036","أحمد محمود جامع ","4","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1037","بشير أحمد عبد الرحمن","7","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1038","حسن إبراهيم حاج ديريه","8","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1039","حمزة جامع علمي","10","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1040","خالد آدم سليمان","11","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1041","زكريا ياسين آدم","12","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1042","عبد الرحمن محمد موسى","14","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1043","عبد الرزاق سليمان درر","15","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1044","عبد الرزاق نور يوسف","16","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1045","عبد الشكور خضر سعيد","17","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1046","عبد الفتاح يوسف دعالي","18","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1047","عبد القادر علي محمد","19","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1048","عبد الكريم محمد جامع","20","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1049","عدنان حسين عيديد","21","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1050","علي محمد سليمان ","22","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1051","علي محمد عبد الرحمن","23","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1052","فرحان يوسف علي","28","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1053","فيصل عثمان ورسمي","29","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1054","محمد حسن محمد","31","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1055","محمد سعيد أحمد","32","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1056","محمد عثمان محمد","33","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1057","محمد علي سعيد","34","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1058","محمد ياسين آدم","35","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1059","خالد عبدي جاس ورسمى","43","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1060","مختار حيس فارح عوض","44","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1061","إكرام علي شكري","2","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1062","أبح عول عبد الرحمن","3","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1063","أسماء حسين عيديد","5","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1064","أسماء عبدالرحمن موسى","6","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1065","حمده محمود حسين","9","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1066","سعاد علي محمد","13","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1067","فاطمة سعيد عرب","24","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1068","فائزة عبدالله ياسين","25","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1069","فائزة عثمان سليمان","26","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1070","فرح آدم ديريه","27","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1071","قطن حسين آدم","30","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1072","منى عمر محمد","36","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1073","منى عول داود","37","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1074","منى يوسف علمي","38","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1075","ندى مبارك عبدالله","39","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1076","نعمة عبدي جوليد","40","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1077","نعيمة أحمد محمد","41","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1078","نعيمة محمد إسماعيل","42","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1079","أحمد طاهر علي","46","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1080","سعيد موسى نوح","58","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1081","محمد بشير سعيد","65","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1082","محي الدين محمد جمعالى","66","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1083","مختار حسن ورسمى","67","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1084","أسماء علي عبد","47","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1085","حفصة حسين عيديد","48","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1086","حمده أحمد آدم","49","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1087","خضرة أحمد عبدالرحمن","50","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1088","خضرة جامع  حسين","51","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1089","زينب عبدالله دبّد","53","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1090","زينب يوسف إبراهيم","54","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1091","سامية حسن عبد","55","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1092","سامية سليمان آدم","56","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1093","صفية حسين عبد","59","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1094","آمال قاسم إبراهيم","61","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1095","فرح عبدالقادر عبدالله","62","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1096","فرح عبدالله حسن","63","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1097","كلثوم علي فارح","64","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1098","آسيا عبدالكريم حسن","45","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1099","أحمد سعيد محمود","68","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1100","أحمد عبد الرحمن جامع","69","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1101","أحمد عبد الرشيد أحمد","71","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1102","أحمد عول علي","74","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1103","أحمد عيد محمد جامع","73","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1104","أحمد محمد حسن يوسف","136","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1105","آدم محمد أحمد","78","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1106","جامع يوسف آدم","79","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1107","حسن إبراهيم فارح","80","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1108","حسن سعيد علي","81","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1109","حسين عول محمود","83","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1110","خالد محمود أحمد","84","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1111","زكريا عبد الكريم حسن","89","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1112","زيد حسن محمود","91","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1113","سعيد نور ديرية","93","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1114","شافعي حسن إبراهيم","94","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1115","عبد الجبار سعيد أحمد","96","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1116","عبد الرحمن يوسف آدم","100","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1117","عبد الرزاق يوسف جامع","101","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1118","عبد الرزاق يوسف عبد","102","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1119","عبد العزيز بلي إسماعيل","104","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1120","عبد العزيز عمر محمد","105","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1121","عبد الفتاح سعيد برى","106","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1122","عبد الكريم عبد الحكيم عبد الرزاق","107","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1123","عبد الله حرسي محمود","108","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1124","عبد الله عبد الرحمن موسى","110","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1125","عبد الله عثمان حسن","109","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1126","عبد النور محمود محمد","111","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1127","علي محمد علي","113","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1128","علي محمود عبد الله","114","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1129","فارح عبد الله محمود","115","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1130","فرحان مهدي أحمد","117","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1131","محمد جامع حسن","120","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1132","محمد سليمان أحمد","123","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1133","محمد نور حسن","124","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1134","محمد يوسف عبد","125","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1135","محمود محمد حيدلى","126","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1136","مرسل عبد الله دعالى","127","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1137","نور سعيد كاهن","131","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1138","ياسين موسى علي","135","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1139","أسد علي عبد","74","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1140","خديجة عابي دجالى","85","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1141","رقية حسن جامع","87","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1142","رقية علي سليمان","88","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1143","زينب علي طنبيل","92","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1144","عائشة إبراهيم موسى","95","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1145","فائزة سليمان درر","116","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1146","كوثر سليمان آدم","119","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1147","ميمونة سليمان محمود","128","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1148","نصرة عبد دعالى","75","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1149","نعمه علي سوطي","129","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1150","نورة حسين ديرية","132","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1151","نورة عبد علي","133","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1152","هدن حسين جامع","134","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1153","محمود إسماعيل عبد علي","188","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1154","محمود أحمد عبد الله","189","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1155","محمود عيسى أبوبكر","190","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1156","مصطفى حسن فارح","193","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1157","موسى خضر مرى","194","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1158","ناصر عبد الرحمن محمد","195","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1159","إبراهيم عبد محمد","145","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1160","أحمد إسماعيل جامع","164","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1161","أحمد حسن جامع","141","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1162","أحمد محمد حسن","142","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1163","أحمد محمد عرتن","143","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1164","أحمد يوسف محمد","144","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1165","آدم علمي إسماعيل","146","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1166","جامع صالح فارح","159","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1167","جامع محمد محمود","149","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1168","جوليد جامع حسين","150","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1169","حسن صالح موسى","158","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1170","حسن صلاد موسى","151","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1171","حسين سعيد علي","152","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1172","سعد سليمان حاج ياسين","160","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1173","سعيد عبد الله إبراهيم","162","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1174","سليمان صالح ديرية","163","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1175","شعبة عبد الله حاشي","165","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1176","صديق إسماعيل حاج علي","166","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1177","صلاد روبلى عبد حسن","137","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1178","عبد الرحمن جامع محمد","138","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1179","عبد الرحمن شافعي محمد","99","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1180","عبد الحكيم حسن فارح","167","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1181","عبد الرحمن إبراهيم محمد","168","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1182","عبد الرحمن خضر إسماعيل","169","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1183","عبد الرحمن عول سليمان","170","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1184","عبد الرحمن محمد سعيد","171","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1185","عبد الرحمن يوسف إسماعيل","172","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1186","عبد العزيز جامع عبد الله","173","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1187","عبد العزيز كيسى محمد","201","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1188","عبد القادر أحمد موسى","174","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1189","عبد الله إسماعيل أبو بكر","175","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1190","عبد الله محمد صالح","176","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1191","علي عبد السلام ديرية","177","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1192","عول عبد الله جامع","178","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1193","فارح حرسي يوسف","179","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1194","فرحان سليمان محمد","140","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1195","محمد إيمان محمد","184","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1196","محمد آدم أحمد","185","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1197","محمد حاج فارح عبد","186","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1198","محمد موسى عبد","187","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1199","إكرام حسين ديرية","139","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1200","آمنة جامع علوجوج","147","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1201","برواقو موسى عوض","148","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1202","حفصة أحمد محمد","153","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1203","حمدة أحمد محمود","154","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1204","حمدة حسين ديرية","155","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1205","خضرة علي عبد الرحمن","156","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1206","ديقة فارح عبد الرحمن","182","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1207","رحمة إبراهيم موسى","157","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1208","سعدة أحمد محمد","161","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1209","فاطمة حسين عبد","180","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1210","مريم سياد عثمان","192","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1211","نجح حسن إبراهيم","196","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1212","نعيمة كيسى عبد الله","198","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1213","هند أحمد محمد","199","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1214","هند عول داود","200","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1216","إبراهيم عبد الله ورسمه","205","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1217","جامع عبد الله إسماعيل","213","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1218","شافعي علي حاج نور ","221","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1219","عبد الغني جوليد إسماعيل","224","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1220","عبد الله يوسف إيدلى","226","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1221","عبدالمالك محمود عبد الله","227","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1222","محمد سعيد عوض","233","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1223","إبراهيم يوسف محمد","206","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1224","أسماء علي محمد","208","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1225","عائشة عبد الرحمن محمد","223","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1226","آسيه علي محمد","210","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1227","آسيه محمد محمود","211","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1228","آمال إسماعيل علي","212","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1229","مريم عبد الرحمن محمد","234","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1230","خضرة آدم عبدالله","215","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1231","روضة ديرية يوسف","216","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1232","زينب إسماعيل يوسف","218","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1233","زينب علي سليمان","219","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1234","زينب فيصل سعيد","220","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1235","فاطمة إيمان محمد","228","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1236","فاطمة أحمد موسى","229","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1237","نورة عبدالرزاق آدم","239","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1238","فاطمة سعيد جامع","232","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1239","ميمون سعيد جامع","236","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1240","نعيمة آدم عثمان","237","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1241","أيان محمود علي","214","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1242","يوسف عبدالرحمن أبشر","258","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1243","سعيد سمتر يوسف","264","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1244","عبد الصمد حسن عبد تمر","274","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1245","عبد الله جامع محمود موسى","275","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1246","فرحان جامع إبراهيم","282","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1247","فيصل أحمد عول","284","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1248","محمد عبد الله عبدي","289","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1249","محمد عبد الله دعالى","311","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1250","محمد عبدالرحمن موسى","290","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1251","محمود عبد الرحمن ديريه","291","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1252","مختار محمد علمي","293","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1253","مصطفى علمي عرتن","295","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1254","عبد الرحمن نور أحمد","300","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1255","محمد إبراهيم يوسف","288","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1256","محمود عيسى أبكر","190","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1257","طاهر عبد الله جامع ","318","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1258","عثمان أحمد جيدي","112","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1259","نوح أحمد محمد","319","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1260","عبد الله جامع محمود علي","320","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1261","مرسل إسماعيل عبد الله","321","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1262","أسامة عبد الكريم حسن","306","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1263","عبد الله حسين عبدي","305","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1264","مبارك أحمد محمد","287","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1265","عبدالرحيم إبراهيم علي","273","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1266","فيصل فرحان عرب","285","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1267","حمزة خضر إسماعيل","309","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1268","زكريا عبدي يوسف","260","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1269","زكريا أحمد عبد الرحمن","316","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1270","عبد الغني عبد الله علمي","225","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1271","عبد الله أحمد موسى","241","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1272","محمود شيخ جامع عثمان","245","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1273","إقرء سليمان عبدى","242","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1274","ياسمين حسين عيديد","304","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1275","آمنة سعيد محمد","248","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1276","آمنة محمد ياسين","249","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1277","حفصة دعالي حسن","251","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1278","حفصة سليمان محمود","252","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1279","نفيسة حسن ياسين إبراهيم","302","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1280","حمده عبد الحكيم عبد الله","255","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1281","حمده عثمان محمد","256","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1282","سلمى محمد موسى","267","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1283","سباد عبد الرحمن أسكر","259","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1284","زمزم فارح عوالى","261","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1285","زينب سعيد محمود","263","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1286","سلمى سعد أبكر","266","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1287","سمية حسن طاهر","268","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1288","سميرة سليمان سرمان","269","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1289","شكري حاشى سليمان","270","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1290","إيدوا سليمان جامع","277","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1291","فتحة علي جامع","279","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1292","فردوس حسن عبد الرحمن","283","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1293","كينسى أحمد جامع","286","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1294","نفسية عثمان أحمد","301","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1295","مكة سليمان باشى","296","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1296","منى عمر إبراهيم","298","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1297","نهدية حسين عيديد","303","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1298","صفية علي سليمان","272","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1299","فتحة عبد الرحمن عيد","278","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1300","فرح محمد عبد الله","281","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1301","هدن صالح حسين","243","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1302","إبراهيم آدم عبد الله","405","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1303","أحمد إسماعيل علي","385","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1304","أحمد عثمان محمود","394","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1305","أحمد علي سليمان","323","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1306","جامع إسماعيل سجلي","407","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1307","حمزة عبد الكريم حسن","415","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1308","حمزة علي روبلي","331","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1309","حمزة كيسي عمر","384","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1310","زكريا سعيد يوسف","332","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1311","سعيد محمد ياسين","335","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1312","شافعي موسي عبد","336","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1313","عبد الحكيم نور سليمان","340","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1314","عبد الرحمن سليمان فارح جامع","417","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1315","عبد الرحمن علمي عثمان","339","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1316","عبد الرحمن محمد سليمان","381","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1317","عبد الرحمن نور شكري","382","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1318","عبد الصمد محمد محمود","386","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1319","عبد العزيز جمال عبد الله","342","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1320","عبد العزيز علي محمد","343","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1321","عبد الغني سليمان عبد الله","372","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1322","عبد الفتاح أحمد جامع","345","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1323","عبد الله عبد الرزاق محمد","346","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1324","عبد الله علي سليمان","347","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1325","عبد الله كيسي محمود","348","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1326","عبد الله محمد آدم","392","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1327","عبد الودود علي عثمان","413","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1328","عبد الوهاب سعيد أحمد","349","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1329","عمر عبد دعالي","387","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1330","محمد آدم علي","354","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1331","محمد سعيد يوسف","355","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1332","محمد فارح عبد الله","404","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1333","مختار عبد الله إبراهيم","380","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1334","يوسف عبد عوض","363","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1335","محمد إبراهيم عبد الرحمن","353","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1336","محمد برالى فارح","396","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1337","محمد جامع عبد","344","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1338","إسماعيل نوح علي","337","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1339","حسين طاهر فارح","389","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1340","سليمان إبراهيم برى","408","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1341","عبد العزيز إبراهيم عيسى","401","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1342","أحمد علي دعالي","400","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1343","عبدالباسط عبدالحكيم عبدالرزاق","338","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1344","عبدالرحمن سليمان فارح","371","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1345","إبراهيم جامع حسن","374","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1346","عبدالحكيم فارح محمود","377","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1347","علي طاهر عابي","350","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1348","رشيد آدم كاهن","410","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1349","محمد عبدالنور محمد","357","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1350","مختار عبد عثمان","397","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1351","إحسان أحمد إبراهيم","369","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1352","أسماء دعالي محمد","391","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1353","أسماء سليمان جامع","406","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1354","أسماء مصطفى سهل","325","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1355","آمنة حسين عثمان","327","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1356","آمنة عبدالرحمن حسن","328","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1357","بشرى آدم فارح","390","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1358","بهجة سليمان خيري","329","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1359","جويرية أحمد إبراهيم","368","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1360","حمدة محمد عبدالله","330","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1361","سباد عبد ديرية","334","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1362","سجل عبد الله ورسمى","366","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1363","فاطمه أحمد محمد","370","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1364","فائزة ياسين أحمد","352","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1365","ليلى أحمد محمد","375","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1366","مريم فارح إسماعيل","358","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1367","نمعة أحمد علي","359","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1368","نجمة إبراهيم أمل","324","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1369","هدن سادات محمد","360","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1370","هودة سادات محمد","361","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1371","وردة عبدالسلام حسين","362","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1372","إبراهيم عبد أحمد","478","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1373","إبراهيم يوسف محمد","500","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1374","إسماعيل أحمد أيانلي","418","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1375","أحمد إسماعيل عوض","419","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1376","أحمد جامع أحمد","420","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1377","أحمد سعيد حسين","468","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1378","أحمد محمود يوسف","469","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1379","أحمد يوسف عثمان","479","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1380","آدم محمد فارح","529","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1381","جامع أحمد يوسف","425","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1382","جامع عبد أحمد","537","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1383","جامع عبد عبد الله","544","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1384","حمزة إبراهيم عبد الله","429","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1385","خالد أحمد يوسف","430","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1386","خالد عثمان علي","484","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1387","زكريا أحمد محمد","507","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1388","زكريا عثمان حسن","485","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1389","سليمان عبد إسماعيل","503","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1390","شافعي آدم جامع","373","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1391","صالح سعيد جامع","470","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1392","عبد الباري عمر جامع","538","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1393","عبد الحميد عمر جامع","539","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1394","عبد الرحمن جامع عيديد","440","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1395","عبد الرحمن جامع آدم","489","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1396","عبد الرزاق إبراهيم عثمان","443","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1397","عبد العزيز آدم مري","477","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1398","عبد العزيز جامع حسن","446","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1399","عبد العزيز محمود محمد","499","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1400","عبد الغني صلاد إسماعيل ","434","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1401","عبد الغني علي عوض","447","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1402","عبد اللطيف عبد الله محمد","527","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1403","عبد الله آدم يوسف","490","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1404","عبد الله عبد الكريم جامع","449","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1405","عبد الله علي جامع","450","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1406","عبد الله محمد إبراهيم","451","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1407","عبد الله محمد إسماعيل","520","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1408","عبد النور إبراهيم نور","452","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1409","عبدالحكيم سعيد جامع","453","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1410","علمي محمد عبد الله","454","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1411","عمر عبد الرحمن موسى","516","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1412","عيدروس عبد الرحمن فارح","491","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1413","محمد إسماعيل محمد عبد","522","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1414","محمد أحمد عبد","458","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1415","محمد أحمد عبد الله","459","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1416","محمد عبد الله بلي","523","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1417","محمد عبد الله شور","536","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1418","محمود حسن عجي","543","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1419","مختار محمد عبد الله","462","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1420","مصطفى حسين أحمد","494","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1421","مصطفى عبد الرحمن جامع","542","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1422","ناصر علي محمد","495","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1423","ياسين جامع محمد","466","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1424","ياسين فارح إبراهيم","467","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1425","يوسف حسن موسى ","498","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1426","يوسف علي نور","426","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1427","عبد الرحمن صالح دعالي","441","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1428","عيسي كيسي محمد","455","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1429","حمزة عمر عبد","525","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1430","أحمد محمد شعيب","421","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1431","جامع عبد إسماعيل","501","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1432","زكريا عبد السلام عثمان","399","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1433","سعيد عثمان طاهر","435","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1434","عبد الرحمن عبد الله عول","442","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1435","عبد الرحمن محمود سمتر","488","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1436","عبد الله أحمد عجي","448","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1437","محمد إسماعيل حسن","531","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1438","محمد عبد آدم","460","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1439","يحيى عبدالرحمن حاشي","528","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1440","يوسف خضر جامع","471","","4","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1441","إفراح علي محمد","505","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1442","أسماء عثمان محمد","472","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1443","أم الخير عبد الرزاق يوسف","497","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1444","آسية إسماعيل أو علي","422","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1445","آسية حسين عبد ","512","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1446","آمنة حرسي باشي","480","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1447","آمنة عبد الله محمد","515","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1448","بشرى علي محمد","423","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1449","بصرة عبد الصمد يوسف","424","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1450","بلن عثمان جامع","481","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1451","برواقو محمود جامع","496","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1452","جميلة حرير عبد الله","427","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1453","حفصة أحمد محمد ديرية","530","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1454","حفصة سعيد عبد","540","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1455","حفصة فارح علي آدم","482","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1456","حمدة عبدالرزاق محمد","428","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1457","حمدة كيسي جامع","509","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1458","خضرة حسن نور","534","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1459","خضرة محمد آدم","431","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1460","روضة فارح محمد","545","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1461","سامية محمد علي","432","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1462","سامية محمد يوسف","486","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1463","سجل حسين عبد الرحمن","541","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1464","سعاد محمد إبراهيم","433","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1465","سعدة سعيد أحمد","474","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1466","شادية محمد عبد الله دبد","437","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1467","صفية ياسين حسن","438","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1468","صفية يوسف محمد","504","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1469","عائشة حسين عبد ","511","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1470","عائشة يوسف موسى","535","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1471","فاطمة سعيد أحمد","475","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1472","فرح حسن جامع","518","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1473","كوثر سعيد أحمد","473","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1474","مارية أحمد إبراهيم","457","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1475","مارية قاسم أحمد","493","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1476","منى جامع موسى","532","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1477","منى محمد موسى","508","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1478","نجح يوسف أحمد","463","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1479","نعيمة نوح جامع حريد","464","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1480","نمعة نور محمد","517","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1481","نورة حسن يوسف","521","","5","0000-00-00","","","","","","","","");
INSERT INTO stu_info VALUES("1482","نورة عبد الله فارح","465","","5","0000-00-00","","","","","","","","");



DROP TABLE stu_info_chk;

CREATE TABLE `stu_info_chk` (
  `StuNum` varchar(100) NOT NULL,
  `StuName` varchar(300) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `Natinality` varchar(100) NOT NULL,
  `StuAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contry` varchar(100) NOT NULL,
  `Phones` varchar(100) NOT NULL,
  `relname` varchar(100) NOT NULL,
  `reltype` varchar(100) NOT NULL,
  `reldigree` varchar(100) NOT NULL,
  `relphones` varchar(100) NOT NULL,
  `Ctype` varchar(100) NOT NULL,
  `CYear` varchar(100) NOT NULL,
  `Cschool` varchar(100) NOT NULL,
  `CLanuage` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `stuGroup` int(11) NOT NULL,
  `StuLevel` int(11) NOT NULL,
  `stu_pic` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE stu_infos;

CREATE TABLE `stu_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StuNum` varchar(100) NOT NULL,
  `StuName` varchar(300) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `Natinality` varchar(100) NOT NULL,
  `StuAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contry` varchar(100) NOT NULL,
  `Phones` varchar(100) NOT NULL,
  `relname` varchar(100) NOT NULL,
  `reltype` varchar(100) NOT NULL,
  `reldigree` varchar(100) NOT NULL,
  `relphones` varchar(100) NOT NULL,
  `Ctype` varchar(100) NOT NULL,
  `CYear` varchar(100) NOT NULL,
  `Cschool` varchar(100) NOT NULL,
  `CLanuage` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `stuGroup` int(11) NOT NULL,
  `StuLevel` int(11) NOT NULL,
  `stu_pic` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE subject;

CREATE TABLE `subject` (
  `sub_id` int(6) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `prog_id` int(100) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=339 DEFAULT CHARSET=utf8;

INSERT INTO subject VALUES("316","القرآن الكريم","","47","1");
INSERT INTO subject VALUES("317","الفقه ","","47","1");
INSERT INTO subject VALUES("318","أصول الفقه ","","47","1");
INSERT INTO subject VALUES("319","النحو ","","47","1");
INSERT INTO subject VALUES("320","السيرة النبوية","","47","1");
INSERT INTO subject VALUES("321","تاريخ التشريع ","","47","1");
INSERT INTO subject VALUES("322","العقيدة ","","47","1");
INSERT INTO subject VALUES("323","الحديث ","","47","1");
INSERT INTO subject VALUES("324","التفسير ","","47","1");
INSERT INTO subject VALUES("325","المصطلح","","47","1");
INSERT INTO subject VALUES("326","حاضر العالم الإسلامي","","47","1");
INSERT INTO subject VALUES("327","أصول الدعوة","","47","1");
INSERT INTO subject VALUES("328","الفرائض","","47","1");
INSERT INTO subject VALUES("329","أصول التربية","","47","1");
INSERT INTO subject VALUES("330","القضاء في الإسلام ","","47","1");
INSERT INTO subject VALUES("331","تاريخ القضاء","","47","1");
INSERT INTO subject VALUES("332","الإقتصاد الإسلامي","","47","1");
INSERT INTO subject VALUES("333","مناهج البحث","","47","1");
INSERT INTO subject VALUES("334","المقاصد الشرعية","","47","1");
INSERT INTO subject VALUES("335","الفرق والأديان","","47","1");
INSERT INTO subject VALUES("336","القواعد الفقهية ","","47","1");
INSERT INTO subject VALUES("337","السياسة الشرعية","","47","1");
INSERT INTO subject VALUES("338","البحث","","47","1");



DROP TABLE subjectlevel;

CREATE TABLE `subjectlevel` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `subject_name` int(6) NOT NULL,
  `level_name` int(6) NOT NULL,
  `active` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE tem_examss;

CREATE TABLE `tem_examss` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stu_num` mediumtext DEFAULT NULL,
  `qu1` int(6) DEFAULT NULL,
  `as1` int(6) DEFAULT NULL,
  `ex1` int(6) DEFAULT NULL,
  `qu2` int(6) DEFAULT NULL,
  `as2` int(6) DEFAULT NULL,
  `ex2` int(6) DEFAULT NULL,
  `att` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3465 DEFAULT CHARSET=utf8;




DROP TABLE todo;

CREATE TABLE `todo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `topic` text NOT NULL,
  `user` int(5) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE tra_cou;

CREATE TABLE `tra_cou` (
  `tra_cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `tra_cou_title` varchar(200) NOT NULL,
  `tra_cou_date` date NOT NULL,
  `tra_cou_est` varchar(200) NOT NULL,
  `tra_cou_due` varchar(100) NOT NULL,
  PRIMARY KEY (`tra_cou_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE users;

CREATE TABLE `users` (
  `usrid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `active` varchar(11) NOT NULL,
  PRIMARY KEY (`usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO users VALUES("11","admin","gadhyare3@gmail.com","c4ca4238a0b923820dcc509a6f75849b","0000-00-00","manager","1");



