create table Doctors
( doctorid int unsigned not null auto_increment primary key,
  name char(255) not null,
  description char(500) null,
  clinicid int not null,
  image char(100) not null,
  contact char(10) not null,
  joindate int not null,
  certexp int not null,
  email char(100) not null,
  password char(255) not null,
);

create table Patients
( userid int unsigned not null auto_increment primary key,
  name char(255) not null,
  image char(100) not null,
  contact char(10) not null,
  nric char(10) not null,
  signupdate int not null,
  birthday int not null,
  email char(100) not null,
  password char(255) not null,
);

create table Appointments
( apptid int unsigned not null auto_increment primary key,
  doctorid int not null,
  userid int not null,
  date int not null,
  time int not null,
  completetime int not null,
  paid_status boolean not null,
  book_status boolean not null,
);


create table Clinics
( clinicid int unsigned not null auto_increment primary key,
  name char(255) not null,
  location char(500) null,
  contact char(50) not null,
  doctorsid int ARRAY[100] not null,
);

