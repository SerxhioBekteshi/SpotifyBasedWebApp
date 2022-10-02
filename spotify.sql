-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 10:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `idA` int(11) NOT NULL,
  `emriA` varchar(250) NOT NULL,
  `imazhiAlbumit` varchar(250) NOT NULL,
  `ReleaseDate` date NOT NULL,
  `idArtisti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`idA`, `emriA`, `imazhiAlbumit`, `ReleaseDate`, `idArtisti`) VALUES
(1, 'Astroworld', 'Astroworld.jpg', '2001-03-07', 1),
(2, 'The Eminem Show', 'eminemShow.jpg', '2014-02-19', 2),
(3, 'Birds In The Trap McKnight', 'BirdsInTheTrapMcKnight.jpg', '1999-06-12', 1),
(4, 'Dystopia', 'Dystopia.jpg', '2010-09-07', 1),
(5, 'Rodeo', 'rodeo.jpg', '2018-08-15', 1),
(6, 'Scorpions', 'Scorpions.jpg', '2004-05-11', 12),
(7, 'Slim Shady LP', 'SlimShady.jpg', '2001-03-07', 2),
(8, 'Recovery', 'recovery.jpg', '2014-02-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `artisti`
--

CREATE TABLE `artisti` (
  `id` int(11) NOT NULL,
  `emri` varchar(250) NOT NULL,
  `imazhi` varchar(250) NOT NULL,
  `Genre` varchar(250) NOT NULL,
  `personalLife` text NOT NULL,
  `generalInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artisti`
--

INSERT INTO `artisti` (`id`, `emri`, `imazhi`, `Genre`, `personalLife`, `generalInfo`) VALUES
(1, 'Travis Scott', 'Travis.jpg', 'Rap, Trap, Psychedelic Rock', 'Scott began dating media personality and businesswoman Kylie Jenner in April 2017.[143] In February 2018, Jenner gave birth to their daughter.[144][145] Jenner appeared in the music video for \"Stop Trying to Be God\", from Scott\'s third studio album Astroworld.[146] They broke up in September 2019,[147] but quarantined together during the COVID-19 pandemic for the sake of their daughter and ended up rekindling their relationship.[148] On September 7, 2021, after weeks of speculation, Jenner revealed that she and Scott were expecting their second child.[149][150] Jenner gave birth to their son in February 2022.', 'Jacques Bermon Webster II (born April 30, 1991), better known by his stage name Travis Scott (formerly stylized as Travis $cott), is an American rapper, singer, songwriter, and record producer. His stage name is the namesake of a favorite uncle combined with the first name of one of his inspirations, Kid Cudi (whose real name is Scott Mescudi).[4] He has been nominated for eight Grammy Awards and won a Billboard Music Award and a Latin Grammy Award.\n\nIn 2012, Scott signed his first major-label contract with Epic Records and a publishing deal with Kanye West\'s GOOD Music. In April 2013, he signed a joint-recording contract with Epic and T.I.\'s Grand Hustle imprint. Scott\'s first full-length project, the mixtape Owl Pharaoh, was self-released in 2013. It was followed with a second mixtape, Days Before Rodeo, in 2014. His debut studio album, Rodeo (2015), was led by the hit single \"Antidote\". His second album, Birds in the Trap Sing McKnight (2016), became his first number one album on the Billboard 200. The following year, Scott released a collaborative album with Quavo titled Huncho Jack, Jack Huncho under the group name Huncho Jack.\n\nIn 2018, his third studio album, Astroworld, was released to critical acclaim and produced his first Billboard Hot 100 number one single, \"Sicko Mode\" (featuring Drake).[5] In late 2019, Scott\'s record label Cactus Jack Records released the compilation album JackBoys, which topped the Billboard 200. After the release of his single \"Franchise\" (featuring Young Thug and M.I.A.) in 2020, Scott became the first artist on the Hot 100 to have three songs debut at number one in less than a year.[6]\n\nScott has gained notoriety for controversies and legal issues regarding safety at his concerts. In November 2021, a mass-casualty crowd crush occurred during Scott\'s performance at the Astroworld Festival in his hometown of Houston, Texas, killing ten people and injuring hundreds of others'),
(2, 'Marshall Mathers', 'Marshall.jpg', 'Rap', 'Eminem has been scrutinized, both as a rapper and personality.[46] He was twice married to Kimberly Anne Scott; he met Scott in high school while he stood on a table with his shirt off rapping LL Cool J\'s \"I\'m Bad\".[307] Scott and her twin sister Dawn had run away from home; they moved in with Eminem and his mother when he was 15 and he began an on-and-off relationship with Scott in 1989.\n\nMathers and Scott were married in 1999 and divorced in 2001. Their daughter Hailie was born on December 25, 1995. Although Eminem told Rolling Stone in 2002, \"I would rather have a baby through my penis than get married again\", he and Scott briefly remarried in January 2006. He filed for divorce in early April,[308] agreeing to joint custody of Hailie.[309] Hailie is a social media influencer, specifically for fashion and beauty.[310]\n\nEminem also has custody of his sister-in-law Dawn\'s daughter,[311] and Kim\'s child from another relationship.[312][313]\n\nIn early 2010, Eminem denied tabloid reports that he and Kim had renewed their romantic relationship; however, in the same statement, his representative also confirmed that they now maintain a friendly relationship.[314] He had legal custody of his younger half-brother Nathan.[315]\n\nIn his 2013 song \"Headlights\", Eminem apologized to and reiterated his love for his mother', 'Marshall Bruce Mathers III (born October 17, 1972), known professionally as Eminem (/ˌɛmɪˈnɛm/; stylized as EMINƎM), is an American rapper, songwriter, and record producer. He is credited with popularizing hip hop in middle America and is critically acclaimed as one of the greatest rappers of all time.[2] Eminem\'s global success and acclaimed works are widely regarded as having broken racial barriers for the acceptance of white rappers in popular music. While much of his transgressive work during the late 1990s and early 2000s made him widely controversial, he came to be a representation of popular angst of the American underclass, and has been cited as an influence for many artists of various genres.\n\nAfter his debut album Infinite (1996) and the extended play Slim Shady EP (1997), Eminem signed with Dr. Dre\'s Aftermath Entertainment and subsequently achieved mainstream popularity in 1999 with The Slim Shady LP. His next two releases, The Marshall Mathers LP (2000) and The Eminem Show (2002), were worldwide successes and were both nominated for the Grammy Award for Album of the Year. After the release of his next album, Encore (2004), Eminem went on hiatus in 2005, largely due to a prescription drug addiction.[3] He returned to the music industry four years later with the release of Relapse (2009) and Recovery was released the following year. Recovery was the best-selling album worldwide of 2010, making it Eminem\'s second album, after The Eminem Show in 2002, to be the best-selling album of the year worldwide. In the following years, he released the US number one albums The Marshall Mathers LP 2 (2013), Revival (2017), Kamikaze (2018) and Music to Be Murdered By (2020).\n\nEminem made his debut in the film industry with the musical drama film 8 Mile (2002), playing a fictionalized version of himself, and his track \"Lose Yourself\" from its soundtrack won the Academy Award for Best Original Song, making him the first hip hop artist ever to win the award.[4] Eminem has made cameo appearances in the films The Wash (2001), Funny People (2009) and The Interview (2014) and the television series Entourage (2010). He has also developed other ventures, including Shady Records, a joint venture with manager Paul Rosenberg, which helped launch the careers of artists such as 50 Cent, Yelawolf and Obie Trice, among others. He has also established his own channel, Shade 45, on Sirius XM Radio. In addition to his solo career, Eminem was a member of the hip hop group D12. He is also known for collaborations with fellow Detroit-based rapper Royce da 5\'9\"; the two are collectively known as Bad Meets Evil.\n\nEminem is among the best-selling music artists of all time, with estimated worldwide sales of over 220 million records. He was the best-selling music artist in the United States of the 2000s and the best-selling male music artist in the United States of the 2010s, third overall. Billboard named him the \"Artist of the Decade (2000–2009)\". He has had ten number-one albums on the Billboard 200—which all consecutively debuted at number one on the chart, making him the first artist to achieve this[5]—and five number-one singles on the Billboard Hot 100.[6] The Marshall Mathers LP, The Eminem Show, Curtain Call: The Hits (2005), \"Lose Yourself\", \"Love the Way You Lie\" and \"Not Afraid\" have all been certified Diamond or higher by the Recording Industry Association of America (RIAA).[7] Rolling Stone has included him in its lists of the 100 Greatest Artists of All Time and the 100 Greatest Songwriters of All Time. He has won numerous awards, including 15 Grammy Awards, eight American Music Awards, 17 Billboard Music Awards, an Academy Award and an MTV Europe Music Global Icon Award. In 2022, Eminem was inducted into the Rock and Roll Hall of Fame'),
(3, 'Rosalia', 'Rosalia.jpg', 'Latino', ' Rosalia', 'Rosalia'),
(4, 'Bad Bunny', 'BadBunny.jpg', 'Latino', ' Bad Bunny', ' Bad Bunny'),
(5, 'King Von', 'kingvon.jpg', 'Rap, Trap', 'King Von', 'King Von'),
(6, 'Dr Dre', 'drdre.jpg', 'Rap', 'Dr Dre w dawdawd awd', 'dawdawd'),
(7, 'Billie Eillish', 'BillieEillish.jpg', 'Pop, Electropop, Teen Pop, Indie Pop', '', ''),
(8, 'Ariana Grande', 'ArianaGrande.jpg', 'RnB, Pop', '', ''),
(9, '50Cent', '50Cent.jpg', 'Rap', '', ''),
(10, 'Snoop Dogg', 'Snoop.jpg', 'Rap', '', ''),
(11, 'David Guetta', 'DavidGuetta.jpg', 'House, Dance', '', ''),
(12, 'Drake', 'drake.jpg', 'Rap, Trap, Pop', '', ''),
(13, 'Dua Lipa', 'DuaLipa.jpg', 'House, Dance, RnB, Pop', '', ''),
(14, 'Fivio Foreign', 'Fivio.jpg', 'Rap, Trap, Drill', '', ''),
(15, 'Pop Smoke', 'PopSmoke.jpg', 'Rap, Trap, Drill', '', ''),
(16, 'The Weeknd', 'TheWeeknd.jpg', 'RnB, Pop', '', ''),
(17, 'Lil Baby', '', 'Rap, Trap', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `GenreName` varchar(250) NOT NULL,
  `GenreImage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `GenreName`, `GenreImage`) VALUES
(1, 'Rap', 'Rap.jpg'),
(2, 'Trap', 'Trap.jpg'),
(3, 'RnB', 'RnB.jpg'),
(4, 'Pop', 'Pop.jpg'),
(5, 'House', 'House.jpg'),
(6, 'Electronic', 'Electronic.jpg'),
(7, 'Country', 'Country.jpg'),
(8, 'Disco', 'Disco.jpg'),
(9, 'Jazz', 'Jazz.jpg'),
(10, 'Latino', 'Latino.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kenget`
--

CREATE TABLE `kenget` (
  `id` int(11) NOT NULL,
  `source` varchar(250) NOT NULL,
  `emriKenges` varchar(250) NOT NULL,
  `imazhiK` varchar(250) NOT NULL,
  `Lyrics` text NOT NULL,
  `idArtisti` int(11) NOT NULL,
  `idAlbumi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kenget`
--

INSERT INTO `kenget` (`id`, `source`, `emriKenges`, `imazhiK`, `Lyrics`, `idArtisti`, `idAlbumi`) VALUES
(1, 'Antidote.mp3', 'Antidote', 'rodeo.jpg', '', 1, 5),
(2, 'HighestInTheRoom.mp3', 'Highest In The Room', 'astroworld.jpg', '', 1, 1),
(3, 'Goosebumps.mp3', 'Goosebumps', 'BirdsInTheTrapMcKnight.jpg', '', 1, 3),
(4, 'NoBystanders.mp3', 'No Bystanders', 'astroworld.jpg', 'The party never ends', 1, 1),
(5, 'NotAfraid.mp3', 'Not Afraid', 'recovery.jpg', '', 2, 8),
(6, 'TillCollapse.mp3', 'Till I Collapse', 'eminemShow.jpg', 'hello world', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `listeplaylist`
--

CREATE TABLE `listeplaylist` (
  `idP` int(11) NOT NULL,
  `emriP` varchar(250) NOT NULL,
  `userID` int(11) NOT NULL,
  `kengeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listeplaylist`
--

INSERT INTO `listeplaylist` (`idP`, `emriP`, `userID`, `kengeID`) VALUES
(1, '1', 1, 2),
(1, '1', 1, 3),
(1, '1', 1, 4),
(5, 'bvfdfg', 1, 2),
(5, 'bvfdfg', 1, 1),
(1, 'TravisList', 1, 5),
(1, 'TravisList', 1, 6),
(1, 'TravisList', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idL` int(11) NOT NULL,
  `emriUser` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `roli` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idL`, `emriUser`, `email`, `password`, `roli`) VALUES
(1, 'Serxhio', 'serxhio131@gmail.com', '123456', 'user'),
(2, 'Travis Scott', 'TravisScott@gmail.com', 'travis123', 'artist'),
(3, 'ADMIN', 'admin@gmail.com', 'admin123.', 'admin'),
(4, 'Marshall Mathers', 'eminem@gmail.com', 'eminem123', 'artist'),
(5, 'Dion', 'dionverushi@gmail.com', 'dion123.', 'user'),
(6, 'Lil', 'lilbaby@gmail.com', 'baby123.', 'artist');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `idP` int(11) NOT NULL,
  `emriP` varchar(250) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`idP`, `emriP`, `idUser`) VALUES
(1, 'TravisList', 1),
(5, 'bvfdfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `emri` varchar(250) NOT NULL,
  `mbiemri` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `adresa` varchar(250) NOT NULL,
  `telefoni` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `passK` varchar(250) NOT NULL,
  `qyteti` varchar(250) NOT NULL,
  `roli` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `emri`, `mbiemri`, `email`, `adresa`, `telefoni`, `pass`, `passK`, `qyteti`, `roli`) VALUES
(1, 'Serxhio', 'Bekteshi', 'serxhio131@gmail.com', 'Astir', '355697293468', '123456', '123456', 'Tirana', 'user'),
(2, 'Travis', 'Scott', 'TravisScott@gmail.com', 'Houston', '4256845454', 'travis123', 'travis123', 'Houston', 'artist'),
(3, 'ADMIN', 'CEO', 'admin@gmail.com', 'LA', '425555555', 'admin123.', 'admin123.', 'LA', 'admin'),
(4, 'Marshall ', 'Mathers', 'eminem@gmail.com', 'Detroit', '4565484554', 'eminem123', 'eminem123', 'Detroit', 'artist'),
(5, 'Dion', 'Verushi', 'dionverushi@gmail.com', 'Qs', '355698888888', 'dion123.', 'dion123.', 'Tirane', 'user'),
(6, 'Lil', 'Baby', 'lilbaby@gmail.com', 'Atlanta', '5486525852', 'baby123.', 'baby123.', 'Atlanta', 'artist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `id_artisti` (`idArtisti`);

--
-- Indexes for table `artisti`
--
ALTER TABLE `artisti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kenget`
--
ALTER TABLE `kenget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artistit` (`idArtisti`),
  ADD KEY `id_album` (`idAlbumi`);

--
-- Indexes for table `listeplaylist`
--
ALTER TABLE `listeplaylist`
  ADD KEY `userID` (`userID`),
  ADD KEY `kengeID` (`kengeID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idL`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artisti`
--
ALTER TABLE `artisti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kenget`
--
ALTER TABLE `kenget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `id_artisti` FOREIGN KEY (`idArtisti`) REFERENCES `artisti` (`id`);

--
-- Constraints for table `kenget`
--
ALTER TABLE `kenget`
  ADD CONSTRAINT `id_album` FOREIGN KEY (`idAlbumi`) REFERENCES `album` (`idA`),
  ADD CONSTRAINT `id_artistit` FOREIGN KEY (`idArtisti`) REFERENCES `artisti` (`id`);

--
-- Constraints for table `listeplaylist`
--
ALTER TABLE `listeplaylist`
  ADD CONSTRAINT `kengeID` FOREIGN KEY (`kengeID`) REFERENCES `kenget` (`id`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `login` (`idL`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `login` (`idL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
