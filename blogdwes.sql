-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2019 a las 13:41:01
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blogdwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(3) NOT NULL,
  `entrada` int(3) NOT NULL,
  `cuerpo` text NOT NULL,
  `autor` int(3) NOT NULL,
  `fechaComentario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `entrada`, `cuerpo`, `autor`, `fechaComentario`) VALUES
(12, 25, 'probando comentarios', 1, '2019-01-08 22:40:53'),
(13, 25, 'otro comentario mas', 1, '2019-01-08 22:40:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `idEntrada` int(3) NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `autor` int(3) NOT NULL,
  `etiquetas` varchar(50) NOT NULL,
  `titulo` text NOT NULL,
  `cuerpo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`idEntrada`, `fechaPublicacion`, `autor`, `etiquetas`, `titulo`, `cuerpo`) VALUES
(22, '2019-01-08 20:18:33', 1, 'noticias', 'NBA 2K: veinte aÃ±os superando la perfecciÃ³n', 'La franquicia de juegos de baloncesto de 2K Sports y Visual Concepts cumple veinte a&ntilde;os subiendo el list&oacute;n de lo que un juego deportivo puede llegar a ser. Repasamos la historia de uno de los videojuegos m&aacute;s populares y las claves de su &eacute;xito<br />\r\n<br />\r\nLos videojuegos deportivos son una especie curiosa: al estar basados la mayor&iacute;a en deportes y ligas reales, en los que entre temporada y la siguiente pueden cambiar jugadores, equipos y hasta reglas, se ven obligados a lanzar una edici&oacute;n anual. No hay retraso posible, por mucho que a alguien se le ocurra una idea genial: llega septiembre, arrancan las competiciones y el juego de turno tiene que estar en las estanter&iacute;as. Este ritmo de desarrollo fren&eacute;tico obliga a que cualquier evoluci&oacute;n sea incremental: peque&ntilde;os cambios casi inapreciables entre ediciones que van llevando el juego en una determinada direcci&oacute;n, que s&oacute;lo se ve con claridad al mirar la franquicia con la distancia y perspectiva de varios a&ntilde;os.<br />\r\n<br />\r\nAdem&aacute;s, alcanzado cierto nivel de simulaci&oacute;n, mejorar la cosas se va haciendo exponencialmente m&aacute;s dif&iacute;cil. Por razones evidentes, la base de un juego deportivo es siempre igual: salvo cambios puntuales en las reglas (no ha habido tantos en cien a&ntilde;os de historia del deporte) el baloncesto es esencialmente el mismo. Uno puede mejorar la inteligencia artificial, la representaci&oacute;n visual, la ambientaci&oacute;n&hellip; pero al final el baloncesto no cambia, as&iacute; que las diferencias entre una edici&oacute;n y otra, a estas alturas, no pueden ser muy significativas. Todo esto parece de puro sentido com&uacute;n, pero ah&iacute; est&aacute; NBA 2K para llevar la contraria. Desde hace ya alg&uacute;n tiempo, cada a&ntilde;o la cr&iacute;tica viene a concluir que se trata de un juego de baloncesto sencillamente perfecto&hellip; y doce meses despu&eacute;s, de alguna forma la perfecci&oacute;n sube un escal&oacute;n m&aacute;s.<br />\r\n<br />\r\nNBA 2K, que recibe este a&ntilde;o el premio honor&iacute;fico a toda una saga en el Fun &amp; Serious Games Festival, ha logrado una cercan&iacute;a para con el deporte que representa que asombra a cualquiera que sepa un poco de baloncesto. Hace algunos a&ntilde;os, en una mesa redonda sobre simulaci&oacute;n deportiva en el Festival en la que participaban Antoni Daimiel (probablemente la voz que m&aacute;s relaciona el espectador actual con la NBA) y Vicente Salaner (pionero del baloncesto americano en Espa&ntilde;a), ambos coincid&iacute;an en se&ntilde;alar que pod&iacute;a reconocerse a los jugadores por la mec&aacute;nica de tiro. Es un ejemplo llamativo, pero no es m&aacute;s que la punta del iceberg: la inclusi&oacute;n de los movimientos reales t&iacute;picos de todos y cada uno de los jugadores fue uno de los hitos que popularizaron NBA 2K, pero en el fondo no se trata m&aacute;s que de acumular animaiones personales. Eso &laquo;s&oacute;lo&raquo; requiere tiempo, recursos para una buena tecnolog&iacute;a de captura de movimiento y artistas con buen ojo.<br />\r\n<br />\r\nLo que realmente hace destacar NBA 2K por encima de cualquier otro juego es su capacidad para reflejar la realidad de un deporte tan complejo t&aacute;ctica, t&eacute;cnica y atl&eacute;ticamente con el baloncesto NBA. Dec&iacute;amos antes que las reglas son las mismas, pero el estilo de juego cambia y evoluciona. Por poner un ejemplo cercano en el tiempo, la irrupci&oacute;n de los Warriors de Stephen Curry ha cambiado la forma de entender el ataque (y, en consecuencia, tambi&eacute;n la de defender; aunque en ese ajuste estamos todav&iacute;a). Especialistas en tiro exterior, el equipo de la Bah&iacute;a se dedica a mover el bal&oacute;n muy r&aacute;pido para abrir el juego, siempre en busca de mejorar las opciones de alguno de sus letales tiradores. El ataque en el poste, otrora la base sobre la que se constru&iacute;a un equipo, ha perdido much&iacute;simo peso.<br />\r\n<br />\r\nEl &eacute;xito arrollador de los Warriors ha hecho que el resto de equipos cambie su forma de jugar: sea por imitar al equipo de Steve Kerr, sea por tratar de contrarrestarlo, el estilo ha cambiado. Si uno arranca un juego de baloncesto hoy en d&iacute;a y se encuentra una jugabilidad basada en ataque est&aacute;tico y balones al poste, sentir&aacute; que de alg&uacute;n modo no es fiel, aunque las reglas sean las mismas, aunque la inteligencia artificial sea muy compleja. NBA 2K ha logrado estar al d&iacute;a en todo momento, reflejar con fidelidad no s&oacute;lo c&oacute;mo es el baloncesto en general, sino c&oacute;mo se est&aacute; jugando ahora mismo en las canchas reales. Y eso no es tan f&aacute;cil como parece: es f&aacute;cil reconocer los cambios de tendencia a toro pasado, pero anticiparlos, definirlos y ser capaces de trasladarlos a una experiencia de juego no es sencillo.<br />\r\n<br />\r\nEs necesario mucho trabajo, por supuesto, pero tambi&eacute;n de un profund&iacute;simo conocimiento de la NBA. El equipo de Visual Concepts, el estudio de desarrollo que crea el juego, est&aacute; formado por aut&eacute;nticos locos de la NBA y emplea a su vez especialistas en analizar el juego. Circula la an&eacute;cdota de que un productor del equipo vio una nueva jugada defensiva en un partido que estaban retransmitiendo por la televisi&oacute;n; llam&oacute; para dar aviso y al d&iacute;a siguiente estaba ya implementada en el juego. Le pregunt&eacute; al respecto a un productor del juego en una entrevista del a&ntilde;o pasado. &laquo;Tenemos dos productores que han jugado baloncesto a muy alto nivel, y que son amigos de gente que est&aacute; de hecho jugando en la NBA&raquo;, me cont&oacute;. &laquo;Ellos dedican la mayor parte de su tiempo a analizar estrategias, la forma en la que se juega al baloncesto, e intentamos imitar ese aspecto del juego [...] As&iacute; que cuando me dices que te imaginas a alguien viendo partidos y llam&aacute;ndonos para decirnos que quieren poner eso en el juego&hellip; pues as&iacute; es&raquo;.<br />\r\n<br />\r\nA este conocimiento del juego hay que sumar la conocida obsesi&oacute;n de los norteamericanos por las estad&iacute;sticas. Sin llegar a los extremos de otros deportes como el b&eacute;isbol, las franquicias de la NBA estudian con cada vez m&aacute;s detalle el juego. El big data, la recogida y an&aacute;lisis de cantidades ingentes de informaci&oacute;n en busca de tendencias significativas, ha cambiado la forma de entender el baloncesto; y es un m&eacute;todo que se utiliza tanto en la liga real como en el desarrollo del videojuego. A partir de esa informaci&oacute;n un equipo de expertos decide las estad&iacute;sticas de cada jugador y crea los libros de jugadas de cada equipo. Una vez implementados los movimientos, las jugadas, las estrategias, queda un profuso trabajo de pulido: poner a prueba cada cambio, ver qu&eacute; tal funciona, a&ntilde;adir los ajustes necesarios y volver a empezar, iteraci&oacute;n tras iteraci&oacute;n, hasta lograr el resultado m&aacute;s perfecto posible.<br />\r\n<br />\r\nSi bien es probablemente exagerado apuntar que un videojuego haya cambiado la forma de entender el baloncesto, s&iacute; es cre&iacute;ble que la recreaci&oacute;n sea lo bastante realista para predecir tendencias. Algunos expertos creen que as&iacute; ha ocurrido, que el juego puede servir de banco de pruebas gracias a la informaci&oacute;n arrojada por la forma de afrontar el juego de millones de personas. B&aacute;sicamente, que quien hubiera estado lo bastante atento a NBA 2K podr&iacute;a haber visto venir algunos cambios reales. &laquo;Las recientes innovaciones en la liga&raquo;, aseguraba el periodista Tim Marcin en un art&iacute;culo publicado en Newsweek en 2017, &laquo;como la explosi&oacute;n de los triplistas, el llamado tanking, la importancia del &#039;small ball&#039; &ndash; que, combinados, representan un cambio geol&oacute;gico para el juego de la NBA &ndash;: los jugadores de NBA 2K llevan usando casi todas esas t&aacute;cticas desde hace a&ntilde;os. Lo virtual se ha encontrado con lo real&raquo;.'),
(23, '2019-01-08 20:43:16', 1, 'myteam', 'NBA 2K19: 2K compensa a los jugadores por el Lebron James Pink Diamond', 'La pol&iacute;tica de micropagos de la temporada pasada, algo mejorada en NBA 2K19, ha hecho que la comunidad est&eacute; especialmente sensible con cualquier traspi&eacute;s que pueda cometer 2K Games respecto a su franquicia baloncest&iacute;stica, y estos d&iacute;as hemos tenido un nuevo ejemplo. Recientemente, el youtuber Shake4ndBake revel&oacute; un c&oacute;digo de vestuario que daba acceso directo a una carta Pink Diamond (media 96) de Lebron James, con lo que una gran cantidad de jugadores pudieron hacerse con &eacute;l. Desgraciadamente, la alegr&iacute;a no dur&oacute; mucho, ya que en la ma&ntilde;ana de ayer amanec&iacute;amos con una mala noticia: la carta hab&iacute;a desaparecido con la misma facilidad con la que lleg&oacute;.<br />\r\n<br />\r\n2K retir&oacute; la carta debido a que no hab&iacute;a sido otorgada de manera oficial, sino por un c&oacute;digo filtrado. Sin embargo, el enfado de los jugadores ya estaba en el aire, ya que muchos de ellos le hab&iacute;an aplicado insignias, zapatillas o contratos, probablemente muchos de ellos infinitos, con un alto coste en MT, la moneda del modo Mi Equipo. Afortunadamente, el estudio ha actuado con rapidez.<br />\r\n<br />\r\nEn un streaming de Ronnie, c&eacute;lebre personalidad de 2K, este anunci&oacute; que la compa&ntilde;&iacute;a devolver&iacute;a cualquier objeto aplicado a la carta de Lebron James eliminada, adem&aacute;s de liberar dos nuevos c&oacute;digos de vestuario muy generosos. Uno de ellos da acceso a un panel en el que conseguir de 25.000 a 50.000 MT, mientras que el otro nos otorgar&aacute; una de las cartas Pink Diamond especial 20 aniversario de NBA 2K desveladas hasta el momento, es decir: Allen Iverson, Blake Griffin, Magic Johnson, Ben Wallace o Giannis Antetokounmpo. En este hilo de Twitter pueden encontrarse ambos.<br />\r\n<br />\r\nSin embargo, los servidores de NBA 2K19 se saturaron durante unas horas, con lo que algunos jugadores perdieron su oportunidad de canjear ambos c&oacute;digos. Estos durar&aacute;n hasta el pr&oacute;ximo d&iacute;a 3 de enero, con lo que recomendamos ser pacientes y esperar para ir a por estas jugosas compensaciones.'),
(24, '2019-01-08 20:44:32', 1, 'noticias', 'El actor de Carlton en \'El prÃ­ncipe de Bel Air\' demanda a \'Fortnite\' y a \'NBA 2K\' por plagiarle un baile', 'El gigante de los videojuegos en el que se ha convertido Fortnite, un videojuego gratuito y en l&iacute;nea del g&eacute;nero shooter en tercera persona, conocido principalmente en su versi&oacute;n Battle Royale, cuenta con un abanico de armas, escenarios e incluso bailes (emotes) en constante actualizaci&oacute;n.<br />\r\n<br />\r\nAhora, uno de esos bailes, llamado Fresh, se ha convertido en el objeto de una demanda del actor Alfonso Ribeiro. Este int&eacute;rprete, que encarn&oacute; al personaje Carlton en El pr&iacute;ncipe de Bel Air, cre&oacute; lo que la cultura pop conoce como el baile de Carlton.<br />\r\n<br />\r\nRibeiro ha demandado a Epic Games, empresa desarrolladora de Fortnite, y a Take-Two Interactive, la desarrolladora de los videojuegos NBA 2K, por utilizar este baile.<br />\r\n<br />\r\nEn documentos judiciales a los que ha tenido acceso la edici&oacute;n estadounidense del HuffPost, Ribeiro y su abogado declaran que estas dos empresas &quot;han aprovechado de manera ileg&iacute;tima la expresi&oacute;n creativa de Ribeiro y su semejanza, que est&aacute;n protegidos&quot;, a lo que a&ntilde;aden que el famoso baile &quot;est&aacute; ahora indisolublemente asociado a Ribeiro y ha seguido siendo parte de su marca personal como celebridad&quot;.<br />\r\n<br />\r\n<br />\r\nEst&aacute; claro, al menos en el caso de Fortnite, que el baile Fresh est&aacute; basado en el baile de Carlton. Cabe destacar tambi&eacute;n que en ingl&eacute;s la serie se titula The Fresh Prince of Bel Air.<br />\r\n<br />\r\nY no solo coinciden el baile y el nombre Fresh; tambi&eacute;n la m&uacute;sica instrumental de fondo est&aacute; inspirada en It&#039;s Not Unusual del cantante Tom Jones.<br />\r\n<br />\r\nEn un comunicado dirigido a la edici&oacute;n estadounidense del HuffPost, David Hecht, abogado de Ribeiro, dice:<br />\r\n<br />\r\n&quot;Est&aacute; sobradamente claro que Epic Games se ha apropiado de forma indebida de la semejanza con el se&ntilde;or Ribeiro y su propiedad intelectual en el videojuego m&aacute;s popular actualmente del mundo, &#039;Fortnite&#039;. Epic ha alcanzado beneficios r&eacute;cord a trav&eacute;s de contenido descargable para el videojuego, entre los que se encuentran &#039;emotes&#039; como &#039;Fresh&#039;. Sin embargo, Epic no ha compensado ni pedido permiso siquiera al se&ntilde;or Ribeiro para utilizar su semejanza y su propiedad intelectual ic&oacute;nica. Por lo tanto, el se&ntilde;or Ribeiro busca una parte justa y razonable de los beneficios que ha obtenido Epic a trav&eacute;s del uso de su propiedad intelectual ic&oacute;nica en &#039;Fortnite&#039; y, en consecuencia, est&aacute; solicitando por la v&iacute;a judicial que Epic elimine de inmediato todo uso del baile ic&oacute;nico del se&ntilde;or Ribeiro&quot;.<br />\r\n<br />\r\nHecht tambi&eacute;n representa al rapero de Brooklyn 2 Milly en una demanda similar contra Epic por lo que su cliente considera que es un uso no autorizado de su movimiento de baile m&aacute;s famoso, el Milly Rock.<br />\r\n<br />\r\nLa popularidad de Fortnite ha subido como la espuma y alcanz&oacute; hace poco los 200 millones de jugadores registrados, de los cuales 75 millones de nuevos usuarios llegaron a partir de junio. En marzo, el rapero Drake jug&oacute; en modo d&uacute;o con uno de los youtubers de Fortnite m&aacute;s famosos: Ninja, cuyo nombre real es Tyler Blevins. Ambos sufrieron problemas t&eacute;cnicos a causa de las peticiones de amistad que les llegaron tras hacerse p&uacute;blico el nombre de la cuenta de PlayStation de Drake.<br />\r\n<br />\r\nEpic Games y Take Two Interactive todav&iacute;a no han querido dar su versi&oacute;n a la edici&oacute;n estadounidense del HuffPost.'),
(25, '2019-01-08 20:45:20', 1, 'playgrounds', 'NBA 2K Playgrounds 2 se prepara para Navidad con nuevos contenidos', 'NBA 2K Playgrounds 2 ya se est&aacute; preparando para estas navidades con nuevo contenido. De acuerdo con lo compartido, los jugadores ya pueden disfrutar de novedades navide&ntilde;as en el juego de baloncesto.<br />\r\n<br />\r\nSeg&uacute;n han confirmado 2K y Saber Interactive, ya est&aacute; disponible un nuevo patio de juego y objetos tem&aacute;ticos de Navidad, as&iacute; como 35 nuevos jugadores. Entre ellos destacan algunas leyendas de los a&ntilde;os 90 de la NBA como Karl Malone y Dennis Rodman.<br />\r\n<br />\r\n&iquest;Qu&eacute; os parece? &iquest;Retomar&eacute;is el juego tras esta actualizaci&oacute;n?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(3) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `pass`, `fechaRegistro`, `nombre`, `apellidos`, `admin`) VALUES
(1, 'jgallardo', '39d075ad7ff71d6426a797e5e557021b', '2019-01-08', 'Jorge', 'Gallardo', 1),
(5, 'ereca', '0281b9bb9474ff257152ffdff40ac9ce', '2019-01-08', 'Eva', 'Redondo', 1),
(6, 'mauridabeast', '81dc9bdb52d04dc20036dbd8313ed055', '2019-01-08', 'Mauricio', 'Hinostroza Valenzuela', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `autor` (`autor`),
  ADD KEY `entrada` (`entrada`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `idEntrada` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`entrada`) REFERENCES `entradas` (`idEntrada`);

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
