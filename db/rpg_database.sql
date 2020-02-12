DROP TABLE IF EXISTS user_accounts CASCADE;
DROP TABLE IF EXISTS modules CASCADE;
DROP TABLE IF EXISTS user_orders CASCADE;
DROP TABLE IF EXISTS character_races CASCADE;
DROP TABLE IF EXISTS character_classes CASCADE;
DROP TABLE IF EXISTS character_abilities CASCADE;
DROP TABLE IF EXISTS character_spells CASCADE;
DROP TABLE IF EXISTS items CASCADE;
DROP TABLE IF EXISTS games CASCADE;
DROP TABLE IF EXISTS parties CASCADE;

CREATE TABLE user_accounts (
    user_account_id     SERIAL     CONSTRAINT user_accounts_pk PRIMARY KEY   NOT NULL,
    username    VARCHAR             CONSTRAINT user_accounts_uc UNIQUE        NOT NULL,
    first_name  VARCHAR,
    last_name   VARCHAR,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO user_accounts (username, first_name, last_name, created_by, created_date, last_updated_by, last_updated_date) VALUES
                          ('admin',  'John',     'Batty',   1,          CURRENT_DATE, 1,              CURRENT_DATE );

CREATE TABLE modules (
    module_id      SERIAL        CONSTRAINT modules_pk PRIMARY KEY   NOT NULL,
    module_name    VARCHAR(30)                                         NOT NULL,
    short_description   VARCHAR(255),
    long_description VARCHAR(2000),
    price FLOAT                                                        NOT NULL,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO modules (module_name, short_description, long_description, price, created_by, created_date, last_updated_by, last_updated_date)
VALUES              ('Basic Rule Set', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 19.99, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Game Masters Guide', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 14.99, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Advanced Rule Set', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 29.99, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Lore and History Pack', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 5.99, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Magic Item Compendium', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 9.95, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Advanced Magic and Spells', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 24.00, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Manual of Advanced Maneuvers', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 23.99, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                    ('Dungeon Devlers Debreif', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 39.95, 1,          CURRENT_DATE, 1,              CURRENT_DATE );
                    

CREATE TABLE user_orders (
    user_orders_id       SERIAL    CONSTRAINT user_orders_pk PRIMARY KEY    NOT NULL,
    user_account_id     INTEGER     CONSTRAINT user_orders_fk_1 REFERENCES user_accounts(user_account_id) NOT NULL,
    module_id           INTEGER     CONSTRAINT user_orders_fk_2 REFERENCES modules(module_id)         NOT NULL,
    time                DATE                                                    NOT NULL,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);


CREATE TABLE character_races (
    character_races_id         SERIAL     CONSTRAINT character_races_pk PRIMARY KEY  NOT NULL,
    module_id        INTEGER         CONSTRAINT user_orders_fk_2 REFERENCES modules(module_id) NOT NULL,
    description varchar(2000),
    name VARCHAR(30),
    strength_cost_adjust INTEGER,
    dexterity_cost_adjust INTEGER,
    constitution_cost_adjust INTEGER,
    speed_cost_adjust INTEGER,
    wit_cost_adjust INTEGER,
    intelligence_cost_adjust INTEGER,
    wisdom_cost_adjust INTEGER,
    charisma_cost_adjust INTEGER,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO character_races (module_id, name, description, strength_cost_adjust, dexterity_cost_adjust, constitution_cost_adjust, speed_cost_adjust, wit_cost_adjust, intelligence_cost_adjust, wisdom_cost_adjust, charisma_cost_adjust, created_by, created_date, last_updated_by, last_updated_date)
VALUES  (1, 'Human','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (1, 'Dwarf','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (1, 'Orc','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (1, 'Dragonborn','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (1, 'Elf','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE);

CREATE TABLE character_spells (
    character_spells_id    SERIAL      CONSTRAINT character_spells_pk PRIMARY KEY  NOT NULL,
    module_id        INTEGER            CONSTRAINT character_spells_fk REFERENCES modules(module_id) NOT NULL,
    name                VARCHAR(30) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO character_spells (module_id, name, xp_cost, description, created_by, created_date, last_updated_by, last_updated_date) 
VALUES                       (1,         'fireball', 100, 'You throw a ball of firey death at your opponenets dealing 3d3 + your spellcasting ability damage', 1, CURRENT_DATE, 1, CURRENT_DATE);

CREATE TABLE character_classes (
    character_classes_id        SERIAL    CONSTRAINT character_classes_pk PRIMARY KEY,
    module_id                   INTEGER     CONSTRAINT character_classes_fk REFERENCES modules(module_id) NOT NULL,
    name                VARCHAR(30) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO character_classes (module_id, name, xp_cost, description, created_by, created_date, last_updated_by, last_updated_date) 
VALUES                       (1,         'Warrior', 1000, 'You have learned to fight people with weapons and with other fighty things...', 1, CURRENT_DATE, 1, CURRENT_DATE);


CREATE TABLE character_abilities (
    character_abilities_id        SERIAL     CONSTRAINT character_abilities_pk PRIMARY KEY,
    module_id                   INTEGER     CONSTRAINT character_abilities_fk REFERENCES modules(module_id) NOT NULL,
    name                VARCHAR(30) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE

);

INSERT INTO character_abilities (module_id, name, xp_cost, description, created_by, created_date, last_updated_by, last_updated_date) 
VALUES                       (1,         'Charge', 150, 'You rush at your enemy, and may attack without expending an action point if you advance more than 30 feet in a straight line to reach your opponent', 1, CURRENT_DATE, 1, CURRENT_DATE);


CREATE TABLE items (
    items_id            SERIAL      CONSTRAINT items_pk PRIMARY KEY,
    module_id           INTEGER     CONSTRAINT items_fk REFERENCES modules(module_id) NOT NULL,
    name                VARCHAR(30) NOT NULL,
    gold_value          INTEGER,
    description         TEXT,
    created_by          INTEGER     NOT NULL,
    created_date        DATE        NOT NULL,
    last_updated_by     INTEGER     NOT NULL,
    last_updated_date   DATE        NOT NULL

);

INSERT INTO items (module_id, name, gold_value, description, created_by, created_date, last_updated_by, last_updated_date) 
VALUES                       (1,         'Healing Potion', 100, 'If you drink this, you will probably regrow a limb or something', 1, CURRENT_DATE, 1, CURRENT_DATE);


CREATE TABLE games (
    game_id SERIAL CONSTRAINT games_pk PRIMARY KEY,
    owner_id INTEGER CONSTRAINT games_fk1 REFERENCES user_accounts(user_account_id),
    name                VARCHAR(30) NOT NULL,
    created_by  INTEGER     NOT NULL,
    created_date DATE       NOT NULL,
    last_updated_by INTEGER NOT NULL,
    last_updated_date DATE  NOT NULL
 
);
INSERT INTO games (owner_id, name, created_by, created_date, last_updated_by, last_updated_date)
VALUES            (1,        'Adventures in Sogored', 1, CURRENT_DATE, 1, CURRENT_DATE);

CREATE TABLE party_members (
    game_id  INTEGER CONSTRAINT parties_fk1 REFERENCES games(game_id),
    player_id INTEGER CONSTRAINT parties_fk2 REFERENCES user_accounts(user_account_id),
    created_by  INTEGER     NOT NULL,
    created_date DATE       NOT NULL,
    last_updated_by INTEGER NOT NULL,
    last_updated_date DATE  NOT NULL,
    PRIMARY KEY (game_id, player_id)
 
);

/* SOME INFO TO INSERT */ 


