-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 05:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `boughtcart`
--

CREATE TABLE `boughtcart` (
  `receiptid` int(11) NOT NULL,
  `Customer` varchar(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boughtcart`
--

INSERT INTO `boughtcart` (`receiptid`, `Customer`, `Product`, `Quantity`) VALUES
(30, 'a', 'CS-1', 1),
(30, 'a', 'CS-4', 1),
(31, 'a', 'CS-1', 1),
(31, 'a', 'CS-4', 1),
(32, 'a', 'CS-1', 2),
(32, 'a', 'CS-4', 2),
(32, 'a', 'REL-1', 1),
(34, 'a', 'ACC-2', 4),
(34, 'a', 'CS-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Customer` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Product` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Quantity` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Customer`, `Product`, `Quantity`) VALUES
('suyashgulati', 'ENT-12', 1),
('suyashgulati', 'ENT-1', 3),
('suyashgulati', 'CHILD-1', 6),
('suyashgulati', 'NEW-1', 1),
('nimisha', 'NEW-2', 1),
('nimisha', 'ENT-7', 1),
('suyashgulati', 'ENT-1222', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countcategory`
--

CREATE TABLE `countcategory` (
  `ID` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `name` text NOT NULL,
  `CODEID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countcategory`
--

INSERT INTO `countcategory` (`ID`, `count`, `name`, `CODEID`) VALUES
(1, 9, 'Language', 'LAN'),
(2, 4, 'Computer Science', 'CS'),
(3, 5, 'Accounting', 'ACC'),
(4, 4, 'Financial', 'FIN'),
(5, 3, 'Business and Law', 'BAL'),
(6, 12, 'Mathematical', 'MATH'),
(10, 1, 'Religion', 'REL');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MRP` float NOT NULL,
  `Price` float NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Available` int(11) NOT NULL,
  `Publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Edition` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page` int(5) DEFAULT NULL,
  `weight` int(4) DEFAULT 500
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `Title`, `Author`, `MRP`, `Price`, `Discount`, `Available`, `Publisher`, `Edition`, `Category`, `Description`, `Language`, `page`, `weight`) VALUES
('LAN-1', 'Bahasa Mandarin Permulaan 1/Introductory Mandarin Level 1 - Penerbit UiTM', 'HO WEE CHEE', 38.89, 35, 10, 100, 'PENERBIT PRESS', '1', 'Language', 'Salah satu cabaran utama untuk para pelajar bukan penutur jati dalam pembelajaran bahasa Mandarin sebagai B2 / B3 ialah kekurangan mereka untuk berkomunikasi secara berkesan dalam bahasa sasaran yang dipelajari. Oleh itu, penulisan buku ini adalah menepati masanya untuk menampung kekurangan tersebut. Buku ini ditulis secara menarik dengan mewujudkan 9 watak utama. Para pelajar akan didedahkan kepada aspek komunikasi bahasa Mandarin yang berlaku dalam kehidupan harian watak-watak utama tersebut. Di samping itu, 66 kosa kata aksara Cina yang biasa digunakan juga turut diperkenalkan melalui buku ini.Dialog-dialog dalam buku ini adalah direka khas agar menepati konteks sosial di Malaysia. Hal ini penting untuk menjamin para pelajar dapat berkomunikasi secara berkesan dalam konteks masyarakat Cina di Malaysia.', 'MANDARIN', 300, 500),
('LAN-2', 'BELAJAR AKSARA CINA - BAHASA MANDARIN PERMULAAN 1 学汉字 —— 初级华语（一）- Penerbit UiTM', 'HO WEE CHEE', 21.05, 20, 5, 100, 'PENERBIT PRESS', '1', 'Language', 'Buku ini merangkumi 40 patah perkataan dan 68 kosa kata dalam aksara Cina. Aksara Cina hendaklah ditulis mengikut urutan coretnya. Urutan coret bagi setiap aksara Cina telah diberi dan anda digalakkan supaya menulis mengikut urutan coret tersebut. Setelah berlatih menulis setiap aksara Cina, anda boleh cuba menulis kosa kata dalam tulisan Cina. Sebutan dalam pinyin dan maknanya turut diberi. Kandungan buku ini dibahagikan kepada 3 bahagian utama. Setiap bahagian mengandungi: (i) latihan menulis aksara Cina mengikut urutan coret; (ii) latihan menulis kosa kata dalam aksara Cina; serta (iii) latihan mengenali dan menulis frasa atau ayat pendek dalam aksara Cina. Anda digalakkan berlatih menulis setiap aksara Cina dan memahami maksudnya dahulu sebelum berjumpa dengan pensyarah anda dalam kelas bahasa Mandarin.  This book consists of 40 characters and 68 vocabulary words in Chinese characters. Chinese characters have to be written in a sequence. The sequence for the Chinese characters is provided and you are advised to write using the sequence given. After practice writing each Chinese character, you can try writing vocabulary in Chinese. The Pinyin pronunciation and meaning of the words are provided. The content of this book is divided into 3 main parts. Each part consists of: i) writing exercises using Chinese characters following the required sequence. ii) practice exercises: writing vocabulary using Chinese characters and iii) practice exercises: identifying and writing phrases or short sentences using Chinese characters. You should practice writing each Chinese character and understand its meaning before consulting your lecturer in your Mandarin class.', 'MANDARIN', 200, 500),
('LAN-4', 'Bahasa Mandarin Komunikasi Harian 1', 'CHAN SWEE KAI', 30.3, 30, 1, 100, 'PENERBIT PRESS', '1', 'Language', 'Buku Bahasa Mandarin Komunikasi Harian 1 ditulis khas bagi pelajar bukan penutur jati yang berhasrat untuk menguasai komunikasi asas bahasa Mandarin dalam tempoh masa yang singkat. Buku ini bukan sahaja sesuai dijadikan buku teks atau rujukan, tambahan kepada para pelajar dalam kelas bahasa Mandarin, malah mudah digunakan sebagai bahan pembelajaran secara kendiri. Penulisan buku ini dilakukan secara tersusun dan mudah difahami. Para pelajar akan didedahkan dengan sistem fnetik bahasa Mandarin atau Hanyu Pingyin, diikuti dengan embelajaran kosa kata, dialog, struktur ayat dan tatabahasa. Latihan yang mencukupi juga dimuatkan untuk mengukuhkan bagi pemahaman pelajar terhadap setiap topik yang dipelajari.   Di samping itu, kandungan buku bukan sahaja ditulis dalam bahasa Mandarin, malah terjemahan dalam bahasa Melayu dan bahasa Inggeris memudahkan pelajar membuat perbandingan struktur bahasa Mandarin dengan bahasa ibunda atau bahasa utama sama ada bahasa Melayu atau bahasa Inggeris. Dengan cara ini, keberkesanan', 'MANDARIN', 299, 500),
('LAN-5', 'BAHASA MANDARIN KOMUNIKASI HARIAN 2 - DAILY COMMUNICATION MANDARIN 2 FOR NON-NATIVE SPEAKER - Penerbit UiTM', 'HOE FOO TERNG', 29, 29, 0, 100, 'PENERBIT PRESS', '2', 'Language', 'Buku ini mengandungi pada 6 topik utama yang selaras dengan CEFR A1 dan A2 (setara HSK tahap 1 dan 2): Topik 1 : Menghadiri kuliah / Attending class Topik 2 : Pembelajaran / Learning Topik 3 : Temujanji / Meet Up Topik 4 : Membeli Barang / Shopping Topik 5 : Di kafeteria / At the cafeteria Topik 6 : Perayaan / Festival Buku ini juga akan menjadi sebuah buku interaktif yang memuatkan aktiviti – aktiviti pelajar. Buku ini memberi pendedahan kepada format peperiksaan JBAE APB UiTM.', 'MANDARIN', 299, 500),
('LAN-6', 'BAHASA MANDARIN PERMULAAN 3 初级华语 (三) INTRODUCTORY MANDARIN LEVEL 3 - Penerbit UiTM\r\n', 'TEH HONG SIOK', 38.89, 35, 10, 100, 'PENERBIT PRESS', '3', 'Language', 'This book is a level 3 textbook for Mandarin as a third language (L3) for undergraduate programs in the Universiti Teknologi Mara (UiTM). This book is also suitable to be used by all Mandarin teaching instructors and non-native learners who are interested in learning Mandarin as a second or third language (L2/L3) at the elementary level. Based on the approach of 8 characters in this book, learners are exposed to various aspects of Mandarin communications in their daily lives. In addition, a number of 68 vocabulary containing of commonly used Chinese characters are also introduced. The content of the dialogues in this book is specially designed to meet the social context in Malaysia. In addition, part of the lower-level vocabulary and grammar for Hanyu Shuiping Kaoshi (HSK) or the Chinese Proficiency Test, which is an international standard examination, is also applied in the syllabus as to ensure this book is relevant and in line with the current trends.', 'MANDARIN', 199, 500),
('LAN-7', 'Belajar AKSARA Cina Bahasa Mandarin Permulaan 2 - Penerbit UiTM\r\n', 'MOK SOON SIM', 29.59, 29, 2, 100, 'PENERBIT PRESS', '2', 'Language', 'Selaras dengan meningkattnya kepentingan bahasa Mandarin di peringkat Global pada era baharu kini, bilangan pelajar yang mempelajari bahasa Mandarin sebagai bahasa kedua / bahasa ketiga juga kian bertambah. Penerbitan buku Belajar Aksara Cina - Bahasa Mandarin Permulaan 2 ini amat sesuai dan tepat pada masanya untuk membantu pelajar bukan penutur jati dalam mempelajari bahasa Mandarin. Sebanyak 75 kosa kata aksara Cina telah diperkenalkan dalam buku ini dan kesemuanya merupakan kosa kata yang pernah dipelajari oleh pelajar dalam buku teks Bahasa Mandarin Permulaan 2. Buku ini telah disusun dengan cara yang sistematik agar membolehkan pelajar mempelajari cara menulis aksara Cina dengan lebih berkesan. Bagi memantapkan pemahamab pelajar, sebutan dan makna diberi untuk setiap aksara Cina. Selain itu, kod QR yang memaparkan cara menulis turut disediakan sebagai rujukan untuk memudahkan pembelajaran menulis aksara Cina.', 'MANDARIN', 199, 500),
('MATH-9', 'INTENSIVE MATHEMATICS - Penerbit Press', 'Tang Howe Eng', 40, 40, 0, 100, 'PENERBIT PRESS', '1', 'Mathematical', 'Addressing the importance of fundamental mathematics for further study in the fields require mathematical knowledge and skills, the intensive Mathematics introduces concepts from fundamental definitions of algebra and statistics as well as the theories and applications. The book aims to help readers intensively develop the fundamental knowledge of mathematics. It begins with prominent topic used in solving mathematical problems such as number and operation, algebraic expression, equation, function, index and logarithm. Once the foundation is established, subsequent topics required problem solving and applications are introduced such as sequence, application in business mathematics and statistics.', 'ENGLISH', 100, 500),
('ACC-1', 'Basic Cost Accounting - Penerbit UiTM', 'Bey Suzana Kasim', 33.33, 30, 10, 100, 'PENERBIT PRESS', '1', 'Accounting', 'This book offers a basic introduction to the cost accounting subject which is very useful for readers who are interested in costing principles and application at the introductory level. It is a key component of management accounting courses taught at universities specifically at the undergraduate level. It introduces the basic cost concepts which form the critical foundation in the management accounting field. Basic Cost Accounting is an essential reading for all undergraduate students, both for the accounting and non-accounting students who are taking introductory costing and management accounting courses. Each chapter contains comprehensive coverage of the relevant topics and ends with practice questions. These practice questions can be conveniently used by instructors in class and used by students for effective independent learning.', 'ENGLISH', 199, 500),
('ACC-2', 'Self-Guided Accounting Workbook For Beginners with Accounting Map - Penerbit UiTM', 'Adriana Shamsudin', 33, 33, 0, 100, 'PENERBIT PRESS', '1', 'Accounting', 'Self-guided Accounting Workbook for Beginners is easy enough for even non-accounting students to understand and attempt. It contains simple notes, examples and illustrations to assist deeper and better understanding in basic accounting concepts; from journal entries to preparation of financial statements.', 'ENGLISH', 100, 500),
('ACC-3', 'Introduction to Accounting - Penerbit UiTM', 'MAHERAN ZAKARIA', 36.67, 33, 10, 100, 'PENERBIT PRESS', '1', 'Accounting', 'This book provides a guide to the introduction of the concepts and principles of accounting. The book is designed for students who want to grasp the basics of accounting subjects quickly and thoroughly. It is written in a simple and precise language, thus offers a comprehensive coverage of topics. It also provides comprehensive exercises and solutions. The features of this book are meant to facilitate self-learning as well as accelerate interest in the subject. Last but not least, this book is suitable for those who take the accounting courses at the elementary stage in higher learning institutions.', 'ENGLISH', 199, 500),
('ACC-4', 'Quick Practice Basic Accounting - Penerbit UiTM', 'Marshita Hashim', 35, 35, 0, 123, 'PENERBIT PRESS', '1', 'Accounting', 'Quick Practice Basic Accounting book is specifically produced to cater to the non-accounting students with no prior basic accounting background especially the first-year undergraduate students. The book provides short notes and exercises for students to practice before they sit for the examination. In addition, the book helps them build confidence to answer real examination questions. The questions and suggested answers are provided to facilitate and reinforce the understanding and learning of basic accounting.', 'ENGLISH', 120, 500),
('MATH-1', 'Foundation Mathematics - Penerbit UiTM', 'Ling Siew Eng', 48.89, 44, 10, 100, 'PENERBIT PRESS', '1', 'Mathematical', 'Foundation Mathematics has been written for foundation or pre-calculus courses. It is intended to establish in students a strong background of mathematical knowledge and competence so that they can participate fully in calculus courses. It is also useful for those who lack confidence, and need careful guidance in mathematical processes. Even for those who have established mathematical expertise, the book is also a helpful revision and reference. An informal and user friendly approach has been adopted to describe the mathematics in everyday language throughout the book. Students always learn better from examples. Hence, mathematical ideas in the book are developed by examples containing a great deal of detail so that students are not left wondering how the problem-solving process flows. At the beginning of each chapter, there is a page that gives an introduction, chapter outline, and learning objectives of the chapter. Each section ends with a set of exercises. Each chapter ends with a concept review and a set of revision exercise covering all aspects of the chapter.', 'ENGLISH', 100, 500),
('MATH-8', 'Maple Worksheet for Pre-Calculus - Penerbit UiTM', 'Ling Siew Eng', 33.33, 30, 10, 100, 'PENERBIT PRESS', '1', 'Mathematical', '1', 'ENGLISH', 200, 500),
('BAL-1', 'Business Law in Malaysia: Questions & Answers - Penerbit UiTM', 'Nuraisyah Chua Abdullah', 29, 29, 0, 100, 'PENERBIT PRESS', '1', 'Business and Law', 'Commerce has been increasingly important nowadays. Therefore, the purpose of this book is to help students of business courses towards a better understanding of answering business law questions. It is important to note that this book is not intended as a substitute for lectures or for reading standard textbooks; it is rather aimed at students whose problem is to ascertain material which is essential or of lesser importance for the examination. Another function of this book is to illustrate the ways of answering questions in the examination for students other than the law students as the questions and answers in this book are framed specially for the non-law students. These answers are not intended to be perfect solutions. Rather, they are intended to illustrate the well-structured answers that would attract high marks using the knowledge that a well-prepared student should possess. This book is also to help persons working within this profession towards a better understanding of those principles of Malaysian law which closely affect them in their daily work. ', 'ENGLISH', 200, 500),
('BAL-2', 'Business law in Malaysia - Penerbit UiTM', 'Nuraisyah Chua Abdullah', 29, 29, 0, 100, 'PENERBIT PRESS', '1', 'Business and Law', 'Commerce has been increasingly important nowadays. Therefore, the purpose of this text is to help students of business courses and persons working within this profession towards a better understanding of those principles of Malaysian law which closely affect them in their day-to-day work.   The businessmen/women will, in the course of their work, enter into many different legal relationships with other parties. The manager of a business enterprise, for example, enters into a contract of employment with his or her employer. It is vital that they work at all times within the boundaries of the law. Thus, it is important that this group of people understand the law and how it affects their work and the conduct of their business. It should be noted that the primary reference of this text is based on the various Acts of Parliament and Malaysian, the English and USA decided cases. The English decided cases are being referred to due to the absence of local decided cases in certain areas of the law. The decisions of these decided cases are highly persuasive. Though one may doubt the application of the USA decided cases to the courts in Malaysia, these cases, to the humble opinion of the writer, would be applicable as long as they do not contravene the principles of law which are applied in Malaysia. ', 'ENGLISH', 200, 500),
('FIN-1', 'Personal Financial Planning - Penerbit UiTM', 'Masitah Hashim', 43, 43, 0, 100, 'PENERBIT PRESS', '1', 'Financial', 'This book is best seller books Personal financial planning or personal finance is an individual fund or money management. It begins from acquiring the money how a person utilizes the money to pay for expenses, to how the money is used for savings and investment purposes in order to increase wealth or return. One should not forget that at the same time he needed as protection by buying insurance policies. Insurance is needed as protection against possible financial loss. The ultimate goal of personal financial planning is to strive for financial independence. Financial independence means not to relying on loved ones and others for money, being free from all debts and from having to work for income.', 'ENGLISH', 1, 500),
('FIN-2', 'Corporate Finance - Penerbit UiTM', 'Rohani A. Ghani', 35, 35, 0, 100, 'PENERBIT PRESS', '1', 'Financial', 'The book is written for the introductory course in Corporate Finance with a focus in teaching the basic principles of modern financial management through the valuation approach. It provides the guidelines for students to enable them to understand the concepts of finance. It covers financial statements analysis and planning which include financial ratios, cash budget and Pro-forma statements. The time value of money, working capital management, sources of financing, capital budgeting and dividend policy also discussed in this book. Students who have gone through this book will find it useful in enhancing their understanding of Corporate Finance.', 'ENGLISH', 200, 500),
('REL-1', 'Islamic Performing Arts: An Artistic Discourse - Penerbit UiTM', 'Solehah Ishak', 43, 43, 0, 123, 'PENERBIT PRESS', '1', 'Religion', 'This book is an artistic discourse from 10 writers, each special in their own way, immersing the performing arts with their intellectual pursuits. Bringing in tradition, modernity, its contemporary grandeur and spiritual element, the writers delicately craft their Islamic inner beliefs and contentions on Islamic representations in the performing arts through its politics, social and economies of life. Whilst faith is tried and tested in the Islamic performing arts, it is in its unification, beyond the boundaries of region, color, taste and action that makes its encounter phenomenal. This book is a testament of that belief.', 'ENGLISH', 199, 500),
('MATH-10', 'Advanced Basic Mathematics - Penerbit UiTM', 'Liew Chin Ying', 29, 29, 0, 123, 'PENERBIT PRESS', '1', 'Mathematical', 'Advanced Basic Mathematics is particularly written for learners who need a thorough understanding in this course. Down to earth explanation will lead the students through the contents: basic application of differentiation and integration and their application in kinematics, the movement of a particle along a straight line, the basic application of trigonometry in bearing, angle of elevation and depression and matrices. Student-friendly illustration and worked examples are cautiously added in to explain the main concept. Chapters to review and further sharpen their skills established in the Basic Mathematics course are also prepared before they are presented with the main content. A list of easy-to-refer of useful and widely employed formulae are also inserted at the back of the book. ', 'ENGLISH', 199, 500),
('FIN-3', 'Ekonomi Mengikut Syariat Islam - Penerbit UiTM', 'Mahbob Hj. Mahfot', 22, 22, 0, 111, 'PENERBIT PRESS', '1', 'Financial', 'Buku ini mengandungi enam bab. Bab pertama membincangkan pengenalan ekonomi menurut kaca mata Islam berbanding dengan pendekatan konvensional. Bab kedua menyentuh mengenai konsep ekonomi Islam yang menghuraikan lebih lanjut secara mendalam aspek-aspek falsafah, prinsip, objektif dan matlamat dalam ekonomi Islam. Bab ketiga mengupas kegiatan utama dalam ekonomi iaitu aspek pengeluaran menurut syariat Islam diikuti dengan aspek pengeluaran dalam pendekatan Islam dan bab terakhir membahaskan konsep pasaran menurut syariat Islam. ', 'ENGLISH', 299, 500),
('FIN-4', 'Corporate Finance - Penerbit UiTM', 'Rohani A. Ghani', 35, 35, 0, 123, 'PENERBIT PRESS', '1', 'Financial', 'The book is written for the introductory course in Corporate Finance with a focus in teaching the basic principles of modern financial management through the valuation approach. It provides the guidelines for students to enable them to understand the concepts of finance. It covers financial statements analysis and planning which include financial ratios, cash budget and Pro-forma statements. The time value of money, working capital management, sources of financing, capital budgeting and dividend policy also discussed in this book. Students who have gone through this book will find it useful in enhancing their understanding of Corporate Finance.', 'ENGLISH', 299, 500),
('MATH-11', 'Advanced Basic Mathematics - Penerbit UiTM', 'Liew Chin Ying', 29, 29, 0, 100, 'PENERBIT PRESS', '1', 'Mathematical', 'Advanced Basic Mathematics is particularly written for learners who need a thorough understanding in this course. Down to earth explanation will lead the students through the contents: basic application of differentiation and integration and their application in kinematics, the movement of a particle along a straight line, the basic application of trigonometry in bearing, angle of elevation and depression and matrices. Student-friendly illustration and worked examples are cautiously added in to explain the main concept. Chapters to review and further sharpen their skills established in the Basic Mathematics course are also prepared before they are presented with the main content. A list of easy-to-refer of useful and widely employed formulae are also inserted at the back of the book. ', 'ENGLISH', 299, 500),
('CS-1', 'Quantitative Data Analysis in Communication Research 2nd Edition - Penerbit UiTM', 'Ahlam Abdul Aziz', 43, 43, 0, 123, 'PENERBIT PRESS', '2', 'Computer Science', 'Quantitative Data Analysis is a scientific approach that allows researchers to learn a situation of phenomenon through a numerical data. It helps researchers to apply the proper method in collecting data, employing accurate analysis, intrepreting the data correctly and effectively presenting the result. Quantitative data helps researchers to discover the knowlegde and it helps them in decision making process. This textbook is writing especially for mass communication and media studies students and social science researchers as a step by step guidance to analyse quantitative data. This book contains four chapter. Each chapter is carefully explained the appropriate analysis step by step by manual calculation and SPSS software through relevant examples so that students can learn both method of data analyse. Examples with computer output provide opportunity for students to understand and interpret the result of the SPSS output. This book also include the exercise questions to test the students understanding upon completion of every chapter. ', 'ENGLISH', 200, 500),
('CS-2', 'Fundamentals of Computer Problem Solving Using C++ (2nd Edition) - Penerbit UiTM', 'Suryani Ariffin', 25, 25, 0, 123, 'PENERBIT PRESS', '2', 'Computer Science', 'This laboratory manual is suitable to assist students who are new to computer programming within the framework of the C++ programming language. Students will be guided to deeply understand the development of computer programs via lectures, extensive lab activities and interesting additional  exercises embedded in this manual. This manual has been designed to assist students to work independently during and after laboratory session without further assistance of lecturers. ', 'ENGLISH', 150, 500),
('LAN-8', 'Dynamic English for Beginners ', 'Wan Aida Wan Hassan', 25, 25, 0, 123, 'PENERBIT PRESS', '1', 'Language', 'Dynamic English for Beginners (DEB) attempts to integrate the four basic language skills, namely: speaking, listening, reading, and writing. DEB is designed for students of Kursus Kemahiran Bahasa (KKB) in Universiti Teknologi MARA (UiTM), especially those at the Introductory Level. However, it is also suitable for upper secondary school, matriculation, and diploma students and learners studying independently or as supplementary course material.', 'ENGLISH', 200, 500),
('LAN-9', 'Bahasa Melayu Pertengahan II - Penerbit UiTM', 'Norhazlina Husin', 25, 25, 0, 123, 'PENERBIT PRESS', '1', 'Language', 'Bahasa Melayu Pertengahan II merupakan satu daripada siri Bahasa Melayu untuk menutur asing. Buku ini ditulis dan disusun khusus untuk membantu dan membimbing pelajar mempelajari dan memahami bahasa Melayu sebagai bahasa asing dengan lebih mendalam. Buku ini dibahagikan kepada beberapa bahagian yang merangkumi kesemua aspek berbahasa termasuklah tentang aspek tatabahasa yang sesuai bagi peringkat pertengahan, kaedah penulisan, kemahiran lisan dan pemahaman. Semua nota dan latihan di dalaam buku ini disusun mengikut aras kebolehan para pelajar iaitu mudah, sederhana dan sukar agar para pelajar asing dapat menguasai sesuatu yang dipelajari dengan berkesan. Untuk menguji pemahaman pelajar, setiap topik disediakan latihan pada bahagian akhir buku ini.', 'BAHASA MELAYU', 150, 500),
('BAL-3', 'Essentials of Business Accounting 3rd edition - Penerbit UiTM', 'Penerbit UiTM', 49, 49, 0, 123, 'PENERBIT PRESS', '3', 'Business and Law', 'The appeal of Essentials of Business Accounting lies in its readability. Now in its third edition, students taking an introductory course on Financial accounting, at certificate, diploma, and degree level, have found the writing style and numerous illustrations appealing, as it promotes easy comprehension of the practical aspects of business accounting: an area of study that many \"beginner\" students perceive as intricate and complex. ', 'ENGLISH', 370, 500),
('CS-3', 'Issues in Media and Communication - Penerbit UiTM', 'Halimahton Shaari', 34, 34, 0, 123, 'PENERBIT PRESS', '1', 'Computer Science', 'The collection of papers of different methodological orientations show a mixed evaluation of the internet’s potential to enhance the democratic process. Authored by media educators at UiTM who are intimately familiar with the constraints and opportunities of online communication in a highly regulated media environment is thus timely.', 'ENGLISH', 150, 500),
('CS-4', 'Big Data Analytic and Evaluation of the Organisational Goals - Penerbit UiTM', 'Tengku Adil Tengku Izhar', 23, 23, 0, 123, 'PENERBIT PRESS', '1', 'Computer Science', 'This book is about gathering the measurement data and making an effectiveness results to assist decision-making process to evaluate the level of organisational goals achievement. In order to achieve this aim, the authors designed a new framework as a platform represents five step for domain experts and entrepreneurs to identify the relevant organisational data from huge amount of data known as Big Data to assist decision-making process in revation to organisational goals. Therefore,the decision-Makers can evaluate the level of organisational goals achievement. The authors named the framework. GOAL-Framework associated with the organisational goals ontology aims to identify the dependency relationship between organisational goals and dependency relationship between organisational data and organisational goals.', 'ENGLISH', 170, 500),
('MATH-12', 'Kalkulus Untuk Pelajar Diploma Sains dan Kejuruteraan - Penerbit UiTM', 'Maisurah Shamsuddin', 45, 45, 0, 100, 'PENERBIT PRESS', '1', 'Mathematical', 'Buku ini ditulis secara khususnya bagi membantu pelajar tahun pertama dan kedua dalam bidang pengajian sains dan kejuruteraan di institusi pengajian tinggi. Kemahiran dalam teknik kalkulus merupakan prasyarat kepada pembelajaran sains dan matematik. Buku ini boleh digunakan oleh semua pelajar di UiTM, Politeknik, koej swasta dan IPTA yang megikuti subjek kalkulus.', 'BAHASA MELAYU', 150, 500),
('ACC-5', 'Accounting Simulation Handbook for Non-Accounting Students - Penerbit UiTM', 'Nazmi Mohamed Zin', 30, 30, 0, 123, 'PENERBIT PRESS', '1', 'Accounting', 'Accounting Simulation Handbook for Non-Accounting Students is designed mainly for non-accounting students and those who need clear information on the recording of business transactions. The book is written in simple language and clear presentation of basic accounting process and record.  This book deals with classifying, recording and summarising of processes in accounting. It offers various examples of business transactions together with it suggested solutions according to the cycle of the accounting process. The systematic presentation of accounting records and presentation of final accounts makes this as a preferred handbook.', 'ENGLISH', 199, 500);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `phoneNum` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `boughtdate` date NOT NULL,
  `Customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `fullname`, `address`, `city`, `state`, `zipcode`, `phoneNum`, `email`, `total`, `boughtdate`, `Customer`) VALUES
(30, 'test', 'test', 'test', 'test', 'test', 'test', 'a@a.com', 74, '2001-01-23', 'a'),
(31, '', '', '', '', '', '', '', 0, '0000-00-00', ''),
(32, 'AIDIT BIN AZHAR', 'KG TOK DERPAH', 'PASIR MAS', 'KELANTAN', '17000', '01125670893', 'a@a.com', 183, '0000-00-00', 'a'),
(33, 'AIDIT BIN AZHAR', 'KG TOK DERPAH', 'PASIR MAS', 'KELANTAN', '17000', '01125670893', 'a@a.com', 8, '0000-00-00', 'a'),
(34, 'AIDIT BIN AZHAR', 'KG TOK DERPAH', 'PASIR MAS', 'Kelantan', '17000', '01125670893', 'aiditazhar123@gmail.com', 183, '0000-00-00', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNum` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `nickName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imglink` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `Fullname`, `address`, `phoneNum`, `email`, `nickName`, `imglink`) VALUES
('suyash', 'suyash', 'aidit', 'tok derpah', '01125670893', 'aiditazhar123@gmail.com', '', ''),
('shivangi', 'gupta', NULL, '', '', '', '', ''),
('nimisha', 'sehgal', NULL, '', '', '', '', ''),
('avaleen', 'kaur', NULL, '', '', '', '', ''),
('ankita', 'negi', NULL, '', '', '', '', ''),
('astha', 'bhargav', NULL, '', '', '', '', ''),
('avani', 'khurana', NULL, '', '', '', '', ''),
('shikhar', 'gupta', NULL, '', '', '', '', ''),
('rakhi', 'gupta', NULL, '', '', '', '', ''),
('saurabh', 'saha', NULL, '', '', '', '', ''),
('suyashgulati', 's19', NULL, '', '', '', '', ''),
('a', 'a', 'aidit', 'kg', '01', 'aiditazhar123@gmail.com', 'aidit', 'logo.jpg'),
('', '', NULL, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boughtcart`
--
ALTER TABLE `boughtcart`
  ADD PRIMARY KEY (`receiptid`,`Customer`,`Product`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Customer`,`Product`),
  ADD KEY `Product` (`Product`);

--
-- Indexes for table `countcategory`
--
ALTER TABLE `countcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countcategory`
--
ALTER TABLE `countcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
