-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 10:33 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thought_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `txt` varchar(2500) NOT NULL,
  `reply_to` int(11) NOT NULL DEFAULT '0',
  `doc_read` int(1) NOT NULL DEFAULT '0',
  `user_read` int(1) NOT NULL DEFAULT '0',
  `message_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `doc_id`, `uid`, `subject`, `txt`, `reply_to`, `doc_read`, `user_read`, `message_time`) VALUES
(1, 7, 190, 'test', 'test', 0, 0, 0, '2016-06-17 13:37:48'),
(2, 7, 190, 'test', 'test', 0, 0, 0, '2016-06-17 13:37:57'),
(3, 7, 190, 'htfht', 'fhgfhgf', 0, 0, 0, '2016-06-17 13:38:04'),
(4, 7, 190, 'mjhghgj', 'hjhgjhgjhg', 0, 0, 0, '2016-06-18 07:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mem_type` enum('DOC','PAT') NOT NULL,
  `txt` varchar(2500) NOT NULL,
  `reply_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `msg_id`, `mem_id`, `mem_type`, `txt`, `reply_time`) VALUES
(1, 4, 7, 'DOC', 'mhgjhg', '2016-06-18 07:16:18'),
(2, 4, 7, 'DOC', 'sdfdf', '2016-06-18 07:19:20'),
(3, 4, 7, 'DOC', 'jjhhgjh', '2016-06-18 07:20:02'),
(4, 4, 7, 'DOC', 'hjgjhg', '2016-06-18 07:20:48'),
(5, 4, 7, 'DOC', 'mhgjh', '2016-06-18 07:21:25'),
(6, 4, 7, 'DOC', 'jhgjh', '2016-06-18 07:34:35'),
(7, 4, 7, 'DOC', 'jhgjh', '2016-06-18 07:34:35'),
(8, 4, 190, 'PAT', 'gfhgfh', '2016-06-18 07:42:29'),
(9, 4, 190, 'PAT', 'uyy', '2016-06-18 07:42:42'),
(10, 1, 7, 'DOC', 'hi', '2016-06-18 07:55:06'),
(11, 1, 190, 'PAT', 'hi', '2016-06-18 07:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `specialitys`
--

CREATE TABLE `specialitys` (
  `spe_id` int(11) NOT NULL,
  `spe_title` varchar(225) NOT NULL,
  `spe_content` text NOT NULL,
  `spe_tags` varchar(225) NOT NULL,
  `spe_img` varchar(225) NOT NULL,
  `spe_time` datetime NOT NULL,
  `spe_status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialitys`
--

INSERT INTO `specialitys` (`spe_id`, `spe_title`, `spe_content`, `spe_tags`, `spe_img`, `spe_time`, `spe_status`) VALUES
(1, 'Family & Relationships', '<p>Our families and relationships tend to the biggest source of our happiness, but issues here can also lead to significant grievances. It is important to realize that no relationship is perfect and it takes effort and patience to build happy relationships, in which you thrive and not just survive. However, some relationship also were probably never meant to be and it is important to move on. Our specialist counselors at the Thought Clinic, will help you navigate through the issues you might be facing in your relationship and emerge stronger and happier.</p>\r\n\r\n<p><strong>Marital Counseling</strong></p>\r\n\r\n<p>Our expert counselors can help prevent relationship problems or help you overcome marital issues you are struggling with. The programs can be done from the comfort of your home, and with the assistance of regular calls from one of our trained coaches. They will focus on marital well-being and conflict resolution, developing healthy intimacy etc. among other things. They would also share tips about dealing with issues related to in-laws and joint families.</p>\r\n\r\n<p><strong>Breakups and heartbreak</strong></p>\r\n\r\n<p>More often than not, the end of a relationship leaves a scar. Our trained counselors will help you get over the pain of a heartbreak, while helping you develop resilience to face such issues in the future. The sessions will also help users self-reflect and understand themselves better and help them let go, move on and rebuild their life.</p>\r\n\r\n<p><strong>Homemaker Counseling</strong></p>\r\n\r\n<p>Research studies show that homemakers and stay-at-home moms experience many more negative emotions, due to lack of appreciation or missing a sense of accomplishment. A lot of homemakers work 365 days a year taking care of their family, without any sick time or vacation time. Our counselors are trained in not just lending a sympathetic ear, but also giving recommendations on how to make your family respect your contributions more, making time for yourself, your hobbies and your personal development.</p>\r\n\r\n<p><strong>Counseling for working women</strong></p>\r\n\r\n<p>A lot of working women appear to manage the dual roles of a career woman and also a homemaker very well, but it does take a toll on one&rsquo;s emotional well being. Our counselors are trained in helping women manage work and personal life, without stress and anxiety. Also, the counselors share useful tips about navigating the predominantly male corporate culture, getting past glass ceilings and the importance of seeking help when need arises.</p>\r\n', 'Family,Relationships', 'Family.jpg', '2016-06-18 00:00:00', '1'),
(2, 'Managing Anxiety and Stress at the workplace', '<p>Are you facing issues at workplace due to interpersonal conflicts or a &nbsp;micromanaging boss? Is the perfectionist in you, coming in your way? Is your inability to manage stress and anxiety affecting your productivity? Are your personal issues causing problems at work?&nbsp; Are low motivation and poor job satisfaction affecting your performance? Is your work getting affected due to low self confidence and self esteem? Do you feel directionless and need career counselling?<br />\r\nOur counselors at The Thought Clinic will coach you to overcome issues that might be holding you back at your workplace!</p>\r\n\r\n<p><strong>Dealing with Anxiety &amp; Stress</strong></p>\r\n\r\n<p>The corporate world and the new age startups jobs come with a lot of deadlines and high pressure projects! Learn how to handle overwhelming feelings of constantly being on the edge, conquer fear and get back to tasks with concentration with the counseling services offered by our counselors. They will help you understand your real needs and goals better, helping you gain an outside perspective for the causes of stress and anxiety in your life.</p>\r\n\r\n<p><strong>High Performance Coaching without burnout</strong></p>\r\n\r\n<p>It is a general assumption that high performance over long durations will invariably lead to burnout. However, mindfulness and meditation, among others can calm the mind and help it refocus. Learn how to focus on the most important tasks, while handling self-doubts and mental traps. Develop techniques for relaxing and develop tactics for succeeding in the workplace, both in the short term and long term as well.</p>\r\n\r\n<p><br />\r\n<strong>Coaching to reset personal equations</strong></p>\r\n\r\n<p><br />\r\nA significant part of our jobs deal with working effectively with our teammates. Learn how to improve and strengthen relationships with your colleagues or your boss and learn tips for managing conflicts at the workplace. Learn how to be more assertive, without coming across as aggressive, and the tips for getting the message across diplomatically. Our counselors can also train you in having difficult conversations and dealing with unresolved feelings after a dispute.</p>\r\n\r\n<p><strong>Career Counselling</strong></p>\r\n\r\n<p><br />\r\nA lot of times it might look like we are stuck in the wrong careers or have just stopped growing in the current job. Talk to our career counselors, to understand if switching careers makes sense or if it can be done using a planned approach. To get ahead in your current role or to find a better job, learn how to network well, find a mentor and interview better. Our counselors will also train you to find a career direction, restart a career after a break (specifically for new mothers) and also in improving job satisfaction.</p>\r\n\r\n<p><strong>Communication Coaching</strong></p>\r\n\r\n<p>Learn how to speak with confidence in every formal/informal situations. Our trainers will help you express your thoughts clearly, get buy-in for your projects/plans, motivate/inspire others etc. Listening intently, writing effectively, body language, tone and tenor of the voice are also critical aspects of communication and our experts will help you with those as well.</p>\r\n', 'Workplace,Anxiety', 'workplace.jpg', '2016-06-18 00:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `specialitys`
--
ALTER TABLE `specialitys`
  ADD PRIMARY KEY (`spe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `specialitys`
--
ALTER TABLE `specialitys`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
