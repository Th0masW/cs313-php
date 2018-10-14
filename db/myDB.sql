
create table state (
ID		SERIAL PRIMARY KEY,
STATE   varchar(2)
);

INSERT INTO state (STATE) VALUES ('AL'),('AK'),('AZ'),('AR'),('CA'),('CO'),('CT'),('DE'),('FL'),('GA'),('HI'),('ID'),('IL'),('IN'),('IA'),('KS'),('KY'),('LA'),('ME'),('MD'),('MA'),('MI'),('MN'),('MS'),('MO'),('MT'),('NE'),('NV'),('NH'),('NJ'),('NM'),('NY'),('NC'),('ND'),('OH'),('OK'),('OR'),('PA'),('RI'),('SC'),('SD'),('TN'),('TX'),('UT'),('VT'),('VA'),('WA'),('WV'),('WI'),('WY');

create type sex as enum ('Male', 'Female','Other');
create table gender (
ID		SERIAL PRIMARY KEY,
Gender sex
);

create table annoying_people (
ID		SERIAL PRIMARY KEY,
TIME	date NOT NULL,
Gender int REFERENCES gender(ID),
State int REFERENCES state(ID)
);

create type busy as enum ('Dead', 'Slow','Steady', 'Busy', 'B2B');
create table busy_types (
ID		SERIAL PRIMARY KEY,
BusyTpes busy
);

create table bizzy (
ID		SERIAL PRIMARY KEY,
TIME	timestamp,
Busy  	int REFERENCES busy_types(ID)
);

create table time (
ID		SERIAL PRIMARY KEY,
today			timestamp,
break_out		timestamp,
break_in		timestamp,
lunch_out		timestamp,
lunch_in		timestamp,
latebreak_out 	timestamp,
latebreak_in	timestamp
);