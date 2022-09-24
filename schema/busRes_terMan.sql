DROP SCHEMA IF EXISTS busRes_terMang;
CREATE SCHEMA busRes_terMang;
USE busRes_terMang;

    create table TERMINAL (
        TERMINAL_ID integer not null auto_increment,
        TERMINAL_NAME varchar(50) not null,
        TERMINAL_CITY varchar(30) not null,
        TERMINAL_ADDRESS varchar(100) not null,
        TERMINAL_PHONE varchar(20),
        primary key (TERMINAL_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


    create table USER (
        USER_ID integer not null auto_increment,
        USER_USERNAME varchar(60) not null,
        USER_PASSWORD varchar(60) not null,
        USER_FULLNAME varchar(50) not null,
        USER_PHONE varchar(20) not null,
        USER_TYPE varchar(20) not null,
        USER_CNIC varchar(20) not null,
        TERMINAL_ID integer not null,
        -- add constraint USER_TERMINAL_FK 
        foreign key (TERMINAL_ID) 
        references TERMINAL (TERMINAL_ID),
        primary key (USER_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table CUSTOMER (
        CUSTOMER_ID integer not null auto_increment,
        CUSTOMER_USERNAME varchar(60) not null,
        CUSTOMER_PASSWORD varchar(60) not null,
        CUSTOMER_NAME varchar(50) not null,
        CUSTOMER_PHONE varchar(20) not null,
        CUSTOMER_EMAIL varchar(30),
        CUSTOMER_CNIC varchar(20) not null,
        primary key (CUSTOMER_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table BUS (
        BUS_ID integer not null auto_increment,
        PLATE_NO varchar(12) not null,
        primary key (BUS_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table SCHEDULE (
        SCHEDULE_ID integer not null auto_increment,
        BUS_ID integer not null,
        SOURCE varchar(50) not null,
        DESTINATION varchar(50) not null,
        -- add constraint SCHEDULE_BUS_FK 
        foreign key (BUS_ID) 
        references BUS (BUS_ID),
        primary key (SCHEDULE_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table SEAT_MANAGER (
        SEAT_MANAGER_ID integer not null auto_increment,
        SCHEDULE_ID integer not null,
        _DATE date not null,
        AVAILABLE_SEAT integer not null,
        -- add constraint SEAT_MANAGER_SCHEDULE_FK 
        foreign key (SCHEDULE_ID) 
        references SCHEDULE (SCHEDULE_ID),
        primary key (SEAT_MANAGER_ID, SCHEDULE_ID, _DATE)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table ROUTE (
        ROUTE_ID integer not null auto_increment,
        FROM_TERMINAL varchar(30),
        TO_TERMINAL varchar(30),
        SCHEDULE_ID integer not null,
        DEPARTURE_TIME Time,
        ARRIVAL_TIME Time,
        ROUTE_FARE integer,
        -- add constraint ROUTE_SCHEDULE_FK 
        foreign key (SCHEDULE_ID)
        references SCHEDULE (SCHEDULE_ID),
                
        primary key (ROUTE_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


    create table TICKET (
        TICKET_ID integer not null auto_increment,
        ROUTE_ID integer not null,
        CUSTOMER_ID integer not null,
        NUMBER_OF_SEATS integer,
        
        -- add constraint TICKET_ROUTE_FK 
        foreign key (ROUTE_ID) 
        references ROUTE (ROUTE_ID),
        
        -- add constraint COSTOMER_TICKET_FK 
        foreign key (CUSTOMER_ID) 
        references CUSTOMER (CUSTOMER_ID),
        
        primary key (TICKET_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



    create table PAYMENT (
        PAYMENT_ID integer not null auto_increment,
        TICKET_ID integer not null,
        AMOUNT integer not null,
        SOURCE_OF_PAYMENT ENUM('cash', 'credit card'),
        
        -- add constraint PAYMENT_TICKET_FK 
        foreign key (TICKET_ID) 
        references TICKET (TICKET_ID),
        
        primary key (PAYMENT_ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;