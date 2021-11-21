database vg_assignments_tracker;

drop table if exists vg_assignments cascade;
drop table if exists vg_attachments;

create table vg_assignments(
    id int generated always as identity,
    title varchar(256) not null,
    subject varchar(256) not null,
    description text not null,
    created_at timestamp default current_timestamp,

    primary key(id)
);

create table vg_attachments(
    id int generated always as identity,
    ass_id int not null,
    url varchar(256) not null,

    primary key(id),
    constraint fk_assignments
        foreign key(ass_id)
            references vg_assignments(id)
            on delete cascade
            on update no action
);

-- Dev mode only!
insert into vg_assignments (title, subject, description) values ('Ass1', 'Biology', 'Biology description...');
insert into vg_assignments (title, subject, description) values ('Ass2', 'Chemistry', 'Chemistry description...');
insert into vg_assignments (title, subject, description) values ('Ass3', 'Math', 'Math description...');
insert into vg_assignments (title, subject, description) values ('Ass4', 'Physics', 'Physics description...');

insert into vg_attachments(ass_id, url) values (3, 'some/url');
insert into vg_attachments(ass_id, url) values (1, 'some/url');

