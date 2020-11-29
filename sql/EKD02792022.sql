drop database if exists EKD02792022;

create database EKD02792022;

use EKD02792022;

CREATE TABLE ADMIN_LOGIN (admin_id int auto_increment primary key, email varchar(60) not null, password varchar(80) not null);


insert into ADMIN_LOGIN(email,password) values('admin@gov.com',"$2y$10$c7CFSjKUkXm8DVRFD.0jqufuNXt7modU/9aZjO6z7AY4xR/T32KPi");


CREATE TABLE Police_Officer (
    P_Officer_Id INT(10) auto_increment PRIMARY KEY NOT NULL,
    Service_ID VARCHAR(12) NOT NULL,
    P_fname VARCHAR(20) NOT NULL,
    P_lname VARCHAR(50) NOT NULL,
    Ranks VARCHAR(60) NOT NULL, 
    Officer_contact VARCHAR(12) NOT NULL,
    Police_Station VARCHAR(100) NOT NULL,
    Station_Tel VARCHAR(15) NOT NULL
);


CREATE TABLE Cases (
    Case_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    case_start_date DATE NOT NULL,
    case_end_date DATE NOT NULL,
    crime_committed VARCHAR(100) NOT NULL,
    Category_of_Offence VARCHAR(30) NOT NULL,
    Crime_time TIME NOT NULL,
    Crime_date DATE NOT NULL,
    sentence_length_Years MEDIUMINT UNSIGNED,
    Court_of_commital VARCHAR(100) NOT NULL,
    Magistrate_fname VARCHAR(30) NOT NULL,
    Magistrate_lname VARCHAR(60) NOT NULL
);



CREATE TABLE Visitor (
    visitor_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    v_fname VARCHAR(30) NOT NULL,
    v_lname VARCHAR(50) NOT NULL,
    relationship VARCHAR(30) NOT NULL,
    prisoner_name VARCHAR(60) NOT NULL,
    sex ENUM('Male', 'Female') NOT NULL,
    v_ph_number VARCHAR(13) NOT NULL,
    time_of_visit TIME NOT NULL,
    date_of_visit DATE NOT NULL,
    Prison_name VARCHAR(150) NOT NULL
);



CREATE TABLE Prisoner (
    Prisoner_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cell_block VARCHAR(10) NOT NULL,
    P_Officer_Id INT(10) NOT NULL,
    Prison_name VARCHAR(150) NOT NULL,
    Prisoner_fname VARCHAR(30) NOT NULL,
    Prisoner_lname VARCHAR(60) NOT NULL,
    DOB DATE NOT NULL,
    P_complexion VARCHAR(30) NOT NULL,
    Marital_Status ENUM('Single', 'Married') NOT NULL,
    Sex ENUM('Male', 'Female') NOT NULL,
    Height_feets DECIMAL(8 , 2 ) NOT NULL,
    Weight_kg DECIMAL(8 , 2 ) NOT NULL,
    Nationality VARCHAR(80) NOT NULL,
    Prisoner_tel VARCHAR(15) NOT NULL,
    Next_of_Kin_fname VARCHAR(20) NOT NULL,
    Next_of_Kin_lname VARCHAR(50) NOT NULL,
    Next_of_Kin_Rel VARCHAR(60) NOT NULL,
    Eye_color VARCHAR(10),
    Prisoner_status VARCHAR(30) NOT NULL,
	address_street VARCHAR(50) NOT NULL,
    address_city VARCHAR(60) NOT NULL,
    address_region VARCHAR(80) NOT NULL,
    address_postal_code VARCHAR(30) NOT NULL,
    image varchar(100) not null,
    FOREIGN KEY (P_Officer_Id)
        REFERENCES Police_Officer (P_Officer_Id)
        ON DELETE CASCADE
);


CREATE TABLE Prisoner_case (
    Case_id MEDIUMINT UNSIGNED UNIQUE NOT NULL,
    Prisoner_id INT UNSIGNED UNIQUE NOT NULL,
    Latest_Possible_Date DATE NOT NULL,
    FOREIGN KEY (Case_id)
        REFERENCES Cases (Case_id)
        ON DELETE CASCADE,
    FOREIGN KEY (Prisoner_id)
        REFERENCES Prisoner (Prisoner_id)
        ON DELETE CASCADE
);

CREATE TABLE Employees (
    Employee_ID INT UNSIGNED auto_increment  PRIMARY KEY,
    Employee_fname VARCHAR(20) NOT NULL,
    Employee_lname VARCHAR(50) NOT NULL,
    Prison_name VARCHAR(120) NOT NULL,
    Dept_name VARCHAR(100) NOT NULL,
    nationality VARCHAR(100) NOT NULL,
    work_commence_date DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    emp_tel VARCHAR(15) NOT NULL,
    Job VARCHAR(30) NOT NULL,
    sex ENUM('Male', 'Female') NOT NULL,
    Marital_Status ENUM('Single', 'Married') NOT NULL,
    level_of_education VARCHAR(100) NOT NULL,
    Salary DECIMAL(13,2) NOT NULL,
    DOB DATE NOT NULL,
    SSN VARCHAR(15) NOT NULL,
    address_street VARCHAR(50) NOT NULL,
    address_city VARCHAR(60) NOT NULL,
    address_region VARCHAR(80) NOT NULL,
    address_postal_code VARCHAR(30) NOT NULL
);

select * from prisoner;
