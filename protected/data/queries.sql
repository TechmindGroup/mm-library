ALTER TABLE `devel_yii`.`materials`
CHANGE COLUMN `code` `code` VARCHAR(20) NOT NULL COMMENT 'αριθμος κώδικα' ;

ALTER TABLE `devel_yii`.`material_composition`
RENAME TO  `devel_yii`.`material_composition_items` ;

CREATE TABLE `devel_yii`.`material_compositions` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_id` BIGINT(20) UNSIGNED NOT NULL,
  `department_id` INT(10) UNSIGNED NOT NULL,
  `documentary_number` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `index2` (`material_id` ASC),
  INDEX `index3` (`department_id` ASC));

ALTER TABLE `devel_yii`.`material_compositions`
ADD CONSTRAINT `fk_material_compositions_1`
  FOREIGN KEY (`material_id`)
  REFERENCES `devel_yii`.`materials` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `devel_yii`.`material_compositions`
ADD CONSTRAINT `fk_material_compositions_2`
  FOREIGN KEY (`department_id`)
  REFERENCES `devel_yii`.`departments` (`id`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;
