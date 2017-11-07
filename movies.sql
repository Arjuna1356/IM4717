use f37ee;

create table movies
  (movieID int unsigned not null primary key,
   movieName char(50) not null,
   movieDate DATE not null,
   movieTime TIME not null);

insert into movies values
  (111, "Kingsman: The Golden Circle", "10/11/2017", "9.00pm"),
  (112, "Kingsman: The Golden Circle", "10/11/2017", "10.00pm"),
  (113, "Kingsman: The Golden Circle", "11/11/2017", "3.00pm"),
  (114, "Kingsman: The Golden Circle", "11/11/2017", "5.00pm"),
  (221, "It", "10/11/2017", "4.30pm"),
  (222, "It", "10/11/2017", "9.30pm"),
  (223, "It", "11/11/2017", "1.30pm"),
  (224, "It", "11/11/2017", "11.30pm");
