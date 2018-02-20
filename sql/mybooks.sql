/*
Navicat MySQL Data Transfer

Source Server         : David
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mybooks

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-24 08:44:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `AdminID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Role` enum('Editor','Admin','Supervisor') NOT NULL,
  `LoginID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`AdminID`),
  KEY `LoginID` (`LoginID`),
  CONSTRAINT `LoginID` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('6', 'David', 'OToole', 'Admin', '6');

-- ----------------------------
-- Table structure for `author`
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `AuthorID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `BirthYear` int(4) unsigned NOT NULL,
  `DeathYear` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`AuthorID`),
  KEY `az` (`Name`),
  KEY `az1` (`Name`),
  KEY `az2` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of author
-- ----------------------------
INSERT INTO `author` VALUES ('1', 'Miguel', 'de Cervantes Saavedra', 'Spanish', '1547', '1616');
INSERT INTO `author` VALUES ('2', 'Charles', 'Dickens', 'British', '1812', '1870');
INSERT INTO `author` VALUES ('3', 'J.R.R.', 'Tolkien', 'British', '1892', '1973');
INSERT INTO `author` VALUES ('4', 'Antoine', 'de Saint-Exupery', 'French', '1900', '1944');
INSERT INTO `author` VALUES ('5', 'J.K.', 'Rowling', 'British', '1965', null);
INSERT INTO `author` VALUES ('6', 'Agatha', 'Christie', 'British', '1890', '1976');
INSERT INTO `author` VALUES ('7', 'Cao', 'Xueqin', 'Chinese', '1715', '1763');
INSERT INTO `author` VALUES ('8', 'Henry', ' Rider Haggard', 'British', '1856', '1925');
INSERT INTO `author` VALUES ('9', 'C.S.', 'Lewis', 'British', '1898', '1963');

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `BookID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BookTitle` varchar(255) NOT NULL,
  `OriginalTitle` varchar(255) DEFAULT NULL,
  `YearofPublication` int(4) NOT NULL DEFAULT '0',
  `Genre` varchar(30) NOT NULL,
  `MillionsSold` int(10) unsigned NOT NULL,
  `LanguageWritten` varchar(30) NOT NULL,
  `AuthorID` int(10) unsigned NOT NULL,
  `BookCover` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BookID`),
  KEY `fk_authorID` (`AuthorID`),
  KEY `indenxx` (`BookTitle`),
  CONSTRAINT `fk_authorID` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('1', 'Don Quixote', 'El Ingenioso Hidalgo Don Quixote de la Mancha', '1605', 'Novel', '500', 'Spanish', '1', '../images/BookCovers/DonQuixote.jpg');
INSERT INTO `book` VALUES ('2', 'A Tale of Two Cities', 'A Tale of Two Cities', '1859', 'Historical Fiction', '200', 'English', '2', '../images/BookCovers/aTaleofTwoCities.jpg');
INSERT INTO `book` VALUES ('3', 'The Lord of the Rings', 'The Lord of the Rings', '1954', 'Fantasy/Adventure', '150', 'English', '3', '../images/BookCovers/lordOfTheRings.jpg');
INSERT INTO `book` VALUES ('4', 'The Little Prince', 'Le Petit Prince', '1943', 'Fable', '142', 'French', '4', '../images/BookCovers/theLittlePrince.jpg');
INSERT INTO `book` VALUES ('5', 'Harry Potter and the Sorcerer\'s Stone', 'Harry Potter and the Sorcerer\'s Stone', '1997', 'Fantasy Fiction', '107', 'English', '5', '../images/BookCovers/harryPotterStone.jpg');
INSERT INTO `book` VALUES ('6', 'And Then There Were None', 'Ten Little Niggers', '1939', 'Mystery', '100', 'English', '6', '../images/BookCovers/andThenThereWereNone.jpg');
INSERT INTO `book` VALUES ('7', 'The Dream of the Red Chamber', 'The Story of the Stone', '1792', 'Novel', '100', 'Chinese', '7', '../images/BookCovers/redChamber.jpg');
INSERT INTO `book` VALUES ('8', 'The Hobbit ', 'There and Back Again', '1937', 'High Fantasy', '100', 'English', '3', '../images/BookCovers/theHobbit.jpg');
INSERT INTO `book` VALUES ('9', 'She: A History of Adventure', 'She', '1886', 'FIction', '100', 'English', '8', '../images/BookCovers/She.jpg');
INSERT INTO `book` VALUES ('10', 'The Lion, the Witch and the Wardrobe', 'The Lion, the Witch and the Wardrobe', '1950', 'Fantasy', '85', 'English ', '9', '../images/BookCovers/lionWitch.jpg');

-- ----------------------------
-- Table structure for `bookplot`
-- ----------------------------
DROP TABLE IF EXISTS `bookplot`;
CREATE TABLE `bookplot` (
  `BookPlotID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Plot` blob NOT NULL,
  `PlotSource` varchar(255) NOT NULL,
  `BookID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`BookPlotID`),
  KEY `fk_bookID2` (`BookID`),
  CONSTRAINT `fk_bookID2` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bookplot
-- ----------------------------
INSERT INTO `bookplot` VALUES ('1', 0x5468652073746F727920666F6C6C6F77732074686520616476656E7475726573206F66206120686964616C676F206E616D6564204D722E20416C6F6E736F2051756978616E6F2077686F20726561647320736F206D616E792063686976616C72696320726F6D616E636573200D0A74686174206865206C6F736573206869732073616E69747920616E64206465636964657320746F20736574206F757420746F207265766976652063686976616C72792C20756E646F2077726F6E67732C20616E64206272696E67206A75737469636520746F2074686520776F726C642C20756E64657220746865206E616D65200D0A446F6E20517569786F7465206465206C61204D616E6368612E20486520726563727569747320612073696D706C65206661726D65722C2053616E63686F2050616E7A612C20617320686973207371756972652C2077686F206F6674656E20656D706C6F7973206120756E697175652C206561727468792077697420696E206465616C696E67207769746820446F6E20517569786F7465277320726865746F726963616C206F726174696F6E73206F6E20616E7469717561746564206B6E69676874686F6F642E, 'https://en.wikipedia.org/wiki/Don_Quixote ', '1');
INSERT INTO `bookplot` VALUES ('2', 0x496E20412054616C65206F662054776F204369746965732C20436861726C6573204461726E617920747269657320746F20657363617065206869732068657269746167652061732061204672656E63682061726973746F6372617420696E20746865207965617273206C656164696E6720757020746F20746865204672656E6368205265766F6C7574696F6E2E200D0A4F6E2074686520657665206F6620746865205265766F6C7574696F6E2C20686527732063617074757265642C20627574205379646E657920436172746F6E2C2061206D616E2077686F206C6F6F6B73206C696B65204461726E61792C2074616B65732068697320706C61636520616E642064696573206F6E20746865206775696C6C6F74696E652E, 'https://www.enotes.com/topics/tale-of-two-cities', '2');
INSERT INTO `bookplot` VALUES ('3', 0x546865207469746C65206F6620746865206E6F76656C2072656665727320746F207468652073746F7279262333393B73206D61696E20616E7461676F6E6973742C20746865204461726B204C6F726420536175726F6E2C2077686F2068616420696E20616E206561726C69657220616765206372656174656420746865200D0A4F6E652052696E6720746F2072756C6520746865206F746865722052696E6773206F6620506F7765722061732074686520756C74696D61746520776561706F6E20696E206869732063616D706169676E20746F20636F6E7175657220616E642072756C6520616C6C206F66204D6964646C652D65617274682E, 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings', '3');
INSERT INTO `bookplot` VALUES ('4', 0x4966205361696E742D4578757065727920697320746F2062652062656C696576656420546865204C6974746C65205072696E6365206973206120626F6F6B20666F72206368696C6472656E207772697474656E20666F722067726F776E2D7570732E2049742063616E2062652072656164206F6E206D616E7920646966666572656E74206C6576656C7320746F2070726F7669646520706C65617375726520616E6420666F6F6420666F722074686F7567687420666F722072656164657273206F6620616C6C20616765732E0D0A54686520617574686F722C20616E2061766961746F722C2063726173686573207769746820686973206165726F706C616E6520696E20746865206D6964646C65206F662074686520536168617261206465736572742E, 'http://www.thelittleprince.com/work/the-story/', '4');
INSERT INTO `bookplot` VALUES ('5', 0x486172727920506F74746572206973206E6F742061206E6F726D616C20626F792E205261697365642062792068697320637275656C2041756E7420616E6420556E636C652C20616E6420746F726D656E746564206279206869732062756C6C79206F66206120636F7573696E2C204475646C65792C206865206861732072657369676E656420746F2061206C696665206F66206E65676C6563742E200D0A4F6E2068697320656C6576656E74682062697274686461792C20686F77657665722C20612068616C662D6769616E742063616C6C65642048616772696420636F6D6573206372617368696E672D967175697465206C69746572616C6C792D96696E746F20686973206C6966652C20616E6420616E6E6F756E636573207468617420486172727920697320612077697A6172642E200D0A546F6765746865722074686579206A6F75726E657920746F204C6F6E646F6E20746F20676574207363686F6F6C20737570706C69657320666F722048617272799273206669727374207965617220617420486F677761727473205363686F6F6C206F66205769746368637261667420616E642057697A61726472792E20, 'http://www.hypable.com/harry-potter/sorcerers-stone-book-plot/', '5');
INSERT INTO `bookplot` VALUES ('6', 0x416E64205468656E2054686572652057657265204E6F6E652069732061206465746563746976652066696374696F6E206E6F76656C206279204167617468612043687269737469652C206669727374207075626C697368656420696E2074686520556E69746564204B696E67646F6D2062792074686520436F6C6C696E73204372696D6520436C7562206F6E2036204E6F76656D626572203139333920756E64657220746865207469746C652054656E204C6974746C65204E69676765727320616E6420696E2074686520556E697465642053746174657320627920446F64642C204D65616420616E6420436F6D70616E7920696E204A616E75617279203139343020756E64657220746865207469746C6520416E64205468656E2054686572652057657265204E6F6E652E20496E20746865206E6F76656C2C2074656E2070656F706C652C2077686F20686176652070726576696F75736C79206265656E20636F6D706C6963697420696E2074686520646561746873206F66206F74686572732062757420686176652065736361706564206E6F7469636520616E642F6F722070756E6973686D656E742C2061726520747269636B656420696E746F20636F6D696E67206F6E746F20616E2069736C616E642E204576656E2074686F75676820746865206775657374732061726520746865206F6E6C792070656F706C65206F6E207468652069736C616E642C20746865792061726520616C6C206D7973746572696F75736C79206D75726465726564206F6E65206279206F6E652C20696E2061206D616E6E657220706172616C6C656C696E672C20696E65786F7261626C7920616E6420736F6D6574696D65732067726F7465737175656C792C20746865206F6C64206E757273657279207268796D652C202254656E204C6974746C6520496E6469616E73222E2054686520554B2065646974696F6E2072657461696C656420617420736576656E207368696C6C696E677320616E642073697870656E63652028372F362920616E64207468652055532065646974696F6E2061742024322E30302E20546865206E6F76656C2068617320616C736F206265656E207075626C697368656420616E642066696C6D656420756E64657220746865207469746C652054656E204C6974746C6520496E6469616E732E, 'http://agathachristie.wikia.com/wiki/And_Then_There_Were_None', '6');
INSERT INTO `bookplot` VALUES ('7', 0x546865206E6F76656C2070726F766964657320612064657461696C65642C20657069736F646963207265636F7264206F66207468652074776F206272616E63686573206F6620746865204A696120436C616E2C20746865204E696E672D67756F20616E6420526F6E672D67756F20486F757365732C2077686F2072657369646520696E2074776F206C617267652061646A6163656E742066616D696C7920636F6D706F756E647320696E20746865206361706974616C2E200D0A546865697220616E636573746F72732077657265206D6164652044756B65732C20616E6420617320746865206E6F76656C20626567696E73207468652074776F20686F757365732072656D61696E20616D6F6E6720746865206D6F737420696C6C75737472696F75732066616D696C69657320696E20746865206361706974616C2E200D0A5468652073746F727927732070726566616365206861732073757065726E61747572616C2054616F69737420616E64204275646468697374206F766572746F6E65732E20, 'http://www.foreignercn.com/index.php?option=com_content&id=698:dream-of-the-red-chamber-&catid=34:chinese-literature&Itemid=117', '7');
INSERT INTO `bookplot` VALUES ('8', 0x54686520486F62626974206973207468652073746F7279206F662042696C626F2042616767696E732C206120686F626269742077686F206C6976657320696E20486F626269746F6E2E20486520656E6A6F7973206120706561636566756C20616E6420706173746F72616C206C6966652062757420686973206C69666520697320696E7465727275707465642062792061207375727072697365207669736974206279207468652077697A6172642047616E64616C662E200D0A4265666F72652042696C626F206973207265616C6C792061626C6520746F20696D70726F76652075706F6E2074686520736974756174696F6E2C2047616E64616C662068617320696E76697465642068696D73656C6620746F2074656120616E64207768656E20686520617272697665732C20686520636F6D65732077697468206120636F6D70616E79206F662064776172766573206C65642062792054686F72696E2E200D0A546865792061726520656D6261726B696E67206F6E2061206A6F75726E657920746F207265636F766572206C6F7374207472656173757265207468617420697320677561726465642062792074686520647261676F6E20536D6175672C20617420746865204C6F6E656C79204D6F756E7461696E2E20, 'http://www.gradesaver.com/the-hobbit/study-guide/summary', '8');
INSERT INTO `bookplot` VALUES ('9', 0x536865206973207468652073746F7279206F662043616D6272696467652070726F666573736F7220486F7261636520486F6C6C7920616E64206869732077617264204C656F2056696E6365792C20616E64207468656972206A6F75726E657920746F2061206C6F7374206B696E67646F6D20696E20746865204166726963616E20696E746572696F722E200D0A546865206A6F75726E6579206973207472696767657265642062792061206D7973746572696F7573207061636B616765206C65667420746F204C656F20627920686973206661746865722C20746F206265206F70656E6564206F6E2068697320323574682062697274686461792E0D0A5468652073746F727920657870726573736573206E756D65726F75732072616369616C20616E642065766F6C7574696F6E61727920636F6E63657074696F6E73206F6620746865206C61746520566963746F7269616E732C20657370656369616C6C79206E6F74696F6E73206F6620646567656E65726174696F6E20616E642072616369616C206465636C696E652070726F6D696E656E7420647572696E67207468652066696E206465207369E8636C652E, 'http://www.goodreads.com/book/show/682681.She', '9');
INSERT INTO `bookplot` VALUES ('10', 0x5768656E2074686520506576656E736965206368696C6472656E2C2050657465722C20537573616E2C2045646D756E642C20616E64204C756379206172652073656E74206F7574206F66204C6F6E646F6E20647572696E6720576F726C64205761722049492C20746865792068617665206E6F2069646561206F6620746865206D61676963616C206A6F75726E657920746865792061726520626567696E6E696E672E200D0A496E20746865206461726B6E657373206F6620746865206F6C6420636F756E74727920686F7573652077686572652074686579206172652073656E742C20746865206368696C6472656E207374756D626C65207468726F75676820616E206F6C642077617264726F626520746F20746865206C616E64206F66204E61726E69612C20776865726520616E696D616C732074616C6B20616E64206D61676963206578697374732E200D0A54686973206973207468652066697273742073746F7279206F66204E61726E6961207772697474656E20627920432E532E204C6577697320616E642069742074656C6C73207468652073746F7279206F6620686F7720746865736520666F7572206368696C6472656E2077697468207468652068656C70206F662041736C616E2C20746865204772656174204C696F6E2C2068656C7020646566656174207468652057686974652057697463682077686F20686F6C6473204E61726E69612E20, 'http://www.wikisummaries.org/wiki/The_Lion,_The_Witch_and_The_Wardrobe', '10');

-- ----------------------------
-- Table structure for `bookranking`
-- ----------------------------
DROP TABLE IF EXISTS `bookranking`;
CREATE TABLE `bookranking` (
  `RankingID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RankingScore` int(10) unsigned NOT NULL,
  `BookID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`RankingID`),
  KEY `fk_bookID` (`BookID`),
  CONSTRAINT `fk_bookID` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bookranking
-- ----------------------------
INSERT INTO `bookranking` VALUES ('1', '1', '1');
INSERT INTO `bookranking` VALUES ('2', '2', '2');
INSERT INTO `bookranking` VALUES ('3', '3', '3');
INSERT INTO `bookranking` VALUES ('4', '4', '4');
INSERT INTO `bookranking` VALUES ('5', '5', '5');
INSERT INTO `bookranking` VALUES ('6', '6', '6');
INSERT INTO `bookranking` VALUES ('7', '7', '7');
INSERT INTO `bookranking` VALUES ('8', '8', '8');
INSERT INTO `bookranking` VALUES ('9', '9', '9');
INSERT INTO `bookranking` VALUES ('10', '10', '10');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `LoginID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('6', 'dgotoole', '$2y$10$e4iro8jN12lMhMsdKRVm2OFvxeBjAaMyDKTH6tvxmkQ.lJ9rjDd4O');