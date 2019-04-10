ALTER TABLE `fise_medicale` ADD `id_pacient` INT(255) NOT NULL AFTER `tip_fisa`;
ALTER TABLE `fise_medicale` ADD `id_utilizator` INT(255) NOT NULL AFTER `id_spital`;
ALTER TABLE `fise_medicale` ADD CONSTRAINT `medic` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `fise_medicale` CHANGE `trimisa` `trimisa` TINYINT(1) NOT NULL DEFAULT '0';
