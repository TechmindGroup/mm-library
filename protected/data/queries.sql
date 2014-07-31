ALTER TABLE `devel_yii`.`my_department`
CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL ,
ADD COLUMN `default` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `ea`,
ADD UNIQUE INDEX `name_UNIQUE` (`name` ASC),
ADD INDEX `index3` (`default` ASC);

ALTER TABLE `devel_yii`.`department_materials`
DROP FOREIGN KEY `fk_department_materials_3`;
ALTER TABLE `devel_yii`.`department_materials`
ADD CONSTRAINT `fk_department_materials_3`
  FOREIGN KEY (`department_id`)
  REFERENCES `devel_yii`.`my_department` (`id`)
  ON UPDATE CASCADE;

ALTER TABLE `devel_yii`.`department_materials_unsorted`
DROP FOREIGN KEY `fk_department_materials_unsorted_3`;
ALTER TABLE `devel_yii`.`department_materials_unsorted`
ADD CONSTRAINT `fk_department_materials_unsorted_3`
  FOREIGN KEY (`department_id`)
  REFERENCES `devel_yii`.`my_department` (`id`)
  ON UPDATE CASCADE;

ALTER TABLE `devel_yii`.`material_composition_items`
DROP FOREIGN KEY `fk_material_composition_1`;
ALTER TABLE `devel_yii`.`material_composition_items`
ADD CONSTRAINT `fk_material_composition_1`
  FOREIGN KEY (`department_id`)
  REFERENCES `devel_yii`.`my_department` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `devel_yii`.`material_compositions`
DROP FOREIGN KEY `fk_material_compositions_2`;
ALTER TABLE `devel_yii`.`material_compositions`
ADD CONSTRAINT `fk_material_compositions_2`
  FOREIGN KEY (`department_id`)
  REFERENCES `devel_yii`.`my_department` (`id`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;

DROP TABLE `devel_yii`.`departments`;

ALTER TABLE `devel_yii`.`my_department`
RENAME TO  `devel_yii`.`departments` ;


//----------
INSERT INTO `devel_yii`.`departments`
(`id`,`name`,`abbreviation`,`administration`,`administration_abbreviation`,`formation`,
`code`,`address`,`city`,`code_completion`,`ea`,`default`)
VALUES
(1,'','','','','','','','','','',1);
ALTER TABLE `devel_yii`.`departments`
AUTO_INCREMENT = 2 ;
