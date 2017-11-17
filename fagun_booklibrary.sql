

CREATE TABLE `Authors` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`Id`, `Name`, `Email`) VALUES
(1, 'Author 1', 'author1@email.com'),
(2, 'Author 2', 'author2@email.com'),
(3, 'Author 3', 'author3@email.com'),
(4, 'Henry Fielding', 'henry@email.com'),
(5, 'Jane Austen', NULL),
(6, 'Merriam-Webster', 'webster@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `PublisherId` int(11) DEFAULT NULL,
  `Description` varchar(2500) DEFAULT NULL,
  `ImgUrl` varchar(250) DEFAULT NULL,
  `PublishDate` datetime DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Id`, `Name`, `AuthorId`, `CategoryId`, `PublisherId`, `Description`, `ImgUrl`, `PublishDate`, `ISBN`) VALUES
(1, 'Enders Game', 1, 1, 1, 'Ender\'s Game is a 1985 military science fiction novel by American author Orson Scott Card. Set in Earth\'s future, the novel presents an imperiled mankind after two conflicts with the \"buggers\", an insectoid alien species. In preparation for an anticipated third invasion, children, including the novel\'s protagonist, Ender Wiggin, are trained from a very young age through increasingly difficult games including some in zero gravity, where Ender\'s tactical genius is revealed.\r\n\r\n', 'Enders_game_cover_ISBN_0312932081.jpg', '1995-01-15 00:00:00', 'ISBN-01'),
(2, 'The Hitchhikers Guide to the Galaxy', 1, 1, 1, 'The Hitchhiker\'s Guide to the Galaxy(sometimes referred to as HG2G, HHGTTG or H2G2) is a comedy science fiction series created by Douglas Adams. Originally a radio comedy broadcast on BBC Radio 4 in 1978, it was later adapted to other formats, including stage shows, novels, comic books, a 1981 TV series, a 1984 computer game, and 2005 feature film. A prominent series in British popular culture, The Hitchhiker\'s Guide to the Galaxy has become an international multi-media phenomenon; the novels are the most widely distributed, having been translated into more than 30 languages by 2005.', 'H2G2_UK_front_cover.jpg', '1978-05-15 00:00:00', 'ISBN-02'),
(3, 'Dune', 2, 1, 2, 'Dune is a 1965 epic science fiction novel by American author Frank Herbert, originally published as two separate serials in Analog magazine. It tied with Roger Zelazny\'s This Immortal for the Hugo Award in 1966,[3] and it won the inaugural Nebula Award for Best Novel.[4] It is the first installment of the Dune saga, and in 2003 was cited as the world\'s best-selling science fiction novel.[5][6]\r\n\r\n', 'Dune-Frank_Herbert_(1965)_First_edition.jpg', '1965-08-05 00:00:00', 'ISBN-03'),
(4, 'The Hunger Games', 3, 1, 3, 'The Hunger Games is a 2008 dystopian novel by the American writer Suzanne Collins. It is written in the voice of 16-year-old Katniss Everdeen, who lives in the future, post-apocalyptic nation of Panem in North America. The Capitol, a highly advanced metropolis, exercises political control over the rest of the nation. The Hunger Games is an annual event in which one boy and one girl aged 12–18 from each of the twelve districts surrounding the Capitol are selected by lottery to compete in a televised battle to the death.\r\n\r\n', 'The_Hunger_Games.jpg', '2008-08-15 00:00:00', 'ISBN-04'),
(5, 'Tom Jones', 4, 2, 3, 'The History of Tom Jones, a Foundling, often known simply as Tom Jones, is a comic novel by the English playwright and novelist Henry Fielding. The novel is both a Bildungsroman and a picaresque novel. First published on 28 February 1749 in London, Tom Jones is among the earliest English prose works describable as a novel[1] and is the earliest novel mentioned by W. Somerset Maugham in his 1948 book Great Novelists and Their Novels among the ten best novels of the world.[2] Totaling 346,747 words, it is divided into 18 smaller books, each preceded by a discursive chapter, often on topics unrelated to the book itself. It is dedicated to George Lyttleton.\r\n\r\n', '220px-TomJonesTitle.png', '1974-02-15 00:00:00', 'ISBN-05'),
(6, 'Pride and Prejudice', 5, 2, 3, 'Pride and Prejudice is a romance novel by Jane Austen, first published in 1813. The story charts the emotional development of the protagonist, Elizabeth Bennet, who learns the error of making hasty judgments and comes to appreciate the difference between the superficial and the essential. The comedy of the writing lies in the depiction of manners, education, marriage and money in the British Regency.\r\n\r\n', '220px-PrideAndPrejudiceTitlePage.jpg', '1813-02-28 00:00:00', 'ISBN-06'),
(7, 'Spanish-English Dictionary', 6, 3, 2, NULL, 'no_img_large.jpg', '2008-08-15 00:00:00', 'ISBN-07'),
(8, 'Don Quixote', 2, 2, 1, 'The story of the gentle knight and his servant Sancho Panza has entranced readers for centuries. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(9, 'Pilgrims Progress', 2, 2, 1, 'The one with the Slough of Despond and Vanity Fair.', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(10, 'Robinson Crusoe', 1, 2, 1, 'The first English novel. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(11, 'Gulliver\'s Travels', 1, 2, 1, 'The first English novel. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(12, 'Tom Jones', 2, 2, 1, 'The adventures of a high-spirited orphan boy: an unbeatable plot and a lot of sex ending in a blissful marriage. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(13, 'Clarissa ', 2, 2, 1, 'One of the longest novels in the English language, but unputdownable. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(14, 'Tristram Shandy ', 2, 2, 1, 'One of the first bestsellers, dismissed by Dr Johnson as too fashionable for its own good.', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-08'),
(15, 'Dangerous Liaisons ', 2, 2, 1, 'An epistolary novel and a handbook for seducers: foppish, French, and ferocious. \r\n', 'no_img_large.jpg', '2013-08-15 00:00:00', 'ISBN-08'),
(16, 'Emma ', 2, 2, 1, 'Near impossible choice between this and Pride and Prejudice. But Emma never fails to fascinate and annoy\r\n', 'no_img_large.jpg', '2013-08-15 00:00:00', 'ISBN-08'),
(17, 'Frankenstein ', 2, 2, 1, 'Inspired by spending too much time with Shelley and Byron. ', 'no_img_large.jpg', '2013-08-15 00:00:00', 'ISBN-08'),
(18, 'Nightmare Abbey', 2, 2, 1, 'A classic miniature: a brilliant satire on the Romantic novel. \r\n', 'no_img_large.jpg', '2013-08-15 00:00:00', 'ISBN-08'),
(19, 'The Black Sheep', 2, 2, 1, 'Two rivals fight for the love of a femme fatale. Wrongly overlooked. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-10'),
(20, 'The Charterhouse of Parma', 2, 2, 1, 'Penetrating and compelling chronicle of life in an Italian court in post-Napoleonic France. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-10'),
(21, 'The Count of Monte Cristo', 2, 2, 1, 'A revenge thriller also set in France after Bonaparte: a masterpiece of adventure writing. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-10'),
(22, 'Sybil', 2, 2, 1, 'Apart from Churchill, no other British political figure shows literary genius. ', 'no_img_large.jpg', '2017-08-15 00:00:00', 'ISBN-10');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`Id`, `Name`) VALUES
(1, 'Science Fiction'),
(2, 'Novel'),
(3, 'Dictionary');

-- --------------------------------------------------------

--
-- Table structure for table `Publishers`
--

CREATE TABLE `Publishers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Publishers`
--

INSERT INTO `Publishers` (`Id`, `Name`, `Email`, `Address`) VALUES
(1, 'Publisher 1', 'pub1@gmail.com', 'Dallas, Texas'),
(2, 'Publisher 2', 'pub2@gmail.com', 'London, UK'),
(3, 'Publisher 3', 'pub3@gmail.com', 'Melbourne, Australia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Author` (`AuthorId`),
  ADD KEY `FK_Category` (`CategoryId`),
  ADD KEY `FK_Publisher` (`PublisherId`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Publishers`
--
ALTER TABLE `Publishers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Publishers`
--
ALTER TABLE `Publishers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;
