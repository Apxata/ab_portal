-- --------------------------------------------------------
-- Хост:                         apxat.ru
-- Версия сервера:               5.5.59-0ubuntu0.14.04.1 - (Ubuntu)
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных albion
CREATE DATABASE IF NOT EXISTS `albion` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `albion`;

-- Дамп структуры для таблица albion.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `preview_text` text CHARACTER SET utf8 NOT NULL,
  `full_text` text CHARACTER SET utf8 NOT NULL,
  `subject` varchar(256) CHARACTER SET utf8 NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `access_via_id` tinyint(4) NOT NULL DEFAULT '1',
  `article_hash` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.articles: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `author_id`, `create_date`, `last_edit_date`, `preview_text`, `full_text`, `subject`, `visible`, `access_via_id`, `article_hash`) VALUES
	(1, 20, '2018-08-16 09:31:43', '0000-00-00 00:00:00', '', 'В альбионе существует система понижающая эффективность больших групп врагов по сравнению с меньшими группами. Это система основана на увеличении защиты при получении урона от нескольких врагов за определенное время. \r\nУменьшение урона зависит от:\r\n- числа врагов нанесших урон\r\n- типа оружия врагов (ближний/дальний бой)\r\n\r\nТак, когда вас атакует несколько врагов вы получаете бафф в простонародье называемый **зерг-контролем**. Данный бафф дает процентное уменьшение урона по вам, но получает только 1 стак за одного атакующего, то бишь если один и тот же человек будет бить несколько раз бафф будет лишь обновляться, но не увеличиваться.\r\nНапример если вас одновременно атакуют два врага ближнего боя (например алебарда и копье), то урон получаемый вами будет уменьшен на 14% и у вас на панели баффов появится соответствующий бафф зерг-контроля в виде бело-красного щита, который будет висеть несколько секунд (примерно 5), если же до окончания баффа вас ударит третий враг ближнего боя то уменьшение урона составит уже 25% и время баффа обновится.\r\nАналогично данная система работает и с уроном дальнего боя, только % снижения урона для дальнего боя несколько меньше чем для ближнего. \r\n\r\nКазалось бы что в таком случае урон и заливка дальнего боя гораздо эффективнее ближнего, но все не так просто. В характеристиках любого оружия ближнего боя присутствует коэффициент "пробивание защиты" (или "resilience penetration" в англ. версии) он может быть равен например 0.3 (30%) (для булав и молотов) или 0.4 0.5 (40-50%) (для топоров и мечей). Данный коэффициент определяет в какой степени зерг-контроль будет влиять на урон вашего оружия. Например если на враге бафф зерг-контроля составляет 25% а вы бьете его алебардой с коэффициентом пробивания защиты = 0.3 то реальный зерг-контроль противника составит 25*0.7=17.5%.\r\n \r\n**Зачем это нужно и что это значит?**\r\n 1. Думайте в кого нужно наносить урон, в танка с 50% хп но имеющего зерг-контроль от 20 человек или в тряпку имеющую 100% хп без защиты от зерг-контроля.\r\n 2. Не используйте кушки и авто-атаки впустую если вы хилер или боец ближнего боя, один-два раза ударив вражеского танка за милишника или хилера вы только навредите своей команде неубиваемым танком.\r\n 3. Если ваш урон имеет свойство дота (периодического урона) или настакивания постарайтесь не менять цель или же выбрать максимум 2 цели которым и только которым вы будете наносить урон (будь то танк или милишник врага).\r\n 4. Если же вы сдали вашу ешку, и данная ешка нанесла урон всем врагам, то пункт 3 не имеет смысла выполнять, бейте того кого необходимо.\r\n 5. Если вы сами являетесь танком или милишником, постарайтесь собрать как можно больше единичных ударов от разных врагов, при этом оставаясь при полном здоровье, немаловажно поддерживать накопленный вами бафф зерг-контроля и врываться после его очередного обновления. Именно данный зерг-контроль, отхил и большой запас здоровья являются основным залогом выживания танка в бою.\r\n\r\n\r\n', 'Фокусирование урона в звз, механика "пробивания защиты", "зерг-контроль"', 1, 2, '619254d13bab64956983259e25fe4501'),
	(3, 1, '2018-09-18 08:45:55', '0000-00-00 00:00:00', '', 'Я решил немного попрактиковаться в РНР и сделал мини портал где хочу собрать в удобном виде разного рода статьи и мини программы.\r\n\r\n**Как этим пользоваться.**\r\nСайт будет разделяться на три категории:\r\n\r\n1) Данные открытые по прямой ссылке, никакой регистрации не нужно.\r\n2) Данные для которых нужна регистрация. Она достаточно простая. \r\n3) Данные доступные по регистрации и требующие определенных прав. \r\n\r\nНа текущий момент работают разделы статьи  и фейм фарм.\r\nСтатьи открыты для всех. Фейм фарм требует регистрации.\r\n', 'Что это и для чего', 1, 1, NULL),
	(4, 1, '2018-09-30 06:40:27', '0000-00-00 00:00:00', '', 'Рассмотрим систему смены специализации (re-spec, в дальнейшем ре-спек) и возможную выгоду от ее использования. В общих чертах данная система позволяет переводить фейм прокачки из мастерок в очки специализации (очки ре-спека), которые затем можно превратить в фейм и вложить в любую другую ветку. При этом теряется часть фейма, а также вы платите серебром за каждую еденицу фейма при переводе его в очки ре-спека.\r\n\r\nОтсюда видно, что за 100 фейма оружия можно получить 80 фейма оружия или 160 фейма брони или 320 фейма сапог или шлема. За 100 фейма брони можно получить 40 фейма оружия или 80 фейма брони или 160 фейма сапог или шлема.\r\nПроще говоря **при конвертации теряется 20% фейма, а ценность фейма снаряжения в виде очков ре-спека соотносится как 1 (для оружия) к 2 (для нагрудника) к 4(сапоги или шлем) к 20(для офф-хенда)**.\r\nТакая ценность связана с тем, что затраты очков обучения (LP) для разных типов снаряжения соответствующие.\r\n\r\nПро сброс веток ре-спеком:\r\n**Непосредственный сброс веток прокачки это всегда огромные потери по фейму и серебру, поэтому во всех случаях следует стараться этого избегать**. \r\n\r\nУ системы ре-спека существует и другая, более полезная сторона. Данное свойство связанно с возможностью автоматического ре-спека при достижении 100го уровня прокачки. Эта возможность была добавлена вместе с галочкой в дереве прокачки, представленной на картинке ниже:\r\n\r\nБез этой галочки вы автоматически будете накапливать 20% от получаемого фейма в виде очков ре-спека, а при нажатой галочке 80%, но вы будете платить серебром за полученные очки как и при сбросе прокачки.\r\n\r\n**Польза системы ре-спека заключается в следующем**:\r\n1) **При достижении 100го уровня ношения (когда вы сможете носить т8) в добавок к фейму вы будете получать очки ре-спека**, которые сможете вложить в прокачиваемое оружие или броню, то есть ваша мастерка будет качаться на 20-80% быстрее (в зависимости от того поставите вы галочку или нет). \r\n\r\n2) **Вы можете "переводить" очки обучения (learning points, LP) в очки ре-спека**.Это возможно осуществить на любом уровне мастерки, достаточно докачать уровень до 20% и затем произвести изучение и ре-спек. Но **наиболее эффективно это делать на 99 уровне мастерства** (так как количество получаемого фейма за книжки растет с уровнем мастерки). Для этого вы можете сделать специальный сет обычных вещей (эффективность не зависит от того артифактная вещь или нет) прокачанных до 99 уровня и набив 20% фейма (фейм для всех вещей кроме офф-хенда требуется одинаковый) Потратить ваши книжки и затем снова сделать ре-спек сета до 99 уровня. **Таким образом вы сможете потратить 100 книжек за 30 минут и получить около 700 тысяч очков ре-спека** (если у вас ношение прокачено до 100 вы получите еще больше за счет автоматического ре-спека).\r\n**Важный момент: изучать мастерку на 20% прокачки книжками выгодно!** Хотя в патчах было написано что разница между изучением на 20% и 30% составит на 15%(14.28%) больше LP, это не значит что вы потеряете 15% лп, ведь если глянуть по % то увеличение 70ти на 14-15% и будет как раз около 10 (в сумме 80). Проще говоря **отношение кол-ва книжек к фейму не поменялось для новой прокачки на 20%.**\r\n\r\n3) За счет меньших требований по очкам ре-спека для брони и офф-хендов появилась возможность прокачать данные предметы в разы быстрее. Например сбросив 20-30 мастерок ненужного вам оружия вы сможете прокачать ваш артифактный факел или щит до 100.\r\n\r\n4) **За счет данной системы вы можете весь получаемый фейм (фейм получаемый каждым предметом) заливать в одну вещь.** Так если вы будете качать только мастерку оружия и сбрасывать все остальное (ношение оружия и других предметов и мастерки для других предметов) вы сможете прокачать её в 3.4 раза быстрее, а в случае с броней в 5-8 раз быстрее (для нагрудника или шлема, сапог).\r\n\r\n5) **Вы можете всегда фармить в одном и том же билде** (при этом качая другие билды), например, имея сотые мастерки в билде для экспедиций или соло билде для боссов.\r\n\r\nМинусы системы: \r\n\r\n- значительные затраты по серебру (примерно на 3 фейма требуется 1 серебра);\r\n- после нескольких перекидываний веток вы, можно сказать, потеряли уже около половины вашего общего фейма;\r\n\r\nПлюсы системы:  \r\n\r\n - возможность эффективного распределения фейма;\r\n - ускорение прокачки в разы;\r\n - возможность прокачки билдов слабых и бесполезных в пве, за счет других билдов.\r\n\r\nP.s. Следует отметить, что фейм ношения равнозначен фейму мастерок, то бишь пропорция перевода 1-2-4-20 для него сохраняется.\r\nКак сильно разнится отношение очков обучения (LP) и фейма получаемого за них? Очень сильно, так, закинуть фейм от LPешек в ветку ре-спеком (с 99-100го) будет выгоднее чем изучить уровни за LP напрямую вплоть до 75го уровня любой вещи (конечно за это прийдется заплатить серебром).\r\n', 'Система смены специализации (ре-спек), выгода от ее использования', 1, 2, 'a16e78a27340b76aea3064baa8a95fab'),
	(5, 1, '2018-09-30 06:42:14', '0000-00-00 00:00:00', '', 'На первый взгляд система прокачки альбион довольна проста: сначала прокачивается основная мастерка (мастерка (специализация) того оружия или брони которые вы хотите прокачать), а потом побочные. Но все не так просто. \r\n\r\nКак известно, чем выше уровень мастерки тем больше фейма(славы) требуется для получения следующей. Также известно что основная мастерка дает 2.2 ip (силы предмета) за уровень а побочные и ношение 0.2. В данном случае прокачку ношения учитывать не будем, т.к. она идет одновременно с прокачкой мастерок.\r\nОтсюда можно выделить такое понятие как **"эффективность прокачки" то есть отношение полученных ip к затраченному на это фейму**. Понятно, что с уровнями эта эффективность падает, но тут то и **может возникнуть ситуация когда прокачивать побочные ветки будет более эффективно чем основную**.\r\n\r\nДанные по фейму прокачки (таблицы фейма) доступны в интернете (сайт albion2d), расчет проведем на основе этих данных, сами таблицы приводить здесь не будем, а сразу отметим **полученные результаты**:\r\n\r\nВо первых, количество фейма, необходимого для прокачки обычного чего бы то не было кроме офф-хендов (факелы, сферы, щиты и т.п.) одинаковое (одинаково для брони тела, шлемов, сапог, оружия) и отличается только количеством книжек прокачки (LP) или очков ре-спека, но об этом сейчас говорить не будем. При этом **на артифакты требуется ровно в 3 раза больше фейма**, LP и очков ре-спека (т.к. вы одновременно прокачиваете 3 оружия). Поэтому разделим прокачку для артифактного и неартифактного оружия.\r\n\r\n**Для неартифактного оружия эффективная прокачка выглядит так**: \r\n 1) Сначала прокачать **основную мастерку до 88**.\r\n 2) Затем прокачать **побочные неартифактные мастерки до 11**.\r\n 3) Далее докачать **основную мастерку до 100**.\r\n 4) Затем прокачать **побочные неартифактные мастерки до 38**.\r\n 5) И наконец постепенно прокачивать артифактные и неартифактные побочные мастерки в равных пропорциях (например один день качать одно второй другое и т.д. **так, чтобы разница между ними была примерно 38 уровней**.\r\n\r\n**Для артифактного оружия эффективная прокачка выглядит так**: \r\n\r\n 1) Сначала нужно прокачать **артифактную мастерку до 51**.\r\n 2) Далее прокачать **побочные мастерки до 11**.\r\n 3) Затем нужно прокачать **артифактную мастерку до 62**.\r\n 4) Далее прокачать **побочные мастерки до 22**.\r\n 5) Затем нужно прокачать **артифактную мастерку до 73**.\r\n 6) Далее прокачать **побочные мастерки до 33**.\r\n 7) Затем нужно прокачать **артифактную мастерку до 84**.\r\n 8) Далее прокачать **побочные мастерки до 44**.\r\n 9) Затем нужно прокачать **артифактную мастерку до 95**.\r\n10) Далее прокачать **побочные мастерки до 55**.\r\n11) Докачать **артифактную мастерку до 100** и затем **докачивать побочные мастерки**.\r\n\r\n**Данные правила работают и для эффективного ре-спека, что может сильно помочь при распределении очков** только тут следует учитывать, что стоимость прокачки очками ре-спека зависит и от предмета (броня дешевле чем оружие и т.п.).\r\n\r\nЕсли у вас уже частично прокачена мастерка правила также можно использовать: например у вас прокачен артифакт на 80, а побочные ветки без прокачки, соответственно нужно сначала прокачать побочные ветки на 33 прежде чем продолжать прокачку артифакта\r\n\r\nПобочные мастерки разделены по 11 для удобства, т.к. 11 побочных дает столько же силы предмета (ip) как и 1 основная. Конечно прокачивать побочные по 1 было бы более эффективно, но нет особого смысла так заморачиваться.\r\n\r\nP.s. офф-хенды (факелы, щиты, сферы и т.п.) советую прокачивать за очки ре-спека, т.к. их требуется очень мало для этого.', 'Эффективная прокачка', 1, 2, '05498f22d092bbe9304a12b9d1a515a5'),
	(6, 1, '2018-09-30 06:44:06', '0000-00-00 00:00:00', '', 'В альбионе значения здоровья и маны полностью зависят от предметов, надетых на вас и значения IP (силы предмета) этих предметов (бонусы от еды в данном посте учитывать не будем).\r\nНо распределение этих показателей между предметами сильно разнится.\r\n\r\nОсновные принципы следующие:\r\nЗапасы маны и здоровья (хп) не зависят от типа предмета (ткань, латы или кожа) и имеют определенный коэффициент перемножаемый на силу предмета, что значит пропорции для разных видов брони одинаковые (шлем, нагрудник, сапоги), поэтому для сравнения достаточно взять любые вещи с одинаковой силой предмета. Регенерация маны тоже зависит от силы предмета, а также от типа нагрудника (ткань, латы или кожа).\r\n\r\nРассмотрим основные характеристики и значения при силе предмета 980 (т7 или т6.1 обычная вещь без прокачки):\r\n**Мана**:\r\n - **шлем** дает 68 маны и 1/c реген (**половину общего запаса и регенерации**);\r\n - **нагрудник** 34 маны и 0,51/c реген; (**четверть общего запаса и регенерации**)\r\n - **сапоги** 20 маны и 0,31/c реген; (**15% общего запаса и регенерации**)\r\n - **плащ** 14 маны и 0,2/с реген; (**10% общего запаса и регенерации**)\r\nОтсюда можно сделать вывод что для увеличения запасов маны и скорости регенерации маны в первую очередь следует качать шлем, а затем нагрудник, однако учитывая что нагрудник дает еще и другие характеристики, возможно стоит вкладывать очки как в шлем так и в нагрудник поровну. Если же запас маны вас не беспокоит, то можно равномерно распределять опыт среди всего обмундирования.\r\nСледует учесть, что **нагрудники разных типов имеют различные множетели регенерации**, например роба клерика дает 14% увеличения общей регенерации маны, а латы имеют от 0% до 4% бонуса. \r\n**Здоровье**:\r\n- **нагрудник** дает 385 хп (**половину общего запаса** (без учета оружия));\r\n - **шлем или сапоги** (имеют одинаковые значения) дают 193 хп (**четверть от запаса** (без учета оружия));\r\n Броня и магическая защита нагрудника тоже зависят от силы предмета, но в отличие от здоровья и маны (при прокачке на +300 увеличение может составить 50-60%) имеет слабый коэффициент роста (около 10-15% на +300 прокачки).\r\n\r\nВ случае с **здоровьем от оружия** можно выделить 4 типа оружия (аналогично при 980 ip):\r\n1) Не дает бонуса (оружие дальнего боя и убийц) \r\n2) Малый бонус (такие брузеры как топоры, мечи, копья, кровопуск) 89 хп.\r\n3) Средний бонус (шесты) 266 хп.\r\n4) Наибольший бонус (молоты, булавы) 354 хп.\r\nВ отличие от брони, оружие имеет малый прирост хп при прокачке: оружие с малым бонусом получает 15-20 хп за +300 прокачки, с средним 40-45, с большим 65-70.\r\n\r\nКорень (офф-хенд) дает бонус 354 хп на 980ip, но имеет огромный бонус при увеличении силы(при полной прокачке +300 практически в 2 раза больше хп).', 'Значения здоровья и маны и от чего они зависят', 1, 2, '506401651e38a83ab9bb4820d1219329'),
	(7, 1, '2018-10-02 16:30:49', '0000-00-00 00:00:00', '', 'Хочу попробовать фановый формат "15 секунд". У всех ешка на вепонах не должна превышать 15 секунд.\r\nДля ешек на 20 секунд обязательно использование **еды на КД.**\r\n\r\n**Танки **\r\n\r\nМолотки:   все т1 молотки плюс могильный. \r\nБулавы: только тяжелая \r\nПосохи: только монаха\r\n\r\n**Мили вепоны:**\r\n\r\nмечи: кларент, хг тесак \r\nтопоры: алебарда, большой топор в спектр арморе, падальщик\r\nкопья: одноручка обычная\r\nдагера: блудлетер\r\n\r\n**Ренж вепоны**\r\nарбалеты: легкий, тяжелый, плачущий \r\nлуки: длинный\r\n\r\n**Маг палки**\r\n\r\nфрост посох: большой морозный, одноручка\r\nфаер: большой огненный посох\r\n\r\n**Сапорты:**\r\n\r\nодноручная аркана обычная\r\nДемоник курса\r\n\r\n**хилы**\r\n\r\nбольшой священный\r\nдикий\r\nхг холик или друль\r\nпо хилам до конца пока непонятно, будем пробовать\r\n\r\nКонцепт предполагает врыв в противника. Для этого нужно больше шапок рыцаря, очищений и скиллов помогающих преодолевать контроль противника(например боты школяра).\r\n\r\nСостав пати стандартный, на 20 человек, 4 танка, 4 хила, 2 сапорта и 10дд.\r\nжелательно 5 мили и 5 ренж, но там как пойдет.\r\n\r\nНа начальном этапе мы будем использовать комбинацию треш рейда, звз рыбалки и 15 секундого формата.', 'Пати 15 секунд', 1, 2, '8dd36777f140780eea4efc5d824e66f9'),
	(8, 1, '2018-10-03 04:24:14', '0000-00-00 00:00:00', '', 'Мы открывает сезон ЗвЗ рыбалки.  Для этого каждому кто хочет попасть в рейд нужно сделать альта или предоставить готового. Мы расставим альтов по всем ключевым локациям и будем ждать появления любых двихуж. \r\n**\r\nКак сделать альта? **\r\n\r\nДля того, чтобы сделать альта не нужно покупать дорогой прем(более  3кк). Достаточно купить 3 книги с опытом, которые стоят в районе 100к каждая. \r\n\r\nВам лучше всего выучить кожанный армор с инвизом и любой вепон( за 3 книги к сожалению можно выучить только лук, меч или фаяр посох, если есть финансы, можете добавить еще пару книг и выучить кровопуск, самое лучшее оружие скаута.\r\n\r\n*Если у вас туго с финансами обратитесь к вашей гильдии, она поможет.*\r\n\r\nОсновная активность на тестовый период будет сосредоточена между красными и желтыми локами.  \r\n\r\nСкауты для звз рыбалки в базовой комплектации должны стоять в следующих локах:\r\n\r\n**Роял**\r\n\r\n1) Камлан\r\n2) Астолат, \r\n\r\n**Кумбрия**\r\n\r\n3) ББ\r\n4) Рибкейдж\r\n5) Сапвуд Глен\r\n6) Крейг Даб\r\n7) Грисдейл\r\n\r\n**Мерсия **\r\n\r\n8) Дарк РУт\r\n9) Хангри Маер\r\n10) Аркаг Чазм\r\n11) СтоунТоп\r\n12) ЦВ\r\n\r\nИтого 12 скаутов.\r\n\r\n**Как это будет работать. **\r\n\r\nМы собираемся и расставляем скаутов по локам и ждем, привязка нужна к желтым или красным. Если мы замечаем вкусные цели 20+, то выдвигаемся. Если мы видим каких-то качамб, то можем отправить мини отряд на убийство(10+). Остальные в это время находятся в городе.  ', 'ЗвЗ рыбалка', 1, 2, 'ae7c791393faadf16f39e68bf3ab11a3'),
	(9, 1, '2018-10-03 05:16:42', '0000-00-00 00:00:00', '', 'Рейд собранный для того, чтобы драться с любым противником и особенно количеством.\r\n\r\nТреш рейд не означает, того что берутся все подряд. Он просто говорит о том, что рейд скорее всего будет в один конец. \r\n\r\nСобрать эффективный треш рейд, даже сложнее чем обычный. \r\n\r\nУ вас должна быть хорошая или по-крайней мере адекватная композиция рейда.\r\nВы должны быть неплохо вкачены, чтобы иметь достойный ИП.\r\nВы должны использовать оверчардж.\r\n\r\n**Побеждать противника который лучше тебя одет в равных или меньших количествах, это хороший показатель сыгранности и скилла**\r\n\r\nЯ думаю дефолтно для треш рейда сейчас это:\r\n7+  - обычный шмот \r\n6+  - хг и реликтовые вещи\r\n\r\nЯ планирую первое время сосредоточиться именно на этом типе рейдов. \r\n\r\n', 'Треш рейд или суицид рейд', 1, 2, '41786ce5edb1da7630bdbeea62196c8c');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Дамп структуры для таблица albion.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.comments: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `article_id`, `user_id`, `date_create`, `comment`, `deleted`) VALUES
	(2, 1, 1, '2018-09-10 18:18:03', 'Крутая статья', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame
CREATE TABLE IF NOT EXISTS `fame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fame` int(11) NOT NULL DEFAULT '0',
  `fame_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timespent` int(11) DEFAULT NULL,
  `fame_get` int(11) DEFAULT NULL,
  `fame_per_hour` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `round` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame: ~59 rows (приблизительно)
/*!40000 ALTER TABLE `fame` DISABLE KEYS */;
INSERT INTO `fame` (`id`, `fame`, `fame_time`, `timespent`, `fame_get`, `fame_per_hour`, `user_id`, `round`) VALUES
	(1, 1000, '2018-09-07 08:11:06', 1536307866, 1000, 0, 1, 0),
	(2, 2000, '2018-09-07 08:11:13', 7, 1000, 514286, 1, 0),
	(3, 5000, '2018-09-07 08:47:29', 2176, 3000, 4963, 1, 0),
	(4, 10000, '2018-09-07 08:55:27', 478, 5000, 37657, 1, 0),
	(5, 10000, '2018-09-07 08:56:41', NULL, NULL, NULL, 1, 0),
	(6, 15000, '2018-09-07 08:56:54', NULL, NULL, NULL, 1, 0),
	(7, 20000, '2018-09-07 08:57:39', 45, 5000, 400000, 1, 0),
	(8, 150000, '2018-09-07 09:48:20', 3041, 130000, 153897, 1, 0),
	(9, 10000, '2018-09-07 19:30:40', 34940, -140000, -14425, 1, 0),
	(10, 12500, '2018-09-07 19:30:50', 10, 2500, 900000, 2, 0),
	(11, 13500, '2018-09-07 19:47:03', 983, 3500, 12818, 1, 0),
	(12, 14500, '2018-09-07 19:48:32', 89, 1000, 40449, 1, 0),
	(13, 0, '2018-09-14 15:57:06', 590914, -14500, -88, 1, 0),
	(14, 29129, '2018-09-14 17:22:24', 5118, 29129, 20489, 1, 0),
	(15, 0, '2018-09-15 08:24:18', 54114, -29129, -1938, 1, 0),
	(16, 106771, '2018-09-15 08:48:18', 1440, 106771, 266928, 2, 21),
	(17, 154000, '2018-09-15 08:59:26', 668, 47229, 254528, 2, 21),
	(18, 189644, '2018-09-15 09:06:34', 428, 35644, 299809, 2, 21),
	(19, 0, '2018-09-15 09:06:58', 24, -189644, -28446600, 1, 0),
	(20, 0, '2018-09-15 11:05:48', 7130, 0, 0, 1, 0),
	(21, 11164, '2018-09-15 11:20:17', 869, 11164, 46249, 1, 20),
	(22, 64114, '2018-09-15 11:35:54', 937, 52950, 203436, 1, 20),
	(23, 111398, '2018-09-15 11:45:18', 564, 47284, 301813, 1, 20),
	(28, 670000, '2018-09-16 11:27:56', 85358, 558602, 23559, 1, 20),
	(29, 680000, '2018-09-16 11:32:31', 275, 10000, 130909, 1, 21),
	(30, 685000, '2018-09-16 11:35:20', 169, 5000, 106509, 1, 21),
	(31, 690000, '2018-09-16 11:44:46', 566, 5000, 31802, 1, 21),
	(32, 250000, '2018-09-16 11:57:31', NULL, NULL, NULL, 1, 22),
	(33, 255000, '2018-09-16 11:57:44', 13, 5000, 1384615, 1, 22),
	(34, 258000, '2018-09-16 11:58:35', 51, 3000, 211765, 1, 22),
	(35, 350000, '2018-09-16 13:13:49', 4514, 92000, 73372, 1, 22),
	(37, 115000, '2018-09-16 13:47:27', NULL, NULL, NULL, 1, 23),
	(38, 120000, '2018-09-16 13:48:09', 42, 5000, 428571, 1, 23),
	(39, 120000, '2018-09-16 13:55:31', NULL, NULL, NULL, 1, 24),
	(40, 122000, '2018-09-16 13:55:42', 11, 2000, 654545, 1, 24),
	(41, 120000, '2018-09-16 13:56:05', NULL, NULL, NULL, 1, 25),
	(43, 270000, '2018-09-16 14:59:00', 9, 20000, 8000000, 1, 26),
	(44, 275000, '2018-09-16 15:01:23', 143, 5000, 125874, 1, 26),
	(45, 115000, '2018-09-16 15:47:49', NULL, NULL, NULL, 1, 30),
	(46, 116000, '2018-09-16 15:47:56', 7, 1000, 514286, 1, 30),
	(47, 116000, '2018-09-16 15:51:28', NULL, NULL, NULL, 1, 31),
	(50, 148000, '2018-09-16 15:51:59', 11, 18000, 5890909, 1, 31),
	(51, 113, '2018-09-16 16:03:08', NULL, NULL, NULL, 1, 32),
	(52, 1050, '2018-09-16 16:03:14', 6, 937, 562200, 1, 32),
	(53, 1065, '2018-09-16 16:03:24', 10, 15, 5400, 1, 32),
	(54, 10000, '2018-09-17 13:58:37', NULL, NULL, NULL, 1, 33),
	(55, 15000, '2018-09-17 13:59:10', 33, 5000, 545455, 1, 33),
	(56, 20000, '2018-09-17 13:59:30', 20, 5000, 900000, 1, 33),
	(57, 10000, '2018-09-17 11:43:35', NULL, NULL, NULL, 1, 34),
	(58, 12500, '2018-09-17 11:44:41', 66, 2500, 136364, 1, 34),
	(60, 13600, '2018-09-17 11:44:52', 11, 1100, 360000, 1, 34),
	(61, 2456, '2018-10-01 16:44:19', NULL, NULL, NULL, 1, 35),
	(62, 2544, '2018-10-01 16:59:21', 902, 88, 351, 1, 35),
	(63, 2602, '2018-10-01 17:15:52', 991, 58, 211, 1, 35),
	(64, 1000, '2018-10-03 06:33:52', NULL, NULL, NULL, 1, 36),
	(65, 1200, '2018-10-03 06:34:47', 55, 200, 13091, 1, 36),
	(66, 500000, '2018-10-03 10:19:38', NULL, NULL, NULL, 4, 1),
	(67, 17744744, '2018-10-03 10:20:41', NULL, NULL, NULL, 4, 2),
	(69, 0, '2018-10-03 23:11:04', NULL, NULL, NULL, 6, 2);
/*!40000 ALTER TABLE `fame` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame_round
CREATE TABLE IF NOT EXISTS `fame_round` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `round` int(11) NOT NULL DEFAULT '0',
  `fame_per_hour` int(11) NOT NULL DEFAULT '0',
  `fame_per_round` int(11) NOT NULL DEFAULT '0',
  `total_timespent` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame_round: ~19 rows (приблизительно)
/*!40000 ALTER TABLE `fame_round` DISABLE KEYS */;
INSERT INTO `fame_round` (`id`, `user_id`, `round`, `fame_per_hour`, `fame_per_round`, `total_timespent`, `date`) VALUES
	(3, 1, 22, 78637, 100000, 4578, '2018-09-16 13:24:48'),
	(6, 1, 23, 428571, 5000, 42, '2018-09-16 13:55:09'),
	(7, 1, 24, 654545, 2000, 11, '2018-09-16 13:55:52'),
	(8, 1, 25, 0, -120000, -1537106165, '2018-09-16 13:56:06'),
	(9, 1, 26, 592105, 25000, 152, '2018-09-16 15:01:40'),
	(10, 1, 27, 125874, 5000, 143, '2018-09-16 15:46:29'),
	(11, 1, 28, 125874, 5000, 143, '2018-09-16 15:47:40'),
	(12, 1, 29, 125874, 5000, 143, '2018-09-16 15:47:41'),
	(13, 1, 30, 514286, 1000, 7, '2018-09-16 15:48:00'),
	(14, 1, 31, 3716129, 32000, 31, '2018-09-16 15:52:06'),
	(15, 1, 32, 214200, 952, 16, '2018-09-16 16:03:25'),
	(16, 1, 33, 679245, 10000, 53, '2018-09-17 13:59:36'),
	(17, 1, 34, 168312, 3600, 77, '2018-09-17 11:44:56'),
	(18, 1, 35, 278, 146, 1893, '2018-10-01 17:15:54'),
	(19, 4, 1, 1, -500000, -1538576378, '2018-10-03 10:20:02'),
	(20, 4, 2, 42, -17744744, -1538576441, '2018-10-03 10:23:25'),
	(21, 5, 1, 0, 0, 0, '2018-10-03 11:45:08'),
	(22, 6, 1, 0, 0, 0, '2018-10-03 23:11:04'),
	(23, 1, 36, 13091, 200, 55, '2018-10-04 05:50:31');
/*!40000 ALTER TABLE `fame_round` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame_round_counter
CREATE TABLE IF NOT EXISTS `fame_round_counter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `round` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame_round_counter: ~26 rows (приблизительно)
/*!40000 ALTER TABLE `fame_round_counter` DISABLE KEYS */;
INSERT INTO `fame_round_counter` (`id`, `user_id`, `round`) VALUES
	(1, 1, 20),
	(2, 1, 21),
	(3, 1, 22),
	(6, 1, 23),
	(9, 1, 24),
	(10, 1, 25),
	(11, 1, 26),
	(12, 1, 27),
	(13, 1, 28),
	(14, 1, 29),
	(15, 1, 30),
	(16, 1, 31),
	(17, 1, 32),
	(18, 1, 33),
	(19, 1, 34),
	(20, 1, 35),
	(21, 1, 36),
	(22, 4, 1),
	(23, 4, 2),
	(24, 4, 3),
	(25, 5, 1),
	(26, 5, 2),
	(27, 6, 1),
	(28, 6, 2),
	(29, 7, 1),
	(30, 1, 37);
/*!40000 ALTER TABLE `fame_round_counter` ENABLE KEYS */;

-- Дамп структуры для таблица albion.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nickname` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `acc_lvl` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы albion.users: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `hashed_password`, `reg_date`, `nickname`, `last_name`, `deleted`, `acc_lvl`) VALUES
	(1, 'apxata@gmail.com', '$2y$10$E2arR9d7kS6rH64oCgE5deITM4n3pJ/s1Jus5/OkrGctRyAuD1Nhm', '2018-08-01 09:26:19', 'Apxat', '', 0, 10),
	(4, 'nikittsev.anton@gmail.com', '$2y$10$SioFt.ALRxHT/XGewnNHk.e6AuH2DEaF8yj8S7BRsf1GbMBAS6hxm', '2018-10-03 07:28:36', 'Frosty12', '', 0, 1),
	(5, 'mr_proka@mail.ru', '$2y$10$OVRI8TmyamIxwB0UfgMRC..jgeKcY7n4b9dWw36CZd9fCsoXi36ey', '2018-10-03 11:43:54', 'Karreegan', '', 0, 1),
	(6, 'antostarus@mail.ru', '$2y$10$IXYIrH7WA3Fk4EFEbSER9uc3f9X81VdEuKv6M9S250Rfki5Urtbai', '2018-10-03 23:08:20', 'Artos569', '', 0, 1),
	(7, 'alex-kucevol@mail.ru', '$2y$10$0OpIGPBYVNHmSQMZkk78R.0clLdXOlAs65vbzsHJ7WQKvoQnVmR2m', '2018-10-04 02:59:06', 'Ewrei', '', 0, 1),
	(8, 'dorji@yandex.ru', '$2y$10$tfaB.Sbj9Hy1wtsjut2cU.1LdpWon8OuiWdcSWjpdd9MvvKMGaAfO', '2018-10-04 05:52:59', 'Shyne', '', 0, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
