-- database: race_data.db
CREATE TABLE race_table (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    startzeit_geplant TIME NOT NULL,
    startzeit_tatsaechlich TIME,
    no INTEGER NOT NULL,
    bahn TEXT,
    vorname TEXT,
    name TEXT,
    mw TEXT,
    age TEXT,
    bestzeit TEXT
);
