CREATE TABLE `users` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `mail` VARCHAR(255),
    `group` VARCHAR(8) DEFAULT 'users',
    `password` VARCHAR(255)
)Engine InnoDB;

CREATE TABLE `tasks` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `task` TEXT,
    `task_date` DATETIME DEFAULT NOW(),
    `status` VARCHAR(15) DEFAULT 'new',
    `user_id` INTEGER NOT NULL,
    `edited` BOOL DEFAULT FALSE,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
)Engine InnoDB;

INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User1','user1@mail.com','$2y$10$bzNseQPx55mSvAXuTy0taOOs2pQJdOCCndosKsqugq7yuFZTgxHXK');
INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User2','user2@mail.com','$2y$10$KAEM4PNSvJHPwI2gj9SnwOCrMNv8wYiX4WX3JuJmq2qadInZwYXWq');
INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User3','user3@mail.com','$2y$10$x9KqImLXE61pv05WHFZN0uEkkkP14VPm3aB3ihnbJLSPR9xk97JUm');
INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User4','user4@mail.com','$2y$10$PpdmyvYiajl7/ohtX9dIYOHJ2ULIRtbKu1ztEPd60XHWbZFZTxtwm');
INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User5','user5@mail.com','$2y$10$Pp6aZK.TF1/3JqqSZZW5h.hC23b2YVlhqJLk/Diun2P2qpQvISyG.');
INSERT INTO `users` (`name`,`mail`,`password`) VALUES ('User6','user6@mail.com','$2y$10$PM1ksGxh9OhFe5kvg3GmouGdBfmAlVPbD2Pc9kiXK0DdC..K7Do6C');
INSERT INTO `users` (`name`,`mail`,`group`,`password`) VALUES ('admin','admin7@mail.com','admins','$2y$10$WLqvJrAIFMoyxkQNRUsbae7YneFaN2rFqnrdAXhllk69AaoCkHgdK');


INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',NOW(),1);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"1:11:11"),1);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"2:11:11"),2);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"3:11:11"),2);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"4:11:11"),3);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"5:11:11"),3);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"6:11:11"),4);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"7:11:11"),4);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"8:11:11"),5);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task10 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"9:11:11"),5);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task11 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"10:11:11"),6);
INSERT INTO `tasks` (`task`,`task_date`,`user_id`) VALUES ('Task12 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consequatur doloribus delectus dolorum quidem facere aspernatur distinctio earum illum nulla nihil, recusandae nobis natus eaque unde reiciendis soluta! Nam, pariatur!',ADDTIME(NOW(),"11:11:11"),6);