create database project;
use project;

create table Doctors
( doctorid int unsigned not null auto_increment primary key,
  name char(255) not null,
  description text null,
  clinicid int not null,
  image char(100) not null,
  contact char(10) not null,
  joindate date not null,
  certexp date not null,
  email char(100) not null,
  password char(255) not null
);

create table Patients
( userid int unsigned not null auto_increment primary key,
  name char(255) not null,
  image char(100) not null,
  contact char(10) not null,
  nric char(10) not null,
  signupdate date not null,
  birthday date not null,
  email char(100) not null,
  password char(255) not null
);

create table Appointments
( 
  appointmentID int unsigned not null auto_increment primary key,
  userid int not null,
  location char(200) not null,
  doctor char(100) not null,
  date date not null,
  time time not null,
  timeCompleted time not null,
  paid_status boolean not null,
  book_status boolean not null
);

create table Clinics
( clinicid int unsigned not null auto_increment primary key,
  name char(255) not null,
  location char(255) null,
  contact char(50) not null,
  doctorsid text not null
);

