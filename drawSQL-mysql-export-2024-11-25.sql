CREATE TABLE `category`(
    `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(255) NOT NULL,
    `status` INT NOT NULL DEFAULT '1'
);
ALTER TABLE
    `category` ADD UNIQUE `category_category_name_unique`(`category_name`);
CREATE TABLE `contact`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `status` INT NOT NULL
);
CREATE TABLE `content`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `image` VARCHAR(255) NULL,
    `category` INT NOT NULL,
    `author` INT NOT NULL,
    `status` INT NOT NULL,
    `date` TIMESTAMP NOT NULL
);
CREATE TABLE `pages`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL
);
CREATE TABLE `feedback`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `message` TEXT NOT NULL,
    `date` TIMESTAMP NOT NULL
);
CREATE TABLE `users`(
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `role` INT NOT NULL,
    `date` TIMESTAMP NOT NULL
);
ALTER TABLE
    `users` ADD UNIQUE `users_password_unique`(`password`);
ALTER TABLE
    `content` ADD CONSTRAINT `content_author_foreign` FOREIGN KEY(`author`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `content` ADD CONSTRAINT `content_category_foreign` FOREIGN KEY(`category`) REFERENCES `category`(`category_id`);