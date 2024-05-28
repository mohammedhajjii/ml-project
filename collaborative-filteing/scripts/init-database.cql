-- Create a keyspace
CREATE KEYSPACE IF NOT EXISTS CF_keyspace WITH REPLICATION = {'class': 'SimpleStrategy', 'replication_factor': 1};

-- Create a table
CREATE TABLE IF NOT EXISTS CF_keyspace.rating_by_user (
    userId int,
    bookId int,
    rating float,

    primary key ( (userId), bookId, rating )
);

CREATE TABLE IF NOT EXISTS CF_keyspace.rating_by_book (
    bookId int,
    userId int,
    rating float,

    primary key ( (bookId), userId, rating )
);

CREATE TABLE IF NOT EXISTS CF_keyspace.books (
    isbn text,
    bookId int,
    title text,
    author text,
    year int,
    publisher text,
    image_s text,
    image_m text,
    image_l text,
    primary key ( (bookId), isbn, title, author, year, publisher, image_s, image_m, image_l )
);


CREATE TABLE IF NOT EXISTS CF_keyspace.users (
    userId int,
    city text,
    country text,
    primary key ( (userId), city, country )
);



COPY CF_keyspace.rating_by_user(userId, bookId, rating) FROM '/data/rating_by_user.csv' WITH DELIMITER=',' AND HEADER=true;
COPY CF_keyspace.rating_by_book(bookId, userId, rating) FROM '/data/rating_by_book.csv' WITH DELIMITER=',' AND HEADER=true;
COPY CF_keyspace.users(userId, city, country) FROM '/data/users.csv' WITH DELIMITER=',' AND HEADER=true;
COPY CF_keyspace.books(isbn, bookId, title, author, year, publisher, image_s, image_m, image_l) FROM '/data/books.csv' WITH DELIMITER=',' AND HEADER=true;