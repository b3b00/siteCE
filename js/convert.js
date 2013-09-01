
		var entity_table = {
		//	34: "&quot;",		// Quotation mark. Not required
			38: "&amp;",		// Ampersand. Applied before everything else in the application
			60: "&lt;",		// Less-than sign
			62: "&gt;",		// Greater-than sign
		//	63: "&#63;",		// Question mark
		//	111: "&#111;",		// Latin small letter o
			160: "&nbsp;",		// Non-breaking space
			161: "&iexcl;",		// Inverted exclamation mark
			162: "&cent;",		// Cent sign
			163: "&pound;",		// Pound sign
			164: "&curren;",	// Currency sign
			165: "&yen;",		// Yen sign
			166: "&brvbar;",	// Broken vertical bar
			167: "&sect;",		// Section sign
			168: "&uml;",		// Diaeresis
			169: "&copy;",		// Copyright sign
			170: "&ordf;",		// Feminine ordinal indicator
			171: "&laquo;",		// Left-pointing double angle quotation mark
			172: "&not;",		// Not sign
			173: "&shy;",		// Soft hyphen
			174: "&reg;",		// Registered sign
			175: "&macr;",		// Macron
			176: "&deg;",		// Degree sign
			177: "&plusmn;",	// Plus-minus sign
			178: "&sup2;",		// Superscript two
			179: "&sup3;",		// Superscript three
			180: "&acute;",		// Acute accent
			181: "&micro;",		// Micro sign
			182: "&para;",		// Pilcrow sign
			183: "&middot;",	// Middle dot
			184: "&cedil;",		// Cedilla
			185: "&sup1;",		// Superscript one
			186: "&ordm;",		// Masculine ordinal indicator
			187: "&raquo;",		// Right-pointing double angle quotation mark
			188: "&frac14;",	// Vulgar fraction one-quarter
			189: "&frac12;",	// Vulgar fraction one-half
			190: "&frac34;",	// Vulgar fraction three-quarters
			191: "&iquest;",	// Inverted question mark
			192: "&Agrave;",	// A with grave
			193: "&Aacute;",	// A with acute
			194: "&Acirc;",		// A with circumflex
			195: "&Atilde;",	// A with tilde
			196: "&Auml;",		// A with diaeresis
			197: "&Aring;",		// A with ring above
			198: "&AElig;",		// AE
			199: "&Ccedil;",	// C with cedilla
			200: "&Egrave;",	// E with grave
			201: "&Eacute;",	// E with acute
			202: "&Ecirc;",		// E with circumflex
			203: "&Euml;",		// E with diaeresis
			204: "&Igrave;",	// I with grave
			205: "&Iacute;",	// I with acute
			206: "&Icirc;",		// I with circumflex
			207: "&Iuml;",		// I with diaeresis
			208: "&ETH;",		// Eth
			209: "&Ntilde;",	// N with tilde
			210: "&Ograve;",	// O with grave
			211: "&Oacute;",	// O with acute
			212: "&Ocirc;",		// O with circumflex
			213: "&Otilde;",	// O with tilde
			214: "&Ouml;",		// O with diaeresis
			215: "&times;",		// Multiplication sign
			216: "&Oslash;",	// O with stroke
			217: "&Ugrave;",	// U with grave
			218: "&Uacute;",	// U with acute
			219: "&Ucirc;",		// U with circumflex
			220: "&Uuml;",		// U with diaeresis
			221: "&Yacute;",	// Y with acute
			222: "&THORN;",		// Thorn
			223: "&szlig;",		// Sharp s. Also known as ess-zed
			224: "&agrave;",	// a with grave
			225: "&aacute;",	// a with acute
			226: "&acirc;",		// a with circumflex
			227: "&atilde;",	// a with tilde
			228: "&auml;",		// a with diaeresis
			229: "&aring;",		// a with ring above
			230: "&aelig;",		// ae. Also known as ligature ae
			231: "&ccedil;",	// c with cedilla
			232: "&egrave;",	// e with grave
			233: "&eacute;",	// e with acute
			234: "&ecirc;",		// e with circumflex
			235: "&euml;",		// e with diaeresis
			236: "&igrave;",	// i with grave
			237: "&iacute;",	// i with acute
			238: "&icirc;",		// i with circumflex
			239: "&iuml;",		// i with diaeresis
			240: "&eth;",		// eth
			241: "&ntilde;",	// n with tilde
			242: "&ograve;",	// o with grave
			243: "&oacute;",	// o with acute
			244: "&ocirc;",		// o with circumflex
			245: "&otilde;",	// o with tilde
			246: "&ouml;",		// o with diaeresis
			247: "&divide;",	// Division sign
			248: "&oslash;",	// o with stroke. Also known as o with slash
			249: "&ugrave;",	// u with grave
			250: "&uacute;",	// u with acute
			251: "&ucirc;",		// u with circumflex
			252: "&uuml;",		// u with diaeresis
			253: "&yacute;",	// y with acute
			254: "&thorn;",		// thorn
			255: "&yuml;",		// y with diaeresis
			264: "&#264;",		// Latin capital letter C with circumflex
			265: "&#265;",		// Latin small letter c with circumflex
			338: "&OElig;",		// Latin capital ligature OE
			339: "&oelig;",		// Latin small ligature oe
			352: "&Scaron;",	// Latin capital letter S with caron
			353: "&scaron;",	// Latin small letter s with caron
			372: "&#372;",		// Latin capital letter W with circumflex
			373: "&#373;",		// Latin small letter w with circumflex
			374: "&#374;",		// Latin capital letter Y with circumflex
			375: "&#375;",		// Latin small letter y with circumflex
			376: "&Yuml;",		// Latin capital letter Y with diaeresis
			402: "&fnof;",		// Latin small f with hook, function, florin
			710: "&circ;",		// Modifier letter circumflex accent
			732: "&tilde;",		// Small tilde
			913: "&Alpha;",		// Alpha
			914: "&Beta;",		// Beta
			915: "&Gamma;",		// Gamma
			916: "&Delta;",		// Delta
			917: "&Epsilon;",	// Epsilon
			918: "&Zeta;",		// Zeta
			919: "&Eta;",		// Eta
			920: "&Theta;",		// Theta
			921: "&Iota;",		// Iota
			922: "&Kappa;",		// Kappa
			923: "&Lambda;",	// Lambda
			924: "&Mu;",		// Mu
			925: "&Nu;",		// Nu
			926: "&Xi;",		// Xi
			927: "&Omicron;",	// Omicron
			928: "&Pi;",		// Pi
			929: "&Rho;",		// Rho
			931: "&Sigma;",		// Sigma
			932: "&Tau;",		// Tau
			933: "&Upsilon;",	// Upsilon
			934: "&Phi;",		// Phi
			935: "&Chi;",		// Chi
			936: "&Psi;",		// Psi
			937: "&Omega;",		// Omega
			945: "&alpha;",		// alpha
			946: "&beta;",		// beta
			947: "&gamma;",		// gamma
			948: "&delta;",		// delta
			949: "&epsilon;",	// epsilon
			950: "&zeta;",		// zeta
			951: "&eta;",		// eta
			952: "&theta;",		// theta
			953: "&iota;",		// iota
			954: "&kappa;",		// kappa
			955: "&lambda;",	// lambda
			956: "&mu;",		// mu
			957: "&nu;",		// nu
			958: "&xi;",		// xi
			959: "&omicron;",	// omicron
			960: "&pi;",		// pi
			961: "&rho;",		// rho
			962: "&sigmaf;",	// sigmaf
			963: "&sigma;",		// sigma
			964: "&tau;",		// tau
			965: "&upsilon;",	// upsilon
			966: "&phi;",		// phi
			967: "&chi;",		// chi
			968: "&psi;",		// psi
			969: "&omega;",		// omega
			977: "&thetasym;",	// Theta symbol
			978: "&upsih;",		// Greek upsilon with hook symbol
			982: "&piv;",		// Pi symbol
			8194: "&ensp;",		// En space
			8195: "&emsp;",		// Em space
			8201: "&thinsp;",	// Thin space
			8204: "&zwnj;",		// Zero width non-joiner
			8205: "&zwj;",		// Zero width joiner
			8206: "&lrm;",		// Left-to-right mark
			8207: "&rlm;",		// Right-to-left mark
			8211: "&ndash;",	// En dash
			8212: "&mdash;",	// Em dash
			8216: "&lsquo;",	// Left single quotation mark
			8217: "&rsquo;",	// Right single quotation mark
			8218: "&sbquo;",	// Single low-9 quotation mark
			8220: "&ldquo;",	// Left double quotation mark
			8221: "&rdquo;",	// Right double quotation mark
			8222: "&bdquo;",	// Double low-9 quotation mark
			8224: "&dagger;",	// Dagger
			8225: "&Dagger;",	// Double dagger
			8226: "&bull;",		// Bullet
			8230: "&hellip;",	// Horizontal ellipsis
			8240: "&permil;",	// Per mille sign
			8242: "&prime;",	// Prime
			8243: "&Prime;",	// Double Prime
			8249: "&lsaquo;",	// Single left-pointing angle quotation
			8250: "&rsaquo;",	// Single right-pointing angle quotation
			8254: "&oline;",	// Overline
			8260: "&frasl;",	// Fraction Slash
			8364: "&euro;",		// Euro sign
			8472: "&weierp;",	// Script capital
			8465: "&image;",	// Blackletter capital I
			8476: "&real;",		// Blackletter capital R
			8482: "&trade;",	// Trade mark sign
			8501: "&alefsym;",	// Alef symbol
			8592: "&larr;",		// Leftward arrow
			8593: "&uarr;",		// Upward arrow
			8594: "&rarr;",		// Rightward arrow
			8595: "&darr;",		// Downward arrow
			8596: "&harr;",		// Left right arrow
			8629: "&crarr;",	// Downward arrow with corner leftward. Also known as carriage return
			8656: "&lArr;",		// Leftward double arrow. ISO 10646 does not say that lArr is the same as the 'is implied by' arrow but also does not have any other character for that function. So ? lArr can be used for 'is implied by' as ISOtech suggests
			8657: "&uArr;",		// Upward double arrow
			8658: "&rArr;",		// Rightward double arrow. ISO 10646 does not say this is the 'implies' character but does not have another character with this function so ? rArr can be used for 'implies' as ISOtech suggests
			8659: "&dArr;",		// Downward double arrow
			8660: "&hArr;",		// Left-right double arrow
			// Mathematical Operators
			8704: "&forall;",	// For all
			8706: "&part;",		// Partial differential
			8707: "&exist;",	// There exists
			8709: "&empty;",	// Empty set. Also known as null set and diameter
			8711: "&nabla;",	// Nabla. Also known as backward difference
			8712: "&isin;",		// Element of
			8713: "&notin;",	// Not an element of
			8715: "&ni;",		// Contains as member
			8719: "&prod;",		// N-ary product. Also known as product sign. Prod is not the same character as U+03A0 'greek capital letter pi' though the same glyph might be used for both
			8721: "&sum;",		// N-ary summation. Sum is not the same character as U+03A3 'greek capital letter sigma' though the same glyph might be used for both
			8722: "&minus;",	// Minus sign
			8727: "&lowast;",	// Asterisk operator
			8729: "&#8729;",	// Bullet operator
			8730: "&radic;",	// Square root. Also known as radical sign
			8733: "&prop;",		// Proportional to
			8734: "&infin;",	// Infinity
			8736: "&ang;",		// Angle
			8743: "&and;",		// Logical and. Also known as wedge
			8744: "&or;",		// Logical or. Also known as vee
			8745: "&cap;",		// Intersection. Also known as cap
			8746: "&cup;",		// Union. Also known as cup
			8747: "&int;",		// Integral
			8756: "&there4;",	// Therefore
			8764: "&sim;",		// tilde operator. Also known as varies with and similar to. The tilde operator is not the same character as the tilde, U+007E, although the same glyph might be used to represent both
			8773: "&cong;",		// Approximately equal to
			8776: "&asymp;",	// Almost equal to. Also known as asymptotic to
			8800: "&ne;",		// Not equal to
			8801: "&equiv;",	// Identical to
			8804: "&le;",		// Less-than or equal to
			8805: "&ge;",		// Greater-than or equal to
			8834: "&sub;",		// Subset of
			8835: "&sup;",		// Superset of. Note that nsup, 'not a superset of, U+2283' is not covered by the Symbol font encoding and is not included.
			8836: "&nsub;",		// Not a subset of
			8838: "&sube;",		// Subset of or equal to
			8839: "&supe;",		// Superset of or equal to
			8853: "&oplus;",	// Circled plus. Also known as direct sum
			8855: "&otimes;",	// Circled times. Also known as vector product
			8869: "&perp;",		// Up tack. Also known as orthogonal to and perpendicular
			8901: "&sdot;",		// Dot operator. The dot operator is not the same character as U+00B7 middle dot
			// Miscellaneous Technical
			8968: "&lceil;",	// Left ceiling. Also known as an APL upstile
			8969: "&rceil;",	// Right ceiling
			8970: "&lfloor;",	// left floor. Also known as APL downstile
			8971: "&rfloor;",	// Right floor
			9001: "&lang;",		// Left-pointing angle bracket. Also known as bra. Lang is not the same character as U+003C 'less than'or U+2039 'single left-pointing angle quotation mark'
			9002: "&rang;",		// Right-pointing angle bracket. Also known as ket. Rang is not the same character as U+003E 'greater than' or U+203A 'single right-pointing angle quotation mark'
			// Geometric Shapes
			9642: "&#9642;",	// Black small square
			9643: "&#9643;",	// White small square
			9674: "&loz;",		// Lozenge
			// Miscellaneous Symbols
			9702: "&#9702;",	// White bullet
			9824: "&spades;",	// Black (filled) spade suit
			9827: "&clubs;",	// Black (filled) club suit. Also known as shamrock
			9829: "&hearts;",	// Black (filled) heart suit. Also known as shamrock
			9830: "&diams;"		// Black (filled) diamond suit
		}
		var update_memory = function() {
			memory[memory_position = memory_position + 1] = document.getElementById("input").value;
			if(memory_position < memory.length - 1) memory = memory.slice(0, memory_position);
			if(document.getElementById("undo").disabled) document.getElementById("undo").disabled = false;
			if(!document.getElementById("redo").disabled) document.getElementById("redo").disabled = true;
		}
		var unredo = function() {
			if((this.id == "redo" && memory_position < memory.length - 1) || (this.id == "undo" && memory_position > 0)) {
				document.getElementById("input").value = memory[memory_position = (this.id == "undo") ? memory_position - 1 : memory_position + 1];
				if(document.getElementById((this.id == "undo") ? "redo" : "undo").disabled) document.getElementById((this.id == "undo") ? "redo" : "undo").disabled = false;
			}
			if((this.id == "redo" && memory_position >= memory.length - 1 && !document.getElementById("redo").disabled) || (this.id == "undo" && memory_position <= 0 && !document.getElementById("undo").disabled)) document.getElementById(this.id).disabled = true;
		}
		var memory = [""];
		var memory_position = 0;
		var tidy = function() {
			var output = document.getElementById("input").value;
			output = output.replace(new RegExp("[ \\t\\v\\u00A0\\u2028\\u2029]+\\n", "g"), "\n");
			output = output.replace(new RegExp("[ \\t\\v\\u00A0\\u2028\\u2029]+\\r", "g"), "\r"); // If they exist
			output = output.replace(new RegExp("[ \\t\\v\\u00A0\\u2028\\u2029]+\\f", "g"), "\f"); // If they exist
			output = output.replace(new RegExp(" {2,}", "g"), " ");
			output = output.replace(new RegExp("^\\s+", ""), "");
			output = output.replace(new RegExp("\\s+$", ""), "");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert") update_memory();
			}
		}
		var convert_helper = function(str, p1) {
			c = p1.charCodeAt(0);
			if(entity_table[c]) // Swap char for a character entity.
				return entity_table[c];
			else // Swap char for a numeric character reference.
				return '&#' + c + ';';
		}
		var convert = function() {
			var input = output = document.getElementById("input").value;
			if(input != "") {
				output = input.replace(new RegExp("([^a-zA-Z0-9\t\n\v\f\r \x21\x22\x23\x24\x25\x27\x28\x29\x2a\x2b\x2c\x2d\x2e\x2f\x3a\x3b\x3d\x3f\x40\x5b\x5c\x5d\x5e\x5f\x60\x7b\x7c\x7d\x7e])", "g"), convert_helper);
				if(input != output) {
					document.getElementById("input").value = output;
					if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
				}
			}
		}
		var revert_helper = function(str, p1, p2) {
			return String.fromCharCode(((p1 == 'x') ? parseInt(p2, 16) : p2));
		}
		var revert = function() {
			var input = output = document.getElementById("input").value;
			if(input != "") {
				for(var i in entity_table)
					if(i != 38)
						output = output.replace(new RegExp(entity_table[i], "g"), String.fromCharCode(i));
				output = output.replace(new RegExp("&#(x?)(\\d+);", "g"), revert_helper);
				output = output.replace(new RegExp(entity_table[38], "g"), String.fromCharCode(38));
				if(input != output) {
					document.getElementById("input").value = output;
					update_memory();
				}
			}
		}
		var all_to_unicode = function() {
			var input = document.getElementById("input").value;
			var output = "";
			for(var i in input)
				output = output + input.charCodeAt(i) + ";";
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				update_memory();
			}
		}
		var space_hyphen_space = function() {
			var output = document.getElementById("input").value.replace(new RegExp("\\s-\\s", "g"), " &ndash; ");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		}
		var times_by_x = function() {
			var output = document.getElementById("input").value.replace(new RegExp("(\\s?\\d+)(x)", "g"), "$1&times;");
			output = output.replace(new RegExp("(\\d+\\s)(x)(\\s)", "g"), "$1&times;$3");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		}
		var straighten_quotes = function() {
			var output = document.getElementById("input").value.replace(new RegExp("&lsquo;", "g"), "\'");
			output = output.replace(new RegExp("&rsquo;", "g"), "\'");
			output = output.replace(new RegExp("&ldquo;", "g"), "\"");
			output = output.replace(new RegExp("&rdquo;", "g"), "\"");
			output = output.replace(new RegExp(String.fromCharCode(8216), "g"), "\'");
			output = output.replace(new RegExp(String.fromCharCode(8217), "g"), "\'");
			output = output.replace(new RegExp(String.fromCharCode(8220), "g"), "\"");
			output = output.replace(new RegExp(String.fromCharCode(8221), "g"), "\"");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		}
		var straighten_accents = function() { // 180: "&acute;" Acute accent and 96: Grave accent
			var output = document.getElementById("input").value.replace(new RegExp("&acute;", "g"), "\'");
			output = output.replace(new RegExp(String.fromCharCode(180), "g"), "\'");
			output = output.replace(new RegExp(String.fromCharCode(96), "g"), "\'");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		
		}
		var figure_dash = function() {
			var output = document.getElementById("input").value.replace(new RegExp(String.fromCharCode(8210), "g"), "&ndash;");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		
		}
		var dotdotdot = function() {
			var output = document.getElementById("input").value.replace(new RegExp("\\.\\.\\.", "g"), "&hellip;");
			if(document.getElementById("input").value != output) {
				document.getElementById("input").value = output;
				if(this.id != "tidyandconvert" && this.id != "convert") update_memory();
			}
		}
		var check_height = function() {
			this.style.height = this.scrollHeight + 10 + "px";
			this.style.width = this.scrollWidth + 10 + "px";
		}
		var key_down = function(e) {
			if(!e) e = window.event;
			if(e.ctrlKey || e.metaKey) {
				document.getElementById("input").focus();
				key_down.ctrlmeta = true;
			}
			if(key_down.ctrlmeta && e.keyCode == 32) {
				mass.call(document.getElementById("tidyandconvert"));
				//document.getElementById("input").select();
				return false;
			}
			return true;
		}
		var key_up = function(e) {
			if(!e) e = window.event;
			if(e.ctrlKey || e.metaKey)
				key_down.ctrlmeta = false;
		}
		var mass = function() {
			if(this.id == "tidyandconvert") tidy.call(this);
			convert.call(this);
			if(document.getElementById("convert_space_hyphen_space").checked) space_hyphen_space.call(this);
			if(document.getElementById("convert_times_by_x").checked) times_by_x.call(this);
			if(document.getElementById("convert_straighten_quotes").checked) straighten_quotes.call(this);
			if(document.getElementById("convert_straighten_accents").checked) straighten_accents.call(this);
			if(document.getElementById("convert_dotdotdot").checked) dotdotdot.call(this);
			if(document.getElementById("convert_figure_dash").checked) figure_dash.call(this);
			update_memory();
			check_height.call(document.getElementById("input"));
		}		
		
		