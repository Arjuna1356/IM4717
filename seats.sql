use f37ee;

create table seats
  (seatID char(2) not null primary key,
   seatRow int not null,
   seatCol char(1) not null
 );

 insert into seats values
   ("1A", 1, "A"),
   ("1B", 1, "B"),
   ("1C", 1, "C"),
   ("1D", 1, "D"),
   ("1E", 1, "F"),
   ("2A", 2, "A"),
   ("2B", 2, "B"),
   ("2C", 2, "C"),
   ("2D", 2, "D"),
   ("2E", 2, "F"),
   ("3A", 3, "A"),
   ("3B", 3, "B"),
   ("3C", 3, "C"),
   ("3D", 3, "D"),
   ("3E", 3, "F"),
   ("4A", 4, "A"),
   ("4B", 4, "B"),
   ("4C", 4, "C"),
   ("4D", 4, "D"),
   ("4E", 4, "F"),
   ("5A", 5, "A"),
   ("5B", 5, "B"),
   ("5C", 5, "C"),
   ("5D", 5, "D"),
   ("5E", 5, "F");
