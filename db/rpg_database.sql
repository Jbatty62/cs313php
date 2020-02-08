DROP TABLE IF EXISTS user_accounts CASCADE;
DROP TABLE IF EXISTS modules CASCADE;

DROP TABLE IF EXISTS character_races CASCADE;
DROP TABLE IF EXISTS character_classes CASCADE;
DROP TABLE IF EXISTS character_abilities CASCADE;
DROP TABLE IF EXISTS character_spells CASCADE;
DROP TABLE IF EXISTS items CASCADE;


DROP SEQUENCE IF EXISTS user_account_sequence;
DROP SEQUENCE IF EXISTS modules_sequence;

DROP SEQUENCE IF EXISTS character_races_sequence;
DROP SEQUENCE IF EXISTS character_classes_sequence;
DROP SEQUENCE IF EXISTS character_abilities_sequence;
DROP SEQUENCE IF EXISTS character_spells_sequence;
DROP SEQUENCE IF EXISTS items_sequence;



CREATE TABLE user_accounts (
    user_account_id     INTEGER     CONSTRAINT user_accounts_pk PRIMARY KEY   NOT NULL,
    username    VARCHAR             CONSTRAINT user_accounts_uc UNIQUE        NOT NULL,
    first_name  VARCHAR,
    last_name   VARCHAR,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

CREATE SEQUENCE user_table_sequence START WITH 1001;

CREATE TABLE modules (
    module_id      INTEGER         CONSTRAINT modules_pk PRIMARY KEY   NOT NULL,
    module_name    VARCHAR(30)                                         NOT NULL,
    short_description   VARCHAR(255),
    long_description VARCHAR(2000),
    price FLOAT                                                        NOT NULL,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

CREATE SEQUENCE modules_sequence START WITH 1001;


DROP TABLE IF EXISTS user_orders CASCADE;
CREATE TABLE user_orders (
    user_orders_id       INTEGER    CONSTRAINT user_orders_pk PRIMARY KEY    NOT NULL,
    user_account_id     INTEGER     CONSTRAINT user_orders_fk_1 REFERENCES user_accounts(user_account_id) NOT NULL,
    module_id           INTEGER     CONSTRAINT user_orders_fk_2 REFERENCES modules(module_id)         NOT NULL,
    time                DATE                                                    NOT NULL,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

DROP SEQUENCE IF EXISTS user_orders_sequence;
CREATE SEQUENCE user_orders_sequence START WITH 1001;

CREATE TABLE character_races (
    character_races_id         INTEGER     CONSTRAINT character_races_pk PRIMARY KEY  NOT NULL,
    module_id        INTEGER         CONSTRAINT user_orders_fk_2 REFERENCES modules(module_id) NOT NULL,
    description varchar(2000),
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

CREATE SEQUENCE character_races_sequence START WITH 1001;

CREATE TABLE character_spells (
    character_spells_id    INTEGER      CONSTRAINT character_spells_pk PRIMARY KEY  NOT NULL,
    module_id        INTEGER            CONSTRAINT character_spells_fk REFERENCES modules(module_id) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

CREATE SEQUENCE character_spells_sequence START WITH 1001;

CREATE TABLE character_classes (
    character_classes_id        INTEGER     CONSTRAINT character_classes_pk PRIMARY KEY,
    module_id                   INTEGER     CONSTRAINT character_classes_fk REFERENCES modules(module_id) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);


CREATE SEQUENCE character_classes_sequence START WITH 1001;

CREATE TABLE character_abilities (
    character_abilities_id        INTEGER     CONSTRAINT character_abilities_pk PRIMARY KEY,
    module_id                   INTEGER     CONSTRAINT character_abilities_fk REFERENCES modules(module_id) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE

);


CREATE SEQUENCE character_abilities_sequence START WITH 1001;

CREATE TABLE items (
    items_id        INTEGER     CONSTRAINT items_pk PRIMARY KEY,
    module_id                   INTEGER     CONSTRAINT items_fk REFERENCES modules(module_id) NOT NULL,
    xp_cost   INTEGER NOT NULL,
    description TEXT,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE

);


CREATE SEQUENCE items_sequence START WITH 1001;

CREATE TABLE games (
    game_id INTEGER CONSTRAINT games_pk PRIMARY KEY,
    owner_id INTEGER CONSTRAINT games_fk1 REFERENCES user_accounts(user_account_id),
    
)

/* SOME INFO TO INSERT */ 


