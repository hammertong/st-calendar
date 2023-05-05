delete from  `groups`;

--
-- Groups
--
INSERT INTO `groups` (`id`, `name`) VALUES ( 10 , 'admin');
INSERT INTO `groups` (`id`, `name`) VALUES ( 11 , 'st-mec');
INSERT INTO `groups` (`id`, `name`) VALUES ( 12 , 'st-tid');
INSERT INTO `groups` (`id`, `name`) VALUES ( 13 , 'st-seg');
INSERT INTO `groups` (`id`, `name`) VALUES ( 14 , 'st-doc');
INSERT INTO `groups` (`id`, `name`) VALUES ( 15 , 'st-int');
INSERT INTO `groups` (`id`, `name`) VALUES ( 16 , 'st-hw');
INSERT INTO `groups` (`id`, `name`) VALUES ( 17 , 'st-sid');
INSERT INTO `groups` (`id`, `name`) VALUES ( 18 , 'st-sw');

--
-- Users
--
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Andrea', 'Tomatis', 'andrea.tomatis@urmet.com', 'tomatis', MD5('tomatis_109531'), 1,  10 , '#ff0000', '109531');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marco', 'Durando', 'marco.durando@urmet.com', 'durando', MD5('durando_110088'), 1,  11 , '#00ff00', '110088');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Ivan', 'Genesio', 'ivan.genesio@urmet.com', 'genesio', MD5('genesio_110187'), 1,  11 , '#0000ff', '110187');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Giuseppe', 'Sanfratello', 'giuseppe.sanfratello@urmet.com', 'sanfratello', MD5('sanfratello_109238'), 1,  10 , '#ffff00', '109238');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Ivano', 'Sartori', 'ivano.sartori@urmet.com', 'sartori', MD5('sartori_109360'), 1,  11 , '#00ffff', '109360');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Yousief', 'Abdelmessieh Abanoub Nabil', 'yousief.abdelmessiehabanoubnabil@urmet.com', 'abdelmessieh', MD5('abdelmessieh_110268'), 1,  12 , '#ff00ff', '110268');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Domenico', 'Actis Grosso', 'domenico.actisgrosso@urmet.com', 'actis', MD5('actis_110262'), 1,  10 , '#808080', '110262');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marina', 'Chiosea Anca', 'marina.chioseaanca@urmet.com', 'chiosea', MD5('chiosea_110183'), 1,  13 , '#ff8080', '110183');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marco', 'D\'amelio', 'marco.damelio@urmet.com', 'damelio', MD5('damelio_109235'), 1,  13 , '#80ff80', '109235');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Stefania', 'Dell\'universita\'', 'stefania.delluniversita@urmet.com', 'delluniversita', MD5('delluniversita_110211'), 1,  13 , '#8080ff', '110211');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Ernesto', 'Ghirardi Eduardo', 'ernesto.ghirardieduardo@urmet.com', 'ghirardi', MD5('ghirardi_109204'), 1,  13 , '#008080', '109204');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Ezio', 'Nota', 'ezio.nota@urmet.com', 'nota', MD5('nota_110221'), 1,  13 , '#800080', '110221');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marco', 'Daniele', 'marco.daniele@urmet.com', 'daniele', MD5('daniele_109127'), 1,  10 , '#808000', '109127');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Francesca', 'Lantero', 'francesca.lantero@urmet.com', 'lantero', MD5('lantero_109115'), 1,  14 , '#ffff80', '109115');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Dino', 'Zanellato', 'dino.zanellato@urmet.com', 'zanellato', MD5('zanellato_110185'), 1,  14 , '#80ffff', '110185');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Vittoria', 'Fauro', 'vittoria.fauro@urmet.com', 'fauro', MD5('fauro_110112'), 1,  15 , '#ff80ff', '110112');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Antonio', 'Caldiroli', 'antonio.caldiroli@urmet.com', 'caldiroli', MD5('caldiroli_2410085'), 1,  15 , '#ff0080', '2410085');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Mario', 'Ferrario Vincenzo', 'mario.ferrariovincenzo@urmet.com', 'ferrario', MD5('ferrario_2410089'), 1,  15 , '#80ff00', '2410089');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Nicola', 'Magistrelli', 'nicola.magistrelli@urmet.com', 'magistrelli', MD5('magistrelli_2410093'), 1,  15 , '#0080ff', '2410093');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Roberto', 'Alice', 'roberto.alice@urmet.com', 'alice', MD5('alice_109326'), 1,  16 , '#00ff80', '109326');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Mauro', 'Aussello', 'mauro.aussello@urmet.com', 'aussello', MD5('aussello_109231'), 1,  16 , '#8000ff', '109231');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Stefano', 'Battaglino', 'stefano.battaglino@urmet.com', 'battaglino', MD5('battaglino_109341'), 1,  16 , '#ff8000', '109341');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Luca', 'Ingrassia', 'luca.ingrassia@urmet.com', 'ingrassia', MD5('ingrassia_109226'), 1,  13 , '#800000', '109226');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Lorenzo', 'Lerario', 'lorenzo.lerario@urmet.com', 'lerario', MD5('lerario_110069'), 1,  16 , '#008000', '110069');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Matteo', 'Mercurio', 'matteo.mercurio@urmet.com', 'mercurio', MD5('mercurio_110346'), 1,  16 , '#404040', '110346');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marco', 'Novero', 'marco.novero@urmet.com', 'novero', MD5('novero_109480'), 1,  10 , '#ff4040', '109480');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Daniele', 'Sabatino', 'daniele.sabatino@urmet.com', 'sabatino', MD5('sabatino_109317'), 1,  16 , '#40ff40', '109317');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Andrea', 'Villata', 'andrea.villata@urmet.com', 'villata', MD5('villata_109347'), 1,  16 , '#4040ff', '109347');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Matteo', 'Zuin', 'matteo.zuin@urmet.com', 'zuin', MD5('zuin_2609929'), 1,  17 , '#ff0000', '2609929');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Giuseppe', 'Bruzzese', 'giuseppe.bruzzese@urmet.com', 'bruzzese', MD5('bruzzese_110267'), 1,  17 , '#ed7d31', '110267');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Massimiliano', 'Castellaro', 'massimiliano.castellaro@urmet.com', 'castellaro', MD5('castellaro_109384'), 1,  17 , '#404000', '109384');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Federico', 'Montini', 'federico.montini@urmet.com', 'montini', MD5('montini_110225'), 1,  17 , '#ffc000', '110225');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Simone', 'Piazza', 'simone.piazza@urmet.com', 'piazza', MD5('piazza_110166'), 1,  17 , '#70ad47', '110166');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Gianpiero', 'Arico\'', 'gianpiero.arico@urmet.com', 'arico', MD5('arico_110251'), 1,  18 , '#404080', '110251');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Cristian', 'Bardino', 'cristian.bardino@urmet.com', 'bardino', MD5('bardino_110208'), 1,  18 , '#ffff40', '110208');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Emiliano', 'Bergamaschini', 'emiliano.bergamaschini@urmet.com', 'bergamaschini', MD5('bergamaschini_110247'), 1,  18 , '#40ffff', '110247');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Maurizio', 'Bertero', 'maurizio.bertero@urmet.com', 'bertero', MD5('bertero_110210'), 1,  18 , '#ff40ff', '110210');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Valentina', 'Borla Alessia', 'valentina.borlaalessia@urmet.com', 'borla', MD5('borla_110051'), 1,  18 , '#ff0040', '110051');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Gianluca', 'Bovo', 'gianluca.bovo@urmet.com', 'bovo', MD5('bovo_110525'), 1,  18 , '#40ff00', '110525');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Francesco', 'Bruno', 'francesco.bruno@urmet.com', 'bruno', MD5('bruno_110252'), 1,  18 , '#0040ff', '110252');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Marco', 'Cappelli', 'marco.cappelli@urmet.com', 'cappelli', MD5('cappelli_110313'), 1,  18 , '#ff8040', '110313');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Alessandro', 'D\'amato', 'alessandro.damato@urmet.com', 'd\'amato', MD5('d\'amato_109246'), 1,  18 , '#40ff80', '109246');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Alessandro', 'Di Bella', 'alessandro.dibella@urmet.com', 'dibella', MD5('dibella_109346'), 1,  18 , '#8040ff', '109346');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Alessandro', 'Di Maio', 'alessandro.dimaio@urmet.com', 'dimaio', MD5('dimaio_110275'), 1,  18 , '#00ff40', '110275');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Alessandro', 'Ivaldi', 'alessandro.ivaldi@urmet.com', 'ivaldi', MD5('ivaldi_110243'), 1,  18 , '#4000ff', '110243');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Urbino', 'Locurcio', 'urbino.locurcio@urmet.com', 'locurcio', MD5('locurcio_110180'), 1,  18 , '#ff4000', '110180');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Antonio', 'Mafrica', 'antonio.mafrica@urmet.com', 'mafrica', MD5('mafrica_110273'), 1,  18 , '#000040', '110273');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Tommaso', 'Mignogna', 'tommaso.mignogna@urmet.com', 'mignogna', MD5('mignogna_110297'), 1,  18 , '#400000', '110297');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Antonio', 'Pinto', 'antonio.pinto@urmet.com', 'pinto', MD5('pinto_109379'), 1,  10 , '#004000', '109379');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Daria', 'Scandale', 'daria.scandale@urmet.com', 'scandale', MD5('scandale_110296'), 1,  18 , '#008040', '110296');
INSERT INTO `users` (`name`, `surname`, `email`, `username`, `userpass`, `user_status`, `grp`, `default_color`, `badge`) 
   VALUES ('Christian', 'Yamamoto', 'christian.yamamoto@urmet.com', 'yamamoto', MD5('yamamoto_110191'), 1,  18 , '#400080', '110191');


