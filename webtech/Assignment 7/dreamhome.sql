drop table if exists Branch ;

create table Branch
(branchno char(5) not null,
 street varchar(35),
 city varchar(10),
 postcode varchar(10),
 primary key(branchno)
);


drop table if exists Staff;

create table Staff
(staffno char(5) not null,
 fname varchar(10),
 lname varchar(10),
 position varchar(10),
 sex char(1),
 dob char(9),
 salary smallint,
 branchno char(5),
 primary key(staffno)
);

drop table if exists PropertyForRent;

create table PropertyForRent 
(propertyno char(5) not null, 
 street varchar(35), 
 city varchar(10),
 postcode varchar(10),
 type varchar(10),
 rooms smallint,
 rent int,
 ownerno char(5),
 staffno char(5),
 branchno char(5),
 primary key(propertyno)
);

drop table if exists Client;

create table Client
(clientno char(5) not null,
 fname varchar(10),
 lname varchar(10),
 telno char(15),
 preftype varchar(10),
 maxrent int,
 email char(40),
 primary key(clientno)
);


drop table if exists PrivateOwner;

create table PrivateOwner 
(ownerno char(5) not null,
 fname varchar(10),
 lname varchar(10),
 address varchar(50),
 telno char(15),
 primary key(ownerno)
);


drop table if exists Viewing;

create table Viewing
(clientno char(5) not null,
 propertyno char(5) not null,
 viewdate char(9),
 comment varchar(15),
 primary key(clientno,propertyno)
);

drop table if exists Registration;

create table Registration
(clientNo char(5) not null,
branchNo char(5) not null,
staffNo char(5),
dateJoined char(9),
primary key(clientNo,branchNo)
);

------ INSERT DATA ------

INSERT INTO Branch VALUES('B005','22 Deer Rd','London','SW1 4EH');
INSERT INTO Branch VALUES('B007','16 Argyll St','Aberdeen','AB2 3SU');
INSERT INTO Branch VALUES('B003','163 Main St','Glasgow','G11 9QX');
INSERT INTO Branch VALUES('B004','32 Manse Rd','Bristol','BS99 1NZ');
INSERT INTO Branch VALUES('B002','56 Clover Dr','London','NW10 6EU');

INSERT INTO Staff VALUES('SL21','John','White','Manager','M','1-Oct-45',300000,'B005') ;
INSERT INTO Staff VALUES('SG37','Ann','Beech','Assistant','F','10-Nov-60',12000,'B003');
INSERT INTO Staff VALUES('SG14','David','Ford','Supervisor','M','24-Mar-58',18000,'B003');
INSERT INTO Staff VALUES('SA9','Mary','Howe','Assistant','F','19-Feb-70',9000,'B007');
INSERT INTO Staff VALUES('SG5','Susan','Brand','Manager','F','3-Jun-40',24000,'B003');
INSERT INTO Staff VALUES('SL41','Julie','Lee','Assistant','F','13-Jun-65',9000,'B005');

INSERT INTO PropertyForRent VALUES('PA14','16 Holhead','Aberdeen','AB7 5SU','House',6,650,'CO46','SA9','B007');
INSERT INTO PropertyForRent VALUES('PL94','6 Argyll St','London','NW2','Flat',4,400,'CO87','SL41','B005'); 
INSERT INTO PropertyForRent VALUES('PG4','6 Lawrence St','Glasgow','G11 9QX','Flat',3,350,'CO40',null,'B003'); 
INSERT INTO PropertyForRent VALUES('PG36','2 Manor Rd','Glasgow','G32 4QX','Flat',3,375,'CO93','SG37','B003'); 
INSERT INTO PropertyForRent VALUES('PG21','18 Dale Rd','Glasgow','G12','House',5,600,'CO87','SG37','B003'); 
INSERT INTO PropertyForRent VALUES('PG16','5 Novar Dr','Glasgow','G12 9AX','Flat',4,450,'CO93','SG14','B003'); 

INSERT INTO Client VALUES('CR76','John','Kay','0171-774-5632','Flat',425,'john.kay@gmail.com');
INSERT INTO Client VALUES('CR56','Aline','Steward','0141-848-1825','Flat',350,'astewart@hotmail.com');
INSERT INTO Client VALUES('CR74','Mike','Ritchie', '01475-392178', 'House',750,'mritchie01@yahoo.co.uk');
INSERT INTO Client VALUES('CR62','Mary','Tregear','01224-196720','Flat',600,'maryt@hotmail.co.uk');

INSERT INTO PrivateOwner VALUES('CO46','Joe','Keogh','2 Fergus Dr. Aberdeen AB2 7SX','01224-861212');
INSERT INTO PrivateOwner VALUES('CO87','Carol','Farrel','6 Achray St. Glasgow G32 9DX','0141-357-7419');
INSERT INTO PrivateOwner VALUES('CO40','Tina','Murphy','63 Well St. Glasgow G42','0141-943-1728');
INSERT INTO PrivateOwner VALUES('CO93','Tony','Shaw','12 Park Pl. Glasgow G4 0QR','0141-225-7025');

INSERT INTO Viewing VALUES('CR56','PA14','24-May-08','too small');
INSERT INTO Viewing VALUES('CR76','PG4','20-Apr-08','too remote');
INSERT INTO Viewing VALUES('CR56','PG4','26-May-08',null);
INSERT INTO Viewing VALUES('CR62','PA14','14-May-08','no dining room');
INSERT INTO Viewing VALUES('CR56','PG36','28-Apr-08',null);

INSERT INTO Registration VALUES('CR76','B005','SL41','2-Jan-08');
INSERT INTO Registration VALUES('CR56','B003','SG37','11-Apr-07');
INSERT INTO Registration VALUES('CR74','B003','SG37','16-Nov-06');
INSERT INTO Registration VALUES('CR62','B007','SA9','7-Mar-07');



