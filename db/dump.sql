CREATE TABLE `users` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `mail` VARCHAR(255)
)Engine InnoDB;

CREATE TABLE `tasks` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `task` TEXT,
    `task_date` DATETIME NOT NULL,
    `user_id` INTEGER NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
)Engine InnoDB;

INSERT INTO `users` (`name`,`mail`) VALUES ('User1','user1@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User2','user2@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User3','user3@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User4','user4@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User5','user5@mail.com');
INSERT INTO `users` (`name`,`mail`) VALUES ('User6','user6@mail.com');


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