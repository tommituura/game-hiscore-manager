CREATE SCHEMA gamemanager;

CREATE SEQUENCE gamemanager.game_id_seq;

CREATE TABLE gamemanager.game (
    id INTEGER PRIMARY KEY DEFAULT nextval('gamemanager.game_id_seq'),
    name VARCHAR(50)
);

CREATE SEQUENCE gamemanager.score_id_seq;

CREATE TABLE gamemanager.score (
    id INTEGER PRIMARY KEY DEFAULT nextval('gamemanager.score_id_seq'),
    game INTEGER REFERENCES gamemanager.game(id),
    playername VARCHAR(50),
    score INTEGER 
);

