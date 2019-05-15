CREATE DATABASE sw;
use sw;

CREATE TABLE `books` (
  `book_id` int(3) NOT NULL,
  `category` varchar(20) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_preview` text NOT NULL,
  `book_image` text NOT NULL,
  `book_author` varchar(300) NOT NULL,
  `book_views` int(9) NOT NULL DEFAULT '0',
  `book_doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `book_rating` double NOT NULL DEFAULT '0',
  `Available` tinyint(1) NOT NULL DEFAULT '1',
  `return_date` date DEFAULT NULL,
  `user_id` int(3) NOT NULL
);

INSERT INTO `books` (`book_id`, `category`, `book_title`, `book_preview`, `book_image`, `book_author`, `book_views`, `book_rating`, `Available`, `return_date`, `user_id`) VALUES
(6, 'comp_scie', 'html', 'hello there', 'book1.jpg', 'reachel', 20, 5, 0, '2019-04-16', 16),
(7, 'comp_scie', 'html', 'hello there', 'book2.jpg', 'reachel', 20, 5, 0, '2019-04-16', 19),
(8, 'Programming', 'html', 'hello there', 'book2.png', 'reachel', 20, 5, 0, '2019-04-16', 0),
(9, 'comp_scie', 'html', 'hello there', 'book3.jpg', 'reachel', 20, 5, 1, '2019-04-16', 0),
(11, 'Programming', 'html', 'hello there', 'book2.jpg', 'reachel', 20, 5, 0, '2019-04-16', 0),
(12, 'Choose category ..', 'Roots', 'this is abook about my origin which i wrote when i was deep down in village', 'book2.png', 'ssenyonga owen', 0, 0, 0, '2019-04-16', 0),
(14, 'Choose category ..', 'Roots', 'this is abook about my origin which i wrote when i was deep down in village', 'book2.png', 'ssenyonga owen', 0, 0, 1, '2019-04-16', 0),
(15, 'Choose category ..', 'Roots', 'this is abook about my origin which i wrote when i was deep down in village', 'book2.png', 'ssenyonga owen', 0, 0, 0, '2019-04-16', 19),
(16, 'Choose category ..', 'Roots', 'this is abook about my origin which i wrote when i was deep down in village', 'book2.png', 'ssenyonga owen', 0, 0, 0, '2019-04-16', 18),
(17, 'Programming', 'Roots', 'this is abook about my origin which i wrote when i was deep down in village', 'book2.png', 'ssenyonga owen', 0, 0, 1, '2019-04-16', 0);

CREATE TABLE `messages` (
  `m_sender` varchar(200) NOT NULL,
  `m_reciever` varchar(200) NOT NULL,
  `m_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `m_content` longtext NOT NULL,
  `m_id` int(4) NOT NULL,
  `m_read` tinyint(1) NOT NULL DEFAULT '0'
);

INSERT INTO `messages` (`m_sender`, `m_reciever`, `m_time`, `m_content`, `m_id`, `m_read`) VALUES
('web', 'ssenoga edward', '2019-04-09 17:19:00', 'hello eddy i was saying that i wanted to get my book of programming but i dont know if i will get it', 1, 0);



CREATE TABLE `users` (
  `u_id` int(3) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `u_role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'subscriber',
  `pending_order` int(3) NOT NULL DEFAULT '0',
  `books_taken` int(3) NOT NULL DEFAULT '0',
  `adress` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `age` int(3) NOT NULL
);


INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_role`, `pending_order`, `books_taken`, `adress`, `telephone`, `first_name`, `last_name`, `age`) VALUES
(21, 'admin', '', 'admin', 'admin', 0, 0, '', '', '', '', 21),
(22, 'user', '', 'user', 'subscriber', 0, 0, '', '', '', '', 21);

ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

ALTER TABLE `books`
  MODIFY `book_id` int(3) NOT NULL AUTO_INCREMENT;

ALTER TABLE `messages`
  MODIFY `m_id` int(4) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `u_id` int(3) NOT NULL AUTO_INCREMENT;
