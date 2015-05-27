/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.disallowedContent = 'img{width,height};img[width,height]';
    config.tag = { element : 'img', attributes : { 'class' : 'yourClassName' } };

   // config.disallowedContent = '';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
