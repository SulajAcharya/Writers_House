-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 11:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writers_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) NOT NULL,
  `incoming_id` varchar(255) NOT NULL,
  `outgoing_id` varchar(255) NOT NULL,
  `msg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `incoming_id`, `outgoing_id`, `msg`) VALUES
(1, '828437914', '292617442', 'Testing'),
(2, '292617442', '731860701', 'hi'),
(3, '292617442', '292617442', 'Know'),
(4, '731860701', '292617442', 'Know'),
(5, '292617442', '731860701', 'Are you receiving the msg?'),
(6, '731860701', '292617442', 'Yes I am'),
(7, '292617442', '731860701', 'Checking'),
(8, '292617442', '731860701', 'Are you okay?'),
(9, '292617442', '731860701', 'Hi'),
(10, '292617442', '731860701', 'Hello'),
(11, '292617442', '731860701', 'Testing'),
(12, '292617442', '731860701', 'Text'),
(13, '731860701', '292617442', 'Hi'),
(14, '292617442', '731860701', 'Hu');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `content_id`, `comment_time`) VALUES
(1, 'Hello', 1, 1, '2023-07-17 15:02:49'),
(5, 'It\'s nice', 12, 6, '2023-09-04 05:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `one_liner` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` bigint(20) NOT NULL,
  `writers_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cover_img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `read_count` bigint(20) NOT NULL,
  `likes` bigint(20) NOT NULL,
  `approved` enum('-1','0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deleted` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deleted_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `disapprove_time` timestamp NULL DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_time` timestamp NULL DEFAULT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `user_id`, `title`, `one_liner`, `genre_id`, `writers_content`, `cover_img`, `read_count`, `likes`, `approved`, `deleted`, `deleted_by`, `disapprove_time`, `created_time`, `modified_time`, `deleted_time`) VALUES
(1, 1, 'Demo', 'testing', 1, 'Nothing', '', 4, 0, '0', '1', '1', NULL, '2023-07-17 14:57:04', NULL, '2023-09-04 13:19:40'),
(6, 12, 'The Journey of worthless rupee note', 'A journey of a rupee note who hold pride of himself and now became worthless. What was his journey? Let hear from it.\r\n.\r\n.\r\n.\r\nThank you my friend Thanga Selva, who pitched this idea.', 6, '    Hello guys. Are you all ready to hear my journey? You may wonder which journey? A journey of a rupee note that got crafted in a fancy factory and possessed a value in his name now became worthless. In India, there are only two places where rupees are created: one in Nashik and another in Dewas. I was born in Dewas, my birthplace. The factory was lavish with the machines they were using to create us. That was quite joyful. You all might be wondering what technology is used in this factory, but I am not an engineer, due to which I lack knowledge regarding this. So, don\'t ask me. They made our bodies with the cotton material they had made for us. Yay, you heard it right; the rupee note and some other countries notes are made with cotton, not paper. It might be a fact for you all. Then, we passed through various machines where we got our tattoos; in your terms, it was the country\'s chosen design that was decided for us. We also received our names, and my name is ‘3LM 078039’. It is quite a weird name, but people outside call me by the value I hold. It is Rs. 500. After we got our names and values, we were all transported into a sealed box.\r\n  I was hoping to see daylight for the first time, but it was stolen by that bloody sealed box. I and my siblings will never forgive you for this, for not giving us our chance. Also for the darkness you have given. We don’t know what was happening outside, but from the vibration we were experiencing, we got the hunch that we were getting transported somewhere. It might have been a truck or van; who knows? We all got frightened by this darkness, but being together helped us overcome our fear. We even experienced huge vibrations at times; I thought the vehicle got stopped somewhere. After experiencing all this huge vibration and this darkness, we all reached our destination bank. It might take 3 or 4 days to get here. The bank was quite lavish. I was feeling chills around me due to the air conditioner. One of the bank employees took me and my siblings, and he went to the cash counter. There, me and my sibling passed through a machine to check how many of us had been here. Later on, we were all transferred to an automated teller machine (A.T.M.).\r\n  That time also, I was expecting to see daylight, but this time my brothers and sisters seized the chance. I was waiting for the day when I was going to experience my first day of light. Again, darkness surrounded us, and from that day on, we all realised we were going to get separated. As humans, you all find it emotional, but we are all just a rupee note. So we don’t have that emotion; we were all made for this job. With this motive, we all got ready for our jobs. As time passed, one by one, we were withdrawn from this dark machine. Most of us left this machine in group only, but my nephew, ‘4HM 056318’, in your term, a 50 rupee note, told me that there will be rare occasions where only one of us will withdraw. There will be nothing to accompany that one note. The probability of this happening will be 1 in a million. That’s a bit scary. But what can we do? If that happens, we should also accept that because we will all be exchanged one day. That day, we will leave our temporary nest for another.\r\n  That day also arrived when I was withdrawn. Already, half of my siblings have left this machine, and another half is waiting for our chance. I already know that within the first 2-3 withdrawals, I am going to have my first daylight experience. The first withdrawal happened, and it will be the second withdrawal. I am going to set my wings free. The cash dispenser opened, and my heart was throbbing to see the daylight. My siblings and cousins were wishing me. As I was expecting my withdrawal, the person who was withdrawing chose my cousin 2000 rupee note. As I said earlier, that one scary thing happened to my cousin. But my cousin wasn’t frightened; he stood like a phoenix bird and got ready for his job. After seeing such courage in him, I got encouraged that day. After that, in the third withdrawal, I got out of that machine along with my siblings.\r\n  I saw the person who freed me from this machine. He might be a teenage guy, I guess. He retrieved us from the cash dispenser. After that, he started counting us to check whether he had retrieved all of us or not. With this action, he moved out of the building, and for the first time, I experienced the daylight for the first time. It was like a moment for me. The rays of light felt on me like a warming cushion. The warmth given by my light is pure joy for me, in addition to the outside air. It was total bliss for me. After missing my first two chances and experiencing this much pleasure, I can’t explain my inner peace. My inner peace lasted for one minute, and then me and my siblings were all transferred into that man’s purse. The man’s purse was quite comfortable. There we met a 2000 rupee note. We tried to approach him, but that note simply ignored us. I thought that the rupee note ignored us just because we were lower in value compared to them. So we also ignored that note.\r\n  We were all eager for our jobs. We don’t know what it could be. But eagerness was keeping us high. After a few hours, we didn’t experience any of the same things we had experienced early. So I thought we all reached our place where I will do my job. After a few moments, I saw the boy\'s hand. He took all of us along with the 2000 rupee note, and he exchanged us for some packets of powder. I don’t know what it was after we all went to the man’s purse who got us from that boy. After we all got there, the 2000 rupee started blabbering. That rupee note was saying, \"Another one, who didn’t know my value?\" I asked her, \"Hey, miss, what happened? Anything wrong,\" and she said, \"Do you know what happened now?\" I replied, \"Yay, we got exchanged with something, and that was our job.\" She then asked, \"Do you know what that was?\" I thought for a moment and replied, \"No.\" She then asked my siblings, \"Do you all know what that was?\" My siblings also had no idea what that was.\r\n  She then replied, \"That white packet was mephedrone drug. This drug was used by humans to intoxicate them.\" I was shocked to hear it for the first time. I asked, \"Seriously, why do they do that?\" She replied, \"They find pleasure in it. You know one thing, that boy’s father works offshore so hard. That his son lives here peacefully, but like the average teenage guy, he spends us on drugs, gambling, alcohol, etc.\" It’s the first time I felt, how foolish are you all? Don’t know the value of us at all. At that time, my brother asked, \"So, what about the man who sold that drug?\" She then replied, \"From my point of view, I will say he is a clever guy. Because he valued us, and one who gives value to us will live here peacefully. Because without us, nothing will be achieved in this world; everything in this world needs us. That’s how the world works.\" After hearing her speech, I felt like a god. Without me, there is nothing in this world. I am the supremacy of all, but I didn’t know at this time that I would regret this.\r\n  That day, I was exchanged for a teddy bear in a shopping mall. I got separated from my siblings, as I said earlier, and I got dumped again into an ATM machine the next day. But during these days, I was on my top of my pride. I thought humans were just ants in front of me. With this pride, I got to withdraw from the ATM machine along with the fellas. Again, it is a teenage boy. Due to my earlier thoughts, I thought he was also like the same guy who first withdrawn me. But I didn’t think he would prove me wrong. He kept us in his pants pocket and left the ATM. I don’t know what was happening outside. After some time, I was taken out of the boys pants pocket along with my fellas. When I got out, I saw I was inside a house, and he heard the boys saying, \"Mom, here is the money you asked me to withdraw from the bank.\" After saying that, he hands us over to his mom. His mom then started counting us, and while she was busy counting, she asked, \"What made you so delayed, Selva?\" That time, I got to know that boy\'s name was Selva. Selva replied, \"Outside the ATM, there was a huge crowd. It took me so long, mom.\" After she completed the counting, she took me away from my fellas and handed me over to her son.\r\n  Saying, \"Selva, keep this 500 rupees.\" Selva was totally confused, as I can see by his facial reaction. He asked, \"What is this for?\" She replied, \"Just for your personal use,\" and Selva said, \"Mom, if I need my money, I will ask you. I don’t need it.\" His mom then replied, \"Just keep it; it is for your own use only.\" After hearing that, he replied, \"Whatever,\" and he then kept me in his phone case. I heard that people kept us in their phone cases, but this is the first time. The space between the phone case and phone did not have much space, like a purse. But for me, it is comfortable. But what made me so surprised was Selva only. After hearing their conversation, I couldn’t judge him because, on one side, he doesn’t value us at all, and on the other, he also doesn’t waste us. For me, it is difficult to understand him. Also, I apologise for misjudging him.\r\n  I travelled along with him for some days, but seriously. I have to say this, he is a really nice guy. I have seen him helping others without expecting anything in return. Also, his biggest dream is to build a house for his parents. By seeing him, I changed my mind and realised that there are also some good people in this world. Also, in the due process, I lost my pride. It is also due to Selva only, I heard him saying to his friend that humans only created the money concept, and they die for the printed paper. After hearing that, I got angry at him. How can you say this? We used to decide a person\'s life; we used to decide a country\'s economy. There is nothing in this world that couldn’t be achieved without us. There are many people who die for us, and at last, how can he say we were printed paper? We are made of cotton. He needs to understand that first.\r\n  I was angry at him, but later I thought deeply about myself. He was right because humans made us, and they give us value. If they don’t value us, then what are we? So that left me with no choice, to accept the fact that we are nothing if humans don’t give us value. In Selva’s terms, I am just printed paper. That day, I left my pride. Everything was going peacefully, but time has two faces. One is a good face, and another is a bad face. Now the time will show his bad face. It was nighttime, and I heard Selva’s dad\'s voice. So I got to know he had arrived from his office. After a few moments, I heard all three of their conversations. While I was hearing that conversation, I got to know that Selva’s dad got terminated from his job. It is sad for me to hear this because already there is a slight financial issue in Selva’s house due to Selva’s college fees. But they simply convince themselves that everything will return to normal. I liked their confidence.\r\n  After 2 days, I see myself at Selva’s college, where he was called by his principal\'s office about fees. I was hearing that the principal was scolding Selva because he had not paid his remaining fees on time. Selva was requesting to extend the date, but the principal stood by this decision. He said, \"Try to pay the remaining fees, or else you will be restricted from attending class and exams.\" He also further said, \"Why are you all attending such a college when you are not able to pay the fees?\" It made me angry at the principal. What kind of human is he? I can\'t  understand another human\'s feelings; I don’t know what issue he is facing. But if a person is requesting you, doesn’t he have a heart to accept the request? I am angry at him; just think about Selva. What will be his difficulty? On one side his dad as lost job on another side this principal his forcing. I am feeling sad for him.\r\n  Later that day, I saw that Selva’s family was totally disturbed due to the early event. His parents were already trying to borrow some money so that they could pay Selva’s fees, but all their efforts were in vain. Also, this unemployment issue is an additional headache for them. While they were discussing this issue, Selva even told them that he had decided to discontinue his studies. His parents shouted at him, saying, \"Are you mad or what? Just because the principal told you this, you will discontinue the study. Don’t be foolish.\" He then replied, \"But dad, it\'s due to me only. You both were facing this issue.\" His dad replied, \"Selva, it is just a basic problem. Just leave this matter to us, we will handle it. Don’t worry about it.\" Even I would say those words if I were Selva’s parents. Selva shouldn’t regret those things; the principal should understand Selva\'s situation instead of demotivating her. As a teacher, it is his job. I am glad Selva had such parents. But I didn’t think he would do this.\r\n  Around 11:30 p.m., I could clearly see that Selva wasn’t sleeping. By his facial reaction, I can sense he is totally disturbed by this event. Even after hearing his parents\' words, he is still upset. I thought he would overcome it, but suddenly he got up from his place. I don’t know what he was up to. He then took a pen and paper and started writing something. I can clearly see what he was writing. I was totally shocked to see what he was writing. Selva was writing a suicide letter, and he was going to commit suicide. I started shouting at him, but as a rupee note. He couldn\'t hear my voice. In that letter, he was writing, ‘Dad and Mom, please forgive me. You both have done many things for me. I am a sinner who is not able to repay the gratitude you both have shown. Also, I can’t see myself because you both were facing problems. So I decided to end my life. Sorry, mom and dad.’ It totally freaked me out.\r\n  I was shouting at him, even as I tried to wake his parents. But my efforts are like an air that can’t be seen or heard. I can’t also move my body, and within a few moments, I witnessed that gruesome scenario. Selva slit his throat with a knife. I was saying earlier that money can do anything. But today, I can’t save someone. The world is filled with humans who are greedy for us. They kept us above their heads; they would do anything to earn us. But as a money, I wouldn’t support them. I will stand for Selva like people who just know our real value. After seeing him commit suicide, I was totally heartbroken. Why should people like him die? Why should people like him suffer?\r\n  There are people on one side who earn millions per minute and others who die per minute due to money, like me. For this reason only, humans created us. For the first time, I am regretting being a money. If people pray for us, then why can’t we save their lives? What kind of life am I living? For this only, I am feeling worthless. I can still hear Selva’s parents crying; they lost their only child to someone’s greed. I\'m not able to bear it. As a rupee note, I will continue living this life without my soul. So far, this is my journey. That’s all, my dear audience.', '/img/content_img/The Journey of a Worthless Rupee Note.png', 88, 1, '0', '0', NULL, NULL, '2023-08-29 09:29:40', '2023-09-04 14:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `feddback_comment` varchar(255) NOT NULL,
  `rating` enum('great','satisfaction','poor') NOT NULL,
  `submitted_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email_address`, `feddback_comment`, `rating`, `submitted_time`) VALUES
(1, 'ak@gmail.com', 'Testing', 'great', '2023-07-17 15:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deactivate` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deleted` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_time` timestamp NULL DEFAULT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`, `deactivate`, `deleted`, `created_time`, `modified_time`, `deleted_time`) VALUES
(1, 'Horror', '0', '0', '2023-07-17 15:00:34', NULL, NULL),
(2, 'Action', '0', '0', '2023-09-04 08:49:07', NULL, NULL),
(3, 'Adventure', '0', '0', '2023-09-04 08:49:13', NULL, NULL),
(4, 'Article', '0', '0', '2023-09-04 08:49:20', NULL, NULL),
(5, 'Crime', '0', '0', '2023-09-04 08:49:25', NULL, NULL),
(6, 'Drama', '0', '0', '2023-09-04 08:49:29', NULL, NULL),
(7, 'Fantasy', '0', '0', '2023-09-04 08:49:34', NULL, NULL),
(8, 'Fiction', '0', '0', '2023-09-04 08:49:39', NULL, NULL),
(9, 'Historic', '0', '0', '2023-09-04 08:49:42', NULL, NULL),
(10, 'Historical Fiction', '0', '0', '2023-09-04 08:49:50', NULL, NULL),
(11, 'Humor', '0', '0', '2023-09-04 08:50:02', NULL, NULL),
(12, 'Investigation', '0', '0', '2023-09-04 08:50:10', NULL, NULL),
(13, 'Life', '0', '0', '2023-09-04 08:50:14', NULL, NULL),
(14, 'Mystery', '0', '0', '2023-09-04 08:50:19', NULL, NULL),
(15, 'Non Fiction', '0', '0', '2023-09-04 08:50:26', NULL, NULL),
(16, 'Poetry', '0', '0', '2023-09-04 08:50:32', NULL, NULL),
(17, 'Romance', '0', '0', '2023-09-04 08:50:39', NULL, NULL),
(18, 'Science Fiction', '0', '0', '2023-09-04 08:50:46', NULL, NULL),
(19, 'Short story', '0', '0', '2023-09-04 08:50:56', NULL, NULL),
(20, 'Superhero', '0', '0', '2023-09-04 08:51:08', NULL, NULL),
(21, 'Thriller', '0', '0', '2023-09-04 08:51:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `liked` enum('0','1') NOT NULL DEFAULT '1',
  `user_id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liked`, `user_id`, `content_id`, `created_time`) VALUES
(2, '1', 12, 6, '2023-09-04 04:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `previous_visit`
--

CREATE TABLE `previous_visit` (
  `id` bigint(255) NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `content_id` bigint(255) NOT NULL,
  `removed` enum('0','1') NOT NULL DEFAULT '0',
  `visited_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `previous_visit`
--

INSERT INTO `previous_visit` (`id`, `user_id`, `content_id`, `removed`, `visited_time`) VALUES
(1, 1, 1, '1', '2023-07-17 15:07:40'),
(2, 12, 6, '1', '2023-09-04 10:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text NOT NULL,
  `role` enum('admin','writer','user') NOT NULL DEFAULT 'user',
  `block` enum('0','1') NOT NULL DEFAULT '0',
  `unique_id` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `verified` enum('0','1') NOT NULL DEFAULT '0',
  `verified_time` timestamp NULL DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_time` timestamp NULL DEFAULT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `user_name`, `email_address`, `password`, `description`, `role`, `block`, `unique_id`, `img`, `verified`, `verified_time`, `last_login_time`, `created_time`, `modified_time`, `deleted_time`) VALUES
(1, 'Harold', 'Das', 'snake', 'harold@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Therikaa', 'writer', '0', '828437914', '/img//profile_img/harold.jpeg', '0', NULL, NULL, '2023-07-17 14:49:06', NULL, NULL),
(10, 'Ajay', 'Kumar', 'ajay', 'ajay768@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'admin', '0', '181908014', '/img/profile_img/profile.jpeg', '0', NULL, NULL, '2023-08-27 07:17:09', NULL, NULL),
(11, 'Naruto', 'Uzmaki', 'naruto', 'naruto@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'user', '0', '292617442', '/img/profile_img/grow.jpeg', '0', NULL, NULL, '2023-08-27 07:21:06', '2023-09-01 03:25:42', NULL),
(12, 'Daniel', 'Leo', 'leo', 'leo123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Bloody sweet', 'writer', '0', '731860701', '/img/profile_img/leo.jpeg', '0', NULL, NULL, '2023-08-27 07:24:30', NULL, NULL),
(13, 'Tanjiro', 'Kamado', 'tanjiro', 'tanjiro@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'user', '0', '1412335821', '/img/profile_img/tanjiro.png', '0', NULL, NULL, '2023-09-04 14:52:20', NULL, NULL),
(14, 'Zenistu', 'Agatsuma', 'zen', 'zenistu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'user', '0', '828427848', '/img/profile_img/zenistu.jpeg', '0', NULL, NULL, '2023-09-04 14:54:09', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content` (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `genre` (`genre_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previous_visit`
--
ALTER TABLE `previous_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `previous_visit`
--
ALTER TABLE `previous_visit`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `content` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `previous_visit`
--
ALTER TABLE `previous_visit`
  ADD CONSTRAINT `content_id` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
