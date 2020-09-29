DROP DATABASE IF EXISTS ck17427;
CREATE DATABASE ck17427;
USE ck17427;

CREATE TABLE Publisher (
	Publisher_ID INT NOT NULL AUTO_INCREMENT,
	Publisher_Name VARCHAR(40),
	item_image_loc VARCHAR(140),
	PRIMARY KEY (Publisher_ID)
	);

CREATE TABLE Developer (
	Developer_ID INT NOT NULL AUTO_INCREMENT,
	Developer_Name VARCHAR(30),
	item_image_loc VARCHAR(140),
	PRIMARY KEY(Developer_ID)
	);
	
CREATE TABLE Game (
	Game_ID INT NOT NULL AUTO_INCREMENT,
	Game_name VARCHAR(40),
	Release_Date VARCHAR(10),
	Developer INT,
	Publisher INT,
	Sales INT,
	Cost INT,
	game_image_loc VARCHAR(140),
	PRIMARY KEY (Game_ID),
	FOREIGN KEY(Publisher) REFERENCES Publisher(Publisher_ID) ON DELETE SET NULL,
	FOREIGN KEY(Developer) REFERENCES Developer(Developer_ID) ON DELETE SET NULL
);

CREATE TABLE Console (
	Console_ID INT NOT NULL AUTO_INCREMENT,
	Console_Name VARCHAR(15),
	Console_Brand VARCHAR(15),
	Console_ReleaseDate VARCHAR(10),
	Console_Sales INT,
	Console_Cost VARCHAR(10),
	item_image_loc VARCHAR(140),
	PRIMARY KEY(Console_ID)
	);

CREATE TABLE Platform (
	Platform_ID INT NOT NULL AUTO_INCREMENT,
	Console_ID INT,
	Game_ID INT,
	item_image_loc VARCHAR(140),
	PRIMARY KEY(Platform_ID),
	FOREIGN KEY(Console_ID) REFERENCES Console(Console_ID) ON DELETE CASCADE,
	FOREIGN KEY(Game_ID) REFERENCES Game(Game_ID) ON DELETE CASCADE
	);
	
CREATE TABLE Users (
	User_ID INT NOT NULL AUTO_INCREMENT,
	Username VARCHAR(30),
	Password VARCHAR(150),
	PRIMARY KEY(User_ID)
	);

INSERT INTO Users (Username, Password) VALUES (
"ck17427",
MD5("password")
);

INSERT INTO Publisher (Publisher_Name, item_image_loc) VALUES (
"Rockstar Games", "/Images/Publisher/RockstarGames.png"),
("Activision", "/Images/Publisher/Activision.png"),
("Nintendo", "/Images/Publisher/Nintendo.png"),
("Xbox Game Studios", "/Images/Publisher/XboxGameStudios.jpg"),
("Microsoft Studios", "/Images/Publisher/MicrosoftStudios.jpg"),
("StudioMDHR", "/Images/Publisher/StudioMDHR.png"),
("2K Games", "/Images/Publisher/2k.png"),
("Ubisoft", "/Images/Publisher/Ubisoft.png"),
("Warner Bros. Interactive Entertainment", "/Images/Publisher/WarnerBros.png"),
("Sony Interactive Entertainment", "/Images/Publisher/SonyInteractiveEntertainment.jpg"),
("Deep Silver", "/Images/Publisher/DeepSilver.png");

INSERT INTO Developer (Developer_Name, item_image_loc) VALUES (
"Rockstar Studios", "/Images/Publisher/RockstarGames.png"),
("Infinity Ward", "/Images/Developer/InfinityWard.png"),
("Nintendo EPD", "/Images/Developer/NintendoEPD.png"),
("Next Level Games", "/Images/Developer/NextLevelGames.png"),
("Grezzo", "/Images/Developer/Grezzo.png"),
("Game Freak", "/Images/Developer/GameFreak.jpg"),
("PlatinumGames", "/Images/Developer/PlatinumGames..png"),
("Nintendo EAD", "/Images/Developer/NintendoEAD.png"),
("Bandai Namco Studios", "/Images/Developer/BandaiNamco.png"),
("343 Industries", "/Images/Developer/343Industries.png"),
("Playground Games", "/Images/Developer/PlaygroundGames.jpg"),
("StudioMDHR", "/Images/Publisher/StudioMDHR.png"),
("Rare", "/Images/Developer/Rare_logo.png"),
("Gearbox Software", "/Images/Developer/Gearbox.png"),
("Ubisoft Montreal", "/Images/Publisher/Ubisoft.png"),
("Rocksteady Studios", "/Images/Developer/Rocksteady.png"),
("Insomniac Games", "/Images/Developer/Insomniac.jpg"),
("SIE Santa Monica Studio", "/Images/Developer/SantaMonica.jpg"),
("Naughty Dog", "/Images/Developer/Naughty Dog.jpg"),
("Vicarious Visions", "/Images/Developer/VicariousVisionsLogo.png"),
("Toys for Bob", "/Images/Developer/ToysforBob.png"),
("Guerrilla Games", "/Images/Developer/Guerrilla.png"),
("Kojima Productions", "/Images/Developer/Kojima.png"),
("Quantic Dream", "/Images/Developer/QuanticDream.jpg"),
("P-Studio", "/Images/Developer/P-Studio.png");

INSERT INTO Game (Game_name, Release_Date, Developer, Publisher, Sales, Cost, game_image_loc) VALUES (
"Red Dead Redemption 2", "26/10/18", 1, 1, 25000000, 50, "/Images/Games/RedDead2.jpg"),
("COD: Modern Warfare", "25/10/19", 2, 2, 12000000, 50, "/Images/Games/ModernWarfare.jpg"),
("Super Mario Odyssey", "27/10/17", 3, 3, 15380000, 50, "/Images/Games/MarioOdyssey.jpg"),
("The Legend of Zelda: Breath of the Wild", "03/03/17", 3, 3, 14540000, 50, "/Images/Games/BOTW.jpg"),
("Luigi's Mansion 3", "31/10/19", 4, 3, 2000000, 50, "/Images/Games/LuigisMansion3.jpg"),
("The Legend of Zelda: Links Awakening", "20/09/19", 5, 3, 3130000, 50, "/Images/Games/LinksAwakening.jpg"),
("Pokemon Lets Go Pikachu & Eevee", "16/11/18", 6, 3, 7200000, 50, "/Images/Games/LetsGoPikachu.jpg"),
("Pokemon Sword & Shield", "15/11/19", 6, 3, 6000000, 50, "/Images/Games/PokemonSword.jpg"),
("Astral Chain", "30/08/19", 7, 3, 2000000, 40, "/Images/Games/AstralChain.jpg"),
("Mario Kart 8 Deluxe", "28/04/17", 8, 3, 19010000, 50, "/Images/Games/MarioKart8.jpg"),
("Super Smash Bros. Ultimate", "07/12/18", 9, 3, 15710000, 50, "/Images/Games/SmashBrosUltimate.jpg"),
("Splatoon 2", "21/07/17", 3, 3, 9280000, 50, "/Images/Games/Splatoon2.jpg"),
("Halo: The Master Chief Collection", "11/11/14", 10, 4, 3440000, 40, "/Images/Games/HaloMCC.jpg"),
("Forza Horizon 4", "02/10/18", 11, 5, 1840000, 50, "/Images/Games/ForzaHorizon4.jpg"),
("Cuphead", "29/09/17", 12, 6, 5000000, 20, "/Images/Games/Cuphead.jpg"),
("Sea of Thieves", "20/03/18", 13, 5, 960000, 40, "/Images/Games/SeaofThieves.jpg"),
("Borderlands 3", "13/09/19", 14, 7, 5000000, 50, "/Images/Games/Borderlands3.jpg"),
("Far Cry 5", "27/03/18", 15, 8, 5730000, 50, "/Images/Games/FarCry5.jpg"),
("Batman Arkham Knight", "23/06/15", 16, 9, 5690000, 50, "/Images/Games/ArkhamKnight.jpg"),
("Sunset Overdrive", "28/10/14", 17, 5, 1160000, 50, "/Images/Games/SunsetOverdrive.jpg"),
("God of War", "20/04/18", 18, 10, 11000000, 50, "/Images/Games/GodofWar.jpg"),
("Uncharted 4: A Thieves End", "10/05/16", 19, 10, 16250000, 50, "/Images/Games/Uncharted4.jpg"),
("The Last of Us", "29/07/14", 19, 10, 19880000, 40, "/Images/Games/TheLastofUS.jpg"),
("Crash Bandicoot N' Sane Trilogy", "30/06/17", 20, 2, 6550000, 30, "/Images/Games/Crash.jpg"),
("Spyro Reignited Trilogy", "13/11/18", 21, 2, 3320000, 30, "/Images/Games/Spyro.jpg"),
("Horizon Zero Dawn", "28/02/17", 22, 10, 10000000, 50, "/Images/Games/HorizonZeroDawn.jpg"),
("Marvel's Spider-Man", "07/09/18", 17, 10, 13200000, 50, "/Images/Games/Spiderman.jpg"),
("Death Stranding", "08/11/19", 23, 10, 1000000, 50, "/Images/Games/DeathStranding.jpg"),
("Detroit: Become Human", "24/04/18", 24, 10, 3200000, 20, "/Images/Games/DetroitBecomeHuman.jpg"),
("Persona 5", "15/09/16", 25, 11, 1640000, 50, "/Images/Games/Persona5.jpg");

INSERT INTO Console (Console_Name, Console_Brand, Console_ReleaseDate, Console_Sales, Console_Cost, item_image_loc) VALUES (
"Xbox One", "Microsoft", "22/11/13", 41000000, 400, "/Images/Consoles/XboxOne.jpg"),
("Playstation 4", "Sony", "15/11/13", 100000000, 350, "/Images/Consoles/PS4.jpg"),
("Nintendo Switch", "Nintendo", "03/03/17", 41670000, 300, "/Images/Consoles/NintendoSwitch.jpg");

INSERT INTO Platform (Game_ID, Console_ID) VALUES (
1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 1),
(14, 1),
(15, 1),
(15, 3),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 2),
(22, 2),
(23, 2),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2);

GRANT ALL PRIVILEGES ON ck17427.* TO 'ck17427'@'localhost'