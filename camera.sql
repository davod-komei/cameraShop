-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 06:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camera`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`title`, `content`) VALUES
('درباره ما', 'درباره ما');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `catid`, `title`, `content`, `pic`, `created_at`) VALUES
(1, 0, ' نوردهی در عکاسی و عواملی موثر بر آن', '<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">هیستوگرام و سایر روش&zwnj;های گفته شده در این مقاله می&zwnj;توانند به تشخیص میزان نور در عکس شما کمک کنند، اما اساسا همه چیز به نوع عکس و آنچه می&zwnj;خواهید به دست آورید، بستگی دارد. همانند سایر جنبه&zwnj;های عکاسی، درنهایت این شما هستید که به&zwnj;عنوان یک عکاس تشخیص خواهید داد که آیا میزان نوردهی در عکس گرفته&zwnj;شده، مناسب است یا خیر.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<hr />\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">هر دوربین از سه عامل سرعت شاتر، دیافراگم و ایزو (ISO) برای تعیین میزان نوری که به سنسور می&zwnj;رسد، استفاده می&zwnj;کند. این سه عامل به منظور نوردهی، از نظر فنی با یکدیگر ترکیب می&zwnj;شوند. برای درک بیشتر موضوع و به منظور اینکه موضوع را به لحاظ آنچه در عمل اتفاق می&zwnj;افتد، کاملا متوجه شوید، این مثال را در نظر بگیرید. تصور کنید که نوردهی همان بارندگی باشد و سنسور نیز یک سطل آب. سه متغیری که در اینجا شما می&zwnj;توانید کنترل کنید عبارت&zwnj;اند از: قطر سطل که همان دیافراگم است، مدت&zwnj;زمانی که سطل را زیر باران قرار می&zwnj;دهید که مفهوم سرعت شاتر را می&zwnj;رساند و میزان آبی که می&zwnj;خواهید جمع&zwnj;آوری نمایید که میزان نور را معنا می&zwnj;کند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">تنها چیزی که در اینجا از کنترل شما خارج است، میزان و سرعت بارندگی و یا همان میزان نور موجود است. اگر آب به اندازه کافی جمع&zwnj;آوری نکنید، مشکلاتی خواهید داشت و از طرفی جمع&zwnj;آوری بیش&zwnj;ازحد آب نیز ایراداتی دارد که البته در این مثال شما می&zwnj;توانید مقداری از آب را از سطل خارج کنید اما پس از گرفتن عکس، دیگر نمی&zwnj;توان نور اضافی را از سنسور حذف کرد.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">در این مقاله از <strong>افرنگ</strong> قصد داریم در مورد نوردهی در عکاسی و عوامل ذکرشده در بالا که بر آن موثر هستند، اطلاعاتی را با شما در میان بگذاریم. به&zwnj;علاوه در مورد هیستوگرام نیز صحبت خواهیم کرد. پس در ادامه همراه ما باشید.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<strong><span style="font-size: 12pt;"><span style="color: #ff0000;">افرنگ دیجیتال</span>؛ فروش&nbsp;<a href="https://www.afrangdigital.com/" target="_blank" title="دوربین‌ عکاسی حرفه ای ">دوربین&zwnj; عکاسی حرفه ای </a> و <a href="https://www.afrangdigital.com/Products/2/126/دوربین-فیلمبرداری-حرفه-ای" target="_blank" title="دوربین فیلمبرداری حرفه ای ">دوربین فیلمبرداری حرفه ای </a></span></strong></p>\r\n<p>\r\n	<span style="font-size: 12pt;"><img alt="نور در عکاسی" height="533" src="https://www.afrangdigital.com/Uploads/Article/48.jpeg" style="display: block; margin-left: auto; margin-right: auto;" width="800" /></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><strong><span style="font-size: 14pt;">مثلث نوردهی در عکاسی</span></strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">دیافراگم، سرعت شاتر و ISO ستون&zwnj;های اصلی مثلث نوردهی هستند. اکثر <strong>دوربین&zwnj; حرفه ای عکاسی</strong> مدرن دارای نورسنج داخلی هستند که تنظیمات اتوماتیک را انجام می&zwnj;دهند و بدین ترتیب، دیگر نیازی به تنظیم دستی خود عکاسان نخواهد بود. البته در برخی موارد نیاز است که عکاسان، خود وارد عمل شوند و تنظیمات را آن&zwnj;چنان&zwnj;که موردنیاز است، انجام دهند. برای مثال برای فریز کردن یک بازیکن بسکتبال در هنگام پرش یا ایجاد یک پرتره که در آن سوژه، کمی نزدیک و همچنین بزرگ و برجسته است ولی پس&zwnj;زمینه بسیار نرم و آرام به نظر می&zwnj;رسد، به تنظیم دستی و البته کمی دانش بیشتر در زمینه عکاسی نیاز است.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><strong>مثل دوستان جدانشدنی</strong></span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">همان&zwnj;طور که بیان کردیم، سه عامل دیافراگم، سرعت شاتر و ایزو همانند سه ضلع یک مثلث هستند که میزان نور را مشخص می&zwnj;کنند. در مثلث نوردهی شما می&zwnj;توانید حتی با تغییر دو عامل از سه عامل، همان میزان نوردهی قبل را داشته باشید. برای مثال اگر شما نیازمند میزان نوری یکسان اما با دیافراگم کوچک&zwnj;تر هستید، به&zwnj;راحتی می&zwnj;توانید با افزایش سرعت شاتر، همان میزان نور را ایجاد نمایید و اگر می&zwnj;خواهید که سرعت شاتر نیز تغییر نکند، می&zwnj;توانید حساسیت ایزو را افزایش دهید. دیافراگم، ایزو و سرعت شاتر همانند سه دوست هستند که برای به دست آوردن نتایج موردنظر، از یکدیگر جدا نمی&zwnj;شوند.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size: 12pt;"><img alt="عکاسی حرفه ای" height="535" src="https://www.afrangdigital.com/Uploads/Article/46.jpg" style="display: block; margin-left: auto; margin-right: auto;" width="800" /></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 14pt;"><strong>چگونه میزان نوردهی عکس را تشخیص دهیم؟</strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">خبر خوب این است که سیستم&zwnj;های اندازه&zwnj;گیری تعبیه&zwnj;شده در دوربین&zwnj;های امروزی در ارائه نوردهی دقیق در بیش از 90 درصد مواقع، فوق&zwnj;العاده عمل می&zwnj;کنند. البته اگر میزان نوردهی را همان چیزی که با چشم غیرمسلح می&zwnj;بینیم، تعریف کنیم. از طرفی در دوربین&zwnj;های دیجیتال معمولا دامنه روشنایی قابل ضبط در سنسور، نسبت به آنچه در طبیعت با آن مواجه می&zwnj;شوید، بسیار محدودتر است. بیشتر <strong>دوربین&zwnj; دیجیتال عکاسی</strong> معمولا روی برجستگی&zwnj;ها تمرکز می&zwnj;کنند و آن&zwnj;ها را برجسته&zwnj;تر نشان می&zwnj;دهند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">بااین&zwnj;همه، بهترین و ساده&zwnj;ترین راه برای اطمینان از میزان نوردهی، ارزیابی عکس بر روی LCD و قضاوت ذهنی است. LCD های امروزی معمولا نمایشی دقیق از تصویر گرفته&zwnj;شده را به شما ارائه می&zwnj;دهند و بدین ترتیب شما قادر خواهید بود که در مورد میزان نوردهی عکس قضاوت صحیحی داشته باشید. بااین&zwnj;حال اگر بازهم به دنبال روش دقیق&zwnj;تری برای بررسی میزان نوردهی عکس خود هستید، پس یعنی شما می&zwnj;خواهید که به هیستوگرام دوربین خود سری بزنید.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<strong><span style="font-size: 12pt;"><span style="color: #ff0000;">افرنگ دیجیتال</span>؛ <a href="https://www.afrangdigital.com/Useds/-1" target="_blank" title="فروش دوربین دست دوم">فروش دوربین دست دوم</a> و <a href="https://www.afrangdigital.com/Products/1/6/لوازم-و-تجهیزات-نورپردازی" target="_blank" title="لوازم نورپردازی">لوازم نورپردازی</a></span></strong></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 14pt;"><strong>هیستوگرام چیست و چگونه از آن استفاده می&zwnj;شود؟</strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">هیستوگرام نقشه نوردهی عکس شماست که خواندن و بررسی آن بسیار آسان است. هر هیستوگرام دارای سه ناحیه اصلی است. سمت چپ، قسمت میانی و سمت راست. تمام اطلاعاتی که در سایه&zwnj;ها یا مناطق تاریک تصویر شما ثبت می&zwnj;شوند، در سمت چپ هیستوگرام قرار می&lrm;گیرند. همچنین قسمت&zwnj;هایی که شامل نقاط برجسته و یا ناحیه&zwnj;های سفید خالص هستند در سمت راست قرار دارند. در قسمت وسط نیز طیف&zwnj;های میانی ثبت می&zwnj;شوند. هیستوگرام ایدئال، هیستوگرامی است که دارای دامنه&zwnj;های طولانی است و به شکل تپه خمیده&zwnj;ای به نظر می&zwnj;رسد که از چپ به راست امتداد یافته است. هرچند هیستوگرامی به این شکل، به&zwnj;ندرت یافت می&zwnj;شود حتی برای عکس&zwnj;هایی که میزان نوردهی در آن&lrm;ها با دقت بالا تعیین شده است.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size: 12pt;"><img alt="هیستوگرام در عکاسی" height="442" src="https://www.afrangdigital.com/Uploads/Article/49.jpg" style="display: block; margin-left: auto; margin-right: auto;" width="800" /></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">در هیستوگرام&zwnj;ها معمولا دو مسئله، نشانگر وجود ایراد در میزان نوردهی است. یکی اینکه هیستوگرام به سمت چپ یا تاریک میل پیدا کرده باشد و یا اینکه نقاط سمت راست بسیار برجسته باشند. هیستوگرام&zwnj;هایی که به سمت چپ متمایل هستند به نوردهی بیشتری نیاز دارند که این موضوع می&zwnj;تواند به&zwnj;صورت دستی و یا با استفاده از تنظیم اتوماتیک انجام شود. نرم&zwnj;افزارهای ویرایش نیز می&zwnj;توانند از سایه&zwnj;های موجود در هیستوگرام، اطلاعات را به دست آورند و با در نظر گرفتن آن&zwnj;ها، مناطق موردنیاز را بازیابی کنند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">به&zwnj;طورمعمول زمانی که تصویر شما بیش&zwnj;ازحد در معرض نور قرار گرفته و هیستوگرام جهش بزرگی به سمت راست داشته است، به این معناست که قسمت&zwnj;های برجسته را از دست خواهید داد و آنچه برای شما باقی می&zwnj;ماند، نور سفید خالص در بسیاری از قسمت&zwnj;هاست. به&zwnj;طوری&zwnj;که حتی نرم&zwnj;افزارهای حرفه&zwnj;ای ویرایش نیز برای بازیابی نور و بازگرداندن تصویر به یک میزان نوردهی مناسب، با مشکل روبرو می&zwnj;شوند. در هنگام عکسبرداری، شما می&zwnj;توانید با کوچک کردن دیافراگم یا افزایش سرعت شاتر از جهش هیستوگرام به سمت راست جلوگیری نمایید. دوربین&zwnj;های دیجیتال امروزی از دامنه دینامیکی بالاتری نسبت به دوربین&zwnj;های قدیمی برخوردار هستند. بااین&zwnj;وجود، هنگام بازیابی موارد برجسته هنوز محدودیت&zwnj;هایی در این دوربین&zwnj;ها وجود دارد.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">در برخی مواقع توصیه می&zwnj;شود که از عکس&zwnj; برداری با فرمت&zwnj;های RAW یا TIF استفاده کنید. اگر می&zwnj;خواهید فایل&lrm;های RAW را به اشتراک بگذارید و یا چاپ کنید، می&zwnj;توانید از برنامه&zwnj;هایی مانند CaptureOnePro8 یا Lightroom6 استفاده نمایید.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">هیستوگرام و سایر روش&zwnj;ها می&zwnj;توانند به تشخیص میزان نور در عکس شما کمک کنند، اما اساسا همه چیز به نوع عکس و آنچه می&zwnj;خواهید به دست آورید، بستگی دارد. همانند سایر جنبه&zwnj;های عکاسی، درنهایت این شما هستید که به&zwnj;عنوان یک عکاس تشخیص خواهید داد که آیا میزان نوردهی در عکس گرفته&zwnj;شده، مناسب است یا خیر. یک عکاس حرفه&zwnj;ای با توجه به تجربیاتی که به دست آورده است و آنچه از هر عکس می&zwnj;خواهد، می&zwnj;تواند بهتر از هیستوگرام یا هر روش دیگر، در مورد یک عکس نظر دهد.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1724238443_1.jpg', 1724238443),
(2, 0, ' دوربین بدون آینه چیست؟', '<div class="entry-excerpt news-summ">\r\n	<p style="text-align: justify;">\r\n		<span style="font-size: 12pt;">درحالیکه یک&nbsp;<span style="color: #ff0000;"><strong><span style="color: #ff0000;">دوربین DSLR</span></strong></span> از مکانیزم آینه ای برای انعکاس نور به منظره یاب نوری و یا عبور مستقیم نور به سمت سنسور دوربین استفاده می&zwnj;کند، یک&nbsp;<span style="color: #ff0000;"><strong><span style="color: #ff0000;">دوربین بدون آینه</span></strong></span> کاملا فاقد چنین مکانیزمی است؛ (از این رو نام آن) به این معناست که نوری که از لنز عبور میکند به سنسور تصویر می&zwnj;رسد.</span></p>\r\n</div>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">از آنجایی که نور بر منظره یاب نوری (OVF) منعکس نمی&zwnj;شود، دوربین های بدون آینه معمولا به منظره یاب های الکترونیکی (EVF) و ال سی دی ها متکی هستند و اساسا آنچه که حسگر تصویر میبیند را پخش می&zwnj;کنند. دوربین های بدون آینه بخاطر عدم وجود مکانیزم آینه ای و منظره یاب نوری، در مقایسه با دوربین های DSLR، کم حجم تر، سبک تر و ساده تر ساخته می&zwnj;شوند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">تصویر زیر تفاوت بین دوربین های بدون آینه و DSLR را نشان می&zwnj;دهد:</span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size: 12pt;"><img alt="تفاوت دوربین بدون آینه و dslr" height="444" src="https://www.afrangdigital.com/Uploads/Article/95.jpg" width="703" /></span></p>\r\n<ul style="text-align: justify;">\r\n	<li>\r\n		<span style="font-size: 12pt;">لنز</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">آینه بازتاب دهنده نور</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">شاتر</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">حسگر تصویر</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">صفحه نمایش فوکوس</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">لنز هدایت کننده نور</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">شیشه 5 بعدی</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">منظره یاب نوری</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">منظره یاب الکترونیکی</span></li>\r\n</ul>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">همانطور که می&zwnj;بینید، در مقایسه با دوربین های بدون آینه، یک دوربین DSLR از اجزای داخلی بیشتری برخوردار است. بجز مکانیسم پیچیده آینه ای، یک صفحه نمایش فوکوس، یک لنز هدایت کننده نور، شیشه و آینه 5 ضلعی(منشور) و سایر قطعات مثل یک آینه ثانویه و سنسور فوکوس خودکار تشخیصی هم در دوربین های DSLR وجود دارند.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="font-size: 12pt;"><strong>جهت مشاهده بهترین</strong> <span style="color: #ff0000;"><strong><a href="https://www.afrangdigital.com/Products/1/4/لنز-دوربین-عکاسی" style="color: #ff0000;" target="_blank" title="لنز دوربین عکاسی">قیمت لنز دوربین عکاسی</a></strong></span><strong>،</strong>&nbsp;<span style="color: #ff0000;"><strong><a href="https://www.afrangdigital.com/Products/2/130/فلاش-دوربین" style="color: #ff0000;" target="_blank" title="فلاش دوربین">قیمت فلاش دوربین</a></strong></span> <strong>و</strong>&nbsp;<span style="color: #ff0000;"><strong><a href="https://www.afrangdigital.com/Products/1/5/لوازم-جانبی-دوربین-" style="color: #ff0000;" target="_blank" title="لوازم جانبی دوربین">خرید لوازم جانبی دوربین</a></strong></span> <strong>کلیک کنید.</strong></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 14pt;"><strong>دوربین های بدون آینه چطور کار می&zwnj;کنند؟</strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">دوربین های بدون آینه از نظر مکانیکی بسیار ساده تر هستند. نور از لنزها عبور می&zwnj;کند(1#) و مستقیما وارد حسگر تصویر می&zwnj;شود(4#) و منظره یاب الکترونیکی که حسگر تصویر را بازمی&zwnj;گرداند جایگزین منظره یاب نوری می&zwnj;شود (9#). در حالت عادی شاتر مکانیکی دوربین (3#) باز می&zwnj;ماند و معمولا فقط در پایان نوردهی بکار می&zwnj;رود. با توجه به عدم وجود آینه و شیشه چند بعدی، همانطور که در تصویر بالا قابل مشاهده است، فاصله لبه (فاصله بین پایه لنز و سنسور تصویر) در دوربین های بدون آینه به میزان چشمگیری کاهش می&zwnj;یابد. به همین جهت بیشتر دوربین های بدون آینه نسبت به دوربین های DSLR بدنه باریک تر و سبک تری دارند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">دوربین های بدون آینه مزایای زیادی در مقایسه با دوربین های DSLR دارند. جدای از اینکه وزن سبک تری دارند، استفاده از منظره یاب الکترونیک در این دوربین ها مزایای زیادی برای عکاسان بهمراه دارد. از آنجاییکه همه چیز مستقیما از حسگر تصویر کپی می&zwnj;شود، تنظیمات دوربین مثل تعادل رنگ سفید، خلوص رنگ و وضوح را می&zwnj;توان مستقیما از طریق منظره یاب مشاهده کرد و اطلاعات اضافی مثل هیستوگرام زنده را میتوان در منظره یاب قرار داد و این امکان به عکاسان اجازه می&zwnj;دهد تا ببینند دقیقا از چه چیزی میخواهند عکس بگیرند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">وقتیکه این امکانات با ویژگی تشخیص سریع کنتراست یا سیستم تشخیص فازی ترکیب می&zwnj;شوند در هر بار عکس گرفتن میتوان از امکان زوم روی یک سوژه برای تشخیص مقدار زوم، استفاده از بالاترین زوم، تشخیص چهره و سایر ویژگی های قدرتمند برای اطمینان از اعمال فوکوس دقیق&nbsp; استفاده کرد. زمانیکه عکاسی در نور روز انجام می&zwnj;شود میتوان بجای استفاده از LCD پشت دوربین، از منظره یاب الکترونیکی برای بازبینی تصاویر استفاده کرد.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">درعین حال دوربین های بدون آینه دارای معایبی هم هستند. <strong>اول </strong>از همه اینکه منظره یاب الکترونیکی تنها زمانی فعال می&zwnj;شود که دوربین روشن بوده و برق به حسگر تصویر برسد که این مساله میتواند تاثیر قابل توجهی بر عمر مفید باتری دوربین بگذارد. <strong>دوم </strong>اینکه منظره یاب های الکترونیک ممکن است دارای تاخیر قابل توجه، تاریکی و کنتراست بالایی باشند که استفده از آن را برای برخی از عکاسان سخت میکند. وقتی صحبت از فوکوس خودکار می&zwnj;شود، اگرچه آخرین مدل های دوربین های بدون آینه می&zwnj;توانند بسیار سریع و دقیق باشند اما هنوز هم در هنگام عکاسی سریع بویژه در شرایط کم نور عملکرد خوبی ندارند .</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1724238515_2.jpg', 1724238515),
(3, 0, ' دوربین DSLR (SLR خودکار) چیست؟', '<div class="entry-excerpt news-summ">\r\n	<p style="text-align: justify;">\r\n		<span style="font-size: 12pt;">DSLR مخفف عبارت (رفلکس تک لنزی دیجیتال) است. به زبان ساده DSLR یک دوربین دیجیتال است که از یک مکانیزم آینه ای برای بازتاب نور از لنز دوربین به منظره یاب نوری (یک چشمی در پشت دوربین که عکاس از طریق آن نگاه می&zwnj;کند که چه عکسی میگیرد) استفاده می&zwnj;کند یا با خارج کردن آینه از مسیر به نور اجازه عبور از سنسور تصویر (که عکس را می&zwnj;گیرد) را می&zwnj;دهد.</span></p>\r\n</div>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">اگرچه دوربین&lrm;های رفلکس تک لنزی مختلفی در شکل&zwnj;ها و اندازه&zwnj;های مختلفی از قرن 19 بعنوان ابزار ظبط فیلم در دسترس بوده است اما اولین SLR دیجیتال با سنسور عکس در سال 1991 ظاهر شد. در مقایسه با دوربین&zwnj;هایی که سرعت شاتر و دیافراگم را به طور اتوماتیک تنظیم می&zwnj;شوند و دوربین&zwnj;های تلفن&zwnj;های همراه،&nbsp;<span style="color: #ff0000;"><strong><span style="color: #ff0000;">دوربین&zwnj; DSLR</span></strong></span> معمولا از لنزهای قابل تعویض استفاده می&zwnj;کنند.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><span style="font-size: 14pt;"><strong>دوربین های </strong><strong>DSLR</strong></span><strong><span style="font-size: 14pt;"> از چه چیزهایی تشکیل شده اند</span></strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">به تصویر زیر که مقطعی از لنز SLR است نگاهی بیندازید (تصویر اقتباسی از ویکی پدیا):</span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size: 12pt;"><img alt="دوربین dslr" height="320" src="https://www.afrangdigital.com/Uploads/Article/93.jpg" width="666" /></span></p>\r\n<ul style="text-align: justify;">\r\n	<li>\r\n		<span style="font-size: 12pt;">لنز</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">آینه بازتاب دهنده</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">شاتر</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">سنسور عکس</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">صفحه فوکوس</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">لنز هدایت کننده نور</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">شیشه 5 ضلعی</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">چشمی / منظره یاب</span></li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="color: #000000;"><strong><span style="font-size: 12pt;">برای&nbsp;<span style="color: #ff0000;"><a href="https://www.afrangdigital.com/" style="color: #ff0000;" target="_blank" title="دوربین عکاسی حرفه ای">خرید دوربین عکاسی حرفه ای</a></span> و&nbsp;<span style="color: #ff0000;"><a href="https://www.afrangdigital.com/Products/2/126/دوربین-فیلمبرداری-حرفه-ای" style="color: #ff0000;" target="_blank" title="دوربین فیلمبرداری حرفه ای">خرید دوربین فیلمبرداری حرفه ای</a></span> کلیک کنید</span></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<span style="font-size: 14pt;"><strong>دوربین های </strong><strong>DSLR</strong><strong> چطور کار می&zwnj;کنند </strong></span></h2>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">وقتی از پشت دوربین و از طریق منظره یاب / چشمی دوربین&zwnj;های DSLR نگاه می&zwnj;کنید، هرآنچه که می&zwnj;بینید از لنزی که به دوربین متصل شده است، عبور می&zwnj;کند یعنی شما می&zwnj;توانید دقیقا ببینید که از چه چیزی می&zwnj;خواهید عکس بگیرید. نور از محیطی که می&zwnj;خواهید از آن عکس بگیرید عبور کرده و از طریق لنز وارد آینه بازتاب دهنده (2#) که با زاویه 45 درجه داخل محفظه دوربین قرار گرفته است، می&zwnj;شود و سپس بصورت عمودی به یک عامل نوری بنام pentaprism (شیشه 5 ضلعی) فرستاده می&zwnj;شود (7#). شیشه 5 ضلعی نور عمودی را مجددا هدایت کرده و بوسیله دو آینه مجزای دیگر به شکل افقی وارد منظره یاب میکند(8#).</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">وقتیکه عکس می&zwnj;گیرید، آینه بازتاب دهنده (2#) به سمت بالا می&zwnj;چرخد و مسیر عمودی را مسدود می&zwnj;کند و اجازه عبور مستقیم نور را می&zwnj;دهد. سپس شاتر (3#) باز می&zwnj;شود و نور به سنسور عکس میرسد (4#). شاتر(3#) تا زمانیکه سنسور عکس (4#) برای ثبت تصویر لازم باشد، باز می&zwnj;ماند و سپس شاتر(3#) بسته می&zwnj;شود و آینه بازتاب دهنده نور(2#) به زاویه 45 درجه برمی&zwnj;گردد تا تغییر جهت نور به منظره یاب ادامه پیدا کند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">مشخصا این پروسه در اینجا متوقف نمی&zwnj;شود و در مرحله بعد پردازش تصویر پیچیده زیادی داخل دوربین انجام می&zwnj;شود. پردازنده دوربین اطلاعات را از سنسور تصویر دریافت می&zwnj;کند، آن را به فرمت مناسب تبدیل می&zwnj;کند و آن را روی کارت حافظه ثبت می&zwnj;کند. تمام این فرآیند در مدت زمان بسیار کوتاهی انجام می&zwnj;شود و برخی از دوربین&zwnj;های DSLR حرفه ای می&zwnj;توانند بیش از 11 بار در ثانیه این کار را انجام دهند.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">آنچه در بالا گفته شد، توضیح بسیار ساده ای از توضیح نحوه عملکرد دوربین&zwnj;های DSLR است.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1724238566_3.jpg', 1724238566),
(4, 0, ' چگونه تنظیمات دوربین DSLR را بر روی حالت دستی قرار دهیم؟', '<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">استفاده از دوربین DSLR برای اولین بار بسیار دشوار است و اگر در زمینه عکاسی آموزش ندیده باشید، می&zwnj;تواند بسیار پیچیده&zwnj;تر و طاقت&zwnj;فرساتر نیز به نظر برسد. اکثر مبتدیان برای تمرین مهارت&zwnj;های عکاسی خود از حالت خودکار شروع می&zwnj;کنند؛ این که چطور تنظیمات دوربین DSLR را بر روی حالت دستی قرار دهیم را باهم در ادامه بحث می&zwnj;کنیم.</span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">همان&zwnj;طور که می&zwnj;دانید، اگر بخواهید مانند یک عکاس حرفه&zwnj;ای عکس&zwnj;های شگفت&zwnj;انگیزی را ثبت کنید باید با استفاده از حالت دستی <strong>دوربین عکاسی</strong> و فیلمبرداری نیز کنار بیایید. قبل از هر چیزی، این را به یاد داشته باشید که هیچ فرمول جادویی در مورد تنظیمات دستی وجود ندارد. بلکه بسته به اینکه از چه چیزی عکس می&zwnj;گیرید و با چه شرایطی کار می&zwnj;کنید، مجبور به تغییر تنظیمات هستید.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h2 style="text-align: justify;">\r\n	<span style="font-size: 14pt;"><strong>نحوه قرار دادن تنظیمات دوربین </strong><strong>DSLR</strong><strong> بر روی حالت دستی</strong></span></h2>\r\n<ol style="text-align: justify;">\r\n	<li>\r\n		<span style="font-size: 12pt;">صفحه چرخان مدرج روی دوربین را روی حالت دستی (M) قرار دهید.</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">فرمت تصویر موردنظر خود (RAW، JPEG و...) را انتخاب کنید.</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">دوربین خود را به سمت سوژه موردنظر هدایت کنید تا شرایط نوری آن را ارزیابی کند.</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">تراز سفیدی یا وایت بالانس (White balance) را در منوی دوربین به رنگ دلخواه خود تنظیم کنید.</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">تنظیمات اصلی عکس&zwnj;برداری دستی را تنظیم کنید: دیافراگم، سرعت شاتر و ISO.</span></li>\r\n	<li>\r\n		<span style="font-size: 12pt;">عکس بگیرید، سپس تنظیمات را تغییر دهید تا به نور دلخواه برسید و دوباره عکس بگیرید.</span></li>\r\n</ol>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">اکنون بیایید درباره هر یک از این مراحل بیشتر صحبت کنیم. هنگام جابجایی به حالت دستی، کافی است صفحه چرخان مدرج روی <strong>دوربین DSLR</strong> را بچرخانید و مطمئن شوید که نشانگر و نماد M در یک راستا قرار دارند.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size: 12pt;"><img alt="دوربین عکاسی حرفه ای" height="534" src="https://www.afrangdigital.com/Uploads/Article/56.jpg" style="display: block; margin-left: auto; margin-right: auto;" width="800" /></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><strong>انتخاب فرمت تصویر</strong></span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">در مرحله بعد، فرمت تصویر موردنظر خود را انتخاب کنید. اگر قصد پردازش (Post Processing) تصاویر ثبت&zwnj;شده را ندارید، فرمت JPEG کافی است. بااین&zwnj;حال، معمولاً عکاسان فرمت RAW که حداکثر جزئیات و اطلاعات رنگی تصویر را حفظ می&zwnj;کند را به سایر فرمت&zwnj;ها ترجیح می&zwnj;دهند. فرمت&zwnj;های دیگری نیز برای تصاویر وجود دارند، اما JPEG و RAW بیشترین کاربرد را دارند. البته اینکه از چه فرمتی استفاده کنید کاملاً به سوژه عکاسی شما، میزان نیاز سوژه به جزئیات و اطلاعات تصویری و فضای ذخیره&zwnj;سازی کارت حافظه دوربین شما بستگی دارد.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><strong>تنظیم وایت بالانس (</strong><strong>White balance</strong><strong>)</strong></span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">اکنون شما تقریباً آماده عکس&zwnj;برداری هستید. مرحله بعدی تنظیم وایت بالانس یا تراز سفیدی است. با این کار می&zwnj;توانید رنگ تصاویر خود را در نورپردازی فعلی کنترل کنید. با استفاده از وایت بالانس مناسب، هر چیزی سفیدی که در تصویر وجود داشته باشد کاملاً سفید می&zwnj;شود. به&zwnj;این&zwnj;ترتیب، سایر رنگ&zwnj;های موجود در تصویر نیز دقیق&zwnj;تر (پررنگ&zwnj;تر) می&zwnj;شوند (نسبت به نوری که تصویر در آن ثبت&zwnj;شده است). هر دوربین، تعدادی تنظیمات وایت بالانس مشخص و از پیش تعیین&zwnj;شده دارد، اما ایجاد تغییرات و به&zwnj;اصطلاح، سفارشی کردن تنظیمات هزینه&zwnj;ای با خود&nbsp; به همراه دارد.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;"><strong>تنظیم دستی دیافراگم، سرعت شاتر و </strong><strong>ISO</strong></span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">حالا به پیچیده&zwnj;ترین قسمت کار می&zwnj;رسیم. ازآنجاکه اکنون در حالت دستی قرار دارید، باید سه مورد از تنظیمات مهم دوربین (تنظیم دستی دیافراگم، سرعت شاتر و ISO) را به&zwnj;صورت دستی تنظیم کنید تا از قرار گرفتن در معرض نور دلخواه اطمینان حاصل شود.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size: 12pt;"><img alt="دوربین عکاسی دیجیتال" height="534" src="https://www.afrangdigital.com/Uploads/Article/55.jpg" style="display: block; margin-left: auto; margin-right: auto;" width="800" /></span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<strong><span style="font-size: 12pt;">دیافراگم</span></strong></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">دیافراگم درواقع اندازه دهانه لنز است و تنظیم دیافراگم تعیین می&zwnj;کند که این دهانه چقدر کوچک یا بزرگ باشد. به&zwnj;این&zwnj;ترتیب، با تنظیم اندازه فضای درون تصویر و میزان نوری که از <strong>لنز دوربین</strong> وارد می&zwnj;شود، بر تصویر ثبت&zwnj;شده شما تأثیر می&zwnj;گذارد. دیافراگم با مقادیر عددی به نام f-stop اندازه&zwnj;گیری می&zwnj;شود. هرچه عدد کوچک&zwnj;تر باشد، دهانه لنز بزرگ&zwnj;تر است و بالعکس.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;">سرعت شاتر (Shutter Speed)</span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">سرعت شاتر دوربین درواقع مدت&zwnj;زمان باز بودن شاتر و قرار گرفتن سنسور دوربین در معرض نور است. از سرعت شاتر زیاد (Fast shutter speed) به&zwnj;طورمعمول برای ثابت کردن حرکات سوژه متحرک استفاده می&zwnj;شود؛ درحالی&zwnj;که از سرعت شاتر پایین (Slow shutter speed) برای ایجاد تاری حرکت یا سوژه متحرک بهره می&zwnj;گیرند. البته مورد دوم برای عکاسی در شب یا شرایط کم&zwnj;نور نیز بسیار مناسب است.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<h3 style="text-align: justify;">\r\n	<span style="font-size: 12pt;">ایزو (ISO)</span></h3>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">ایزو یا ISO درواقع تنظیماتی است که موجب روشن&zwnj;تر یا تیره&zwnj;تر شدن عکس می&zwnj;شود و میزان حساسیت سنسور به نور ورودی لنز را مشخص می&zwnj;کند. پایین بودن ISO به معنای حساسیت سنسور دوربین در برابر نور است و به شما این امکان را می&zwnj;دهد که در شرایط کم&zwnj;نور و بدون نیاز به استفاده از <strong>فلاش دوربین</strong>، تصاویر واضح&zwnj;تری را ثبت کنید. یکی از توصیه&zwnj;های کاربردی عکاسان این است که در شرایطی که نور در حد مناسب یا نسبتاً خوبی قرار دارد، به ISO پایین&zwnj;تر (یا Base ISO) پایبند باشید.</span></p>\r\n<p style="text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size: 12pt;">این سه تنظیمات باهم، نوردهی عکس را تعیین می&zwnj;کنند. همه آن&zwnj;ها را می&zwnj;توان از طریق صفحه&zwnj;نمایش LCD یا با استفاده از دکمه&zwnj;های میانبر یا صفحه چرخان مدرج روی دوربین تنظیم کرد. مراحل دقیق تنظیم و تغییر هر یک از این سه مورد بسته به مدل دوربین شما متفاوت است. بنابراین، همیشه بهتر است دفترچه راهنمای دوربین خود را بخوانید تا بفهمید چگونه تنظیمات هر یک را به&zwnj;درستی انجام دهید.</span></p>\r\n<p>\r\n	<span style="font-size: 12pt;"><strong>برای خرید انواع دوربین&zwnj;های حرفه&zwnj;ای عکاسی و فیلمبرداری و همچنین لوازم جانبی دوربین و لوازم نورپردازی با کارشناسان ما در افرنگ دیجیتال تماس بگیرید.</strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1724238650_4.jpg', 1724238650);

-- --------------------------------------------------------

--
-- Table structure for table `battery`
--

CREATE TABLE `battery` (
  `battid` int(11) NOT NULL,
  `battery_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `battery`
--

INSERT INTO `battery` (`battid`, `battery_name`) VALUES
(1, 'لیتیوم-یونی'),
(2, ' نیکل-متال هیدرید'),
(3, 'باتری قلمی'),
(4, 'باتری کتابی'),
(5, 'باتری یکبار مصرف');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `brand_name`, `pic`) VALUES
(1, 'کانن', '1724174418_Untitled-1.webp'),
(2, 'نیکون', '1724174431_NIKON.webp'),
(3, 'سونی', '1724174495_SONY.webp'),
(4, 'فوجی', '1724174514_fuji.webp'),
(5, 'پاناسونیک', '1724240371_pana.webp'),
(6, 'گوپرو', '1724240395_GOPRO.webp'),
(7, 'دی جی آی', '1724240413_dji.webp'),
(8, 'سیگما', '1724240430_sigma.webp'),
(9, 'سند دیسک', '1724240449_sandisk.webp'),
(10, 'تامرون', '1724240470_tamron.webp'),
(11, 'بویا', '1724240517_BOYA-1.webp'),
(12, 'بنرو', '1724240533_BENRO-1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CID` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CID`, `cat_name`, `pic`) VALUES
(1, 'دوربین عکاسی', '1724171055_5.jpg'),
(2, 'دوربین فیلمبرداری', '1724171070_2.jpg'),
(3, 'تجهیزات نوری', '1724171088_3.jpg'),
(4, 'باتری و شارژر', '1724171117_1.jpg'),
(5, 'تجهیزات چاپ', '1724171135_6.jpg'),
(6, 'لوازم جانبی', '1724171146_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `proid` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci,
  `comment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_persian_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `content` text COLLATE utf8_persian_ci,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `tel`, `mobile`, `email`, `address`, `whatsapp`, `instagram`, `telegram`) VALUES
(1, '09361954154', '09361954154', 'davodkomeijani@gmail.com', 'قم', 'whatsapp', 'instagram', 'telegram');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `update_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `productid`, `price`, `count`, `status`, `order_date`, `update_date`) VALUES
(6, 1, 1, 49200000, 1, 1, 1724185455, 1724186592),
(7, 1, 4, 139990000, 2, 1, 1724241753, 1724241898);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `zoom` varchar(255) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `diaphragm` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sensor` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `battery` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `catid`, `brandid`, `title`, `year`, `count`, `zoom`, `resolution`, `weight`, `diaphragm`, `size`, `sensor`, `price`, `discount`, `battery`, `color`, `images`, `description`, `status`, `sell`, `created_at`) VALUES
(1, 1, 1, 'دوربین بدون آینه کانن Canon EOS R10 kit 18-45mm Mirrorless Camera', 2024, 8, '16', '6000 × 4000', 382, 'بسته ترین دیافراگم : f/32\r\nحداکثر بزرگنمایی : 0.16x\r\nرزولوشن تصویربرداری : 4K Full HD\r\n', '122x88x83 میلی‌متر (بدنه)\r\n69×44 میلی‌متر (لنز)', 1, 49200000, 0, 1, 'مشکی', '17241778131.webp,17241778132.webp,17241778133.webp,17241778134.webp,17241778135.webp,17241778136.webp,17241778137.webp,17241778138.webp', '    گارانتی 36 ماهه طلایی نورنگار\r\n    سنسور ۲۴.۲ مگاپیکسلی APS-C CMOS\r\n    دارای 651 نقطه فوکوس\r\n    فیلم‌برداری 4K60  10-Bit، HDR PQ\r\n    منظره‌یاب الکترونیک ۲.۳۶ میلیون نقطه‌ای\r\n    صفحه نمایش لمسی با زاویه متغیر\r\n    کفشک چند منظوره، بلوتوث و وای-فای\r\n    سیستم تثبیت کننده تصویر Dual Pixel CMOS AF II\r\n    فاصله کانونی 18-45 میلی متر', 1, 1, 1724177813),
(2, 1, 1, 'دوربین عکاسی Canon IXUS 285 HS', 2016, 4, '12', '5184×3888', 147, 'محدوده دیافراگم : f/3.6 -f/7.0\r\nنوع صفحه نمایش : TFT-LCD', '100x58x23 میلیمتر', 3, 23400000, 0, 1, 'طوسی', '1724182544234.webp,1724182544LX-1-min.webp,1724182544LX-2-min.webp,1724182544LX-3-min.webp', '    گارانتی 36 ماهه طلایی نورنگار\r\n    20 مگاپیکسل\r\n    محدوده دیافراگم F3.6 - F7\r\n    دارای لرزشگیر اپتیکال\r\n    بزرگنمایی دیجیتال 4 برابر\r\n    حساسیت از ISO 80 تا ISO 3200\r\n    مانیتور 3 اینچ ثابت\r\n    قابلیت تصویربرداری با فرمت Full HD\r\n    دارای WiFi, NFC', 1, 0, 1724182544),
(3, 1, 2, 'دوربین عکاسی نیکون Nikon D7500 Kit 18-140mm f/3.5-5.6 G VR', 2017, 8, '32', '5568×3712', 640, 'محدوده دیافراگم: f/3.5-f/5.6\r\nنوع صفحه نمایش : TFT-LCD\r\nسرعت همزمانی فلاش: 1/250 ثانیه\r\nرزولوشن تصویربرداری : 4K Full HD', '136x104x73 میلیمتر', 1, 53990000, 51900000, 1, 'مشکی', '17242411771.webp,17242411774.webp,17242411775.webp,17242411776.webp,17242411777.webp,17242411778.webp,172424117711.webp,172424117712.webp', 'دوربین نیکون D7500 kit، بیشترین تغییرات را در سری دوربین نیکون D7500 kit به خود دیده است. در واقع این بزرگ‌ترین تغییراتی است که دوربین D7500 از زمان تغییر از رده دوربین D90 به بعد به خود دیده‌اند. به نظر می‌رسد که دوربین جدید نیکون، شباهت‌های زیادی به مدل حرفه‌ای D500 این شرکت دارد. در ادامه بررسی‌ انجام شده روی این دوربین را می‌خوانید.\r\n\r\n    گارانتی 36 ماهه طلایی نورنگار\r\n    21 مگاپیکسل\r\n    با لنز AF-S DX 18-140mm f/3.5-5.6G ED VR\r\n    اندازه حسگر APS-C\r\n     حساسیت 51200-100 ISO قابل گسترش تا 1640000-50\r\n    51 نقطه فوکوس\r\n    سرعت عکاسی پیاپی 8 فریم در ثانیه\r\n    فیلمبرداری 4K با سرعت 30 فریم در ثانیه\r\n    اندازه مانیتور 3.2 اینچ متحرک و قابلیت لمسی\r\n    ارتباط  WiFi و بلوتوث\r\n    ورودی میکروفن و خروجی هدفون\r\n    لرزشگیر درونی هنگام فیلمبرداری', 1, 0, 1724241177),
(4, 2, 5, 'دوربین فیلمبرداری پاناسونیک Panasonic AG-HPX250 Dvcpro HD Camcorder', 2016, 2, '10', '460000', 2500, '', '180 × 195 × 438 میلی‌متر', 4, 139990000, 130000000, 1, 'مشکی', '172424140422.webp,172424140423.webp', '    تصویرگر 1/3 اینچی 2.2 مگاپیکسلی 3MOS\r\n    لنز یکپارچه 22x (28-616mm Equiv).\r\n    ضبط 10 بیتی AVC-Intra با سرعت 100 مگابیت بر ثانیه\r\n    ضبط DVCPRO HD و SD', 1, 1, 1724241404);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `sid` int(11) NOT NULL,
  `sensor_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`sid`, `sensor_size`) VALUES
(1, '24'),
(2, '42'),
(3, '12'),
(4, '32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `permission` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `family`, `education`, `expertise`, `mobile`, `address`, `email`, `username`, `password`, `avatar`, `permission`, `created_at`) VALUES
(1, 'محمد داود ', 'کمیجانی', NULL, NULL, '09361954154', 'شیراز', 'davodkomeijani@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, 1724177813),
(7, 'سیاوش', 'قمیشی', NULL, NULL, '09119988776', NULL, 'siavash@gmail.com', 'siavash', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 1724177813);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `battery`
--
ALTER TABLE `battery`
  ADD PRIMARY KEY (`battid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_catid` (`catid`),
  ADD KEY `sell` (`sell`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `battery`
--
ALTER TABLE `battery`
  MODIFY `battid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
