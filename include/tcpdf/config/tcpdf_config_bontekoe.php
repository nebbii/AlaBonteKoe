<?php
define ('K_TCPDF_EXTERNAL_CONFIG', true); //Define the following constant to ignore the default configuration file.
define ('K_PATH_IMAGES', '../images/'); //Default images directory. By default it is automatically set but you can also set it as a fixed string to improve performances.
define ('PDF_HEADER_LOGO', 'Logo_bontekoe.png');  //Default image logo used be the default Header() method. Please set here your own logo or an empty string to disable it.
define ('PDF_HEADER_LOGO_WIDTH', 20); // //Header logo image width in user units.
define ('K_PATH_CACHE', sys_get_temp_dir().'/'); //* Cache directory for temporary files (full path).
define ('K_BLANK_IMAGE', '_blank.png'); ////Generic name for a blank image.
define ('PDF_PAGE_FORMAT', 'A4'); // Page format.
define ('PDF_PAGE_ORIENTATION', 'P'); // Page orientation (P=portrait, L=landscape).
define ('PDF_CREATOR', 'Uitgaancentrum de Bonte Koe'); //Document creator.
define ('PDF_AUTHOR', 'Uitgaancentrum de Bonte Koe'); //Document author.
define ('PDF_HEADER_TITLE', 'Uitgaancentrum de Bonte Koe'); //Header title.
define ('PDF_HEADER_STRING', 'www.uitgaanscentrumdebontekoe.nl'); //Header description string.
define ('PDF_UNIT', 'mm'); //Document unit of measure [pt=point, mm=millimeter, cm=centimeter, in=inch].
define ('PDF_MARGIN_HEADER', 5); //Header margin.
define ('PDF_MARGIN_FOOTER', 10); //Footer margin.
define ('PDF_MARGIN_TOP', 27); //Top margin.
define ('PDF_MARGIN_BOTTOM', 25); //Bottom margin.
define ('PDF_MARGIN_LEFT', 15); //Left margin.
define ('PDF_MARGIN_RIGHT', 15); //Right margin.
define ('PDF_FONT_NAME_MAIN', 'helvetica'); //Default main font name.
define ('PDF_FONT_SIZE_MAIN', 20); // * Default main font size.
define ('PDF_FONT_NAME_DATA', 'helvetica'); // * Default data font name.
define ('PDF_FONT_SIZE_DATA', 8); //Default data font size.
define ('PDF_FONT_MONOSPACED', 'courier'); // Default monospaced font name.
define ('PDF_IMAGE_SCALE_RATIO', 1.25); //Ratio used to adjust the conversion of pixels to user units.
define('HEAD_MAGNIFICATION', 1.1); // Magnification factor for titles.
define('K_CELL_HEIGHT_RATIO', 1.25); // * Height of cell respect font height.
define('K_TITLE_MAGNIFICATION', 1.3); //Title magnification respect main font size.
define('K_SMALL_RATIO', 2/3); //Reduction factor for small font.
define('K_THAI_TOPCHARS', true);  // Set to true to enable the special procedure used to avoid the overlappind of symbols on Thai language.
define('K_TCPDF_CALLS_IN_HTML', true);  // If true allows to call TCPDF methods using HTML syntax IMPORTANT: For security reason, disable this feature if you are printing user HTML content.
define('K_TCPDF_THROW_EXCEPTION_ERROR', false); // If true and PHP version is greater than 5, then the Error() method throw new exception instead of terminating the execution.

