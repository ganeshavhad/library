
//date=27/07/2018

ALTER TABLE `book` CHANGE `bookcatID` `bookcatID` VARCHAR(100) NOT NULL;

//date=30-07-2018

ALTER TABLE `payment`
  DROP `paymentmonth`,
  DROP `paymentyear`;

  ALTER TABLE `payment` ADD `bookID` VARCHAR(100) NOT NULL AFTER `paymentdate`;

  -/date=31-07-2018
  
  ALTER TABLE `issue` CHANGE `book` `book` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
  ALTER TABLE `book` CHANGE `page` `page` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
  ALTER TABLE `book` CHANGE `receipt` `receipt` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;


//date 04-aug-2018

ALTER TABLE `payment` CHANGE `studentID` `studentID` VARCHAR(11) NOT NULL;
ALTER TABLE `payment` ADD `bank_name` VARCHAR(100) NOT NULL AFTER `bookID`, ADD `account_no` VARCHAR(100) NOT NULL AFTER `bank_name`, ADD `reference_no` VARCHAR(100) NOT NULL AFTER `account_no`;
ALTER TABLE `payment` ADD `cheque_no` VARCHAR(100) NULL DEFAULT NULL AFTER `bank_name`;

//06-aug-2018 
ALTER TABLE `mst_audit_log` ADD `id` INT(10) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);
ALTER TABLE `trans_roles` ADD `tran_role_id` INT(10) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`tran_role_id`);
ALTER TABLE `trans_roles` ADD `role_name` VARCHAR(100) NOT NULL AFTER `role_id`;
ALTER TABLE `trans_roles` ADD `tran_role_id` INT(10) NOT NULL FIRST, ADD `role_id` INT(10) NOT NULL AUTO_INCREMENT AFTER `tran_role_id`, ADD PRIMARY KEY (`role_id`);
ALTER TABLE `trans_std_div_mapping` ADD `id` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);
ALTER TABLE `trans_issue` ADD `issueID` INT(10) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`issueID`);

//8-8-2018
ALTER TABLE `trans_payment` ADD `cheque_date` VARCHAR(100) NULL DEFAULT NULL AFTER `cheque_no`; 