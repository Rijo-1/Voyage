-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 10:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist_recommendation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateHotelInserts` ()   BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE max_location_id INT DEFAULT 126;
    
    WHILE i <= max_location_id DO
        -- Generate INSERT statements for each location_id
        SET @insert_sql = CONCAT('INSERT INTO Hotels (location_id, hotel_name, address, phone_number, website) VALUES ',
            '(?', ', ', '\'Hotel', i, '\'', ', ', '\'Address for Hotel', i, '\'', ', ', '\'Phone Number for Hotel', i, '\'', ', ', '\'Website for Hotel', i, '\');');
        
        -- Output the INSERT statement
        SELECT @insert_sql AS insert_statement;
        
        SET i = i + 1;
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_description`) VALUES
(1, 'France', 'France is renowned for its gastronomy, wine, art, and fashion. It is home to iconic landmarks such as the Eiffel Tower, Louvre Museum, and Notre-Dame Cathedral.'),
(2, 'Spain', 'Spain offers diverse landscapes, rich history, and vibrant culture. Highlights include the Sagrada Familia in Barcelona, Alhambra in Granada, and Ibiza\'s beaches.'),
(3, 'United States', 'The United States boasts iconic destinations like the Grand Canyon, Statue of Liberty, and Disneyland. It offers diverse experiences from bustling cities to natural wonders.'),
(4, 'China', 'China fascinates with its ancient history, stunning landscapes, and modern cities. Must-visit attractions include the Great Wall, Forbidden City, and Terracotta Army.'),
(5, 'Italy', 'Italy is famous for its art, architecture, and cuisine. Visitors flock to landmarks like the Colosseum, Vatican City, and the canals of Venice.'),
(6, 'United Kingdom', 'The United Kingdom offers a mix of historic landmarks, vibrant cities, and picturesque countryside. Highlights include Buckingham Palace, Tower of London, and Stonehenge.'),
(7, 'Germany', 'Germany is known for its castles, medieval towns, and beer culture. Notable attractions include Neuschwanstein Castle, Brandenburg Gate, and the Black Forest.'),
(8, 'Mexico', 'Mexico boasts ancient ruins, beautiful beaches, and rich cultural heritage. Must-sees include Chichen Itza, Tulum, and the beaches of Cancun and Riviera Maya.'),
(9, 'Thailand', 'Thailand entices with its tropical beaches, ornate temples, and vibrant street life. Key attractions include Wat Arun, Grand Palace, and the islands of Phuket and Koh Samui.'),
(10, 'Turkey', 'Turkey offers a blend of Eastern and Western cultures, with attractions like Hagia Sophia, Cappadocia\'s fairy chimneys, and the ancient city of Ephesus.'),
(11, 'Austria', 'Austria charms with its Alpine scenery, historic cities, and classical music heritage. Notable attractions include Schonbrunn Palace, Mirabell Palace, and Mozart\'s birthplace in Salzburg.'),
(12, 'Japan', 'Japan fascinates with its mix of ancient traditions and modern technology. Highlights include Kyoto\'s temples, Tokyo\'s skyline, and the iconic Mount Fuji.'),
(13, 'Greece', 'Greece is known for its ancient ruins, beautiful islands, and Mediterranean cuisine. Must-visits include the Acropolis, Santorini, and Mykonos.'),
(14, 'Canada', 'Canada offers stunning natural landscapes, diverse wildlife, and vibrant cities. Notable attractions include Banff National Park, Niagara Falls, and Vancouver.'),
(15, 'Australia', 'Australia boasts iconic landmarks like the Sydney Opera House, Great Barrier Reef, and Uluru. It offers diverse experiences from cosmopolitan cities to outback adventures.'),
(16, 'India', 'India is a land of cultural diversity, ancient monuments, and spiritual landmarks. Key attractions include the Taj Mahal, Varanasi, and the forts of Rajasthan.'),
(17, 'Russia', 'Russia is known for its vast landscapes, historic cities, and rich cultural heritage. Highlights include the Kremlin, Hermitage Museum, and Trans-Siberian Railway.'),
(18, 'Netherlands', 'The Netherlands charms with its picturesque canals, tulip fields, and historic windmills. Notable attractions include Amsterdam\'s canals, Keukenhof Gardens, and Van Gogh Museum.'),
(19, 'South Korea', 'South Korea offers a mix of ancient traditions, modern technology, and natural beauty. Must-visit attractions include Gyeongbokgung Palace, DMZ, and Jeju Island.'),
(20, 'Egypt', 'Egypt is famous for its ancient pyramids, temples, and monuments along the Nile River. Key attractions include the Pyramids of Giza, Karnak Temple, and Luxor.'),
(21, 'Brazil', 'Brazil entices with its stunning beaches, vibrant cities, and Amazon rainforest. Highlights include Rio de Janeiro\'s Carnival, Christ the Redeemer, and Iguazu Falls.');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `location_id`, `hotel_name`, `address`, `phone_number`, `website`) VALUES
(1, 1, 'Hotel Eiffel Trocadéro', '5 bis Rue Massenet, 75116 Paris, France', '+33 1 53 70 17 19', 'https://www.hotel-eiffel-trocadero.com/'),
(2, 1, 'Pullman Paris Tour Eiffel', '18 Avenue de Suffren, 75015 Paris, France', '+33 1 44 38 56 00', 'https://all.accor.com/hotel/7229/index.en.shtml'),
(3, 2, 'Hotel Regina Louvre', '2 Place des Pyramides, 75001 Paris, France', '+33 1 42 60 31 10', 'https://www.regina-hotel.com/'),
(4, 2, 'Hotel du Louvre', 'Place André Malraux, 75001 Paris, France', '+33 1 73 04 07 00', 'https://www.hoteldulouvre.com/'),
(5, 3, 'Hotel Atmospheres', '31 Rue des Ecoles, 75005 Paris, France', '+33 1 46 34 13 00', 'https://www.atmospheres-hotel.com/'),
(6, 3, 'Hotel Les Rives de Notre Dame', '15 Quai Saint-Michel, 75005 Paris, France', '+33 1 43 54 32 04', 'https://www.rivesdenotredame.com/'),
(7, 4, 'Hotel La Mère Poulard', 'Route de la Mère Poulard, 50170 Le Mont-Saint-Michel, France', '+33 2 33 89 68 68', 'https://www.merepoulard.com/'),
(8, 4, 'Auberge Saint Pierre', 'Grande Rue, 50170 Mont-Saint-Michel, France', '+33 2 33 60 14 04', 'http://www.auberge-saint-pierre.fr/'),
(9, 5, 'Hotel Le Louis Versailles Château - MGallery', '2 bis Avenue de Paris, 78000 Versailles, France', '+33 1 39 07 46 46', 'https://all.accor.com/hotel/A2N6/index.en.shtml'),
(10, 5, 'Hotel Le Versailles', '7 Rue Sainte-Anne, 78000 Versailles, France', '+33 1 39 50 29 29', 'https://www.hotelleversailles.fr/'),
(11, 6, 'Hotel Marignan Champs-Elysées', '12 Rue de Marignan, 75008 Paris, France', '+33 1 40 76 34 56', 'https://www.marignanchampselysees.com/'),
(12, 6, 'Hotel Napoleon Paris', '40 Avenue de Friedland, 75008 Paris, France', '+33 1 56 68 43 21', 'https://www.hotelnapoleon.com/'),
(13, 7, 'Hotel SB Glow', 'Carrer de Badajoz, 148, 08018 Barcelona, Spain', '+34 935 03 68 00', 'https://www.sbhoteles.com/en/hotels/barcelona/sb-glow/'),
(14, 7, 'Hotel Arts Barcelona', 'Carrer de la Marina, 19-21, 08005 Barcelona, Spain', '+34 932 21 10 00', 'https://www.ritzcarlton.com/en/hotels/spain/barcelona'),
(15, 8, 'Parador de Granada', 'Calle Real de la Alhambra, s/n, 18009 Granada, Spain', '+34 958 22 14 04', 'https://www.parador.es/en/paradores/parador-de-granada'),
(16, 8, 'Hotel Alhambra Palace', 'Plaza Arquitecto García de Paredes, 1, 18009 Granada, Spain', '+34 958 22 14 00', 'https://www.h-alhambrapalace.es/'),
(17, 9, 'Barcelona 226 Center Exclusive Apartments', 'Carrer de Balmes, 226, 08006 Barcelona, Spain', '+34 932 38 76 90', 'https://www.barcelona226.com/'),
(18, 9, 'Hotel BestPrice Gracia', 'Carrer de Sant Gabriel, 10, 08021 Barcelona, Spain', '+34 933 21 71 19', 'https://www.bestprice.graciahotel.com/'),
(19, 10, 'Hotel MiM Ibiza Es Vivé', 'Carrer Carlos Roman Ferrer, 8, 07800 Ibiza, Spain', '+34 971 30 00 32', 'https://www.mimhotels.com/es/vive/'),
(20, 10, 'Hotel THB Los Molinos', 'Carrer Ramon Muntaner, 60, 07800 Ibiza, Spain', '+34 971 30 15 50', 'https://www.thbhotels.com/hotel-los-molinos'),
(21, 11, 'Hotel Urban', 'Carrera de San Jerónimo, 34, 28014 Madrid, Spain', '+34 917 87 77 70', 'https://www.derbyhotels.com/en/hotel-urban/'),
(22, 11, 'NH Collection Madrid Suecia', 'Calle del Marqués de Casa Riera, 4, 28014 Madrid, Spain', '+34 917 87 75 00', 'https://www.nh-hotels.com/hotel/nh-collection-madrid-suecia'),
(23, 12, 'Hotel Midmost', 'Carrer de Pelai, 14, 08001 Barcelona, Spain', '+34 933 43 00 70', 'https://www.hotelmidmost.com/'),
(24, 12, 'Hotel Pulitzer', 'Carrer dels Tallers, 1, 08001 Barcelona, Spain', '+34 934 81 67 67', 'https://www.hotelpulitzer.es/'),
(25, 13, 'The Wagner Hotel', '2 West St, New York, NY 10004, United States', '+1 212-786-9200', 'https://www.wagnerhotel.com/'),
(26, 13, 'Conrad New York Downtown', '102 North End Ave, New York, NY 10282, United States', '+1 212-945-0100', 'https://www.conradnewyorkdowntown.com/'),
(27, 14, 'Yavapai Lodge', '11 Yavapai Lodge Rd, Grand Canyon Village, AZ 86023, United States', '+1 928-638-2631', 'https://www.visitgrandcanyon.com/lodging/yavapai-lodge/'),
(28, 14, 'Grand Canyon Plaza Hotel', '406 Canyon Plaza Ln, Tusayan, AZ 86023, United States', '+1 928-638-2673', 'https://www.grandcanyonplaza.com/'),
(29, 15, 'Old Faithful Inn', '3200 Old Faithful Inn Rd, Yellowstone National Park, WY 82190, United States', '+1 866-439-7375', 'https://www.yellowstonenationalparklodges.com/lodgings/old-faithful-inn/'),
(30, 15, 'Lake Yellowstone Hotel and Cabins', '235 Yellowstone Lake Rd, Yellowstone National Park, WY 82190, United States', '+1 866-439-7375', 'https://www.yellowstonenationalparklodges.com/lodgings/lake-yellowstone-hotel/'),
(31, 16, 'Disney\'s Grand Floridian Resort & Spa', '4401 Floridian Way, Lake Buena Vista, FL 32830, United States', '+1 407-824-3000', 'https://disneyworld.disney.go.com/resorts/grand-floridian-resort-and-spa/'),
(32, 16, 'Disney\'s Contemporary Resort', '4600 N World Dr, Orlando, FL 32830, United States', '+1 407-824-1000', 'https://disneyworld.disney.go.com/resorts/contemporary-resort/'),
(33, 17, 'The Times Square EDITION', '20 Times Square, 701 7th Ave, New York, NY 10036, United States', '+1 212-398-7017', 'https://www.editionhotels.com/times-square/'),
(34, 17, 'The Westin New York at Times Square', '270 W 43rd St, New York, NY 10036, United States', '+1 212-201-2700', 'https://www.marriott.com/hotels/travel/nycsw-the-westin-new-york-at-times-square/'),
(35, 18, 'Hotel Drisco Pacific Heights', '2901 Pacific Ave, San Francisco, CA 94115, United States', '+1 415-346-2880', 'https://www.hoteldrisco.com/'),
(36, 18, 'Cavallo Point Lodge', '601 Murray Cir, Sausalito, CA 94965, United States', '+1 415-339-4700', 'https://www.cavallopoint.com/'),
(37, 19, 'Commune by the Great Wall', 'The Great Wall Exit No. 53, Shuiguan G6 Expressway, Beijing 101399, China', '+86 10 8118 1888', 'https://commune.sohochina.com/'),
(38, 19, 'Brickyard Retreat at Mutianyu Great Wall', 'Beijing, Huairou, Mutianyu Great Wall, No. 25 Jiankou Village, 101400, China', '+86 10 6162 6506', 'https://www.brickyardatmutianyu.com/'),
(39, 20, 'Grand Hyatt Beijing', '1 E Chang An Ave, Dongcheng Qu, Beijing Shi, China, 100738', '+86 10 8518 1234', 'https://www.hyatt.com/en-US/hotel/china/grand-hyatt-beijing/beigh'),
(40, 20, 'The Peninsula Beijing', '8 Goldfish Ln, Dongdan, Dongcheng Qu, Beijing Shi, China, 100006', '+86 10 8516 2888', 'https://www.peninsula.com/beijing/en/default'),
(41, 21, 'Shangri-La Hotel Xian', '38B Keji Road, Xian, Shaanxi, 710075, China', '+86 29 8881 8888', 'https://www.shangri-la.com/xian/shangrila/'),
(42, 21, 'Grand Mercure Xian On Renmin Square', '319 Dongxin Street, Xian, Shaanxi, 710004, China', '+86 29 8792 8888', 'https://www.accorhotels.com/gb/hotel-7862-grand-mercure-xian-on-renmin-square/index.shtml'),
(43, 22, 'InterContinental Huangshan Resort', 'No. 1 Yunhai Road, Huangshan, Anhui, 245800, China', '+86 559 255 8888', 'https://www.ihg.com/intercontinental/hotels/us/en/huangshan/hynha/hoteldetail'),
(44, 22, 'Crowne Plaza Huangshan Yucheng', 'No. 1 Huizhou Avenue, Tunxi District, Huangshan, Anhui, 245000, China', '+86 559 255 8888', 'https://www.ihg.com/crowneplaza/hotels/us/en/huangshan/hsncp/hoteldetail'),
(45, 23, 'Yangshuo Mountain Retreat', '1 Chengbei Road, Gaotian Village, Yangshuo, Guilin, Guangxi, 541900, China', '+86 773 8770 943', 'https://www.yangshuomountainretreat.com/'),
(46, 23, 'Yangshuo Mountain Nest Boutique Hotel', 'NO. 17 Pantao Road, Gaotian Village, Yangshuo, Guilin, Guangxi, 541900, China', '+86 773 8770 888', 'https://mountainnesthotel.com/'),
(47, 24, 'The St. Regis Lhasa Resort', '22 Jiangsu Road, Lhasa, Tibet, 850000, China', '+86 891 680 8888', 'https://www.marriott.com/hotels/travel/lhsxr-the-st-regis-lhasa-resort/'),
(48, 24, 'Shangri-La Hotel Lhasa', '19 Norbulingka Road, Lhasa, Tibet, 850000, China', '+86 891 655 8888', 'https://www.shangri-la.com/lhasa/shangrila/'),
(49, 25, 'Hotel Forum Roma', 'Via Tor de\' Conti, 25, 00184 Roma RM, Italy', '+39 06 679 2441', 'https://www.hotelforumrome.com/'),
(50, 25, 'Palazzo Manfredi - Small Luxury Hotels of the World', 'Via Labicana, 125, 00184 Roma RM, Italy', '+39 06 7759 1380', 'https://www.palazzomanfredi.com/'),
(51, 26, 'Hotel Danieli, a Luxury Collection Hotel, Venice', 'Riva degli Schiavoni, 4196, 30122 Venezia VE, Italy', '+39 041 522 6480', 'https://www.marriott.com/hotels/travel/vcelc-hotel-danieli-a-luxury-collection-hotel-venice/'),
(52, 26, 'Belmond Hotel Cipriani', 'Giudecca, 10, 30133 Venezia VE, Italy', '+39 041 240 801', 'https://www.belmond.com/hotels/europe/italy/venice/belmond-hotel-cipriani/'),
(53, 27, 'Hotel Brunelleschi', 'Piazza Santa Elisabetta, 3, 50122 Firenze FI, Italy', '+39 055 27370', 'https://www.hotelbrunelleschi.it/'),
(54, 27, 'Hotel Savoy', 'Piazza della Repubblica, 7, 50123 Firenze FI, Italy', '+39 055 27351', 'https://www.roccofortehotels.com/hotels-and-resorts/hotel-savoy/'),
(55, 28, 'Hotel Santa Caterina', 'S.S. Amalfitana, 9, 84011 Amalfi SA, Italy', '+39 089 871012', 'https://www.hotelsantacaterina.it/'),
(56, 28, 'Belmond Hotel Caruso', 'Piazza San Giovanni del Toro, 2, 84010 Ravello SA, Italy', '+39 089 858801', 'https://www.belmond.com/hotels/europe/italy/amalfi-coast/belmond-hotel-caruso/'),
(57, 29, 'Hotel Forum Pompei', 'Via Roma, 99, 80045 Pompei NA, Italy', '+39 081 863 1711', 'https://www.hotelforumpompei.it/'),
(58, 29, 'Hotel Vittoria', 'Piazza Porta Marina Inferiore, 4, 80045 Pompei NA, Italy', '+39 081 863 2789', 'http://www.vittoria.it/'),
(59, 30, 'Hotel Porto Roca', 'Via Corone, 1, 19017 Monterosso al Mare SP, Italy', '+39 0187 817502', 'https://www.portoroca.it/'),
(60, 30, 'Hotel Villa Steno', 'Via Roma, 109, 19016 Monterosso al Mare SP, Italy', '+39 0187 817028', 'https://www.villasteno.com/'),
(61, 31, 'DoubleTree by Hilton Hotel London - Tower of London', '7 Pepys St, London EC3N 4AF, United Kingdom', '+44 20 7709 1000', 'https://doubletree3.hilton.com/en/hotels/united-kingdom/doubletree-by-hilton-hotel-london-tower-of-london-LONTLDI/index.html'),
(62, 31, 'The Tower Hotel', 'St Katharine\'s Way, St Katharine\'s & Wapping, London EC3N 4AB, United Kingdom', '+44 20 7237 1000', 'https://www.thetowerhotellondon.com/'),
(63, 32, 'The Stones Hotel', 'Highpost A345, Salisbury SP4 6AT, United Kingdom', '+44 1980 677467', 'https://www.stoneshotel.co.uk/'),
(64, 32, 'Legacy Rose & Crown Hotel', 'Harnham Rd, Salisbury SP2 8JQ, United Kingdom', '+44 1722 328615', 'https://www.legacy-hotels.co.uk/legacy-rose-and-crown-hotel-salisbury/'),
(65, 33, 'The Balmoral Hotel', '1 Princes St, Edinburgh EH2 2EQ, United Kingdom', '+44 131 556 2414', 'https://www.roccofortehotels.com/hotels-and-resorts/the-balmoral-hotel/'),
(66, 33, 'Radisson Collection Hotel, Royal Mile Edinburgh', '1 George IV Bridge, Edinburgh EH1 1AD, United Kingdom', '+44 131 220 6666', 'https://www.radissonhotels.com/en-us/hotels/radisson-collection-edinburgh'),
(67, 34, 'The Montague on The Gardens', '15 Montague St, Bloomsbury, London WC1B 5BJ, United Kingdom', '+44 20 7637 1001', 'https://www.montaguehotel.com/'),
(68, 34, 'Kimpton Fitzroy London', '1-8 Russell Square, Bloomsbury, London WC1B 5BE, United Kingdom', '+44 20 7123 5000', 'https://www.kimptonfitzroylondon.com/'),
(69, 35, 'Park Plaza Westminster Bridge London', '200 Westminster Bridge Rd, London SE1 7UT, United Kingdom', '+44 333 400 6112', 'https://www.parkplaza.com/westminsterbridge'),
(70, 35, 'Park Plaza London Riverbank', '18 Albert Embankment, Lambeth, London SE1 7TJ, United Kingdom', '+44 333 400 6112', 'https://www.parkplaza.com/riverbank'),
(71, 36, 'The Ritz London', '150 Piccadilly, St. James\'s, London W1J 9BR, United Kingdom', '+44 20 7493 8181', 'https://www.theritzlondon.com/'),
(72, 36, 'The Lanesborough, Oetker Collection', 'Hyde Park Corner, London SW1X 7TA, United Kingdom', '+44 20 7259 5599', 'https://www.oetkercollection.com/hotels/the-lanesborough/'),
(73, 37, 'Hotel Müller', 'Neuschwansteinstraße 10, 87645 Hohenschwangau, Germany', '+49 8362 81930', 'https://www.hotel-mueller.de/'),
(74, 37, 'Hotel Schwanstein', 'Neuschwansteinstraße 5, 87645 Hohenschwangau, Germany', '+49 8362 939800', 'https://www.hotel-schwanstein.de/'),
(75, 38, 'Hotel Adlon Kempinski Berlin', 'Unter den Linden 77, 10117 Berlin, Germany', '+49 30 22610', 'https://www.kempinski.com/en/berlin/hotel-adlon/'),
(76, 38, 'Regent Berlin', 'Charlottenstraße 49, 10117 Berlin, Germany', '+49 30 20336363', 'https://www.regenthotels.com/regent-berlin'),
(77, 39, 'Hotel Der Öschberghof', 'Golfplatz 1, 78166 Donaueschingen, Germany', '+49 771 840', 'https://www.oeschberghof.com/'),
(78, 39, 'Traube Tonbach', 'Tonbachstraße 237, 72270 Baiersbronn, Germany', '+49 7442 4920', 'https://www.traube-tonbach.de/'),
(79, 40, 'Excelsior Hotel Ernst am Dom', 'Trankgasse 1-5 / Domplatz, 50667 Köln, Germany', '+49 221 2701', 'https://www.excelsiorhotelernst.com/'),
(80, 40, 'Hyatt Regency Cologne', 'Kennedy-Ufer 2A, 50679 Köln, Germany', '+49 221 8281234', 'https://www.hyatt.com/en-US/hotel/germany/hyatt-regency-cologne/colog'),
(81, 41, 'Meliá Berlin', 'Friedrichstraße 103, 10117 Berlin, Germany', '+49 30 206070', 'https://www.melia.com/en/hotels/germany/berlin/melia-berlin/index.html'),
(82, 41, 'Crowne Plaza Berlin - Potsdamer Platz', 'Hallesche Str. 10, 10963 Berlin, Germany', '+49 30 8010660', 'https://www.ihg.com/crowneplaza/hotels/us/en/berlin/berha/hoteldetail'),
(83, 42, 'Hotel Europäischer Hof Heidelberg', 'Friedrich-Ebert-Anlage 1, 69117 Heidelberg, Germany', '+49 6221 5150', 'https://www.europaeischerhof.com/'),
(84, 42, 'Hotel Zum Ritter St. Georg', 'Hauptstr. 178, 69117 Heidelberg, Germany', '+49 6221 7050', 'https://www.ritter-heidelberg.com/'),
(85, 43, 'Mayaland Hotel & Bungalows', 'Carretera Mérida - Puerto Juárez Km 120, Zona Hotelera, 97751 Chichén Itzá, Yuc., Mexico', '+52 985 851 0030', 'https://www.mayaland.com/'),
(86, 43, 'Hacienda Chichen Resort & Yaxkin Spa', 'KM 120 Carretera Federal, 97751 Chichén Itzá, Yuc., Mexico', '+52 999 920 8407', 'https://www.haciendachichen.com/'),
(87, 44, 'Azulik', 'Carretera Tulum-Boca Paila Km 5, 77780 Tulum, Q.R., Mexico', '+52 1 984 980 0640', 'https://www.azulik.com/'),
(88, 44, 'Be Tulum Beach & Spa Resort', 'Carretera Tulum-Boca Paila Km 10, 77780 Tulum, Q.R., Mexico', '+52 984 803 2243', 'https://www.betulum.com/'),
(89, 45, 'The Ritz-Carlton, Cancun', 'Retorno del Rey #36, Zona Hotelera, 77500 Cancún, Q.R., Mexico', '+52 998 881 0808', 'https://www.ritzcarlton.com/cancun'),
(90, 45, 'Grand Fiesta Americana Coral Beach Cancun All Inclusive Spa Resort', 'Blvd. Kukulcan km 9.5, Zona Hotelera, 77500 Cancún, Q.R., Mexico', '+52 998 881 3200', 'https://www.fiestamericana.com/en/web/grand-fiesta-americana-coral-beach-cancun-all-inclusive-spa-resort'),
(91, 46, 'Chan-Kah Resort Village Convention Center & Maya Spa', 'Carretera Internacional Km 1189, Zona Arqueológica de Palenque, 29960 Palenque, Chis., Mexico', '+52 916 345 1145', 'https://www.chankah.com.mx/'),
(92, 46, 'Hotel Ciudad Real Palenque', 'Carretera a Pakal Na, Zona Arqueológica, 29960 Palenque, Chis., Mexico', '+52 916 345 1900', 'https://www.ciudadreal-palenque.com.mx/'),
(93, 47, 'Villas Arqueológicas Teotihuacan', 'Pirámide del Sol, San Juan Teotihuacán, Méx., Mexico', '+52 594 957 2383', 'http://villasarqueologicas.com.mx/'),
(94, 47, 'Hotel Quinto Sol', 'Vía Adolfo López Mateos 22, San Sebastián Xolalpa, 55810 San Juan Teotihuacán de Arista, Méx., Mexico', '+52 594 958 2181', 'http://www.hotelquintosol.com.mx/'),
(95, 48, 'Copper Canyon Adventure Park', 'Chihuahua, Mexico', '+52 635 103 2428', 'http://www.coppercanyonmexico.com/'),
(96, 48, 'Hotel Barrancas del Cobre', 'Cerocahui, Chihuahua, Mexico', '+52 615 154 0074', 'https://www.hotelbarrancasdelcobre.mx/'),
(97, 49, 'Arun Residence', '36-38 Soi Pratoo Nok Yoong, Maharat Road, Rattanakosin Island, Bangkok 10200, Thailand', '+66 2 221 9158', 'http://www.arunresidence.com/'),
(98, 49, 'Riva Arun Bangkok', '392/25 Maharaj Road, Phra Borom Maha Ratchawang, Phra Nakhon, Bangkok 10200, Thailand', '+66 2 221 1188', 'https://www.rivaarunbangkok.com/'),
(99, 50, 'Royal Orchid Sheraton Hotel & Towers', '2 Charoen Krung Rd Soi 30, Siphya, Bang Rak, Bangkok 10500, Thailand', '+66 2 665 3165', 'https://www.marriott.com/hotels/travel/bkkro-royal-orchid-sheraton-hotel-and-towers/'),
(100, 50, 'The Peninsula Bangkok', '333 Charoennakorn Road, Klongsan, Bangkok 10600, Thailand', '+66 2 020 2888', 'https://www.peninsula.com/en/bangkok/5-star-luxury-hotel-riverside'),
(101, 51, 'Phi Phi Island Village Beach Resort', '49 Moo 8, Phi Phi Island, Ao Nang, Krabi 81000, Thailand', '+66 75 628 900', 'https://www.phiphiislandvillage.com/'),
(102, 51, 'Zeavola Resort', '11 Moo 8, Laem Tong, Koh Phi Phi, Ao Nang, Krabi 81000, Thailand', '+66 75 627 000', 'https://www.zeavola.com/'),
(103, 52, 'The Dhara Dhevi Chiang Mai', '51/4 Chiang Mai - Sankampaeng Road, Moo 1, Tambon Tasala, Amphur Muang, Chiang Mai 50000, Thailand', '+66 53 888 888', 'https://www.dharadhevi.com/'),
(104, 52, 'Rachamankha Hotel a Member of Relais & Châteaux', '6 Rachamankha 9, Phra Singh, Muang, Chiang Mai 50200, Thailand', '+66 53 904 111', 'https://www.rachamankha.com/'),
(105, 53, 'Trisara Phuket', '60/1 Moo 6, Srisoonthorn Road, Cherngtalay, Thalang, Phuket 83110, Thailand', '+66 76 683 320', 'https://www.trisara.com/'),
(106, 53, 'The Surin Phuket', '118 Moo 3, Choeng Thale, Thalang, Phuket 83110, Thailand', '+66 76 316 400', 'https://www.thesurinphuket.com/'),
(107, 54, 'Rayavadee Resort', '214 Tambon Ao Nang, Amphoe Mueang Krabi, Chang Wat Krabi 81000, Thailand', '+66 75 620 740', 'https://www.rayavadee.com/'),
(108, 54, 'Bhu Nga Thani Resort & Spa', '479 Moo 2, Ao Nang, Muang, Krabi 81000, Thailand', '+66 75 819 400', 'https://www.bhungathani.com/'),
(109, 55, 'Sura Hagia Sophia Hotel', 'Divanyolu Cad. Alemdar Mah. Ticarethane Sok. No:10 Sultanahmet, Istanbul 34122, Turkey', '+90 212 522 2700', 'https://surahotels.com/surahagiasophia/'),
(110, 55, 'Four Seasons Hotel Istanbul at Sultanahmet', 'Tevkifhane Sokak No.1, Sultanahmet-Eminönü, Istanbul 34110, Turkey', '+90 212 402 3000', 'https://www.fourseasons.com/istanbul/'),
(111, 56, 'Sultan Cave Suites', 'Ayvansaray Mahallesi, Ayvansaray Cd. No:32, 50180 Göreme Belediyesi/Nevşehir, Turkey', '+90 384 271 3033', 'https://sultancavesuites.com/'),
(112, 56, 'Mithra Cave Hotel', 'Aydınlı Mahallesi, Aydınlı Sokak No:12, 50180 Göreme Belediyesi/Nevşehir, Turkey', '+90 384 271 2478', 'https://mithracavehotel.com/'),
(113, 57, 'Ephesus Palace', 'Atatürk Mah. Turgut Özal Bulvarı No:93 Selçuk, 35920 İzmir, Turkey', '+90 232 892 10 58', 'http://ephesuspalace.com/'),
(114, 57, 'Charisma De Luxe Hotel', 'Atatürk Mahallesi, Istiklal Caddesi No: 3, 09400 Kuşadası/Aydın, Turkey', '+90 256 618 1010', 'https://www.charismahotel.com/'),
(115, 58, 'Richmond Pamukkale Thermal', 'Karahayıt, Mehmet Akif Ersoy Bulv. No:5, 20290 Pamukkale/Denizli, Turkey', '+90 258 271 4200', 'https://www.richmondhotels.com.tr/'),
(116, 58, 'Doga Thermal Health & Spa', 'Gazi Mustafa Kemal Bulv. No:51 Karahayıt, 20290 Pamukkale/Denizli, Turkey', '+90 258 271 4100', 'https://www.dogathermal.com/'),
(117, 59, 'Four Seasons Hotel Istanbul at the Bosphorus', 'Çırağan Cd. No:28, 34349 Beşiktaş/İstanbul, Turkey', '+90 212 381 4000', 'https://www.fourseasons.com/bosphorus/'),
(118, 59, 'Çırağan Palace Kempinski Istanbul', 'Çırağan Cd. No:32, 34349 Beşiktaş/İstanbul, Turkey', '+90 212 326 4646', 'https://www.kempinski.com/en/istanbul/ciragan-palace/'),
(119, 60, 'Tuvana Hotel', 'Tuzcular Mahallesi, Karanlık Sokak No:18, 07100 Kaleiçi/Antalya, Turkey', '+90 242 247 6014', 'https://www.tuvanahotel.com/'),
(120, 60, 'Puding Marina Residence', 'Mermerli Sk. No:15, 07100 Kaleiçi/Antalya, Turkey', '+90 242 243 3737', 'https://www.pudingmarina.com/'),
(121, 61, 'Austria Trend Parkhotel Schönbrunn Wien', 'Hietzinger Hauptstraße 10-14, 1130 Wien, Austria', '+43 1 878 040', 'https://www.austria-trend.at/en/hotels/parkhotel-schoenbrunn'),
(122, 61, 'Radisson Blu Park Royal Palace Hotel, Vienna', 'Schlossallee 8, 1140 Wien, Austria', '+43 1 891 180', 'https://www.radissonhotels.com/en-us/hotels/radisson-blu-vienna-palace'),
(123, 62, 'Hotel Sacher Wien', 'Philharmonikerstraße 4, 1010 Wien, Austria', '+43 1 514560', 'https://www.sacher.com/en/hotel-sacher-vienna/'),
(124, 62, 'The Guesthouse Vienna', 'Führichgasse 10, 1010 Wien, Austria', '+43 1 5121320', 'https://www.theguesthouse.at/'),
(125, 63, 'Hotel Goldgasse', 'Goldgasse 10, 5020 Salzburg, Austria', '+43 662 840330', 'https://www.hotelgoldgasse.at/'),
(126, 63, 'Hotel Elefant', 'Sigmund-Haffner-Gasse 4, 5020 Salzburg, Austria', '+43 662 8444480', 'https://www.hotelelefant.at/'),
(127, 64, 'Heritage Hotel Hallstatt', 'Landungsplatz 101, 4830 Hallstatt, Austria', '+43 6134 20065', 'https://www.heritage-hotel.at/'),
(128, 64, 'Seehotel Grüner Baum', 'Marktplatz 104, 4830 Hallstatt, Austria', '+43 6134 82650', 'https://www.gruenerbaum.cc/'),
(129, 65, 'Grand Hotel Europa', 'Südtiroler Platz 2, 6020 Innsbruck, Austria', '+43 512 5931', 'https://www.grandhoteleuropa.at/'),
(130, 65, 'AC Hotel by Marriott Innsbruck', 'Salurner Str. 15, 6020 Innsbruck, Austria', '+43 512 224000', 'https://www.marriott.com/hotels/travel/innti-ac-hotel-innsbruck/'),
(131, 66, 'Gradonna Mountain Resort', 'Kitzsteinhornstraße 36, 9981 Kals am Großglockner, Austria', '+43 4876 8200', 'https://www.gradonna.at/'),
(132, 66, 'Sporthotel Königsberg', 'Ködnitz 7, 9971 Matrei in Osttirol, Austria', '+43 4875 6611', 'https://www.sporthotel-koenigsberg.at/'),
(133, 67, 'The Ritz-Carlton, Kyoto', 'Kamogawa Nijo-Ohashi Hotori, Nakagyo Ward, Kyoto, 604-0902, Japan', '+81 75-746-5555', 'https://www.ritzcarlton.com/en/hotels/japan/kyoto'),
(134, 67, 'Hotel Granvia Kyoto', 'Japan, 〒600-8216 Kyoto, Shimogyo Ward, Higashishiokojicho, 京都駅ビル 東駐車場, 地下1階', '+81 75-344-8888', 'https://granviakyoto.com/'),
(135, 67, 'Hotel The Celestine Kyoto Gion', '572 Gionmachi Minamigawa, Higashiyama Ward, Kyoto, 605-0074, Japan', '+81 75-531-2525', 'https://celestinehotels.jp/kyoto-gion/english/'),
(136, 67, 'Hotel Granvia Kyoto', '901 Higashishiokojicho, Shimogyo Ward, Kyoto, 600-8216, Japan', '+81 75-344-8888', 'https://granviakyoto.com/en/'),
(137, 68, 'Park Hyatt Tokyo', '3-7-1-2 Nishi Shinjuku, Shinjuku-Ku, Tokyo, 163-1055, Japan', '+81 3-5322-1234', 'https://www.hyatt.com/en-US/hotel/japan/park-hyatt-tokyo/tyoph'),
(138, 68, 'The Tokyo Station Hotel', '1 Chome-9-1 Marunouchi, Chiyoda City, Tokyo, 100-0005, Japan', '+81 3-5220-1111', 'https://www.thetokyostationhotel.jp/'),
(139, 69, 'Fuji View Hotel', '511 Katsuyama, Fujikawaguchiko, Minamitsuru District, Yamanashi 401-0310, Japan', '+81 555-83-2211', 'https://www.fujiview.jp/en/'),
(140, 69, 'Hoshinoya Fuji', '1408 Ōishi, Fujikawaguchiko, Minamitsuru District, Yamanashi 401-0305, Japan', '+81 555-73-5733', 'https://hoshinoya.com/fuji/en/'),
(141, 70, 'InterContinental Osaka', '3-60, Ofuka-cho, Kita-ku, Osaka, 530-0011, Japan', '+81 6-6374-5700', 'https://www.icosaka.com/'),
(142, 70, 'The Ritz-Carlton Osaka', '2-5-25 Umeda, Kita Ward, Osaka, 530-0001, Japan', '+81 6-6343-7000', 'https://www.ritzcarlton.com/en/hotels/japan/osaka'),
(143, 71, 'Sheraton Grand Hiroshima Hotel', '12-1 Wakakusa-cho, Higashi-ku, Hiroshima, 732-0053, Japan', '+81 82-262-7111', 'https://www.marriott.com/hotels/travel/hijsi-sheraton-grand-hiroshima-hotel/'),
(144, 71, 'RIHGA Royal Hotel Hiroshima', '6-78 Motomachi, Naka-ku, Hiroshima, 730-0011, Japan', '+81 82-502-1121', 'https://www.rihgaroyalkyoto.com/hotel_hiroshima/'),
(145, 72, 'Nara Hotel', '1096 Takabatake-cho, Nara, 630-8301, Japan', '+81 742-26-3300', 'https://www.narahotel.co.jp/english/'),
(146, 72, 'Hotel Nikko Nara', '8-1 Sanjo-hommachi, Nara, 630-8122, Japan', '+81 742-35-8831', 'https://www.hotelnikko-nara.jp/english/'),
(147, 73, 'Hotel Grande Bretagne, a Luxury Collection Hotel', '1 Vasileos Georgiou A\' Street, Syntagma Square, Athens, 105 64, Greece', '+30 210 3330000', 'https://www.grandebretagne.gr/'),
(148, 73, 'Electra Palace Athens', '18-20 N. Nikodimou Street, Athens, 105 57, Greece', '+30 210 3370000', 'https://www.electrahotels.gr/en/athens/electra-palace-athens'),
(149, 74, 'Katikies Hotel Santorini', 'Oia, Santorini 847 02, Greece', '+30 2286 07140', 'https://www.katikies.com/'),
(150, 74, 'Canaves Oia Suites & Spa', 'Oia, Santorini 847 02, Greece', '+30 2286 071518', 'https://www.canaves.com/oia-suites/'),
(151, 75, 'Bill & Coo Suites and Lounge', 'Agios Ioannis, Mykonos 846 00, Greece', '+30 2289 020055', 'https://www.bill-coo-hotel.com/'),
(152, 75, 'Mykonos Grand Hotel & Resort', 'Agios Ioannis, Mykonos 846 00, Greece', '+30 2289 025252', 'https://www.mykonosgrand.gr/'),
(153, 76, 'Amalia Hotel Delphi', '1 Apollonos Street, Delphi 330 54, Greece', '+30 2265 082080', 'https://www.amaliahoteldelphi.gr/'),
(154, 76, 'Hotel Acropole Delphi', '13 Ifestou Street, Delphi 330 54, Greece', '+30 2265 082293', 'https://www.acropoledelphi.gr/'),
(155, 77, 'Grand Meteora Hotel', 'Kastraki, Kalambaka 422 00, Greece', '+30 2432 070700', 'https://www.grandmeteora.gr/'),
(156, 77, 'Divani Meteora Hotel', 'Kastraki, Kalambaka 422 00, Greece', '+30 2432 077000', 'https://divanimeteorahotel.com/'),
(157, 78, 'Mystique, a Luxury Collection Hotel, Santorini', 'Oia, Santorini 847 02, Greece', '+30 2286 071801', 'https://www.mystique.gr/'),
(158, 78, 'Andronis Boutique Hotel', 'Oia, Santorini 847 02, Greece', '+30 2286 071116', 'https://www.andronisboutiquehotel.com/'),
(159, 79, 'Fairmont Banff Springs', '405 Spray Ave, Banff, AB T1L 1J4, Canada', '+1 403-762-2211', 'https://www.fairmont.com/banff-springs/'),
(160, 79, 'Rimrock Resort Hotel', '300 Mountain Ave, Banff, AB T1L 1J2, Canada', '+1 403-762-3356', 'https://rimrockresort.com/'),
(161, 80, 'Sheraton on the Falls Hotel', '5875 Falls Ave, Niagara Falls, ON L2G 3K7, Canada', '+1 905-374-4445', 'https://www.sheratononthefalls.com/'),
(162, 80, 'Marriott Niagara Falls Fallsview Hotel & Spa', '6740 Fallsview Blvd, Niagara Falls, ON L2G 3W6, Canada', '+1 905-357-7300', 'https://www.marriott.com/hotels/travel/iagmc-niagara-falls-marriott-fallsview-hotel-and-spa/'),
(163, 81, 'Fairmont Hotel Vancouver', '900 W Georgia St, Vancouver, BC V6C 2W6, Canada', '+1 604-684-3131', 'https://www.fairmont.com/hotel-vancouver/'),
(164, 81, 'The Westin Bayshore, Vancouver', '1601 Bayshore Dr, Vancouver, BC V6G 2V4, Canada', '+1 604-682-3377', 'https://www.marriott.com/hotels/travel/yvrvb-the-westin-bayshore-vancouver/'),
(165, 82, 'Fairmont Royal York', '100 Front St W, Toronto, ON M5J 1E3, Canada', '+1 416-368-2511', 'https://www.fairmont.com/royal-york-toronto/'),
(166, 82, 'The Ritz-Carlton, Toronto', '181 Wellington St W, Toronto, ON M5V 3G7, Canada', '+1 416-585-2500', 'https://www.ritzcarlton.com/en/hotels/canada/toronto'),
(167, 83, 'Fairmont Chateau Whistler', '4599 Chateau Blvd, Whistler, BC V8E 0Z5, Canada', '+1 604-938-8000', 'https://www.fairmont.com/whistler/'),
(168, 83, 'Four Seasons Resort and Residences Whistler', '4591 Blackcomb Way, Whistler, BC V8E 0Y4, Canada', '+1 604-935-3400', 'https://www.fourseasons.com/whistler/'),
(169, 84, 'Fairmont The Queen Elizabeth', '900 René-Lévesque Blvd W, Montreal, QC H3B 4A5, Canada', '+1 514-861-3511', 'https://www.fairmont.com/queen-elizabeth-montreal/'),
(170, 84, 'Hotel Bonaventure Montreal', '900 de La Gauchetière St W, Montreal, QC H5A 1E4, Canada', '+1 514-878-2332', 'https://www.hotelbonaventure.com/'),
(171, 85, 'Park Hyatt Sydney', '7 Hickson Rd, The Rocks NSW 2000, Australia', '+61 2 9256 1234', 'https://www.hyatt.com/en-US/hotel/australia/park-hyatt-sydney/sydph'),
(172, 85, 'Shangri-La Hotel Sydney', '176 Cumberland St, The Rocks NSW 2000, Australia', '+61 2 9250 6000', 'https://www.shangri-la.com/sydney/shangrila/'),
(173, 86, 'Lizard Island Resort', 'Lizard Island QLD 4871, Australia', '+61 7 4043 1999', 'https://www.lizardisland.com.au/'),
(174, 86, 'Orpheus Island Lodge', 'Orpheus Island, QLD 4810, Australia', '+61 7 4777 7377', 'https://www.orpheus.com.au/'),
(175, 87, 'Longitude 131', 'Yulara Dr, Yulara NT 0872, Australia', '+61 2 9918 4355', 'https://longitude131.com.au/'),
(176, 87, 'Sails in the Desert', 'Yulara Dr, Yulara NT 0872, Australia', '+61 2 8296 8010', 'https://www.ayersrockresort.com.au/accommodation/sails-in-the-desert'),
(177, 88, 'The Langham, Melbourne', '1 Southgate Ave, Southbank VIC 3006, Australia', '+61 3 8696 8888', 'https://www.langhamhotels.com/en/the-langham/melbourne/'),
(178, 88, 'Crown Towers Melbourne', '8 Whiteman St, Southbank VIC 3006, Australia', '+61 3 9292 6868', 'https://www.crownhotels.com.au/crown-towers-melbourne'),
(179, 89, 'The Apollo Bay Hotel', '95 Great Ocean Rd, Apollo Bay VIC 3233, Australia', '+61 3 5237 6900', 'https://theapollobayhotel.com.au/'),
(180, 89, 'Cumberland Lorne Resort', '150 Mountjoy Parade, Lorne VIC 3232, Australia', '+61 3 5284 2100', 'https://cumberland.com.au/'),
(181, 90, 'Southern Ocean Lodge', 'Hanson Bay Road, Kingscote, Kangaroo Island SA 5223, Australia', '+61 2 9918 4355', 'https://southernoceanlodge.com.au/'),
(182, 90, 'Kangaroo Island Wilderness Retreat', 'Flinders Chase National Park, Lot 1 South Coast Rd, Flinders Chase SA 5223, Australia', '+61 8 8559 7347', 'https://www.wildernessretreat.com.au/'),
(183, 91, 'ITC Mughal, a Luxury Collection Resort & Spa, Agra', 'Taj Ganj, Agra, Uttar Pradesh 282001, India', '+91 562 402 1700', 'https://www.marriott.com/hotels/travel/aglit-itc-mughal-a-luxury-collection-resort-and-spa-agra/'),
(184, 91, 'The Oberoi Amarvilas, Agra', 'Taj East Gate Road, Agra, Uttar Pradesh 282001, India', '+91 562 223 1515', 'https://www.oberoihotels.com/hotels-in-agra-amarvilas-resort/'),
(185, 92, 'Taj Nadesar Palace, Varanasi', 'Nadesar Palace Grounds, Varanasi, Uttar Pradesh 221002, India', '+91 542 667 1234', 'https://www.tajhotels.com/en-in/taj/taj-nadesar-palace-varanasi/'),
(186, 92, 'The Gateway Hotel Ganges Varanasi', 'Nadesar Palace Grounds, Varanasi, Uttar Pradesh 221002, India', '+91 542 666 0001', 'https://gateway.tajhotels.com/en-in/ganges-varanasi/'),
(187, 93, 'Rambagh Palace, Jaipur', 'Bhawani Singh Rd, Rambagh, Jaipur, Rajasthan 302005, India', '+91 141 238 5700', 'https://www.tajhotels.com/en-in/taj/taj-rambagh-palace-jaipur/'),
(188, 93, 'The Oberoi Rajvilas, Jaipur', 'Goner Rd, Jaipur, Rajasthan 302031, India', '+91 141 268 0101', 'https://www.oberoihotels.com/hotels-in-jaipur-rajvilas-resort/'),
(189, 94, 'The Leela Goa', 'Mobor, Cavelossim, Goa 403731, India', '+91 832 662 1234', 'https://www.theleela.com/en_us/hotels-in-goa/the-leela-goa-hotel-resort/'),
(190, 94, 'Park Hyatt Goa Resort and Spa', 'Arossim Beach, Cansaulim, Goa 403712, India', '+91 832 272 1234', 'https://www.hyatt.com/en-US/hotel/india/park-hyatt-goa-resort-and-spa/goaph'),
(191, 95, 'Vivanta Kochi, Marine Drive', 'Vivanta Kochi, Marine Drive, Kochi, Kerala 682011, India', '+91 484 664 3000', 'https://www.tajhotels.com/en-in/vivanta/kochi-kerala/'),
(192, 95, 'Kumarakom Lake Resort', 'Kumarakom North Post, Kottayam, Kerala 686566, India', '+91 481 252 4900', 'https://www.kumarakomlakeresort.in/'),
(193, 96, 'The Oberoi Vanyavilas Wildlife Resort, Ranthambhore', 'Ranthambhore Road, Sawai Madhopur, Rajasthan 322001, India', '+91 7462 22 9900', 'https://www.oberoihotels.com/hotels-in-ranthambhore-vanyavilas-resort/'),
(194, 96, 'Taj Sawai Madhopur Lodge', 'Ranthambhore National Park Road, Sawai Madhopur, Rajasthan 322001, India', '+91 7462 22 4900', 'https://www.tajhotels.com/en-in/taj/taj-sawai-madhopur-lodge/'),
(195, 97, 'Four Seasons Hotel Moscow', '2 Okhotny Ryad St, Moscow, 109012, Russia', '+7 499 277-71-00', 'https://www.fourseasons.com/moscow/'),
(196, 97, 'Hotel Metropol Moscow', 'Teatralnyy proyezd, 2, Moscow, 109012, Russia', '+7 499 501-78-00', 'https://metropol-moscow.ru/en/'),
(197, 98, 'SO/ Saint Petersburg', '6 Voznesensky Ave, St Petersburg, Russia, 190000', '+7 812 6106161', 'https://all.accor.com/hotel/B5Z1/index.ru.shtml'),
(198, 98, 'Belmond Grand Hotel Europe', 'Mikhailovskaya Ulitsa, 1/7, St Petersburg, Russia, 191186', '+7 812 3296000', 'https://www.belmond.com/hotels/europe/russia/st-petersburg/belmond-grand-hotel-europe/'),
(199, 99, 'Hotel Novotel Yekaterinburg Centre', '7 Engels St, Yekaterinburg, Sverdlovskaya oblast, 620075, Russia', '+7 343 219-91-00', 'https://all.accor.com/hotel/8630/index.ru.shtml'),
(200, 99, 'Park Inn by Radisson Novosibirsk', '10 Ulitsa Ordzhonikidze, Novosibirsk, Novosibirskaya oblast, 630099, Russia', '+7 383 217-56-00', 'https://www.radissonhotels.com/en-us/hotels/park-inn-novosibirsk'),
(201, 100, 'The St. Regis Moscow Nikolskaya', '12 Nikolskaya St, Moscow, Russia, 109012', '+7 495 9677776', 'https://www.marriott.com/hotels/travel/mowxr-the-st-regis-moscow-nikolskaya/'),
(202, 100, 'Hotel National, a Luxury Collection Hotel, Moscow', '15/1 Mokhovaya St, Moscow, Russia, 125009', '+7 495 2587000', 'https://www.marriott.com/hotels/travel/mowcl-hotel-national-a-luxury-collection-hotel-moscow/'),
(203, 101, 'Gavan Baikala', 'Baikalskaya St, 24, Listvyanka, Irkutsk Oblast, Russia, 664520', '+7 395 278-50-33', 'http://www.gavan-baikala.ru/'),
(204, 101, 'Mayak Hotel', 'Port Baikal, Baikal District, Irkutsk Oblast, Russia, 666137', '+7 914 918-44-21', 'https://www.mayakhotel.ru/'),
(205, 102, 'New Peterhof Hotel', 'St.Petersburg highway, 34, Petergof, Saint Petersburg, Russia, 198510', '+7 812 924-30-69', 'http://newpeterhof.com/'),
(206, 102, 'Petro Palace Hotel', 'Ulitsa Malaya Morskaya, 14, St Petersburg, Russia, 190000', '+7 812 333-22-00', 'https://petropalacehotel.com/'),
(207, 103, 'NH Conference Centre Koningshof', 'Locht 117, Veldhoven, Netherlands, 5504 RM', '+31 40 253 7453', 'https://www.nh-hotels.com/hotel/nh-conference-centre-koningshof'),
(208, 103, 'Hotel de Doelen', 'Voorstraat 48, Leiden, Netherlands, 2311 HS', '+31 71 512 1573', 'https://www.hoteldedoelen.nl/en/'),
(209, 104, 'The Dylan Amsterdam', 'Keizersgracht 384, 1016 GB Amsterdam, Netherlands', '+31 20 530 2010', 'https://www.dylanamsterdam.com/'),
(210, 104, 'Hotel Pulitzer Amsterdam', 'Prinsengracht 315-331, 1016 GZ Amsterdam, Netherlands', '+31 20 523 5235', 'https://www.pulitzeramsterdam.com/'),
(211, 105, 'Conservatorium Hotel', 'Van Baerlestraat 27, 1071 AN Amsterdam, Netherlands', '+31 20 570 0000', 'https://www.conservatoriumhotel.com/'),
(212, 105, 'Hotel JL No76', 'Jan Luijkenstraat 76, 1071 CT Amsterdam, Netherlands', '+31 20 305 3000', 'https://www.jlno76.com/'),
(213, 106, 'Hotel Okura Amsterdam', 'Ferdinand Bolstraat 333, 1072 LH Amsterdam, Netherlands', '+31 20 678 7111', 'https://www.okura.nl/'),
(214, 106, 'Hotel Arena', '\'s-Gravesandestraat 55, 1092 AA Amsterdam, Netherlands', '+31 20 850 2400', 'https://hotelarena.nl/'),
(215, 107, 'Hotel Estheréa', 'Singel 303-309, 1012 WJ Amsterdam, Netherlands', '+31 20 624 5146', 'https://www.hotel-estherea.nl/'),
(216, 107, 'Hotel Sebastian\'s', 'Keizersgracht 15, 1015 CC Amsterdam, Netherlands', '+31 20 625 2753', 'https://www.hotelsebastians.nl/'),
(217, 108, 'Inntel Hotels Amsterdam Zaandam', 'Provincialeweg 102, 1506 MD Zaandam, Netherlands', '+31 75 631 1711', 'https://www.inntelhotelsamsterdamzaandam.nl/'),
(218, 108, 'Hotel van Saaze', 'Vrouwenstraat 18, 8281 AD Genemuiden, Netherlands', '+31 38 385 3025', 'https://hotelvansaaze.nl/'),
(219, 109, 'The Shilla Seoul', '249 Dongho-ro, Jangchung-dong, Jung-gu, Seoul, South Korea', '+82 2 2233 3131', 'https://www.shilla.net/seoul'),
(220, 109, 'Four Seasons Hotel Seoul', '97 Saemunan-ro, Jongno-gu, Seoul, South Korea', '+82 2 6388 5000', 'https://www.fourseasons.com/seoul/'),
(221, 110, 'Liberté Sokcho', '275-2, Changjo-ro, Sokcho-si, Gangwon-do, South Korea', '+82 33 635 9100', 'http://liberte.co.kr/en'),
(222, 110, 'Sorak Park Hotel & Casino', '107, Donghae-ro, Sokcho-si, Gangwon-do, South Korea', '+82 33 630 2000', 'http://www.sorakpark.com/'),
(223, 111, 'The Shilla Jeju', '75 Jungmungwangwang-ro 72beon-gil, Andeok-myeon, Seogwipo-si, Jeju-do, South Korea', '+82 64 735 5114', 'https://www.shilla.net/jeju'),
(224, 111, 'Lotte Hotel Jeju', '35 Jungmungwangwang-ro 72beon-gil, Andeok-myeon, Seogwipo-si, Jeju-do, South Korea', '+82 64 731 1000', 'https://www.lottehotel.com/jeju/en.html'),
(225, 112, 'Rakkojae Seoul', '17 Bukchon-ro 5-gil, Jongno-gu, Seoul, South Korea', '+82 2 742 3410', 'https://www.rkj.co.kr/eng/index.html'),
(226, 112, 'Arari Village', '10 Bukchon-ro 5-gil, Jongno-gu, Seoul, South Korea', '+82 2 736 2311', 'http://www.ararivillage.com/'),
(227, 113, 'Paradise Hotel Busan', '296 Haeundaehaebyeon-ro, Haeundae-gu, Busan, South Korea', '+82 51 749 5000', 'https://www.busanparadisehotel.co.kr/eng/main/main.do'),
(228, 113, 'Shilla Stay Haeundae', '46, Haeundaehaebyeon-ro 249beon-gil, Haeundae-gu, Busan, South Korea', '+82 51 731 6000', 'https://stay.shillahotels.com/en/hotels/stay-haeundae/main.do'),
(229, 114, 'Grand Hyatt Seoul', '322 Sowol-ro, Itaewon-dong, Yongsan-gu, Seoul, South Korea', '+82 2 797 1234', 'https://www.hyatt.com/en-US/hotel/south-korea/grand-hyatt-seoul/selrs'),
(230, 114, 'Four Seasons Hotel Seoul', '97 Saemunan-ro, Jongno-gu, Seoul, South Korea', '+82 2 6388 5000', 'https://www.fourseasons.com/seoul/'),
(231, 115, 'Marriott Mena House, Cairo', '6 Pyramids Rd, Giza, Cairo, Egypt', '+20 2 33773222', 'https://www.marriott.com/hotels/travel/caimn-marriott-mena-house-cairo/'),
(232, 115, 'Le Méridien Pyramids Hotel & Spa', 'El Remaya Square, Pyramids, PO Box 25, Giza, Egypt', '+20 2 33773222', 'https://www.marriott.com/hotels/travel/caimr-le-meridien-pyramids-hotel-and-spa/'),
(233, 116, 'Hilton Luxor Resort & Spa', 'New Karnak, Luxor, Egypt', '+20 95 2380420', 'https://www.hilton.com/en/hotels/luxlshi-hilton-luxor-resort-and-spa/'),
(234, 116, 'Sofitel Winter Palace Luxor', 'Corniche El Nile St, Luxor, Egypt', '+20 95 2380420', 'https://www.sofitel.accor.com/gb/hotel-1661-sofitel-winter-palace-luxor/index.shtml'),
(235, 117, 'Sofitel Winter Palace Luxor', 'Corniche El Nile St, Luxor, Egypt', '+20 95 2380420', 'https://www.sofitel.accor.com/gb/hotel-1661-sofitel-winter-palace-luxor/index.shtml'),
(236, 117, 'Hilton Luxor Resort & Spa', 'New Karnak, Luxor, Egypt', '+20 95 2380420', 'https://www.hilton.com/en/hotels/luxlshi-hilton-luxor-resort-and-spa/'),
(237, 118, 'Sofitel Winter Palace Luxor', 'Corniche El Nile St, Luxor, Egypt', '+20 95 2380420', 'https://www.sofitel.accor.com/gb/hotel-1661-sofitel-winter-palace-luxor/index.shtml'),
(238, 118, 'Hilton Luxor Resort & Spa', 'New Karnak, Luxor, Egypt', '+20 95 2380420', 'https://www.hilton.com/en/hotels/luxlshi-hilton-luxor-resort-and-spa/'),
(239, 119, 'Seti Abu Simbel Lake Resort', 'Abu Simbel, Aswan Governorate, Egypt', '+20 97 2600030', 'http://www.setihotels.com/'),
(240, 119, 'Nefertari Hotel Abu Simbel', 'Abu Simbel, Aswan Governorate, Egypt', '+20 97 260 0511', 'https://nefertarihotels.com/'),
(241, 120, 'Rixos Premium Seagate', 'Nabq Bay, Sharm El Sheikh, South Sinai Governorate, Egypt', '+20 69 3710090', 'https://premiumseagate.rixoshotels.com/'),
(242, 120, 'Hilton Marsa Alam Nubian Resort', 'Marsa Alam - Quseir Rd, Abu Dabab, Red Sea Governorate, Egypt', '+20 65 3680420', 'https://www.hilton.com/en/hotels/rmqrahx-hilton-marsa-alam-nubian-resort/'),
(243, 121, 'Belmond Copacabana Palace', 'Avenida Atlântica, 1702 - Copacabana, Rio de Janeiro - RJ, 22021-001, Brazil', '+55 21 2548-7070', 'https://www.belmond.com/hotels/south-america/brazil/rio-de-janeiro/belmond-copacabana-palace/'),
(244, 121, 'JW Marriott Hotel Rio de Janeiro', 'Av. Atlântica, 2600 - Copacabana, Rio de Janeiro - RJ, 22041-001, Brazil', '+55 21 2545-6500', 'https://www.marriott.com/hotels/travel/riomc-jw-marriott-hotel-rio-de-janeiro/'),
(245, 122, 'Belmond Hotel das Cataratas', 'Rodovia Br 469, Km 32, Parque Nacional Do Iguaçu, Foz do Iguaçu - PR, 85855-750, Brazil', '+55 45 2102-7000', 'https://www.belmond.com/hotels/south-america/brazil/iguassu-falls/belmond-hotel-das-cataratas/'),
(246, 122, 'Recanto Cataratas Thermas Resort & Convention', 'Av. Costa e Silva, 3500 - Jardim Itamaraty, Foz do Iguaçu - PR, 85863-000, Brazil', '+55 45 2102-3030', 'https://www.recantocataratasresort.com.br/'),
(247, 123, 'Belmond Copacabana Palace', 'Avenida Atlântica, 1702 - Copacabana, Rio de Janeiro - RJ, 22021-001, Brazil', '+55 21 2548-7070', 'https://www.belmond.com/hotels/south-america/brazil/rio-de-janeiro/belmond-copacabana-palace/'),
(248, 123, 'JW Marriott Hotel Rio de Janeiro', 'Av. Atlântica, 2600 - Copacabana, Rio de Janeiro - RJ, 22041-001, Brazil', '+55 21 2545-6500', 'https://www.marriott.com/hotels/travel/riomc-jw-marriott-hotel-rio-de-janeiro/'),
(249, 124, 'Anavilhanas Jungle Lodge', 'R. Ana Nogueira, 1180 - Parque Anauá, Novo Airão - AM, 69280-000, Brazil', '+55 92 3622-8997', 'https://www.anavilhanaslodge.com.br/'),
(250, 124, 'Amazon EcoPark Jungle Lodge', 'Rua Uirapuru, 488 - Tarumã, Manaus - AM, 69041-300, Brazil', '+55 92 3622-8997', 'https://www.amazonecopark.com.br/'),
(251, 125, 'Hilton Rio de Janeiro Copacabana', 'Av. Atlântica, 1020 - Copacabana, Rio de Janeiro - RJ, 22010-000, Brazil', '+55 21 3501-8000', 'https://www.hilton.com/en/hotels/riohitw-hilton-rio-de-janeiro-copacabana/'),
(252, 125, 'Windsor Atlântica', 'Av. Atlântica, 1020 - Copacabana, Rio de Janeiro - RJ, 22010-000, Brazil', '+55 21 2195-5800', 'https://windsorhoteis.com/hotel/windsor-atlantica/'),
(253, 126, 'Hotel Baía das Pedras', 'Estrada Parque, 120 - Águas de Miranda, Corumbá - MS, 79310-000, Brazil', '+55 67 3232-0633', 'http://www.baiadaspedras.com.br/'),
(254, 126, 'Caiman Lodge', 'Rodovia, BR 262, KM 546, Miranda - MS, 79380-000, Brazil', '+55 67 3242-5979', 'https://www.caiman.com.br/');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `cuisine_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `location_id`, `restaurant_name`, `address`, `phone_number`, `website`, `cuisine_type`) VALUES
(1, 1, 'Le Jules Verne', 'Champ de Mars, 5 Avenue Anatole France, 75007 Paris, France', '+33 1 45 55 61 44', 'https://www.lejulesverne-paris.com/', 'French'),
(2, 1, '58 Tour Eiffel', 'Tour Eiffel, Champ de Mars, 5 Avenue Anatole France, 75007 Paris, France', '+33 1 72 76 18 08', 'https://www.restaurants-toureiffel.com/', 'French'),
(3, 2, 'Le Café Marly', '93 Rue de Rivoli, 75001 Paris, France', '+33 1 49 26 06 60', 'https://cafe-marly.com/', 'French'),
(4, 2, 'Angelina', '226 Rue de Rivoli, 75001 Paris, France', '+33 1 42 60 82 00', 'https://www.angelina-paris.fr/en/', 'French'),
(5, 3, 'Au Vieux Paris d\'Arcole', '24 Rue Chanoinesse, 75004 Paris, France', '+33 1 43 54 08 08', 'https://auvieuxparisdarcole.fr/', 'French'),
(6, 3, 'La Tour d\'Argent', '15 Quai de la Tournelle, 75005 Paris, France', '+33 1 43 54 23 31', 'https://tourdargent.com/', 'French'),
(7, 4, 'La Mère Poulard', 'Grande Rue, 50170 Le Mont-Saint-Michel, France', '+33 2 33 89 68 68', 'https://www.merepoulard.com/', 'French'),
(8, 4, 'Le Relais Saint Michel', 'Le Caserne, 50170 Le Mont-Saint-Michel, France', '+33 2 33 89 02 02', 'https://www.relais-saint-michel.fr/', 'French'),
(9, 5, 'La Petite Venise', '5 Rue Colbert, 78000 Versailles, France', '+33 1 30 21 18 18', 'https://www.petitevenise-versailles.fr/', 'French'),
(10, 5, 'La Flottille', 'Allée de la Flottille, 78000 Versailles, France', '+33 1 39 51 41 91', 'https://www.restaurantlaflottille.fr/', 'French'),
(11, 6, 'Ladurée Champs-Élysées', '75 Avenue des Champs-Élysées, 75008 Paris, France', '+33 1 40 75 08 75', 'https://www.laduree.fr/', 'French'),
(12, 6, 'Le Fouquet\'s', '99 Avenue des Champs-Élysées, 75008 Paris, France', '+33 1 40 69 60 50', 'https://www.fouquets-barriere.com/', 'French'),
(13, 7, 'Restaurante Martínez', 'Carrer de Valladolid, 12, 08014 Barcelona, Spain', '+34 934 40 12 16', 'https://www.martinezbarcelona.com/', 'Spanish'),
(14, 7, 'Güell Tapas', 'Carrer de Lepant, 316, 08025 Barcelona, Spain', '+34 931 18 08 26', 'https://www.guelltapas.com/', 'Spanish'),
(15, 8, 'Restaurante Arrayanes', 'Calle Mirador de San Nicolás, 1, 18010 Granada, Spain', '+34 958 22 56 52', 'http://www.restaurante-arrayanes.com/', 'Spanish'),
(16, 8, 'Jardines Alberto', 'Calle Real de la Alhambra, s/n, 18009 Granada, Spain', '+34 958 22 78 16', 'http://www.jardinesalberto.es/', 'Spanish'),
(17, 9, 'Park Güell Café', 'Carrer d\'Olot, s/n, 08024 Barcelona, Spain', '+34 931 84 27 97', 'https://www.parkguell.cat/ca/parc-guell/cafe/', 'Mediterranean'),
(18, 9, 'Sala Beckett', 'Carrer de Rector Triadó, 31-33, 08014 Barcelona, Spain', '+34 932 85 07 48', 'http://salabeckett.cat/', 'Mediterranean'),
(19, 10, 'Sa Capella', 'Carrer Sa Capella, 2, 07814 San Antonio, Ibiza, Spain', '+34 971 34 33 57', 'https://www.sacapellarestaurant.com/', 'Mediterranean'),
(20, 10, 'El Portalon', 'Carrer de Sa Carrossa, 12, 07814 Santa Agnès de Corona, Ibiza, Spain', '+34 971 80 60 14', 'https://elportalonibiza.com/', 'Mediterranean'),
(21, 11, 'Casa Labra', 'Calle de Tetuán, 12, 28013 Madrid, Spain', '+34 915 31 82 04', 'https://www.casalabra.es/', 'Spanish'),
(22, 11, 'Lhardy', 'Carrera de San Jerónimo, 8, 28014 Madrid, Spain', '+34 915 22 00 52', 'https://www.lhardy.com/', 'Spanish'),
(23, 12, 'Cera 23', 'Carrer de la Cera, 23, 08001 Barcelona, Spain', '+34 933 29 98 90', 'https://www.cera23.com/', 'Mediterranean'),
(24, 12, 'Les Quinze Nits', 'Plaça Reial, 6, 08002 Barcelona, Spain', '+34 934 81 08 18', 'http://www.lesquinzenits.com/', 'Mediterranean'),
(25, 13, 'Liberty House Restaurant', '76 Audrey Zapp Dr, Jersey City, NJ 07305, United States', '+1 201-395-0300', 'https://www.libertyhouserestaurant.com/', 'American'),
(26, 13, 'Statue of Liberty Crown Cafe', 'Statue of Liberty, New York, NY 10004, United States', '+1 212-363-3200', 'https://www.statueoflibertytickets.com/crown-cafe/', 'American'),
(27, 14, 'El Tovar Dining Room', '1 El Tovar Rd, Grand Canyon Village, AZ 86023, United States', '+1 928-638-2631', 'https://www.grandcanyonlodges.com/dining/el-tovar-dining-room/', 'American'),
(28, 14, 'Arizona Room', '1 Village Loop Dr, Grand Canyon Village, AZ 86023, United States', '+1 928-638-2631', 'https://www.grandcanyonlodges.com/dining/arizona-room/', 'American'),
(29, 15, 'Old Faithful Inn Dining Room', 'Old Faithful, Yellowstone National Park, WY 82190, United States', '+1 307-344-7311', 'https://www.yellowstonenationalparklodges.com/lodgings/old-faithful-inn/', 'American'),
(30, 15, 'Yellowstone Lake Hotel Dining Room', '1 Grand Loop Rd, Yellowstone National Park, WY 82190, United States', '+1 307-344-7311', 'https://www.yellowstonenationalparklodges.com/lodgings/yellowstone-lake-hotel/', 'American'),
(31, 16, 'Be Our Guest Restaurant', 'Magic Kingdom Park, 1180 Seven Seas Dr, Lake Buena Vista, FL 32830, United States', '+1 407-939-5277', 'https://disneyworld.disney.go.com/dining/magic-kingdom/be-our-guest-restaurant/', 'American'),
(32, 16, 'California Grill', 'Disney\'s Contemporary Resort, 4600 N World Dr, Orlando, FL 32830, United States', '+1 407-939-3463', 'https://disneyworld.disney.go.com/dining/contemporary-resort/california-grill/', 'American'),
(33, 17, 'Junior\'s Restaurant & Bakery', '1515 Broadway, New York, NY 10036, United States', '+1 212-302-2000', 'https://www.juniorscheesecake.com/', 'American'),
(34, 17, 'Carmine\'s Italian Restaurant - Times Square', '200 W 44th St, New York, NY 10036, United States', '+1 212-221-3800', 'https://www.carminesnyc.com/', 'Italian'),
(35, 18, 'Golden Gate Grill', '1 Lone Mountain Rd, San Francisco, CA 94129, United States', '+1 415-561-4700', 'https://www.parksconservancy.org/parks/golden-gate-national-recreation-area/golden-gate-bridge-plaza/food-and-drink/golden-gate-grill', 'American'),
(36, 18, 'Presidio Social Club', '563 Ruger St, San Francisco, CA 94129, United States', '+1 415-885-1888', 'https://www.presidiosocialclub.com/', 'American'),
(37, 19, 'Compass Grill - Commune by the Great Wall', 'The Commune by the Great Wall, Badaling Shuiguan, Yanqing District, Beijing 102112, China', '+86 10 8118 1888', 'https://www.commune.com.cn/en/dining/compass-grill', 'Chinese'),
(38, 19, 'Schoolhouse by Mutianyu Great Wall', 'Jiankou Village, Huairou District, Beijing, China', '+86 10 6162 6506', 'http://www.theschoolhouseatmutianyu.com/', 'Chinese'),
(39, 20, 'Jing Yaa Tang', 'Nanxin Cang International Mansion, 67 Beijixiang Hutong, Dongcheng Qu, Beijing Shi, China, 100005', '+86 10 6529 8880', 'http://www.jingyatang.cn/', 'Chinese'),
(40, 20, 'Black Sesame Kitchen', 'No.28 Zhong Lao Hutong, Dongcheng District, Beijing, China', '+86 136 9147 4408', 'http://www.blacksesamekitchen.com/', 'Chinese'),
(41, 21, 'Mishen Braised Chicken', 'Wenchang Men Street, Yanzhai Street, Lintong District, Xi\'an 710600, China', '+86 29 3366 2688', 'https://mishenmisundong.com/', 'Chinese'),
(42, 21, 'Defachang Dumpling Restaurant', 'No. 32 Dong Wu Yuan, Lianhu District, Xi\'an 710002, China', '+86 29 8727 0992', 'https://www.defachang.com.cn/', 'Chinese'),
(43, 22, 'Xihai Hotel Restaurant', 'No. 1 Xihai Huyuan, Huangshan, China', '+86 559 556 6555', 'http://www.hsxihaihotel.cn/', 'Chinese'),
(44, 22, 'Xihai Restaurant', 'The Beginning of Xihai Scenic Area, Huangshan, China', '+86 559 558 0008', 'https://www.lonelyplanet.com/china/huangshan/restaurants/xihai/a/poi-eat/1328642/356066', 'Chinese'),
(45, 23, 'Rosewood Guilin', 'No. 158 Yixing Road, Guilin, Guangxi 541004, China', '+86 773 8888 888', 'https://www.rosewoodhotels.com/en/guilin', 'Chinese'),
(46, 23, 'Lijiang Waterfall Hotel', '1 North Shanhu Road, Xiangshan District, Guilin 541002, China', '+86 773 289 8888', 'http://www.lijiangwaterfallhotel.com/', 'Chinese'),
(47, 24, 'Tibetan Family Kitchen', 'Zang Yiyuan Xiang, Chengguan District, Lhasa, Tibet, China', '+86 891 633 6389', 'http://www.tibetanfamilykitchen.com/', 'Tibetan'),
(48, 24, 'Tashi 1 Restaurant', 'Bei Da Jie, Chengguan District, Lhasa, Tibet, China', '+86 891 632 3158', 'https://www.tripadvisor.com/Restaurant_Review-g294223-d791893-Reviews-Tashi_1_Restaurant-Lhasa_Tibet.html', 'Tibetan'),
(49, 25, 'Trattoria Luzzi', 'Via di S. Giovanni in Laterano, 88, 00184 Roma RM, Italy', '+39 06 700 1973', 'http://www.trattorialuzzi.it/', 'Italian'),
(50, 25, 'Hostaria Antica Roma', 'Via del Boschetto, 36, 00184 Roma RM, Italy', '+39 06 474 5325', 'https://www.hostariaanticaroma.com/', 'Italian'),
(51, 26, 'Osteria alle Testiere', 'Calle del Mondo Novo, 5801, 30122 Venezia VE, Italy', '+39 041 522 7220', 'http://www.osterialletestiere.it/', 'Seafood'),
(52, 26, 'Trattoria Antiche Carampane', 'Rio Terà de la Carampane, 1911, 30135 Venezia VE, Italy', '+39 041 524 0165', 'http://www.antichecarampane.com/', 'Seafood'),
(53, 27, 'Trattoria Mario', 'Via Rosina, 2, 50123 Firenze FI, Italy', '+39 055 218550', 'http://www.trattoriamario.com/', 'Italian'),
(54, 27, 'La Giostra', 'Borgo Pinti, 10, 50121 Firenze FI, Italy', '+39 055 241341', 'http://www.ristorantelagiostra.com/', 'Italian'),
(55, 28, 'Ristorante Pizzeria Da Teresa', 'Via del Brigantino, 19, 84011 Amalfi SA, Italy', '+39 089 871985', 'http://www.pizzeriateresa.it/', 'Italian'),
(56, 28, 'Ristorante Pizzeria L\'Abside', 'Via Sant\'Andrea, 30, 84011 Amalfi SA, Italy', '+39 089 871856', 'http://www.ristorantelabside.it/', 'Italian'),
(57, 29, 'Ristorante Pizzeria Christian', 'Via Plinio, 17, 80045 Pompei NA, Italy', '+39 081 8507859', 'http://www.christianpompei.com/', 'Italian'),
(58, 29, 'Ristorante Sarcamento', 'Via Roma, 2, 80045 Pompei NA, Italy', '+39 081 8508401', 'https://www.sarcamento.it/', 'Italian'),
(59, 30, 'Belforte', 'Via Guidoni, 42, 19017 Riomaggiore SP, Italy', '+39 0187 920040', 'http://www.ristorantebelforte.it/', 'Italian'),
(60, 30, 'Il Porticciolo', 'Via Renato Birolli, 101, 19018 Vernazza SP, Italy', '+39 0187 812292', 'https://www.ilporticciolovernazza.it/', 'Italian'),
(61, 31, 'The Ivy Tower Bridge', 'One Tower Bridge, Tower Bridge Road, London SE1 2AA, United Kingdom', '+44 20 3146 7733', 'https://theivytowerbridge.com/', 'British, European'),
(62, 31, 'Coppa Club Tower Bridge', '3 Three Quays Walk, Lower Thames St, London EC3R 6AH, United Kingdom', '+44 20 7993 3827', 'https://www.coppaclub.co.uk/towerbridge', 'European'),
(63, 32, 'The Phoenix', '15-16 Wincanton Rd, Salisbury SP4 7DL, United Kingdom', '+44 1722 413481', 'https://www.thephoenixinn.co.uk/', 'British, Pub'),
(64, 32, 'The Bridge Inn', 'Upper Woodford, Salisbury SP4 6NQ, United Kingdom', '+44 1722 782247', 'http://www.thebridgeinnwoodford.co.uk/', 'British, Pub'),
(65, 33, 'The Witchery by the Castle', 'Castlehill, Edinburgh EH1 2NF, United Kingdom', '+44 131 225 5613', 'https://www.thewitchery.com/', 'Scottish, European'),
(66, 33, 'The Doric', '15-16 Market St, Edinburgh EH1 1DE, United Kingdom', '+44 131 225 1084', 'https://doricedinburgh.co.uk/', 'Scottish, British'),
(67, 34, 'The British Museum Court Restaurant', 'Great Russell St, Bloomsbury, London WC1B 3DG, United Kingdom', '+44 20 7323 8990', 'https://www.britishmuseum.org/visit/eating-drinking/british-museum-cafe', 'British, European'),
(68, 34, 'Russell Square Garden Cafe', 'Russell Square, Bloomsbury, London WC1B 5BE, United Kingdom', '+44 20 7631 6314', 'https://russellsquare-gardencafe.co.uk/', 'Cafe, European'),
(69, 35, 'Westminster Kitchen Grill House', 'Westminster Bridge Rd, Lambeth, London SE1 7UT, United Kingdom', '+44 20 7630 2111', 'https://www.westminsterkitchen.com/', 'British, European'),
(70, 35, 'The Cinnamon Club', 'The Old Westminster Library, 30-32 Great Smith St, Westminster, London SW1P 3BU, United Kingdom', '+44 20 7222 2555', 'https://www.cinnamonclub.com/', 'Indian, Asian'),
(71, 36, 'The Ritz Restaurant', '150 Piccadilly, St. James\'s, London W1J 9BR, United Kingdom', '+44 20 7493 8181', 'https://www.theritzlondon.com/', 'British, European'),
(72, 36, 'The English Rose Cafe & Tea Shoppe', '1 Buckingham Palace Rd, Victoria, London SW1W 9PY, United Kingdom', '+44 20 7828 8979', 'https://www.englishrosecafe.co.uk/', 'British, Cafe'),
(73, 37, 'Restaurant Neuschwanstein', 'Alpseestraße 8, 87645 Hohenschwangau, Germany', '+49 8362 930830', 'https://www.restaurant-neuschwanstein.de/', 'German, European'),
(74, 37, 'Alpenstuben', 'Alpseestraße 8, 87645 Hohenschwangau, Germany', '+49 8362 8870', 'https://www.alpenstuben-neuschwanstein.de/', 'German, European'),
(75, 38, 'Lutter & Wegner', 'Charlottenstraße 56, 10117 Berlin, Germany', '+49 30 2029540', 'https://www.l-w-berlin.de/', 'German, European'),
(76, 38, 'Zur letzten Instanz', 'Waisenstraße 14-16, 10179 Berlin, Germany', '+49 30 2425528', 'https://zurletzteninstanz.com/', 'German, European'),
(77, 39, 'Gasthaus zum Ochsen', 'Mühlenweg 6, 77815 Bühl, Germany', '+49 7223 9410', 'https://gasthaus-ochsen-buehl.de/', 'German, European'),
(78, 39, 'Hotel Restaurant Sonne', 'Oberdorfstraße 14, 77709 Wolfach, Germany', '+49 7834 83510', 'https://www.sonne-wolfach.de/', 'German, European'),
(79, 40, 'Fischhaus Stürmer', 'Am Frankenturm 1, 50667 Köln, Germany', '+49 221 257 4999', 'https://www.fischhaus-stuermer.de/', 'German, Seafood'),
(80, 40, 'Lommerzheim', 'Siegesstraße 18, 50679 Köln, Germany', '+49 221 813345', 'https://lommerzheim.de/', 'German, European'),
(81, 41, 'Max und Moritz', 'Oranienstraße 162, 10969 Berlin, Germany', '+49 30 6147730', 'https://www.maxundmoritz-berlin.de/', 'German, European'),
(82, 41, 'Parker Bowles', 'Prinzenstraße 85d, 10969 Berlin, Germany', '+49 30 39586940', 'https://parker-bowles.com/', 'German, European'),
(83, 42, 'Restaurant Zum Ritter St. Georg', 'Hauptstraße 178, 69117 Heidelberg, Germany', '+49 6221 659750', 'https://ritter-heidelberg.de/', 'German, European'),
(84, 42, 'Weisser Bock', 'Hauptstraße 217, 69117 Heidelberg, Germany', '+49 6221 206430', 'https://weisserbock-heidelberg.de/', 'German, European'),
(85, 43, 'Hacienda Chichen Resort & Yaxkin Spa', 'Chichen Itza, Yucatan, Mexico', '+52 985 851 0012', 'https://www.haciendachichen.com/', 'Mexican, Mayan'),
(86, 43, 'La Casa del Agua', 'Av. Yaxchilan Mz. 5 Lt. 15-16, 22, 77500 Cancún, Q.R., Mexico', '+52 998 887 2719', 'http://www.lacasadelagua.mx/', 'Mexican, Seafood'),
(87, 44, 'Hartwood', 'Carretera Tulum Boca Paila, km 7.6, Tulum, 77780 Tulum, Q.R., Mexico', '+52 984 803 2586', 'https://www.hartwoodtulum.com/', 'Mexican, Seafood'),
(88, 44, 'Casa Jaguar', 'Calle Centauro Sur entre Av. Tulum y Orion Norte, Tulum Centro, 77780 Tulum, Q.R., Mexico', '+52 984 157 0681', 'http://www.casajaguartulum.com/', 'Mexican, Fusion'),
(89, 45, 'Puerto Madero', 'Boulevard Kukulcan Km. 14.1, La Isla Shopping Village, Zona Hotelera, 77500 Cancún, Q.R., Mexico', '+52 998 883 2000', 'https://puertomaderocancun.com/', 'Mexican, Seafood'),
(90, 45, 'La Habichuela Sunset', 'Blvd. Kukulkan KM. 12.6, La Isla, Zona Hotelera, 77500 Cancún, Q.R., Mexico', '+52 998 883 1111', 'https://lahabichuela.com/', 'Mexican, Caribbean'),
(91, 46, 'Restaurante Maya Balam', 'Carretera a Palenque, Km. 2.5, 29960 Palenque, Chis., Mexico', '+52 916 345 1232', 'http://www.restaurante-mayabalam.com.mx/', 'Mexican, Mayan'),
(92, 46, 'Don Mucho\'s', 'Carretera a Palenque-Ruinas Km 1.5, 29960 Palenque, Chis., Mexico', '+52 916 345 0515', 'https://www.donmuchos.com/', 'Mexican, International'),
(93, 47, 'La Gruta', 'Calle de la Gruta S/N, San Juan Teotihuacan de Arista, 55800 San Juan Teotihuacán, Méx., Mexico', '+52 594 957 1628', 'http://lagruta.com.mx/', 'Mexican, International'),
(94, 47, 'Los Colorines', 'Carretera a San Juan Teotihuacan 116, San Sebastian Xolalpa, 55800 San Juan Teotihuacán, Méx., Mexico', '+52 594 957 3194', 'https://www.loscolorines.mx/', 'Mexican, International'),
(95, 48, 'Hotel Mirador Posada Barrancas', 'Carretera San Juanito-Bahuichivo Km 622, Barrancas, 33401 Urique, Chih., Mexico', '+52 635 456 0600', 'https://www.hotelmirador.mx/', 'Mexican, International'),
(96, 48, 'Tarahumara Restaurant', 'Hidalgo 6, FTE a Telmex, 33200 Creel, Chih., Mexico', '+52 635 456 0027', 'http://www.hotelelvalle.com.mx/', 'Mexican, International'),
(97, 49, 'Baan Paa Art & Cafe', '158 Soi Tha Tien, Maha Rat Road, Bangkok Yai, Bangkok 10600, Thailand', '+66 2 221 1900', 'https://baanpaaartcafe.com/', 'Thai, Asian'),
(98, 49, 'Tha Tian Seafood', '285 Maha Rat Rd, Khwaeng Phra Borom Maha Ratchawang, Khet Phra Nakhon, Krung Thep Maha Nakhon 10200, Thailand', '+66 2 221 5129', 'https://www.tha-tian-seafood.com/', 'Thai, Seafood'),
(99, 50, 'Thara Thong', '962 Rama IV Rd, Khwaeng Maha Phruttharam, Khet Bang Rak, Krung Thep Maha Nakhon 10500, Thailand', '+66 2 266 0123', 'https://www.tharathong.com/', 'Thai, International'),
(100, 50, 'Sala Chalermkrung Royal Theatre', '66 Charoen Krung Rd, Khwaeng Wang Burapha Phirom, Khet Phra Nakhon, Krung Thep Maha Nakhon 10200, Thailand', '+66 2 222 8179', 'http://www.salathai.net/', 'Thai, Asian'),
(101, 51, 'Garlic Restaurant & Bar', 'Ao Nang, Mueang Krabi District, Krabi 81180, Thailand', '+66 75 695 098', 'https://www.facebook.com/garlicphiphi/', 'Thai, Seafood'),
(102, 51, 'Unni Restaurant', '111 Muang, Ko Phi Phi Don, Ao Nang, Muang Krabi, Krabi 81000, Thailand', '+66 95 960 6941', 'https://www.facebook.com/unnirestaurantphiphi/', 'Thai, Seafood'),
(103, 52, 'Dash Restaurant and Bar', '22/2 Nimmana Haeminda Rd Lane 17 Alley, Tambon Su Thep, Amphoe Mueang Chiang Mai, Chang Wat Chiang Mai 50200, Thailand', '+66 53 218 846', 'https://dashchiangmai.com/', 'Thai, International'),
(104, 52, 'Baan Boo Loo Village', '4 Prapokklao Rd Soi 6, Tambon Phra Sing, Amphoe Mueang Chiang Mai, Chang Wat Chiang Mai 50200, Thailand', '+66 91 680 9862', 'https://www.baanbooloovillage.com/', 'Thai, International'),
(105, 53, 'Suay Cherngtalay', '177/77 Moo 4, Cherngtalay, Thalang, Cherngtalay, Phuket 83110, Thailand', '+66 87 883 6041', 'https://www.suayrestaurant.com/', 'Thai, International'),
(106, 53, 'Blue Elephant Phuket', '96 Krabi Road, Tambon Talat Nuea, Muang, Phuket 83000, Thailand', '+66 76 354 355', 'https://www.blueelephant.com/phuket/', 'Thai, French'),
(107, 54, 'The Grotto', '94 Moo 2 Ao Nang, Amphoe Mueang Krabi, Chang Wat Krabi 81000, Thailand', '+66 75 819 401', 'https://www.railaybeachclub.com/dining/the-grotto/', 'Thai, Seafood'),
(108, 54, 'Railay Bay Resort & Spa', '145 Moo 2, Tambon Ao Nang, Amphoe Mueang Krabi, Chang Wat Krabi 81000, Thailand', '+66 75 818 785', 'https://www.railaybayresort.com/', 'Thai, International'),
(109, 55, 'Hagia Sophia Kitchen', 'Ayasofya Meydanı, Sultan Ahmet, 34122 Fatih/İstanbul, Turkey', '+90 212 522 1750', 'https://hagiasophiakitchen.com/', 'Turkish, Mediterranean'),
(110, 55, 'Seven Hills Restaurant', 'Tevkifhane Sk. No:8, 34122 Fatih/İstanbul, Turkey', '+90 212 516 9493', 'http://www.sevenhillsrestaurant.com/', 'Turkish, Mediterranean'),
(111, 56, 'Old Greek House Restaurant', 'Bahçelievler Mahallesi, Belediye Cd. No:46, 50180 Göreme/Nevşehir, Turkey', '+90 384 271 2572', 'http://www.oldgreekhouse.com/', 'Turkish, Mediterranean'),
(112, 56, 'Seten Anatolian Cuisine Restaurant', 'Gaferli Mahallesi, 50180 Ürgüp/Nevşehir, Turkey', '+90 384 341 7091', 'https://www.setenrestaurant.com/', 'Turkish, Mediterranean'),
(113, 57, 'Selcuk Koftecisi', 'Haci Hamdi Cd. No:4/A, 35920 Selçuk/İzmir, Turkey', '+90 232 892 3691', 'https://www.selcukkoftecisi.com.tr/', 'Turkish, Kofte'),
(114, 57, 'Dejavu Restaurant', 'Atatürk Mahallesi, Stadyum Cd. No:2, 09400 Kuşadası/Aydın, Turkey', '+90 256 614 6920', 'https://www.dejavurestaurant.com/', 'Turkish, Mediterranean'),
(115, 58, 'Koreli Restaurant', 'Pamukkale Mahallesi, Aydinli Mah. 190 Sok. No:22, 20190 Pamukkale/Denizli, Turkey', '+90 258 272 2599', 'https://korelirestaurant.com.tr/', 'Turkish, Mediterranean'),
(116, 58, 'White House Restaurant', 'Karaali Mahallesi, Mehmet Akif Ersoy Blv. No:7, 20290 Pamukkale/Denizli, Turkey', '+90 258 272 2551', 'https://www.pamukkalewhitehouse.com/', 'Turkish, Mediterranean'),
(117, 59, 'Hamdi Restaurant', 'Tahmis Cd. Kalcınar Sk. No:17, 34110 Eminönü/Fatih/İstanbul, Turkey', '+90 212 528 0390', 'https://hamdi.com.tr/', 'Turkish, Kebab'),
(118, 59, 'Hatay Medeniyetler Sofrasi Topkapi', 'Saray-i Cedit Mahallesi, Aksaray Cd. No:1, 34134 Fatih/İstanbul, Turkey', '+90 212 532 0808', 'http://www.hataymedeniyetlersofrasi.com/', 'Turkish, Mediterranean'),
(119, 60, 'Vanilla Restaurant', 'Selçuk Mh., 07100 Muratpaşa/Antalya, Turkey', '+90 242 247 7704', 'https://www.vanillaantalya.com/', 'Turkish, Mediterranean'),
(120, 60, 'Turgay Steakhouse', 'Barbaros Mh., Kılıçarslan Cd. No:16, 07100 Muratpaşa/Antalya, Turkey', '+90 242 247 8844', 'https://turgaysteakhouse.com/', 'Turkish, Steakhouse'),
(121, 61, 'Gasthaus Tirolergarten', 'Schönbrunner Schlossstraße 47, 1130 Wien, Austria', '+43 1 87804040', 'https://www.tirolergarten.at/', 'Austrian, European'),
(122, 61, 'Cafe Restaurant Residenz', 'Schönbrunner Schlossstraße 47, 1130 Wien, Austria', '+43 1 87804040', 'https://www.cafe-residenz.at/', 'Austrian, European'),
(123, 62, 'Café Sacher Wien', 'Philharmonikerstraße 4, 1010 Wien, Austria', '+43 1 514560', 'https://www.sacher.com/', 'Austrian, Cafe'),
(124, 62, 'Plachutta Wollzeile', 'Wollzeile 38, 1010 Wien, Austria', '+43 1 5122231', 'https://www.plachutta.at/', 'Austrian, European'),
(125, 63, 'St. Peter Stiftskulinarium', 'St.-Peter-Bezirk 1/4, 5020 Salzburg, Austria', '+43 662 8412680', 'https://www.stpeter-stiftskeller.at/', 'Austrian, European'),
(126, 63, 'Zum fidelen Affen', 'Priesterhausgasse 8, 5020 Salzburg, Austria', '+43 662 842312', 'https://www.fideler-affe.at/', 'Austrian, European'),
(127, 64, 'Gasthof Zauner', 'Seestraße 2, 4830 Hallstatt, Austria', '+43 6134 8264', 'https://www.zauner.at/', 'Austrian, European'),
(128, 64, 'Seecafé Restaurant Gruner', 'Marktplatz 112, 4830 Hallstatt, Austria', '+43 6134 8208', 'https://www.cafe-gasthof-gruner.at/', 'Austrian, European'),
(129, 65, 'Restaurant Lichtblick', 'Maria-Theresien-Straße 18, 6020 Innsbruck, Austria', '+43 512 582088', 'https://www.lichtblick-restaurant.at/', 'Austrian, European'),
(130, 65, 'Ottoburg', 'Herzog-Friedrich-Straße 1, 6020 Innsbruck, Austria', '+43 512 587 186', 'https://www.ottoburg.at/', 'Austrian, European'),
(131, 66, 'Restaurant Glocknerhaus', 'Grossglockner, 9844 Heiligenblut, Austria', '+43 4824 2700', 'https://www.glocknerhaus.com/', 'Austrian, European'),
(132, 66, 'Berghotel Wallackhaus', 'Grossglockner, 9844 Heiligenblut, Austria', '+43 4824 2201', 'https://www.wallackhaus.at/', 'Austrian, European'),
(133, 67, 'Ganko Sushi', '35-3 Shijokarasuma-cho, Higashi-iru, Shijo-dori, Shimogyo-ku, Kyoto 600-8001, Kyoto Prefecture', '+81 75-211-5522', 'http://www.gankofood.co.jp/', 'Japanese, Sushi'),
(134, 67, 'Ippudo Ramen', '784 Minamiiseyacho, Shimogyo Ward, Kyoto, 600-8105 Kyoto Prefecture', '+81 75-344-2610', 'https://www.ippudo.com/store/kyoto-eki-chikushi-ten/', 'Japanese, Ramen'),
(135, 68, 'Sukiyabashi Jiro', '4 Chome-2-15 Ginza, Chuo City, Tokyo 104-0061, Japan', '+81 3-3535-3600', 'https://sushi-jiro.jp/', 'Japanese, Sushi'),
(136, 68, 'Ichiran Shibuya', '1 Chome-22-7 Jinnan, Shibuya City, Tokyo 150-0041, Japan', '+81 3-3463-3667', 'https://en.ichiran.com/', 'Japanese, Ramen'),
(137, 69, 'Houtou Fudou', '3501 Arakura, Fujiyoshida, Yamanashi 403-0011, Japan', '+81 555-22-1111', 'http://www.houtou-fudou.jp/', 'Japanese, Noodles'),
(138, 69, 'Subashiri Sengen Shrine', 'Japan, 〒418-0112 Shizuoka, 駿東郡清水町青木1438−1', '+81 550-71-3455', 'http://www.subasiri-sengen.com/', 'Japanese, Vegetarian'),
(139, 70, 'Okonomiyaki Chitose', '1 Chome-11-8 Sennichimae, Chuo Ward, Osaka, 542-0074 Osaka Prefecture', '+81 6-6643-0393', 'http://www.chitose-ya.com/', 'Japanese, Okonomiyaki'),
(140, 70, 'Issin', '3 Chome-2-12 Nakanoshima, Kita Ward, Osaka, 530-0005 Osaka Prefecture', '+81 6-6440-7001', 'https://www.hotelnewotani.co.jp/osaka/restaurant/issin/', 'Japanese, Teppanyaki'),
(141, 71, 'Nagata-Ya', '1 Chome-7-19 Hatchobori, Naka Ward, Hiroshima, 730-0805 Hiroshima Prefecture', '+81 82-242-3786', 'https://www.okonomiyaki.jp/', 'Japanese, Okonomiyaki'),
(142, 71, 'Hassho', '6-27 Motomachi, Naka-ku, Hiroshima 730-0011, Hiroshima Prefecture', '+81 82-244-8932', 'https://www.hassho-group.co.jp/', 'Japanese, Okonomiyaki'),
(143, 72, 'Nara Hotel', 'Japan, 〒630-8301 Nara, Nara, Noboriojicho, 1096', '+81 742-26-3300', 'https://www.narahotel.co.jp/', 'Japanese, French'),
(144, 73, 'Dionysos Zonar’s', 'Rovertou Galli 43, Athens 117 42, Greece', '+30 21 0922 6435', 'https://www.dionysoszonars.gr/', 'Greek, Mediterranean'),
(145, 73, 'Athinaion Politeia', 'Athens 116 36, Greece', '+30 21 0922 0055', 'http://www.athinaionpoliteia.gr/', 'Greek, Mediterranean'),
(146, 74, '1800-Floga Restaurant', 'Oia, Santorini 847 02, Greece', '+30 2286 071334', 'https://www.1800-floga.gr/', 'Greek, Mediterranean'),
(147, 74, 'La Maison Restaurant', 'Oia 847 02, Greece', '+30 2286 071482', 'https://www.lamaisonsantorini.com/', 'Greek, Mediterranean'),
(148, 75, 'M-eating', 'Mikonos 846 00, Greece', '+30 2289 022413', 'https://www.m-eating.gr/', 'Greek, Mediterranean'),
(149, 75, 'Kiki\'s Tavern', 'Agios Sostis Beach, Mikonos 846 00, Greece', '+30 2289 071296', 'http://www.kikistavern.com/', 'Greek, Mediterranean'),
(150, 76, 'Taverna To Patrikon', 'Epar.Od. Amfissas - Delphon, Delfi 330 54, Greece', '+30 22 8402 3254', 'https://www.taverna-to-patrikon.business.site/', 'Greek, Mediterranean'),
(151, 76, 'Iniohos Restaurant', 'Delphi 330 54, Greece', '+30 22 8402 22822', 'https://www.iniohosrestaurant.gr/', 'Greek, Mediterranean'),
(152, 77, 'Meteora Restaurant', 'Kastraki, Kalambaka 422 00, Greece', '+30 2432 022026', 'https://www.meteorarestaurant.gr/', 'Greek, Mediterranean'),
(153, 77, 'Taverna Gardenia', 'Kastraki, Kalambaka 422 00, Greece', '+30 2432 022235', 'https://www.facebook.com/TavernaGardenia/', 'Greek, Mediterranean'),
(154, 78, '1800 Restaurant', 'Oia, Santorini 847 02, Greece', '+30 2286 071334', 'https://www.santorini1800.com/restaurant/', 'Greek, Mediterranean'),
(155, 78, 'Ambrosia Restaurant', 'Oia 847 02, Greece', '+30 2286 071155', 'https://www.ambrosia-restaurant.gr/', 'Greek, Mediterranean'),
(156, 79, 'Grizzly House Restaurant', '207 Banff Ave, Banff, AB T1L 1A6, Canada', '+1 403-762-4055', 'https://www.banffgrizzlyhouse.com/', 'Canadian, Fondue'),
(157, 79, 'Chuck\'s Steakhouse', '101 Banff Ave, Banff, AB T1L 1A6, Canada', '+1 403-762-4825', 'https://www.chucksbanff.com/', 'American, Steakhouse'),
(158, 80, 'Skylon Tower Revolving Dining Room', '5200 Robinson St, Niagara Falls, ON L2G 2A3, Canada', '+1 905-356-2651', 'https://www.skylon.com/', 'Canadian, Fine Dining'),
(159, 80, 'The Keg Steakhouse + Bar', '6700 Fallsview Blvd, Niagara Falls, ON L2G 3W6, Canada', '+1 905-374-5170', 'https://www.kegsteakhouse.com/', 'Canadian, Steakhouse'),
(160, 81, 'Blue Water Cafe', '1095 Hamilton St, Vancouver, BC V6B 5T4, Canada', '+1 604-688-8078', 'https://www.bluewatercafe.net/', 'Seafood, Canadian'),
(161, 81, 'Vij’s', '3106 Cambie St, Vancouver, BC V5Z 2W2, Canada', '+1 604-736-6664', 'https://www.vijs.ca/', 'Indian, Fusion'),
(162, 82, 'Canoe Restaurant and Bar', '66 Wellington St W, Toronto, ON M5K 1H6, Canada', '+1 416-364-0054', 'https://www.canoerestaurant.com/', 'Canadian, Fine Dining'),
(163, 82, 'Scaramouche Restaurant', '1 Benvenuto Pl, Toronto, ON M4V 2L1, Canada', '+1 416-961-8011', 'https://www.scaramoucherestaurant.com/', 'French, Canadian'),
(164, 83, 'Araxi Restaurant + Oyster Bar', '4222 Village Square, Whistler, BC V0N 1B4, Canada', '+1 604-932-4540', 'https://www.araxi.com/', 'Canadian, Seafood'),
(165, 83, 'Bearfoot Bistro', '4121 Village Green, Whistler, BC V0N 1B4, Canada', '+1 604-932-3433', 'https://www.bearfootbistro.com/', 'French, Canadian'),
(166, 84, 'Toqué!', '900 Place Jean-Paul-Riopelle, Montréal, QC H2Z 2B2, Canada', '+1 514-499-2084', 'https://www.restaurant-toque.com/', 'Canadian, French'),
(167, 84, 'Schwartz’s Deli', '3895 Boul St-Laurent, Montréal, QC H2W 1X9, Canada', '+1 514-842-4813', 'https://www.schwartzsdeli.com/', 'Canadian, Deli'),
(168, 85, 'Bennelong Restaurant', 'Sydney Opera House, Bennelong Point, Sydney NSW 2000, Australia', '+61 2 9240 8000', 'https://www.bennelong.com.au/', 'Australian, Fine Dining'),
(169, 85, 'Opera Bar', 'Lower Concourse Level, Sydney Opera House, Macquarie St, Sydney NSW 2000, Australia', '+61 2 9247 1666', 'https://operabar.com.au/', 'Australian, Bar Food'),
(170, 86, 'Nunu Restaurant', '23/41 Wharf St, Port Douglas QLD 4877, Australia', '+61 7 4099 5330', 'https://www.nunurestaurant.com.au/', 'Australian, Seafood'),
(171, 86, 'Salsa Bar & Grill', '26 Wharf St, Port Douglas QLD 4877, Australia', '+61 7 4099 4922', 'https://www.salsaportdouglas.com.au/', 'Australian, Latin'),
(172, 87, 'Tali Wiru', 'Yulara Drive, Yulara NT 0872, Australia', '+61 8 8957 7131', 'https://www.ayersrockresort.com.au/events/detail/tali-wiru', 'Australian, Fine Dining'),
(173, 87, 'Ilkari Restaurant', 'Yulara Dr, Yulara NT 0872, Australia', '+61 8 8957 7385', 'https://www.voyages.com.au/accommodation/ilkari-restaurant-uluru/', 'Australian, Modern'),
(174, 88, 'Attica', '74 Glen Eira Rd, Ripponlea VIC 3185, Australia', '+61 3 9530 0111', 'https://attica.com.au/', 'Australian, Fine Dining'),
(175, 88, 'Chin Chin', '125 Flinders Ln, Melbourne VIC 3000, Australia', '+61 3 8663 2000', 'https://www.chinchinrestaurant.com.au/', 'Asian, Fusion'),
(176, 89, 'La Bimba', '10 Great Ocean Rd, Apollo Bay VIC 3233, Australia', '+61 3 5237 7411', 'https://labimba.com.au/', 'Australian, Seafood'),
(177, 89, 'Chris’s Beacon Point Restaurant & Villas', '280 Skenes Creek Rd, Apollo Bay VIC 3233, Australia', '+61 3 5237 6411', 'https://chrisrestaurant.com.au/', 'Australian, Modern'),
(178, 90, 'Sunset Food and Wine', '49 North Terrace, Penneshaw SA 5222, Australia', '+61 8 8553 1378', 'https://sunsetfoodandwine.com/', 'Australian, Modern'),
(179, 90, 'Cactus Café', '40 Dauncey St, Kingscote SA 5223, Australia', '+61 8 8553 2269', 'https://www.facebook.com/CactusCafeKI/', 'Australian, Café'),
(180, 91, 'Esphahan', 'The Oberoi Amarvilas, Taj East Gate Road, Agra, Uttar Pradesh 282001, India', '+91 562 223 1515', 'https://www.oberoihotels.com/hotels-in-agra-amarvilas-resort/restaurants/esphahan', 'Indian, Mughlai'),
(181, 91, 'Peshawri', 'ITC Mughal, Agra, Fatehabad Rd, Tajganj, Agra, Uttar Pradesh 282001, India', '+91 562 402 1700', 'https://www.itchotels.in/hotels/agra/itcmughal/dining/peshawri.html', 'Indian, North-West Frontier'),
(182, 92, 'Varanasi Cakes', 'B-2/72, Pandey Ghat Road, Varanasi, Uttar Pradesh 221001, India', '+91 87070 76000', 'https://varanasicakes.business.site/', 'Indian, Bakery'),
(183, 92, 'Baati Chokha', 'D-59/25, Sigra, Rathyatra Crossing, Varanasi, Uttar Pradesh 221010, India', '+91 542 222 3919', 'https://www.baatichokha.in/', 'Indian, North Indian'),
(184, 93, 'Chokhi Dhani', 'Chokhi Dhani Resort, 12 Mile, Tonk Road, Jaipur, Rajasthan 303905, India', '+91 141 516 5000', 'https://www.chokhidhani.com/', 'Indian, Rajasthani'),
(185, 93, '1135 AD', 'Jaleb Chowk, Amber Fort Road, Jaipur, Rajasthan 302002, India', '+91 141 253 1123', 'http://1135ad.com/', 'Indian, Rajasthani'),
(186, 94, 'Souza Lobo', 'Calangute Beach, Calangute, Goa 403516, India', '+91 832 227 7038', 'http://souzalobo.com/', 'Indian, Goan'),
(187, 94, 'Fisherman’s Wharf', 'Sal River Road, Mobor, Cavelossim, Goa 403731, India', '+91 832 287 1594', 'https://www.fishermanswharf.in/', 'Indian, Seafood'),
(188, 95, 'Rice Boat', 'Taj Malabar Resort & Spa, Willingdon Island, Kochi, Kerala 682009, India', '+91 484 664 3000', 'https://www.tajhotels.com/en-in/taj/taj-malabar-kochi/restaurants/rice-boat-restaurant/', 'Indian, Kerala'),
(189, 95, 'Fort House Restaurant', '2/6A Calvathy Rd, Fort Kochi, Kochi, Kerala 682001, India', '+91 484 221 7103', 'http://www.forthousekochi.com/', 'Indian, Seafood'),
(190, 96, 'The Dining Room', 'Ranthambhore Rd, Sawai Madhopur, Rajasthan 322001, India', '+91 7462 221 777', 'https://www.tajhotels.com/en-in/taj/taj-sawai-madhopur-lodge/restaurants/the-dining-room-restaurant/', 'Indian, Continental'),
(191, 96, 'Sher Bagh Dining Tent', 'Sherpur, Khiljipur, Ranthambhore, Sawai Madhopur, Rajasthan 322001, India', '+91 11 2656 7375', 'https://www.sujanluxury.com/sher-bagh/', 'Indian, Continental'),
(192, 97, 'Café Pushkin', 'Tverskoy Blvd, 26А, Moscow, Russia, 125009', '+7 495 739-00-33', 'https://www.cafe-pushkin.ru/', 'Russian, European'),
(193, 97, 'Bosco Café', 'Red Square, 3, Moscow, Russia, 109012', '+7 495 620-31-60', 'https://bosco.ru/en/restaurant/bosco-cafe-na-krasnoy-ploschadi/', 'European, Russian'),
(194, 98, 'Palkin', 'Nevsky Ave, 47, St Petersburg, Russia, 191025', '+7 812 703-53-64', 'https://palkin.ru/', 'Russian, European'),
(195, 98, 'Sadko', 'Nevsky Ave, 48, St Petersburg, Russia, 191186', '+7 812 312-90-05', 'https://sadko.restaurant/', 'Russian, European'),
(196, 99, 'Golden Eagle', 'Multiple locations along the Trans-Siberian Railway', 'N/A', 'https://www.goldeneagleluxurytrains.com/journeys/trans-siberian-express/', 'Russian, International'),
(197, 99, 'Rossiya Restaurant', 'Multiple locations along the Trans-Siberian Railway', 'N/A', 'https://www.goldeneagleluxurytrains.com/journeys/trans-siberian-express/', 'Russian, International'),
(198, 100, 'Café Khachapuri', 'Nikolskaya St, 6/5, Moscow, Russia, 109012', '+7 495 968-14-51', 'https://cafe-khachapuri.ru/', 'Georgian, Russian'),
(199, 100, 'Mu-Mu', 'Kamergersky Ln, 6/5, Moscow, Russia, 109012', '+7 800 707-67-82', 'https://www.cafemumu.ru/', 'Russian, Fast Food'),
(200, 101, 'Grand Café Promenade', 'Strelka Baikala, Listvyanka, Russia, 664520', '+7 902 503-32-63', 'https://www.facebook.com/GrandCafeListvyanka/', 'Russian, European'),
(201, 101, 'Barguzin', 'Listvyanka, Russia, 664520', '+7 902 591-91-91', 'https://barguzin-lake-baikal.ru/', 'Russian, European'),
(202, 102, 'Pavilion', 'Bol\'shoye Palisadnicheskoye sh., 12, St Petersburg, Russia, 197110', '+7 812 447-07-67', 'https://www.peterhofmuseum.ru/', 'Russian, European'),
(203, 102, 'Camelot', 'Bol\'shoye Palisadnicheskoye sh., 12, St Petersburg, Russia, 197110', '+7 812 448-60-05', 'http://www.camelot-r.ru/', 'Russian, European'),
(204, 103, 'Tulip Restaurant', 'Stationsweg 166A, 2161 AM Lisse, Netherlands', '+31 252 465 564', 'https://www.tuliprestaurant.nl/', 'Dutch, International'),
(205, 103, 'Pannenkoekenrestaurant De Nachtegaal', 'Heereweg 10, 2161 AG Lisse, Netherlands', '+31 252 417 286', 'https://www.pannenkoekenrestaurantdenachtegaal.nl/', 'Dutch, Pancakes'),
(206, 104, 'The Pancake Bakery', 'Prinsengracht 191, 1015 DS Amsterdam, Netherlands', '+31 20 625 1333', 'https://www.pancake.nl/', 'Dutch, Pancakes'),
(207, 104, 'Café-Restaurant De Plantage', 'Plantage Kerklaan 36, 1018 CZ Amsterdam, Netherlands', '+31 20 760 6800', 'https://www.deplantageamsterdam.nl/', 'European, Dutch'),
(208, 105, 'Stedelijk Restaurant', 'Museumplein 10, 1071 DJ Amsterdam, Netherlands', '+31 20 573 2911', 'https://www.stedelijkrestaurant.com/', 'European, Dutch'),
(209, 105, 'Rijksmuseum Café', 'Museumstraat 1, 1071 XX Amsterdam, Netherlands', '+31 20 674 7047', 'https://www.rijksmuseum.nl/en/rijks-cafe', 'European, Dutch'),
(210, 106, 'Stedelijk Restaurant', 'Museumplein 10, 1071 DJ Amsterdam, Netherlands', '+31 20 573 2911', 'https://www.stedelijkrestaurant.com/', 'European, Dutch'),
(211, 106, 'Rijksmuseum Café', 'Museumstraat 1, 1071 XX Amsterdam, Netherlands', '+31 20 674 7047', 'https://www.rijksmuseum.nl/en/rijks-cafe', 'European, Dutch'),
(212, 107, 'Blue Boat Company', 'Stadhouderskade 30, 1071 ZD Amsterdam, Netherlands', '+31 20 679 1370', 'https://www.blueboat.nl/en/', 'European, Dutch'),
(213, 107, 'Lovers Canal Cruises', 'Prins Hendrikkade 25, 1012 TM Amsterdam, Netherlands', '+31 20 530 1090', 'https://www.lovers.nl/en/', 'European, Dutch'),
(214, 108, 'De Kraai', 'Kalverringdijk 31, 1509 BT Zaandam, Netherlands', '+31 75 647 2554', 'https://www.zaanseschans.nl/en/food-and-drink/restaurant-de-kraai/', 'European, Dutch'),
(215, 108, 'De Hoop op d\'Swarte Walvis', 'Zaanse Schans 17, 1509 BR Zaandam, Netherlands', '+31 75 621 7227', 'https://www.dehoop.org/', 'European, Dutch'),
(216, 109, 'Yurimmyeon', '19, Sajik-ro 9-gil, Jongno-gu, Seoul, South Korea', '+82 2 722 2822', 'https://www.yurimmyeon.com/', 'Korean, Noodles'),
(217, 109, 'Yuglim', '35, Sajik-ro 9-gil, Jongno-gu, Seoul, South Korea', '+82 2 739 1991', 'http://www.yuglim.co.kr/', 'Korean, Buffet'),
(218, 110, 'Imjingak Pyeonghwa-nuri', '40, Imjingak-ro 241beon-gil, Paju-si, Gyeonggi-do, South Korea', '+82 31 585 8321', 'http://imjingakpyeonghwanuri.modoo.at/', 'Korean, Café'),
(219, 110, 'Myeongdong Kyoja', '25-2, Myeongdong 2-ga, Jung-gu, Seoul, South Korea', '+82 2 776 5348', 'http://www.mdkj.co.kr/', 'Korean, Noodles'),
(220, 111, 'Seogwangdawon', '2455, Iljudong-ro, Gujwa-eup, Jeju, South Korea', '+82 64 784 8778', 'http://seogwangdawon.com/', 'Korean, Seafood'),
(221, 111, 'Bokgungjung', '3200-1, Iljudong-ro, Gujwa-eup, Jeju, South Korea', '+82 64 782 7679', 'http://bokgungjung.co.kr/', 'Korean, Seafood'),
(222, 112, 'DooRe', '28 Bukchon-ro 11-gil, Jongno-gu, Seoul, South Korea', '+82 2 720 8110', 'https://doorespace.modoo.at/', 'Korean, Modern'),
(223, 112, 'Chon', '45-1 Bukchon-ro 11-gil, Jongno-gu, Seoul, South Korea', '+82 2 765 0290', 'http://www.chonkorean.com/', 'Korean, Traditional'),
(224, 113, 'Dongbaekseom', '20, Haeundae-gu, Busan, South Korea', '+82 51 740 2500', 'http://www.dongbaekseom.com/', 'Korean, Seafood'),
(225, 113, 'Shinsegae Food Court', '35, Centumnam-daero, Haeundae-gu, Busan, South Korea', '+82 51 745 8333', 'https://www.shinsegae.com/', 'Korean, International'),
(226, 114, 'Namsan Restaurant', '105, Namsangongwon-gil, Yongsan-gu, Seoul, South Korea', '+82 2 2261 8101', 'http://www.nseoultower.co.kr/', 'Korean, International'),
(227, 114, 'The Place Dining', '105, Namsangongwon-gil, Yongsan-gu, Seoul, South Korea', '+82 2 2261 8101', 'http://www.nseoultower.co.kr/', 'European, Korean'),
(228, 115, 'Felfela', '15 El Shawarby St, Beside Marriot Hotel, El-Zamalek, Cairo, Egypt', '+20 2 2735 9641', 'http://felfela.com/', 'Egyptian, Middle Eastern'),
(229, 115, 'Koshary Abou Tarek', '16 Adly St, Marouf, Qasr an Nile, Cairo Governorate, Egypt', '+20 122 231 6702', 'http://www.kosharyaboutarek.com/', 'Egyptian, Fast Food'),
(230, 116, 'Al-Sahaby Lane Restaurant', 'West Bank, Luxor, Luxor Governorate, Egypt', '+20 100 564 9691', 'http://alsahabylane.com/', 'Egyptian, Middle Eastern'),
(231, 116, 'Nile Flowers', 'Nile Street, Luxor, Luxor Governorate, Egypt', '+20 109 843 7397', 'http://nileflowersluxor.com/', 'Egyptian, International'),
(232, 117, 'La Fleur', 'Corniche El Nile Street, Luxor, Luxor Governorate, Egypt', '+20 122 760 0679', 'https://www.lafleurrestaurant.com/', 'Egyptian, International'),
(233, 117, 'Starlight', 'Corniche El Nile Street, Luxor, Luxor Governorate, Egypt', '+20 122 778 8718', 'http://www.starlightluxor.com/', 'Egyptian, International'),
(234, 118, 'Al-Sahaby Lane Restaurant', 'West Bank, Luxor, Luxor Governorate, Egypt', '+20 100 564 9691', 'http://alsahabylane.com/', 'Egyptian, Middle Eastern'),
(235, 118, 'Nile Flowers', 'Nile Street, Luxor, Luxor Governorate, Egypt', '+20 109 843 7397', 'http://nileflowersluxor.com/', 'Egyptian, International'),
(236, 119, 'Nubian House Restaurant', 'Abu Simbel Village, Abu Simbel, Egypt', '+20 122 731 5788', 'https://nubianhouseabu.com/', 'Egyptian, Nubian'),
(237, 119, 'Nefertari Restaurant', 'Main Street, Abu Simbel, Egypt', '+20 122 636 6764', 'https://www.nefertari-abusimbel.com/', 'Egyptian, International'),
(238, 120, 'Fares Seafood', 'El-Mahmeya, Qesm Sharm Ash Sheikh, South Sinai Governorate, Egypt', '+20 69 3660152', 'https://www.facebook.com/faresseafood/', 'Egyptian, Seafood'),
(239, 120, 'Palm Restaurant & Bar', 'Naama Bay, Sharm El Sheikh, South Sinai Governorate, Egypt', '+20 69 3602133', 'https://www.novotelsharm.com/', 'Egyptian, International'),
(240, 121, 'Aprazível', 'R. Aprazível, 62 - Santa Teresa, Rio de Janeiro - RJ, 20241-270, Brazil', '+55 21 2508-9174', 'https://www.aprazivel.com.br/', 'Brazilian, Contemporary'),
(241, 121, 'Churrascaria Palace', 'R. Rodolfo Dantas, 16 - Copacabana, Rio de Janeiro - RJ, 22020-040, Brazil', '+55 21 2541-5898', 'http://churrascariapalace.com.br/', 'Brazilian, Steakhouse'),
(242, 122, 'La Selva', 'Ruta Nacional 12 Km 5, 3370 Puerto Iguazú, Misiónes, Argentina', '+54 3757 423 469', 'http://www.laselvapuertoiguazu.com/', 'Argentinian, Grill'),
(243, 122, 'Aqva Restaurant', 'Ruta 12 Km 1640, 3370 Puerto Iguazú, Misiónes, Argentina', '+54 3757 420 255', 'https://www.aqvarestaurant.com/', 'Argentinian, Seafood'),
(244, 123, 'Pergula Restaurant', 'Av. Atlântica, 1702 - Copacabana, Rio de Janeiro - RJ, 22021-001, Brazil', '+55 21 2548-7070', 'https://www.copacabanapalace.com/restaurantes-e-bares/pergula/', 'Brazilian, International'),
(245, 123, 'Cervantes', 'Av. Prado Júnior, 335 - Copacabana, Rio de Janeiro - RJ, 22011-042, Brazil', '+55 21 2275-6147', 'https://www.cervantesbar.com.br/', 'Brazilian, Fast Food'),
(246, 124, 'Banzeiro', 'Rua dos Tucumãs, 24 - Nossa Sra. das Graças, Manaus - AM, 69053-030, Brazil', '+55 92 3234-1621', 'https://www.banzeiro.com.br/', 'Brazilian, Amazonian'),
(247, 124, 'Tambaqui de Banda', 'Rua Emílio Moreira, 1687 - Centro, Manaus - AM, 69025-090, Brazil', '+55 92 3212-2071', 'http://www.tambaquidebanda.com.br/', 'Brazilian, Seafood'),
(248, 125, 'Aprazível', 'R. Aprazível, 62 - Santa Teresa, Rio de Janeiro - RJ, 20241-270, Brazil', '+55 21 2508-9174', 'https://www.aprazivel.com.br/', 'Brazilian, Contemporary'),
(249, 125, 'Zazá Bistrô', 'R. Joana Angélica, 40 - Ipanema, Rio de Janeiro - RJ, 22420-030, Brazil', '+55 21 2247-9101', 'https://www.zazabistro.com.br/', 'Brazilian, International'),
(250, 126, 'Buraco das Araras Restaurante', 'BR-267, Km 565 - Estrada Parque, s/n, Bonito - MS, 79290-000, Brazil', '+55 67 3255-1257', 'https://www.buracodasararas.com.br/', 'Brazilian, Local Cuisine'),
(251, 126, 'Juanita', 'Rua Coronel Pilad Rebua, 2070 - Bonito - MS, 79290-000, Brazil', '+55 67 3255-1236', 'https://www.juanitasteakhouse.com.br/', 'Brazilian, Steakhouse');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `touristlocations`
--

CREATE TABLE `touristlocations` (
  `location_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `location_description` text DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `touristlocations`
--

INSERT INTO `touristlocations` (`location_id`, `country_id`, `location_name`, `location_description`, `latitude`, `longitude`) VALUES
(1, 1, 'Eiffel Tower', 'Iconic iron lattice tower offering city views', 48.858400, 2.294500),
(2, 1, 'Louvre Museum', 'World\'s largest art museum and historic monument', 48.860600, 2.337600),
(3, 1, 'Notre-Dame Cathedral', 'Gothic cathedral known for its architecture', 48.853000, 2.349900),
(4, 1, 'Mont Saint-Michel', 'Breathtaking island commune in Normandy', 48.636100, -1.511500),
(5, 1, 'Palace of Versailles', 'Magnificent royal château and gardens', 48.804900, 2.120400),
(6, 1, 'Champs-Élysées', 'Famous avenue known for shopping and events', 48.869800, 2.307600),
(7, 2, 'Sagrada Família', 'Basilica known for its intricate façades', 41.403600, 2.174400),
(8, 2, 'Alhambra', 'Stunning palace and fortress complex', 37.177500, -3.598600),
(9, 2, 'Park Güell', 'Colorful park with architectural elements', 41.414500, 2.152700),
(10, 2, 'Ibiza', 'Party island with beautiful beaches', 38.908500, 1.432300),
(11, 2, 'Puerta del Sol', 'Central square and popular gathering spot', 40.416900, -3.703300),
(12, 2, 'La Rambla', 'Famous boulevard with shops and street performers', 41.380900, 2.173400),
(13, 3, 'Statue of Liberty', 'Iconic statue symbolizing freedom and democracy', 40.689200, -74.044500),
(14, 3, 'Grand Canyon', 'Spectacular natural wonder with breathtaking views', 36.106900, -112.112900),
(15, 3, 'Yellowstone National Park', 'First national park known for geothermal features', 44.427900, -110.588500),
(16, 3, 'Walt Disney World', 'Popular entertainment complex and theme park', 28.385200, -81.563900),
(17, 3, 'Times Square', 'Vibrant entertainment hub with shops and theaters', 40.758000, -73.985500),
(18, 3, 'Golden Gate Bridge', 'Iconic suspension bridge connecting San Francisco', 37.819900, -122.478300),
(19, 4, 'Great Wall of China', 'Ancient defensive wall offering scenic views', 40.431900, 116.570400),
(20, 4, 'Forbidden City', 'Imperial palace complex with ornate architecture', 39.916300, 116.397200),
(21, 4, 'Terracotta Army', 'Collection of terracotta sculptures depicting army', 34.385300, 109.278600),
(22, 4, 'Yellow Mountains', 'Mountain range known for granite peaks and hot springs', 30.217600, 118.164600),
(23, 4, 'Li River', 'Scenic river with karst mountains and bamboo groves', 24.904000, 110.467700),
(24, 4, 'Potala Palace', 'Historic palace with religious significance', 29.655400, 91.117200),
(25, 5, 'Colosseum', 'Ancient amphitheater known for gladiatorial contests', 41.890200, 12.492200),
(26, 5, 'Venice', 'City of canals known for its art and architecture', 45.440800, 12.315500),
(27, 5, 'Florence', 'Cultural hub renowned for Renaissance art and architecture', 43.769600, 11.255800),
(28, 5, 'Amalfi Coast', 'Stunning coastline with colorful villages and cliffs', 40.634000, 14.602700),
(29, 5, 'Pompeii', 'Ancient Roman city buried by volcanic eruption', 40.749400, 14.489800),
(30, 5, 'Cinque Terre', 'Picturesque coastal villages connected by hiking trails', 44.128000, 9.712600),
(31, 6, 'Tower of London', 'Historic castle and former royal residence', 51.508100, -0.075900),
(32, 6, 'Stonehenge', 'Prehistoric monument with mysterious origins', 51.178900, -1.826200),
(33, 6, 'Edinburgh Castle', 'Iconic fortress with panoramic views of the city', 55.948600, -3.199900),
(34, 6, 'British Museum', 'World-renowned museum showcasing art and artifacts', 51.519400, -0.127000),
(35, 6, 'Big Ben', 'Iconic clock tower and symbol of London', 51.500700, -0.124600),
(36, 6, 'Buckingham Palace', 'Official residence of the British monarch', 51.501400, -0.141900),
(37, 7, 'Neuschwanstein Castle', 'Fairytale castle nestled in the Bavarian Alps', 47.557600, 10.749800),
(38, 7, 'Brandenburg Gate', 'Iconic neoclassical monument in Berlin', 52.516300, 13.377700),
(39, 7, 'Black Forest', 'Picturesque mountain range with dense forests', 48.519300, 8.425200),
(40, 7, 'Cologne Cathedral', 'Gothic cathedral with twin spires', 50.941300, 6.958300),
(41, 7, 'Checkpoint Charlie', 'Former border crossing point between East and West Berlin', 52.507400, 13.390400),
(42, 7, 'Heidelberg Castle', 'Ruined hilltop castle overlooking the town of Heidelberg', 49.412400, 8.710500),
(43, 8, 'Chichen Itza', 'Ancient Mayan city known for El Castillo pyramid', 20.683000, -88.568600),
(44, 8, 'Tulum', 'Mayan ruins perched on a cliff overlooking the Caribbean Sea', 20.211400, -87.465400),
(45, 8, 'Cancun', 'Popular resort city with white-sand beaches and vibrant nightlife', 21.161900, -86.851500),
(46, 8, 'Palenque', 'Archaeological site surrounded by jungle', 17.487300, -92.042200),
(47, 8, 'Teotihuacan', 'Ancient Mesoamerican city with pyramids and temples', 19.692600, -98.844000),
(48, 8, 'Copper Canyon', 'Scenic canyon system larger and deeper than the Grand Canyon', 27.643100, -107.503600),
(49, 9, 'Wat Arun', 'Iconic riverside temple with a towering spire', 13.743700, 100.488900),
(50, 9, 'Grand Palace', 'Historic royal complex with ornate buildings', 13.750000, 100.491600),
(51, 9, 'Phi Phi Islands', 'Group of picturesque islands with turquoise waters', 7.738000, 98.775800),
(52, 9, 'Chiang Mai Old City', 'Historic center with ancient temples and markets', 18.787700, 98.993100),
(53, 9, 'Phuket', 'Thailand\'s largest island with stunning beaches and resorts', 7.880400, 98.392300),
(54, 9, 'Railay Beach', 'Scenic beach accessible only by boat', 8.011400, 98.837500),
(55, 10, 'Hagia Sophia', 'Historic church-turned-mosque with stunning architecture', 41.008600, 28.979500),
(56, 10, 'Cappadocia', 'Unique region known for its fairy chimneys and hot air ballooning', 38.643100, 34.830500),
(57, 10, 'Ephesus', 'Ancient Greek city with well-preserved ruins', 37.939400, 27.342200),
(58, 10, 'Pamukkale', 'Natural site with travertine terraces and thermal springs', 37.918800, 29.121700),
(59, 10, 'Topkapi Palace', 'Historic palace complex with gardens and courtyards', 41.011500, 28.983400),
(60, 10, 'Antalya Old Town', 'Charming district with narrow streets and historic buildings', 36.884100, 30.705600),
(61, 11, 'Schönbrunn Palace', 'Imperial summer residence with expansive gardens', 48.185900, 16.312000),
(62, 11, 'Hofburg Palace', 'Former imperial palace complex with museums', 48.208400, 16.361600),
(63, 11, 'Salzburg Old Town', 'Historic district known for its baroque architecture', 47.800200, 13.041800),
(64, 11, 'Hallstatt', 'Quaint village with alpine houses and salt mines', 47.562200, 13.649300),
(65, 11, 'Innsbruck', 'Alpine city known for its ski resorts and historic sites', 47.269200, 11.404100),
(66, 11, 'Grossglockner', 'Highest peak in the Austrian Alps', 47.075900, 12.764100),
(67, 12, 'Kyoto', 'City known for its classical Buddhist temples and gardens', 35.011600, 135.768100),
(68, 12, 'Tokyo', 'Capital city known for its modern skyscrapers and historic temples', 35.689500, 139.691700),
(69, 12, 'Mount Fuji', 'Iconic volcano and highest peak in Japan', 35.360600, 138.727400),
(70, 12, 'Osaka Castle', 'Historic castle surrounded by cherry blossom trees', 34.687300, 135.525000),
(71, 12, 'Hiroshima Peace Memorial Park', 'Memorial park commemorating the atomic bombing', 34.395500, 132.454400),
(72, 12, 'Nara Park', 'Park with tame deer and historic temples', 34.685100, 135.804800),
(73, 13, 'Acropolis of Athens', 'Ancient citadel overlooking the city of Athens', 37.971500, 23.726200),
(74, 13, 'Santorini', 'Island known for its stunning sunsets and white-washed buildings', 36.393200, 25.461500),
(75, 13, 'Mykonos', 'Popular island with beautiful beaches and vibrant nightlife', 37.446700, 25.328900),
(76, 13, 'Delphi', 'Ancient sanctuary with ruins of a temple and oracle', 38.482700, 22.501400),
(77, 13, 'Meteora', 'Rock formations with monasteries perched on top', 39.721100, 21.630200),
(78, 13, 'Oia', 'Picturesque village known for its blue-domed churches', 36.461300, 25.375800),
(79, 14, 'Banff National Park', 'Canadian Rockies with glaciers, forests, and crystal-clear lakes', 51.496800, -115.928100),
(80, 14, 'Niagara Falls', 'Iconic waterfall on the Canada-US border', 43.079300, -79.074700),
(81, 14, 'Vancouver', 'Cosmopolitan city surrounded by mountains and ocean', 49.282700, -123.120700),
(82, 14, 'Toronto', 'Dynamic city with iconic landmarks like the CN Tower', 43.651100, -79.383000),
(83, 14, 'Whistler', 'World-class ski resort with stunning mountain scenery', 50.116300, -122.957400),
(84, 14, 'Montreal', 'Cultural hub with historic architecture and vibrant neighborhoods', 45.501700, -73.567300),
(85, 15, 'Sydney Opera House', 'Iconic performing arts center on Sydney Harbour', -33.856800, 151.215300),
(86, 15, 'Great Barrier Reef', 'World\'s largest coral reef system with marine life', -18.286100, 147.700000),
(87, 15, 'Uluru', 'Large sandstone rock formation sacred to Indigenous Australians', -25.344400, 131.036900),
(88, 15, 'Melbourne', 'Cosmopolitan city known for its cultural attractions', -37.813600, 144.963100),
(89, 15, 'Great Ocean Road', 'Scenic coastal drive with limestone cliffs and rock formations', -38.680600, 143.391000),
(90, 15, 'Kangaroo Island', 'Island known for its diverse wildlife and natural beauty', -35.775200, 137.214700),
(91, 16, 'Taj Mahal', 'Iconic white marble mausoleum in Agra', 27.175100, 78.042100),
(92, 16, 'Varanasi', 'Sacred city on the banks of the Ganges River', 25.317600, 82.973900),
(93, 16, 'Jaipur', 'Pink city known for its historic palaces and forts', 26.912400, 75.787300),
(94, 16, 'Goa', 'Coastal state known for its beaches and nightlife', 15.299300, 74.124000),
(95, 16, 'Kerala Backwaters', 'Network of interconnected rivers, lakes, and canals', 9.498100, 76.338800),
(96, 16, 'Ranthambore National Park', 'Tiger reserve known for its wildlife safaris', 26.018300, 76.502600),
(97, 17, 'Red Square', 'Historic square at the heart of Moscow', 55.753900, 37.620800),
(98, 17, 'Hermitage Museum', 'One of the world\'s largest and oldest museums', 59.940600, 30.313500),
(99, 17, 'Trans-Siberian Railway', 'Longest railway line connecting Moscow to Vladivostok', 55.755800, 37.617600),
(100, 17, 'Saint Basil\'s Cathedral', 'Iconic cathedral with colorful onion domes', 55.752500, 37.623100),
(101, 17, 'Lake Baikal', 'Oldest and deepest freshwater lake in the world', 53.558700, 108.165000),
(102, 17, 'Peterhof Palace', 'Grand palace complex with stunning gardens', 59.884800, 29.907000),
(103, 18, 'Keukenhof Gardens', 'Largest flower garden in the world', 52.270900, 4.553500),
(104, 18, 'Anne Frank House', 'Museum dedicated to Jewish wartime diarist Anne Frank', 52.375200, 4.883700),
(105, 18, 'Van Gogh Museum', 'Art museum showcasing works of Vincent van Gogh', 52.358400, 4.881900),
(106, 18, 'Rijksmuseum', 'National museum with a vast collection of Dutch art', 52.359900, 4.885200),
(107, 18, 'Canal Cruise in Amsterdam', 'Scenic boat tour along Amsterdam\'s picturesque canals', 52.367600, 4.904100),
(108, 18, 'Zaanse Schans', 'Open-air museum with historic windmills and buildings', 52.473700, 4.816400),
(109, 19, 'Gyeongbokgung Palace', 'Historic palace with traditional Korean architecture', 37.577900, 126.976900),
(110, 19, 'DMZ (Demilitarized Zone)', 'Buffer zone between North and South Korea', 37.948000, 126.676000),
(111, 19, 'Jeju Island', 'Volcanic island known for its natural beauty and beaches', 33.499600, 126.531200),
(112, 19, 'Bukchon Hanok Village', 'Traditional Korean village with hanok houses', 37.579600, 126.985000),
(113, 19, 'Haeundae Beach', 'Popular beach destination in Busan', 35.158100, 129.160200),
(114, 19, 'N Seoul Tower', 'Iconic landmark offering panoramic views of Seoul', 37.551200, 126.988000),
(115, 20, 'Pyramids of Giza', 'Iconic ancient pyramids and Sphinx', 29.979200, 31.134200),
(116, 20, 'Karnak Temple', 'Vast ancient temple complex in Luxor', 25.718800, 32.657300),
(117, 20, 'Luxor Temple', 'Ancient Egyptian temple complex on the Nile River', 25.699300, 32.639800),
(118, 20, 'Valley of the Kings', 'Burial site of many pharaohs and nobles', 25.740200, 32.601900),
(119, 20, 'Abu Simbel Temples', 'Massive rock temples dedicated to Pharaoh Ramesses II', 22.337100, 31.625800),
(120, 20, 'Red Sea Riviera', 'Coastal resort towns with coral reefs and diving spots', 27.896900, 33.900800),
(121, 21, 'Christ the Redeemer', 'Iconic statue overlooking Rio de Janeiro', -22.951900, -43.210500),
(122, 21, 'Iguazu Falls', 'Breathtaking waterfall on the Brazil-Argentina border', -25.695300, -54.436700),
(123, 21, 'Copacabana Beach', 'Famous beach in Rio de Janeiro with a lively atmosphere', -22.971700, -43.182500),
(124, 21, 'Amazon Rainforest', 'Vast jungle teeming with biodiversity', -3.465300, -62.215900),
(125, 21, 'Sugarloaf Mountain', 'Landmark peak with panoramic views of Rio de Janeiro', -22.948000, -43.156900),
(126, 21, 'Pantanal', 'World\'s largest tropical wetland with diverse wildlife', -18.810600, -57.210000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `touristlocations`
--
ALTER TABLE `touristlocations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=813;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `touristlocations` (`location_id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `touristlocations` (`location_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `touristlocations` (`location_id`);

--
-- Constraints for table `touristlocations`
--
ALTER TABLE `touristlocations`
  ADD CONSTRAINT `touristlocations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
