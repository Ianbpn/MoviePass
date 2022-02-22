create database if not exists Moviepass;
use Moviepass;

create table if not exists cinemas(
    id_cinema int unsigned auto_increment,
    cinema_name varchar(50) not null,
    address varchar(50),
    entrance_value int unsigned,

    constraint pk_id_cinema primary key (id_cinema)
);

create table if not exists rooms(
    id_room int unsigned auto_increment,
    id_cinema int unsigned not null,
    room_capacity int not null,
    room_name varchar(20),
    constraint pk_id_room primary key (id_room),
    constraint fk_id_cinema foreign key (id_cinema) references cinemas (id_cinema)
);

create table if not exists functions(
    id_function int unsigned auto_increment,
    id_room int unsigned,
    id_movie int unsigned,
    f_day date,
    f_time time,
    constraint pk_id_function primary key (id_function),
    constraint fk_id_movie foreign key (id_movie) references movies (id_movie),
    constraint fk_id_room foreign key (id_room) references rooms (id_room)
);

create table if not exists schedules(
    id_schedule int unsigned auto_increment,
    f_time char(5),

    constraint pk_id_schedule primary key (id_schedule)
);

create table if not exists clients(
    id_client int unsigned auto_increment,
    id_profile int unsigned,
    id_role int unsigned,
    username varchar(50),
    passw varchar(30) not null,
    constraint pk_id_client primary key (id_client,username),
    constraint fk_id_profile foreign key (id_profile) references profiles (id_profile),
    constraint fk_id_role foreign key (id_role) references roles (id_role)
);

create table if not exists profiles(
    id_profile int unsigned auto_increment,
    id_client int unsigned not null,
    surname varchar(30),
    firstname varchar(30),
    dni int unsigned,

    constraint pk_id_profile primary key (id_profile),
    constraint fk_id_client foreign key (id_client) references clients (id_client)
);


create table if not exists roles(
    id_role int unsigned auto_increment,
    description varchar(50) not null,

    constraint pk_id_role primary key (id_role)
);

create table if not exists movies (
id_movie int not null,
backdrop_path varchar(50),
original_title varchar(50),
yt_path text,
vote_average int,
release_date date,
overview text,
constraint pk_id_movie primary key (id_movie)
);

create table if not exists yt_paths(
id_movie int unsigned not null,
yt_path text,

constraint fk_id_movie foreign key (id_movie) references movies (id_movie)
);

create table if not exists movie_genre(
id_genre int unsigned auto_increment,
genreType varchar(20),

constraint pk_id_genre primary key (id_genre)
);

create table if not exists genre_x_movie(
id_genre int unsigned,
id_movie int unsigned,
constraint fk_id_movie foreign key (id_movie) references movies (id_movie),
constraint fk_id_genre foreign key (id_genre) references movie_genre (id_genre)
);

create table if not exists purchases(
    id_purchase int unsigned auto_increment,
    purchase_date date,
    ticketQuantity int unsigned,
    total_price float unsigned,
    discount tinyint unsigned,

    constraint pk_id_purchase primary key (id_purchase)
);

create table if not exists tickets(
    id_ticket int unsigned auto_increment,
    id_movie int unsigned not null,
    id_cinema int unsigned not null,
    id_room int unsigned not null,
    day date,
    time time,
    constraint pk_id_ticket primary key (id_ticket),
    constraint fk_id_movie foreign key (id_movie) references movies (id_movie)
    constraint fk_id_cinema foreign key (id_cinema) references cinemas (id_cinema)
    constraint fk_id_room foreign key (id_room) references rooms (id_room)
);

create table if not exists purchases_x_tickets(
    id_purchase int unsigned,
    id_ticket int unsigned,

    constraint fk_id_purchase foreign key (id_purchase) references purchases (id_purchase),
    constraint fk_id_ticket foreign key (id_ticket) references tickets (id_ticket)
);
create table if not exists purchases_x_clients(
    id_purchase int unsigned,
    id_client int unsigned,

    constraint fk_id_purchase foreign key (id_purchase) references purchases (id_purchase),
    constraint fk_id_client foreign key (id_client) references clients (id_client)
);

insert into roles(description)
values("Administrator");
insert into roles(description)
values("Standard User");

insert into clients (id_profile,id_role,username,passw)
values (1,1,"admin",1234);
insert into profiles (id_client,surname,firstname,dni)
values (1,"Pereyra","Ian",41333069);

insert into yt_paths(id_movie, yt_path)
values (475557, '<iframe width="560" height="315" src="https://www.youtube.com/embed/IfB65qjLbwc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (290859, '<iframe width="560" height="315" src="https://www.youtube.com/embed/oxy8udgWRmo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (423204, '<iframe width="560" height="315" src="https://www.youtube.com/embed/isVtXH7n9lI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (458897, '<iframe width="560" height="315" src="https://www.youtube.com/embed/voYLots_ZOg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (568012, '<iframe width="560" height="315" src="https://www.youtube.com/embed/S8_YwFLCh4U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (453405, '<iframe width="560" height="315" src="https://www.youtube.com/embed/UsSNKLJ7eU4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (420809, '<iframe width="560" height="315" src="https://www.youtube.com/embed/gwYr6uqa5DM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (359724, '<iframe width="560" height="315" src="https://www.youtube.com/embed/kqE0Q_4AB20" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (559969, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Bi3mMWw_cJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (501170, '<iframe width="560" height="315" src="https://www.youtube.com/embed/z2TuPJxTEi4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (499701, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Gf_euYv2ktU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (480105, '<iframe width="560" height="315" src="https://www.youtube.com/embed/AO-aGVCMf5U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (458156, '<iframe width="560" height="315" src="https://www.youtube.com/embed/-CVqvdgLHm8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (521777, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Q7t4qPwlPas" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (496243, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Kr9vLVlkIG4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (338967, '<iframe width="560" height="315" src="https://www.youtube.com/embed/bKLpU-p8Zlo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (522162, '<iframe width="560" height="315" src="https://www.youtube.com/embed/JJ1CX0d4E8s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (504949, '<iframe width="560" height="315" src="https://www.youtube.com/embed/iuDYSdRnIHk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (454640, '<iframe width="560" height="315" src="https://www.youtube.com/embed/AQZPnB3piDc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (474350, '<iframe width="560" height="315" src="https://www.youtube.com/embed/woh3bk8DXVo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
       (508965, '<iframe width="560" height="315" src="https://www.youtube.com/embed/tmcNIcZSE2U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');      

insert into schedules (f_time)
values ('10:30'), ('14:00'), ('18:00'), ('22:00');