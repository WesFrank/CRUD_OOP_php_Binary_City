<!--CREATE TABLE Users (-->
<!--    users_id int(11) AUTO_INCREMENT PRIMARY Key not null,-->
<!--    users_uid TINYTEXT not null,-->
<!--    users_pwd LONGTEXT not null,-->
<!--    users_email TINYTEXT not null,-->
<!--    users_name TINYTEXT DEFAULT 0 not null,-->
<!--    users_surname TINYTEXT DEFAULT 0 not null,-->
<!--    users_mobile VARCHAR(16) DEFAULT 0 not null,    -->
<!--    users_idnumber VARCHAR(16) DEFAULT 0 not null,-->
<!--    users_dob TINYTEXT DEFAULT 0 not null,-->
<!--    users_picture varchar(255) DEFAULT 0 not null,-->
<!--    pwdResetSelector TEXT NOT NULL,-->
<!--    pwdResetToken LONGTEXT NOT NULL,-->
<!--    pwdResetExpires TEXT NOT NULL,-->
<!--    AccAct TINYINT NOT NULL DEFAULT 0-->
<!--)-->

<!--CREATE TABLE Client (-->
<!--    client_id int(11) AUTO_INCREMENT PRIMARY Key not null,-->
<!--    client_name varchar(255) NOT NULL,-->
<!--    client_surname varchar(255) NOT NULL,-->
<!--    client_email varchar(255) NOT NULL,-->
<!--    client_code varchar(255) NOT NULL,-->
<!--    number_of_linked_contacts INT(11) NOT NULL DEFAULT 0,-->
<!--    last_changed_by_username varchar(255) NOT NULL-->
<!--)-->