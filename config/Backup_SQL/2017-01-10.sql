SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `takeyourleave`
--




CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `comp_id` (`comp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE,
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO admin VALUES
("5","Tr001","11");




CREATE TABLE `apply_leave` (
  `apply_leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(50) NOT NULL,
  `leave_id` int(11) DEFAULT NULL,
  `leave_priority` varchar(50) DEFAULT NULL,
  `apply_date` varchar(10) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `recommandBy` varchar(50) DEFAULT NULL,
  `special_note` text,
  `medical_status` varchar(50) DEFAULT NULL,
  `seen` int(11) DEFAULT '0',
  PRIMARY KEY (`apply_leave_id`),
  KEY `comp_id(change)` (`comp_id`(4)),
  KEY `leave_priority` (`leave_priority`),
  KEY `leave_priority_2` (`leave_priority`),
  KEY `leave_id` (`leave_id`),
  KEY `apply_leave_ibfk_1` (`comp_id`),
  CONSTRAINT `apply_leave_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;


INSERT INTO apply_leave VALUES
("4","Tr003","1","medium","13/09/2016","28/09/2016","28/09/2016","1","Sick","recommended","S.M. Samarainghe","","","0"),
("5","Tr005","1","medium","13/09/2016","23/09/2016","23/09/2016","1","Sick","canceled","Sajini Koongahawattage","","no","1"),
("6","Tr006","1","high","09/12/2016","10/12/2016","10/12/2016","2","Sick","approved","Sajini Koongahawattage","","no","1"),
("7","Tr005","6","medium","13/09/2016","20/10/2016","21/10/2016","1","Trip","rejected","Sajini Koongahawattage","","","1"),
("8","Tr005","3","high","13/09/2016","22/09/2016","23/09/2016","1","Sick","approved","Sajini Koongahawattage","","done","1"),
("9","Tr005","2","low","13/09/2016","09/10/2016","10/10/2016","2","Personal Issue","approved","Sajini Koongahawattage","","pending","1"),
("10","Tr005","1","high","13/09/2016","28/10/2016","29/10/2016","1","Personal Issue","canceled","","","","1"),
("11","Tr014","1","medium","13/09/2016","20/10/2016","21/10/2016","1","Personal Issue","approved","Sajini Koongahawattage","","no","0"),
("12","Tr007","1","low","13/09/2016","28/09/2016","30/09/2016","2","Personal Isue","approved","Gothami Karunarathne","","no","0"),
("13","Tr015","2","low","13/09/2016","01/10/2016","02/10/2016","1","Personal Issue","approved","Sajini Koongahawattage","","no","0"),
("14","Tr005","3","high","13/09/2016","11/10/2016","12/10/2016","1","Sick","approved","Sajini Koongahawattage","","pending","1"),
("15","Tr005","1","medium","13/09/2016","27/09/2016","29/09/2016","2","Personal Issue","approved","Sajini Koongahawattage","","no","1"),
("16","Tr005","1","low","13/09/2016","29/09/2016","30/09/2016","1","Personal Issue","canceled","","","","1"),
("17","Tr005","2","high","11/10/2016","26/10/2016","27/10/2016","2","xcdfsf","approved","Sajini Koongahawattage","","done","1"),
("18","Tr005","2","high","03/12/2016","16/12/2016","05/12/2016","2","sa","approved","Sajini Koongahawattage","","done","1"),
("19","Tr005","2","high","03/12/2016","04/12/2016","05/12/2016","1","None","approved","Sajini Koongahawattage","","pending","1"),
("20","Tr005","1","high","05/12/2016","08/12/2016","16/12/2016","8","nn","approved","Sajini Koongahawattage","","no","0"),
("21","Tr004","2","high","08/12/2016","08/12/2016","09/12/2016","2","sad","canceled","Sajini Koongahawattage","","","1"),
("22","Tr005","2","medium","08/12/2016","09/12/2016","09/12/2016","1","for wedding","canceled","Sajini Koongahawattage","","","0"),
("23","Tr005","2","high","08/01/2017","09/01/2017","11/01/2017","2","Sick","canceled","","","no","0"),
("24","Tr006","1","medium","08/01/2017","09/01/2017","11/01/2017","3","Una Hedenwa","approved","Sajini Koongahawattage","","no","0"),
("25","Tr006","1","medium","08/01/2017","09/01/2017","12/01/2017","4","Sick","waiting","","","","0"),
("26","Tr005","2","high","08/01/2017","09/01/2017","11/01/2017","2","Sick","canceled","Sajini Koongahawattage","","no","1"),
("27","Tr005","2","high","08/01/2017","18/01/2017","20/01/2017","2","Private reason","waiting","","","","0");




CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(11) NOT NULL,
  `event_color` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `comp_id` varchar(50) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `comp_id(change)` (`comp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;


INSERT INTO calendar VALUES
("5","Holiday","2016-09-22","2016-09-22","#3498db","Holiday for every employee","0","Tr001"),
("6","Manager Meeting","2016-09-04","2016-09-04","#3498db","All the managers should come to the meeting","0","Tr001"),
("7","Poya Day","2016-09-25","2016-09-25","#3498db","Holiday of the company","0","Tr001"),
("8","Festival Season","2016-09-08","2016-09-11","#3498db","Have a fun","0","Tr001"),
("10","Annual Trip","2016-09-04","2016-09-07","gold","Famil Trip","#","Tr003"),
("11","General Meeting","2016-09-16","2016-09-18","#008000","Meeting of the month","11","Tr003"),
("12","Meeting","2016-09-18","2016-09-18","#008000","Meeting of the month","11","Tr003"),
("13","Family Trip","2016-09-09","2016-09-11","gold","Family Trip","#","Tr005"),
("14","Amma\'s BirthDay","2016-09-18","2016-09-19","gold","","#","Tr005"),
("15","dscsd","2016-10-26","2016-10-27","#3498db","cscds","0","Tr001"),
("16","asas","2016-10-10","2016-10-12","#3498db","sasasasa","0","Tr001"),
("17","WWW","2016-11-29","2016-11-29","gold","dasdasdasd","#","Tr005"),
("18","General Meeting","2017-01-18","2017-01-18","#3498db","All the employees must to attend","0","Tr001");




CREATE TABLE `conversation` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(50) NOT NULL DEFAULT '0',
  `receiver_id` varchar(50) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `send_date` varchar(50) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;


INSERT INTO conversation VALUES
("60","Tr003","Tr002","Hello","13/09/2016","0"),
("61","Tr005","Tr001","xcvxvx","11/10/2016","1"),
("62","Tr003","Tr001","hhaha","08/11/2016","1"),
("63","Tr001","Tr004","Hello","30/11/2016","1"),
("64","Tr005","Tr001","DEDE","1/12/2016","1"),
("65","Tr001","Tr011","Hello","08/12/2016","1");




CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `no_of_emp` int(11) NOT NULL,
  `dept_color` varchar(50) NOT NULL,
  `roster_status` varchar(20) NOT NULL,
  `currentStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


INSERT INTO department VALUES
("11","HR Department","8","#008000","NO","approved"),
("12","Finance Department","4","#0000ff","NO","approved"),
("13","IT Department","4","#ff8000","NO","approved"),
("14","Server Department","8","#f4fa1f","YES","approved"),
("15","Security Department","0","#000000","YES","rejected"),
("16","Server Room Department","5","#808080","YES","approved");




CREATE TABLE `director` (
  `director_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(20) NOT NULL,
  PRIMARY KEY (`director_id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `director_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO director VALUES
("2","Tr002");




CREATE TABLE `employee` (
  `comp_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel_no` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `job_cat_id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`comp_id`),
  KEY `job_cat_id` (`job_cat_id`),
  KEY `level_id` (`level_id`),
  KEY `group_id` (`group_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO employee VALUES
("Tr001","Sajitha Liyanage","943423547V","male","sajithaliyanage@gmail.com","$2y$10$S0hu6vLpkXEWXecvx/Q35.EFoy/45Pu9uB0gMboA8tun6L0rtZJNK","0716849672","../uploads/profilePicture/Tr001/profile.png","2","1","0","11"),
("Tr002","Sulochana Kodituwakku","907548659V","male","sajithaliyanage@gmail.com","$2y$10$hEJE8pkERFKmDZvQ5/P0a.FVE.UB6ofHTOJv/LIJ0tip.a62fo0vq","0716849672","../uploads/profilePicture/Tr002/profile.png","1","1","0","11"),
("Tr0020","Methmal Prabanjana","940290448V","male","methmal@gmail.com","$2y$10$KCf6qaF6U4OCz8J/N/LxeOXMA8Lq492yKvWczAaV1L35YKR6DJwQa","0719563289","null","2","1","1","14"),
("Tr003","S.M. Samarainghe","675236981V","male","sajithaliyanage@gmail.com","$2y$10$RKa41WAN/lZQ889AO3qiDuNml71tQ6hxRK2tbGE5lWtLdAn/ke2Ii","0716849672","../uploads/profilePicture/Tr003/profile.jpg","1","1","0","11"),
("Tr004","Sajini Koongahawattage","902364587V","female","sajithaliyanage@gmail.com","$2y$10$TL4HlYu7J.2QdX9Wu7dA3.8jc7d5GnZ7nB8aZE3vgbRwPco3ryVl.","0716849672","../uploads/profilePicture/Tr004/profile.jpg","1","1","0","11"),
("Tr005","Umesh Jayasinghe","943323547V","male","sajithaliyanage@gmail.com","$2y$10$DksDUHccDe8JtJfKA793q.7VfK.Fz8NGFW3vcSynttbGBb8f1.ml.","0716849672","../uploads/profilePicture/Tr005/profile.jpg","3","1","0","11"),
("Tr006","Madhusha Ushan","902364587V","male","sajithaliyanage@gmail.com","$2y$10$NQ3U.AOW3IQsexhtLy2/NeC6UH.cRnv0N8ankxWwF3N21J3ii2hl6","0716849672","null","5","2","0","11"),
("Tr007","Gothami Karunarathne","943323547V","female","sajithaliyanage@gmail.com","$2y$10$N1KezglFJl9mB2ciOajv5OMUzVoqJdDE0c.0tjD54ewvUzCUv9RkG","0716849672","null","2","1","0","12"),
("Tr010","Nilaksha Deemantha","907548659V","male","sajithaliyanage@gmail.com","$2y$10$x35UVhzCyoobqKJg.6LsseybVp/.GzRw/QhxVmvRlocCTcU4ayCFa","0716849672","null","5","2","0","13"),
("Tr011","Kasun Lakmal","675236981V","male","sajithaliyanage@gmail.com","$2y$10$5z.Ki6OCjtSR3KWwadqgx.ukEfp3/EaO3p26iraSRid00tReYyPF.","0716849672","null","1","1","1","14"),
("Tr012","Ishika Godage","943423547V","male","sajithaliyanage@gmail.com","$2y$10$LVp4cCsNi2u8KH9ypPQ.W.hNE2neUJKAtVW2pVcLUKHxIygm7ovKm","0716849672","null","3","2","5","16"),
("Tr013","Wishwa Sudantha","943423547V","male","sajithaliyanage@gmail.com","$2y$10$1g8I5o3Wi.5t09L5CzcEBObTcwqMDIvGzmGkna4F9hhDst9q8E4rC","0716849672","null","3","2","1","14"),
("Tr014","Sandunika Dissanayake","943423547V","female","sajithaliyanage@gmail.com","$2y$10$UO9quEckOdv6DwsNCkIrSOqt6.fHnQTt55z5QfAvun6UokWkYNvjm","0716849672","null","1","1","0","11"),
("Tr015","Buddhi Wathsala","943423547V","male","sajithaliyanage@gmail.com","$2y$10$tWt08ueVXOkTWd4.Phukhuur6/CWnSAvkTG9hFUCbBmcw4RoxrSD2","0716849672","null","3","1","0","11"),
("Tr016","Himashini Silva","951236547V","female","sajithaliyanage@gmail.com","$2y$10$vlEaLzzOIhFFisJvcM8dhekNH14moFxwnfNQtoVdMIsq9yIoJCwS.","0716849672","null","2","1","0","12"),
("Tr017","Madura Herath","902364587V","male","sajithaliyanage@gmail.com","$2y$10$Zz2sfewZsj8cGuFycgn.gu4XBbheCiOAUCAKys/xf51LHJXiXiCZO","0716849672","null","3","1","0","13"),
("Tr018","Roshan Madushanka","943323547V","male","sajithaliyanage@gmail.com","$2y$10$yJ5rtmLxjRCHru4XpA1OsONajnFj44bmPpuNvweJW16wnpa0EjII6","0716849672","null","5","1","0","12"),
("Tr019","Sajini Shanilka","943423547V","female","sajithaliyanage@gmail.com","$2y$10$2leH1iRxaedcN7JlHsXXWu4dAJaOKpBvIdnssgPsLrHi6.XT77krW","0716849672","null","1","1","0","13"),
("Tr021","Milan Perera","940290447V","male","Milan@gmail.com","$2y$10$EUPjaCC8OJZClPqM99wch.0IcGtstxJbvcSpp6.MVYkkgrodvH7/i","0714568921","null","3","1","2","14"),
("Tr022","Rahal Jayawardena","932456891V","male","rahal@gmail.com","$2y$10$GTwqZmfD/RKs2pp4YkjaeuL1pyubN4kurC3ezC3KqM0/FqB.BOXCe","0777345623","null","5","1","3","14"),
("Tr023","Chamrith jayasinghe","940245632V","male","chmrith@gmail.com","$2y$10$/06QezE6LJDyfZecsNK.QO7nMbhMyXzKOIR3D/R4omPumcKOUcVBK","0755123456","null","1","1","4","14"),
("Tr024","Dilushan Dilu","940265894V","male","dilushan@gmail.com","$2y$10$V9tUCt5xiB7UIajvQI4CvuNrB8gNFbhygYjn8nuvFrUiMAWi50ELO","0754236521","null","1","1","6","16"),
("Tr025","Eranga Ravindu","940290447V","male","eranga@gmail.com","$2y$10$FLp7R/CyvgrMaIqnCupVLOVNKt67TWnz/YRTfuvYTApIvKB1xIwpq","0755102456","null","1","1","7","16"),
("Tr026","Ayodhya Karunananyake","940214563V","male","ayodhya@gmail.com","$2y$10$5Ae4cSroxZhySxu8Hvru7OhQvYzsqgVn9plg0qZwrMO2K7Mv7wmZO","0784561234","null","1","1","8","16"),
("Tr027","Malith senaweera","940231564V","male","malith@gmai.com","$2y$10$zh/j/dWBiZ9eW0eHrH7fZuoxm4Z4ouWeYN971S.LmxeLAnIyFiZAW","071256956","null","1","1","2","14"),
("Tr028","delushan dilu","9456231456","male","diushan@gmail.com","$2y$10$7sItE1CNto.mcYMfvKCO/ON3c8u3Q/b8GHsXwl/1Lp7sWTlS0g87K","0712546823","null","1","1","2","14");




CREATE TABLE `employee_leave_count` (
  `comp_id` varchar(50) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`comp_id`,`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO employee_leave_count VALUES
("Tr001","1","42"),
("Tr001","2","20"),
("Tr001","3","10"),
("Tr001","6","2"),
("Tr002","1","42"),
("Tr002","2","20"),
("Tr002","3","10"),
("Tr002","6","2"),
("Tr0020","1","42"),
("Tr0020","2","20"),
("Tr0020","3","10"),
("Tr0020","6","2"),
("Tr003","1","42"),
("Tr003","2","20"),
("Tr003","3","10"),
("Tr003","6","2"),
("Tr004","1","42"),
("Tr004","2","20"),
("Tr004","3","10"),
("Tr004","6","2"),
("Tr005","1","34"),
("Tr005","2","1"),
("Tr005","3","8"),
("Tr005","6","1"),
("Tr006","1","21"),
("Tr006","2","12"),
("Tr006","3","11"),
("Tr006","6","2"),
("Tr007","1","42"),
("Tr007","2","20"),
("Tr007","3","10"),
("Tr007","6","2"),
("Tr008","1","38"),
("Tr008","2","26"),
("Tr008","3","12"),
("Tr008","6","5"),
("Tr009","1","42"),
("Tr009","2","25"),
("Tr009","3","12"),
("Tr009","6","5"),
("Tr010","1","24"),
("Tr010","2","12"),
("Tr010","3","11"),
("Tr010","6","2"),
("Tr011","1","42"),
("Tr011","2","20"),
("Tr011","3","10"),
("Tr011","6","2"),
("Tr012","1","34"),
("Tr012","2","12"),
("Tr012","3","8"),
("Tr012","6","3"),
("Tr013","1","34"),
("Tr013","2","12"),
("Tr013","3","8"),
("Tr013","6","3"),
("Tr014","1","42"),
("Tr014","2","20"),
("Tr014","3","10"),
("Tr014","6","2"),
("Tr015","1","42"),
("Tr015","2","24"),
("Tr015","3","12"),
("Tr015","6","5"),
("Tr016","1","42"),
("Tr016","2","20"),
("Tr016","3","10"),
("Tr016","6","2"),
("Tr017","1","42"),
("Tr017","2","25"),
("Tr017","3","12"),
("Tr017","6","5"),
("Tr018","1","38"),
("Tr018","2","26"),
("Tr018","3","12"),
("Tr018","6","5"),
("Tr019","1","42"),
("Tr019","2","20"),
("Tr019","3","10"),
("Tr019","6","2"),
("Tr021","1","42"),
("Tr021","2","25"),
("Tr021","3","12"),
("Tr021","6","5"),
("Tr022","1","38"),
("Tr022","2","26"),
("Tr022","3","12"),
("Tr022","6","5"),
("Tr023","1","42"),
("Tr023","2","20"),
("Tr023","3","10"),
("Tr023","6","2"),
("Tr024","1","42"),
("Tr024","2","20"),
("Tr024","3","10"),
("Tr024","6","2"),
("Tr025","1","42"),
("Tr025","2","20"),
("Tr025","3","10"),
("Tr025","6","2");
INSERT INTO employee_leave_count VALUES
("Tr026","1","42"),
("Tr026","2","20"),
("Tr026","3","10"),
("Tr026","6","2"),
("Tr027","1","42"),
("Tr027","2","20"),
("Tr027","3","10"),
("Tr027","6","2"),
("Tr028","1","42"),
("Tr028","2","20"),
("Tr028","3","10"),
("Tr028","6","2");




CREATE TABLE `executive` (
  `executive_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`executive_id`),
  KEY `comp_id` (`comp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `FK_executive_employee` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO executive VALUES
("6","Tr004","11"),
("7","Tr010","13"),
("8","Tr013","14");




CREATE TABLE `general_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `comp_id` (`comp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `FK_general_employee_employee` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;


INSERT INTO general_employee VALUES
("10","Tr005","11"),
("11","Tr006","11"),
("14","Tr011","14"),
("15","Tr012","16"),
("16","Tr014","11"),
("17","Tr015","11"),
("18","Tr0020","14"),
("19","Tr021","14"),
("20","Tr022","14"),
("21","Tr023","14"),
("22","Tr024","16"),
("23","Tr025","16"),
("24","Tr028","14");




CREATE TABLE `group_detail` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `no_of_employees` int(11) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO group_detail VALUES
("1","14","Group 1","3"),
("2","14","Group 2","3"),
("3","14","Group 3","1"),
("4","14","Group 4","1"),
("5","16","Group A","0"),
("6","16","Group B","1"),
("7","16","Group C","2"),
("8","16","Group D","1");




CREATE TABLE `job_category` (
  `job_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_cat_name` varchar(50) NOT NULL,
  `currentStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`job_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO job_category VALUES
("1","Software Engineer","approved"),
("2","Web Developer","approved"),
("3","Graphic Designer","approved"),
("4","Senior Clerk","rejected"),
("5","Sales Manager","approved");




CREATE TABLE `job_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO job_level VALUES
("1","permanent"),
("2","probation"),
("3","trainee");




CREATE TABLE `leave_count_details` (
  `set_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_count` int(11) NOT NULL,
  PRIMARY KEY (`set_id`,`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO leave_count_details VALUES
("20","1","42"),
("20","2","20"),
("20","3","10"),
("20","6","2"),
("21","1","35"),
("21","2","20"),
("21","3","10"),
("21","6","2"),
("22","1","10"),
("22","2","5"),
("22","3","2"),
("22","6","1"),
("23","1","42"),
("23","2","20"),
("23","3","10"),
("23","6","2"),
("24","1","20"),
("24","2","10"),
("24","3","5"),
("24","6","2"),
("25","1","10"),
("25","2","8"),
("25","3","5"),
("25","6","1"),
("26","1","42"),
("26","2","25"),
("26","3","12"),
("26","6","5"),
("27","1","34"),
("27","2","12"),
("27","3","8"),
("27","6","3"),
("28","1","10"),
("28","2","5"),
("28","3","3"),
("28","6","1"),
("29","1","38"),
("29","2","26"),
("29","3","12"),
("29","6","5"),
("30","1","24"),
("30","2","12"),
("30","3","11"),
("30","6","2"),
("31","1","12"),
("31","2","8"),
("31","3","5"),
("31","6","1");




CREATE TABLE `leave_set_job` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_cat_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`set_id`),
  KEY `job_cat_id` (`job_cat_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;


INSERT INTO leave_set_job VALUES
("20","1","1"),
("21","1","2"),
("22","1","3"),
("23","2","1"),
("24","2","2"),
("25","2","3"),
("26","3","1"),
("27","3","2"),
("28","3","3"),
("29","5","1"),
("30","5","2"),
("31","5","3");




CREATE TABLE `leave_type` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_name` varchar(50) NOT NULL,
  `leave_period` varchar(50) NOT NULL,
  `currentStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO leave_type VALUES
("1","Annual Leave","annual","approved"),
("2","Casual Leave","annual","approved"),
("3","Medical Leave","annual","approved"),
("6","Short Leaves","monthly","approved"),
("9","Work out day","monthly","waiting");




CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`manager_id`),
  KEY `comp_id` (`comp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `FK_manager_employee` FOREIGN KEY (`comp_id`) REFERENCES `employee` (`comp_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;


INSERT INTO manager VALUES
("10","Tr003","11"),
("11","Tr007","12"),
("12","Tr016","12"),
("13","Tr017","13"),
("14","Tr018","12"),
("15","Tr019","13"),
("16","Tr026","16"),
("17","Tr027","14");




CREATE TABLE `medical_report` (
  `med_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(50) NOT NULL,
  `apply_leave_id` int(11) NOT NULL,
  `uploaded_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `medical_report` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`med_id`),
  KEY `comp_id` (`comp_id`),
  KEY `apply_leave_id` (`apply_leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO medical_report VALUES
("1","Tr005","18","03/12/2016","approved","../uploads/medicalReport/18/15272268_1328535453877988_5891635308864634948_o.jpg"),
("3","Tr005","17","08/12/2016","approved","../uploads/medicalReport/17/sajithaliyanage CV.pdf");




CREATE TABLE `shift_type` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(50) NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO shift_type VALUES
("1","Morning Session","07.00","12.00","1"),
("2","Afternoon Session","12.00","19.00","2"),
("3","Night Session","19.00","7.00","3");




CREATE TABLE `shifting` (
  `shifting_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(10) NOT NULL,
  `shiftingForDate` varchar(10) NOT NULL,
  `shitingForSession` varchar(50) NOT NULL,
  `changingGroup` varchar(10) NOT NULL,
  `replace_emp_id` varchar(20) NOT NULL,
  `recovery_date` varchar(10) NOT NULL,
  `recovery_time` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`shifting_id`),
  KEY `replace_emp_id` (`replace_emp_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


INSERT INTO shifting VALUES
("9","Tr011","2016/12/07","Night Session","2","Tr021","2016/12/08","Morning Session","bb","waiting"),
("10","Tr012","2016/12/09","Morning Session","6","Tr024","2016/12/16","Morning Session","ill","waiting"),
("11","Tr011","2016/12/07","Night Session","2","Tr021","2016/12/08","Morning Session","ill","waiting");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;