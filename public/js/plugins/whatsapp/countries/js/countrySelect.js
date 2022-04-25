// wrap in UMD - see https://github.com/umdjs/umd/blob/master/jqueryPlugin.js
(function(factory) {
	if (typeof define === "function" && define.amd) {
		define([ "jquery" ], function($) {
			factory($, window, document);
		});
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory(require("jquery"), window, document);
	} else {
		factory(jQuery, window, document);
	}
})(function($, window, document, undefined) {
	"use strict";
	var pluginName = "countrySelect", id = 1, // give each instance its own ID for namespaced event handling
	defaults = {
		// Default country
		defaultCountry: "",
		// Position the selected flag inside or outside of the input
		defaultStyling: "inside",
		// don't display these countries
		excludeCountries: [],
		// Display only these countries
		onlyCountries: [],
		// The countries at the top of the list. Defaults to United States and United Kingdom
		preferredCountries: [ "us", "gb" ],
		// Set the dropdown's width to be the same as the input. This is automatically enabled for small screens.
		responsiveDropdown: ($(window).width() < 768 ? true : false),
	}, keys = {
		UP: 38,
		DOWN: 40,
		ENTER: 13,
		ESC: 27,
		BACKSPACE: 8,
		PLUS: 43,
		SPACE: 32,
		A: 65,
		Z: 90
	}, windowLoaded = false;
	// keep track of if the window.load event has fired as impossible to check after the fact
	$(window).on('load', function() {
		windowLoaded = true;
	});
	function Plugin(element, options) {
		this.element = element;
		this.options = $.extend({}, defaults, options);
		this._defaults = defaults;
		// event namespace
		this.ns = "." + pluginName + id++;
		this._name = pluginName;
		this.init();
	}
	Plugin.prototype = {
		init: function() {
			// Processar todos os dados: onlyCountries, excludeCountries, preferidoCountries, defaultCountry etc..
			this._processCountryData();
			// Generate the markup
			this._generateMarkup();
			// Set the initial state of the input value and the selected flag
			this._setInitialState();
			// Start all of the event listeners: input keyup, selectedFlag click
			this._initListeners();
			// Return this when the auto country is resolved.
			this.autoCountryDeferred = new $.Deferred();
			// Get auto country.
			this._initAutoCountry();
			// Keep track as the user types
		        this.typedLetters = "";

			return this.autoCountryDeferred;
		},
		/********************
		 *  PRIVATE METHODS
		 ********************/
		// prepare all of the country data, including onlyCountries, excludeCountries, preferredCountries and
		// defaultCountry options
		_processCountryData: function() {
			// set the instances country data objects
			this._setInstanceCountryData();
			// set the preferredCountries property
			this._setPreferredCountries();
		},
		// process onlyCountries array if present
		_setInstanceCountryData: function() {
			var that = this;
			if (this.options.onlyCountries.length) {
				var newCountries = [];
				$.each(this.options.onlyCountries, function(i, countryCode) {
					var countryData = that._getCountryData(countryCode, true);
					if (countryData) {
						newCountries.push(countryData);
					}
				});
				this.countries = newCountries;
			} else if (this.options.excludeCountries.length) {
                var lowerCaseExcludeCountries = this.options.excludeCountries.map(function(country) {
                    return country.toLowerCase();
                });
                this.countries = allCountries.filter(function(country) {
                    return lowerCaseExcludeCountries.indexOf(country.iso2) === -1;
                });
            } else {
				this.countries = allCountries;
			}
		},
		// Process preferred countries - iterate through the preferences,
		// fetching the country data for each one
		_setPreferredCountries: function() {
			var that = this;
			this.preferredCountries = [];
			$.each(this.options.preferredCountries, function(i, countryCode) {
				var countryData = that._getCountryData(countryCode, false);
				if (countryData) {
					that.preferredCountries.push(countryData);
				}
			});
		},
		// generate all of the markup for the plugin: the selected flag overlay, and the dropdown
		_generateMarkup: function() {
			// Country input
			this.countryInput = $(this.element);
			// containers (mostly for positioning)
			var mainClass = "country-select";
			if (this.options.defaultStyling) {
				mainClass += " " + this.options.defaultStyling;
			}
			this.countryInput.wrap($("<div>", {
				"class": mainClass
			}));
			var flagsContainer = $("<div>", {
				"class": "flag-dropdown"
			}).insertAfter(this.countryInput);
			// currently selected flag (displayed to left of input)
			var selectedFlag = $("<div>", {
				"class": "selected-flag"
			}).appendTo(flagsContainer);
			this.selectedFlagInner = $("<div>", {
				"class": "flag"
			}).appendTo(selectedFlag);
			// CSS triangle
			$("<div>", {
				"class": "arrow"
			}).appendTo(selectedFlag);
			// country list contains: preferred countries, then divider, then all countries
			this.countryList = $("<ul>", {
				"class": "country-list v-hide"
			}).appendTo(flagsContainer);
			if (this.preferredCountries.length) {
				this._appendListItems(this.preferredCountries, "preferred");
				$("<li>", {
					"class": "divider"
				}).appendTo(this.countryList);
			}
			this._appendListItems(this.countries, "");
			// Adicione a entrada oculta para o código do país
			this.countryCodeInput = $("#"+this.countryInput.attr("id")+"_code");
			if (!this.countryCodeInput) {
				this.countryCodeInput = $('<input type="hidden" id="'+this.countryInput.attr("id")+'_code" name="'+this.countryInput.attr("name")+'_code" value="" />');
				this.countryCodeInput.insertAfter(this.countryInput);
			}
			// agora podemos pegar a altura suspensa e ocultá-la adequadamente
			this.dropdownHeight = this.countryList.outerHeight();
			// set the dropdown width according to the input if responsiveDropdown option is present or if it's a small screen
			if (this.options.responsiveDropdown) {
				$(window).resize(function() {
					$('.country-select').each(function() {
						var dropdownWidth = this.offsetWidth;
						$(this).find('.country-list').css("width", dropdownWidth + "px");
					});
				}).resize();
			}
			this.countryList.removeClass("v-hide").addClass("hide");
			// isso é útil em muitos lugares
			this.countryListItems = this.countryList.children(".country");
		},
		// adicionar um país <li> ao container countryList <ul>
		_appendListItems: function(countries, className) {
			// Gere elementos DOM como uma string temporária grande, para que haja apenas um DOM insert event
			var tmp = "";
			// for each country
			$.each(countries, function(i, c) {
				// open the list item
				tmp += '<li class="country ' + className + '" data-country-code="' + c.iso2 + '" data-ddi-code="' + c.ddi + '">';
				// add the flag
				tmp += '<div class="flag ' + c.iso2 + '"></div>';
				// and the country name
				tmp += '<span class="country-name">' + c.name + '</span>';
				// close the list item
				tmp += '</li>';
			});
			this.countryList.append(tmp);
		},
		// set the initial state of the input value and the selected flag
		_setInitialState: function() {
			var flagIsSet = false;
			// If the input is pre-populated, then just update the selected flag
			if (this.countryInput.val()) {
				flagIsSet = this._updateFlagFromInputVal();
			}
			// If the country code input is pre-populated, update the name and the selected flag
			var selectedCode = this.countryCodeInput.val();
			if (selectedCode) {
				this.selectCountry(selectedCode);
			}
			if (!flagIsSet) {
				// flag is not set, so set to the default country
				var defaultCountry;
				// check the defaultCountry option, else fall back to the first in the list
				if (this.options.defaultCountry) {
					defaultCountry = this._getCountryData(this.options.defaultCountry, false);
					// Did we not find the requested default country?
					if (!defaultCountry) {
						defaultCountry = this.preferredCountries.length ? this.preferredCountries[0] : this.countries[0];
					}
				} else {
					defaultCountry = this.preferredCountries.length ? this.preferredCountries[0] : this.countries[0];
				}
				this.defaultCountry = defaultCountry.iso2;
			}
		},
		// initialise the main event listeners: input keyup, and click selected flag
		_initListeners: function() {
			var that = this;
			// Update flag on keyup.
			// Use keyup instead of keypress because we want to update on backspace
			// and instead of keydown because the value hasn't updated when that
			// event is fired.
			// NOTE: better to have this one listener all the time instead of
			// starting it on focus and stopping it on blur, because then you've
			// got two listeners (focus and blur)
			this.countryInput.on("keyup" + this.ns, function() {
				that._updateFlagFromInputVal();
			});
			// toggle country dropdown on click
			var selectedFlag = this.selectedFlagInner.parent();
			selectedFlag.on("click" + this.ns, function(e) {
				// only intercept this event if we're opening the dropdown
				// else let it bubble up to the top ("click-off-to-close" listener)
				// we cannot just stopPropagation as it may be needed to close another instance
				if (that.countryList.hasClass("hide") && !that.countryInput.prop("disabled")) {
					that._showDropdown();
				}
			});
			// Despite above note, added blur to ensure partially spelled country
			// with correctly chosen flag is spelled out on blur. Also, correctly
			// selects flag when field is autofilled
			this.countryInput.on("blur" + this.ns, function() {
				if (that.countryInput.val() != that.getSelectedCountryData().ddi) {
					that.setCountry(that.countryInput.val());
				}
				that.countryInput.val(that.getSelectedCountryData().ddi);
			});
		},
		_initAutoCountry: function() {
			if (this.options.initialCountry === "auto") {
				this._loadAutoCountry();
			} else {
				if (this.defaultCountry) {
					this.selectCountry(this.defaultCountry);
				}
				this.autoCountryDeferred.resolve();
			}
		},
		// perform the geo ip lookup
		_loadAutoCountry: function() {
			var that = this;

			// 3 options:
			// 1) already loaded (we're done)
			// 2) not already started loading (start)
			// 3) already started loading (do nothing - just wait for loading callback to fire)
			if ($.fn[pluginName].autoCountry) {
				this.handleAutoCountry();
			} else if (!$.fn[pluginName].startedLoadingAutoCountry) {
				// don't do this twice!
				$.fn[pluginName].startedLoadingAutoCountry = true;

				if (typeof this.options.geoIpLookup === 'function') {
					this.options.geoIpLookup(function(countryCode) {
						$.fn[pluginName].autoCountry = countryCode.toLowerCase();
						// tell all instances the auto country is ready
						// TODO: this should just be the current instances
						// UPDATE: use setTimeout in case their geoIpLookup function calls this callback straight away (e.g. if they have already done the geo ip lookup somewhere else). Using setTimeout means that the current thread of execution will finish before executing this, which allows the plugin to finish initialising.
						setTimeout(function() {
							$(".country-select input").countrySelect("handleAutoCountry");
						});
					});
				}
			}
		},
		// Focus input and put the cursor at the end
		_focus: function() {
			this.countryInput.focus();
			var input = this.countryInput[0];
			// works for Chrome, FF, Safari, IE9+
			if (input.setSelectionRange) {
				var len = this.countryInput.val().length;
				input.setSelectionRange(len, len);
			}
		},
		// Show the dropdown
		_showDropdown: function() {
			this._setDropdownPosition();
			// update highlighting and scroll to active list item
			var activeListItem = this.countryList.children(".active");
			this._highlightListItem(activeListItem);
			// show it
			this.countryList.removeClass("hide");
			this._scrollTo(activeListItem);
			// bind all the dropdown-related listeners: mouseover, click, click-off, keydown
			this._bindDropdownListeners();
			// update the arrow
			this.selectedFlagInner.parent().children(".arrow").addClass("up");
		},
		// decide where to position dropdown (depends on position within viewport, and scroll)
		_setDropdownPosition: function() {
			var inputTop = this.countryInput.offset().top, windowTop = $(window).scrollTop(),
			dropdownFitsBelow = inputTop + this.countryInput.outerHeight() + this.dropdownHeight < windowTop + $(window).height(), dropdownFitsAbove = inputTop - this.dropdownHeight > windowTop;
			// dropdownHeight - 1 for border
			var cssTop = !dropdownFitsBelow && dropdownFitsAbove ? "-" + (this.dropdownHeight - 1) + "px" : "";
			this.countryList.css("top", cssTop);
		},
		// we only bind dropdown listeners when the dropdown is open
		_bindDropdownListeners: function() {
			var that = this;
			// when mouse over a list item, just highlight that one
			// we add the class "highlight", so if they hit "enter" we know which one to select
			this.countryList.on("mouseover" + this.ns, ".country", function(e) {
				that._highlightListItem($(this));
			});
			// listen for country selection
			this.countryList.on("click" + this.ns, ".country", function(e) {
				that._selectListItem($(this));
			});
			// click off to close
			// (except when this initial opening click is bubbling up)
			// we cannot just stopPropagation as it may be needed to close another instance
			var isOpening = true;
			$("html").on("click" + this.ns, function(e) {
				e.preventDefault();
				if (!isOpening) {
					that._closeDropdown();
				}
				isOpening = false;
			});
			// Listen for up/down scrolling, enter to select, or letters to jump to country name.
			// Use keydown as keypress doesn't fire for non-char keys and we want to catch if they
			// just hit down and hold it to scroll down (no keyup event).
			// Listen on the document because that's where key events are triggered if no input has focus
			$(document).on("keydown" + this.ns, function(e) {
				// prevent down key from scrolling the whole page,
				// and enter key from submitting a form etc
				e.preventDefault();
				if (e.which == keys.UP || e.which == keys.DOWN) {
					// up and down to navigate
					that._handleUpDownKey(e.which);
				} else if (e.which == keys.ENTER) {
					// enter to select
					that._handleEnterKey();
				} else if (e.which == keys.ESC) {
					// esc to close
					that._closeDropdown();
				} else if (e.which >= keys.A && e.which <= keys.Z || e.which === keys.SPACE) {
					that.typedLetters += String.fromCharCode(e.which);
					that._filterCountries(that.typedLetters);
				} else if (e.which === keys.BACKSPACE) {
					that.typedLetters = that.typedLetters.slice(0, -1);
					that._filterCountries(that.typedLetters);
				}
			});
		},
		// Highlight the next/prev item in the list (and ensure it is visible)
		_handleUpDownKey: function(key) {
			var current = this.countryList.children(".highlight").first();
			var next = key == keys.UP ? current.prev() : current.next();
			if (next.length) {
				// skip the divider
				if (next.hasClass("divider")) {
					next = key == keys.UP ? next.prev() : next.next();
				}
				this._highlightListItem(next);
				this._scrollTo(next);
			}
		},
		// select the currently highlighted item
		_handleEnterKey: function() {
			var currentCountry = this.countryList.children(".highlight").first();
			if (currentCountry.length) {
				this._selectListItem(currentCountry);
			}
		},
		_filterCountries: function(letters) {
			var countries = this.countryListItems.filter(function() {
				return $(this).text().toUpperCase().indexOf(letters) === 0 && !$(this).hasClass("preferred");
			});
			if (countries.length) {
				// if one is already highlighted, then we want the next one
				var highlightedCountry = countries.filter(".highlight").first(), listItem;
				if (highlightedCountry && highlightedCountry.next() && highlightedCountry.next().text().toUpperCase().indexOf(letters) === 0) {
					listItem = highlightedCountry.next();
				} else {
					listItem = countries.first();
				}
				// update highlighting and scroll
				this._highlightListItem(listItem);
				this._scrollTo(listItem);
			}
		},
		// Update the selected flag using the input's current value
		_updateFlagFromInputVal: function() {
			var that = this;
			// try and extract valid country from input
			var value = this.countryInput.val().replace(/(?=[() ])/g, '\\');
			if (value) {
				var countryCodes = [];
				var matcher = new RegExp("^"+value, "i");
				for (var i = 0; i < this.countries.length; i++) {
					if (this.countries[i].name.match(matcher)) {
						countryCodes.push(this.countries[i].iso2);
					}
				}
				// Check if one of the matching countries is already selected
				var alreadySelected = false;
				$.each(countryCodes, function(i, c) {
					if (that.selectedFlagInner.hasClass(c)) {
						alreadySelected = true;
					}
				});
				if (!alreadySelected) {
					this._selectFlag(countryCodes[0]);
					this.countryCodeInput.val(countryCodes[0]).trigger("change");
				}
				// Matching country found
				return true;
			}
			// No match found
			return false;
		},
		// remove highlighting from other list items and highlight the given item
		_highlightListItem: function(listItem) {
			this.countryListItems.removeClass("highlight");
			listItem.addClass("highlight");
		},
		// find the country data for the given country code
		// the ignoreOnlyCountriesOption is only used during init() while parsing the onlyCountries array
		_getCountryData: function(countryCode, ignoreOnlyCountriesOption) {
			var countryList = ignoreOnlyCountriesOption ? allCountries : this.countries;
			for (var i = 0; i < countryList.length; i++) {
				if (countryList[i].iso2 == countryCode) {
					return countryList[i];
				}
			}
			return null;
		},
		// update the selected flag and the active list item
		_selectFlag: function(countryCode) {
			if (! countryCode) {
				return false;
			}
			this.selectedFlagInner.attr("class", "flag " + countryCode);
			// update the title attribute
			var countryData = this._getCountryData(countryCode);
			this.selectedFlagInner.parent().attr("title", countryData.name);
			// update the active list item
			var listItem = this.countryListItems.children(".flag." + countryCode).first().parent();
			this.countryListItems.removeClass("active");
			listItem.addClass("active");
		},
		// called when the user selects a list item from the dropdown
		_selectListItem: function(listItem) {
			// update selected flag and active list item
			var countryCode = listItem.attr("data-country-code");
			this._selectFlag(countryCode);
			this._closeDropdown();
			// update input value
			this._updateName(countryCode);
			this.countryInput.trigger("change");
			this.countryCodeInput.trigger("change");
			// focus the input
			this._focus();
		},
		// close the dropdown and unbind any listeners
		_closeDropdown: function() {
			this.countryList.addClass("hide");
			// update the arrow
			this.selectedFlagInner.parent().children(".arrow").removeClass("up");
			// unbind event listeners
			$(document).off("keydown" + this.ns);
			$("html").off("click" + this.ns);
			// unbind both hover and click listeners
			this.countryList.off(this.ns);
			this.typedLetters = "";
		},
		// check if an element is visible within its container, else scroll until it is
		_scrollTo: function(element) {
			if (!element || !element.offset()) {
				return;
			}
			var container = this.countryList, containerHeight = container.height(), containerTop = container.offset().top, containerBottom = containerTop + containerHeight, elementHeight = element.outerHeight(), elementTop = element.offset().top, elementBottom = elementTop + elementHeight, newScrollTop = elementTop - containerTop + container.scrollTop();
			if (elementTop < containerTop) {
				// scroll up
				container.scrollTop(newScrollTop);
			} else if (elementBottom > containerBottom) {
				// scroll down
				var heightDifference = containerHeight - elementHeight;
				container.scrollTop(newScrollTop - heightDifference);
			}
		},
		// Replace any existing country name with the new one
		_updateName: function(countryCode) {
			this.countryCodeInput.val(countryCode).trigger("change");
			this.countryInput.val(this._getCountryData(countryCode).name);
		},
		/********************
		 *  PUBLIC METHODS
		 ********************/
		// this is called when the geoip call returns
		handleAutoCountry: function() {
			if (this.options.initialCountry === "auto") {
				// we must set this even if there is an initial val in the input: in case the initial val is invalid and they delete it - they should see their auto country
				this.defaultCountry = $.fn[pluginName].autoCountry;
				// if there's no initial value in the input, then update the flag
				if (!this.countryInput.val()) {
					this.selectCountry(this.defaultCountry);
				}
				this.autoCountryDeferred.resolve();
			}
		},
		// get the country data for the currently selected flag
		getSelectedCountryData: function() {
			// rely on the fact that we only set 2 classes on the selected flag element:
			// the first is "flag" and the second is the 2-char country code
			var countryCode = this.selectedFlagInner.attr("class").split(" ")[1];
			return this._getCountryData(countryCode);
		},
		// update the selected flag
		selectCountry: function(countryCode) {
			countryCode = countryCode.toLowerCase();
			// check if already selected
			if (!this.selectedFlagInner.hasClass(countryCode)) {
				this._selectFlag(countryCode);
				this._updateName(countryCode);
			}
		},
		// set the input value and update the flag
		setCountry: function(country) {
			this.countryInput.val(country);
			this._updateFlagFromInputVal();
		},
		// remove plugin
		destroy: function() {
			// stop listeners
			this.countryInput.off(this.ns);
			this.selectedFlagInner.parent().off(this.ns);
			// remove markup
			var container = this.countryInput.parent();
			container.before(this.countryInput).remove();
		}
	};
	// adapted to allow public functions
	// using https://github.com/jquery-boilerplate/jquery-boilerplate/wiki/Extending-jQuery-Boilerplate
	$.fn[pluginName] = function(options) {
		var args = arguments;
		// Is the first parameter an object (options), or was omitted,
		// instantiate a new instance of the plugin.
		if (options === undefined || typeof options === "object") {
			return this.each(function() {
				if (!$.data(this, "plugin_" + pluginName)) {
					$.data(this, "plugin_" + pluginName, new Plugin(this, options));
				}
			});
		} else if (typeof options === "string" && options[0] !== "_" && options !== "init") {
			// If the first parameter is a string and it doesn't start
			// with an underscore or "contains" the `init`-function,
			// treat this as a call to a public method.
			// Cache the method call to make it possible to return a value
			var returns;
			this.each(function() {
				var instance = $.data(this, "plugin_" + pluginName);
				// Tests that there's already a plugin-instance
				// and checks that the requested public method exists
				if (instance instanceof Plugin && typeof instance[options] === "function") {
					// Call the method of our plugin instance,
					// and pass it the supplied arguments.
					returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
				}
				// Allow instances to be destroyed via the 'destroy' method
				if (options === "destroy") {
					$.data(this, "plugin_" + pluginName, null);
				}
			});
			// If the earlier cached method gives a value back return the value,
			// otherwise return this to preserve chainability.
			return returns !== undefined ? returns : this;
		}
	};
	/********************
   *  STATIC METHODS
   ********************/
	// get the country data object
	$.fn[pluginName].getCountryData = function() {
		return allCountries;
	};
	// set the country data object
	$.fn[pluginName].setCountryData = function(obj) {
		allCountries = obj;
	};
	// Tell JSHint to ignore this warning: "character may get silently deleted by one or more browsers"
	// jshint -W100
	// Array of country objects for the flag dropdown.
	// Each contains a name and country code (ISO 3166-1 alpha-2).
	//
	// Note: using single char property names to keep filesize down
	// n = name
	// i = iso2 (2-char country code)
	var allCountries = $.each([ {
		n: "Afghanistan (‫افغانستان‬‎)",
		i: "af",
		d: "+93"
	}, {
		n: "Åland Islands (Åland)",
		i: "ax",
		d: "+353"
	}, {
		n: "Albania (Shqipëri)",
		i: "al",
		d: "+355"
	}, {
		n: "Algeria (‫الجزائر‬‎)",
		i: "dz",
		d: "+213"
	}, {
		n: "American Samoa",
		i: "as",
		d: "+1 684"
	}, {
		n: "Andorra",
		i: "ad",
		d: "+376"
	}, {
		n: "Angola",
		i: "ao",
		d: "+244"
	}, {
		n: "Anguilla",
		i: "ai",
		d: "+1 264"
	}, {
		n: "Antigua and Barbuda",
		i: "ag",
		d: "+1268"
	}, {
		n: "Argentina",
		i: "ar",
		d: "+54"
	}, {
		n: "Armenia (Հայաստան)",
		i: "am",
		d: "+374"
	}, {
		n: "Aruba",
		i: "aw",
		d: "+297"
	}, {
		n: "Australia",
		i: "au",
		d: "+61"
	}, {
		n: "Austria (Österreich)",
		i: "at",
		d: "+43"
	}, {
		n: "Azerbaijan (Azərbaycan)",
		i: "az",
		d: "+994"
	}, {
		n: "Bahamas",
		i: "bs",
		d: "+1 242"
	}, {
		n: "Bahrain (‫البحرين‬‎)",
		i: "bh",
		d: "+973"
	}, {
		n: "Bangladesh (বাংলাদেশ)",
		i: "bd",
		d: "+880"
	}, {
		n: "Barbados",
		i: "bb",
		d: "+1 246"
	}, {
		n: "Belarus (Беларусь)",
		i: "by",
		d: "+375"
	}, {
		n: "Belgium (België)",
		i: "be",
		d: "+32"
	}, {
		n: "Belize",
		i: "bz",
		d: "+501"
	}, {
		n: "Benin (Bénin)",
		i: "bj",
		d: "+229"
	}, {
		n: "Bermuda",
		i: "bm",
		d: "+1 441"
	}, {
		n: "Bhutan (འབྲུག)",
		i: "bt",
		d: "+975"
	}, {
		n: "Bolivia",
		i: "bo",
		d: "+591"
	}, {
		n: "Bosnia and Herzegovina (Босна и Херцеговина)",
		i: "ba",
		d: "+387"
	}, {
		n: "Botswana",
		i: "bw",
		d: "+267"
	}, {
		n: "Brasil",
		i: "br",
		d: "+55"
	}, {
		n: "British Indian Ocean Territory",
		i: "io",
		d: "+246"
	}, {
		n: "British Virgin Islands",
		i: "vg",
		d: "+1 284"
	},{
		n: "Brunei",
		i: "bn",
		d: ""
	},{
		n: "Bulgaria (България)",
		i: "bg",
		d: ""
	}, {
		n: "Burkina Faso",
		i: "bf",
		d: ""
	}, {
		n: "Burundi (Uburundi)",
		i: "bi",
		d: ""
	}, {
		n: "Cambodia (កម្ពុជា)",
		i: "kh",
		d: ""
	}, {
		n: "Cameroon (Cameroun)",
		i: "cm",
		d: ""
	}, {
		n: "Canada",
		i: "ca",
		d: ""
	}, {
		n: "Cape Verde (Kabu Verdi)",
		i: "cv",
		d: ""
	}, {
		n: "Caribbean Netherlands",
		i: "bq",
		d: ""
	}, {
		n: "Cayman Islands",
		i: "ky",
		d: ""
	}, {
		n: "Central African Republic (République Centrafricaine)",
		i: "cf",
		d: ""
	}, {
		n: "Chad (Tchad)",
		i: "td",
		d: ""
	}, {
		n: "Chile",
		i: "cl",
		d: "+56"
	}, {
		n: "China (中国)",
		i: "cn",
		d: ""
	}, {
		n: "Christmas Island",
		i: "cx",
		d: ""
	}, {
		n: "Cocos (Keeling) Islands (Kepulauan Cocos (Keeling))",
		i: "cc",
		d: ""
	}, {
		n: "Colombia",
		i: "co",
		d: "+57"
	}, {
		n: "Comoros (‫جزر القمر‬‎)",
		i: "km",
		d: ""
	}, {
		n: "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)",
		i: "cd",
		d: ""
	}, {
		n: "Congo (Republic) (Congo-Brazzaville)",
		i: "cg",
		d: ""
	}, {
		n: "Cook Islands",
		i: "ck",
		d: ""
	}, {
		n: "Costa Rica",
		i: "cr",
		d: ""
	}, {
		n: "Côte d’Ivoire",
		i: "ci",
		d: ""
	}, {
		n: "Croatia (Hrvatska)",
		i: "hr",
		d: ""
	}, {
		n: "Cuba",
		i: "cu",
		d: ""
	}, {
		n: "Curaçao",
		i: "cw",
		d: ""
	}, {
		n: "Cyprus (Κύπρος)",
		i: "cy",
		d: ""
	}, {
		n: "Czech Republic (Česká republika)",
		i: "cz",
		d: ""
	}, {
		n: "Denmark (Danmark)",
		i: "dk",
		d: ""
	}, {
		n: "Djibouti",
		i: "dj",
		d: ""
	}, {
		n: "Dominica",
		i: "dm",
		d: ""
	}, {
		n: "Dominican Republic (República Dominicana)",
		i: "do",
		d: ""
	}, {
		n: "Ecuador",
		i: "ec",
		d: ""
	}, {
		n: "Egypt (‫مصر‬‎)",
		i: "eg",
		d: ""
	}, {
		n: "El Salvador",
		i: "sv",
		d: ""
	}, {
		n: "Equatorial Guinea (Guinea Ecuatorial)",
		i: "gq",
		d: ""
	}, {
		n: "Eritrea",
		i: "er",
		d: ""
	}, {
		n: "Estonia (Eesti)",
		i: "ee",
		d: ""
	}, {
		n: "Ethiopia",
		i: "et",
		d: ""
	}, {
		n: "Falkland Islands (Islas Malvinas)",
		i: "fk",
		d: ""
	}, {
		n: "Faroe Islands (Føroyar)",
		i: "fo",
		d: ""
	}, {
		n: "Fiji",
		i: "fj",
		d: ""
	}, {
		n: "Finland (Suomi)",
		i: "fi",
		d: ""
	}, {
		n: "France",
		i: "fr",
		d: ""
	}, {
		n: "French Guiana (Guyane française)",
		i: "gf",
		d: ""
	}, {
		n: "French Polynesia (Polynésie française)",
		i: "pf",
		d: ""
	}, {
		n: "Gabon",
		i: "ga",
		d: ""
	}, {
		n: "Gambia",
		i: "gm",
		d: ""
	}, {
		n: "Georgia (საქართველო)",
		i: "ge",
		d: ""
	}, {
		n: "Germany (Deutschland)",
		i: "de",
		d: ""
	}, {
		n: "Ghana (Gaana)",
		i: "gh",
		d: ""
	}, {
		n: "Gibraltar",
		i: "gi",
		d: ""
	}, {
		n: "Greece (Ελλάδα)",
		i: "gr",
		d: ""
	}, {
		n: "Greenland (Kalaallit Nunaat)",
		i: "gl",
		d: ""
	}, {
		n: "Grenada",
		i: "gd",
		d: ""
	}, {
		n: "Guadeloupe",
		i: "gp",
		d: ""
	}, {
		n: "Guam",
		i: "gu",
		d: ""
	}, {
		n: "Guatemala",
		i: "gt",
		d: ""
	}, {
		n: "Guernsey",
		i: "gg",
		d: ""
	}, {
		n: "Guinea (Guinée)",
		i: "gn",
		d: ""
	}, {
		n: "Guinea-Bissau (Guiné Bissau)",
		i: "gw",
		d: ""
	}, {
		n: "Guyana",
		i: "gy",
		d: ""
	}, {
		n: "Haiti",
		i: "ht",
		d: ""
	}, {
		n: "Honduras",
		i: "hn",
		d: ""
	}, {
		n: "Hong Kong (香港)",
		i: "hk",
		d: ""
	}, {
		n: "Hungary (Magyarország)",
		i: "hu",
		d: ""
	}, {
		n: "Iceland (Ísland)",
		i: "is",
		d: ""
	}, {
		n: "India (भारत)",
		i: "in",
		d: ""
	}, {
		n: "Indonesia",
		i: "id",
		d: ""
	}, {
		n: "Iran (‫ایران‬‎)",
		i: "ir",
		d: ""
	}, {
		n: "Iraq (‫العراق‬‎)",
		i: "iq",
		d: ""
	}, {
		n: "Ireland",
		i: "ie",
		d: ""
	}, {
		n: "Isle of Man",
		i: "im",
		d: ""
	}, {
		n: "Israel (‫ישר,אל‬‎)",
		i: "il",
		d: "+972"
	}, {
		n: "Italy (Italia)",
		i: "it",
		d: ""
	}, {
		n: "Jamaica",
		i: "jm",
		d: ""
	}, {
		n: "Japan (日本)",
		i: "jp",
		d: ""
	}, {
		n: "Jersey",
		i: "je",
		d: ""
	}, {
		n: "Jordan (‫الأردن‬‎)",
		i: "jo",
		d: ""
	}, {
		n: "Kazakhstan (Казахстан)",
		i: "kz",
		d: ""
	}, {
		n: "Kenya",
		i: "ke",
		d: ""
	}, {
		n: "Kiribati",
		i: "ki",
		d: ""
	}, {
		n: "Kosovo (Kosovë)",
		i: "xk",
		d: ""
	}, {
		n: "Kuwait (‫الكويت‬‎)",
		i: "kw",
		d: ""
	}, {
		n: "Kyrgyzstan (Кыргызстан)",
		i: "kg",
		d: ""
	}, {
		n: "Laos (ລາວ)",
		i: "la",
		d: ""
	}, {
		n: "Latvia (Latvija)",
		i: "lv",
		d: ""
	}, {
		n: "Lebanon (‫لبنان‬‎)",
		i: "lb",
		d: ""
	}, {
		n: "Lesotho",
		i: "ls",
		d: ""
	}, {
		n: "Liberia",
		i: "lr",
		d: ""
	}, {
		n: "Libya (‫ليبيا‬‎)",
		i: "ly",
		d: ""
	}, {
		n: "Liechtenstein",
		i: "li",
		d: ""
	}, {
		n: "Lithuania (Lietuva)",
		i: "lt",
		d: ""
	}, {
		n: "Luxembourg",
		i: "lu",
		d: ""
	}, {
		n: "Macau (澳門)",
		i: "mo",
		d: ""
	}, {
		n: "Macedonia (FYROM) (Македонија)",
		i: "mk",
		d: ""
	}, {
		n: "Madagascar (Madagasikara)",
		i: "mg",
		d: ""
	}, {
		n: "Malawi",
		i: "mw",
		d: ""
	}, {
		n: "Malaysia",
		i: "my",
		d: ""
	}, {
		n: "Maldives",
		i: "mv",
		d: ""
	}, {
		n: "Mali",
		i: "ml",
		d: ""
	}, {
		n: "Malta",
		i: "mt",
		d: ""
	}, {
		n: "Marshall Islands",
		i: "mh",
		d: ""
	}, {
		n: "Martinique",
		i: "mq",
		d: ""
	}, {
		n: "Mauritania (‫موريتانيا‬‎)",
		i: "mr",
		d: ""
	}, {
		n: "Mauritius (Moris)",
		i: "mu",
		d: ""
	}, {
		n: "Mayotte",
		i: "yt",
		d: ""
	}, {
		n: "Mexico (México)",
		i: "mx",
		d: ""
	}, {
		n: "Micronesia",
		i: "fm",
		d: ""
	}, {
		n: "Moldova (Republica Moldova)",
		i: "md",
		d: ""
	}, {
		n: "Monaco",
		i: "mc",
		d: ""
	}, {
		n: "Mongolia (Монгол)",
		i: "mn",
		d: ""
	}, {
		n: "Montenegro (Crna Gora)",
		i: "me",
		d: ""
	}, {
		n: "Montserrat",
		i: "ms",
		d: ""
	}, {
		n: "Morocco (‫المغرب‬‎)",
		i: "ma",
		d: ""
	}, {
		n: "Mozambique (Moçambique)",
		i: "mz",
		d: ""
	}, {
		n: "Myanmar (Burma) (မြန်မာ)",
		i: "mm",
		d: ""
	}, {
		n: "Namibia (Namibië)",
		i: "na",
		d: ""
	}, {
		n: "Nauru",
		i: "nr",
		d: ""
	}, {
		n: "Nepal (नेपाल)",
		i: "np",
		d: ""
	}, {
		n: "Netherlands (Nederland)",
		i: "nl",
		d: ""
	}, {
		n: "New Caledonia (Nouvelle-Calédonie)",
		i: "nc",
		d: ""
	}, {
		n: "New Zealand",
		i: "nz",
		d: ""
	}, {
		n: "Nicaragua",
		i: "ni",
		d: ""
	}, {
		n: "Niger (Nijar)",
		i: "ne",
		d: ""
	}, {
		n: "Nigeria",
		i: "ng",
		d: ""
	}, {
		n: "Niue",
		i: "nu",
		d: ""
	}, {
		n: "Norfolk Island",
		i: "nf",
		d: ""
	}, {
		n: "North Korea (조선 민주주의 인민 공화국)",
		i: "kp",
		d: ""
	}, {
		n: "Northern Mariana Islands",
		i: "mp",
		d: ""
	}, {
		n: "Norway (Norge)",
		i: "no",
		d: ""
	}, {
		n: "Oman (‫عُمان‬‎)",
		i: "om",
		d: ""
	}, {
		n: "Pakistan (‫پاکستان‬‎)",
		i: "pk",
		d: ""
	}, {
		n: "Palau",
		i: "pw",
		d: ""
	}, {
		n: "Palestine (‫فلسطين‬‎)",
		i: "ps",
		d: ""
	}, {
		n: "Panama (Panamá)",
		i: "pa",
		d: ""
	}, {
		n: "Papua New Guinea",
		i: "pg",
		d: ""
	}, {
		n: "Paraguay",
		i: "py",
		d: ""
	}, {
		n: "Peru (Perú)",
		i: "pe",
		d: ""
	}, {
		n: "Philippines",
		i: "ph",
		d: ""
	}, {
		n: "Pitcairn Islands",
		i: "pn",
		d: ""
	}, {
		n: "Poland (Polska)",
		i: "pl",
		d: ""
	}, {
		n: "Portugal",
		i: "pt",
		d: ""
	}, {
		n: "Puerto Rico",
		i: "pr",
		d: ""
	}, {
		n: "Qatar (‫قطر‬‎)",
		i: "qa",
		d: ""
	}, {
		n: "Réunion (La Réunion)",
		i: "re",
		d: ""
	}, {
		n: "Romania (România)",
		i: "ro",
		d: ""
	}, {
		n: "Russia (Россия)",
		i: "ru",
		d: ""
	}, {
		n: "Rwanda",
		i: "rw",
		d: ""
	}, {
		n: "Saint Barthélemy (Saint-Barthélemy)",
		i: "bl",
		d: ""
	}, {
		n: "Saint Helena",
		i: "sh",
		d: ""
	}, {
		n: "Saint Kitts and Nevis",
		i: "kn",
		d: ""
	}, {
		n: "Saint Lucia",
		i: "lc",
		d: ""
	}, {
		n: "Saint Martin (Saint-Martin (partie française))",
		i: "mf",
		d: ""
	}, {
		n: "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
		i: "pm",
		d: ""
	}, {
		n: "Saint Vincent and the Grenadines",
		i: "vc",
		d: ""
	}, {
		n: "Samoa",
		i: "ws",
		d: ""
	}, {
		n: "San Marino",
		i: "sm",
		d: ""
	}, {
		n: "São Tomé and Príncipe (São Tomé e Príncipe)",
		i: "st",
		d: ""
	}, {
		n: "Saudi Arabia (‫المملكة العربية السعودية‬‎)",
		i: "sa",
		d: ""
	}, {
		n: "Senegal (Sénégal)",
		i: "sn",
		d: ""
	}, {
		n: "Serbia (Србија)",
		i: "rs",
		d: ""
	}, {
		n: "Seychelles",
		i: "sc",
		d: ""
	}, {
		n: "Sierra Leone",
		i: "sl",
		d: ""
	}, {
		n: "Singapore",
		i: "sg",
		d: ""
	}, {
		n: "Sint Maarten",
		i: "sx",
		d: ""
	}, {
		n: "Slovakia (Slovensko)",
		i: "sk",
		d: ""
	}, {
		n: "Slovenia (Slovenija)",
		i: "si",
		d: ""
	}, {
		n: "Solomon Islands",
		i: "sb",
		d: ""
	}, {
		n: "Somalia (Soomaaliya)",
		i: "so",
		d: ""
	}, {
		n: "South Africa",
		i: "za",
		d: ""
	}, {
		n: "South Georgia & South Sandwich Islands",
		i: "gs",
		d: ""
	}, {
		n: "South Korea (대한민국)",
		i: "kr",
		d: ""
	}, {
		n: "South Sudan (‫جنوب السودان‬‎)",
		i: "ss",
		d: ""
	}, {
		n: "Spain (España)",
		i: "es",
		d: ""
	}, {
		n: "Sri Lanka (ශ්‍රී ලංකාව)",
		i: "lk",
		d: ""
	}, {
		n: "Sudan (‫السودان‬‎)",
		i: "sd",
		d: ""
	}, {
		n: "Suriname",
		i: "sr",
		d: ""
	}, {
		n: "Svalbard and Jan Mayen (Svalbard og Jan Mayen)",
		i: "sj",
		d: ""
	}, {
		n: "Swaziland",
		i: "sz",
		d: ""
	}, {
		n: "Sweden (Sverige)",
		i: "se",
		d: ""
	}, {
		n: "Switzerland (Schweiz)",
		i: "ch",
		d: ""
	}, {
		n: "Syria (‫سوريا‬‎)",
		i: "sy",
		d: ""
	}, {
		n: "Taiwan (台灣)",
		i: "tw",
		d: ""
	}, {
		n: "Tajikistan",
		i: "tj",
		d: ""
	}, {
		n: "Tanzania",
		i: "tz",
		d: ""
	}, {
		n: "Thailand (ไทย)",
		i: "th",
		d: ""
	}, {
		n: "Timor-Leste",
		i: "tl",
		d: ""
	}, {
		n: "Togo",
		i: "tg",
		d: ""
	}, {
		n: "Tokelau",
		i: "tk",
		d: ""
	}, {
		n: "Tonga",
		i: "to",
		d: ""
	}, {
		n: "Trinidad and Tobago",
		i: "tt",
		d: ""
	}, {
		n: "Tunisia (‫تونس‬‎)",
		i: "tn",
		d: ""
	}, {
		n: "Turkey (Türkiye)",
		i: "tr",
		d: ""
	}, {
		n: "Turkmenistan",
		i: "tm",
		d: ""
	}, {
		n: "Turks and Caicos Islands",
		i: "tc",
		d: ""
	}, {
		n: "Tuvalu",
		i: "tv",
		d: ""
	}, {
		n: "Uganda",
		i: "ug",
		d: ""
	}, {
		n: "Ukraine (Україна)",
		i: "ua",
		d: ""
	}, {
		n: "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)",
		i: "ae",
		d: ""
	}, {
		n: "United Kingdom",
		i: "gb",
		d: ""
	}, {
		n: "United States",
		i: "us",
		d: ""
	}, {
		n: "U.S. Minor Outlying Islands",
		i: "um",
		d: ""
	}, {
		n: "U.S. Virgin Islands",
		i: "vi",
		d: ""
	}, {
		n: "Uruguay",
		i: "uy",
		d: ""
	}, {
		n: "Uzbekistan (Oʻzbekiston)",
		i: "uz",
		d: ""
	}, {
		n: "Vanuatu",
		i: "vu",
		d: ""
	}, {
		n: "Vatican City (Città del Vaticano)",
		i: "va",
		d: ""
	}, {
		n: "Venezuela",
		i: "ve",
		d: ""
	}, {
		n: "Vietnam (Việt Nam)",
		i: "vn",
		d: ""
	}, {
		n: "Wallis and Futuna",
		i: "wf",
		d: ""
	}, {
		n: "Western Sahara (‫الصحراء الغربية‬‎)",
		i: "eh",
		d: ""
	}, {
		n: "Yemen (‫اليمن‬‎)",
		i: "ye",
		d: ""
	}, {
		n: "Zambia",
		i: "zm",
		d: ""
	}, {
		n: "Zimbabwe",
		i: "zw",
		d: ""
	} ], function(i, c) {
		c.name = c.n;
		c.iso2 = c.i;
		c.ddi = c.d;
		delete c.n;
		delete c.i;
		delete c.d;
	});
});
