appointmentTable.sql

- to create table in project db (for now)

bookappointment.php

- submit button proceed to appointmentsuccessful.php
- after pressing button, view in myappointment.php tab (retrieval)
- cancel button proceed to appointmentunsuccessful.php
- after pressing button, view in payment.php tab (retrieval)
- additional files used for logic: appointmentRetrieval.php, preappoinmentRetrieval.php
- to-do
- dynamic selection in multi-page form
- send an email after clicking 'submit' button only

editappointment.php (tbc for Violin)

- accessed from 'edit' button from myappointment.php
- to-do:
- after completing form, change appointment timing in db
- cancel(delete) appointment booking upon clicking cancel button

payment.php (ignore for now)

- accessed from sidepanel
- to-do:
- clicking pay changes payment_status from 0 to 1 and send the email details to patient
- cancel(delete) pre-appointment booking upon clicking cancel button

patient/profile.php (tbc for Violin)

- updated as php file so username, email, etc. can be retrieved after logging in

editpatient/profile.php

- created as form
- to-do: clicking change after completing form will update in Patients' db

MOCK ACCOUNTS: (import patients.sql)
patient@ntu.com (pass: test)
admin@gmail.com (pass: admin)

doctors accounts: pass:test
