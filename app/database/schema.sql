database vg_assignments_tracker;

-- you shouldn't need to prefix your table names inside your app's database =]
-- Also, I generally like to create a separate folder with my schema stuff, but it's up to you... Perhaps
-- in this scenario, the right answer is to put your Database.php in your models folder or maybe a `core`
-- folder for your app? I'll comment more on that piece of organization in the PR 👍

drop table if exists vg_assignments cascade; -- I didn't know you could cascade on a drop table! Nice! =]
drop table if exists vg_attachments;

create table vg_assignments(
    -- aaaaaand I learned ANOTHER trick in MySQL today! `generated always` huh? Nice!
    -- Is there any reason why you chose to `generated always` rather than the good ol' faithful
    -- `id INT unsigned NOT NULL AUTO_INCREMENT` ? I'm curious =]
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
    constraint fk_assignments   -- for this app, the name of your constraint here is fine, but what if you have
                                -- multiple fk constraints? My preference is `fk_vg_assignments_assignments_id` since
                                -- you'll only point one column from THIS table to the other (fk_{dest_table_name}_{dest_column_name})
        foreign key(ass_id)
            references vg_assignments(id)
            on delete cascade
            on update no action
);

-- Dev mode only!
-- if this is for dev mode only, go ahead and put these in a separate sql file so you don't have to delete them when
-- you build the app on a new server ;)
insert into vg_assignments (title, subject, description) values ('Ass1', 'Biology', 'Biology description...');
insert into vg_assignments (title, subject, description) values ('Ass2', 'Chemistry', 'Chemistry description...');
insert into vg_assignments (title, subject, description) values ('Ass3', 'Math', 'Math description...');
insert into vg_assignments (title, subject, description) values ('Ass4', 'Physics', 'Physics description...');

insert into vg_attachments(ass_id, url) values (3, 'some/url');
insert into vg_attachments(ass_id, url) values (1, 'some/url');

