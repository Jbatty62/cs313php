DROP TABLE IF EXISTS user_accounts CASCADE;
DROP TABLE IF EXISTS modules CASCADE;
DROP TABLE IF EXISTS user_orders CASCADE;
DROP TABLE IF EXISTS character_races CASCADE;
DROP TABLE IF EXISTS character_classes CASCADE;
DROP TABLE IF EXISTS character_abilities CASCADE;
DROP TABLE IF EXISTS character_spells CASCADE;
DROP TABLE IF EXISTS items CASCADE;
DROP TABLE IF EXISTS games CASCADE;
DROP TABLE IF EXISTS party_members CASCADE;

CREATE TABLE user_accounts (
    user_account_id     SERIAL     CONSTRAINT user_accounts_pk PRIMARY KEY   NOT NULL,
    username    VARCHAR             CONSTRAINT user_accounts_uc1 UNIQUE        NOT NULL,
    password    VARCHAR     NOT NULL,
    email       VARCHAR              CONSTRAINT user_accounts_uc2 UNIQUE,
    first_name  VARCHAR,
    last_name   VARCHAR,
    created_by  INTEGER,
    created_date DATE,
    last_updated_by INTEGER,
    last_updated_date DATE
);

INSERT INTO user_accounts (username, password,             email,                first_name, last_name, created_by, created_date, last_updated_by, last_updated_date) 
VALUES                    ('admin', 'badSecurityPractice' ,'login@johnbatty.me' ,'John',     'Batty',   1,          CURRENT_DATE, 1,              CURRENT_DATE ),
                          ('TestUser', '$2y$10$9h17AFXNhPa.Dof1JBWSXO8tQij61QZVg5zd2lJ6JSjcCRR53kDUW', 'personal@johnbatty.me', 'Test', 'User', 1,          CURRENT_DATE, 1,              CURRENT_DATE );

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
                    ('Advanced Magic and Spells', 'This is a short description lorem ipsum set dolor', 'this is a long description lorem ipsum set dolor', 24.01, 1,          CURRENT_DATE, 1,              CURRENT_DATE ),
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

/*
INSERT INTO user_orders (user_account_id, module_id, time,          created_by, created_date, last_updated_by, last_updated_date) VALUES
                        (2,                1,        CURRENT_DATE,  1,          CURRENT_DATE, 1,              CURRENT_DATE      ),
                        (1,                3,        CURRENT_DATE,  1,          CURRENT_DATE, 1,              CURRENT_DATE      ),
                        (2,                5,        CURRENT_DATE,  1,          CURRENT_DATE, 1,              CURRENT_DATE      ),
                        (1,                1,        CURRENT_DATE,  1,          CURRENT_DATE, 1,              CURRENT_DATE      ),
                        (2,                1,        CURRENT_DATE,  1,          CURRENT_DATE, 1,              CURRENT_DATE      );
*/

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

/*spell prereqs**/

INSERT INTO character_spells  (module_id, name,             xp_cost, description,  created_by, created_date, last_updated_by, last_updated_date) 
VALUES                        (1,         'Fireball',       100,     'You throw a ball of firey death at your opponenets dealing 3d3 + your spellcasting ability damage', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (2,         'Healing Burst',  150,     'You emit a burst of healing energy causing creatures within 10 feet of you to recover health equal to 1d10 + your spellcasting ability', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (3,         'Ice Wall',       275,     'You conjure a wall of solid ice that is 1 foot thick and 10 feet tall in the space in front of you', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (4,         'Sheild Self',    300,     'You conjure a sheild of magical energy which increases your armor and magical resistance by 2', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (5,         'Charged Shot',   125,     'You charge your weapon with negative energy and strike your opponent, causing ligning effects agasint them to be more effective', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (6,         'Holy Smite',     100,     'You call down the wrath of heaven upon your foe dealing 3d3 + your spellcasting ability damage', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (7,         'Cure Poison',    50,      'You render the poison in a persons bloodstream ineffective and harmless', 1, CURRENT_DATE, 1, CURRENT_DATE),
                              (8,         'Blackflame',     10000,   'You conjure a black flame in your hand that burns your enemies with intense pain, dealing damage to both you and your opponent equal to 6d6 + your spellcasting ability', 1, CURRENT_DATE, 1, CURRENT_DATE);

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
VALUES                       (1,         'Warrior', 1000, 'You have learned to fight people with weapons and with other fighty things...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (2,         'Wizard', 1000, 'You have learned to weaponize magic and use it to do your bidding...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (3,         'Ranger', 1000, 'You are comfortable in the wilderness and capable of remarkable things with a bow...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (4,         'Rouge', 1000, 'Larceny has become a way of life for you both in and out of combat...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (5,         'Bard', 1000, 'Your voice or musical talaent has become a potent force to effect others and the world around you...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (6,         'Cleric', 1000, 'You have learned to harness divine might to control the world around you...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (7,         'Guardian', 1000, 'You have learned to protect and defend your comrades at all costs...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (8,         'Paladin', 1000, 'You have devoted yourself to the cause of a diety and inspire others to assist your cause...', 1, CURRENT_DATE, 1, CURRENT_DATE),
                             (3,         'Ryn-Ky', 1000, 'You have become a master at mixing advanced martial arts with powerful combat magic...', 1, CURRENT_DATE, 1, CURRENT_DATE);

/*class prereqs */

/*class abilities*/

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

SELECT * FROM character_abilities;

INSERT INTO character_abilities (module_id, name,                   xp_cost,    description, created_by, created_date, last_updated_by, last_updated_date) 
    VALUES                      (1,         'Charge',               150,        'You rush at your enemy, and may attack without expending an action point if you advance more than 30 feet in a straight line to reach your opponent', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (2,         'Arcane Magic I',       150,        'You gain the ability to learn and cast basic arcane magic', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (3,         'Disengage',            150,        'You may expend an action point to carefully slip away from your opponent without giving them an opportunity to attack you', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (4,         'Sneak Attack',         150,        'When you attack an opponent with no remaining action points, your attacks deal 1d8 extra damage.', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (5,         'Bardic Casting I',     150,        'You gain the ability to cast spells using your voice or a musical instrument as a focus', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (6,         'Divine Magic I',       150,        'You gain the ability to learn and cast basic divine magic', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (7,         'Defend',               150,        'When an ally within 5 feet of you is attacked, you may expend an action to defend in their behalf', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (8,         'Lay On of Hands',      150,        'You use divine power to minister to the needs of an ally, restoring health equal to 1d8 + your spellcasting ability or removing one poison or disease effect', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (1,         'Martial Casting I',    150,        'You gain the ability to cast spells in close range combat using your own limbs and strikes as a focus.', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (2,         'Adaptation',           150,        'Impairments that reduce skill and ability scores are half as effective against you', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (3,         'Dwarven Endurance',    150,        'You lose 1 few action points when below half health', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (4,         'Orcish Resilience',    150,        'Poisons and diseases are half as likely to infect you', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (5,         'Dragonborne Hide',     150,        'You have a permanent +2 to your armor score', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (6,         'Elven Sight',          150,        'You suffer no disadvantages in low light settings', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (7,         'Minotaur Hide',        150,        'Your thick hide gives you immunity to natural cold', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (8,         'Drask Regeneration',   150,        'You regain 1 hp per turn', 1, CURRENT_DATE, 1, CURRENT_DATE),
                                (1,         'Gnomish Intellect',    150,        'You may reroll any knowledge check once', 1, CURRENT_DATE, 1, CURRENT_DATE);

/*ability prereqs*/

SELECT * FROM character_abilities;

CREATE TABLE character_races (
    character_races_id          SERIAL     CONSTRAINT character_races_pk PRIMARY KEY  NOT NULL,
    module_id                   INTEGER         CONSTRAINT character_races_fk_1 REFERENCES modules(module_id) NOT NULL,
    race_ability                INTEGER         CONSTRAINT character_races_fk_2 REFERENCES character_abilities(character_abilities_id),
    description                 VARCHAR(2000),
    name                        VARCHAR(30),
    strength_cost_adjust        INTEGER,
    dexterity_cost_adjust       INTEGER,
    constitution_cost_adjust    INTEGER,
    speed_cost_adjust           INTEGER,
    wit_cost_adjust             INTEGER,
    intelligence_cost_adjust    INTEGER,
    wisdom_cost_adjust          INTEGER,
    charisma_cost_adjust        INTEGER,
    created_by                  INTEGER,
    created_date                DATE,
    last_updated_by             INTEGER,
    last_updated_date           DATE
);



INSERT INTO character_races (module_id, race_ability, name, description, strength_cost_adjust, dexterity_cost_adjust, constitution_cost_adjust, speed_cost_adjust, wit_cost_adjust, intelligence_cost_adjust, wisdom_cost_adjust, charisma_cost_adjust, created_by, created_date, last_updated_by, last_updated_date)
VALUES  (1, 10, 'Human','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (2, 11, 'Dwarf','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (3, 12, 'Orc','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (4, 13, 'Dragonborn','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (5, 14,'Elf','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (6, 15,'Minotaur','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (7, 16,'Drask','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE),
        (8, 17,'Gnome','This is a description test', 10, 10, 10, 10, 10, 10, 10, 10, 1, CURRENT_DATE, 1, CURRENT_DATE);

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

INSERT INTO items   (module_id, name,             gold_value, description, created_by, created_date, last_updated_by, last_updated_date) 
VALUES              (1,         'Healing Potion', 100,        'If you drink this, you will probably regrow a limb or something', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Leather Armor',  50,         'A basic for m of protection. Armor +2 while you are wearing it', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Chain Mail',     150,        'A strong yet flexible armor. Armor +4 while you are wearing it', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Plate Mail',     350,        'The strongest set of armor available. Armor +5 while you are wearing it.', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Ruby',           1000,       'Very valuable, but not very useful', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Magic Ring',     2000,       'Who knows what it does, but it is definetely magic', 1, CURRENT_DATE, 1, CURRENT_DATE),
                    (1,         'Short Sword',    200,        'Used for fighting and cutting people. Attack with 1d6. ', 1, CURRENT_DATE, 1, CURRENT_DATE);


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


/*Alter User First_Name */
UPDATE user_accounts
SET first_name = 'Jhon'
WHERE user_account_id = 2;

/* Select Races Included in Owned Modules */
SELECT c.character_races_id FROM character_races c INNER JOIN user_orders orders ON c.module_id = orders.module_id WHERE orders.user_account_id = 2;

SELECT * FROM user_orders;
SELECT * FROM modules;
SELECT * FROM modules m LEFT JOIN user_orders orders ON m.module_id = orders.module_id WHERE orders.module_id = NULL;
SELECT * FROM modules m LEFT JOIN user_orders orders ON m.module_id = orders.module_id;

SELECT
*
FROM
    modules m
LEFT JOIN user_orders orders ON m.module_id = orders.module_id
WHERE orders.module_id IS NULL;
