CREATE TABLE `CCE_PHPMySQL2`.`tokens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(255) NULL,
  `userid` INT NULL,
  `creationDateTime` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDateTime` DATETIME NULL,
  `expirationDateTime` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC));