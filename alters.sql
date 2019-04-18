ALTER TABLE `fise_medicale` ADD `id_pacient` INT(255) NOT NULL AFTER `tip_fisa`;
ALTER TABLE `fise_medicale` ADD `id_utilizator` INT(255) NOT NULL AFTER `id_spital`;
ALTER TABLE `fise_medicale` ADD CONSTRAINT `medic` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `fise_medicale` CHANGE `trimisa` `trimisa` TINYINT(1) NOT NULL DEFAULT '0';

ALTER TABLE `fise_medicale` CHANGE `id_spital` `id_spital` INT(255) NULL DEFAULT NULL;
ALTER TABLE `fise_medicale` CHANGE `id_utilizator` `id_utilizator` INT(255) NULL DEFAULT NULL;
ALTER TABLE `fise_medicale` ADD INDEX(`id_utilizator`);
ALTER TABLE `fise_medicale` DROP FOREIGN KEY `medic`; ALTER TABLE `fise_medicale` ADD CONSTRAINT `medic` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori`(`id`) ON DELETE SET NULL ON UPDATE CASCADE;


ALTER TABLE `pacienti` ADD `pin` VARCHAR(32) NOT NULL AFTER `email`;

ALTER TABLE `pacienti` ADD `grupa_sange` VARCHAR(10) NOT NULL AFTER `parola`, ADD `rh` TINYINT(1) NOT NULL AFTER `grupa_sange`, ADD `acord_fisa` TINYINT(1) NOT NULL AFTER `rh`, ADD `donator` TINYINT(1) NOT NULL AFTER `acord_fisa`;

