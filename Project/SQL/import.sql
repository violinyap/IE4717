INSERT INTO `Patients` (`userid`, `name`, `image`, `contact`, `nric`, `signupdate`, `birthday`, `email`, `password`) VALUES
(1, 'dkj', 'img', '1231-2332', '21321', '2022-10-26', '2022-10-07', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Patient 1', 'img', '1231-2332', '21321', '2022-10-26', '2022-10-07', 'patient@ntu.com', '098f6bcd4621d373cade4e832627b4f6');



INSERT INTO `Doctors` (`doctorid`, `name`, `description`, `clinicid`, `image`, `contact`, `joindate`, `certexp`, `email`, `password`) VALUES
(1, 'Dr. Tan', 'Professional doctor ', 1, 'img', '1233-2323', '2022-10-07', '2027-10-20', 'doc.tan@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Dr. Stanford', 'Professional doctor ', 1, 'img', '1233-2323', '2022-10-07', '2027-10-20', 'doc.stan@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Dr. Tasha', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.tash@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'Dr. Strange', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.strange@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'Dr. Kang', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.kang@clinic.com', '098f6bcd4621d373cade4e832627b4f6');

INSERT INTO `Clinics` (`clinicid`, `name`, `location`, `contact`) VALUES
(1, 'NTU Clinic Fullerton', 'Fullerton@NTU', '1233-2323'),
(2, 'NTU Clinic Raffles', 'Raffles@NTU', '1233-2323');
