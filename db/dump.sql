set names utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `users` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `mail` VARCHAR(255),
    `group` VARCHAR(8) DEFAULT 'users',
    `password` VARCHAR(255) DEFAULT '$2y$10$WLqvJrAIFMoyxkQNRUsbae7YneFaN2rFqnrdAXhllk69AaoCkHgdK'/*123 пароль*/
) CHARACTER SET utf8,Engine InnoDB;

CREATE TABLE `tasks` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `task` TEXT,
    `task_date` DATETIME DEFAULT NOW(),
    `status` VARCHAR(20) DEFAULT 'new',
    `name` VARCHAR(20) DEFAULT 'unknown',
    `mail` VARCHAR(30),
    `edited` BOOL DEFAULT FALSE
) CHARACTER SET utf8;

/*INSERT INTO `users` (`name`,`mail`) VALUES ('User1','user1@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User2','user2@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User3','user3@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User4','user4@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User5','user5@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User6','user6@mail.com');*/
INSERT INTO `users` (`name`,`mail`,`group`) VALUES ('admin','admin7@mail.com','admins');


INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`,`status`) VALUES ('Task1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',NOW(),'User1','user1@mail.com','in progress');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`,`status`) VALUES ('Task2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"1:11:11"),'User1','user1@mail.com','finished');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"2:11:11"),'User2','user2@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`,`edited`) VALUES ('Task4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"3:11:11"),'User2','user2@mail.com',1);
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"4:11:11"),'User3','user3@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"5:11:11"),'User3','user3@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"6:11:11"),'User4','user4@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"7:11:11"),'User4','user4@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`,`status`) VALUES ('Task9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"8:11:11"),'User5','user5@mail.com','finished');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task10 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"9:11:11"),'User5','user5@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`) VALUES ('Task11 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"10:11:11"),'User6','user6@mail.com');
INSERT INTO `tasks` (`task`,`task_date`,`name`,`mail`,`status`,`edited`) VALUES ('Task12 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"11:11:11"),'User6','user6@mail.com','in progress',1);