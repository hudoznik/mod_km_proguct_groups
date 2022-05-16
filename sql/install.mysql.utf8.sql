CREATE TABLE `#__ksenmart_products_groups`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `prod_id` INT NOT NULL,
    `prod_id_group` INT NOT NULL,
    `params` MEDIUMTEXT NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;


UPDATE 
	`#__modules` 
SET 
	`title` = 'Группировка товаров', 
	`position` = 'ks-products-groups', 
	`published` = '1'
WHERE 
	`module` = 'mod_km_proguct_groups'
;
INSERT INTO 
	`#__modules_menu` 
	(
		`moduleid`, 
		`menuid`
	) 
VALUES (
	(SELECT `id` FROM `#__modules` WHERE `module` = 'mod_km_proguct_groups'), 
	'0'
);