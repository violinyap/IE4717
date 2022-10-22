create table Appointments
( 
  appointmentID int unsigned not null auto_increment primary key,
  location char(200) not null,
  doctor char(100) not null,
  date date not null,
  time time not null,
  timeCompleted time not null,
  paid_status boolean not null,
  book_status boolean not null
);